<?php 

// Heading
add_shortcode('heading', 'heading_func');
function heading_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'line'		=>	'',
		'tag'		=>	'h1',
		'color'		=>	'',
		'align'		=>	'center',
	), $atts));
		$color1 = (!empty($color) ? 'style=color:'.$color.'' : '');
		if($align == 'right'){
			$al = 'style-3 custom-1';
			$al1 = 'text-right';
		}elseif($align == 'left'){
			$al = 'style-1 custom-3';
			$al1 = 'text-left';
			$al2 = 'left';
		}else{
			$al = 'style-2 custom-1';
			$al1 = 'text-center';
			$al2 = '';
		}
	ob_start(); ?>

    <<?php echo esc_attr($tag); ?> class="<?php echo esc_attr($al1); ?>" <?php echo esc_attr($color1); ?>><?php echo htmlspecialchars_decode($title); ?></<?php echo esc_attr($tag); ?>>
    <?php if($line){ ?>
	    <div class="wprt-lines <?php echo esc_attr($al); ?>">
	        <div class="line-1"></div>
	    </div>
    <?php } ?>

    <?php if($content){ ?>
	    <div class="wprt-spacer" data-desktop="36" data-mobi="30" data-smobi="30"></div>
	    <div class="wprt-subtitle <?php echo esc_attr($al2); ?>"><?php echo htmlspecialchars_decode($content); ?></div>
	<?php } ?>
    	
<?php
    return ob_get_clean();
}

// Button
add_shortcode('button', 'button_func');
function button_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btn_text'	=>	'',
		'btn_link'	=>	'',
		'style'		=>	'style1',
		'size'		=>	'size1',
		'color'		=>	'',
		'bg_color'	=>	'',
		'bo_color'	=>	'',
		'round'		=>	'normal',
		'el_class'	=>	'',
	), $atts));
		if($size=='size1'){ $si = 'small'; }elseif($size=='size3'){ $si = 'big'; }else{ $si = ''; }
		if($style=='style2'){ $sty = 'outline'; }elseif($style=='style3' && $round=='normal'){ $sty = 'rounded-3px';}elseif($style=='style3' && $round=='big'){ $sty = 'rounded-30px'; }else{ $sty = ''; }
		$class = 'wprt-button ' .esc_attr($si).' '. esc_attr($sty).' '.esc_attr($el_class);
		$color1 = (!empty($color) ? 'color:'.$color.';' : '');
		$bg_color1 = (!empty($bg_color) ? 'background-color:'.$bg_color.';' : '');
		$bo_color1 = (!empty($bo_color) ? 'border-color:'.$bo_color.';' : '');	
	ob_start(); ?>

    <a class="<?php echo esc_attr($class); ?>" style="<?php echo esc_attr($bg_color1);echo esc_attr($bo_color1);echo esc_attr($color1); ?>" href="<?php echo esc_url($btn_link); ?>"><?php echo htmlspecialchars_decode($btn_text); ?></a>
    	
<?php
    return ob_get_clean();
}

// Home Slider
add_shortcode('homeslider', 'homeslider_func');
function homeslider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'imgslide'		=>	'',
		'slide'			=>	'',
		'scroll'		=>	'',	
		'link'			=>	'',
		'style'			=>	'scroll',
	), $atts));
		$slides = (array) vc_param_group_parse_atts( $slide );
		$imgslides = (array) vc_param_group_parse_atts( $imgslide );
        $i = 0;
        $x = 0;
        $j =count($imgslides);
        $y =count($slides);
	ob_start(); ?>

	<div id="hero-section" data-number="<?php echo esc_attr($j); ?>" <?php foreach ( $imgslides as $data ) { $img = wp_get_attachment_image_src($data['photo'],'full'); $img = $img[0];$i++; if($img){ ?> data-image-<?php echo esc_attr($i); ?>='<?php echo esc_url($img); ?>' <?php }} ?> data-effect="fade">
	    <div class="hero-content">
	        <div class="hero-title <?php echo esc_attr($style); ?>" data-min="28px" data-max="80px" data-numbers="<?php echo esc_attr($y); ?>" <?php foreach ( $slides as $sli ) { $x++; if($img){ ?> data-text-<?php echo esc_attr($x); ?>="<?php echo esc_attr($sli['text']); ?>" <?php } } ?>>
	            <?php if($style == 'scroll'){
	            	foreach ( $slides as $data ) { 
	            		$data['text'] = isset( $data['text'] ) ? $data['text'] : '';
	            
	            ?>
	            	<h1><?php echo htmlspecialchars_decode($data['text']); ?></h1>
	            <?php } }else{ ?>
	            	<h1><span>TEXT HERE</span></h1>
	            <?php } ?>
	        </div>

	        <div class="hero-text">
	            <?php echo htmlspecialchars_decode($content); ?>
	        </div>

	        <?php if($scroll){ ?><a class="arrow-2 bounce scroll-target" href="<?php echo esc_url($link); ?>"><span class="fa fa-angle-down"></span></a><?php } ?>
	    </div><!-- /.hero-content -->
	</div>
    	
