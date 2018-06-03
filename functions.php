<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
//add_post_type_support( 'page');
define( 'DISALLOW_FILE_EDIT', true );
remove_action( 'wp_head', 'wp_generator' ); //Remove WordPress version from site

/* ##################################################### Helpers (start)*/
function get_folder_from_template_directory( $folderName ) {
	$folderNamePath = get_template_directory_uri() . DIRECTORY_SEPARATOR. $folderName . DIRECTORY_SEPARATOR;
	return $folderNamePath;
}




function loadStylesAndScripts() {


	/* wp_enqueue_style */
	$css_files = [
		
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'carousel.css',
		  'style.css',
		    '/assets/css/style.min.css',
// 		'bootstrap-rtl',
// 		'flexslider',
// 		'owl.carousel',
// 		'owl.theme.default.min',
// 		'jquery.fancybox',
// 		'fwslider',
// 		'allinone_carousel',
// 		'font-awesome.min',
// 		'lightslider.min',
// 		'jquery.bxslider.min',
// //		'agile_carousel',
// 		'feature-carousel',
// 		'elmarbat-style',
// 		'media-queries'
	];

	// if admin_bar_showing load admin_bar_showing.css file

    if (is_admin_bar_showing()) {
        array_push($css_files, '/assets/css/admin.min.css');
    }
	for ( $css_file = 0; $css_file < count( $css_files ); $css_file ++ ) {
		wp_enqueue_style( $css_files[ $css_file ], get_template_directory_uri() .DIRECTORY_SEPARATOR.$css_files[ $css_file ], [], null, 'screen' );
	}


	//	Remove a registered script. (jquery)
//	wp_deregister_script( 'jquery' );


	// Enqueue .js files
	$scrits_files = [
        [name=>'bootstrap', script_path => '/node_modules/bootstrap/dist/js/bootstrap.min.js', inFooter => true  ],
/*         [name=>'jquery', script_path => '/node_modules/jquery/dist/jquery.min.js', inFooter => true  ],
 */       
        [ name=>'main',script_path => '/assets/js/scripts.min.js', inFooter => true  ],
	];

 

   
	for ( $i = 0; $i < count( $scrits_files ); $i ++ ) {

     	wp_enqueue_script( $scrits_files[ $i ]['name'], get_theme_file_uri( $scrits_files[ $i ]['script_path'] ), array( 'jquery' ), '1.0', true );

	}

}

add_action('wp_enqueue_scripts', 'loadStylesAndScripts');


/* menus */
register_nav_menus([ 'primary' =>__('Primary Menu'), 'foter' =>__('Footer Menu') ]);