<?php
/**
 * Plugin Name: ELEVENE - Pago con Yape
 * Description: Añade Yape como método de pago en WooCommerce (transferencia con QR y envío de comprobante).
 * Version: 1.1
 * Author: ELEVENE
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'woocommerce_payment_gateways', 'elevene_yape_add_gateway' );
function elevene_yape_add_gateway( $gateways ) {
	$gateways[] = 'ELEVENE_Yape_Gateway';
	return $gateways;
}

add_action( 'woocommerce_blocks_payment_method_type_registration', 'elevene_yape_register_blocks_payment_method' );
function elevene_yape_register_blocks_payment_method( $registry ) {
	if ( ! class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
		return;
	}

	if ( ! class_exists( 'ELEVENE_Yape_Payment_Method_Type' ) ) {
		class ELEVENE_Yape_Payment_Method_Type extends Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType {
			protected $name = 'yape';

			public function initialize() {
				$this->settings = get_option( 'woocommerce_yape_settings', array() );
			}

			public function is_active() {
				return filter_var( $this->get_setting( 'enabled', false ), FILTER_VALIDATE_BOOLEAN );
			}

			public function get_payment_method_script_handles() {
				$handle = 'elevene-yape-blocks';

				if ( ! wp_script_is( $handle, 'registered' ) ) {
					wp_register_script(
						$handle,
						plugins_url( 'elevene-yape-blocks.js', __FILE__ ),
						array(
							'react-jsx-runtime',
							'wc-blocks-registry',
							'wc-sanitize',
							'wc-settings',
							'wp-element',
							'wp-html-entities',
							'wp-i18n',
							'wp-polyfill',
						),
						'1.1',
						true
					);
				}

				return array( $handle );
			}

			public function get_payment_method_data() {
				return array(
					'title'       => $this->get_setting( 'title', 'Yape' ),
					'description' => $this->get_setting( 'description', '' ),
					'supports'    => $this->get_supported_features(),
					'qr_url'      => $this->get_setting( 'qr_url', '' ),
					'yape_phone'  => $this->get_setting( 'yape_phone', '' ),
					'yape_name'   => $this->get_setting( 'yape_name', '' ),
				);
			}
		}
	}

	$registry->register( new ELEVENE_Yape_Payment_Method_Type() );
}

add_action( 'plugins_loaded', 'elevene_yape_init', 11 );
function elevene_yape_init() {

	if ( ! class_exists( 'WC_Payment_Gateway' ) ) {
		return;
	}

	class ELEVENE_Yape_Gateway extends WC_Payment_Gateway {

		public $qr_url     = '';
		public $yape_name  = '';
		public $yape_phone = '';

		public function __construct() {
			$this->id                 = 'yape';
			$this->icon               = '';
			$this->has_fields         = true;
			$this->method_title       = 'Yape';
			$this->method_description = 'Permite al cliente pagar con Yape: transfiere el importe al número indicado y envía el comprobante por WhatsApp o correo. El pedido queda en estado "Procesando pago" hasta que confirmes la recepción.';

			$this->init_form_fields();
			$this->init_settings();

			$this->title       = $this->get_option( 'title' );
			$this->description = $this->get_option( 'description' );
			$this->qr_url      = $this->get_option( 'qr_url' );
			$this->yape_name   = $this->get_option( 'yape_name' );
			$this->yape_phone  = $this->get_option( 'yape_phone' );

			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		}

		public function init_form_fields() {
			$this->form_fields = array(
				'enabled'     => array(
					'title'   => 'Activar/Desactivar',
					'type'    => 'checkbox',
					'label'   => 'Activar pago con Yape',
					'default' => 'yes',
				),
				'title'       => array(
					'title'       => 'Título',
					'type'        => 'text',
					'description' => 'Nombre visible en el checkout.',
					'default'     => 'Yape',
				),
				'description' => array(
					'title'       => 'Descripción',
					'type'        => 'textarea',
					'description' => 'Texto que ve el cliente al elegir este método.',
					'default'     => 'Paga con Yape escaneando el QR. Al finalizar, envíanos el comprobante por WhatsApp al 912 858 033 o a nuestro correo y confirmamos tu pedido.',
				),
				'qr_url'      => array(
					'title'       => 'Imagen del QR de Yape',
					'type'        => 'text',
					'description' => 'Sube tu QR a Medios → Añadir nuevo → selecciona la imagen → Copiar URL de la imagen y pégala aquí. (Si aún no la tienes, déjalo vacío y usa el número de teléfono).',
					'default'     => '',
				),
				'yape_name'   => array(
					'title'       => 'Nombre en Yape',
					'type'        => 'text',
					'description' => 'Nombre que aparece en la app Yape (ej. tu nombre o el de la tienda).',
					'default'     => 'Anahy Milagros Calcina Rodriguez',
				),
				'yape_phone'  => array(
					'title'       => 'Número de Yape',
					'type'        => 'text',
					'description' => 'Número de teléfono asociado a la cuenta Yape.',
					'default'     => '912740504',
				),
			);
		}

		public function payment_fields() {
			echo wp_kses_post( wpautop( $this->description ) );
			$this->render_yape_info();
		}

		private function render_yape_info() {
			$qr     = $this->qr_url;
			$phone  = $this->yape_phone;
			$name   = $this->yape_name;

			echo '<div class="elevene-yape-box" style="margin-top:12px;padding:15px;border:1px dashed #2e7d32;border-radius:8px;text-align:center;">';

			if ( $qr ) {
				echo '<img src="' . esc_url( $qr ) . '" alt="QR Yape" style="max-width:220px;height:auto;display:block;margin:0 auto 10px;" />';
			}

			if ( $phone ) {
				echo '<p style="margin:5px 0;"><strong>Número Yape:</strong> ' . esc_html( $phone ) . '</p>';
			}
			if ( $name ) {
				echo '<p style="margin:5px 0;"><strong>A nombre de:</strong> ' . esc_html( $name ) . '</p>';
			}

			echo '<p style="margin:8px 0 0;">Realiza la transferencia por el <strong>total exacto</strong> de tu pedido y envía el comprobante a <strong>WhatsApp: 912 858 033</strong> o a <strong>anniecalcina647@gmail.com</strong> indicando tu número de pedido.</p>';
			echo '</div>';
		}

		public function validate_fields() {
			return true;
		}

		public function process_payment( $order_id ) {
			$order = wc_get_order( $order_id );

			$order->update_status( 'on-hold', __( 'Pago con Yape pendiente de confirmación. Esperando comprobante del cliente.', 'elevene-yape' ) );

			if ( function_exists( 'wc_reduce_stock_levels' ) ) {
				wc_reduce_stock_levels( $order_id );
			}

			if ( isset( WC()->cart ) ) {
				WC()->cart->empty_cart();
			}

			return array(
				'result'   => 'success',
				'redirect' => $this->get_return_url( $order ),
			);
		}

		public function thankyou_page( $order ) {
			echo '<h3>' . esc_html__( 'Pago con Yape', 'elevene-yape' ) . '</h3>';
			$this->render_yape_info();
			echo '<p>' . esc_html__( 'Una vez enviado el comprobante, confirmaremos tu pedido por correo o WhatsApp.', 'elevene-yape' ) . '</p>';
		}

		public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {
			if ( $sent_to_admin || ! $order->has_status( 'on-hold' ) ) {
				return;
			}
			if ( $plain_text ) {
				echo esc_html__( 'Realiza el pago por Yape al número ', 'elevene-yape' ) . esc_html( $this->yape_phone ) . esc_html__( ' y envía el comprobante a WhatsApp 912 858 033 o a anniecalcina647@gmail.com.', 'elevene-yape' ) . PHP_EOL;
			} else {
				echo '<h3>' . esc_html__( 'Pago con Yape', 'elevene-yape' ) . '</h3>';
				$this->render_yape_info();
			}
		}
	}
}