<?php
    return ob_get_clean();
}

// Fun Fact
add_shortcode('facts', 'facts_func');
function facts_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'number'	=>	'',
		'symbol'	=>	'',
		'light'		=>	'',
	), $atts));
		
	ob_start(); ?>

	<div class="wprt-counter text-center <?php if($light){ echo 'white-type'; } ?> <?php if($symbol){ echo 'has-plus'; } ?>">
        <div class="number" data-speed="5000" data-to="<?php echo esc_attr($number); ?>" data-in-viewport="yes"><?php echo esc_attr($number); ?></div>
        <div class="text"><?php echo htmlspecialchars_decode($title); ?></div>
    </div>
    	
<?php
    return ob_get_clean();
}

// List Services
add_shortcode('listserv','listserv_func');
function listserv_func($atts, $content = null){
	extract(shortcode_atts(array(
		'num'		=>	'-1',
		'col'		=>	'',
		'btn'		=>	'',
		'layout'	=>	'center',
		'idcate_services' => '',
	), $atts));
	if($col == '2'){
		$c = 'col-sm-6';
	}elseif($col == '4'){
		$c = 'col-md-3 col-sm-6';
	}else{
		$c = 'col-md-4 col-sm-6';
	}
	if($layout=='center'){$la = 'text-center';}
	ob_start(); 
?>
	
	<div class="row">
	<?php	
		if ($idcate_services != '') {
    		$args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'category_service',
						'field' => 'slug',
						'terms' => explode(',',$idcate_services)
					),
				),
				'post_type' => 'service',
				'showposts' => $number1,
			);
    	}else{		
			$args = array(
				'post_type' => 'service',
				'posts_per_page' => $num,
			);
		}
		$serv = new WP_Query($args);
		if($serv->have_posts()) : while($serv->have_posts()) : $serv->the_post();
	?>
	<div class="<?php echo esc_attr($c); ?>">
		<div class="service-item clearfix <?php echo esc_attr($la); ?>">
	        <div class="thumb"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a></div>
	        <div class="service-item-wrap">
	            <h3 class="title font-size-18"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	            <div class="desc"><?php the_excerpt(); ?></div>
	            <?php if($btn){ ?>
		            <div class="link">
		                <a href="<?php the_permalink(); ?>" class="wprt-button small rounded-3px"><?php echo esc_html($btn); ?></a>
		            </div>
		        <?php } ?>
	        </div>
	    </div>
	    <div class="wprt-spacer" data-desktop="60" data-mobi="60" data-smobi="60"></div>
	</div>

	<?php endwhile; endif ?>
	</div>
  	
<?php
    return ob_get_clean();
}

// Services Slider
add_shortcode('sliserv','sliserv_func');
function sliserv_func($atts, $content = null){
	extract(shortcode_atts(array(
		'num'		=>	'-1',
		'col'		=>	'',
		'btn'		=>	'',
		'layout'	=>	'center',
	), $atts));
	
	ob_start(); 
?>
	
	<div class="wprt-service arrow-style-2 has-arrows arrow60 arrow-light" data-layout="slider" data-column="3" data-column2="3" data-column3="2" data-column4="1" data-gaph="30" data-gapv="30">
		<div id="service-wrap" class="cbp">
			<?php			
				$args = array(
					'post_type' => 'service',
					'posts_per_page' => $num,
				);
				$serv = new WP_Query($args);
				if($serv->have_posts()) : while($serv->have_posts()) : $serv->the_post();
			?>
				<div class="cbp-item">
	                <div class="service-item clearfix <?php if($layout=='center'){echo 'text-center';} ?>">
	                    <div class="thumb"><?php the_post_thumbnail(); ?></div>
	                    <div class="service-item-wrap">
	                        <h3 class="title font-size-18"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	                        <p><?php the_excerpt(); ?></p>
	                        <a href="<?php the_permalink(); ?>" class="wprt-button small rounded-3px"><?php echo esc_html($btn); ?></a>
	                    </div>
	                </div>
	            </div>
	        <?php endwhile; endif ?>
		</div>
	</div>
  	
<?php
    return ob_get_clean();
}

