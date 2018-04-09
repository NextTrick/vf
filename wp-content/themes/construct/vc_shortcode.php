<?php 

// Heading
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Heading", 'construct'),
   "base" => "heading",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'construct'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title of heading", 'construct')
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Element Tag", 'construct'),
         "param_name" => "tag",
         "value" => array(                        
                     esc_html__('h1', 'construct')   => 'h1',
                     esc_html__('h2', 'construct')   => 'h2',
                     esc_html__('h3', 'construct')   => 'h3',
                     esc_html__('h4', 'construct')   => 'h4',
                     esc_html__('h5', 'construct')   => 'h5',
                     esc_html__('h6', 'construct')   => 'h6',                     
                  ),
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Color", 'construct'),
         "param_name" => "color",
         "value" => "",
         "description" => esc_html__("Color of title text", 'construct')
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Text Align", 'construct'),
         "param_name" => "align",
         "value" => array(                        
                     esc_html__('Center', 'construct')   => 'center',
                     esc_html__('Left', 'construct')     => 'left',
                     esc_html__('Right', 'construct')    => 'right',                   
                  ),
      ),      
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Use Line", 'construct'),
         "param_name" => "line",
         "description" => esc_html__("Checkbox if want to use line", 'construct'),
         "value" => "",
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Subtitle", 'construct'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("Subtitle of heading", 'construct')
      ),
    )));
}

// Button
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Button", 'construct'),
   "base" => "button",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Button Text", 'construct'),
         "param_name" => "btn_text",
         "value" => "",
         "description" => esc_html__("Title of button", 'construct'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Button Link", 'construct'),
         "param_name" => "btn_link",
         "value" => "",
         "description" => esc_html__("Link of button", 'construct'),
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Size", 'construct'),
         "param_name" => "size",
         "value" => array(                        
                     esc_html__('Small', 'construct')    => 'size1',
                     esc_html__('Normal', 'construct')   => 'size2',
                     esc_html__('Big', 'construct')      => 'size3',                  
                  ),
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Style", 'construct'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Normal', 'construct')    => 'style1',
                     esc_html__('Outline', 'construct')   => 'style2',
                     esc_html__('Rounded', 'construct')   => 'style3',                  
                  ),
      ), 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Round", 'construct'),
         "param_name" => "round",
         "value" => array(                        
                     esc_html__('Normal', 'construct')    => 'normal',
                     esc_html__('Big', 'construct')   => 'big',                 
                  ),
         "dependency"  => array( 'element' => 'style', 'value' => 'style3' ),
      ), 
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Color Text", 'construct'),
         "param_name" => "color",
         "value" => "",
         "description" => esc_html__("Color of text", 'construct'),
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Backgound Color", 'construct'),
         "param_name" => "bg_color",
         "value" => "",
         "description" => esc_html__("Background color of button", 'construct'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style3' ) ),
      ), 
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Border Color", 'construct'),
         "param_name" => "bo_color",
         "value" => "",
         "description" => esc_html__("Border color of button", 'construct'),
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Extra Class", 'construct'),
         "param_name" => "el_class",
         "value" => "",
         "description" => esc_html__("Add class to custom css.", 'construct'),
      ),    
    )));
}

// Home Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Slide Show", 'construct'),
   "base" => "homeslider",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Slider Image", 'construct'),
          'value' => '',
          'param_name' => 'imgslide',
          // Note params is mapped inside param-group:
          "description" => esc_html__("Click + to add more slide", 'construct'),
          'params' => array(
               array(
                  'type' => 'attach_image',
                  'value' => '',
                  'heading' => 'Image',
                  'param_name' => 'photo',
               ),
          )
      ),
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Slider Text", 'construct'),
          'value' => '',
          'param_name' => 'slide',
          "description" => esc_html__("Click + to add more slide", 'construct'),
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => 'Text',
                  'param_name' => 'text',
               ),
          )
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "heading" => esc_html__("Type Effect", 'construct'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Scroll', 'construct')   => 'scroll',
                     esc_html__('Typing', 'construct')   => 'typing',               
                  ),
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Small Text", 'construct'),
         "param_name" => "content",
         "value" => "",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Scroll Button", 'construct'),
         "param_name" => "scroll",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Button Scroll", 'construct'),
         "param_name" => "link",
         "value" => "",
         "description" => esc_html__("Link of button scroll", 'construct'),
         "dependency"  => array( 'element' => 'scroll', 'value' => 'true' ),
      ),
    )));
}


