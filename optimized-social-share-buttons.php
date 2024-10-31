<?php
/*
Plugin Name: Social Sharing Buttons (Optimized)
Plugin URI: http://crunchify.com/social-sharing-buttons-wordpress-plugin-no-javascript-loading/
Description: Fastest & Simplest Social Sharing Button without any Script Loading - WordPress Speed Optimization Goal.
Version: 1.2
Author: Crunchify
Author URI: http://crunchify.com
Text Domain: optimized-social-share-buttons
*/

/*
    Copyright (C) 2016 Crunchify.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function optimized_social_share_buttons_menu(){
  add_submenu_page("options-general.php", "Optimized Social Share", "Optimized Social Share", "manage_options", "optimized-social-share-buttons", "optimized_social_share_page"); 
}

add_action("admin_menu", "optimized_social_share_buttons_menu");

function optimized_social_share_page(){
   ?>
      <div class="wrap">
         <h1>Optimized Social Sharing Buttons Options By <a href="http://crunchify.com/social-sharing-buttons-wordpress-plugin-no-javascript-loading/" target="_blank">Strikable</a></h1>
         
         <form method="post" action="options.php">
            <?php
               settings_fields("optimized_social_share_config_section");
 
               do_settings_sections("optimized-social-share-buttons");
                
               submit_button(); 
            ?>
         </form>
         
        <div class="postbox" style="width: 65%; padding: 20px;">
        <h3>Follow us to get latest update. DM me on Twitter for quick reply.</h3>
        <a href="https://twitter.com/Crunchify" class="twitter-follow-button" data-show-count="false">Follow @Crunchify</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

         <div id="fb-root"></div>
				<script>(function(d, s, id) {
 				 var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
 				 fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			
		<div class="fb-like" data-href="https://www.facebook.com/Crunchify" data-width="50px" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
		</div>
      </div>
   <?php
}

function optimized_social_share_buttons_settings(){
    add_settings_section("optimized_social_share_config_section", "", null, "optimized-social-share-buttons");
 
    add_settings_field("optimized-social-share-facebook", "Enable your sharing services", "optimized_social_share_checkbox", "optimized-social-share-buttons", "optimized_social_share_config_section");
    add_settings_field("optimized-social-share-twitter-name", "More custom Options", "optimized_social_share_strikable_options", "optimized-social-share-buttons", "optimized_social_share_config_section");
 
    register_setting("optimized_social_share_config_section", "optimized-social-share-facebook");
    register_setting("optimized_social_share_config_section", "optimized-social-share-twitter");
    register_setting("optimized_social_share_config_section", "optimized-social-share-twitter-name");
    register_setting("optimized_social_share_config_section", "optimized-social-share-googleplus");
    register_setting("optimized_social_share_config_section", "optimized-social-share-buffer");
    register_setting("optimized_social_share_config_section", "optimized-social-share-pinterest");

    register_setting("optimized_social_share_config_section", "optimized-social-share-strikable-rel-nofollow");
    register_setting("optimized_social_share_config_section", "optimized-social-share-strikable-custom-label");
    register_setting("optimized_social_share_config_section", "optimized-social-share-email");
}

function optimized_social_share_checkbox(){  
   ?>
    <div class="postbox" style="width: 65%; padding: 30px;">
        <input type="checkbox" name="optimized-social-share-facebook" value="1" <?php checked(1, get_option('optimized-social-share-facebook'), true); ?> /> Facebook
        <br><br><input type="checkbox" name="optimized-social-share-twitter" value="1" <?php checked(1, get_option('optimized-social-share-twitter'), true); ?> /> Twitter
        <br><br><input type="checkbox" name="optimized-social-share-googleplus" value="1" <?php checked(1, get_option('optimized-social-share-googleplus'), true); ?> /> Google+
        <br><br><input type="checkbox" name="optimized-social-share-buffer" value="1" <?php checked(1, get_option('optimized-social-share-buffer'), true); ?> /> Buffer
        <br><br><input type="checkbox" name="optimized-social-share-pinterest" value="1" <?php checked(1, get_option('optimized-social-share-pinterest'), true); ?> /> Pinterest
        <br><br><input type="checkbox" name="optimized-social-share-email" value="1" <?php checked(1, get_option('optimized-social-share-email'), true); ?> /> Email
    </div>
   <?php
}

function optimized_social_share_strikable_options(){  
   ?>
   <div class="postbox" style="width: 65%; padding: 30px;">
        <input type="checkbox" name="optimized-social-share-strikable-rel-nofollow" value="1" <?php checked(1, get_option('optimized-social-share-strikable-rel-nofollow'), true); ?> /> add rel="nofollow" to all links
        <br><br><input type="text" name="optimized-social-share-twitter-name" value="<?php echo esc_attr(get_option('optimized-social-share-twitter-name')); ?>" /> Twitter Username (without @)
        <br><br><input type="text" name="optimized-social-share-strikable-custom-label" value="<?php echo esc_attr(get_option('optimized-social-share-strikable-custom-label')); ?>" /> Custom Header
   </div>
   <?php
}
 
add_action("admin_init", "optimized_social_share_buttons_settings");



function add_optimized_social_share_buttons($content) {
	
		// Get current page URL 
		$strikableURL = get_permalink();
 
		// Get current page title
		$strikableTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$strikableThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
        $twitterUserName = get_option("optimized-social-share-twitter-name");
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$strikableTitle.'&amp;url='.$strikableURL.'&amp;via='.$twitterUserName;

		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$strikableURL;
		$googleURL = 'https://plus.google.com/share?url='.$strikableURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$strikableURL.'&amp;text='.$strikableTitle;
		
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$strikableURL.'&amp;media='.$strikableThumbnail[0].'&amp;description='.$strikableTitle;
 		$emailURL = 'mailto:?subject=' . $strikableTitle . '&amp;body=Check out this site: '. $strikableURL .'" title="Share by Email';
 
 		if(get_option("optimized-social-share-strikable-rel-nofollow") == 1){
 			$rel_nofollow = 'rel="nofollow"';
 		}else{
 			$rel_nofollow = '';
 		}
 
		// Add sharing button at the end of page/page content
		$content .= '<div class="strikable-social">';
		$content .= '<!-- Social Sharing Buttons (Optimized) Plugin without any Java Script Loading by Strikable.com - START-->';
		$content .= '<h5>'.get_option("optimized-social-share-strikable-custom-label").'</h5>';
		
        if(get_option("optimized-social-share-facebook") == 1){
			$content .= '<a class="strikable-link strikable-facebook" href="'.$facebookURL.'" target="_blank" '. $rel_nofollow .'>Facebook</a>';
        }
        if(get_option("optimized-social-share-twitter") == 1){
			$content .= '<a class="strikable-link strikable-twitter" href="'. $twitterURL .'" target="_blank" '. $rel_nofollow .'>Twitter</a>';
        }
        if(get_option("optimized-social-share-googleplus") == 1){
			$content .= '<a class="strikable-link strikable-googleplus" href="'.$googleURL.'" target="_blank" '. $rel_nofollow .'>Google+</a>';
        }
        if(get_option("optimized-social-share-buffer") == 1){
			$content .= '<a class="strikable-link strikable-buffer" href="'.$bufferURL.'" target="_blank" '. $rel_nofollow .'>Buffer</a>';
        }
        if(get_option("optimized-social-share-pinterest") == 1){
			$content .= '<a class="strikable-link strikable-pinterest" href="'.$pinterestURL.'" target="_blank" '. $rel_nofollow .'>Pin It</a>';
        }
        if(get_option("optimized-social-share-email") == 1){
			$content .= '<a class="strikable-link strikable-email" href="'.$emailURL.'" target="_blank" '. $rel_nofollow .'>Email</a>'; 
        }
        $content .= '<!-- Social Sharing Buttons (Optimized) - END-->';

		$content .= '</div>';
		return $content;
};

add_filter( 'the_content', 'add_optimized_social_share_buttons');

function optimized_social_share_style() 
{
    wp_register_style("optimized-social-share-style-file", plugin_dir_url(__FILE__) . "optimized-social-share-buttons.css");
    wp_enqueue_style("optimized-social-share-style-file");
}

add_action("wp_enqueue_scripts", "optimized_social_share_style");