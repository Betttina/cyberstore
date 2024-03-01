<?php


/* Social media customize */
function custom_theme_settings_page() {
	// Create a section-page in Appearance
	add_theme_page( 'Social Media Settings', 'Social Media Settings', 'manage_options', 'social-media-settings', 'render_social_media_settings_page' );
}
add_action( 'admin_menu', 'custom_theme_settings_page' );



function render_social_media_settings_page() {
	?>
	<div class="wrap">
		<h1>Social Media Settings</h1>
		<form method="post" action="options.php">
			<?php settings_fields( 'social-media-settings-group' ); ?>
			<?php do_settings_sections( 'social-media-settings-group' ); ?>
			<table class="form-table">
                <tr valign="top">
                    <th scope="row">Twitter Link</th>
                    <td><input type="text" name="twitter_link" value="<?php echo esc_attr( get_option('twitter_link') ); ?>" /></td>
                </tr>
				<tr valign="top">
					<th scope="row">Facebook Link</th>
					<td><input type="text" name="facebook_link" value="<?php echo esc_attr( get_option('facebook_link') ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row">Tiktok Link</th>
					<td><input type="text" name="tiktok_link" value="<?php echo esc_attr( get_option('tiktok_link')
						); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row">Instagram Link</th>
					<td><input type="text" name="instagram_link" value="<?php echo esc_attr( get_option('instagram_link') ); ?>" /></td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

function setup_theme_settings() {
	// setting-fields for social media-links
	register_setting( 'social-media-settings-group', 'facebook_link' );
	register_setting( 'social-media-settings-group', 'twitter_link' );
	register_setting( 'social-media-settings-group', 'tiktok_link' );
	register_setting( 'social-media-settings-group', 'instagram_link' );
}
add_action( 'admin_init', 'setup_theme_settings' );