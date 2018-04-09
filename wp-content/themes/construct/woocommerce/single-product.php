<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     6.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<div id="featured-title" class="clearfix featured-title-left">
	    <div id="featured-title-inner" class="container clearfix">
	        <div class="featured-title-inner-wrap">
	            <div class="featured-title-heading-wrap">
	                <h1 class="featured-title-heading">
	                   <?php woocommerce_page_title(); ?>
	                </h1>
	            </div>
	            <?php if(construct_get_option('breadcrumb') && function_exists('bcn_display') && !is_front_page()) { ?>   
	            <div id="breadcrumbs">
	                <div class="breadcrumbs-inner">
	                    <div class="breadcrumb-trail">
	                        <?php bcn_display(); ?>
	                    </div>
	                </div>
	            </div>
	            <?php } ?>
	        </div>
	    </div>
	</div> 

	<div id="main-content" class="site-main clearfix">
		<div id="content-wrap" class="container <?php if(construct_get_option('shop_layout')=='no-bar'){echo 'no-sidebar';} ?>">
			<?php
				/**
				 * woocommerce_before_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action( 'woocommerce_before_main_content' );
			?>
			<div id="site-content" class="site-content clearfix">
				<div id="inner-content" class="inner-content-wrap">
					<div class="content-woocommerce">
						<div class="woo-single-post-class">
							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'single-product' ); ?>

							<?php endwhile; // end of the loop. ?>
						</div>
					</div>
				</div>
			</div>

			<?php if(construct_get_option('shop_layout')=='default'){ ?>
			<div id="sidebar" class="style-1">
				<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				?>
			</div>
			<?php } ?>
			<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>	
		</div>
	</div>

<?php get_footer( 'shop' ); ?>
