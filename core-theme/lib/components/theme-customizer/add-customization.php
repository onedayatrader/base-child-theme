<?php
/**
 * This file adds the Customizer additions to the Genesis Sample Theme.
 *
 * @package core-theme\lib
 * @since 1.0.0
 * @author Aiden Potter
 * @link https://onedayatrader.com
 * @license GNU General Public License 2.0+
 */

// format namespace as: themeName\folder\folder\folder\etc...
// add folder name each time you drop into a subfolder
namespace  coreTheme\lib\components;

use WP_Customize_Color_Control;

add_action( 'customize_register', __NAMESPACE__ . '\register_settings_and_controls_with_customizer' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function register_settings_and_controls_with_customizer( $wp_customize ) {

	$prefix = get_theme_mod_name_prefix();

	$wp_customize->add_setting(
		$prefix . '_link_color',
		array(
			'default'           => get_default_link_color_from_customizer(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$prefix . '_link_color',
			array(
				'description' => __( 'Change the color of post info links, hover color of linked titles, hover color of menu items, and more.', CHILD_TEXT_DOMAIN ),
				'label'       => __( 'Link Color', CHILD_TEXT_DOMAIN ),
				'section'     => 'colors',
				'settings'    => $prefix . '_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		$prefix . '_accent_color',
		array(
			'default'           => get_default_accent_color_from_customizer(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$prefix . '_accent_color',
			array(
				'description' => __( 'Change the default hovers color for button.', CHILD_TEXT_DOMAIN ),
				'label'       => __( 'Accent Color', CHILD_TEXT_DOMAIN ),
				'section'     => 'colors',
				'settings'    => $prefix . '_accent_color',
			)
		)
	);

}
