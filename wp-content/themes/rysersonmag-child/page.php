<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<section class="archive-page page-template page-single sec-pad" id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <header>
                   <h1 class="page-title"><?php the_title(); ?></h1>
                </header><!-- .page-header -->
            </div>
        </div>
        <div class="row">
           <div class="col-md-6 offset-md-3">
               <?php the_content(); ?>
           </div>
        </div>
    </div>
</section>

<?php
get_footer();
