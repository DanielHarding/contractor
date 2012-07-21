<?php
/**
 * Now Theme Options
 *
 * @package Now
 * @since Now 1.0
 */

/**
 * Register the form setting for our contractor_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to registerNowetting() registers a validation callback, contractor_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are properly
 * formatted, and safe.
 *
 * @since Now 1.0
 */
function contractor_theme_options_init() {
	register_setting(
		'contractor_options',       // Options group, see settings_fields() call in contractor_theme_options_render_page()
		'contractor_theme_options', // Database option, see contractor_get_theme_options()
		'contractor_theme_options_validate' // The sanitization callback, see contractor_theme_options_validate()
	);

	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see contractor_theme_options_add_page()
	);

	// Register our individual settings fields
	add_settings_field(
		'live_mode', // Unique identifier for the field for this section
		__( 'Website Live Mode', 'contractor' ), // Setting field label
		'contractor_settings_field_live_mode_checkbox', // Function that renders the settings field
		'theme_options', // Menu slug, used to uniquely identify the page; see contractor_theme_options_add_page()
		'general' // Settings section. Same as the first argument in the add_settings_section() above
	);

	add_settings_field( 'blog_feed_url', __( 'Blog Feed URL', 'contractor' ), 'contractor_settings_field_blog_feed_url_input', 'theme_options', 'general' );
	add_settings_field( 'blog_item_limit', __( 'Blog Item Limit', 'contractor' ), 'contractor_settings_field_blog_item_limit_select_options', 'theme_options', 'general' );
	// add_settings_field( 'sample_radio_buttons', __( 'Sample Radio Buttons', 'contractor' ), 'contractor_settings_field_sample_radio_buttons', 'theme_options', 'general' );
	
	add_settings_field( 'company_address', __( 'Company Address', 'contractor' ), 'contractor_settings_field_company_address_textarea', 'theme_options', 'general' );
}
add_action( 'admin_init', 'contractor_theme_options_init' );

/**
 * Change the capability required to save the 'contractor_options' options group.
 *
 * @see contractor_theme_options_init() First parameter to registerNowetting() is the name of the options group.
 * @see contractor_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function contractor_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_contractor_options', 'contractor_option_page_capability' );

/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since Now 1.0
 */
function contractor_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'contractor' ),   // Name of page
		__( 'Theme Options', 'contractor' ),   // Label in menu
		'edit_theme_options',                    // Capability required
		'theme_options',                         // Menu slug, used to uniquely identify the page
		'contractor_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', 'contractor_theme_options_add_page' );

/**
 * Returns an array of sample select options registered for Now.
 *
 * @since Now 1.0
 */
function contractor_blog_item_limit_select_options() {
	$sample_select_options = array(
		'0' => array(
			'value' =>	'0',
			'label' => __( '0', 'contractor' )
		),
		'1' => array(
			'value' =>	'1',
			'label' => __( '1', 'contractor' )
		),
		'2' => array(
			'value' => '2',
			'label' => __( '2', 'contractor' )
		),
		'3' => array(
			'value' => '3',
			'label' => __( '3', 'contractor' )
		),
		'4' => array(
			'value' => '4',
			'label' => __( '4', 'contractor' )
		),
		'5' => array(
			'value' => '5',
			'label' => __( '5', 'contractor' )
		)
	);

	return apply_filters( 'contractor_sample_select_options', $sample_select_options );
}

/**
 * Returns an array of sample radio options registered for Now.
 *
 * @since Now 1.0
 */
function contractor_sample_radio_buttons() {
	$sample_radio_buttons = array(
		'yes' => array(
			'value' => 'yes',
			'label' => __( 'Yes', 'contractor' )
		),
		'no' => array(
			'value' => 'no',
			'label' => __( 'No', 'contractor' )
		),
		'maybe' => array(
			'value' => 'maybe',
			'label' => __( 'Maybe', 'contractor' )
		)
	);

	return apply_filters( 'contractor_sample_radio_buttons', $sample_radio_buttons );
}

/**
 * Returns the options array for Now.
 *
 * @since Now 1.0
 */
function contractor_get_theme_options() {
	$saved = (array) get_option( 'contractor_theme_options' );
	$defaults = array(
		'live_mode'       => 'off',
		'blog_feed_url'     => 'http://www.nowpensions-blog.com/feed/',
		'blog_item_limit' => '1',
		'sample_radio_buttons'  => '',
		'company_address'       => 'NOW: Pensions
									Berkeley Square House
									Berkeley Square
									London W1J 6BD
									United Kingdom'
	);

	$defaults = apply_filters( 'contractor_default_theme_options', $defaults );

	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );

	return $options;
}

