<?php
/**
 * Todd Productions Inc. Theme Customizer
 *
 * @package Todd Productions Inc.
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function siferds_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	* Adding Custom Controls For Todd Productions Inc.
	**/

	//Custom Control For Phone Number
	$wp_customize->add_setting( 'siferds_ohio_phone' , array(
		'default' => '(###)  ### - ####',
		'sanitize_callback' => 'sanitize_text_field'
		));
	$wp_customize->add_setting( 'siferds_michigan_phone' , array(
		'default' => '(###)  ### - ####',
		'sanitize_callback' => 'sanitize_text_field'
		));
	$wp_customize->add_setting( 'siferds_ohio_address' , array(
		'sanitize_callback' => 'sanitize_text_field'
		));
	$wp_customize->add_setting( 'siferds_michigan_address' , array(
		'sanitize_callback' => 'sanitize_text_field'
		));

		$wp_customize->add_control(
	    new WP_Customize_Control(
	        $wp_customize,
	        'siferds_ohio_phone',
	        array(
	            'label' => __( 'Ohio Phone', 'tp' ),
	            'type' => 'text',
							'section' => 'title_tagline'
							)
	    ));

		$wp_customize->add_control(
					new WP_Customize_Control(
							$wp_customize,
							'siferds_michigan_phone',
							array(
									'label' => __( 'Michigan Phone', 'tp' ),
									'type' => 'text',
									'section' => 'title_tagline'
									)
					));

			$wp_customize->add_control(
						new WP_Customize_Control(
								$wp_customize,
								'siferds_ohio_address',
								array(
										'label' => __( 'Ohio Address', 'tp' ),
										'type' => 'text',
										'section' => 'title_tagline'
										)
						));

			$wp_customize->add_control(
						new WP_Customize_Control(
								$wp_customize,
								'siferds_michigan_address',
								array(
										'label' => __( 'Michigan Address', 'tp' ),
										'type' => 'text',
										'section' => 'title_tagline'
										)
						));

}
add_action( 'customize_register', 'siferds_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function siferds_customize_preview_js() {
	wp_enqueue_script( 'siferds_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'siferds_customize_preview_js' );
