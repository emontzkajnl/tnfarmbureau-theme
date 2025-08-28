<?php
/**
 * Single
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header();
// Start the loop.
while ( have_posts() ) :
	the_post();
?>
<div class="<?php echo esc_attr( visualcomposerstarter_get_content_container_class() ); ?>">
	<div class="content-wrapper">
		<div class="row">
			<!-- <div class="col-md-9"> -->
				<div class="main-content">
					<article class="entry-full-content">
						<div class="row">
							<div class="<?php //echo esc_attr( visualcomposerstarter_get_maincontent_block_class() ); ?>">
								<!-- <div class="col-md-2"> -->
									<?php
										//get_template_part( 'template-parts/biography' );
									?>
								<!-- </div>.col-md-2 -->
								<div class="col-md-12">
									<?php
									// CUSTOM BREADCRUMB
									$cats = get_the_category(); 
									$primary_cat = get_post_meta(get_the_ID() ,'_yoast_wpseo_primary_category', TRUE ); 
									$cat_obj = $primary_cat ? get_category($primary_cat) : $cats[0];
									//term_id, name, parent, get_term_link()
									
									echo '<p id="breadcrumbs"><span><span><a href="'.site_url().'">Home</a></span> > ';
									if ($cat_obj->parent > 0): 
										$parent_obj = get_category($cat_obj->parent);
										echo '<span><span><a href="'.get_category_link( $parent_obj->term_id ).'">'.$parent_obj->name.'</a></span> > </span>';
									endif; 
									echo '<span class="breadcrumb_last"><a href="'.get_category_link($cat_obj->term_id).'"><strong>'.$cat_obj->name.'</strong></a></span></span></p>';
									
									// if ( function_exists('yoast_breadcrumb') ) {
									// yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
									// } ?>
									<?php get_template_part( 'template-parts/content', 'single' );

									// if ( is_singular( 'post' ) ) : ?>
										<!-- <div class="nav-links post-navigation"> -->
											<!-- <div class="row"> -->
												<!-- <div class="col-md-5"> -->
													<!-- <div class="nav-previous"> -->
														<?php
														// previous_post_link(
														// 	'%link',
														// 	'<span class="meta-nav">' . esc_html__( 'Previous', 'visual-composer-starter' ) . '</span><span class="screen-reader-text">' . esc_html__( 'Previous post:', 'visual-composer-starter' ) . '</span><span class="post-title">%title</span>'
														// );
														?>
													<!-- </div>nav-previous -->
												<!-- </div>.col-md-5 -->
												<!-- <div class="col-md-5 col-md-offset-2"> -->
													<!-- <div class="nav-next"> -->
														<?php
														// next_post_link(
														// 	'%link',
														// 	'<span class="meta-nav">' . esc_html__( 'Next', 'visual-composer-starter' ) . '</span><span class="screen-reader-text">' . esc_html__( 'Next post:', 'visual-composer-starter' ) . '</span><span class="post-title">%title</span>'
														// );
														?>
													<!-- </div>.nav-next -->
												<!-- </div>.col-md-5 -->
											<!-- </div>.row -->
										<!-- </div>.nav-links post-navigation -->
									<?php //endif; ?>
								</div><!--.col-md-10-->
								
							</div><!--.<?php echo esc_html( visualcomposerstarter_get_maincontent_block_class() ); ?>-->
							<?php //if ( visualcomposerstarter_get_sidebar_class() ) : ?>
								
							<?php //endif; ?>
						</div><!--.row-->
					</article><!--.entry-full-content-->
				</div><!--.main-content-->
			<!-- </div> -->
			<?php if ( visualcomposerstarter_get_sidebar_class() ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div><!--.row-->
	</div><!--.content-wrapper-->
</div><!--.<?php echo esc_html( visualcomposerstarter_get_content_container_class() ); ?>-->
<?php if ( comments_open() || get_comments_number() ) {
	comments_template();
}
// End of the loop.
endwhile;
get_footer();