// Portfolio Filter
add_shortcode('portfoliof', 'portfoliof_func');
function portfoliof_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'8',
		'col'   	=> 	'4',
		'filter'	=>	'',	
		'gap'		=>	'0',
	), $atts));
	
	ob_start(); ?>

	<div class="wprt-project" data-layout="grid" data-column="<?php echo esc_attr($col); ?>" data-column2="3" data-column3="2" data-column4="1" data-gaph="<?php echo esc_attr($gap); ?>" data-gapv="<?php echo esc_attr($gap); ?>">
		<div id="project-filter">
			<?php if($all) { ?><div data-filter="*" class="cbp-filter-item"><span><?php echo esc_html($all); ?></span></div><?php } ?>
			<?php 
	  			$categories = get_terms('categories');
	   			foreach( (array)$categories as $categorie){
	    			$cat_name = $categorie->name;
	    			$cat_slug = $categorie->slug;
			?>
	    	<div data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>" class="cbp-filter-item"><span><?php echo htmlspecialchars_decode( $cat_name ); ?></span></div>
	    	<?php } ?>
		</div>

		<div id="projects" class="cbp">
			<?php 
	  			$args = array(   
	    			'post_type' => 'portfolio',   
	    			'posts_per_page' => $num,	            
	  			);  
	  			$wp_query = new WP_Query($args);
	  			while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
	  			$cates = get_the_terms(get_the_ID(),'categories');
	  			$cate_name ='';
	  			$cate_slug = '';
	      		foreach((array)$cates as $cate){
	      			if(count($cates)>0){
	        			$cate_name .= $cate->name.'<span>, </span>' ;
	        			$cate_slug .= $cate->slug .' ';     
	      			} 
	  			}	  			
	  			$style = get_post_meta(get_the_ID(),'_cmb_hover', true);;
			?>
			<div class="cbp-item <?php echo esc_attr($cate_slug); ?>">
                <div class="project-item">
                    <div class="inner">
                        <div class="grid">
                        <figure class="<?php echo esc_attr($style); ?>">
                        	<a class="link" href="<?php the_permalink(); ?>"></a>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <figcaption>
                                <div>
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p><?php echo htmlspecialchars_decode($cate_name); ?></p>
                                </div>
                            </figcaption>           
                        </figure>
                        </div>

                         <a class="project-zoom cbp-lightbox" href="<?php the_post_thumbnail_url(); ?>" data-title="<?php the_title(); ?>">
                            <i class="fa fa-arrows-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>

<?php
    return ob_get_clean();
}

// Portfolio Slider
add_shortcode('portfolios', 'portfolios_func');
function portfolios_func($atts, $content = null){
	extract(shortcode_atts(array(
		'num'		=> 	'8',
		'col'   	=> 	'4',
		'bul'		=>	'',
		'arr'		=>	'',
		'gap'		=>	'0',
	), $atts));
	
	ob_start(); ?>

	<div class="wprt-project <?php if($bul) echo 'has-bullets bullet-style-2'; ?> <?php if($arr) echo 'arrow-style-2 has-arrows arrow60 arrow-dark'; ?>" data-layout="slider" data-column="<?php echo esc_attr($col); ?>" data-column2="<?php echo esc_attr($col); ?>" data-column3="2" data-column4="1" data-gaph="<?php echo esc_attr($gap); ?>" data-gapv="<?php echo esc_attr($gap); ?>">
		<div id="projects" class="cbp">
			<?php 
	  			$args = array(   
	    			'post_type' => 'portfolio',   
	    			'posts_per_page' => $num,	            
	  			);  
	  			$wp_query = new WP_Query($args);
	  			while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
	  			$cates = get_the_terms(get_the_ID(),'categories');
	  			$cate_name ='';
	  			$cate_slug = '';
	      		foreach((array)$cates as $cate){
	      			if(count($cates)>0){
	        			$cate_name .= $cate->name.'<span>, </span>' ;
	        			$cate_slug .= $cate->slug .' ';     
	      			} 
	  			}	  			
	  			$style = get_post_meta(get_the_ID(),'_cmb_hover', true);;
			?>
			<div class="cbp-item">
                <div class="project-item">
                    <div class="inner">
                        <div class="grid">
                        <figure class="<?php echo esc_attr($style); ?>">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <figcaption>
                                <div>
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p><?php echo htmlspecialchars_decode($cate_name); ?></p>
                                </div>
                            </figcaption>        
                        </figure>
                        </div>

                        <a class="project-zoom cbp-lightbox" href="<?php the_post_thumbnail_url(); ?>" data-title="<?php the_title(); ?>">
                            <i class="fa fa-arrows-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>

<?php
    return ob_get_clean();
}


