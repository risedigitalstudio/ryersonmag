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

<section class="archive-page page-template page-contact sec-pad" id="content">
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
               <div class="masthead-contact-sec">
                   <h2 class="contact-masthead-title"><?php echo get_field('title');?></h2>
                   <?php echo get_field('content');?>
                   <?php 
                    foreach(get_field('contact_people') as $contactPerson) {
                        ?>
                        <div class="contact-chunk">
                            <p class="contact-person-title"><?php echo $contactPerson['title']; ?></p>
                            <p class="contact-person-name"><?php echo $contactPerson['name_or_organization']; ?></p>
                        </div>
                        <?php
                    }
                   ?>
               </div>
           </div>
        </div>
    </div>
</section>

<?php
get_footer();
