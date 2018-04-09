<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
                    <?php printf( esc_html__( 'Search Results for: %s', 'construct' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h1>
            </div>

            <?php if(construct_get_option('breadcrumb') && function_exists('bcn_display')) { ?>
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
<?php } ?>   

<div id="main-content" class="site-main clearfix">
    <div id="content-wrap" class="container <?php echo esc_attr( construct_get_option('blog_layout') ); ?>">
        
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <?php if( have_posts() ) : ?>
                    <?php 
                        while (have_posts()) : the_post();
                            get_template_part( 'content', get_post_format() ) ;
                        endwhile;
                    ?>
                    <?php else : ?>
                                                   
                        <h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'construct' ); ?></h2>
                        
                        <div class="page-content">
                            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'construct' ); ?></p>
                            <div class="widget_search">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                <?php endif; ?>

                <div class="wprt-pagination clearfix">
                    <?php echo construct_pagination(); ?>    
                </div>
            </div>
        </div>
    
        <div id="sidebar">
            <div id="inner-sidebar" class="inner-content-wrap">
                <?php get_sidebar();?>
            </div>
        </div>
            
    </div>
</div>

<?php get_footer(); ?>