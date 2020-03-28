<?php
/**
 * WordPress Settings Framework
 *
 * @author Gilbert Pellegrom, James Kemp
 * @link https://github.com/gilbitron/WordPress-Settings-Framework
 * @license MIT
 */

/**
 * Define your settings
 * 
 * The first parameter of this filter should be wpsf_register_settings_[options_group],
 * in this case "my_example_settings".
 * 
 * Your "options_group" is the second param you use when running new WordPressSettingsFramework()
 * from your init function. It's importnant as it differentiates your options from others.
 * 
 * To use the tabbed example, simply change the second param in the filter below to 'wpsf_tabbed_settings'
 * and check out the tabbed settings function on line 156.
 */
 
add_filter( 'wpsf_register_settings_suscriptflech_settings', 'wpsf_tabbed_settings' );

/**
 * Tabless example
 */
function wpsf_tabless_settings( $wpsf_settings ) {

    // General Settings section
    $wpsf_settings[] = array(
        'section_id' => 'general',
        'section_title' => 'General Settings',
        'section_description' => 'Some intro description about this section.',
        'section_order' => 5,
        'fields' => array(
            array(
                'id' => 'text',
                'title' => 'Text',
                'desc' => 'This is a description.',
                'placeholder' => 'This is a placeholder.',
                'type' => 'text',
                'std' => 'This is std'
            ),
            array(
                'id' => 'password',
                'title' => 'Password',
                'desc' => 'This is a description.',
                'placeholder' => 'This is a placeholder.',
                'type' => 'password',
                'std' => 'Example'
            ),
            array(
                'id' => 'textarea',
                'title' => 'Textarea',
                'desc' => 'This is a description.',
                'placeholder' => 'This is a placeholder.',
                'type' => 'textarea',
                'std' => 'This is std'
            ),
            array(
                'id' => 'select',
                'title' => 'Select',
                'desc' => 'This is a description.',
                'type' => 'select',
                'std' => 'green',
                'choices' => array(
                    'red' => 'Red',
                    'green' => 'Green',
                    'blue' => 'Blue'
                )
            ),
            array(
                'id' => 'radio',
                'title' => 'Radio',
                'desc' => 'This is a description.',
                'type' => 'radio',
                'std' => 'green',
                'choices' => array(
                    'red' => 'Red',
                    'green' => 'Green',
                    'blue' => 'Blue'
                )
            ),
            array(
                'id' => 'checkbox',
                'title' => 'Checkbox',
                'desc' => 'This is a description.',
                'type' => 'checkbox',
                'std' => 1
            ),
            array(
                'id' => 'checkboxes',
                'title' => 'Checkboxes',
                'desc' => 'This is a description.',
                'type' => 'checkboxes',
                'std' => array(
                    'red',
                    'blue'
                ),
                'choices' => array(
                    'red' => 'Red',
                    'green' => 'Green',
                    'blue' => 'Blue'
                )
            ),
            array(
                'id' => 'color',
                'title' => 'Color',
                'desc' => 'This is a description.',
                'type' => 'color',
                'std' => '#ffffff'
            ),
            array(
                'id' => 'file',
                'title' => 'File',
                'desc' => 'This is a description.',
                'type' => 'file',
                'std' => ''
            ),
            array(
                'id' => 'editor',
                'title' => 'Editor',
                'desc' => 'This is a description.',
                'type' => 'editor',
                'std' => ''
            )
        )
    );

    // More Settings section
    $wpsf_settings[] = array(
        'section_id' => 'more',
        'section_title' => 'More Settings',
        'section_order' => 10,
        'fields' => array(
            array(
                'id' => 'more-text',
                'title' => 'More Text',
                'desc' => 'This is a description.',
                'type' => 'text',
                'std' => 'This is std'
            ),
        )
    );

    return $wpsf_settings;
}

/**
 * Tabbed example
 */
