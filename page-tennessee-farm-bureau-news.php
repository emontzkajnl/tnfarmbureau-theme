<?php
/**
 * Page template for news category page
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
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'page' );
						endwhile; // End the loop.

                        // TODO set up get parameters to categories
                        // TODO set up category links
                        if (!isset($_GET['cat'])) {
                            $current_cat = 'news';
                        } else {
                            switch ($_GET['cat']) {
                                case 'ag-news':
                                    $current_cat = 'ag-news';
                                    break;
                                case 'ag-angle':
                                    $current_cat = 'ag-angle';
                                    break;
                                case 'press-releases':
                                    $current_cat = 'press-releases';
                                    break;
                                default:
                                    $current_cat = 'news';
                                    break;
                            }
                        }
                        
                        ?>
                        <div class="row archive-news-buttons">
                            <ul>
                                <li><a <?php echo $current_cat == 'news' ? 'class="active-news-button"' : ''; ?> href="/tennessee-farm-bureau-news" data-category="news">All</a></li>
                                <li><a  <?php echo $current_cat == 'ag-news' ? 'class="active-news-button"' : ''; ?> href="/tennessee-farm-bureau-news?cat=ag-news" data-category="ag-news">Ag News</a></li>
                                <li><a  <?php echo $current_cat == 'ag-angle' ? 'class="active-news-button"' : ''; ?> href="/tennessee-farm-bureau-news?cat=ag-angle" data-category="ag-angle">Ag Angle</a></li>
                                <li><a  <?php echo $current_cat == 'press-releases' ? 'class="active-news-button"' : ''; ?> href="/tennessee-farm-bureau-news?cat=press-releases" data-category="press-releases">Press Releases</a></li>
                                </ul>
                        </div>
                        <?php $args = array(
                            'post_type'         => 'post',
                            'posts_per_page'    => 14,
                            'category_name'     => $current_cat,
                            'post_status'       => 'publish'
                        );
                        $cat_query = new WP_Query($args);
                        // print_r($cat_query);
                        $total_posts = $cat_query->found_posts;
                        $total_pages = ($total_posts + 2) / 12;
                        $count = 1;
                        if ($cat_query->have_posts()) { ?>
                        <div class="archive">
                            <div class="row archive-container">
                            <?php while ($cat_query->have_posts()) {
                                $cat_query->the_post(); 
                                $layoutClass = $count < 3 ? 'col-md-6' : 'col-md-6 col-lg-3'; ?>
                            <div class="<?php echo $layoutClass; ?>">
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-preview' ); ?>>
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
                            <?php  $count++;
                            } ?>
                            </div>
                        </div>
                        <?php if ($total_pages > 1) {
                            echo '<div style="text-align: center;"><button class="load-more-archive" data-cat="'.$current_cat.'" data-total="'.$total_pages.'">More Articles</button></div>';
                        } ?>
                        <script>
                            if (window.current_page == undefined) {
                                window.current_page = 1;
                            }
                        </script>
                       <?php 
                        }

                        wp_reset_postdata(  );
						?>


					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( visualcomposerstarter_get_maincontent_block_class() ); ?>-->

				<?php if ( visualcomposerstarter_get_sidebar_class() ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( visualcomposerstarter_get_content_container_class() ); ?>-->
<?php get_footer();
