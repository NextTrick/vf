<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package construct
 */
get_header(); 

?>

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
                    <?php the_title(); ?>
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
<?php } ?>

<div id="main-content" class="site-main clearfix">
    <div id="content-wrap" class="container <?php echo esc_attr( construct_get_option('blog_layout') ); ?>">
        
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <?php while (have_posts()) : the_post(); ?>
                    <?php the_post_thumbnail() ?>
                    <?php the_content(); ?>
                    <?php
                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'construct' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'construct' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ) );
                    ?>
                    
                    <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>      
                <?php endwhile; ?>

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
