<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
		
<section class="archive-page archive-mag-issues sec-pad" id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header>
                   <h1 class="page-title">Past Issues</h1>
                </header><!-- .page-header -->
            </div>
        </div>
        <div class="row">
            <?php 
            if ( have_posts() ) {
                 while ( have_posts() ) {
                    the_post();
                     ?>

                    <div class="col-md-3">
                       <div class="past-issue">
                            <a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail(); ?></a>
                            <h2><?php the_title();?></h2>
                       </div>
                    </div>
            <?php
                 }
            } 
            ?>
        </div>
    </div>
</section>
	


<?php
get_footer();
