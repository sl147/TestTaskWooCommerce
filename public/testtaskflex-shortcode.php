<?php
/**
 * Register Shortcodes for the plugin
 *
 */

	function testtasksflex_shortCode($atts) {

        $params = shortcode_atts( 
                    array( 
                        'quantity' => 10
                    ), 
                    $atts 
        );
        $quantity = $params['quantity'];

		ob_start();
        $currency = get_woocommerce_currency_symbol();
        include plugin_dir_path( __FILE__ ) . 'partials/testtaskflex-public-display.php';
        return ob_get_clean();
	}

    include plugin_dir_path( __FILE__ ) . 'TesttaskFlexGetData.php';

	add_shortcode('testtasksflex_box', 'testtasksflex_shortCode');
?>