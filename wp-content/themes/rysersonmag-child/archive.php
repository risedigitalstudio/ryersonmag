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

<?php
if ( have_posts() ) {

    $singleTerm = get_the_archive_title();
    $colorClass = '';
    if (is_category() && strpos($singleTerm, 'People') !== false) {
         $colorClass = 'green';
    }

    if (is_category() && strpos($singleTerm, 'Research') !== false) {
         $colorClass = 'blue';
    }

    if (is_category() && strpos($singleTerm, 'Campus') !== false) {
         $colorClass = 'orange';
    }

?>
                
					
<section class="archive-page sec-pad" id="content">
    <div class="container">
        <div class="row">
            <div class="<?php if (is_category()) {echo 'col-md-12';} else {echo 'col-md-7';} ?>">
                <header>
                   <h1 class="page-title <?php echo $colorClass;?>"><?php single_term_title(); ?></h1>
                </header><!-- .page-header -->
            </div>
        </div>
        <div class="row">
           
           

           
            <?php
    
    $args = array(
        'category_name'  => 'the_name_of_the_category',
        'posts_per_page' => 3,
    );
            // Start the loop.
            while ( have_posts() ) {
                the_post();
                ?>
                

                <div class="col-md-4 alm-item" id="post-<?php the_ID(); ?>">
                    <div class="single-archive-post-wrap">

                       <?php 
                        $taxImgRatio = get_field('taxonomy_image_ratio'); 
                        $taxThumbOptionalID = get_field(('taxonomy_thumbnail_optional'));
                
                        $postColorClass = '';
                        $thePostCat = get_the_category();
                        $thePostCatSlug = $thePostCat[0]->slug;
                        if ($thePostCatSlug == 'people') {
                            $postColorClass = 'green';
                        } else if ($thePostCatSlug == 'research-ideas') {
                            $postColorClass = 'blue';
                        } else if ($thePostCatSlug == 'campus') { 
                            $postColorClass = 'orange';
                        }
                        ?>
                        
                        <span class="taxonomy-thumb">
                          <a href="<?php echo get_the_permalink();?>" class="lead-img-wrap <?php echo $postColorClass;?>" tabindex="-1" aria-hidden="true">
                           <?php if ($taxImgRatio == 'Horizontal') { ?>
                              
                                <?php 
                                if ($taxThumbOptionalID) {
                                    echo wp_get_attachment_image($taxThumbOptionalID, 'archive-hor');
                                } else {
                                    echo get_the_post_thumbnail( $post->ID, 'archive-hor' ); 
                                }
                                ?>
                               
                           <?php } else if ($taxImgRatio == 'Vertical') { ?>
                               
                                <?php 
                                if ($taxThumbOptionalID) {
                                    echo wp_get_attachment_image($taxThumbOptionalID, 'archive-ver');
                                } else {
                                    echo get_the_post_thumbnail( $post->ID, 'archive-ver' ); 
                                }
                                ?>
                                
                            <?php }  else if ($taxImgRatio == 'Square') { ?>
                               
                                <?php 
                                if ($taxThumbOptionalID) {
                                    echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                } else {
                                    echo get_the_post_thumbnail( $post->ID, 'archive-square' ); 
                                }
                                ?>
                                
                            <?php } else { ?>
                               
                                <?php 
                                if ($taxThumbOptionalID) {
                                    echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                } else {
                                    echo get_the_post_thumbnail( $post->ID, 'archive-square' ); 
                                }
                                ?>
                                
                            <?php } ?>
                            
                        </a>
                        </span>

                        <?php 

                        $topics = wp_get_post_terms(get_the_ID(), 'topic');
                        $topicName = $topics[0]->name;
                        $topicSlug = $topics[0]->slug;

                        ?>
                        <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category drawUnderline"><?php echo $topicName; ?></a></p>

                        <a href="<?php echo get_the_permalink();?>">
                            <h2 class="entry-title"><?php echo get_the_title(); ?></h2>
                            <h3 class="subheading"><?php echo get_field('subheading');?></h3>
                        </a>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
        
        <?php echo do_shortcode('[ajax_load_more id="alm-archive" archive="true" container_type="div" post_type="post" pause="true" scroll="false" posts_per_page="6" offset="3" no_results_text="<div class=\'no-results\'>Sorry, there are no more results</div>" transition_container_classes="row"]');?>
        
        
    </div>
</section>

<?php
} else {
    get_template_part( 'loop-templates/content', 'none' );
}
?>

<?php
get_footer();
