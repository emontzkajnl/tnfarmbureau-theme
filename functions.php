<?php 


// visualcomposerstarter-general

function tnfb_scripts() {
  wp_enqueue_script( 'tnfb-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery', 'jquery-ui-autocomplete') , null, true);
  wp_localize_script( 'tnfb-main', 'params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
  ) );
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
  // if (get_post_type() != 'post') {
  //   return;
  // }
  $main_nav_menu = wp_get_nav_menu_items('New Main Nav');
  $menuParent = null;
  $subItems = [];

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
  } elseif( is_single() &&  get_post_type() == 'post') {
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
  } elseif(get_post_type() == 'page') {
    $postID = get_the_ID();
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
    return; 
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
		$args['cat'] = $_POST['cat'];
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

function return_county_list() {
  $county_objects = array();
  $county_args = array(
    'post_type'   => 'post',
    'cat'         => 47,
    'posts_per_page'  => -1
  );
  $county_query = new WP_Query($county_args);
  if ($county_query->have_posts()) {
    while ($county_query->have_posts()) {
      $county_query->the_post();
      $title = get_the_title();
      $link = get_the_permalink( );
      $county_objects[] = array($title, $link);
    }
 
  } 
  wp_send_json_success($county_objects);
		wp_die();
}

add_action('wp_ajax_createCountyList', 'return_county_list');
add_action('wp_ajax_nopriv_createCountyList', 'return_county_list');


function custom_search_category_deprioritization( $query ) {
  // Only apply this logic on the front-end search page
  if ( $query->is_search() && $query->is_main_query() ) {

      // 1. Define the Category IDs to De-prioritize
      // IMPORTANT: Replace these with the actual IDs of your categories
      $deprioritize_cat_ids = array( 45, 92, 156 );
      $cat_ids_string = implode( ',', array_map( 'intval', $deprioritize_cat_ids ) );

      // 2. Add the JOIN to link posts to their categories
      add_filter( 'posts_join', 'custom_search_join_category' );

      // 3. Add the ORDER BY clause to de-prioritize the posts
      add_filter( 'posts_search_orderby', function( $orderby ) use ( $cat_ids_string ) {
          global $wpdb;

          // This SQL adds a temporary field called 'category_priority'.
          // If a post is in one of the categories, 'category_priority' is set to 1.
          // Otherwise (for all other posts), it is set to 0.
          $priority_sql = "
              (CASE WHEN $wpdb->posts.ID IN (
                  SELECT object_id
                  FROM $wpdb->term_relationships
                  WHERE term_taxonomy_id IN ({$cat_ids_string})
              ) THEN 1 ELSE 0 END)
          ";

          // We order by 'category_priority' first (ASC), meaning 0s (high priority) come before 1s (low priority).
          // Then, we append the original sorting (usually relevance or date).
          $new_orderby = "{$priority_sql} ASC, " . $orderby;
          
          return $new_orderby;
      });

      // Ensure we only join once and remove the filter after use
      add_filter( 'posts_clauses', 'custom_remove_join_filter', 10, 1 );
  }
}
add_action( 'pre_get_posts', 'custom_search_category_deprioritization' );


// Filter to handle JOIN removal after the query has run
function custom_remove_join_filter( $clauses ) {
  remove_filter( 'posts_join', 'custom_search_join_category' );
  return $clauses;
}

// Filter to JOIN the necessary tables (Term Relationships and Taxonomy)
function custom_search_join_category( $join ) {
  global $wpdb;

  // Only join if we haven't already and the query is for search
  if ( ! strstr( $join, $wpdb->term_relationships ) ) {
      $join .= " LEFT JOIN $wpdb->term_relationships ON $wpdb->posts.ID = $wpdb->term_relationships.object_id ";
      $join .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id ";
  }
  return $join;
}