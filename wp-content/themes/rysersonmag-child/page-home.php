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

<section class="home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="sticky-home-intro" id="timelinepin">
                    <a href="#" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/ryerson-new-name.png" class="home-logo">
                    </a>
                    <p class="sticky-low-p">Ryerson University magazine writes on topics such as community, education, equity, city-building, innovation and more. View all topics.</p>
                </div>
            </div>
            <div class="col-md-8 left-border" id="timeline">
                <div class="row">
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

                                <a href="<?php echo get_the_permalink($featuredPostID);?>" class="taxonomy-thumb full <?php echo $postColorClass;?>">
                                    <?php echo get_the_post_thumbnail( $featuredPostID, 'home-hor', ['class'=>'full'] ); ?>
                                </a>

                                <?php 

                                $topics = wp_get_post_terms($featuredPostID, 'topic');
                                $topicName = $topics[0]->name;
                                $topicSlug = $topics[0]->slug;

                                ?>
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($featuredPostID);?>" class="featured-post-headings">
                                    <h2 class="entry-title"><?php echo get_the_title($featuredPostID); ?></h2>
                                    <h3 class="subheading"><?php echo get_field('subheading', $featuredPostID);?></h3>
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

                                <a href="<?php echo get_the_permalink($featuredArticle);?>" class="taxonomy-thumb full <?php echo $postColorClass;?>">
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


<section class="home-editors-picks">
    <div class="container">
       <div class="row">
           <div class="col-md-12">
               <h2>Editor's Picks</h2>
           </div>
       </div>
        <div class="row">
            <div class="col-md-12">
                <div class="editors-picks-flex sec-pad-half">
                    <?php $editorsPicksArray = get_field('editors_picks');?>
                    <?php 
                        foreach ($editorsPicksArray as $editorsPick) {

                                $pickTopics = wp_get_post_terms($editorsPick, 'topic');
                                $pickTopicName = $pickTopics[0]->name;
                                $pickTopicSlug = $pickTopics[0]->slug;

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

                            <div class="pick <?php echo $pickPostColorClass;?>">
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $pickTopicSlug; ?>" class="primary-category"><?php echo $pickTopicName; ?></a></p>
                                <a href="<?php echo get_the_permalink($editorsPick);?>" class="full">
                                    <h3><?php echo get_the_title($editorsPick);?></h3>
                                </a>
                            </div>
                            <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="category-featured sec-pad-bot">
    <div class="container">
       <div class="row">
           <div classs="col-md-12">
               <h2 class="featured-cat-heading green">People
                   <a href="<?php echo site_url();?>/category/people" class="see-all">
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/see-all-circle.png" class="see-all-circle">
                   </a>
                    <span class="stars">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/see-all-lg-stars.png" class="see-all-lg-stars" data-aos="fade-in" data-aos-delay="200">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/see-all-sm-stars.png" class="see-all-sm-stars" data-aos="fade-in" data-aos-delay="400">
                    </span>
               </h2>
           </div>
       </div>
        <div class="row">
                
                <?php 
                    $peopleArticleArray = get_field("people_featured_posts");
                    foreach($peopleArticleArray as $peopleArticle) {
                        ?>
                        
                            <div class="col-md-4">
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

                                <a href="<?php echo get_the_permalink($peopleArticle);?>" class="taxonomy-thumb full <?php echo $postColorClass;?>">
                                   <?php if ($taxImgRatio == 'Horizontal') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($peopleArticle, 'archive-hor');
                                        } else {
                                            echo get_the_post_thumbnail( $peopleArticle, 'archive-hor' ); 
                                        }
                                        ?>

                                   <?php } else if ($taxImgRatio == 'Vertical') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($peopleArticle, 'archive-ver');
                                        } else {
                                            echo get_the_post_thumbnail( $peopleArticle, 'archive-ver' ); 
                                        }
                                        ?>

                                    <?php }  else if ($taxImgRatio == 'Square') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($peopleArticle, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $peopleArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } else { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($peopleArticle, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $peopleArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } ?>
                                </a>

                                <?php 

                                $topics = wp_get_post_terms($peopleArticle, 'topic');
                                $topicName = $topics[0]->name;
                                $topicSlug = $topics[0]->slug;

                                ?>
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($peopleArticle);?>">
                                    <h2 class="entry-title"><?php echo get_the_title($peopleArticle); ?></h2>
                                    <h3 class="subheading"><?php echo get_field('subheading', $peopleArticle);?></h3>
                                </a>
                            </div>
                            </div>
                        
                        <?php
                    }
                ?>
            
        </div>
    </div>
