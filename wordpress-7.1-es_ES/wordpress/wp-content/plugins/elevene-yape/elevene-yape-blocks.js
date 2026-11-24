(function () {
	'use strict';

	if ( ! window.wc || ! window.wc.wcBlocksRegistry || ! window.wc.wcSettings ) {
		return;
	}

	var registerPaymentMethod = window.wc.wcBlocksRegistry.registerPaymentMethod;
	var getPaymentMethodData = window.wc.wcSettings.getPaymentMethodData;
	var el = window.wp.element;
	var decodeEntities =
		window.wp && window.wp.htmlEntities
			? window.wp.htmlEntities.decodeEntities
			: function ( value ) {
					return value;
			  };
	var sanitizeHTML =
		window.wc && window.wc.sanitize && window.wc.sanitize.sanitizeHTML
			? window.wc.sanitize.sanitizeHTML
			: function ( value ) {
					return value;
			  };

	var data = getPaymentMethodData( 'yape', {} ) || {};
	var title = decodeEntities( data.title || '' ) || 'Yape';
	var description = data.description || '';
	var qrUrl = data.qr_url || '';
	var phone = data.yape_phone || '';
	var name = data.yape_name || '';

	function Label( props ) {
		var PaymentMethodLabel = props.components.PaymentMethodLabel;
		return el.createElement( PaymentMethodLabel, { text: title } );
	}

	function Content() {
		var children = [];

		if ( description ) {
			children.push(
				el.createElement( 'div', {
					key: 'desc',
					dangerouslySetInnerHTML: { __html: sanitizeHTML( description ) },
				} )
			);
		}

		if ( qrUrl || phone || name ) {
			var boxChildren = [];

			if ( qrUrl ) {
				boxChildren.push(
					el.createElement( 'img', {
						key: 'qr',
						src: qrUrl,
						alt: 'QR Yape',
						style: {
							maxWidth: '220px',
							height: 'auto',
							display: 'block',
							margin: '0 auto 10px',
						},
					} )
				);
			}

			if ( phone ) {
				boxChildren.push(
					el.createElement(
						'p',
						{ key: 'phone', style: { margin: '5px 0' } },
						el.createElement( 'strong', null, 'N\u00famero Yape: ' ),
						phone
					)
				);
			}

			if ( name ) {
				boxChildren.push(
					el.createElement(
						'p',
						{ key: 'name', style: { margin: '5px 0' } },
						el.createElement( 'strong', null, 'A nombre de: ' ),
						name
					)
				);
			}

			boxChildren.push(
				el.createElement(
					'p',
					{ key: 'help', style: { margin: '8px 0 0' } },
					'Realiza la transferencia por el ',
					el.createElement( 'strong', null, 'total exacto' ),
					' de tu pedido y env\u00eda el comprobante a ',
					el.createElement( 'strong', null, 'WhatsApp: 912 858 033' ),
					' o a ',
					el.createElement( 'strong', null, 'anniecalcina647@gmail.com' ),
					' indicando tu n\u00famero de pedido.'
				)
			);

			children.push(
				el.createElement(
					'div',
					{
						key: 'yape-box',
						style: {
							marginTop: '12px',
							padding: '15px',
							border: '1px dashed #2e7d32',
							borderRadius: '8px',
							textAlign: 'center',
						},
					},
					boxChildren
				)
			);
		}

		return el.createElement( el.Fragment, null, children );
	}

	registerPaymentMethod( {
		name: 'yape',
		label: el.createElement( Label, null ),
		content: el.createElement( Content, null ),
		edit: el.createElement( Content, null ),
		canMakePayment: function () {
			return true;
		},
		ariaLabel: title,
		supports: {
			features: data.supports || [ 'products' ],
		},
	} );
} )();