/**
 * Renders the sample checkbox setting field.
 */
function contractor_settings_field_live_mode_checkbox() {
	$options = contractor_get_theme_options();
	?>
	<label for"live-mode">
		<input type="checkbox" name="contractor_theme_options[live_mode]" id="live-mode" <?php checked( 'on', $options['live_mode'] ); ?> />
		<?php _e( 'Use Live instance for all 3rd party components.', 'contractor' );  ?>
	</label>
	<?php
}

/**
 * Renders the sample text input setting field.
 */
function contractor_settings_field_blog_feed_url_input() {
	$options = contractor_get_theme_options();
	?>
	<input type="text" name="contractor_theme_options[blog_feed_url]" id="blog-feed-url" value="<?php echo esc_attr( $options['blog_feed_url'] ); ?>" />
	<label class="description" for="blog-feed-url"><?php _e( 'Blog URL', 'contractor' ); ?></label>
	<?php
}

/**
 * Renders the sample select options setting field.
 */
function contractor_settings_field_blog_item_limit_select_options() {
	$options = contractor_get_theme_options();
	?>
	<select name="contractor_theme_options[blog_item_limit]" id="blog-item-limit">
		<?php
			$selected = $options['blog_item_limit'];
			$p = '';
			$r = '';

			foreach ( contractor_blog_item_limit_select_options() as $option ) {
				$label = $option['label'];
				if ( $selected == $option['value'] ) // Make default first in list
					$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
				else
					$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
			}
			echo $p . $r;
		?>
	</select>
	<label class="description" for="sample_theme_options[blog-item-limit]"><?php _e( 'Blog Items', 'contractor' ); ?></label>
	<?php
}

/**
 * Renders the radio options setting field.
 *
 * @since Now 1.0
 */
function contractor_settings_field_sample_radio_buttons() {
	$options = contractor_get_theme_options();

	foreach ( contractor_sample_radio_buttons() as $button ) {
	?>
	<div class="layout">
		<label class="description">
			<input type="radio" name="contractor_theme_options[sample_radio_buttons]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['sample_radio_buttons'], $button['value'] ); ?> />
			<?php echo $button['label']; ?>
		</label>
	</div>
	<?php
	}
}

/**
 * Renders the sample textarea setting field.
 */
function contractor_settings_field_company_address_textarea() {
	$options = contractor_get_theme_options();
	?>
	<textarea class="large-text" type="text" name="contractor_theme_options[company_address]" id="company-address" cols="50" rows="10" /><?php echo esc_textarea( $options['sample_textarea'] ); ?></textarea>
	<label class="description" for="company-address"><?php _e( '', 'contractor' ); ?></label>
	<?php
}

/**
 * Renders the Theme Options administration screen.
 *
 * @since Now 1.0
 */
function contractor_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', 'contractor' ), get_current_theme() ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'contractor_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see contractor_theme_options_init()
 * @todo set up Reset Options action
 *
 * @param array $input Unknown values.
 * @return array Sanitized theme options ready to be stored in the database.
 *
 * @since Now 1.0
 */
function contractor_theme_options_validate( $input ) {
	$output = array();

	// Checkboxes will only be present if checked.
	if ( isset( $input['live_mode'] ) )
		$output['live_mode'] = 'on';

	// The sample text input must be safe text with no HTML tags
	if ( isset( $input['blog_feed_url'] ) && ! empty( $input['blog_feed_url'] ) )
		$output['blog_feed_url'] = wp_filter_nohtml_kses( $input['blog_feed_url'] );

	// The sample select option must actually be in the array of select options
	if ( isset( $input['blog_item_limit'] ) && array_key_exists( $input['blog_item_limit'], contractor_blog_item_limit_select_options() ) )
		$output['blog_item_limit'] = $input['blog_item_limit'];

	// The sample radio button value must be in our array of radio button values
	if ( isset( $input['sample_radio_buttons'] ) && array_key_exists( $input['sample_radio_buttons'], contractor_sample_radio_buttons() ) )
		$output['sample_radio_buttons'] = $input['sample_radio_buttons'];

	// The sample textarea must be safe text with the allowed tags for posts
	if ( isset( $input['company_address'] ) && ! empty( $input['company_address'] ) )
		$output['company_address'] = wp_filter_post_kses( $input['company_address'] );

	return apply_filters( 'contractor_theme_options_validate', $output, $input );
}
