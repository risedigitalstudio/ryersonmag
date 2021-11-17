<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>


					
<section class="archive-page sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header>
                   <h1 class="page-title yellow"><?php the_title(); ?></h1>
                   <?php the_content();?>
                </header><!-- .page-header -->
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
