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

function cambiar_texto_envio($label) {
    // Verifica si estamos en la página de pago
    if (is_page('pago')) {
        // Reemplaza el texto "Envío"
        $label = str_replace('Envío', 'Envío. La paquetería asignada va a depender del peso, medidas y ubicación de entrega.', $label);
    }
    return $label;
}
add_filter('woocommerce_shipping_package_name', 'cambiar_texto_envio');

function mostrar_alerta_envio() {
    // Verifica si estamos en la página de pago
    if (is_page('pago')) {
        // Genera el código JavaScript para mostrar la alerta
        echo '<script type="text/javascript">alert("Envío. La paquetería asignada va a depender del peso, medidas y ubicación de entrega.");</script>';
    }
}
add_action('wp_footer', 'mostrar_alerta_envio');
