<?php 


// visualcomposerstarter-general

function tnfb_scripts() {
  wp_enqueue_script( 'tnfb-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery') , null, true);
}

add_action( 'wp_enqueue_scripts', 'tnfb_scripts' );

function social_icons_shortcode() {
    ob_start();
    get_template_part( 'template-parts/header-social' );
    return ob_get_clean();
}

add_shortcode( 'social_icons', 'social_icons_shortcode');

add_action('acf/init', function() {
    if( function_exists('acf_add_options_page') ) {
  
      acf_add_options_page(array(
          'page_title'    => 'Theme General Settings',
          'menu_title'    => 'Theme Settings',
          'menu_slug'     => 'theme-general-settings',
          'capability'    => 'edit_posts',
          'redirect'      => false
      ));
  
    
      acf_add_options_sub_page(array(
          'page_title'    => 'Theme Footer Settings',
          'menu_title'    => 'Footer',
          'parent_slug'   => 'theme-general-settings',
      ));
  
    }
  });

  add_filter( 'wpseo_breadcrumb_links', 'wpseo_breadcrumb_remove_postname' );
function wpseo_breadcrumb_remove_postname( $links ) {
  if ( sizeof( $links ) > 1 ) {
    array_pop( $links );
  }
  return $links;
}

function register_child_theme_menus() {
    register_nav_menus( array(
        // 'primary'       => esc_html__( 'Primary Menu', 'visual-composer-starter' ),
        // 'secondary'     => esc_html__( 'Footer Menu', 'visual-composer-starter' ),
        'tertiary'		=> esc_html__( 'Secondary Menu', 'visual-composer-starter' ),
        'new-primary'   => esc_html__( 'New Primary Menu', 'visual-composer-starter')
    ) );
}

add_action( 'init', 'register_child_theme_menus' );