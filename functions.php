<?php 


// visualcomposerstarter-general

function tnfb_scripts() {
  wp_enqueue_script( 'tnfb-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery') , null, true);
  // wp_localize_script( 'tnfb-main', $object_name:string, $l10n:array )
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
  // echo 'post type '.get_post_type();
  if (get_post_type() != 'post') {
    return;
  }
  $main_nav_menu = wp_get_nav_menu_items('New Main Nav');
  $menuParent = null;
  $subItems = [];
  // echo '<pre>';
  // print_r($main_nav_menu);
  // echo '</pre>';
  if (is_archive()) {
    $q = get_queried_object( );
    $postID = $q->term_id;
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
  } else {
    
    $postID = get_the_ID();
    $catArray = get_the_category($postID); //array of cat obj, need term_id
    foreach ($main_nav_menu as $key => $value) {
      if ($value->object == 'category') {
        foreach ($catArray as $cat) {
          if ($value->object_id == $cat->term_id) {
            if ($value->menu_item_parent > 0) {
              $menuParent = $value->menu_item_parent;
            } else {
              $menuParent = $value->ID;
            }
            break; 
          }
        }
      }
    }
    // echo '<pre>';
    // print_r($catArray);
    // echo '</pre>';
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

function load_archive_posts() {
  // for category, author, search 
  $offset = $_POST['currentPage'] * 12 + 2; // to accomodate two featured posts, use offset instead of pagination
  $args = array(
    'post_type'     => 'post',
    'posts_per_page'  => 12,
    'offset'        => $offset,
    'post_status'   => 'publish'
  );
  if ($_POST['cat']) {
		$args['category_name'] = $_POST['cat'];
	}
  $cat_query = new WP_Query($args);

  while ($cat_query->have_posts()) {
    $cat_query->the_post();  ?>
  <div class="col-md-6 col-lg-3">
    <article >
        <div class="object-fit-image">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?> ">
        <?php //visualcomposerstarter_post_thumbnail(); 
        the_post_thumbnail();?>
        </a></div>
        <div class="entry-content">
        <?php echo '<p class="latest-news__date">'.get_the_date('M j, Y').'</p>'; 
            the_title( sprintf( '<h2 class="archive-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </div><!--.entry-content-->
    </article><!--.entry-preview-->
    </div><!-- col-md-4 -->
    <?php }
    // wp_reset_postdata(  );
    wp_die();
    
}

add_action('wp_ajax_loadarchives', 'load_archive_posts');
add_action('wp_ajax_nopriv_loadarchives', 'load_archive_posts');

function change_posts_per_page( $query ) {
  if ( !is_admin() && $query->is_main_query() && is_archive(  ) ) {
      $query->set( 'posts_per_page', 14 );
  }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

