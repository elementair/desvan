<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	

	$meta_boxes['emails_metabox'] = array(
		'id'         => 'emails_metabox',
		'title'      => __( 'información de los emails', 'cmb' ),
		'pages'      => array( 'emails', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'       => __( 'Email', 'cmb' ),
				'desc'       => __( 'Inserte el email del usuario', 'cmb' ),
				'id'         => $prefix . 'email',
				'type'       => 'text_medium',
			),

			array(
				'name'    => __( 'Activo', 'cmb' ),
				'desc'    => __( 'Estado de la suscripción', 'cmb' ),
				'id'      => $prefix . 'activo',
				'type'    => 'select',
				'options' => array(
					'0' => __( 'Desactivado', 'cmb' ),
					'1'   => __( 'Activo', 'cmb' )
					
				),
			),
			),
	);


	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}