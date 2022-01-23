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

get_header('home');

?>

<section class="home" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="sticky-home-intro" id="timelinepin">
                    <div class="home-logo-rel-wrapper">
                       <h1 class="sr-only">Ryerson University Magazine</h1>
<!--                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/ryerson-new-name.png" class="home-logo"  alt="Logo">-->
                       
                        <div class="over1340">
                        <?php get_template_part( 'global-templates/ryerson-home-logo' ); ?>
                        </div>
                        <div class="under1340">
                        <?php get_template_part( 'global-templates/ryerson-home-logo-ipad' ); ?>
                        </div>

                        <a href="https://www.ryerson.ca/next-chapter/" target="_blank">Renaming <br>in process<br><span>Learn More</span></a>
                    </div>
                    <p class="sticky-low-p">Ryerson University magazine covers topics such as community, education, equity, city-building, innovation and more. <a href="#" id="viewAllTopics" class="drawUnderline">View all topics.</a></p>
                </div>
            </div>
            <div class="col-md-8 left-border" id="timeline">
                <div class="row">
                       <h2 class="sr-only">Featured</h2>
                        <div class="col-md-12" id="post-<?php the_ID(); ?>">
                            <div class="single-archive-post-wrap">

                                <?php $featuredPostID = get_field('featured_post')[0]; ?>

                               <?php 
                                $taxImgRatio = get_field('taxonomy_image_ratio', $featuredPostID); 
                                $taxThumbOptionalID = get_field('taxonomy_thumbnail_optional', $featuredPostID);

                                $postColorClass = '';
                                $thePostCat = get_the_category($featuredPostID);
                                $thePostCatSlug = $thePostCat[0]->slug;
                                if ($thePostCatSlug == 'people') {
                                    $postColorClass = 'green';
                                } else if ($thePostCatSlug == 'research-ideas') {
                                    $postColorClass = 'blue';
                                } else if ($thePostCatSlug == 'campus') { 
                                    $postColorClass = 'orange';
                                }
                                ?>


                                <span class="taxonomy-thumb full">
                                   <a href="<?php echo get_the_permalink($featuredPostID);?>" class="lead-img-wrap <?php echo $postColorClass;?>" tabindex="-1" aria-hidden="true">
                                        <?php echo get_the_post_thumbnail( $featuredPostID, 'home-hor', ['class'=>'full'] ); ?>
                                    </a>
                                </span>

                                
                                <?php
                                $term_list = wp_get_post_terms($featuredPostID, 'topic', ['fields' => 'all']);
                                foreach($term_list as $term) {
                                   if( get_post_meta($featuredPostID, '_yoast_wpseo_primary_topic',true) == $term->term_id ) {
                                     // this is a primary category
                                       $topicName = $term->name;
                                       $topicSlug = $term->slug;
                                   }
                                }
                                ?>
                                
                                
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category drawUnderline"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($featuredPostID);?>" class="featured-post-headings post-title-subtitle homeFeatOnlyPost">
                                    <h3 class="entry-title"><?php echo get_the_title($featuredPostID); ?></h3>
                                    <?php if (get_field('subheading', $featuredPostID)) { ?>
                                    <p class="subheading"><?php echo get_field('subheading', $featuredPostID);?></p>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                    
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        
                <?php 
                    $secondaryArticlesArray = get_field("secondary_featured_posts");
                    $secondaryArticlesArraySize = ceil(sizeof($secondaryArticlesArray) / 2);
                    $articleArrayCounter = 0;
                    foreach($secondaryArticlesArray as $featuredArticle) {
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
                                    <h3 class="entry-title"><?php echo get_the_title($featuredArticle); ?></h3>
                                    <?php if (get_field('subheading', $featuredArticle)) { ?>
                                    <p class="subheading"><?php echo get_field('subheading', $featuredArticle);?></p>
                                    <?php } ?>
                                </a>
                            </div>
                        
                        <?php
                        $articleArrayCounter++;
                        if ($secondaryArticlesArraySize == $articleArrayCounter) {
                            echo '</div><div class="col-md-6">';
                        }
                    }
                ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="category-featured sec-pad home-people">
    <div class="container">
       <div class="row">
           <div classs="col-md-12">
              <div class="featured-cat-heading-wrap">
                   <h2 class="featured-cat-heading green">People</h2>
                   <a href="<?php echo site_url();?>/category/people" class="see-all">
                    <?php get_template_part( 'global-templates/see-all-circle' ); ?>
                   </a>
               </div>
           </div>
       </div>
       
        <div class="row sec-pad-top">
                
                <?php 
                    $peopleArticleArray = get_field("people_featured_posts");
                    $peopleCounter = 0;
                    foreach($peopleArticleArray as $peopleArticle) {
                        $peopleColWidth = 'col-md-4';
                        if ($peopleCounter == 0) {
                            $peopleColWidth = 'col-md-5';
                        } else if ($peopleCounter == 2) {
                            $peopleColWidth = 'col-md-3 no-bottom-border-mobile';
                        }
                        ?>
                        
                            <div class="<?php echo $peopleColWidth; ?>">
                            <div class="single-archive-post-wrap">

                               <?php 
                                $taxImgRatio = get_field('taxonomy_image_ratio', $peopleArticle); 
                                $taxThumbOptionalID = get_field('taxonomy_thumbnail_optional', $peopleArticle);

                                $postColorClass = '';
                                $thePostCat = get_the_category($peopleArticle);
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
                                   <a href="<?php echo get_the_permalink($peopleArticle);?>" class="lead-img-wrap <?php if ($peopleCounter !== 0) {echo 'no-mob-img';}?> <?php echo $postColorClass;?>" tabindex="-1" aria-hidden="true">
                                   <?php if ($taxImgRatio == 'Horizontal') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-hor');
                                        } else {
                                            echo get_the_post_thumbnail( $peopleArticle, 'archive-hor' ); 
                                        }
                                        ?>

                                   <?php } else if ($taxImgRatio == 'Vertical') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-ver');
                                        } else {
                                            echo get_the_post_thumbnail( $peopleArticle, 'archive-ver' ); 
                                        }
                                        ?>

                                    <?php }  else if ($taxImgRatio == 'Square') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $peopleArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } else { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $peopleArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } ?>
                                   
                                    </a>
                                 </span>


                                <?php
                                $term_list = wp_get_post_terms($peopleArticle, 'topic', ['fields' => 'all']);
                                foreach($term_list as $term) {
                                   if( get_post_meta($peopleArticle, '_yoast_wpseo_primary_topic',true) == $term->term_id ) {
                                     // this is a primary category
                                       $topicName = $term->name;
                                       $topicSlug = $term->slug;
                                   }
                                }
                                ?>
                                
                                
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category drawUnderline"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($peopleArticle);?>" class="post-title-subtitle">
                                    <h3 class="entry-title"><?php echo get_the_title($peopleArticle); ?></h3>
                                    <?php if (get_field('subheading', $peopleArticle)) { ?>
                                    <p class="subheading"><?php echo get_field('subheading', $peopleArticle);?></p>
                                    <?php } ?>
                                </a>
                            </div>
                            </div>
                        
                        <?php
                        $peopleCounter++;
                    }
                ?>
            
        </div>
    </div>
