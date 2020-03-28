<?php

class Suscriptflech_Admin {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		/*
		 * SUSCRIPTFLECH :
		 *
		 * - Uncomment following lines if the admin class should only be available for super admins
		 */
		/* if( ! is_super_admin() ) {
			return;
		} */

		/*
		 * Call $plugin_slug from public plugin class.
		 *
		 * SUSCRIPTFLECH:
		 *
		 * - Rename "Plugin_Name" to the name of your initial plugin class
		 *
		 */
		$plugin = Suscriptflech::get_instance();
		$this->plugin_slug = $plugin->get_plugin_slug();

		// Load admin style sheet and JavaScript.
		//add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		// Add the options page and menu item.
		//add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename( plugin_dir_path( realpath( dirname( __FILE__ ) ) ) . $this->plugin_slug . '.php' );
		add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );

		/*
		 * Define custom functionality.
		 *
		 * Read more about actions and filters:
		 * http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
		 */
		add_action( 'Suscriptflech', array( $this, 'action_method_name' ) );
		add_filter( 'Suscriptflech', array( $this, 'filter_method_name' ) );
                add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
                $email = get_options_page('activar_envio_entrada');
                if(empty($email)){$email = 'si';};
                if($email == "si"){
                   add_action('publish_post', array($this, 'mandar_email_usuario_suscritos')); 
                }                         
	}
        public function mandar_email_usuario_suscritos($post_id)
        {
            if(($_POST['post_status'] == 'publish') && ( $_POST['original_post_status'] != 'publish'))
            {
                
                // Sacamos datos del author
                $post = get_post($post_id);
                $author = get_userdata($post->post_author);
                
                // Comprobamos que usuarios estan activos
                $comprobar_activo = new WP_Query(array(
                    'post_type' => 'emails',
                    'meta_query' => array(
                        array(
                           'key' => '_activo',
                           'value' => 1,
                           'compare' => '='
                        )
                     )
                ));
               
                $data =  array();
                
                foreach ($comprobar_activo->posts as $key=> $email){
                    $id = $email->ID;
                    $data[] = array(
                        'id' => $id,
                        'email' => get_post_meta($id, '_email', true)
                    );
                }
                              
                if(!empty($data))
                {
                    $plantilla = get_options_page('color_plantilla');
                    if(empty($plantilla)){ $plantilla = "default";}
                    //Plantilla email
                    $email_subject = "Novedades de ".$author->display_name;
                    ob_start();
                    require_once "views/plantilla/".$plantilla.".php";
                    $mensaje = ob_get_contents();
                    ob_end_clean();
                    
                    foreach ($data as $key => $datosemail) {
                        
                        $email_usuario = $datosemail['email'];
                        
                        wp_mail($email_usuario, $email_subject, $mensaje, 'Content-type: text/html');
                        
                    }
                    
                }                 
              
            }
        }
        public function getSubString($string, $length=null)
        {
            if ($length == null)$length = 300;
            $stringLimpio = substr(strip_tags($string), 0, $length);
            if (strlen(strip_tags($string)) > $length)$stringLimpio .= ' ...';
            return $stringLimpio;
        }
	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		/*
		 * SUSCRIPTFLECH :
		 *
		 * - Uncomment following lines if the admin class should only be available for super admins
		 */
		/* if( ! is_super_admin() ) {
			return;
		} */

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * SUSCRIPTFLECH:
	 *
	 * - Rename "Plugin_Name" to the name your plugin
	 *
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_styles() {

		
		/*$screen = get_current_screen();
		if ( $this->plugin_screen_hook_suffix == $screen->id ) {*/
		wp_enqueue_style( $this->plugin_slug .'-admin-styles', plugins_url( 'assets/css/admin.css', __FILE__ ), array(), Suscriptflech::VERSION );
		/*}*/

	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * SUSCRIPTFLECH:
	 *
	 * - Rename "Plugin_Name" to the name your plugin
	 *
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_scripts() {

		/*if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		$screen = get_current_screen();*/
		/*if ( $this->plugin_screen_hook_suffix == $screen->id ) {*/
			wp_enqueue_script( $this->plugin_slug . '-admin-script', plugins_url( 'assets/js/admin.js', __FILE__ ), array( 'jquery' ), Suscriptflech::VERSION );
		/*}*/

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		/*
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 *
		 * SUSCRIPTFLECH:
		 *
		 * - Change 'Page Title' to the title of your plugin admin page
		 * - Change 'Menu Text' to the text for menu item for the plugin settings page
		 * - Change 'manage_options' to the capability you see fit
		 *   For reference: http://codex.wordpress.org/Roles_and_Capabilities
		 */
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Configuración de suscriptflech', $this->plugin_slug ),
			__( 'Suscriptflech config', $this->plugin_slug ),
			'manage_options',
			$this->plugin_slug,
			array( $this, 'display_plugin_admin_page' )
		);

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {
		include_once( 'views/admin.php' );
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	public function add_action_links( $links ) {

		return array_merge(
			array(
				'settings' => '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_slug ) . '">' . __( 'Settings', $this->plugin_slug ) . '</a>'
			),
			$links
		);

	}

	/**
	 * NOTE:     Actions are points in the execution of a page or process
	 *           lifecycle that WordPress fires.
	 *
	 *           Actions:    http://codex.wordpress.org/Plugin_API#Actions
	 *           Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
	 *
	 * @since    1.0.0
	 */
	public function action_method_name() {
		// SUSCRIPTFLECH: Define your action hook callback here
	}

	/**
	 * NOTE:     Filters are points of execution in which WordPress modifies data
	 *           before saving it or sending it to the browser.
	 *
	 *           Filters: http://codex.wordpress.org/Plugin_API#Filters
	 *           Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
	 *
	 * @since    1.0.0
	 */
	public function filter_method_name() {
		// SUSCRIPTFLECH: Define your filter hook callback here
	}

}