// Feature Box Simple
add_shortcode('feature', 'feature_func');
function feature_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=>	'',
		'icons'		=>	'',
		'title'		=>	'',	
		'size'		=>	'size1',
		'style'		=>	'style1',
	), $atts));
		if($size=='size1'){
			$sz = 'font-size-40';
		}elseif($size=='size2'){
			$sz = 'font-size-50';		
		}elseif($size=='size3'){
			$sz = 'font-size-60';
		}else{
			$sz = 'font-size-70';
		}
		if($style=='style3'){
			$st = 'icon-right';
		}elseif ($style=='style2') {
			$st = 'icon-left';
		}else{
			$st = '';
		}
	ob_start(); ?>

	<div class="wprt-icon-box <?php echo esc_attr($st); ?>">
        <div class="icon-wrap <?php echo esc_attr($sz); ?>">
            <span class="dd-icon <?php echo esc_attr($icon); ?> <?php echo esc_attr($icons); ?>"></span>
        </div>
        <div class="content-wrap">
            <h3 class="dd-title font-size-18"><?php echo htmlspecialchars_decode($title); ?></h3>
            <p><?php echo htmlspecialchars_decode($content); ?></p>
        </div>
    </div>

<?php
    return ob_get_clean();
}

// Feature Box Outline
add_shortcode('featureout', 'featureout_func');
function featureout_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=>	'',
		'icons'		=>	'',
		'title'		=>	'',	
		'size'		=>	'size1',
		'style'		=>	'style1',
		'ostyle'	=>	'square',
		'effect'	=>	'effect1',
	), $atts));
		if($size=='size1'){$sz = 'font-size-40';$wi='width-70';}elseif($size=='size2'){$sz = 'font-size-50';$wi='width-90';}elseif($size=='size3'){$sz = 'font-size-60';$wi='width-120';}else{$sz = 'font-size-70';$wi='width-150';}
		if($style=='style3'){$st = 'icon-right';}elseif ($style=='style2') {$st = 'icon-left';}else{$st = '';}
		if($ostyle=='rounded'){$os = 'rounded outline';}else{$os = 'outline';}
		if($effect=='effect2'){$ef = 'icon-effect-2';}elseif($effect=='effect3'){$ef = 'icon-effect-3';}else{$ef = 'icon-effect-1';}
	ob_start(); ?>

	<div class="wprt-icon-box <?php echo esc_attr($st); ?> <?php echo esc_attr($os); ?> <?php echo esc_attr($ef); ?> <?php echo esc_attr($wi); ?>">
        <div class="icon-wrap <?php echo esc_attr($sz); ?>">
            <span class="dd-icon <?php echo esc_attr($icon); ?> <?php echo esc_attr($icons); ?>"></span>
        </div>
        <div class="content-wrap">
            <h3 class="dd-title font-size-18"><?php echo htmlspecialchars_decode($title); ?></h3>
            <p><?php echo htmlspecialchars_decode($content); ?></p>
        </div>
    </div>

<?php
    return ob_get_clean();
}