</section>



<section class="category-featured sec-pad-bot">
    <div class="container">
       <div class="row">
           <div classs="col-md-12">
               <h2 class="featured-cat-heading blue">Research &amp; Ideas
                   <a href="<?php echo site_url();?>/category/research-ideas/" class="see-all">
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/see-all-circle.png" class="see-all-circle">
                   </a>
                    <span class="stars">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/see-all-lg-stars.png" class="see-all-lg-stars" data-aos="fade-in" data-aos-delay="200">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/see-all-sm-stars.png" class="see-all-sm-stars" data-aos="fade-in" data-aos-delay="400">
                    </span>
               </h2>
           </div>
       </div>
        <div class="row">
                
                <?php 
                    $researchArticleArray = get_field("research_featured_posts");
                    foreach($researchArticleArray as $researchArticle) {
                        ?>
                        
                            <div class="col-md-4">
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

                                <a href="<?php echo get_the_permalink($researchArticle);?>" class="taxonomy-thumb full <?php echo $postColorClass;?>">
                                   <?php if ($taxImgRatio == 'Horizontal') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($researchArticle, 'archive-hor');
                                        } else {
                                            echo get_the_post_thumbnail( $researchArticle, 'archive-hor' ); 
                                        }
                                        ?>

                                   <?php } else if ($taxImgRatio == 'Vertical') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($researchArticle, 'archive-ver');
                                        } else {
                                            echo get_the_post_thumbnail( $researchArticle, 'archive-ver' ); 
                                        }
                                        ?>

                                    <?php }  else if ($taxImgRatio == 'Square') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($researchArticle, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $researchArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } else { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($researchArticle, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail($researchArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } ?>
                                </a>

                                <?php 

                                $topics = wp_get_post_terms($researchArticle, 'topic');
                                $topicName = $topics[0]->name;
                                $topicSlug = $topics[0]->slug;

                                ?>
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($researchArticle);?>">
                                    <h2 class="entry-title"><?php echo get_the_title($researchArticle); ?></h2>
                                    <h3 class="subheading"><?php echo get_field('subheading', $researchArticle);?></h3>
                                </a>
                            </div>
                            </div>
                        
                        <?php
                    }
                ?>
            
        </div>
    </div>
</section>


<section class="what-do-you-think sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background:red; padding: 45px;">
                <h2>What do you think?</h2>
            </div>
        </div>
    </div>
</section>


<section class="category-featured sec-pad">
    <div class="container">
       <div class="row">
           <div classs="col-md-12">
               <h2 class="featured-cat-heading orange">Campus
                   <a href="<?php echo site_url();?>/category/campus/" class="see-all">
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/see-all-circle.png" class="see-all-circle">
                   </a>
                    <span class="stars">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/see-all-lg-stars.png" class="see-all-lg-stars" data-aos="fade-in" data-aos-delay="200">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/see-all-sm-stars.png" class="see-all-sm-stars" data-aos="fade-in" data-aos-delay="400">
                    </span>
               </h2>
           </div>
       </div>
        <div class="row">
                
                <?php 
                    $campusArticleArray = get_field("campus_featured_posts");
                    foreach($campusArticleArray as $campusArticle) {
                        ?>
                        
                            <div class="col-md-4">
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

                                <a href="<?php echo get_the_permalink($campusArticle);?>" class="taxonomy-thumb full <?php echo $postColorClass;?>">
                                   <?php if ($taxImgRatio == 'Horizontal') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($campusArticle, 'archive-hor');
                                        } else {
                                            echo get_the_post_thumbnail( $campusArticle, 'archive-hor' ); 
                                        }
                                        ?>

                                   <?php } else if ($taxImgRatio == 'Vertical') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($campusArticle, 'archive-ver');
                                        } else {
                                            echo get_the_post_thumbnail($campusArticle, 'archive-ver' ); 
                                        }
                                        ?>

                                    <?php }  else if ($taxImgRatio == 'Square') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($campusArticle, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $campusArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } else { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($campusArticle, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail($campusArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } ?>
                                </a>

                                <?php 

                                $topics = wp_get_post_terms($campusArticle, 'topic');
                                $topicName = $topics[0]->name;
                                $topicSlug = $topics[0]->slug;

                                ?>
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($campusArticle);?>">
                                    <h2 class="entry-title"><?php echo get_the_title($campusArticle); ?></h2>
                                    <h3 class="subheading"><?php echo get_field('subheading', $campusArticle);?></h3>
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
