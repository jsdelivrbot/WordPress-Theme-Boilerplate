<?php
/** --------------------------------------- */
/** Import all dependencies for front end  */
/**                                       */
/**   Bootstrap / jQuery / FontAwesome   */
/** ----------------------------------- */


// require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );

function mta_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_register_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css' );
    wp_register_style('aos', get_template_directory_uri() . '/css/aos.css' );

    $dependencies = array('bootstrap','bootstrap-theme','aos');

    wp_enqueue_style( 'style', get_stylesheet_uri(), $dependencies );
}

function mta_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', $dependencies, '3.3.6', false );
    wp_enqueue_script('aos', get_template_directory_uri().'/js/aos.js', $dependencies, false );
    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', $dependencies, false );
}

/** ----------------------------------------- */
/**                                          */
/**           Font Awesome CDN              */
/**                                        */
/** ------------------------------------- */

function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}

/** ----------------------------------------- */
/**                                          */
/**             Fonts Loader                */
/**                                        */
/** ------------------------------------- */

function mta_add_google_fonts() {
    wp_enqueue_style( 'mta-google-fonts', 'https://fonts.googleapis.com/css?family=Work+Sans:100', false );
}

add_action( 'wp_enqueue_scripts', 'mta_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'mta_enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
add_action( 'wp_enqueue_scripts', 'mta_add_google_fonts' );
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