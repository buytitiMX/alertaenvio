<?php
/**
 * Plugin Name:       Buyiti - Cambio de Texto
 * Plugin URI:        https://buytiti.com
 * Description:       Este plugin cambia el texto de la palabra envío en WooCommerce
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Jesus Jimenez
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       buytiticambioetexto
 * Update URI:        https://buytiti.com
 *
 * @package           buytiti
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function buytiticambioetexto_buytiticambioetexto_block_init() {
    register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'buytiticambioetexto_buytiticambioetexto_block_init' );

function mostrar_alerta_envio() {
    // Verifica si estamos en la página de pago
    if (is_page('pago')) {
        // Genera el código JavaScript para mostrar la alerta
        echo '<script type="text/javascript">alert("En ENVÍOS GRATUITOS, la paquetería asignada va depender del peso, medidas y ubicación de entrega.");</script>';
    }
}
add_action('wp_footer', 'mostrar_alerta_envio');
