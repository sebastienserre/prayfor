<?php
/*
Plugin Name: Pray for
Description: Because of some terrorist acts, you can now show your support to who you want by putting a ribbon that says "#prayforXXXX" on your site.
Version: 1.0.2
Author: Sébastien SERRE
Author URI: http://www.thivinfo.com
License: GPLv2
Text Domain: prayfor
*/

include_once plugin_dir_path( __FILE__ ).'/settings.php';

$options = get_option( 'prayfor_settings' );


if (isset($options['prayfor_checkbox_field_1'])) {
	add_action( 'wp_footer', 'baw_jsc_show_ribbon', PHP_INT_MAX );
	function baw_jsc_show_ribbon() {
		$options = get_option( 'prayfor_settings' );
		$ribbon = plugins_url( 'je-suis-charlie.png', __FILE__ );
		?>
		<a target="_blank" href="http://twitter.com/#prayfor<?php echo $options['prayfor_text_field_0'] ?>"><img src="<?php echo $ribbon; ?>" alt="#prayfor<?php echo $options['prayfor_text_field_0'] ?>"
		                                                               style="position: fixed; top: 0; right: 0; z-index: 100000;">
			<p style="position: fixed; top: 32px; right: -4px; z-index: 100000; color: white; transform: rotate(45deg);">
				#Prayfor<?php echo $options['prayfor_text_field_0'] ?></p></a>
		<?php
	}
}

if (isset($options['prayfor_checkbox_field_2'])) {
	add_action( 'wp_footer', 'baw_jsc_show_ribbon_left', PHP_INT_MAX );

	function baw_jsc_show_ribbon_left() {
		$options = get_option( 'prayfor_settings' );
		$ribbon = plugins_url( 'je-suis-charlie-left.png', __FILE__ );
		?>
		<a target="_blank" href="http://twitter.com/#prayfor<?php echo $options['prayfor_text_field_0'] ?>"><img src="<?php echo $ribbon; ?>" alt="#prayfor<?php echo $options['prayfor_text_field_0'] ?>"
		                                                               style="position: fixed; top: 0; left: 0; z-index: 100000;">
			<p style="position: fixed; top: 32px; left: -4px; z-index: 100000; color: white; transform: rotate(-45deg);">
				#Prayfor<?php echo $options['prayfor_text_field_0'] ?></p></a>
		<?php
	}
}

add_action( 'plugins_loaded', 'pf_load_textdomain');
function pf_load_textdomain() {
	load_plugin_textdomain( 'prayfor', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}


