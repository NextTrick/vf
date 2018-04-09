<?php 

//Custom Style Frontend
if(!function_exists('construct_color_scheme')){
    function construct_color_scheme(){
        $main_color = '';

        //Main Color
        if(construct_get_option('main_color')){
            $main_color = 
            '
            button,input[type="button"],input[type="reset"],input[type="submit"],
			p.dropcap-contrast span.first-letter,
			.nav-top-cart-wrapper .shopping-cart-items-count,
			#main-nav > ul > li.current-menu-item > a:before,#main-nav > ul > li.current-menu-ancestor > a:before,
			.hentry .post-share a:hover:after,
			.hentry .post-link a:before,
			.hentry .post-tags a,
			#sidebar .widget.widget_socials .socials a:hover:before,#footer-widgets .widget.widget_socials .socials a:hover:before,
			#sidebar .widget.widget_nav_menu .menu > li.current_page_item,#sidebar .widget.widget_nav_menu .menu > li.current-menu-item,
			#sidebar .widget.widget_tag_cloud .tagcloud a:hover:after,#footer-widgets .widget.widget_tag_cloud .tagcloud a:hover:after,
			#footer-widgets.style-1 .widget .widget-title > span:after,#footer-widgets.style-2 .widget .widget-title > span:after,
			.wprt-pagination ul li a.page-numbers:hover,.woocommerce-pagination .page-numbers li .page-numbers:hover,.wprt-pagination ul li .page-numbers.current,.woocommerce-pagination .page-numbers li .current,
			.bg-color, #scroll-top:before,
			#promotion.wprt-section,
			.wprt-icon-box.outline .dd-icon:after,
			.wprt-icon-box.outline.icon-effect-2:hover .dd-icon,
			.wprt-icon-box.outline.icon-effect-3:hover .dd-icon,
			.wprt-icon-box.outline.icon-effect-3:hover .dd-icon:after,
			.wprt-icon-box.accent-background.icon-effect-3 .dd-icon:after,
			.wprt-icon-box.accent-background.icon-effect-2 .dd-icon,
			.wprt-icon-box.accent-background.icon-effect-1 .dd-icon,
			.wprt-icon-box.accent-background.icon-effect-1 .dd-icon:after,
			.wprt-icon-box.grey-background:hover .dd-icon,
			.wprt-icon-box.grey-background.icon-effect-1 .dd-icon:after,
			.wprt-icon-box.grey-background.icon-effect-3 .dd-icon:after,
			.wprt-icon-box.icon-left.grey-background:hover .dd-icon,
			.wprt-icon-box.icon-right.grey-background:hover .dd-icon,
			.wprt-lines.custom-1 .line-1,
			.wprt-lines.custom-2 .line-1,
			.wprt-lines.custom-3 .line-1,
			.wprt-lines.custom-5 .line-1,
			.wprt-button, .bullet-style-2 #team-wrap .cbp-nav-pagination-active,
			.wprt-button.dark:hover,
			.wprt-button.light:hover,
			.wprt-button.very-light:hover,
			.wprt-button.outline:hover,
			.wprt-button.outline.dark:hover,
			.wprt-button.outline.light:hover,
			.wprt-button.outline.very-light:hover,
			.wprt-progress .progress-animate,
			.wprt-toggle.active .toggle-title,
			.wprt-toggle.style-2 .toggle-title:after,
			.wprt-galleries.galleries .flex-direction-nav a:hover,
			#project-filter .cbp-filter-item:hover,#project-filter .cbp-filter-item.cbp-filter-item-active,
			.project-item .effect-honey figcaption::before,
			.bullet-style-1 .cbp-nav-pagination-active,
			.bullet-style-2 .cbp-nav-pagination-active,
			.arrow-style-1 .cbp-nav-next:before,.arrow-style-1 .cbp-nav-prev:before,.arrow-style-2 .cbp-nav-next:before,
			.arrow-style-2 .cbp-nav-prev:before,
			.woocommerce-page .content-woocommerce .products li .onsale,
			.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,
			.woocommerce-page .content-woocommerce .products li .added_to_cart.wc-forward,
			.woocommerce-page .content-woocommerce .products li .add_to_cart_button.added,
			.woocommerce-page .woo-single-post-class .summary .cart .single_add_to_cart_button,
			.woocommerce-page .cart_totals .wc-proceed-to-checkout a,
			.woocommerce-page #payment #place_order,
			.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
			.wprt-toggle.active .toggle-title, .wpb-js-composer div.vc_tta.vc_general .vc_active .vc_tta-panel-title a,
			#sidebar .widget.widget_nav_menu .menu > li.current-menu-item a,
			#service-wrap .cbp-nav-next:before, #service-wrap .cbp-nav-prev:before, #testimonials-wrap .cbp-nav-next:before, 
			#testimonials-wrap .cbp-nav-prev:before, #projects .cbp-nav-next:before, 
			#projects .cbp-nav-prev:before, #partner-wrap .cbp-nav-next:before, #partner-wrap .cbp-nav-prev:before, 
			#team-wrap .cbp-nav-next:before, #team-wrap .cbp-nav-prev:before, #images-wrap .cbp-nav-next:before, #images-wrap .cbp-nav-prev:before,
			.bullet-style-2 #service-wrap .cbp-nav-pagination-active, .bullet-style-2 #projects .cbp-nav-pagination-active, 
			.bullet-style-2 #testimonials-wrap .cbp-nav-pagination-active, .bullet-style-2 #partner-wrap .cbp-nav-pagination-active, 
			.bullet-style-2 #team-wrap .cbp-nav-pagination-active, .bullet-style-2 #images-wrap .cbp-nav-pagination-active
			{
				background-color:'.construct_get_option('main_color').';
			}

			.project-item .effect-oscar{
				background: linear-gradient(45deg, #fff 0%,'.construct_get_option('main_color').' 45%, '.construct_get_option('main_color').' 55%, #fff 100%);
			}

			a, 
			.text-accent-color, 
			p.dropcap span.first-letter, 
			#hero-section .links .link:hover,#hero-section .links .link:hover:after, 
			#hero-section .arrow:hover:after,
			#site-logo .site-logo-text:hover, 
			#site-header.style-1 .header-search-icon:hover,#site-header.style-2 .header-search-icon:hover,
			#site-header.style-3 .header-search-icon:hover,#site-header.style-4 .header-search-icon:hover,
			#site-header.style-5 .header-search-icon:hover, 
			#site-header .nav-top-cart-wrapper .nav-cart-trigger:hover, 
			.nav-top-cart-wrapper .nav-shop-cart ul li a:hover, 
			#main-nav > ul > li.current-menu-item > a,
			#site-header .wprt-info .info-i span, 
			#main-nav > ul > li > a:hover, 
			#site-header.style-2 #main-nav > ul > li > a:hover,#site-header.style-2 #main-nav > ul > li.current-menu-item > a,
			#site-header.style-3 #main-nav > ul > li > a:hover,#site-header.style-3 #main-nav > ul > li.current-menu-item > a,
			#site-header.style-5 #main-nav > ul > li > a:hover,
			#site-header.style-5 #main-nav > ul > li.current-menu-item > a, 
			#main-nav .sub-menu li a:hover, 
			#main-nav-mobi ul > li > a:hover, 
			#featured-title #breadcrumbs a, 
			.hentry .post-title a:hover, 
			.hentry .post-meta a:hover, 
			.hentry .post-meta .post-categories, 
			.hentry .post-meta.style-3 .item .inner:before, 
			.comment-reply a, 
			#sidebar .widget ul li a:hover,#footer-widgets .widget ul li a:hover, 
			.widget_search .search-form .search-submit:hover:before,#footer-widgets .widget.widget_search .search-form .search-submit:hover:before, 
			#sidebar .widget.widget_nav_menu .menu > li > a:hover, 
			#sidebar .widget.widget_twitter .tweets-slider.grid .cbp-item:before,#footer-widgets .widget.widget_twitter .tweets-slider.grid .cbp-item:before, 
			#sidebar .widget.widget_twitter .tweet-intents a:hover,#footer-widgets .widget.widget_twitter .tweet-intents a:hover, 
			#sidebar .widget.widget_twitter .tweets-slider.slider .tweet-icon,#footer-widgets .widget.widget_twitter .tweets-slider.slider .tweet-icon, 
			#sidebar .widget.widget.widget_information ul li:before,#footer-widgets .widget.widget_information ul li:before, 
			#footer-widgets .widget.widget_twitter .timestamp a, 
			.one-page #footer-widgets .widget_socials .socials a:hover:before, 
			#bottom ul.bottom-nav > li > a:hover,
			.wprt-icon-text:hover .icon, 
			.wprt-icon-text h3 a:hover, 
			.wprt-icon-box > .dd-title a:hover, 
			.wprt-icon-box .dd-icon, 
			.wprt-icon-box.accent-background:hover .dd-icon, 
			.wprt-icon-box.accent-background.icon-effect-2:hover .dd-icon, 
			.wprt-icon-box.accent-background.icon-effect-1:hover .dd-icon, 
			.wprt-icon-box.grey-background .dd-icon, 
			.wprt-icon-box.icon-left .dd-title a:hover, 
			.wprt-icon-box.icon-left.accent-background:hover .dd-icon, 
			.wprt-icon-box.icon-left.grey-background .dd-icon, 
			.wprt-icon-box.icon-right.accent-background:hover .dd-icon, 
			.wprt-icon-box.icon-right.grey-background .dd-icon, 
			.wprt-button.outline, 
			.wprt-list.accent-color li:before, 
			.wprt-counter.has-plus .number:after, 
			.wprt-counter.accent-type .number, 
			.wprt-alert .remove:hover, 
			.project-item .effect-sadie p, 
			.project-item .effect-zoe p, 
			.project-item .effect-zoe h2:hover a, 
			.service-item .title a:hover, 
			.widget_search .search-form .search-submit:before, #footer-widgets .widget.widget_search .search-form .search-submit:before,
			.arrow-style-2 .cbp-nav-next:after,.arrow-style-2 .cbp-nav-prev:after, 
			.woocommerce div.product .woocommerce-tabs ul.tabs li a,
			.woocommerce-page .content-woocommerce .products li h3:hover, 
			.woocommerce-page .content-woocommerce .products li .price,.woocommerce ul.products li.product .price,
			.wprt-project.arrow-style-2 #projects .cbp-nav-next:after, .wprt-project.arrow-style-2 #projects .cbp-nav-prev:after, 
			.wprt-service.arrow-style-2 #service-wrap .cbp-nav-next:after, .wprt-service.arrow-style-2 #service-wrap .cbp-nav-prev:after, 
			.wprt-testimonials.arrow-style-2 #testimonials-wrap .cbp-nav-next:after, .wprt-testimonials.arrow-style-2 #testimonials-wrap .cbp-nav-prev:after, .wprt-team.arrow-style-2 #team-wrap .cbp-nav-next:after, 
			.wprt-team.arrow-style-2 #team-wrap .cbp-nav-prev:after, .wprt-galleries-grid.arrow-style-2 #images-wrap .cbp-nav-next:after, .wprt-galleries-grid.arrow-style-2 #images-wrap .cbp-nav-prev:after
			{
				color:'.construct_get_option('main_color').';
			}

			blockquote, 
			.hentry .post-share a:hover:after, 
			#sidebar .widget.widget_socials .socials a:hover:before,#footer-widgets .widget.widget_socials .socials a:hover:before, 
			#sidebar .widget.widget_tag_cloud .tagcloud a:hover:after,#footer-widgets .widget.widget_tag_cloud .tagcloud a:hover:after, 
			.one-page #footer-widgets .widget_socials .socials a:hover:before, 
			.wprt-pagination ul li a.page-numbers:hover,.woocommerce-pagination .page-numbers li .page-numbers:hover,
			.wprt-pagination ul li .page-numbers.current,.woocommerce-pagination .page-numbers li .current,
			.wprt-icon-box.grey-background:hover .dd-icon, 
			.wprt-icon-box.icon-left.grey-background:hover .dd-icon, 
			.wprt-icon-box.icon-right.grey-background:hover .dd-icon, 
			.wprt-button, .bullet-style-2 #team-wrap .cbp-nav-pagination-item,
			.wprt-button.dark:hover, 
			.wprt-button.light:hover, 
			.wprt-button.very-light:hover, 
			.wprt-button.outline, 
			.wprt-button.outline:hover, 
			.wprt-button.outline.dark:hover, 
			.wprt-button.outline.light:hover, 
			.wprt-button.outline.very-light:hover, 
			.wprt-toggle.active .toggle-title, 
			.wprt-galleries.galleries #wprt-carousel .slides > li:hover:after, 
			.bullet-style-2 .cbp-nav-pagination-item, 
			.bullet-style-2 #service-wrap .cbp-nav-pagination-item, .bullet-style-2 #projects .cbp-nav-pagination-item, 
			.bullet-style-2 #testimonials-wrap .cbp-nav-pagination-item, .bullet-style-2 #partner-wrap .cbp-nav-pagination-item, 
			.bullet-style-2 .widget_twitter .cbp-nav-pagination-item, .bullet-style-2 #team-wrap .cbp-nav-pagination-item, 
			.bullet-style-2 #images-wrap .cbp-nav-pagination-item,
			.wprt-galleries.galleries #wprt-carousel .slides > li.flex-active-slide:after,
			.arrow-style-2 .cbp-nav-next:before,.arrow-style-2 .cbp-nav-prev:before,
			.woocommerce-page .content-woocommerce .products li .product-thumbnail:hover, 
			.woocommerce-page .content-woocommerce .products li .added_to_cart.wc-forward, 
			.woocommerce-page .content-woocommerce .products li .add_to_cart_button.added, 
			.woocommerce-page .woo-single-post-class .summary .cart .single_add_to_cart_button,
			.wprt-project.arrow-style-2 #projects .cbp-nav-next:before, .wprt-project.arrow-style-2 #projects .cbp-nav-prev:before, 
			.wprt-service.arrow-style-2 #service-wrap .cbp-nav-next:before, .wprt-service.arrow-style-2 #service-wrap .cbp-nav-prev:before, 
			.wprt-testimonials.arrow-style-2 #testimonials-wrap .cbp-nav-next:before, .wprt-testimonials.arrow-style-2 #testimonials-wrap .cbp-nav-prev:before, 
			.wprt-team.arrow-style-2 #team-wrap .cbp-nav-next:before, .wprt-team.arrow-style-2 #team-wrap .cbp-nav-prev:before, 
			.wprt-galleries-grid.arrow-style-2 #images-wrap .cbp-nav-next:before, .wprt-galleries-grid.arrow-style-2 #images-wrap .cbp-nav-prev:before
			{

				border-color:'.construct_get_option('main_color').';
			}
			#sidebar .widget.widget_nav_menu .menu > li.current_page_item:after,#sidebar .widget.widget_nav_menu .menu > li.current-menu-item:after{
				border-left-color:'.construct_get_option('main_color').';
			}
			.animsition-loading:after{
				border-top-color:'.construct_get_option('main_color').';
			}
			.wprt-icon-box.accent-background .dd-icon,
			.wprt-icon-box.outline .dd-icon{
				box-shadow: inset 0 0 0 2px '.construct_get_option('main_color').'!important;
			}
			';
        }

        if(! empty($main_color)){
			echo '<style type="text/css">'.$main_color.'</style>';
		}
    }
}
add_action('wp_head', 'construct_color_scheme');