// Feature Box Background
add_shortcode('featureback', 'featureback_func');
function featureback_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=>	'',
		'icons'		=>	'',
		'title'		=>	'',	
		'size'		=>	'size1',
		'style'		=>	'style1',
		'ostyle'	=>	'square',
		'effect'	=>	'effect1',
		'bg_color'	=>	'bg_color1'
	), $atts));
		if($size=='size1'){$sz = 'font-size-40';$wi='width-70';}elseif($size=='size2'){$sz = 'font-size-50';$wi='width-90';}elseif($size=='size3'){$sz = 'font-size-60';$wi='width-120';}else{$sz = 'font-size-70';$wi='width-150';}
		if($style=='style3'){$st = 'icon-right';}elseif ($style=='style2') {$st = 'icon-left';}else{$st = '';}
		if($ostyle=='rounded'){$os = 'rounded';}else{$os = '';}
		if($effect=='effect2'){$ef = 'icon-effect-2';}elseif($effect=='effect3'){$ef = 'icon-effect-3';}else{$ef = 'icon-effect-1';}
		if($bg_color=='bg_color2'){$bg = 'grey-background';}else{$bg = 'accent-background';}
	ob_start(); ?>

	<div class="wprt-icon-box <?php echo esc_attr($bg); ?> <?php echo esc_attr($st); ?> <?php echo esc_attr($os); ?> <?php echo esc_attr($ef); ?> <?php echo esc_attr($wi); ?>">
        <div class="icon-wrap <?php echo esc_attr($sz); ?>">
            <span class="dd-icon <?php echo esc_attr($icon); ?> <?php echo esc_attr($icons); ?>"></span>
        </div>
        <div class="content-wrap">
            <h3 class="dd-title font-size-18"><?php echo htmlspecialchars_decode($title); ?></h3>
            <p><?php echo htmlspecialchars_decode($content); ?></p>
        </div>
    </div>

<?php
    return ob_get_clean();
}

// Call To Action
add_shortcode('call_to', 'call_to_func');
function call_to_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'linkbox'	=>	'',
		'style'		=>	'style1',
	), $atts));
		$url 	= vc_build_link( $linkbox );		
	ob_start(); ?>

	<?php if($style=='style2'){ ?>
            <h3 class="text-center text-white font-family-heading font-size-30 margin-bottom-20"><?php echo htmlspecialchars_decode($title); ?></h3>
            <div class="text-center margin-top-30">
                <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
					echo '<a class="wprt-button rounded-3px" href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) .'</a>';
				} ?>
            </div>
	<?php }else{ ?>
		<div class="col-md-8">
	        <div class="wprt-spacer" data-desktop="8" data-mobi="0" data-smobi="0"></div>
	        <h2 class="text-white text-center-mobile font-size-20 margin-bottom-0"><?php echo htmlspecialchars_decode($title); ?></h2>
	        <div class="wprt-spacer" data-desktop="0" data-mobi="20" data-smobi="20"></div>
	    </div>

	    <div class="col-md-4">
	        <div class="text-right text-center-mobile">
	        
	        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
				echo '<a class="wprt-button white rounded-3px" href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) .'</a>';
			} ?>
	        </div>
	    </div>
	<?php } ?>

<?php
    return ob_get_clean();
}

// Testimonial Silder
add_shortcode('testslide','testslide_func');
function testslide_func($atts, $content = null){
	extract(shortcode_atts(array(
		'testi'		=>	'',
		'col'		=>	'1',
		'nav'		=>	'',
		'star'		=>	'',
	), $atts));
	$test = (array) vc_param_group_parse_atts( $testi );	
	ob_start(); 
?>

	<div class="wprt-testimonials <?php if($nav) echo 'has-outline arrow-style-2 has-arrows arrow60 arrow-light'; if(!$star) echo ' no-stars'; ?>" data-layout="slider" data-column="<?php echo esc_attr($col); ?>" data-column2="<?php if($col > 1 ) echo esc_attr($col - 1); ?>" data-column3="1" data-column4="1" data-gaph="10" data-gapv="10">
        <div id="testimonials-wrap" class="cbp">
			<?php foreach ( $test as $tes ) { ?>
			<?php 
				$img = wp_get_attachment_image_src($tes['photo'],'full'); 
				$img = $img[0]; 
			?>
			<div class="cbp-item">
		        <div class="customer clearfix">
		            <div class="inner">
		                <div class="image"><img src="<?php echo esc_url($img); ?>" alt="image" /></div>
		                <h4 class="name"><?php echo esc_html($tes['name']); ?></h4>
		                <div class="position"><?php echo esc_html($tes['job']); ?></div>
		                <blockquote class="whisper"><?php echo htmlspecialchars_decode($tes['text']); ?></blockquote>
		            </div>
		        </div>
		    </div>
		    <?php } ?>
		</div>
	</div>

<?php
    return ob_get_clean();
}


