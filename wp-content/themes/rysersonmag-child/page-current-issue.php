<?php
/* Template Name: Current Issue */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$theCurrentIssueArray = get_field('current_magazine_issue');
$theCurrentIssueID = $theCurrentIssueArray[0];
?>

<section class="archive-page current-issue-page sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="current-issue-cover">
                    <?php echo get_the_post_thumbnail($theCurrentIssueID); ?>
                </div>
                <div class="current-issue-info">
                    <h1><?php echo get_the_title($theCurrentIssueID); ?></h1>
                    <div class="issue-description">
                        <?php echo get_field("issue_description", $theCurrentIssueID); ?>
                    </div>
                    <div class="file-link">
                        <?php var_dump(get_field("pdf_file", $theCurrentIssueID)); ?>
                    </div>
                </div>
                
                
                <div class="post-tags full">
                    <?php 
                        $tagArray = get_field("tags_in_this_issue", $theCurrentIssueID);
                        if($tagArray && sizeof($tagArray) > 0) {
                            echo 'Read About ';
                            foreach($tagArray as $tagObj) {
                                ?>
                                <a href="<?php echo site_url();?>/tag/<?php echo $tagObj->slug;?>" class="post-tag-link"><?php echo $tagObj->name;?></a>
                                <?php
                            }
                        }
                    ?>
                </div>

            </div>
            
            <div class="col-md-6 offset-md-1 current-issue-articles">
                <div class="row">
                    <div class="col-md-6">
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

                                <a href="<?php echo get_the_permalink($featuredArticle);?>" class="taxonomy-thumb <?php echo $postColorClass;?>">
                                   <?php if ($taxImgRatio == 'Horizontal') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($featuredArticle, 'archive-hor');
                                        } else {
                                            echo get_the_post_thumbnail( $featuredArticle, 'archive-hor' ); 
                                        }
                                        ?>

                                   <?php } else if ($taxImgRatio == 'Vertical') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($featuredArticle, 'archive-ver');
                                        } else {
                                            echo get_the_post_thumbnail( $featuredArticle, 'archive-ver' ); 
                                        }
                                        ?>

                                    <?php }  else if ($taxImgRatio == 'Square') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($featuredArticle, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $featuredArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } else { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($featuredArticle, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $featuredArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } ?>
                                </a>

                                <?php 

                                $topics = wp_get_post_terms($featuredArticle, 'topic');
                                $topicName = $topics[0]->name;
                                $topicSlug = $topics[0]->slug;

                                ?>
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($featuredArticle);?>">
                                    <h2 class="entry-title"><?php echo get_the_title($featuredArticle); ?></h2>
                                    <h3 class="subheading"><?php echo get_field('subheading', $featuredArticle);?></h3>
                                </a>
                            </div>
                        
                        <?php
                        $articleArrayCounter++;
                        if ($featuredArticleArraySize == $articleArrayCounter) {
                            echo '</div><div class="col-md-6">';
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


<section class="past-issues sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="dotted-heading">Past Issues</h2>
            </div>
        </div>
        <div class="row">
                <?php
                $args = array (
                'post_type' => array ('magazine'),
                'orderby' => array( 'menu_order' => 'ASC'),
                'posts_per_page' => 9
                );
                //$args['search_filter_id'] = 84;
                $pastIssues = new WP_Query($args);                           
                $counter = 0;
                ?>

                    <?php while ( $pastIssues->have_posts() ) : $pastIssues->the_post();?>

                    <div class="col-md-3">
                       <div class="past-issue">
                            <a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail(); ?></a>
                            <h2><?php the_title();?></h2>
                       </div>
                    </div>

                    <?php                                      
                    $counter++;        
                    ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php
get_footer();