// Service Box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Service Box", 'construct'),
   "base" => "serbox",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(  
      array(
          'type' => 'attach_image',
          'value' => '',
          'heading' => 'Image',
          'param_name' => 'photo',
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'construct'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link", 'construct'),
         "param_name" => "link",
         "value" => "",
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'construct'),
         "param_name" => "content",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Label Button", 'construct'),
         "param_name" => "btn",
         "value" => "",
      ),
    )
   ));
}


// List Services
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Services List", 'construct'),
   "base" => "listserv",
   'admin_enqueue_js'  => get_template_directory_uri() . '/framework/admin/js/select2.min.js',
   'admin_enqueue_css' => get_template_directory_uri() . '/framework/admin/css/select2.css',
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type"      => "select_category_services",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Categories", 'archi'),
         "param_name"=> "idcate_services",
         "value"     => "",
         "description" => __("Enter your category.", 'archi')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Services", 'construct'),
         "param_name" => "num",
         "value" => "",
         "description" => esc_html__("Enter number services. Recommend: 3", 'construct')
      ),  
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Label Button", 'construct'),
         "param_name" => "btn",
         "value" => "",
         "description" => esc_html__("Enter label button read more. Default: Read More", 'construct')
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Layout', 'construct'),
         "param_name" => "layout",
         "value" => array(
                     esc_html__('Align Center', 'construct')     => 'center', 
                     esc_html__('Align Left', 'construct')     => 'left',
                  ), 
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Columns', 'construct'),
         "param_name" => "col",
         "value" => array(
                     esc_html__('3 Columns', 'construct')     => '3', 
                     esc_html__('4 Columns', 'construct')     => '4',
                     esc_html__('2 Columns', 'construct')     => '2',
                  ), 
      ),          
    )
    ));
}

if ( ! function_exists( 'is_plugin_active' ) ) {
  require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {     
  if ( function_exists( 'vc_add_shortcode_param' ) ) {
     vc_add_shortcode_param( 'select_category_services', 'select_param_services', get_template_directory_uri() . '/framework/admin/js/select-field-services.js' );
  } elseif ( function_exists( 'add_shortcode_param' ) ) {
     add_shortcode_param( 'select_category_services', 'select_param_services', get_template_directory_uri() . '/framework/admin/js/select-field-services.js' );
  }
}   

function select_param_services( $settings, $value ) {
  $category_services = get_terms( 'category_service' );
  $cat_services = array();
  foreach( $category_services as $category ) {
     if( $category ) {
        $cat_services[] = sprintf('<option value="%s">%s</option>',
           esc_attr( $category->slug ),
           $category->name
        );
     }

  }

  return sprintf(
     '<input type="hidden" name="%s" value="%s" class="wpb-input-category_services wpb_vc_param_value wpb-textinput %s %s_field">
     <select class="select-category_services-post">
     %s
     </select>',
     esc_attr( $settings['param_name'] ),
     esc_attr( $value ),
     esc_attr( $settings['param_name'] ),
     esc_attr( $settings['type'] ),
     implode( '', $cat_services )
  );
}

// Services Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Services Slider", 'construct'),
   "base" => "sliserv",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Services", 'construct'),
         "param_name" => "num",
         "value" => "",
         "description" => esc_html__("Enter number services. Recommend: 3", 'construct')
      ),  
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Label Button", 'construct'),
         "param_name" => "btn",
         "value" => "",
         "description" => esc_html__("Enter label button read more. Default: Read More", 'construct')
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Layout', 'construct'),
         "param_name" => "layout",
         "value" => array(
                     esc_html__('Align Center', 'construct')     => 'center', 
                     esc_html__('Align Left', 'construct')     => 'left',
                  ), 
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Columns', 'construct'),
         "param_name" => "col",
         "value" => array(
                     esc_html__('3 Columns', 'construct')     => '3', 
                     esc_html__('4 Columns', 'construct')     => '4',
                     esc_html__('2 Columns', 'construct')     => '2',
                  ), 
      ),          
    )
    ));
}

