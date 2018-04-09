<?php

/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */

function construct_register_meta_boxes( $meta_boxes ) {

	$prefix = '_cmb_';
	$meta_boxes[] = array(

		'id'       => 'format_detail',

		'title'    => esc_html__( 'Format Details', 'construct' ),

		'pages'    => array( 'post' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(

			array(

				'name'             => esc_html__( 'Image', 'construct' ),

				'id'               => $prefix . 'image',

				'type'             => 'image_advanced',

				'class'            => 'image',

				'max_file_uploads' => 1,

			),

			array(

				'name'  => esc_html__( 'Gallery', 'construct' ),

				'id'    => $prefix . 'images',

				'type'  => 'image_advanced',

				'class' => 'gallery',

			),			

			array(

				'name'  => esc_html__( 'Audio', 'construct' ),

				'id'    => $prefix . 'link_audio',

				'type'  => 'oembed',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'audio',

				'desc' => 'Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',

			),

			array(

				'name'  => esc_html__( 'Video', 'construct' ),

				'id'    => $prefix . 'link_video',

				'type'  => 'oembed',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'video',

				'desc' => 'Example: <b>https://player.vimeo.com/video/112734492</b>',

			),			

		),

	);

	$meta_boxes[] = array(
		'id'       => 'project_settings',
		'title'    => esc_html__( 'Projects Settings', 'construct' ),
		'pages'    => array( 'portfolio' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(            
			array(
				'name' => 'Hover Style',
                'id'   => $prefix . 'hover',
                'type' => 'select',
                'options' => array(
                	'effect-zoe' => 'Hover Style 1: Not Overlay & Title Bottom', 
                	'effect-honey' => 'Hover Style 2: Overlay Grey & Title Left' ,
                	'effect-oscar' => 'Hover Style 3: Overlay',
                	'effect-sadie' => 'Hover Style 4: Overlay Grey & Title Center',
                ),
			),    		
		),

	);


	$meta_boxes[] = array(
		'id'         => 'job_team',
		'title'      => 'Team Details',
		'pages'      => array( 'team' ), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		'fields' => array(			
            array(
                'name' => 'Job',
                'desc' => 'Job of Person',
                'id'   => $prefix . 'job_team',
                'type' => 'text',
            ),
            array(
				'name'  => 'Facebook',
				'desc'	=>	'Link of facebook',
				'id'    => $prefix . 'team_fb',
				'type'  => 'text',
			), 
			array(
				'name'  => 'Twitter',
				'desc'	=>	'Link of twitter',
				'id'    => $prefix . 'team_tt',
				'type'  => 'text',
			),  
			array(
				'name'  => 'Linkedin',
				'desc'	=>	'Link of linkedin',
				'id'    => $prefix . 'team_li',
				'type'  => 'text',
			), 
			array(
				'name'  => 'Google+',
				'desc'	=>	'Link of google plus',
				'id'    => $prefix . 'team_gg',
				'type'  => 'text',
			),
			array(
				'name'  => 'Instagram',
				'desc'	=>	'Link of instagram',
				'id'    => $prefix . 'team_in',
				'type'  => 'text',
			),  
		)
	);

	$meta_boxes[] = array(
		'id'       => 'page_dt',
		'title'    => __( 'Page Settings', 'construct' ),
		'pages'    => array( 'page', 'post', 'service', 'portfolio' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(	
			array(
				'name'             => __( 'Background Page Header', 'construct' ),
				'id'               => $prefix . 'subheader_image',
				'type'             => 'image_advanced',			
				'max_file_uploads' => 1,
			),					
		),

	);
	

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'construct_register_meta_boxes' );

