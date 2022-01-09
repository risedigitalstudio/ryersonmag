<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

			
<section class="sec-pad" id="error-404-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header>
                   <h1 class="page-title">Page not found</h1>
                </header><!-- .page-header -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <p class="four04">404</p>
                <p class="unfortunately">Unfortunately, the page you are looking for does not exist.</p>
                <p class="return-home">Return to <a href="<?php echo site_url();?>" class="drawUnderline">homepage</a>.</p>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
