<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// Store column count for displaying the grid

$pcol = construct_get_option('col_shop') ? construct_get_option('col_shop') : 3;

if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $pcol );
}

// Extra post classes
$classes = array();
if ($woocommerce_loop['columns'] == 2) {
	$classes[] = 'shop-col-2';
}elseif($woocommerce_loop['columns'] == 4){
	$classes[] = 'shop-col-4';
}elseif($woocommerce_loop['columns'] == 5){
	$classes[] = 'shop-col-5';
}else{
	$classes[] = 'shop-col-3';
}
?>
<li <?php post_class( $classes ); ?>>
	
		<?php
			/**
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' ); 

		?>

		<a href="<?php the_permalink(); ?>">
			<div class="product-thumbnail">	
		        <?php 
					/**
					 * woocommerce_before_shop_loop_item_title hook.
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item_title' );
				?>
		    </div> 
	    </a>   

	    <div class="product-info">
		
			<a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link">
				<h3>
					<?php 
						/**
						 * woocommerce_shop_loop_item_title hook.
						 *
						 * @hooked woocommerce_template_loop_product_title - 10
						 */
						do_action( 'woocommerce_shop_loop_item_title' );
					?>
				</h3>
				<span class="price">
					<?php 
						/**
						 * woocommerce_after_shop_loop_item_title hook.
						 *
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' );
					?>
				</span>
			</a>

			<?php		

				/**
				 * woocommerce_after_shop_loop_item hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item' );
			?>
    	</div>
    	
</li>


