<?php
require_once('PHPExcel.php');

class Custom_PostTypes {
	
	
    function __construct() {
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
        add_action('init', array($this, 'register_post_types'), 0);
        add_action('admin_menu', array($this, 'registrarSubmenuEnvioEmailsSucriptflech'));
        add_action('wp_ajax_emailenvio', array($this, 'mandar_mensaje_suscriptflech_admin'));
        add_action('wp_ajax_nopriv_emailenvio', array($this, 'mandar_mensaje_suscriptflech_admin'));
        add_action('restrict_manage_posts', array($this, 'botones'));     
		$this->exportoExcelPdf();
    }

    function botones($post_id) {
        if ($post_id == "emails") {
            echo $this->get_template_email('reportes/excel');
        } 
    }
    function exportoExcelPdf() {
        if (is_admin()) 
		{		
			add_action('init', array($this, 'mandar_excel_sucriptores'));
		}											
    }

    function mandar_excel_sucriptores() {
        if (empty($_GET['excel'])) {
            $ex = "";
        } else {
            $ex = $_GET['excel'];
        }
        
        if ($ex == 1) {
            $excel = new PHPExcel();
            $excel->getProperties()
                    ->setTitle("Listado suscriptores")
                    ->setDescription("");
            $sheet = $excel->getActiveSheet();
            $sheet->setTitle("Reportes de suscriptores");
            $sheet->getColumnDimension('A')->setWidth(20);
            $sheet->setCellValue("A1", "Email");
            $sheet->setCellValue("B1", "Estado");

            $comprobar_activo = new WP_Query(array('post_type' => 'emails'));

            $data = array();
            foreach ($comprobar_activo->posts as $key => $email) {
                $id = $email->ID;
                $data[] = array(
                    'id' => $id,
                    'email' => get_post_meta($id, '_email', true),
                    'activo' => get_post_meta($id, '_activo', true)
                );
            }
			if($data)
			{
				$i = 0;
				foreach ($data as $key => $datosexcel) {
					if ($datosexcel["activo"] == 1) {
						$activo = "Activado";
					} else {
						$activo = "Desactivado";
					}
					$i++;
					$sheet->setCellValue("A" . $i, $datosexcel["email"]);
					$sheet->setCellValue("B" . $i, $activo);
				}


				header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
				$nombre = "Reporte_de_Suscriptores_excel_" . date("YmdHis");
				header("Content-Disposition: attachment;filename=" . $nombre . ".xls");
				header('Cache-Control: max-age=0');

				$writer = PHPExcel_IOFactory::createWriter($excel, "Excel5");
				$writer->save("php://output");
				exit;
			}
        } 
    }

    function activate() {
        $this->register_post_types();
        $this->register_taxonomies();
        flush_rewrite_rules();
    }

    function deactivate() {
        flush_rewrite_rules();
    }

    public function mandar_mensaje_suscriptflech_admin() {
        $plantilla = get_options_page('color_plantilla');
        if (wp_verify_nonce($_POST['nonce'], 'ajax_suscriptflech_emais_user_options_nonce')) {

            if (!empty($_POST["titulo"]) and ! empty($_POST["mensaje"]) and ! empty($_POST["email"])) {
                $datos = array(
                    'mensaje' => $_POST["mensaje"],
                    'titulo' => $_POST["titulo"]
                );

                if ($_POST['email'] != 'todos') {
                    if (is_email($_POST["email"])) {
                        $email_subject = "Novedades de " . get_bloginfo('name');
                        if (empty($plantilla)) {
                            $plantilla = "default";
                        }
                        $mensaje = $this->get_template_email('envioemails/' . $plantilla, $datos);

                        echo 'res';
                        wp_mail($_POST['email'], $email_subject, $mensaje, 'Content-type: text/html');
                    } else {
                        echo '2';
                    }
                } else {
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

                    $data = array();


                    foreach ($comprobar_activo->posts as $key => $email) {
                        $id = $email->ID;
                        $data[] = array(
                            'id' => $id,
                            'email' => get_post_meta($id, '_email', true)
                        );
                    }

                    if (!empty($data)) {

                        $email_subject = "Novedades de " . get_bloginfo('name');
                        if (empty($plantilla)) {
                            $plantilla = "default";
                        }
                        $mensaje = $this->get_template_email('envioemails/' . $plantilla, $datos);

                        foreach ($data as $key => $datosemail) {

                            $email_usuario = $datosemail['email'];

                            wp_mail($email_usuario, $email_subject, $mensaje, 'Content-type: text/html');
                        }

                        echo 'res';
                    }
                }
            } else {
                echo '1';
            }
        }
    }

