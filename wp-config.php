<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //

/*************************************************************
*** SERVIDOR
*************************************************************/

/** El nombre de tu base de datos de WordPress */
// define('DB_NAME', 'desvanmx_demodesvan');
/** Tu nombre de usuario de MySQL */
// define('DB_USER', 'desvanmx_userdc');
/** Tu contraseña de MySQL */
// define('DB_PASSWORD', 'desvan2018');
/** Host de MySQL (es muy probable que no necesites cambiarlo) */



/*************************************************************
*** local
*************************************************************/
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'creactiv_desvan');
/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');
/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');
/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');
/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');
/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');
/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '5e_u{Czud{GY V4i<<[eg71uy4{S?Ry/C(D%AqWjlXDi>+:G)@doQ$X_-Cs/B~?2');
define('SECURE_AUTH_KEY', 'yt5p-ypeMkC$2vFjxwuj%RV[p{Rv0c.Fjxh|SulcETM4*?(&O!nTH8m2} kD]jy8');
define('LOGGED_IN_KEY', 'hq&Ns?dyB8u)M|@g4,$)<,~!hgPq?2eEp})qT`[POo{kAyC.;nv2@>|Uy25&l{%b');
define('NONCE_KEY', '@Ux&Hvs|VhMTS~9$e()u<T.8Yx0q5,2N/^)EcNHi#<2I8q?*~b,u(qWLnkh/!3Pz');
define('AUTH_SALT', 'Rhv%j(e97XLRoZKq%Zpin4i_|;ywn`x<v_3]^!zGC@(pR~Zh/O~3=eY[|@VG8IVu');
define('SECURE_AUTH_SALT', '_.M $I1=mg<!6NI<MnZ?ctAR|Vrd~BBauv,8twdk?<1J`qK*+qh|9t$xI_OoNWvi');
define('LOGGED_IN_SALT', 'oPvqZskes$q4h(JYG/O>==T* h?JXT |:}1pHWcg|u5|Ma$i,7d^8s{}_/EdT1zR');
define('NONCE_SALT', 'N3S/>Bl5Fd$MN*&r8BFo)vmDQO04CL|n~}>*8AbAZl`N@(v?caU(7:HDFYAKaAi?');
/**#@-*/
/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';
/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);
/* ¡Eso es todo, deja de editar! Feliz blogging */
/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>