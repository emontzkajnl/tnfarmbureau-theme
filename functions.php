<?php 

// visualcomposerstarter-general

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