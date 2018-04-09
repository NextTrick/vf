<?php 

//Custom Style Frontend
if(!function_exists('construct_custom_frontend_style')){
    function construct_custom_frontend_style(){
    	$style_css 	= '';
        $bg_top 	= '';
        $color_top	= '';
        $bg_h       = '';
        $color_m    = '';        

        $bg_h_s     = '';
        $color_m_s  = '';

        $bg_t       = '';
        $color_t    = '';
        $padding_t  = '';
        $padding_b  = '';
        $img        = '';

        $logo_mar 	= '';
        $logo_w 	= '';
        $logo_h 	= '';

        $bg_ft		= '';
        $color_ft	= '';
        $color_fti	= '';
        $bg_bt		= '';
        $color_bt	= '';

        $bg_bd      = '';

        $bgcms      = '';
        $bgi_error  = '';
        $bgc_error  = '';
        $c_error    = '';
        $h_error 	= '';



        //Header
        if(construct_get_option('bg_top')){
        	$bg_top = '#top-bar{ background: '.construct_get_option('bg_top').'!important; }';
        }
        if(construct_get_option('color_top')){
        	$color_top = '#top-bar, #top-bar a,#top-bar .top-bar-socials .icons a{ color: '.construct_get_option('color_top').'!important; }';
        }

        if(construct_get_option('custom_menu')){

            if(construct_get_option('bg_menu')){
            	$bg_h = '#site-header,.header-style-5 #site-header{ background: '.construct_get_option('bg_menu').'!important; }';
            }
            if(construct_get_option('color_menu')){
            	$color_m = '#main-nav > ul > li > a,#site-header.style-1 .header-search-icon, #site-header.style-4 .header-search-icon, #site-header.style-5 .header-search-icon,.nav-top-cart-wrapper .nav-cart-trigger{ color: '.construct_get_option('color_menu').'; }';
            }
        }

        if(construct_get_option('sticky')){

            if(construct_get_option('bg_menu_scroll')){
                $bg_h_s = '#site-header.is-sticky,.header-style-5 #site-header.is-sticky{ background: '.construct_get_option('bg_menu_scroll').'!important; }';
            }
            if(construct_get_option('color_menu_scroll')){
                $color_m_s = '#site-header.style-5.is-sticky #main-nav > ul > li > a,.is-sticky #main-nav > ul > li > a,#site-header.style-1.is-sticky .header-search-icon, #site-header.style-4.is-sticky .header-search-icon, #site-header.style-5.is-sticky .header-search-icon,.is-sticky .nav-top-cart-wrapper .nav-cart-trigger{ color: '.construct_get_option('color_menu_scroll').'; }';
            }
        }

        // Page Header
        if(construct_get_option('header_title')){

            if(construct_get_option('bg_title')){
                $bg_t = '#featured-title{ background: '.construct_get_option('bg_title').'; }';
            }
            if(construct_get_option('color_title')){
                $color_t = '#featured-title .featured-title-heading,#featured-title #breadcrumbs{ color: '.construct_get_option('color_title').'; }';
            }
            if(construct_get_option('title_padding_t')){
                $padding_t = '#featured-title .featured-title-inner-wrap,.header-style-5 #featured-title .featured-title-inner-wrap{ padding-top: '.construct_get_option('title_padding_t').'px; }';
            }
            if(construct_get_option('title_padding_b')){
                $padding_b = '#featured-title .featured-title-inner-wrap,.header-style-5 #featured-title .featured-title-inner-wrap{ padding-bottom: '.construct_get_option('title_padding_b').'px; }';
            }
            if(construct_get_option('subheader')){
                $img = '#featured-title{ background: url('.construct_get_option('subheader').'); }';
            }
        }

        //Logo
        if(construct_get_option('logo_width')){
            $logo_w = '#site-logo-inner img { width: '.construct_get_option('logo_width').'px; }';
        }
        if(construct_get_option('logo_height')){
            $logo_h = '#site-logo-inner img { height: '.construct_get_option('logo_height').'px; }';
        }
        if(construct_get_option('logo_position')){
            $space = construct_get_option('logo_position');
            $logo_mar = '#site-logo-inner { margin: '.$space["top"].' '.$space["right"].' '.$space["bottom"].' '.$space["left"].'; }';
        }          

        //Footer
        if(construct_get_option('bg_footer')){
        	$bg_ft = '#footer{ background: '.construct_get_option('bg_footer').'; }';
        }
        if(construct_get_option('color_footer')){
        	$color_ft = '#footer-widgets .widget ul li a,#footer .widget,#footer-widgets .widget.widget_tag_cloud .tagcloud a, #footer p, #footer-widgets .widget ul li a:before{ color: '.construct_get_option('color_footer').'; }';
        }
        if(construct_get_option('color_ftitle')){
        	$color_fti = '#footer-widgets .widget .widget-title{ color: '.construct_get_option('color_ftitle').'; }';
        }

        if(construct_get_option('bg_bottom')){
        	$bg_bt = '#bottom{ background: '.construct_get_option('bg_bottom').'; }';
        }
        if(construct_get_option('color_bottom')){
        	$color_bt = '#bottom, #bottom ul.bottom-nav > li > a{ color: '.construct_get_option('color_bottom').'; }';
        }

        //Styling
        if(construct_get_option('bg_body')){
        	$bg_bd = 'body{ background-color: '.construct_get_option('bg_body').'; }';
        }


        $style_css .= construct_get_option('custom_css');
        $style_css .= $bg_top;
        $style_css .= $color_top;
        $style_css .= $bg_h;
        $style_css .= $color_m;

        $style_css .= $bg_h_s;
        $style_css .= $color_m_s;
        $style_css .= $bg_t;
        $style_css .= $color_t;
        $style_css .= $padding_t;
        $style_css .= $padding_b;
        $style_css .= $img;

        $style_css .= $logo_w;
        $style_css .= $logo_h;
        $style_css .= $logo_mar;

        $style_css .= $bgcms;
        $style_css .= $bgi_error;
        $style_css .= $bgc_error;
        $style_css .= $c_error;
        $style_css .= $h_error;

        $style_css .= $bg_ft;
        // $style_css .= $bg_fimg;
        $style_css .= $color_ft;
        $style_css .= $color_fti;
        $style_css .= $bg_bt;
        $style_css .= $color_bt;
        
        $style_css .= $bg_bd;

       

        if(! empty($style_css)){
			echo '<style type="text/css">'.$style_css.'</style>';
		}
    }
}
add_action('wp_head', 'construct_custom_frontend_style');