<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package construct
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
</head>

<body <?php body_class('header-style-5'); ?> >

    <div id="wrapper" class="animsition">
        <div id="page" class="clearfix">
            <div id="site-header-wrap">
                <!-- Top Bar -->
                <?php if(construct_get_option( 'top_header' )) { ?>
                    <div id="top-bar" class="style-2">
                        <div id="top-bar-inner" class="container">
                            <div class="top-bar-inner-wrap">

                                <div class="top-bar-socials">
                                    <div class="inner">
                                        <span class="icons">                                       
                                            <?php $socials = construct_get_option( 'socials', array() ); ?>
                                            <?php if($socials) { ?>                                        
                                                <?php foreach ( $socials as $social ) { ?>
                                                    <a target="_blank" href="<?php echo esc_url($social['link']); ?>"><span class="fa <?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></span></a>
                                                <?php } ?>                                        
                                            <?php } ?>
                                        </span>
                                    </div>
                                </div><!-- /.top-bar-socials -->

                                <div class="top-bar-content">
                                    <span id="top-bar-text">
                                        <?php $info = construct_get_option( 'top_info', array() ); ?>
                                        <?php if($info) { ?>
                                            <?php foreach ( $info as $inf ) { ?>
                                                <?php if($inf['icon']) { ?> <i class="fa <?php echo esc_attr($inf['icon']); ?>"></i><?php } ?><?php echo do_shortcode($inf['details']); ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </span><!-- /#top-bar-text -->
                                </div><!-- /.top-bar-content -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- /#top-bar -->
                <?php } ?>
                <header id="site-header" class="header-front-page style-5">
                    <div id="site-header-inner" class="container">
                        <div class="wrap-inner">
                            <div id="site-logo" class="clearfix">
                                <div id="site-logo-inner">
                                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="main-logo">                                    
                                        <?php $logo = construct_get_option( 'logo_trans' ) ? construct_get_option( 'logo_trans' ) : construct_get_option( 'logo' ); ?>                                   
                                        <img src="<?php echo esc_url($logo); ?>" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mobile-button"><span></span></div><!-- //mobile menu button -->
                        
                        <nav id="main-nav" class="main-nav">
                            <?php
                                $primary = array(
                                    'theme_location'  => 'primary',
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
                                    'items_wrap'      => '<ul id="mainmenu" class="menu">%3$s</ul>',
                                    'depth'           => 0,
                                );
                                if ( has_nav_menu( 'primary' ) ) {
                                    wp_nav_menu( $primary );
                                }
                            ?>   
                        </nav>

                        <?php if(construct_get_option( 'search_btn' )) { ?>
                        <div id="header-search">
                            <a class="header-search-icon" href="#"><span class="fa fa-search"></span></a>

                            <form role="search" method="get" class="header-search-form" action="<?php echo home_url( '/' ); ?>">
                                <input type="text" value="" name="s" class="header-search-field" placeholder="<?php echo esc_html__( 'Type and hit enter...', 'construct' ) ?>">
                            </form>
                        </div><!-- /#header-search -->
                        <?php } ?>

                        <?php if(construct_get_option( 'cart_btn' ) && class_exists('Woocommerce')) { ?>
                        <div class="nav-top-cart-wrapper">
                            <a class="nav-cart-trigger" href="#">
                                <span class="fa fa-shopping-cart cart-icon">
                                    <span class="shopping-cart-items-count">0</span>
                                </span>
                            </a>
                            <div class="nav-shop-cart">
                                <div class="widget_shopping_cart_content">
                                    <?php woocommerce_mini_cart(); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </header>
            </div>