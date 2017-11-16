<!-- functions.php -->

<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );

function my_theme_enqueue_scripts() {
    wp_enqueue_script( 'bundle', get_stylesheet_directory_uri() . '/dist/bundle.js', array('jquery'), 1, false );
}
?>

<?php
/** --------------------------------------- */
/** Import all dependencies for front end  */
/**                                       */
/**   Bootstrap / jQuery / FontAwesome   */
/** ----------------------------------- */

// require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );

function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );

function theme_add_google_fonts() {
    wp_enqueue_style( 'mta-google-fonts', 'https://fonts.googleapis.com/css?family=Work+Sans:100', false );
}

add_action( 'wp_enqueue_scripts', 'theme_add_google_fonts' );
?>

<?php

/** ----------------------------------------- */
/**                                          */
/**  Setup theme & add customisable fields  */
/**                                        */
/** ------------------------------------- */

function mta_wp_setup() {
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'mta_wp_setup' );
?>


<?php

/** --------------------------------------------------------- */
/**                                                          */
/**  Remove auto-generating <p> tags around loaded content  */
/**                                                        */
/** ----------------------------------------------------- */

add_filter( 'the_content', 'wti_remove_autop', 0 );

function wti_remove_autop( $content ) {
    remove_filter('the_content', 'wpautop');
    return $content;
}
?>