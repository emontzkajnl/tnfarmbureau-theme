<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

?>
<div class=" col-md-3 col-lg-4">
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-preview' ); ?>>
	<div class="object-fit-image">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?> ">
	<?php //visualcomposerstarter_post_thumbnail(); 
	the_post_thumbnail();?>
	</a></div>

	<?php //visualcomposerstarter_entry_meta(); ?>

	<div class="entry-content">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php //the_excerpt();
		?>

	</div><!--.entry-content-->

	<?php //if ( ! is_singular() ) :?>
		<!-- <a href="<?php// echo esc_url( get_permalink( get_the_ID() ) ) ?>" class="blue-button read-more"><?php //echo esc_html__( 'Read Full Article', 'visual-composer-starter' ) ?></a> -->
	<?php// endif;?>
</article><!--.entry-preview-->
</div><!-- col-md-4 -->
