<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" class="desktop-nav">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md navbar-light px-0" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>


			<div class="container-fluid">


				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
				
				<a href="#" class="hamburgerMenu" id="hamburgerMenu">
				    <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.5 1.5H26" stroke="black" stroke-width="2"/>
                    <path d="M0.5 12H26" stroke="black" stroke-width="2"/>
                    <path d="M0.5 22H26" stroke="black" stroke-width="2"/>
                    </svg>
				</a>
				
				<?php get_template_part( 'global-templates/header-drawer' ); ?>

			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->




		
<div class="mobile-nav">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <?php the_custom_logo(); ?>
            </div>
            <div class="col-4">
				<a href="#" class="mobileHamburgerMenu" id="mobileHamburgerMenu">
				    <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.5 1.5H26" stroke="black" stroke-width="2"/>
                    <path d="M0.5 12H26" stroke="black" stroke-width="2"/>
                    <path d="M0.5 22H26" stroke="black" stroke-width="2"/>
                    </svg>
				</a>
            </div>
        </div>
    </div>
</div>

<?php get_template_part( 'global-templates/header-mobile-drawer' ); ?>