    function registrarSubmenuEnvioEmailsSucriptflech() {
        add_submenu_page('edit.php?post_type=emails', 'Settings', 'Enviar emails', 'manage_options', 'envioemails', array($this, 'envioEmails'));
    }

    function envioEmails() {
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

        $data = array();

        foreach ($comprobar_activo->posts as $key => $email) {
            $id = $email->ID;
            $data[] = array(
                'id' => $id,
                'email' => get_post_meta($id, '_email', true)
            );
        }

        echo $mensaje = $this->get_template_email('envioemails/enviaremails', $data);
    }

    public static function get_template_email($view, $data = null, $video = null) {

        ob_start();

        require(plugin_dir_path(__FILE__) . $view . '.php');

        $var = ob_get_contents();

        ob_end_clean();

        return $var;
    }

    function register_post_types() {
        if (isset($_REQUEST['action']) && 'deactivate' == $_REQUEST['action']) {
            return;
        }


        register_post_type('emails', array(
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => "emails", 'with_front' => true),
            'capability_type' => 'post',
            'has_archive' => 'emails',
            'hierarchical' => false,
            'menu_position' => 99,
            'menu_icon' => 'dashicons-email-alt',
            'supports' => array(
                //'title',
                //'editor',
                //'author',
                //'thumbnail',
                //'excerpt',
                // 'trackbacks',
                // 'comments',
                'revisions'
            ),
            'labels' => array(
                'name' => 'Suscriptores',
                'singular_name' => 'Suscriptores',
                'add_new' => 'Añadir suscriptor',
                //'all_items'			=> 'Todos',
                'add_new_item' => 'Añadir nuevo',
                'edit_item' => 'Editar',
                'new_item' => 'Nuevo',
                'view_item' => 'Ver',
                'search_items' => 'Buscar',
                'not_found' => 'Item no encontrado',
                'not_found_in_trash' => 'Item no encontrado',
                'parent_item_colon' => '',
                'menu_name' => 'Suscriptores'
            )
                )
        );
    }

}

class Custom_Taxonomies {

    function __construct() {
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
        add_action('init', array($this, 'register_taxonomies'), 0);
    }

    function activate() {
        $this->register_post_types();
        $this->register_taxonomies();
        flush_rewrite_rules();
    }

    function deactivate() {
        flush_rewrite_rules();
    }

    function register_taxonomies() {
        if (isset($_REQUEST['action']) && 'deactivate' == $_REQUEST['action']) {
            return;
        }


        $this->define_columns(); // Llamamos a la funcion para las columnas
    }

    // Creamos las columnas personalizadas
    function define_columns() {

        add_filter('manage_edit-emails_columns', function( $columns ) {

            return array(
                'email' => __('Email', 'fx'),
                'activo' => __('Estado suscripción', 'fx'),
                'acciones' => __('Acciones', 'fx')
            );
        });

        add_action('manage_emails_posts_custom_column', function( $columns, $post_id ) {

            switch ($columns) {


                case 'email':

                    echo '<span class="dashicons dashicons-email-alt"></span> ' . get_post_meta($post_id, '_email', true);


                    break;

                case 'activo':

                    $estado = get_post_meta($post_id, '_activo', true);

                    if ($estado == "1") {

                        echo '<span class="activado">Activada</span>';
                    } else {
                        echo '<span class="desactivado">Desactivada</span>';
                    }

                    break;


                case 'acciones':

                    edit_post_link('Editar Email');
                    ?>
                    <a onclick="return confirm('¿Seguro que deseas eliminar este Email?')"  class="borrar" href="<?php echo get_delete_post_link($post_id, '', true); ?>">Borrar Email</a>

                    <?php
                    break;

                default:

                    break;
            }
        }, 10, 2);
    }

}
?>