// Team Slider
add_shortcode('teamslider','teamslider_func');
function teamslider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'num'		=>	'',
		'bul'		=>	'',
		'arr'		=>	'',
		'col'		=>	'4',
	), $atts));
	
	ob_start(); 
?>	
	
	<div class="wprt-team <?php if($bul) echo 'has-bullets bullet-style-2 bullet30'; ?> <?php if($arr) echo 'arrow-style-2 has-arrows arrow60 arrow-light'; ?>" data-layout="slider" data-column="<?php echo esc_attr($col); ?>" data-column2="3" data-column3="2" data-column4="1" data-gaph="30" data-gapv="30">
    	<div id="team-wrap" class="cbp">
    		<?php			
				$args = array(
					'post_type' => 'team',
					'posts_per_page' => $num,
				);
				$team = new WP_Query($args);
				if($team->have_posts()) : while($team->have_posts()) : $team->the_post();
				$image = wp_get_attachment_url(get_post_thumbnail_id());
				$job = get_post_meta(get_the_ID(),'_cmb_job_team', true);
				$team_fb = get_post_meta(get_the_ID(),'_cmb_team_fb', true);
				$team_tt = get_post_meta(get_the_ID(),'_cmb_team_tt', true);
				$team_li = get_post_meta(get_the_ID(),'_cmb_team_li', true);
				$team_gg = get_post_meta(get_the_ID(),'_cmb_team_gg', true);
				$team_in = get_post_meta(get_the_ID(),'_cmb_team_in', true);
			?>
    		<div class="cbp-item">
                <div class="member">
                    <div class="inner">
                        <div class="image">
                            <div class="inner">
                                <?php the_post_thumbnail(); ?>
                            </div>
                             	<ul class="socials clearfix">
	                                <?php if($team_fb) { ?>
							    		<li class="facebook"><a href="<?php echo esc_url($team_fb); ?>"><i class="fa fa-facebook"></i></a></li>
							    	<?php }if($team_tt) { ?>						    		
							    		<li class="twitter"><a href="<?php echo esc_url($team_tt); ?>"><i class="fa fa-twitter"></i></a></li>
							    	<?php }if($team_li) { ?>
							    		<li class="linkedin"><a href="<?php echo esc_url($team_li); ?>"><i class="fa fa-linkedin"></i></a></li>
							    	<?php }if($team_gg) { ?>
							    		<li class="google-plus"><a href="<?php echo esc_url($team_gg); ?>"><i class="fa fa-google-plus"></i></a></li>
							    	<?php }if($team_in) { ?>
							    		<li class="instagram"><a href="<?php echo esc_url($team_in); ?>"><i class="fa fa-instagram"></i></a></li>						    	
                             		<?php } ?>
                             	</ul>
                        </div>
                        <div class="texts">
                            <h4 class="name"><?php the_title(); ?></h4>
                            <div class="position"><?php echo esc_html($job); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
    	</div>
    </div>

<?php
    return ob_get_clean();
}

