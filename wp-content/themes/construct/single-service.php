<?php 
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

<div id="main-content" class="site-main clearfix sidebar-left">
    <div id="content-wrap" class="container">
        
        <div id="sidebar" class="sidebar-ser">

            <div id="inner-sidebar" class="inner-content-wrap">
                <div class="widget widget_nav_menu">
                    <div class="menu-service-menu-container">
                        <?php
                            $menuser = array(
                                'theme_location'  => 'menuser',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => '',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'construct_bootstrap_navwalker::fallback',
                                'walker'          => new construct_bootstrap_navwalker(),
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="menu-service-menu" class="menu">%3$s</ul>',
                                'depth'           => 0,
                            );
                            if ( has_nav_menu( 'menuser' ) ) {
                                wp_nav_menu( $menuser );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="wprt-spacer" style="height:0px" data-desktop="0" data-mobi="40" data-smobi="40"></div>
        </div>
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap service-page">
                <?php while (have_posts()): the_post(); ?>
    
                    <?php the_content(); ?>
        
                <?php endwhile; ?>
            </div>            
        </div>
    </div>
</div>

<?php get_footer(); ?>