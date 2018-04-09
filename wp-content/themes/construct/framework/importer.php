<?php
/**
 * Hooks for importer
 *
 * @package MrBara
 */


/**
 * Importer the demo content
 *
 * @since  1.0
 *
 */
function mrbara_importer() {
	return array(
		array(
			'name'       => 'Home',
			'preview'    => 'http://oceanthemes.net/plugins-required/construct/home1.jpg',
			'content'    => 'http://oceanthemes.net/plugins-required/construct/import-demo/demo-content.xml',
			'customizer' => 'http://oceanthemes.net/plugins-required/construct/import-demo/customizer.dat',
			'widgets' 	 => 'http://oceanthemes.net/plugins-required/construct/import-demo/widgets.wie',
			'sliders'    => 'http://oceanthemes.net/plugins-required/construct/import-demo/home-full.zip',
			'pages'      => array(
				'front_page' => 'Home 1 - Full Slider',
				'blog'       => 'Blog',				
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'      => 'main-menu',
				'footer'       => 'footer-menu',
				'menuser'      => 'service-menu',
			),
		),
	);
}

add_filter( 'soo_demo_packages', 'mrbara_importer', 30 );