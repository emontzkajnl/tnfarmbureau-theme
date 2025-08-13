<?php
/**
 * Video Page template
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
					
						?>
                        <div class="td-container">
    <div class="vc_row wpb_row row">
    	<div class="wpb_column vc_column_container col-md-3">
    		<div class="vc_column-inner ">
    			<div class="wpb_wrapper">
					<div class="wpb_raw_code wpb_content_element wpb_raw_html">
						<div class="wpb_wrapper">
							<style>
								li.vid-cat-button {margin-left:0; background:#ccc; border-bottom: #003d66 1px solid; font-weight:700;}
								li.vid-cat-button a {padding:10px 12px; color:#111; display:block; text-decoration:none;}
								li.vid-cat-button a:hover {background:#eeeeee;}
								.block-title {background:#003d66; padding:14px 12px;  margin-top:5px; color:#fff; border:none; margin-bottom:0px;}
								ul {list-style:none; margin-top:0;}
							</style>
							<div class="block-title">Video Categories</div>
							<ul style="padding-left: 0;">
								<li class="vid-cat-button"><a href="/video/" alt="Featured">Featured</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=stories" alt="Stories">Stories</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=conservation" alt="Conservation">Conservation</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=voices-of-agriculture" alt="Voices of Agriculture">Voices of Agriculture</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=tfbf-public-policy" alt="Public Policy">TFBF Public Policy</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=tfbf-convention" alt="TFBF Convention">TFBF Convention</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=education-resources" alt="Education Resources">Education Resources</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=young-farmers" alt="Young Farmers">Young Farmers</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=shooting-hunger" alt="Shooting Hunger">Shooting Hunger</a></li>								
								<li class="vid-cat-button"><a href="/video/?cat=virtual-farm-day" alt="Virtual Farm Day">Virtual Farm Day</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=still-farming" alt="Still Farming">Still Farming</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=presidents-conference" alt="President's Conference'">President's Conference</a></li>
								<li class="vid-cat-button"><a href="/video/?cat=live" alt="Live Events'">Live Events</a></li>
<!-- 								<li class="vid-cat-button"><a href="https://www.youtube.com/channel/UC0ZndKW6CXbeucy_g6aadeg" target="_blank" alt="Governer's Fridays">Gov. Lee Fridays from the Farm</a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end left column -->
		<div class="wpb_column vc_column_container col-md-9">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<div class="wpb_raw_code wpb_content_element wpb_raw_html">
						<div class="wpb_wrapper">
							<?php
							if (!isset($_GET['cat'])) {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="300" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" video_preview_type="top_view" preview_display_first="1" preview_gallery="" preview_autoplay="" preview_related="" preview_information="" enable_carousel="yes" carousel_speed="300" carousel_autoplay="" carousel_autoplay_speed="3000" carousel_pause_on_hover="" carousel_infinite="" carousel_center_mode="" carousel_rows="1" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZQUXsWEKBgw5uHothWgYtoc" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'conservation') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZSeHuBAM-MG9-orPJ6G_XOo" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'voices-of-agriculture') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZTxf1VNYquqH81yGNAU6dCD" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'tfbf-public-policy') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZSgW4ldV_aZ7v3MYvXfWacj" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'tfbf-convention') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZQ3S9AQvYvtR_R_QuweLrkY" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'presidents-conference') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZQtCQqkFksJ-QtgwMOtWenZ" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'still-farming') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZSCi2DU-gaMmP8bS9BG04uG" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'education-resources') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZS4F8WZFQgT_nb-VdRqeLbA" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'young-farmers') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZQIHj8jEEFZ2K_GFyQLgPdA" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'shooting-hunger') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZSevngZ8R79lJxTBa-lgUNy" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'stories') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZRP6IhcDcwOPNo1jfgsjf-8" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'virtual-farm-day') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZSt_SNaX1VLUs3s-5Rcdqvw" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							} else if (isset($_GET['cat']) && $_GET['cat'] == 'live') {
								echo do_shortcode('[sbvcytc template="3" layout="fitrows" results_per_page="20" title_font_size="15" title_font_weight="700" enable_description="" enable_hd_tag="" enable_video_views="" enable_video_likes="" preview_autoplay="" preview_related="1" preview_information="" enable_carousel="" user_id="TNFarmBureau" channel_id="UCwmT28TeQg6VEa-nJtOGyvQ" playlist_id="PL8d5oAg7h1ZREIwTF0i7XngKagISEDhWs" api_key="AIzaSyBBSGBP6RaexAQqkFWmvjrvnPGrSbzGW3U"]');
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
					</div><!--.main-content-->
				</div><!--.<?php echo esc_html( visualcomposerstarter_get_maincontent_block_class() ); ?>-->

				<?php if ( visualcomposerstarter_get_sidebar_class() ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

			</div><!--.row-->
		</div><!--.content-wrapper-->
	</div><!--.<?php echo esc_html( visualcomposerstarter_get_content_container_class() ); ?>-->
<?php get_footer();
