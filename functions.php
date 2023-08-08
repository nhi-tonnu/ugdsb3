<?php
/**
 * ugdsb3 functions and definitions
 *
 * @package ugdsb3
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 648; /* pixels */
}

/**
 * Set the content width for full width pages with no sidebar.
 */
function ugdsb3_content_width() {
  if ( is_page_template( 'page-fullwidth.php' ) ) {
    global $content_width;
    $content_width = 1008; /* pixels */
  }
}
add_action( 'template_redirect', 'ugdsb3_content_width' );

if ( ! function_exists( 'ugdsb3_main_content_bootstrap_classes' ) ) :
/**
 * Add Bootstrap classes to the main-content-area wrapper.
 */
function ugdsb3_main_content_bootstrap_classes() {
	if ( is_page_template( 'page-fullwidth.php' ) ) {
		return 'col-sm-12 col-md-12';
	}
	return 'col-sm-12 col-md-8';
}
endif; // ugdsb3_main_content_bootstrap_classes

if ( ! function_exists( 'ugdsb3_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ugdsb3_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   */
  load_theme_textdomain( 'ugdsb3', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /**
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );

  add_image_size( 'ugdsb3-featured', 750, 410, true );
  add_image_size( 'tab-small', 60, 60 , true); // Small Thumbnail

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary'      => esc_html__( 'Primary Menu', 'ugdsb3' ),
    'footer-links' => esc_html__( 'Footer Links', 'ugdsb3' ) // secondary nav in footer
  ) );

  // Enable support for Post Formats.
  add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

  // Setup the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'ugdsb3_custom_background_args', array(
    'default-color' => 'F2F2F2',
    'default-image' => '',
  ) ) );

  // Enable support for HTML5 markup.
  add_theme_support( 'html5', array(
    'comment-list',
    'search-form',
    'comment-form',
    'gallery',
    'caption',
  ) );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  	add_theme_support( 'title-tag' );
  
  	//Nhi March 29, 2016 force tinymce to show in visual setting first
	add_filter( 'wp_default_editor', create_function('', 'return "tinymce";') );
	
	//Nhi added July11, 2019 to disable Gutenberg editor
	add_filter('use_block_editor_for_post', '__return_false');
	
	//Nhi added Jan1, 2022 for remove Widget block Editor
	add_filter( 'use_widgets_block_editor', '__return_false' );

}
endif; // ugdsb3_setup
add_action( 'after_setup_theme', 'ugdsb3_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function ugdsb3_widgets_init() {
   register_sidebar( array(
    'name'          => esc_html__( 'Homepage Sidebar', 'ugdsb3' ),
    'id'            => 'home',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'ugdsb3' ),
    'id'            => 'sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
   register_sidebar(array(
    'id'            => 'tophome-widget',
    'name'          => esc_html__( 'Top Homepage Widget', 'ugdsb3' ),
    'description'   => esc_html__( 'Displays on the Home Page', 'ugdsb3' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'home-widget-1',
    'name'          => esc_html__( 'Homepage Widget 1', 'ugdsb3' ),
    'description'   => esc_html__( 'Displays on the Home Page', 'ugdsb3' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'home-widget-2',
    'name'          => esc_html__( 'Homepage Widget 2', 'ugdsb3' ),
    'description'   => esc_html__( 'Displays on the Home Page', 'ugdsb3' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'home-widget-3',
    'name'          =>  esc_html__( 'Homepage Widget 3', 'ugdsb3' ),
    'description'   =>  esc_html__( 'Displays on the Home Page', 'ugdsb3' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-widget-1',
    'name'          =>  esc_html__( 'Footer Widget 1', 'ugdsb3' ),
    'description'   =>  esc_html__( 'Used for footer widget area', 'ugdsb3' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-widget-2',
    'name'          =>  esc_html__( 'Footer Widget 2', 'ugdsb3' ),
    'description'   =>  esc_html__( 'Used for footer widget area', 'ugdsb3' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-widget-3',
    'name'          =>  esc_html__( 'Footer Widget 3', 'ugdsb3' ),
    'description'   =>  esc_html__( 'Used for footer widget area', 'ugdsb3' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));
  register_sidebar(array(
    'id'            => 'footer-widget-4',
    'name'          =>  esc_html__( 'Footer Widget 4', 'ugdsb3' ),
    'description'   =>  esc_html__( 'Used for footer widget area', 'ugdsb3' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_widget( 'ugdsb3_social_widget' );
  register_widget( 'ugdsb3_popular_posts' );
  register_widget( 'ugdsb3_categories' );

}
add_action( 'widgets_init', 'ugdsb3_widgets_init' );


/* --------------------------------------------------------------
       Theme Widgets
-------------------------------------------------------------- */
require_once(get_template_directory() . '/inc/widgets/widget-categories.php');
require_once(get_template_directory() . '/inc/widgets/widget-social.php');
require_once(get_template_directory() . '/inc/widgets/widget-popular-posts.php');


/**
 * This function removes inline styles set by WordPress gallery.
 */
function ugdsb3_remove_gallery_css( $css ) {
  return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}

add_filter( 'gallery_style', 'ugdsb3_remove_gallery_css' );

/**
 * Enqueue scripts and styles.
 */
function ugdsb3_scripts() {

  // Add Bootstrap default CSS
  wp_enqueue_style( 'ugdsb3-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );

  // Add Font Awesome stylesheet
  wp_enqueue_style( 'ugdsb3-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

  // Add Google Fonts
  wp_register_style( 'ugdsb3-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700|Roboto+Slab:400,300,700|Fondamento|Aladin');

  wp_enqueue_style( 'ugdsb3-fonts' );

  // Add slider CSS only if is front page ans slider is enabled
  if( ( is_home() || is_front_page() ) && of_get_option('ugdsb3_slider_checkbox') == 1 ) {
    wp_enqueue_style( 'flexslider-css', get_template_directory_uri().'/inc/css/flexslider.css' );
  }

  // Add main theme stylesheet
  wp_enqueue_style( 'ugdsb3-style', get_stylesheet_uri() );

  // Add Modernizr for better HTML5 and CSS3 support
  wp_enqueue_script('ugdsb3-modernizr', get_template_directory_uri().'/inc/js/modernizr.min.js', array('jquery') );

  // Add Bootstrap default JS
  wp_enqueue_script('ugdsb3-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );

  if( ( is_home() || is_front_page() ) && of_get_option('ugdsb3_slider_checkbox') == 1 ) {
    // Add slider JS only if is front page ans slider is enabled
    wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/inc/js/flexslider.min.js', array('jquery'), '20140222', true );
    // Flexslider customization
    wp_enqueue_script( 'flexslider-customization', get_template_directory_uri() . '/inc/js/flexslider-custom.js', array('jquery', 'flexslider-js'), '20140716', true );
  }

  // Main theme related functions
  wp_enqueue_script( 'ugdsb3-functions', get_template_directory_uri() . '/inc/js/functions.min.js', array('jquery') );

  // This one is for accessibility
  wp_enqueue_script( 'ugdsb3-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20140222', true );

  // Treaded comments
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'ugdsb3_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Metabox additions.
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/navwalker.php';

// /**
//  * TGMPA
//  */
// require get_template_directory() . '/inc/tgmpa/tgm-plugin-activation.php';

/**
 * Register Social Icon menu
 */
add_action( 'init', 'register_social_menu' );

function register_social_menu() {
	register_nav_menu( 'social-menu', _x( 'Social Menu', 'nav menu location', 'ugdsb3' ) );
}

/* Globals variables */
global $options_categories;
$options_categories = array();
$options_categories_obj = get_categories();
foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
}

global $site_layout;
$site_layout = array('side-pull-left' => esc_html__('Right Sidebar', 'ugdsb3'),'side-pull-right' => esc_html__('Left Sidebar', 'ugdsb3'),'no-sidebar' => esc_html__('No Sidebar', 'ugdsb3'),'full-width' => esc_html__('Full Width', 'ugdsb3'));

// Typography Options
global $typography_options;
$typography_options = array(
        'sizes' => array( '6px' => '6px','10px' => '10px','12px' => '12px','14px' => '14px','15px' => '15px','16px' => '16px','18'=> '18px','20px' => '20px','24px' => '24px','28px' => '28px','32px' => '32px','36px' => '36px','42px' => '42px','48px' => '48px' ),
        'faces' => array(
                'arial'          => 'Arial',
                'verdana'        => 'Verdana, Geneva',
                'trebuchet'      => 'Trebuchet',
                'georgia'        => 'Georgia',
                'times'          => 'Times New Roman',
                'tahoma'         => 'Tahoma, Geneva',
                'Open Sans'      => 'Open Sans',
                'palatino'       => 'Palatino',
                'helvetica'      => 'Helvetica',
                'Helvetica Neue' => 'Helvetica Neue,Helvetica,Arial,sans-serif'
        ),
        'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
        'color'  => true
);

/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if ( ! function_exists( 'of_get_option' ) ) :
function of_get_option( $name, $default = false ) {

	$option_name = '';
	// Get option settings from database
	$options = get_option( 'ugdsb3' );

	// Return specific option
	if ( isset( $options[$name] ) ) {
		return $options[$name];
	}

	return $default;
}
endif;

/* WooCommerce Support Declaration */
if ( ! function_exists( 'ugdsb3_woo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function ugdsb3_woo_setup() {
	/*
	 * Enable support for WooCemmerce.
	*/
	add_theme_support( 'woocommerce' );

}
endif; // ugdsb3_woo_setup
add_action( 'after_setup_theme', 'ugdsb3_woo_setup' );

if ( ! function_exists( 'get_woocommerce_page_id' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function get_woocommerce_page_id() {
	if( is_shop() ){
        return get_option( 'woocommerce_shop_page_id' );
    }
    elseif( is_cart() ){
        return get_option( 'woocommerce_cart_page_id' );
    }
    elseif(is_checkout() ){
        return get_option( 'woocommerce_checkout_page_id' );
    }
    elseif(is_checkout_pay_page() ){
        return get_option( 'woocommerce_pay_page_id' );
    }
    elseif(is_account_page() ){
        return get_option( 'woocommerce_myaccount_page_id' );
    }
    return false;
}
endif;

/**
* is_it_woocommerce_page - Returns true if on a page which uses WooCommerce templates (cart and checkout are standard pages with shortcodes and which are also included)
*/
if ( ! function_exists( 'is_it_woocommerce_page' ) ) :

function is_it_woocommerce_page () {
        if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
                return true;
        }
        $woocommerce_keys   =   array ( "woocommerce_shop_page_id" ,
                                        "woocommerce_terms_page_id" ,
                                        "woocommerce_cart_page_id" ,
                                        "woocommerce_checkout_page_id" ,
                                        "woocommerce_pay_page_id" ,
                                        "woocommerce_thanks_page_id" ,
                                        "woocommerce_myaccount_page_id" ,
                                        "woocommerce_edit_address_page_id" ,
                                        "woocommerce_view_order_page_id" ,
                                        "woocommerce_change_password_page_id" ,
                                        "woocommerce_logout_page_id" ,
                                        "woocommerce_lost_password_page_id" ) ;
        foreach ( $woocommerce_keys as $wc_page_id ) {
                if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
                        return true ;
                }
        }
        return false;
}

endif;

/**
* get_layout_class - Returns class name for layout i.e full-width, right-sidebar, left-sidebar etc )
*/
if ( ! function_exists( 'get_layout_class' ) ) :

function get_layout_class () {
    global $post;
    if( is_singular() && get_post_meta($post->ID, 'site_layout', true) && !is_singular( array( 'product' ) ) ){
        $layout_class = get_post_meta($post->ID, 'site_layout', true);
    }
    elseif( function_exists ( "is_woocommerce" ) && function_exists ( "is_it_woocommerce_page" ) && is_it_woocommerce_page() && !is_search() ){// Check for WooCommerce
        $page_id = ( is_product() ) ? $post->ID : get_woocommerce_page_id();

        if( $page_id && get_post_meta($page_id, 'site_layout', true) ){
            $layout_class = get_post_meta( $page_id, 'site_layout', true);
        }
        else{
            $layout_class = of_get_option( 'woo_site_layout', 'full-width' );
        }
    }
    else{
        $layout_class = of_get_option( 'site_layout', 'side-pull-left' );
    }
    return $layout_class;
}

endif;
// Source: https://wpcolt.com/fix-hentry-errors-wordpress/ --- nhi september 13, 2017
add_filter( 'post_class', 'remove_hentry' );
function remove_hentry( $class ) {
  $class = array_diff( $class, array( 'hentry' ) ); 
  return $class;
}

//to hide the admin bar from the theme
add_filter('show_admin_bar', '__return_false');
