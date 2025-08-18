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

// add_shortcode( 'button', 'button_shortcode' );

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

add_filter('woocommerce_get_price_html', 'hide_price_for_featured_products_loop', 9999, 2);
function hide_price_for_featured_products_loop($price, $product) {
    // Check if we're in a product loop and the product is featured
    if (is_product() || is_shop() || is_product_category() || is_product_tag() || (function_exists('wc_get_loop_prop') && wc_get_loop_prop('is_shortcode') && $product->is_featured())) {
        return ''; // Hide price for featured products in shortcode
    }
    return $price;
}

add_filter('woocommerce_loop_add_to_cart_link', 'hide_add_to_cart_for_featured_products_loop', 9999, 3);
function hide_add_to_cart_for_featured_products_loop($html, $product, $args) {
    // Check if we're in a product loop and the product is featured
    if (is_product() || is_shop() || is_product_category() || is_product_tag() || (function_exists('wc_get_loop_prop') && wc_get_loop_prop('is_shortcode') && $product->is_featured())) {
        return ''; // Hide Add to Cart/Select Options for featured products in shortcode
    }
    return $html;
}

function get_submenu() {
  $main_nav_menu = wp_get_nav_menu_items('New Main Nav');
  if (is_archive()) {
    $q = get_queried_object( );
    $postID = $q->term_id;
  } else {
    $postID = get_the_ID();
  }
  $menuParent = null;
  $subItems = [];
  foreach ($main_nav_menu as $key => $value) {
    if ($value->object_id == $postID) {
      if ($value->menu_item_parent > 0) {
        $menuParent = $value->menu_item_parent;
      } else {
        $menuParent = $value->ID;
      }
      break; 
    }
  }
  if ($menuParent == null) {return;} 
  // echo 'menu parent is '.$menuParent;
  foreach ($main_nav_menu as $key => $value) {
    if ($value->menu_item_parent == $menuParent) {
      $subItems[] = $value;
    }
  }
  return $subItems;
}