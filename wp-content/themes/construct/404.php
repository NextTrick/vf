<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package construct
 */

get_header(); ?>
  
<?php if(construct_get_option('header_title')){ ?>
<div id="featured-title" class="clearfix featured-title-left">
    <div id="featured-title-inner" class="container clearfix">
        <div class="featured-title-inner-wrap">
            <div class="featured-title-heading-wrap">
                <h1 class="featured-title-heading">
                    <?php esc_html_e('404 ERROR','construct'); ?>
                </h1>
            </div>
            
            <div id="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumb-trail">
                        <?php bcn_display(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> 
<?php } ?>
<div id="main-content" class="site-main clearfix">
    <div id="content-wrap">
        <div class="site-content no-sidebar clearfix">
            <div id="inner-content" class="inner-content-wrap">
              <div class="container">  
                <div class="page-content 404-page">
                    <h2><?php esc_html_e('Oops. You have encountered an error.','construction'); ?></h2>
                    <p><?php esc_html_e('It appears the page your were looking for does not exist. Sorry about that.','construction'); ?></p>
                    <div class="search-404 widget_search">
                        <p><?php esc_html_e('Try to search something...','construction'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                    <p><?php esc_html_e('or','construction'); ?></p>
                    <p><a href="<?php echo esc_url( home_url('/') ); ?>" class="wprt-button"><?php esc_html_e(' GO BACK TO HOME','construction'); ?></a></p>
                </div>
              </div>
            </div>
        </div>
    </div>
</div> 
	
<?php get_footer(); ?>