// Portfolio Filter
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Portfolio Filter", 'construct'),
   "base" => "portfoliof",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Construct Element',
   "params" => array( 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Show", 'construct'),
         "param_name" => "num",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Use Filter", 'construct'),
         "param_name" => "filter",         
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Text Show All", 'construct'),
         "param_name" => "all",
         "description" => esc_html__("If non-exitting, default: All", 'construct'),
         "dependency"  => array( 'element' => 'filter', 'value' => 'true' ),
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Column', 'construct'),
         "param_name" => "col",
         "value" => array(
                     esc_html__('4 Columns', 'construct')     => '4', 
                     esc_html__('3 Columns', 'construct')     => '3',
                     esc_html__('2 Columns', 'construct')     => '2',
                  ), 
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Gap', 'construct'),
         "param_name" => "gap",
         "value" => array(
                     esc_html__('0px', 'construct')     => '0', 
                     esc_html__('1px', 'construct')     => '1',
                     esc_html__('2px', 'construct')     => '2',
                     esc_html__('3px', 'construct')     => '3',
                     esc_html__('4px', 'construct')     => '4',
                     esc_html__('5px', 'construct')     => '5',
                     esc_html__('10px', 'construct')    => '10',
                     esc_html__('15px', 'construct')    => '15',
                     esc_html__('20px', 'construct')    => '20',
                     esc_html__('30px', 'construct')    => '30',
                  ), 
      ),
    )));
}

// Portfolio Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Portfolio Slider", 'construct'),
   "base" => "portfolios",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Construct Element',
   "params" => array( 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Show", 'construct'),
         "param_name" => "num",
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Column', 'construct'),
         "param_name" => "col",
         "value" => array(
                     esc_html__('4 Columns', 'construct')     => '4', 
                     esc_html__('3 Columns', 'construct')     => '3',
                     esc_html__('2 Columns', 'construct')     => '2',
                  ), 
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Gap', 'construct'),
         "param_name" => "gap",
         "value" => array(
                     esc_html__('0px', 'construct')     => '0', 
                     esc_html__('1px', 'construct')     => '1',
                     esc_html__('2px', 'construct')     => '2',
                     esc_html__('3px', 'construct')     => '3',
                     esc_html__('4px', 'construct')     => '4',
                     esc_html__('5px', 'construct')     => '5',
                     esc_html__('10px', 'construct')    => '10',
                     esc_html__('15px', 'construct')    => '15',
                     esc_html__('20px', 'construct')    => '20',
                     esc_html__('30px', 'construct')    => '30',
                  ), 
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Navigation", 'construct'),
         "param_name" => "arr",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Pagination", 'construct'),
         "param_name" => "bul",
      ),
    )));
}


// Icon Box Simple
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Icon Box Simple", 'construct'),
   "base" => "feature",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Construct Element',
   "params" => array( 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Box Layout", 'construct'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Icon Top Center', 'construct')   => 'style1',
                     esc_html__('Icon Left', 'construct')     => 'style2',
                     esc_html__('Icon Right', 'construct')     => 'style3',
                  ),
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Font", 'construct'),
         "param_name" => "font",
         "value" => array(                        
                     esc_html__('Font Awesome', 'construct')   => 'awesome',
                     esc_html__('Font Ello', 'construct')     => 'ello',
                  ),
      ),
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'construct'),
         "param_name" => "icon",
         "dependency"  => array( 'element' => 'font', 'value' => 'awesome' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'construct'),
         "param_name" => "icons",
         "dependency"  => array( 'element' => 'font', 'value' => 'ello' ),
         "description" => __("Include icon for box. You can find here : <a href='http://oceanthemes.net/font-icons/construction/'>http://oceanthemes.net/font-icons/construct/</a>", 'construct'),
      ),  
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon Size", 'construct'),
         "param_name" => "size",
         "value" => array(                        
                     esc_html__('Small', 'construct')   => 'size1',
                     esc_html__('Normal', 'construct')     => 'size2',
                     esc_html__('Large', 'construct')     => 'size3',
                     esc_html__('Bigger', 'construct')   => 'size4',
                  ),
         "dependency"  => array( 'element' => 'style', 'value' => 'style1' ),
      ),           
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'construct'),
         "param_name" => "title",
         "description" => esc_html__("Title of box", 'construct'),
      ), 
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Content", 'construct'),
         "param_name" => "content",
         "value" => "",
      ),
    )));
}

