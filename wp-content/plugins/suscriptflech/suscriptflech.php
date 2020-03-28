<?php
/**
 *
 * @wordpress-plugin
 * Plugin Name:       Suscriptflech
 * Plugin URI:        http://www.webandroid.es
 * Description:       Plugin para la suscripción del sitio web mediante un Widget o un Modal, manda emails a los suscriptores cuando se inserta una entrada del blog.
 * Version:           3.5.4
 * Author:            Félix Luján
 * Author URI:        http://www.webandroid.es
 * Text Domain:       plugin-suscriptflech
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/


/*
 * CURSO:
 *
 * - Includes
 *
 */

require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/CPT.php' );
require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/custom-metaboxes/metabox.php' );
require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/custom-widget/plugin.php' );
require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/options/wpsf-test.php' );

$post_type = new Custom_PostTypes();
$post_taxonomies = new Custom_Taxonomies();



/*
 * SUSCRIPTFLECH:
 *
 * - replace `class-plugin-name.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-suscriptflech.php' );

//require_once( plugin_dir_path( __FILE__ ) . 'public/includes/options/wpsf-test.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * SUSCRIPTFLECH:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 */
register_activation_hook( __FILE__, array( 'Suscriptflech', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Suscriptflech', 'deactivate' ) );

/*
 * SUSCRIPTFLECH:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 */
add_action( 'plugins_loaded', array( 'Suscriptflech', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * SUSCRIPTFLECH:
 *
 * - replace `class-plugin-name-admin.php` with the name of the plugin's admin file
 * - replace Plugin_Name_Admin with the name of the class defined in
 *   `class-plugin-name-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-suscriptflech-admin.php' );
	add_action( 'plugins_loaded', array( 'Suscriptflech_Admin', 'get_instance' ) );

}
