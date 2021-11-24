<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$thisIssue = get_the_ID();

?>
					
<section class="archive-page sec-pad" id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header>
                   <h1 class="page-title yellow"><?php the_title(); ?></h1>
                </header><!-- .page-header -->
            </div>
        </div>
        <div class="row">
            
            
                <?php 
                    $issueArticleArray = get_field("all_articles_in_this_issue", $thisIssue);
                    foreach($issueArticleArray as $issueArticle) {
                        ?>
                        <div class="col-md-4">
                            <div class="single-archive-post-wrap">

                               <?php 
                                $taxImgRatio = get_field('taxonomy_image_ratio', $issueArticle); 
                                $taxThumbOptionalID = get_field('taxonomy_thumbnail_optional', $issueArticle);

                                $postColorClass = '';
                                $thePostCat = get_the_category($issueArticle);
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
                               <a href="<?php echo get_the_permalink($issueArticle);?>" class="lead-img-wrap <?php echo $postColorClass;?>">
                                   <?php if ($taxImgRatio == 'Horizontal') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($issueArticle, 'archive-hor');
                                        } else {
                                            echo get_the_post_thumbnail( $issueArticle, 'archive-hor' ); 
                                        }
                                        ?>

                                   <?php } else if ($taxImgRatio == 'Vertical') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($issueArticle, 'archive-ver');
                                        } else {
                                            echo get_the_post_thumbnail( $issueArticle, 'archive-ver' ); 
                                        }
                                        ?>

                                    <?php }  else if ($taxImgRatio == 'Square') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($issueArticle, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $issueArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } else { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($issueArticle, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $issueArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } ?>
                                    
                                    </a>
                                </span>

                                <?php 

                                $topics = wp_get_post_terms($issueArticle, 'topic');
                                $topicName = $topics[0]->name;
                                $topicSlug = $topics[0]->slug;

                                ?>
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($issueArticle);?>">
                                    <h2 class="entry-title"><?php echo get_the_title($issueArticle); ?></h2>
                                    <h3 class="subheading"><?php echo get_field('subheading', $issueArticle);?></h3>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            
        </div>
    </div>
</section>

<?php
get_footer();