// Icon Box Outline
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Icon Box Outline", 'construct'),
   "base" => "featureout",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Construct Element',
   "params" => array( 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Box Layout", 'construct'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Icon Top Center', 'construct')   => 'style1',
                     esc_html__('Icon Left', 'construct')     => 'style2',
                     esc_html__('Icon Right', 'construct')     => 'style3',
                  ),
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Font", 'construct'),
         "param_name" => "font",
         "value" => array(                        
                     esc_html__('Font Awesome', 'construct')   => 'awesome',
                     esc_html__('Font Ello', 'construct')     => 'ello',
                  ),
      ),
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'construct'),
         "param_name" => "icon",
         "dependency"  => array( 'element' => 'font', 'value' => 'awesome' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'construct'),
         "param_name" => "icons",
         "dependency"  => array( 'element' => 'font', 'value' => 'ello' ),
         "description" => __("Include icon for box. You can find here : <a href='http://oceanthemes.net/font-icons/construction/'>http://oceanthemes.net/font-icons/construct/</a>", 'construct'),
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Outline Style", 'construct'),
         "param_name" => "ostyle",
         "value" => array(                        
                     esc_html__('Square', 'construct')   => 'square',
                     esc_html__('Rounded', 'construct')  => 'rounded',
                  ),
      ),  
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon Size", 'construct'),
         "param_name" => "size",
         "value" => array(                        
                     esc_html__('Small', 'construct')    => 'size1',
                     esc_html__('Normal', 'construct')   => 'size2',
                     esc_html__('Large', 'construct')    => 'size3',
                     esc_html__('Bigger', 'construct')   => 'size4',
                  ),
         "dependency"  => array( 'element' => 'style', 'value' => 'style1' ),
      ),   
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Hover Effect", 'construct'),
         "param_name" => "effect",
         "value" => array(                        
                     esc_html__('Hover Effect Style 1', 'construct')    => 'effect1',
                     esc_html__('Hover Effect Style 2', 'construct')    => 'effect2',
                     esc_html__('Hover Effect Style 3', 'construct')    => 'effect3',
                  ),
      ),          
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'construct'),
         "param_name" => "title",
         "description" => esc_html__("Title of box", 'construct'),
      ), 
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Content", 'construct'),
         "param_name" => "content",
         "value" => "",
      ),
    )));
}

