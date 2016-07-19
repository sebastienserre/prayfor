<?php
add_action( 'admin_menu', 'prayfor_add_admin_menu' );
add_action( 'admin_init', 'prayfor_settings_init' );


function prayfor_add_admin_menu() {

	add_menu_page( '#prayfor', '#prayfor', 'manage_options', 'prayfor', 'prayfor_options_page' );

}


function prayfor_settings_init() {

	register_setting( 'pluginPage', 'prayfor_settings' );

	add_settings_section(
		'prayfor_pluginPage_section',
		__( 'Customize your Prayfor banner', 'prayfor' ),
		'prayfor_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'prayfor_text_field_0',
		__( 'Customized Text', 'prayfor' ),
		'prayfor_text_field_0_render',
		'pluginPage',
		'prayfor_pluginPage_section'
	);

	add_settings_field(
		'prayfor_checkbox_field_1',
		__( 'Add a baner in the Top Right Corner', 'prayfor' ),
		'prayfor_checkbox_field_1_render',
		'pluginPage',
		'prayfor_pluginPage_section'
	);

	add_settings_field(
		'prayfor_checkbox_field_2',
		__( 'Add a baner in the Top Left Corner', 'prayfor' ),
		'prayfor_checkbox_field_2_render',
		'pluginPage',
		'prayfor_pluginPage_section'
	);


}


function prayfor_text_field_0_render() {

	$options = get_option( 'prayfor_settings' );
	?>
	<input type='text' name='prayfor_settings[prayfor_text_field_0]'
	       value='<?php echo $options['prayfor_text_field_0']; ?>'>
	<?php

}


function prayfor_checkbox_field_1_render() {

	$options = get_option( 'prayfor_settings' );
	?>
	<input type='checkbox'
	       name='prayfor_settings[prayfor_checkbox_field_1]' <?php checked( $options['prayfor_checkbox_field_1'], 1 ); ?>
	       value='1'>
	<?php

}


function prayfor_checkbox_field_2_render() {

	$options = get_option( 'prayfor_settings' );
	?>
	<input type='checkbox'
	       name='prayfor_settings[prayfor_checkbox_field_2]' <?php checked( $options['prayfor_checkbox_field_2'], 1 ); ?>
	       value='1'>
	<?php

}


function prayfor_settings_section_callback() {

	//echo __( 'This section description', 'prayfor' );

}


function prayfor_options_page() {

	?>
	<form action='options.php' method='post'>

		<h2>#PrayFor</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}
