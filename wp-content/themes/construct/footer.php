<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package construct
 */
?>
        <?php if(construct_get_option('w_footer')){ ?>
        <?php if ( is_active_sidebar( 'footer-area-1'  )
            || is_active_sidebar( 'footer-area-2' )
            || is_active_sidebar( 'footer-area-3'  )
            || is_active_sidebar( 'footer-area-4' )
        ) { ?>
        <footer id="footer">
            <div id="footer-widgets" class="container style-1">
                <div class="row">
                    <?php get_sidebar('footer');?>
                </div>
            </div>
        </footer>
        <?php } } ?>
        <!-- Bottom -->
        <?php if(construct_get_option('bfooter')){ ?>
        <div id="bottom" class="clearfix style-1">
            <div id="bottom-bar-inner" class="wprt-container">
                <div class="bottom-bar-inner-wrap">
                
                    <div class="bottom-bar-content">
                        <div id="copyright">
                            <?php echo wp_kses( construct_get_option('copy_right'), wp_kses_allowed_html('post') ); ?> 
                        </div><!-- /#copyright -->
                    </div><!-- /.bottom-bar-content -->

                    <div class="bottom-bar-menu">
                        <?php
                            $footermenu = array(
                                'theme_location'  => 'footer',
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
                                'items_wrap'      => '<ul class="bottom-nav">%3$s</ul>',
                                'depth'           => 0,
                            );
                            if ( has_nav_menu( 'footer' ) ) {
                                wp_nav_menu( $footermenu );
                            }
                        ?>       
                    </div><!-- /.bottom-bar-menu -->
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<a id="scroll-top"><i class="fa fa-angle-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>
