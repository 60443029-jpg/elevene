<?php
/**
 * Template for displaying search forms
 *
 * @package The Perfume Shop
 */

?>

<form method="get" class="search-from" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group search-div mb-0">
    	<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Buscar &hellip;', 'placeholder', 'the-perfume-shop' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php esc_attr_x( 'Buscar:', 'label', 'the-perfume-shop' ); ?>">
    </div>
    <input type="submit" class="search-submit btn btn-primary" value="<?php echo esc_attr_x( 'Buscar', 'submit button', 'the-perfume-shop' ); ?>">
</form>