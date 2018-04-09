<?php 
/**** WooCommerce custom functions ****/

if (class_exists('Woocommerce')) {
	
  add_action( 'after_setup_theme', 'woocommerce_support' );
	function woocommerce_support() {
	  add_theme_support( 'woocommerce' );
	  add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}      

  // Display 12 products per page. Goes in functions.php
    add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
  function new_loop_shop_per_page( $cols ) {
    $num = construct_get_option('per_shop') ? construct_get_option('per_shop') : 3;
      // $cols contains the current number of products per page based on the value stored on Options -> Reading
      // Return the number of products you wanna show per page.
      $cols = $num;
      return $cols;
  }

  // breadcrumb woocommerce
  remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

  // Remove link before and after product
  remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

	add_filter( 'woocommerce_output_related_products_args', 'construct_related_products_args' );
	function construct_related_products_args( $args ) {
		$args['posts_per_page'] = 3; // 4 related products
		$args['columns'] = 3; // arranged in 2 columns
		return $args;
	}

	

	add_filter('woocommerce_add_to_cart_fragments', 'construct_header_add_to_cart_fragment');
 	function construct_header_add_to_cart_fragment( $fragments ) {    
  		ob_start();  
  		?>   		

   		<a class="nav-cart-trigger" href="#">
            <span class="fa fa-shopping-cart cart-icon">
                <span class="shopping-cart-items-count"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'construct'), WC()->cart->cart_contents_count);?></span>
            </span>
        </a>
  	<?php  
  		$fragments['a.nav-cart-trigger'] = ob_get_clean();  
  		return $fragments;  
 	}

}
?>