// Logo Clients
add_shortcode('clients','clients_func');
function clients_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'speed'		  	=>	'6000',	
		'col'		  	=>	'5',
		'type'		  	=>	'slide',
	), $atts));
		$img = wp_get_attachment_image_src($gallery,'full');
		$img = $img[0];
		$id = uniqid( 'partner-' );
	ob_start(); ?>

	<?php if($type == 'slide') { ?>	
        <div class="wprt-partners">
	        <div id="<?php echo esc_attr($id); ?>" class="owl-carousel">
	        	<?php 
					$img_ids = explode(",",$gallery);
					foreach( $img_ids AS $img_id ){
					$meta = wp_prepare_attachment_for_js($img_id);
					$caption = $meta['caption'];
					$title = $meta['title'];	
					$description = $meta['description'];
					$image_src = wp_get_attachment_image_src($img_id,''); 
				?>
				<div class="partner">
					<?php if($caption){ ?><a href="<?php echo esc_url($caption); ?>" ><?php } ?>
	            		<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="">
	            	<?php if($caption){ ?></a><?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<script>
			(function($) { "use strict";	

				$( "#<?php echo esc_js($id); ?>" ).owlCarousel({
    				autoplay: true,
	            	autoplayTimeout: <?php echo esc_js($speed); ?>,
		            items : <?php echo esc_js($col); ?>,
		            responsiveClass:true,
		            navigation : false,
		            pagination : false,
		            navigationText: ["",""],
		            responsive : {
			            // breakpoint from 0 up
			            0 : {
			               items:1,
			            },
			            // breakpoint from 480 up
			            480 : {
			               items:1,
			            },
			            // breakpoint from 768 up
			            768 : {
			                items:3,
			            },
			            992 : {
			                items:3,
			            },
			            1440 : {
			                items:<?php echo esc_js($col); ?> - 1,
			            },
			            1920 : {
			                items:<?php echo esc_js($col); ?>,
			            }
			        },
		            
		        }); 

			})(jQuery); 
		</script>
	<?php }else{ ?>
		<div class="wprt-partner-grid has-outline col-3 gutter-10">
            <div class="partner-wrap clearfix">
                <div class="partner-row clearfix">
                	<?php 
						$img_ids = explode(",",$gallery);
						foreach( $img_ids AS $img_id ){
						$meta = wp_prepare_attachment_for_js($img_id);
						$caption = $meta['caption'];
						$title = $meta['title'];	
						$description = $meta['description'];
						$image_src = wp_get_attachment_image_src($img_id,''); 
					?>
                    <div class="partner-item">
                        <div class="inner-item">
                            <?php if($caption){ ?><a href="<?php echo esc_url($caption); ?>" ><?php } ?>
			            		<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="">
			            	<?php if($caption){ ?></a><?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
	<?php } ?>

<?php
    return ob_get_clean();	
}

// Service Box
add_shortcode('serbox', 'serbox_func');
function serbox_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=>	'',
		'title'		=>	'',
		'btn'		=>	'',
		'link'		=>	''
	), $atts));
		$img 	 = wp_get_attachment_image_src($photo,'full');
		$img 	 = $img[0];
	ob_start(); ?>

    <div class="wprt-image-box left clearfix">
        <div class="image-wrap">
            <img src="<?php echo esc_url($img); ?>" alt="" />
        </div>
        <div class="content-wrap">
            <h3 class="dd-title font-size-18"><?php if($link){ ?><a href="<?php echo esc_url($link); ?>"><?php } ?><?php echo htmlspecialchars_decode($title); ?><?php if($link){ ?></a><?php } ?></h3>
            <p><?php echo htmlspecialchars_decode($content); ?></p>
            <?php if($btn){ ?><div class="dd-link"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($btn); ?></a></div><?php } ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}

// Division Box
add_shortcode('division', 'division_func');
function division_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=>	'',
		'icons'		=>	'',
		'title'		=>	'',
		'btn'		=>	'',
		'link'		=>	''
	), $atts));

	ob_start(); ?>

	<div class="wprt-content-box style-1">
	    <div class="wprt-icon-box icon-effect-2 icon-left">
	        <div class="icon-wrap">
	            <span class="dd-icon <?php echo esc_attr($icon); ?> <?php echo esc_attr($icons); ?>"></span>
	        </div>
	        <div class="content-wrap">
	            <h3 class="dd-title text-white font-size-19"><?php if($link){ ?><a href="<?php echo esc_url($link); ?>"><?php } ?><?php echo htmlspecialchars_decode($title); ?><?php if($link){ ?></a><?php } ?></h3>
	            <?php if($btn){ ?><div class="dd-link"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($btn); ?></a></div><?php } ?>
	        </div>
	    </div>
    </div>

<?php
    return ob_get_clean();
}

