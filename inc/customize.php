<?php
function esthetique_customize_register($wp_customize) {

}
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

add_action('customize_register', 'esthetique_customize_register');
if ( ! function_exists( 'esthetique_get_option' ) ) :
    function esthetique_get_option( $esthetique_name, $esthetique_default = false ) {
        $esthetique_config = get_option( 'esthetique' );
        if ( ! isset( $esthetique_config ) ) : return $esthetique_default; else: $esthetique_options = $esthetique_config; endif;
        if ( isset( $esthetique_options[$esthetique_name] ) ):  return $esthetique_options[$esthetique_name]; else: return $esthetique_default; endif;
    }
endif;