<?php
/**
 * Plugin Name: Webmob Social
 * Plugin URI: http://webmobtech.com
 * Description: This plugin adds social links on your website.
 * Version: 1.0.0
 * Author: Sarvesh Patel
 * Author URI: http://webmobtech.com
 * License: GPL2
 */
 
 
 add_action('admin_menu', 'webmob_social');
 
 // action function for above hook
function webmob_social() {


	global $wpdb;
	$current_user = wp_get_current_user();
	$user_id =  $current_user->ID;
	$user = new WP_User( $user_id );
	$user_role = $user->roles[0];
	add_menu_page(__('Webmob Social Links','webmob_social'), __('Webmob Social Links','add-player'), 'subscriber', 'webmob_social_links', 'webmob_social_links');


}


function webmob_social_links(){
	
		if(isset($_POST['submit'])){
			extract($_POST);
			update_option( 'twitter_url', $twitter_url, '', 'yes' );
			update_option( 'facebook_url', $facebook_url, '', 'yes' );
			
		}
		
		
		
?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Twitter Url</td>
				<td><input type="text" value="<?php echo get_option( 'twitter_url' ); ?>" name="twitter_url" /></td>
			</tr>
			<tr>
				<td>Facebook Url</td>
				<td><input type="text" value="<?php echo get_option( 'facebook_url' ); ?>" name="facebook_url" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="update" name="submit" /></td>
			</tr>
		</table>
	</form>
<?php		
		

}