// Icon Box Background
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Icon Box Background", 'construct'),
   "base" => "featureback",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Construct Element',
   "params" => array( 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Box Layout", 'construct'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Icon Top Center', 'construct')   => 'style1',
                     esc_html__('Icon Left', 'construct')        => 'style2',
                     esc_html__('Icon Right', 'construct')     => 'style3',
                  ),
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Font", 'construct'),
         "param_name" => "font",
         "value" => array(                        
                     esc_html__('Font Awesome', 'construct')   => 'awesome',
                     esc_html__('Font Ello', 'construct')     => 'ello',
                  ),
      ),
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'construct'),
         "param_name" => "icon",
         "dependency"  => array( 'element' => 'font', 'value' => 'awesome' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'construct'),
         "param_name" => "icons",
         "dependency"  => array( 'element' => 'font', 'value' => 'ello' ),
         "description" => __("Include icon for box. You can find here : <a href='http://oceanthemes.net/font-icons/construction/'>http://oceanthemes.net/font-icons/construct/</a>", 'construct'),
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Background Color", 'construct'),
         "param_name" => "bg_color",
         "value" => array(                        
                     esc_html__('Main Color', 'construct')   => 'bg_clor1',
                     esc_html__('Grey Color', 'construct')  => 'bg_color2',
                  ),
      ), 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Outline Style", 'construct'),
         "param_name" => "ostyle",
         "value" => array(                        
                     esc_html__('Square', 'construct')   => 'square',
                     esc_html__('Rounded', 'construct')  => 'rounded',
                  ),
      ),  
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon Size", 'construct'),
         "param_name" => "size",
         "value" => array(                        
                     esc_html__('Small', 'construct')    => 'size1',
                     esc_html__('Normal', 'construct')   => 'size2',
                     esc_html__('Large', 'construct')    => 'size3',
                     esc_html__('Bigger', 'construct')   => 'size4',
                  ),
         "dependency"  => array( 'element' => 'style', 'value' => 'style1' ),
      ),   
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Hover Effect", 'construct'),
         "param_name" => "effect",
         "value" => array(                        
                     esc_html__('Hover Effect Style 1', 'construct')    => 'effect1',
                     esc_html__('Hover Effect Style 2', 'construct')    => 'effect2',
                     esc_html__('Hover Effect Style 3', 'construct')    => 'effect3',
                  ),
      ),          
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'construct'),
         "param_name" => "title",
         "description" => esc_html__("Title of box", 'construct'),
      ), 
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Content", 'construct'),
         "param_name" => "content",
         "value" => "",
      ),
    )));
}

// Call To Action
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Call To Action", 'construct'),
   "base" => "call_to",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(  
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Column', 'construct'),
         "param_name" => "style",
         "value" => array(
                     esc_html__('Style 1', 'construct')     => 'style1', 
                     esc_html__('Style 2', 'construct')     => 'style2',
                  ), 
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'construct'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
        'type' => 'vc_link',
         "heading" => esc_html__("Button", 'construct'),
         "param_name" => "linkbox",         
         "description" => esc_html__("Add link to Button.", 'construct'),
      ),
    )
   ));
}

// Fun Facts
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Fun Facts", 'construct'),
   "base" => "facts",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'construct'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title of box", 'construct')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number", 'construct'),
         "param_name" => "number",
         "value" => "",
         "description" => esc_html__("Number of box", 'construct')
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Use Symbol +", 'construct'),
         "param_name" => "symbol",
         "description" => esc_html__("Checkbox if want to use symbol + with number fun facts. Ex: 1000+", 'construct'),
         "value" => "",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Light Text", 'construct'),
         "param_name" => "light",
         "value" => "",
      ),
    )));
}

// Testimonial Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Testimonials", 'construct'),
   "base" => "testslide",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Testimonial", 'construct'),
          'value' => '',
          'param_name' => 'testi',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  'type' => 'attach_image',
                  'value' => '',
                  'heading' => 'Photo',
                  'param_name' => 'photo',
               ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => esc_html__('Name', 'construct'),
                  'param_name' => 'name',
               ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => esc_html__('Job', 'construct'),
                  'param_name' => 'job',
               ),
               array(
                  'type' => 'textarea',
                  'value' => '',
                  'heading' => esc_html__('Text', 'construct'),
                  'param_name' => 'text',
               ),
          )
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Column', 'construct'),
         "param_name" => "col",
         "value" => array(
                     esc_html__('1 Columns', 'construct')     => '1', 
                     esc_html__('2 Columns', 'construct')     => '2',
                     esc_html__('3 Columns', 'construct')     => '3',
                  ), 
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Navigation", 'construct'),
         "param_name" => "nav",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Stars", 'construct'),
         "param_name" => "star",
      ),
    )));
}


// Team Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Team Slider", 'construct'),
   "base" => "teamslider",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Show", 'construct'),
         "param_name" => "num",
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Column', 'construct'),
         "param_name" => "col",
         "value" => array(
                     esc_html__('4 Columns', 'construct')     => '4', 
                     esc_html__('3 Columns', 'construct')     => '3',
                     esc_html__('5 Columns', 'construct')     => '5',
                  ), 
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Navigation", 'construct'),
         "param_name" => "arr",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Pagination", 'construct'),
         "param_name" => "bul",
      ),
    )));
}

