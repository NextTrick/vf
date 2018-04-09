<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
                    <?php $title = construct_get_option('title_single') ? construct_get_option('title_single') : esc_html__('News', 'hosted'); ?>
                    <?php echo esc_html($title); ?>
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

<?php while (have_posts()): the_post(); ?>
<div id="main-content" class="site-main clearfix">
    <div id="content-wrap" class="container <?php echo esc_attr( construct_get_option('post_layout') ); ?>">
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <div class="post-content-single-wrap">
                    <article class="hentry">

                        <div class="post-media clearfix">
                           <?php                                                     
                                $format = get_post_format();
                                $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
                                $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);
                            ?> 
                            <?php if($format == 'video') {  ?>

                                <iframe width="100%" height="450" src="<?php echo esc_url( $link_video ); ?>"></iframe>

                            <?php }elseif($format == 'audio'){ ?>

                                <iframe style="width:100%" height="150" scrolling="no" frameborder="no" src="<?php echo esc_url( $link_audio ); ?>"></iframe>
                            
                            <?php }elseif($format == 'gallery'){ ?>

                                <div class="owl-carousel owl-theme blog-slide">
                                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                                    <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>
                                    <?php if($images){ ?>              
                                        <?php  foreach ( $images as $image ) {  ?>
                                            <?php $img = $image['full_url']; ?>
                                            <div class="item"><img src="<?php echo esc_url($img); ?>" alt=""></div>
                                        <?php } ?>                
                                    <?php } ?>
                                <?php } ?>
                                </div>

                            <?php }elseif($format == 'image'){ ?>

                                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                                    <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
                                    <?php if($images){ ?>              
                                        <?php  foreach ( $images as $image ) {  ?>
                                            <?php $img = $image['full_url']; ?>
                                            <img src="<?php echo esc_url($img); ?>"  alt="image">
                                        <?php } ?>                
                                    <?php } ?>
                                <?php } ?>
                            <?php }else{ the_post_thumbnail();} ?>
                        </div><!-- /.post-media -->

                        <h2 class="post-title">
                            <span class="post-title-inner">
                                <?php the_title(); ?>
                            </span>
                        </h2><!-- /.post-title -->

                        <div class="post-meta style-2">
                            <div class="post-meta-content">
                                <div class="post-meta-content-inner">
                                    <span class="post-by-author item">
                                        <span class="inner"><?php esc_html_e('By', 'construct'); ?> <?php the_author_posts_link(); ?></span>
                                    </span>

                                    <span class="post-date item">
                                        <span class="inner"><span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span></span>
                                    </span>

                                    <span class="post-comment item">
                                        <span class="inner"><a href="#"><?php comments_number( esc_html__('0 comment', 'construct'), esc_html__('1 comment', 'construct'), __('% comments', 'construct') ); ?></a></span>
                                    </span>

                                    <?php if(has_category()){ ?>
                                    <span class="post-meta-categories item">
                                        <span class="inner">
                                            <?php the_category( ', ' ); ?>
                                        </span>
                                    </span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div><!-- /.post-meta -->

                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>

                        <?php if(construct_get_option('share_btn')){ ?>
                        <div class="post-share post-link-share">
                            <div class="post-meta-share-text">Share:</div>
                            <div class="post-meta-share-icon">                                
                                <?php if(construct_get_option('twitter_btn')){ ?>
                                    <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" class=""><i class="fa fa-twitter"></i></a>
                                <?php } ?>
                                <?php if(construct_get_option('facebook_btn')){ ?>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class=""><i class="fa fa-facebook"></i></a>
                                <?php } ?>
                                <?php if(construct_get_option('google_btn')){ ?>
                                    <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class=""><i class="fa fa-google-plus"></i></a>
                                <?php } ?>
                                <?php if(construct_get_option('linkedin_btn')){ ?>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a>
                                <?php } ?>
                                <?php if(construct_get_option('pinterest_btn')){ ?>
                                    <a href="https://pinterest.com/pin/create/button/?url=&media=&description=<?php the_permalink(); ?>" class="pinitbutton"><i class="fa fa-pinterest"></i></a>
                                <?php } ?>
                            </div>
                        </div><!-- /.post-share -->
                        <?php } ?>

                        <div id="comments" class="comments-area">                            
                            <?php
                               if ( comments_open() || get_comments_number() ) :
                                comments_template();
                               endif;
                            ?>
                        </div>

                    </article>
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
<?php endwhile; ?>
    
<?php get_footer(); ?>