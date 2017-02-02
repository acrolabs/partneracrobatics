<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 *
 *<div id="PATITLE">Partner Acrobatics
 *</div>
 *
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<?php zerif_top_head_trigger(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<?php zerif_bottom_head_trigger(); ?>
</head>

<?php if(isset($_POST['scrollPosition'])): ?>

	<body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval($_POST['scrollPosition']); ?>)">

<?php else: ?>

	<body <?php body_class(); ?> >

<?php endif;

	zerif_top_body_trigger();
	
	/* Preloader */

	if(is_front_page() && !is_customize_preview() && get_option( 'show_on_front' ) != 'page' ):
 
		$zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');
		
		if( isset($zerif_disable_preloader) && ($zerif_disable_preloader != 1)):
			echo '<div class="preloader">';
				echo '<div class="status">&nbsp;</div>';
			echo '</div>';
		endif;	

	endif; ?>


<div id="mobilebgfix">
	<div class="mobile-bg-fix-img-wrap">
		<div class="mobile-bg-fix-img"></div>
	</div>
	<div class="mobile-bg-fix-whole-site">

<?php zerif_before_header_trigger(); ?>



<header id="<?php echo apply_filters( 'zerif_header_id_filter','home' ); ?>" class="<?php echo apply_filters('zerif_header_class_filter','header'); ?>" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

	<?php zerif_top_header_trigger(); ?>


	<div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">

		<div class="container">




			<div class="navbar-header responsive-logo">





				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

				<span class="sr-only"><?php _e('Toggle navigation','zerif-lite'); ?></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				</button>


				<?php


					$zerif_logo = get_theme_mod('zerif_logo');

					if(isset($zerif_logo) && $zerif_logo != ""):

						echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';

							echo '<img src="'.esc_url( $zerif_logo ).'" alt="'.esc_attr( get_bloginfo('title') ).'">';

						echo '</a>';

					else:

						echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
						
							if( file_exists(get_stylesheet_directory()."/images/logo.png")):
							
								echo '<img src="'.get_stylesheet_directory_uri().'/images/logo.png" alt="'.esc_attr( get_bloginfo('title') ).'">';
							
							else:
								
								echo '<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.esc_attr( get_bloginfo('title') ).'">';
								
							endif;

						echo '</a>';

					endif;

				?>



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="https://www.facebook.com/partneracrobaticscom" data-width="40" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>

			</div>



			<?php zerif_primary_navigation_trigger(); ?>


		</div>

	</div>

	<?php zerif_bottom_header_trigger(); ?>
	<!-- / END TOP BAR -->