// Logo Client
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Logo Client", 'construct'),
   "base" => "clients",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Images', 'construct'),
         "param_name" => "gallery",
         "value" => "",
         "description" => esc_html__("Use link out for logo client by enter link input caption image, View guide here: http://vegatheme.com/images/add-link-logo.jpg , Recomended Size: 200 x 130. ", 'construct')
      ), 
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Column', 'construct'),
         "param_name" => "col",
         "value" => array(
                     esc_html__('5 Columns', 'construct')     => '5', 
                     esc_html__('2 Columns', 'construct')     => '2',
                     esc_html__('3 Columns', 'construct')     => '3',
                     esc_html__('4 Columns', 'construct')     => '4',
                     esc_html__('6 Columns (Just for Slider)', 'construct')     => '6',
                  ), 
      ),   
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Type', 'construct'),
         "param_name" => "type",
         "value" => array(
                     esc_html__('Slider', 'construct')   => 'slide', 
                     esc_html__('Grid', 'construct')     => 'grid',
                  ), 
      ),     
    )
    ));
}


// Image Carousel
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Image Carousel", 'construct'),
   "base" => "carousels",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Images', 'construct'),
         "param_name" => "gallery",
         "value" => "",         
      ),
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Column', 'construct'),
         "param_name" => "col",
         "value" => array(
                     esc_html__('1 Columns', 'construct')     => '1', 
                     esc_html__('2 Columns', 'construct')     => '2',
                     esc_html__('3 Columns', 'construct')     => '3',
                     esc_html__('4 Columns', 'construct')     => '4',
                  ), 
      ),
      array(
         "type" => "textfield",
         "heading" => esc_html__('Gap', 'construct'),
         "param_name" => "gap",
         "value" => "",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Navigation", 'construct'),
         "param_name" => "navi",
         "value" => "",
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Pagination", 'construct'),
         "param_name" => "pagi",
         "value" => "",
      ),          
    )));
}

// Image Carousel With Thumbnail
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Image Carousel With Thumnail", 'construct'),
   "base" => "carousel",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Images', 'construct'),
         "param_name" => "gallery",
         "value" => "",         
      ),              
    )));
}

// Image Grid
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Image Grid", 'construct'),
   "base" => "imagegrid",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Images', 'construct'),
         "param_name" => "gallery",
         "value" => "",         
      ),   
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Column', 'construct'),
         "param_name" => "col",
         "value" => array( 
                     esc_html__('1 Columns', 'construct')     => '1',
                     esc_html__('2 Columns', 'construct')     => '2',
                     esc_html__('3 Columns', 'construct')     => '3',
                     esc_html__('4 Columns', 'construct')     => '4',
                  ), 
      ),
      array(
         "type" => "textfield",
         "heading" => esc_html__('Gap (px)', 'construct'),
         "param_name" => "gap",
         "value" => "",
         "description" => esc_html__('Just input number gap. Example: 10', 'construct'),
      ),         
    )));
}

// Division Box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Division Box", 'construct'),
   "base" => "division",
   "class" => "",
   "category" => 'Construct Element',
   "icon" => "icon-st",
   "params" => array(  
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Font", 'construct'),
         "param_name" => "font",
         "value" => array(                        
                     esc_html__('Font Awesome', 'construct')   => 'awesome',
                     esc_html__('Font Ello', 'construct')     => 'ello',
                  ),
      ),
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'construct'),
         "param_name" => "icon",
         "dependency"  => array( 'element' => 'font', 'value' => 'awesome' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'construct'),
         "param_name" => "icons",
         "dependency"  => array( 'element' => 'font', 'value' => 'ello' ),
         "description" => __("Include icon for box. You can find here : <a href='http://oceanthemes.net/font-icons/construction/'>http://oceanthemes.net/font-icons/construct/</a>", 'construct'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'construct'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link", 'construct'),
         "param_name" => "link",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Label Button", 'construct'),
         "param_name" => "btn",
         "value" => "",
      ),
    )
   ));
}

// Skills
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Skills", 'construct'),
   "base" => "skills",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Construct Element',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'construct'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number", 'construct'),
         "param_name" => "number",
         "value" => "",
      ),
    )));
}