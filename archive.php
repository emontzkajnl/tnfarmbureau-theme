<?php
/**
 * The template part for displaying archive
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header(); ?>
	<div class="<?php echo esc_attr( visualcomposerstarter_get_content_container_class() ); ?>">
		<div class="content-wrapper">
			<div class="row">
				<div class="<?php echo esc_attr( visualcomposerstarter_get_maincontent_block_class() ); ?>">
					<div class="main-content">
						<div class="entry-content archive">
							<?php
                            $q = get_queried_object(  );
							$query_vars = $wp_query->query_vars; 
							
							if (is_category()) {
								echo '<h1 class="section-heading">'.$q->cat_name.'</h1>';
							} elseif (is_author()) {
								echo '<h1 class="section-heading">Articles by '.get_the_author().'</h1>';
							} else {
								the_archive_title( '<h1 class="section-heading">', '</h1>');
							}
                           
								// the_archive_title( '<h1>', '</h1>' );
							?>
						</div><!--.entry-content-->
						<div class="archive">
							<?php if ( have_posts() ) : 
								$total_posts = $wp_query->found_posts;
								$total_pages = ($total_posts + 2) / 12;
								$count = 1; ?>
                                <div class="row archive-container">
								<?php
								// Start the loop.
								while ( have_posts() ) : the_post();
								$layoutClass = $count < 3 ? 'col-md-6' : 'col-md-6 col-lg-3'; 
								echo '<div class="'.$layoutClass.'">';
									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_format() );
									echo '</div>'; // layout class
									$count++;
									// End the loop.
								endwhile;
                                
								?>
                                </div> <!-- row -->
								<?php if ($total_pages > 1) { ?>
									<script>
										window.current_page = 1;
									</script>
                            		<?php echo '<div style="text-align: center;"><button class="load-more-archive" data-cat="'.$q->term_id.'" data-total="'.$total_pages.'">More Articles</button></div>';
                        		} ?>
							
							<?php

							// If no content, include the "No posts found" template.
							else :
								get_template_part( 'template-parts/content', 'none' );

							endif;
							
							?>

						</div><!--.archive-->
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( visualcomposerstarter_get_maincontent_block_class() ); ?>-->

				<?php if ( visualcomposerstarter_get_sidebar_class() ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( visualcomposerstarter_get_content_container_class() ); ?>-->
<?php get_footer();
