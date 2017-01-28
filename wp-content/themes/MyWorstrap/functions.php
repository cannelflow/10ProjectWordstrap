<?php

// Theme Support
function mywordstrap_theme_setup(){
	
	//post-thumbnail
    add_theme_support('post-thumbnails');
    
    // Nav Menus
    register_nav_menus(array(
      'primary' => __('Primary Menu')
    ));
    
    // Post Formats
    add_theme_support('post-formats', array('aside', 'gallery'));
}
  
add_action('after_setup_theme','mywordstrap_theme_setup');


//add js & css
function mywordstrap_scripts() {
	
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
 
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );
 
	wp_enqueue_style( 'indiw-flower', 'https://fonts.googleapis.com/css?family=Indie+Flower', false );
	
    wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Alfa+Slab+One', false );
	
	wp_enqueue_style( 'site-css', get_template_directory_uri() . '/scss/style.css');
	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	
	wp_enqueue_script( 'custome-js', get_template_directory_uri() . '/js/main.js');
 
// 	wp_enqueue_script( 'bootstrapwp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mywordstrap_scripts' );
/**
 * Add Respond.js for IE
 */
if( !function_exists('ie_scripts')) {
	function ie_scripts() {
	 	echo '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->';
	   	echo ' <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->';
	   	echo ' <!--[if lt IE 9]>';
	    echo ' <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
	    echo ' <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
	   	echo ' <![endif]-->';
   	}
   	add_action('wp_head', 'ie_scripts');
} // end if

// Widget Locations
function init_widgets($id){
	register_sidebar(array(
		'name' 	=> 'Sidebar',
		'id'	=> 'sidebar',
		'before_widget'	=> '<div class="panel panel-default">',
		'after_widget'	=> '</div></div>',
		'before_title'	=> '<div class="panel-heading"><h3 class="panel-title">',
		'after_title'	=> '</h3></div><div class="panel-body">'
	));
}

add_action('widgets_init', 'init_widgets');


// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

?>