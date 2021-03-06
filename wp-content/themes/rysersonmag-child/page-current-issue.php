<?php
/* Template Name: Current Issue */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$theCurrentIssueArray = get_field('current_magazine_issue');
$theCurrentIssueID = $theCurrentIssueArray[0];
?>

<section class="current-issue-page sec-pad" id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="current-issue-cover">
                    <?php echo get_the_post_thumbnail($theCurrentIssueID); ?>
                </div>
                
                <div id="currentIssuePin">
                    <div class="current-issue-info">
                        <h1><?php echo get_the_title($theCurrentIssueID); ?></h1>
                        <div class="issue-description">
                            <?php echo get_field("issue_description", $theCurrentIssueID); ?>
                        </div>
                        <div class="file-link">
                            <?php 
                            $pdfFile = get_field("pdf_file", $theCurrentIssueID); 
                            $pdfUrl = $pdfFile['url'];
                            ?>
                            <a href="<?php echo $pdfUrl; ?>" target="_blank" class="downloadPdf drawUnderline">Download PDF</a>
                        </div>
                    </div>


                    <div class="post-tags full">
                        <?php 
                            $tagArray = get_field("tags_in_this_issue", $theCurrentIssueID);
                            if($tagArray && sizeof($tagArray) > 0) {
                                echo '<span class="read-about-tags-label">Read About</span>';
                                foreach($tagArray as $tagObj) {
                                    ?>
                                    <a href="<?php echo site_url();?>/tag/<?php echo $tagObj->slug;?>" class="post-tag-link"><?php echo $tagObj->name;?></a>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>

            </div>
            
            <div class="col-md-6 offset-md-1 current-issue-articles" id="currentIssueStories">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                <?php 
                    $featuredArticleArray = get_field("feature_articles", $theCurrentIssueID);
                    $featuredArticleArraySize = ceil(sizeof($featuredArticleArray) / 2);
                    $articleArrayCounter = 0;
                    foreach($featuredArticleArray as $featuredArticle) {
                        ?>
                        
                            <div class="single-archive-post-wrap">

                               <?php 
                                $taxImgRatio = get_field('taxonomy_image_ratio', $featuredArticle); 
                                $taxThumbOptionalID = get_field('taxonomy_thumbnail_optional', $featuredArticle);

                                $postColorClass = '';
                                $thePostCat = get_the_category($featuredArticle);
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
                               <a href="<?php echo get_the_permalink($featuredArticle);?>" class="lead-img-wrap <?php echo $postColorClass;?>" tabindex="-1" aria-hidden="true">
                                   <?php if ($taxImgRatio == 'Horizontal') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-hor');
                                        } else {
                                            echo get_the_post_thumbnail( $featuredArticle, 'archive-hor' ); 
                                        }
                                        ?>

                                   <?php } else if ($taxImgRatio == 'Vertical') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-ver');
                                        } else {
                                            echo get_the_post_thumbnail( $featuredArticle, 'archive-ver' ); 
                                        }
                                        ?>

                                    <?php }  else if ($taxImgRatio == 'Square') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $featuredArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } else { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $featuredArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } ?>
                                    
                                    </a>
                                </span>

                                <?php
                                $term_list = wp_get_post_terms($featuredArticle, 'topic', ['fields' => 'all']);
                                foreach($term_list as $term) {
                                   if( get_post_meta($featuredArticle, '_yoast_wpseo_primary_topic',true) == $term->term_id ) {
                                     // this is a primary category
                                       $topicName = $term->name;
                                       $topicSlug = $term->slug;
                                   }
                                }
                                ?>
                               
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category drawUnderline"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($featuredArticle);?>" class="post-title-subtitle">
                                    <h2 class="entry-title"><?php echo get_the_title($featuredArticle); ?></h2>
                                    <?php if (get_field('subheading', $featuredArticle)) { ?>
                                        <h3 class="subheading"><?php echo get_field('subheading', $featuredArticle);?></h3>
                                    <?php } ?>
                                </a>
                            </div>
                        
                        <?php
                        $articleArrayCounter++;
                        if ($featuredArticleArraySize == $articleArrayCounter) {
                            echo '</div><div class="col-lg-6 col-md-12">';
                        }
                    }
                ?>
                </div>
                </div>
                <div class="row flex">
                    <a href="<?php echo get_permalink($theCurrentIssueID);?>" class="default-btn">All Stories</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php wp_reset_postdata(); ?>

<?php get_template_part( 'global-templates/past-issues' ); ?>

<?php
get_footer();
