<?php
/* *
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ugdsb3
 */

if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<!doctype html>
<!--[if !IE]>
<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="<?php echo of_get_option( 'nav_bg_color' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">

<style type="text/css">     
  <?php
      if(get_theme_mod('header_background_image')) { ?>
         #header-div {
            background: #fff url("<?php echo get_theme_mod('header_background_image'); ?>") repeat top left;
            text-align: center; 
            /*height:150px,width:1190px;*/
        } 
  <?php } ?>
  
  <?php
  if ( 'blank' != get_header_textcolor() ) :
  ?>
    .site-title a,
    .site-title a h1,
    .site-description,
    span.dhs2{color: #<?php echo get_header_textcolor(); ?> !important;}
        
    #mainContent h1, #mainContent h1.headings, #mainContent h1.home-headings
     {color: #<?php echo get_header_textcolor(); ?> !important;}

    <?php endif; ?>
  
  </style>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-2579289-11"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-2579289-11');
</script>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<a href="#content" class="sr-only skip-main hidden-print">Skip to Main Content</a>


<div id="page" class="hfeed site">

<div id="header-div">
  <div class="container">
    <div id="topheader-div">

          <?php if( get_header_image() != '' ) : ?>

              <div id="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
              </div><!-- end of #logo -->

          <?php endif; // header image was removed ?>
          

          <?php if( !get_header_image() ) : ?>
            <div class="col-md-3 col-sm-3 hidden-xs" id="schoolLogo">
            <?php if(get_theme_mod('school_logo')) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <?php
            echo "<img src='".get_theme_mod('school_logo')."' title='".esc_attr(get_bloginfo( 'name','display' ) )."' alt='".esc_attr(get_bloginfo( 'name','display' ) )."' width=\"110\" height=\"110\"></a>"; 
            }
            else { ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/ugdsb-logo-circle.png" alt="UGDSB Logo"></a>
              <?php 
              }
            ?>
           
            </div><!-- end schoolLogo -->
            <div class="col-md-9 col-sm-9 col-xs-12" id="schoolName">
            <div class="site-title">
                <h1>
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>
                <?php 
                    $site_description = get_bloginfo('description', 'display');
                    if($site_description){
                         echo "<div class='site-description2'>".$site_description."</div>";
                    }
                ?>
            </div>               
            </div><!-- end schoolname -->
          <?php endif; // header image was removed (again) ?>    
    </div><!-- topheader div -->
    </div><!-- container -->
</div><!-- end header-div -->


<div id="topNav">
    <nav class="navbar navbar-default nav-justified <?php if( of_get_option( 'sticky_header' ) ) echo 'navbar-fixed-top'; ?>" role="navigation">
      <div class="container">
        <div class="row">
          <div class="site-navigation-inner">
            <div class="navbar-header">
              <?php if(!function_exists('ubermenu')){?>      
                <button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
              <?php } ?>

              

            </div>
            <?php if( function_exists( 'ubermenu' ) ): ?>
                  <?php ubermenu( 'main' , array( 'theme_location' => 'primary' ) ); ?>
            <?php else: ?>
            <?php ugdsb3_header_menu(); // main navigation ?>
            <?php endif; ?>
              
          </div>

        </div>
      </div>
    </nav><!-- .site-navigation -->
</div>

<div id="content" class="site-content">

		<div class="top-section">	
			<?php   ugdsb3_call_for_action(); 
					//ugdsb3_featured_slider(); 
			?>
		</div>
        
        
		<div class="container main-content-area">
            <?php $layout_class = get_layout_class(); ?>
			<div class="row <?php //echo $layout_class; ?> side-pull-right">
				<div class="main-content-inner <?php echo ugdsb3_main_content_bootstrap_classes(); ?>">
