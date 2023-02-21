<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  

add_action( 'wp_enqueue_scripts', 'rikkerdesign_style' );
				function rikkerdesign_style() {
					wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
					wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
				}

/**
 * Your code goes below.
 */

//Rikkerdesign Support line
function add_support_to_admin_bar( $wp_admin_bar ) {
  if ( is_user_logged_in() ) {
    $current_user = wp_get_current_user();
    $support_text = 'Komt u er niet helemaal uit? Bel dan test-test';
    $args = array(
      'id' => 'custom-support',
      'title' => $support_text,
      'parent' => 'top-secondary',
      'meta' => array(
        'class' => 'custom-support-menu-item'
      )
    );
    $wp_admin_bar->add_node( $args );
  }
}
add_action( 'admin_bar_menu', 'add_support_to_admin_bar', 999 );

//Rikkerdesign login page
function wpb_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(https://rikkerdesign.nl/wp-content/uploads/2021/12/Logo-Groot-Top-1.png);
        height:140px;
        width:294px;
        background-size: 294px 140px;
        background-repeat: no-repeat;
        padding-bottom: 10px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

function my_login_page_custom_bg_image() { ?>
<style type="text/css">
  body{
    background-image:url(https://rikkerdesign.nl/wp-content/uploads/2022/09/Achtergrond-Websites-scaled.jpg) !important;
    background-size:cover !important;
    background-position:center center !important;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_page_custom_bg_image' );

function my_loginURL() {
    return 'https://www.rikkerdesign.nl';
}
add_filter('login_headerurl', 'my_loginURL');

function my_loginURLtext() {
    return 'Rikkerdesign';
}
add_filter('login_headertitle', 'my_loginURLtext');

add_filter( 'login_display_language_dropdown', '__return_false' );

function custom_login_styles() {
  wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/login/login_styles.css' );
}
add_action( 'login_enqueue_scripts', 'custom_login_styles' );


//Rikkerdesign icon
function custom_admin_bar_logo( $wp_admin_bar ) {
    $wp_admin_bar->add_node(
        array(
            'id'    => 'wp-logo',
            'title' => '<img src="' . get_stylesheet_directory_uri() . '/images/custom-icon.png" style="height: 30px; width: 30px;"/>',
            'href'  => home_url(),
            'meta'  => array(
                'class' => 'wp-logo',
                'title' => __('Home'),
            ),
        )
    );
}
add_action( 'admin_bar_menu', 'custom_admin_bar_logo', 11 );

