<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package construct
 */

get_header(); ?>

<?php if(construct_get_option('header_title')){ ?>
<div id="featured-title" class="clearfix featured-title-left" 
    <?php if( function_exists( 'rwmb_meta' ) ) { ?>       
        <?php $images = rwmb_meta( '_cmb_subheader_image', "type=image" ); ?>
        <?php if($images){ foreach ( $images as $image ) { ?>
        <?php 
        $img =  $image['full_url']; ?>
          style="background-image: url('<?php echo esc_url($img); ?>');background-size:cover;"
        <?php } } ?>
    <?php } ?>
>
    <div id="featured-title-inner" class="container clearfix">
        <div class="featured-title-inner-wrap">
            <div class="featured-title-heading-wrap">
                <h1 class="featured-title-heading">
                    <?php if( is_home() && is_front_page() ){ echo esc_html__( 'News', 'construct' );}else{echo get_the_title( get_option( 'page_for_posts' ) );} ?>
                </h1>
            </div>

            <?php if(!is_front_page() && function_exists('bcn_display')){ ?>
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