</section>



<section class="home-editors-picks sec-pad-lg">
    <div class="container">
       <div class="row">
           <div class="col-md-12">
               <h2>Editor&apos;s Picks</h2>
           </div>
       </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="editors-picks-flex sec-pad-half">
                    <?php $editorsPicksArray = get_field('editors_picks');?>
                    <?php 
                        foreach ($editorsPicksArray as $editorsPick) {


                                $term_list = wp_get_post_terms($editorsPick, 'topic', ['fields' => 'all']);
                                foreach($term_list as $term) {
                                   if( get_post_meta($editorsPick, '_yoast_wpseo_primary_topic',true) == $term->term_id ) {
                                     // this is a primary category
                                       $pickTopicName = $term->name;
                                       $pickTopicSlug = $term->slug;
                                   }
                                }
                      
//                                $pickTopics = wp_get_post_terms($editorsPick, 'topic');
//                                $pickTopicName = $pickTopics[0]->name;
//                                $pickTopicSlug = $pickTopics[0]->slug;

                                $pickPostColorClass = '';
                                $pickPostCat = get_the_category($editorsPick);
                                $pickPostCatSlug = $pickPostCat[0]->slug;
                                if ($pickPostCatSlug == 'people') {
                                    $pickPostColorClass = 'green';
                                } else if ($pickPostCatSlug == 'research-ideas') {
                                    $pickPostColorClass = 'blue';
                                } else if ($pickPostCatSlug == 'campus') { 
                                    $pickPostColorClass = 'orange';
                                }

                                ?>

                            <li class="pick">
                                <a href="<?php echo get_the_permalink($editorsPick);?>" class="full <?php echo $pickPostColorClass;?>">
                                    <p class="pb-0 mb-0 primary-category drawUnderline"><?php echo $pickTopicName; ?></p>
                                    <p class="editors-pick-title"><?php echo get_the_title($editorsPick);?></p>
                                </a>
                            </li>
                            <?php 
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>




<section class="category-featured sec-pad-bot">
    <div class="container">
       <div class="row">
           <div classs="col-md-12">
              <div class="featured-cat-heading-wrap">
                   <h2 class="featured-cat-heading blue">Research &amp; Ideas</h2>
                   <a href="<?php echo site_url();?>/category/research-ideas/" class="see-all see-all-ri">
                  <?php get_template_part( 'global-templates/see-all-circle' ); ?>
                   </a>
               </div>
           </div>
       </div>

        <div class="row sec-pad-top">
                
                <?php 
                    $researchArticleArray = get_field("research_featured_posts");
                    $researchCounter = 0;
                    foreach($researchArticleArray as $researchArticle) {
                        $researchColWidth = 'col-md-4';
                        if ($researchCounter == 1) {
                            $researchColWidth = 'col-md-3';
                        } else if ($researchCounter == 2) {
                            $researchColWidth = 'col-md-5 no-bottom-border-mobile';
                        }
                        ?>
                        
                            <div class="<?php echo $researchColWidth; ?>">
                            <div class="single-archive-post-wrap">

                               <?php 
                                $taxImgRatio = get_field('taxonomy_image_ratio', $researchArticle); 
                                $taxThumbOptionalID = get_field('taxonomy_thumbnail_optional', $researchArticle);

                                $postColorClass = '';
                                $thePostCat = get_the_category($researchArticle);
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
                                   <a href="<?php echo get_the_permalink($researchArticle);?>" class="lead-img-wrap <?php if ($researchCounter !== 0) {echo 'no-mob-img';}?> <?php echo $postColorClass;?>" tabindex="-1" aria-hidden="true">
                                   <?php if ($taxImgRatio == 'Horizontal') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-hor');
                                        } else {
                                            echo get_the_post_thumbnail( $researchArticle, 'archive-hor' ); 
                                        }
                                        ?>

                                   <?php } else if ($taxImgRatio == 'Vertical') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-ver');
                                        } else {
                                            echo get_the_post_thumbnail( $researchArticle, 'archive-ver' ); 
                                        }
                                        ?>

                                    <?php }  else if ($taxImgRatio == 'Square') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $researchArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } else { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail($researchArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } ?>
                                    
                                    </a>
                                </span>

                                <?php
                                $term_list = wp_get_post_terms($researchArticle, 'topic', ['fields' => 'all']);
                                foreach($term_list as $term) {
                                   if( get_post_meta($researchArticle, '_yoast_wpseo_primary_topic',true) == $term->term_id ) {
                                     // this is a primary category
                                       $topicName = $term->name;
                                       $topicSlug = $term->slug;
                                   }
                                }
                                ?>
                                
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category drawUnderline"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($researchArticle);?>" class="post-title-subtitle">
                                    <h3 class="entry-title"><?php echo get_the_title($researchArticle); ?></h3>
                                    <?php if (get_field('subheading', $researchArticle)) { ?>
                                    <p class="subheading"><?php echo get_field('subheading', $researchArticle);?></p>
                                    <?php } ?>
                                </a>
                            </div>
                            </div>
                        
                        <?php
                        $researchCounter++;
                    }
                ?>
            
        </div>
    </div>