// Image Carousel
add_shortcode('carousels','carousels_func');
function carousels_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'col'		  	=>	'1',
		'gap'			=>	'30',
		'navi'			=>	'',
		'pagi'			=>	'',
	), $atts));		
		
	ob_start(); ?>
	
	<div class="wprt-galleries-grid <?php if($navi){ echo 'arrow-style-1 has-arrows arrow60 arrow-position-2'; } ?> <?php if($pagi){ echo 'has-bullets bullet-style-2 bullet30'; } ?>" data-layout="slider" data-column="<?php echo esc_attr($col); ?>" data-column2="<?php echo esc_attr($col); ?>" data-column3="<?php echo esc_attr($col); ?>" data-column4="<?php echo esc_attr($col); ?>" data-gaph="<?php echo esc_attr($gap); ?>" data-gapv="<?php echo esc_attr($gap); ?>">
		<div id="images-wrap" class="cbp">
			<?php 
				$img_ids = explode(",",$gallery);
	            foreach( $img_ids AS $img_id ){
	            $image_src = wp_get_attachment_image_src($img_id,'full');
	            $meta = wp_prepare_attachment_for_js($img_id);
				$alt = $meta['alt'];
			?>
				<div class="cbp-item">
                    <div class="item-wrap">
                        <a class="zoom" href="<?php echo esc_url($image_src[0]); ?>"><i class="fa fa-arrows-alt"></i></a>
                        <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($alt); ?>" />
                    </div>
                </div>
			<?php } ?>
		</div>
	</div>

<?php
    return ob_get_clean();	
}

// Image Carousel With Thumbnail
add_shortcode('carousel','carousel_func');
function carousel_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
	), $atts));
		
	ob_start(); ?>
	
	<div class="wprt-galleries galleries w-770px" data-width="142" data-margin="15">
        <div id="wprt-slider" class="flexslider">
            <ul class="slides">
                <?php 
					$img_ids = explode(",",$gallery);
		            foreach( $img_ids AS $img_id ){
		            $image_src = wp_get_attachment_image_src($img_id,'full');
				?>
	                <li class="flex-active-slide">
	                    <a class="zoom" href="<?php echo esc_url($image_src[0]); ?>"><i class="fa fa-arrows-alt"></i></a>
	                    <img src="<?php echo esc_url($image_src[0]); ?>" alt="image" />
	                </li>
	            <?php } ?>                
            </ul>
        </div>

        <div id="wprt-carousel" class="flexslider">
            <ul class="slides">
            	<?php 
					$img_ids = explode(",",$gallery);
		            foreach( $img_ids AS $img_id ){
		            $image_src = wp_get_attachment_image_src($img_id,'full');
				?>
                	<li><img src="<?php echo esc_url($image_src[0]); ?>" alt="image"></li>
                <?php } ?>
            </ul>
        </div>
    </div>	

<?php
    return ob_get_clean();	
}

// Image Grid
add_shortcode('imagegrid','imagegrid_func');
function imagegrid_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'col'		  	=>	'1',
		'gap'			=>	'10',
	), $atts));		
		
	ob_start(); ?>
	
	<div class="wprt-galleries-grid has-bullets bullet-style-2 bullet30" data-layout="grid" data-column="<?php echo esc_attr($col); ?>" data-column2="<?php echo esc_attr($col); ?>" data-column3="<?php echo esc_attr($col); ?>" data-column4="<?php echo esc_attr($col); ?>" data-gaph="<?php echo esc_attr($gap); ?>" data-gapv="<?php echo esc_attr($gap); ?>">
		<div id="images-wrap" class="cbp">
            <?php 
				$img_ids = explode(",",$gallery);
	            foreach( $img_ids AS $img_id ){
	            $image_src = wp_get_attachment_image_src($img_id,'full');
			?>
				<div class="cbp-item">
                    <div class="item-wrap">
                        <a class="zoom" href="<?php echo esc_url($image_src[0]); ?>"><i class="fa fa-arrows-alt"></i></a>
                        <img src="<?php echo esc_url($image_src[0]); ?>" alt="image" />
                    </div>
                </div>
			<?php } ?>
        </div>
	</div>

<?php
    return ob_get_clean();	
}

//Skills
add_shortcode('skills','skills_func');
function skills_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'number'	=>	'',
	), $atts));
	
	ob_start(); 
?>
	
	<div class="wprt-progress clearfix">
        <div class="title"><?php echo htmlspecialchars_decode($title) ?></div>
        <div class="perc"><?php echo esc_attr($number); ?>%</div>
        <div class="progress-bar" data-percent="<?php echo esc_attr($number); ?>%" data-in-viewport="yes">
            <div class="progress-animate"></div>
        </div>
    </div>

<?php
    return ob_get_clean();
}