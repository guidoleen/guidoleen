<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <link rel="stylesheet" href="wp-content/themes/twentyten/css/lightbox.css" type="text/css" />
    <script type="text/javascript" src="wp-content/themes/twentyten/js/lightbox.js"></script>

    <script type="text/javascript" src="wp-content/themes/twentyten/js/jquery.js"></script>
    
<script type="text/javascript">
$(document).ready(function(){
  var currentPosition = 0;
  var slideWidth = 843;
  var slides = $('.slide');
  var numberOfSlides = slides.length;

  // Remove scrollbar in JS
  $('#slidesContainer').css('overflow', 'hidden');

  // Wrap all .slides with #slideInner div
  slides
    .wrapAll('<div id="slideInner"></div>')
    // Float left to display horizontally, readjust .slides width
	.css({
      'float' : 'left',
      'width' : slideWidth
    });

  // Set #slideInner width equal to total width of all slides
  $('#slideInner').css('width', slideWidth * numberOfSlides);

  // Insert controls in the DOM
  $('#slideshow')
    .prepend('<span class="control" id="leftControl" onmouseover="Muis2(this.id)" onmouseout="Muis2Uit(this.id)">Clicking moves left</span>')
    .append('<span class="control" id="rightControl" onmouseover="Muis2(this.id)" onmouseout="Muis2Uit(this.id)">Clicking moves right</span>');

  // Hide left arrow control on first load
  manageControls(currentPosition);

  // Create event listeners for .controls clicks
  $('.control')
    .bind('click', function(){
    // Determine new position
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
    
	// Hide / show controls
    manageControls(currentPosition);
    // Move slideInner using margin-left
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
  });

  // manageControls: Hides and Shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
	if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
	// Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
  }	
});
</script>
<script language="javascript">
			function Muis2(aa)
			{
				ObjIMG = document.getElementById(aa);
	
				if(aa == "leftControl")
				{
					// document.getElementById("leftControl").style.backgroundImage = "url('wp-content/themes/twentyten/img/Oncontrol_left.png')";
					document.getElementById("leftControl").style.className = "controlAAN";
				}
				
				if(aa == "rightControl")
				{
					// document.getElementById("rightControl").style.backgroundImage = "url('wp-content/themes/twentyten/img/Oncontrol_right.png')";
					document.getElementById("rightControl").style.className = "controlAAN";
				}

			}
			
			function Muis2Uit(aa)
			{
				ObjIMG = document.getElementById(aa);
	
				if(aa == "leftControl")
				{
					document.getElementById("leftControl").style.className = "control";

				}
				
				if(aa == "rightControl")
				{
					document.getElementById("rightControl").style.className = "control";
				}

			}
			// "wp-content/themes/twentyten/images/ArrOn.jpg";

</script>
<script language="javascript">
function MuisAAN(aa, bb)
{
var IMGNm = "wp-content/themes/twentyten/img/";
IMGNm += bb;

var ObjIMG = document.getElementById(aa);
	ObjIMG.src = IMGNm;

}

</script>
    
    
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<!-- <?php bloginfo( 'name' ); ?> -->
                        </a>
					</span>
                    
                    				<div id="site-description"><?php bloginfo( 'description' ); ?></div>

				</<?php echo $heading_tag; ?>>
			<!-- IamgeBanner -->
            
            
              <!-- Slideshow HTML -->
<div id="slideshow">
    <div id="slidesContainer">
    
    
<!-- Slide NO.01 --> 
     <div class="slide">
   		     <div id="SlideText"><span style="font-size:15px;">Het voordeel van aandacht</span>
        <br>
       Krijgt je het, dan krijg je  <br />
       meer voor elkaar. <br />
       Beleving opwekken, da's de ware kunst!  <br />

        <a href="wp-content/themes/twentyten/images/Luscious.jpg" rel="lightbox" title="Luscious Loaf: imago campagne van een brooddesigner" class="slidePlat">Eet smakelijk</a>
 	      	 </div>
        <div id="SlideImg"><img src="wp-content/themes/twentyten/images/Thumb_Luscious.jpg" width="843" height="203" border="0" />
        </div>
        
      </div>
      
<!-- Slide NO.02 --> 
     <div class="slide">
   		     <div id="SlideText"><span style="font-size:15px;">Mondiale connectie</span>
        <br>
       In een globaliserende omgeving <br />
       niet meer weg te denken. <br />
       Universele taal spreken. CMS bijvoorbeeld!  <br />

        <a href="wp-content/themes/twentyten/images/TanatexHome.jpg" rel="lightbox" title="Tanatex Chemicals: mondiale corporate online communicatie" class="slidePlat">Get connected >></a>
 	      	 </div>
        <div id="SlideImg"><img src="wp-content/themes/twentyten/images/Thumb_Tan.jpg" width="843" height="203" border="0" />
        </div>
        
      </div>
      
<!-- Slide NO.03 --> 
     <div class="slide">
   		     <div id="SlideText"><span style="font-size:15px;">Herkenbaarheid, tevredenheid</span>
        <br>
       Ik zie het, ik snap het, ik begrijp het en bovenal: <br />
       het past bij me. Duidelijke corporate<br />
       signalen raken de doelmarkt. Altijd!  <br />

        <a href="wp-content/themes/twentyten/images/KG_Home.jpg" rel="lightbox" title="Koks Gesto: online distributie mechanismen" class="slidePlat">Leren is leuk >></a>
 	      	 </div>
        <div id="SlideImg"><img src="wp-content/themes/twentyten/images/Thumb_Koks.jpg" width="843" height="203" border="0" />
        </div>
        
      </div>
      
<!-- END Slides --> 

    </div>
  </div>
  <!-- Slideshow HTML -->
				
             <!-- EndIamgeBanner -->
			</div><!-- #branding -->

			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>

                
			</div><!-- #access -->
            
                <!-- OSM -->
              <?php LaadOSM() ?>
              	<!-- END OSM -->
                
		</div><!-- #masthead -->
	</div><!-- #header -->

	<div id="main">
