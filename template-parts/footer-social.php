<?php 
?>
<ul class="footer-social"> <!-- fb, insta, tube, x -->
<?php if ( strlen( get_theme_mod( 'vct_footer_area_social_link_facebook', '' ) ) ) : ?>
    <li class="facebook">
        <a target="_blank" rel="noreferrer" href="<?php echo esc_url( get_theme_mod( 'vct_footer_area_social_link_facebook', '' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/footer-social-icons/facebook.svg" /></a>
    </li>
<?php endif; ?>
<?php if ( strlen( get_theme_mod( 'vct_footer_area_social_link_instagram', '' ) ) ) : ?>
    <li class="instagram">
        <a target="_blank" rel="noreferrer" href="<?php echo esc_url( get_theme_mod( 'vct_footer_area_social_link_instagram', '' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/footer-social-icons/instagram.svg" /></a>
    </li>
<?php endif; ?>
<?php if ( strlen( get_theme_mod( 'vct_footer_area_social_link_youtube', '' ) ) ) : ?>
    <li class="youtube">
        <a target="_blank" rel="noreferrer" href="<?php echo esc_url( get_theme_mod( 'vct_footer_area_social_link_youtube', '' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/footer-social-icons/youtube.svg" /></a>
    </li>
<?php endif; ?>
<?php if ( strlen( get_theme_mod( 'vct_footer_area_social_link_twitter', '' ) ) ) : ?>
    <li class="twitter">
        <a target="_blank" rel="noreferrer" href="<?php echo esc_url( get_theme_mod( 'vct_footer_area_social_link_twitter', '' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/footer-social-icons/twitter.svg" /></a>
    </li>
<?php endif; ?>
<?php if ( strlen( get_theme_mod( 'vct_footer_area_social_link_tiktok', '' ) ) ) : ?>
    <li class="tiktok">
        <a href="<?php echo esc_url( get_theme_mod( 'vct_footer_area_social_link_tiktok', '' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/footer-social-icons/tiktok.svg" /></a>
    </li>
<?php endif; ?>
</ul>