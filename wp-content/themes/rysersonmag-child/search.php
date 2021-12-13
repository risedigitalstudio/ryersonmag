<?php
/**
 * The template for displaying search results pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();


global $wp_query;
$resultsCount = $wp_query->found_posts;

$resultsWord = 'results';
if ($resultsCount === 1) {
    $resultsWord = 'result';
}

if ( have_posts() ) {
?>

<section class="archive-page search-results-page sec-pad" id="content">
    <div class="container">
        <div class="row">
            <div class="<?php if (is_category()) {echo 'col-md-12';} else {echo 'col-md-7';} ?>">
                <header>
                   <p>Showing <?php echo $resultsCount; ?> <?php echo $resultsWord; ?> for:</p>
                   <h1 class="page-title"><?php echo get_search_query(); ?></h1>
                </header><!-- .page-header -->
            </div>
        </div>
        <div class="row">
        
        
        
           
            <?php
            
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
                           <a href="<?php echo get_the_permalink();?>" class="lead-img-wrap <?php echo $postColorClass;?>">
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
        
    

<?php
} else {
    ?>
    
    <section class="archive-page search-results-page no-results sec-pad">
        <div class="container">
            <div class="row">
                <div class="<?php if (is_category()) {echo 'col-md-12';} else {echo 'col-md-7';} ?>">
                    <header>
                       <p>No results for</p>
                       <h1 class="page-title"><?php echo get_search_query(); ?></h1>
                    </header><!-- .page-header -->
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>

        
        </div>
        
    </div>
</section>

<?php
get_footer();