</section>

<!--

<section class="what-do-you-think sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background:red; padding: 45px;">
                <h2>What do you think?</h2>
            </div>
        </div>
    </div>
</section>
-->


<section class="category-featured sec-pad">
    <div class="container">
       <div class="row">
           <div classs="col-md-12">
              <div class="featured-cat-heading-wrap">
                   <h2 class="featured-cat-heading orange">Campus</h2>
                   <a href="<?php echo site_url();?>/category/campus/" class="see-all">
                      <?php get_template_part( 'global-templates/see-all-circle' ); ?>
                   </a>
               </div>
           </div>
       </div>
       
        <div class="row sec-pad-top">
                
                <?php 
                    $campusArticleArray = get_field("campus_featured_posts");
                    $campusCounter = 0;
                    foreach($campusArticleArray as $campusArticle) {
                        
                        $campusColWidth = 'col-md-4';
                        if ($campusCounter == 1) {
                            $campusColWidth = 'col-md-5';
                        } else if ($campusCounter == 2) {
                            $campusColWidth = 'col-md-3 no-bottom-border-mobile';
                        }
                        ?>
                        
                            <div class="<?php echo $campusColWidth; ?>">
                            <div class="single-archive-post-wrap">

                               <?php 
                                $taxImgRatio = get_field('taxonomy_image_ratio', $campusArticle); 
                                $taxThumbOptionalID = get_field('taxonomy_thumbnail_optional', $campusArticle);

                                $postColorClass = '';
                                $thePostCat = get_the_category($campusArticle);
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
                                   <a href="<?php echo get_the_permalink($campusArticle);?>" class="lead-img-wrap <?php if ($campusCounter !== 0) {echo 'no-mob-img';}?> <?php echo $postColorClass;?>" tabindex="-1" aria-hidden="true">
                                   <?php if ($taxImgRatio == 'Horizontal') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-hor');
                                        } else {
                                            echo get_the_post_thumbnail( $campusArticle, 'archive-hor' ); 
                                        }
                                        ?>

                                   <?php } else if ($taxImgRatio == 'Vertical') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-ver');
                                        } else {
                                            echo get_the_post_thumbnail($campusArticle, 'archive-ver' ); 
                                        }
                                        ?>

                                    <?php }  else if ($taxImgRatio == 'Square') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $campusArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } else { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail($campusArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } ?>
                                       
                                    </a>
                                </span>

                                <?php
                                $term_list = wp_get_post_terms($campusArticle, 'topic', ['fields' => 'all']);
                                foreach($term_list as $term) {
                                   if( get_post_meta($campusArticle, '_yoast_wpseo_primary_topic',true) == $term->term_id ) {
                                     // this is a primary category
                                       $topicName = $term->name;
                                       $topicSlug = $term->slug;
                                   }
                                }
                                ?>
                                
                                
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category drawUnderline"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($campusArticle);?>" class="post-title-subtitle">
                                    <h3 class="entry-title"><?php echo get_the_title($campusArticle); ?></h3>
                                    <?php if (get_field('subheading', $campusArticle)) { ?>
                                    <p class="subheading"><?php echo get_field('subheading', $campusArticle);?></p>
                                    <?php } ?>
                                </a>
                            </div>
                            </div>
                        
                        <?php
                        $campusCounter++;
                    }
                ?>
            
        </div>
    </div>
</section>



<?php
get_footer();