function wpsf_tabbed_settings( $wpsf_settings ) {
    
    // Tabs
    
    // Tab 1
    $wpsf_settings['tabs'][] = array(
		'id' => 'tab_1',
		'title' => __('Widget o Modal'),
	);
	
	// Tab 2
	$wpsf_settings['tabs'][] = array(
		'id' => 'tab_2',
		'title' => __('Recaptcha'),
	);
        
        // Tab 3
	$wpsf_settings['tabs'][] = array(
		'id' => 'tab_3',
		'title' => __('Mensajes'),
	);
        
        $wpsf_settings['tabs'][] = array(
		'id' => 'tab_4',
		'title' => __('Plantilla Email'),
	);
         
	// Settings

    // Settings Section
    $wpsf_settings['sections'][] = array(
        'tab_id' => 'tab_1',
        'section_id' => 'general',
        'section_title' => '<span class="dashicons dashicons-admin-generic"></span> Configuración del widget o modal',
        'section_order' => 10,
        'fields' => array(
            array(
            'id' => 'modal_popup',
            'title' => 'Crear el widget como un modal',
            'desc' => 'Podrás crear tu widget como un modal que aparecerá en la mitad de la pantalla en un tiempo determinado.',
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'no' => 'No',
                'si' => 'Si'
                
            )
        ),
        array(
            'id' => 'tiempo_modal',
            'title' => 'Tiempo para que aparezca el modal',
            'desc' => 'Configura los segundos para que aparezca el modal en la pantalla, por defecto esta en 3 segundos que son 3000 milisegundos.',
            'type' => 'number',
            'min'  => '1000',
            'max'  => '45000',
            'std' => '3000'
        ),
        array(
            'id' => 'color_texto_widget',
            'title' => 'Color título del modal',
            'desc' => 'Pon el color del título del modal.',
            'type' => 'color',
            'std' => '#000000'
        ),
        array(
            'id' => 'color_cuerpo_modal',
            'title' => 'Color del modal',
            'desc' => 'Pon el color del modal.',
            'type' => 'color',
            'std' => '#ebebeb'
        ),
        array(
            'id' => 'border_modal',
            'title' => 'Borde del modal',
            'desc' => 'Pon el radio del modal en px.',
            'type' => 'text',
            'std' => '4px'
        ),
        array(
            'id' => 'efecto_modal',
            'title' => 'Efecto del modal',
            'desc' => 'Seleccione El efecto del modal.',
            'type' => 'select',
            'std' => 'fadeIn',
            'choices' => array(
                'fadeIn' => 'fadeIn',
                'slideDown' => 'slideDown',
                'slideUp' => 'slideUp',
                'slideIn' => 'slideIn',
                'slideBack' => 'slideBack'
            )
        ),
        array(
            'id' => 'speed_efecto_modal',
            'title' => 'Velocidad del efecto',
            'desc' => 'Pon la velocidad del efecto del modal.',
            'type' => 'number',
            'min'  => '200',
            'max'  => '1000',
            'std' => '450'
        ),
        array(
            'id' => 'tamano_boton',
            'title' => 'Tamaño del boton del widget o modal',
            'desc' => 'Pon el tamaño del boton del widget en %.',
            'type' => 'text',
            'std' => '100%'
        ),
        array(
            'id' => 'color_boton',
            'title' => 'Color del botón del widget o modal',
            'desc' => 'Pon el color del botón del widget.',
            'type' => 'color',
            'std' => '#428bca'
        ),
        array(
            'id' => 'color_texto',
            'title' => 'Color del texto del botón del widget o modal',
            'desc' => 'Pon el color del texto del botón del widget.',
            'type' => 'color',
            'std' => '#ffffff'
        ),
        array(
            'id' => 'border_boton',
            'title' => 'Borde del botón del widget o modal',
            'desc' => 'Pon el radio del borde del botón en px.',
            'type' => 'text',
            'std' => '4px'
        ),
        array(
            'id' => 'tamano_input',
            'title' => 'Tamaño del input del widget o modal',
            'desc' => 'Pon el tamaño del input del widget en %.',
            'type' => 'text',
            'std' => '100%'
        ),
        array(
            'id' => 'border_input',
            'title' => 'Borde del campo input del widget o modal',
            'desc' => 'Pon el radio del borde del campo input en px.',
            'type' => 'text',
            'std' => '0px'
        ),
        array(
            'id' => 'color_fondo',
            'title' => 'Color fondo input del widget o modal',
            'desc' => 'Pon el color del fondo del input.',
            'type' => 'color',
            'std' => ''
        ),
         array(
            'id' => 'color_input_texto',
            'title' => 'Color texto del input del widget o modal',
            'desc' => 'Pon el color del texto al escribir en el input.',
            'type' => 'color',
            'std' => ''
        ),
        )
    );
    
    // Settings Section
   /* $wpsf_settings['sections'][] = array(
        'tab_id' => 'tab_1',
        'section_id' => 'section_2',
        'section_title' => 'Section 2',
        'section_order' => 10,
        'fields' => array(
            array(
                'id' => 'text-2',
                'title' => 'Text',
                'desc' => 'This is a description.',
                'type' => 'text',
                'std' => 'This is std'
            ),
        )
    );*/
    
    // Settings Section
    $wpsf_settings['sections'][] = array(
        'tab_id' => 'tab_2',
        'section_id' => 'recaptcha',
        'section_title' => '<span class="dashicons dashicons-admin-generic"></span> Configura el Recaptcha de google',
        'section_order' => 15,
        'fields' => array(
            array(
            'id' => 'recaptcha',
            'title' => 'Usar Recaptcha',
            'desc' => 'Si lo activas podras usar el recaptcha de google, tendrás que poner la calve secreta y la clave del sitio, esta es la dirección para obtener las claves <a href="https://www.google.com/recaptcha/intro/index.html" target="_blank">Pincha Aquí</a>.',
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'no' => 'No',
                'si' => 'Si'    
            )
        ),
        array(
            'id' => 'clave_sitio',
            'title' => 'Clave Sitio Recaptcha',
            'desc' => 'Inserta la clave del sitio del Recaptcha.',
            'type' => 'text',
            'std' => ''
        ),
         array(
            'id' => 'clave_secreta',
            'title' => 'Clave Secreta Recaptcha',
            'desc' => 'Inserta la clave secreta del Recaptcha.',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'id' => 'color_recaptcha',
            'title' => 'Seleccione el color del Recaptcha',
            'desc' => 'Seleccione un color para el Recaptcha.',
            'type' => 'select',
            'std' => 'light',
            'choices' => array(
                'light' => 'Claro',
                'dark' => 'Oscuro'
            )
        ),
        array(
            'id' => 'theme_recaptcha',
            'title' => 'Seleccione el Recaptcha compacto o normal',
            'desc' => 'Seleccione el Recaptcha compacto o normal.',
            'type' => 'select',
            'std' => 'normal',
            'choices' => array(
                'normal' => 'Normal',
                'compact' => 'Compacto'
            )
        ),
        array(
            'id' => 'size_recaptcha',
            'title' => 'Redimensión del Recaptcha',
            'desc' => 'Inserta la medida para redimensionar el captcha y que se ajuste a sú formulario, siendo la medida por defecto 77 y  el máximo es 99.',
            'type' => 'number',
            'min'  => '1',
            'max'  => '99',
            'std' => '77'
        ),
        )
    );
    
     // Settings Section
    $wpsf_settings['sections'][] = array(
        'tab_id' => 'tab_3',
        'section_id' => 'mensajes',
        'section_title' => '<span class="dashicons dashicons-admin-generic"></span> Configura los mensajes de widget o modal',
        'section_order' => 20,
        'fields' => array(
            array(
            'id' => 'fallo_email',
            'title' => 'Email no válido',
            'desc' => 'Escriba el texto que aparecerá cuando no sea un email valido.',
            'type' => 'text',
            'std' => 'Tienes que escribir un email'
        ),
        array(
            'id' => 'existe_email',
            'title' => 'Email ya existe',
            'desc' => 'Escriba el texto cuando el email ya exista.',
            'type' => 'text',
            'std' => 'El email ya esta en uso'
        ),
        array(
            'id' => 'clic_captcha',
            'title' => 'Cliquear captcha',
            'desc' => 'Escriba el texto cuando no se ha cliqueado el captcha.',
            'type' => 'text',
            'std' => 'Tienes que cliquear el captcha'
        ), 
        array(
            'id' => 'incorrecto_captcha',
            'title' => 'Captcha Incorrecto',
            'desc' => 'Escriba el texto cuando el captcha sea incorrecto.',
            'type' => 'text',
            'std' => 'El captcha no es correcto'
        ), 
         array(
            'id' => 'mensaje_captcha',
            'title' => 'Mensaje para el captcha del Modal',
            'desc' => 'Escriba el texto que saldra en el Modal.',
            'type' => 'textarea',
            'std' => 'Suscríbete en nuestro voletín de notícias y recibirás todas nuestras novedades'
        ),
        array(
            'id' => 'ok_email',
            'title' => 'Sucripto correctamente',
            'desc' => 'Escriba el texto que saldra cuando se haya suscrito correctamente.',
            'type' => 'textarea',
            'std' => 'Se ha enviado un mensaje de confirmación; por favor, haga clic en el enlace de confirmación para verificar su suscripción.'
        ),
         array(
            'id' => 'mensaje_suscript',
            'title' => 'Mensaje para aceptar la suscripción',
            'desc' => 'Escriba el texto que saldra cuando reciba el correo para aceptar la suscripción.',
            'type' => 'textarea',
            'std' => 'Se ha suscrito al Boletín de Noticias de nuestro sitio web, para activar su suscripción haga clic en el enlace de abajo:'
        ),
        )
    );
    
    
    
    
    // Settings Section
    $wpsf_settings['sections'][] = array(
        'tab_id' => 'tab_4',
        'section_id' => 'plantilla',
        'section_title' => '<span class="dashicons dashicons-admin-generic"></span> Configuarción de la plantilla para el envio del email',
        'section_order' => 25,
        'fields' => array(
           array(
            'id' => 'logo_email',
            'title' => 'Pon tu logo aquí',
            'desc' => 'Logo para el envio del correo',
            'type' => 'file',
            'std' => ''
        ),
        array(
            'id' => 'activar_envio_entrada',
            'title' => 'Envío de email',
            'desc' => 'Puedes desactivar el envío de email cuando insertes una entrada.',
            'type' => 'radio',
            'std' => 'si',
            'choices' => array(
                'si' => 'Si',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'color_plantilla',
            'title' => 'Seleccione un color',
            'desc' => 'Seleccione un color para la plantilla del email, por defecto es el gris.',
            'type' => 'select',
            'std' => 'default',
            'choices' => array(
                'default' => 'Por defecto',
                'plantillabloque' => 'Template Bloque'
                
            )
        ),
        array(
            'id' => 'mostrar_imagen',
            'title' => 'Mostrar imágen post en el correo',
            'desc' => 'Mostrar la imágen del post en la plantilla del email.',
            'type' => 'radio',
            'std' => 'si',
            'choices' => array(
                'si' => 'Si',
                'no' => 'No'
            )
        ),
            array(
            'id' => 'mostrar_post',
            'title' => 'Mostrar número de post',
            'desc' => 'Elije el número de post para mandar, puedes mandar los últimos 3 posts.',
            'type' => 'radio',
            'std' => 'ultimo',
            'choices' => array(
                'ultimo' => 'Último',
                '1' => 'Los dos Últimos',
                '2' => 'Los tres Últimos'
            )
        ),
        array(
            'id' => 'icono_facebook',
            'title' => 'Url facebook',
            'desc' => 'Escriba la url si tienes facebook.',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'id' => 'icono_twetter',
            'title' => 'Url twitter',
            'desc' => 'Escriba la url si tienes twitter.',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'id' => 'icono_google',
            'title' => 'Url google',
            'desc' => 'Escriba la url si tienes google.',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'id' => 'icono_pinterest',
            'title' => 'Url pinterest',
            'desc' => 'Escriba la url si tienes pinterest.',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'id' => 'icono_youtube',
            'title' => 'Url youtube',
            'desc' => 'Escriba la url si tienes youtube.',
            'type' => 'text',
            'std' => ''
        ),
       )
    );
    return $wpsf_settings;
}
