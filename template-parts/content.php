<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

?>
<!-- <div class=" col-md-6 col-lg-3"> -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-preview' ); ?>>
	<div class="object-fit-image">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?> ">
	<?php //visualcomposerstarter_post_thumbnail(); 
	the_post_thumbnail();?>
	</a></div>

	<?php //visualcomposerstarter_entry_meta(); ?>

	<div class="entry-content">
		<?php echo '<p class="latest-news__date">'.get_the_date('M j, Y').'</p>'; ?>
		<?php the_title( sprintf( '<h2 class="archive-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php //the_excerpt();
		?>

	</div><!--.entry-content-->

	
</article><!--.entry-preview-->
<!-- </div> -->