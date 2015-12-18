<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Fara
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="body-overlay"></div>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'fara' ); ?></a>

	<header id="masthead" class="site-header clearfix" role="banner">
		<div class="container">

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation clearfix">
					<?php wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'menu_class' => 'menu clearfix', 'fallback_cb' => false ) ); ?>
				</nav>
			<?php endif; ?>		

			<div class="site-branding">
	        <?php if ( get_theme_mod('site_logo') && get_theme_mod('logo_style', 'hide-title') == 'hide-title' ) : //Show only logo ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"><img class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a>
	        <?php elseif ( get_theme_mod('logo_style', 'hide-title') == 'show-title' ) : //Show logo, site-title, site-description ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"><img class="site-logo show-title" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>	        
	        <?php else : //Show only site title and description ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	        <?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
			<nav class="mobile-nav"></nav>
		</div>
	</header><!-- #masthead -->

	<?php if ( ( is_front_page() && get_theme_mod('fara_slider_front') ) || ( (is_home() || is_archive()) && get_theme_mod('fara_slider_home') ) || ( is_singular() && get_theme_mod('fara_slider_singular') ) ) : ?>
		<div class="featured-area">
		<?php $shortcode = get_theme_mod('fara_meta_shortcode');
	    	echo do_shortcode(esc_attr($shortcode));
	    ?>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content container">
