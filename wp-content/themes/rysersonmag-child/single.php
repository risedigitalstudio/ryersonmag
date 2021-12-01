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

<!--Post Headers-->

<div id="content">

<?php $featuredImagePosition = get_field('featured_image_position'); ?>
<?php if ($featuredImagePosition == "Small Centred") { ?>
    
<section class="single-post">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php get_template_part( 'global-templates/post-header' ); ?>
            </div>
        </div>
    </div>
</section>

    <section class="featured-image-small-centered">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <?php echo get_the_post_thumbnail(); ?>
                    <figcaption>
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/caption-arrow.png" class="caption-arrow">
                        <?php echo get_the_post_thumbnail_caption(); ?>
                    </figcaption>
                </div>
            </div>
        </div>
    </section>

<?php } else if ($featuredImagePosition == "Vertical White") { ?>

    <section class="vertical-post-header vertical-white">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-lg-6 px-0">
                    <?php get_template_part( 'global-templates/post-header' ); ?>
                </div>
                <div class="col-lg-6 px-0">
                    <?php the_post_thumbnail('vertical-header'); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="caption-sec vertical-caption-sec">
        <div class="container px-0">
            <div class="row">
                <div class="col-md-6 offset-md-6 px-0">
                    <figcaption>
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/caption-arrow.png" class="caption-arrow">
                        <?php echo get_the_post_thumbnail_caption(); ?>
                    </figcaption>
                </div>
            </div>
        </div>
    </section>


<?php } else if ($featuredImagePosition == "Vertical Black") { ?>

    <section class="vertical-post-header vertical-black">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-lg-6 info-side px-0">
                    <?php get_template_part( 'global-templates/post-header' ); ?>
                </div>
                <div class="col-lg-6 px-0">
                    <?php the_post_thumbnail('vertical-header'); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="caption-sec vertical-caption-sec">
        <div class="container px-0">
            <div class="row">
                <div class="col-md-6 offset-md-6 px-0">
                    <figcaption>
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/caption-arrow.png" class="caption-arrow">
                        <?php echo get_the_post_thumbnail_caption(); ?>
                    </figcaption>
                </div>
            </div>
        </div>
    </section>



<?php } else if ($featuredImagePosition == "Horizontal Full Width") { ?>

    <section class="single-post">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <?php get_template_part( 'global-templates/post-header' ); ?>
                </div>
            </div>
        </div>
    </section>
   
    <section class="featured-image-horizontal-full-width">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-md-12">
                    <?php the_post_thumbnail('horizontal-full-header', ['class'=>'full']); ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <figcaption>
                   <img src="<?php echo get_stylesheet_directory_uri();?>/img/caption-arrow.png" class="caption-arrow">
                    <?php echo get_the_post_thumbnail_caption(); ?>
                </figcaption>
            </div>
        </div>
    </section>

<?php } ?>

</div><!--closes content-->

<!--Post Content-->


<div class="post-content-blocks">
<?php $blocks = get_field('post_content');
if ($blocks) {
    foreach ($blocks as $block_data) {
        $block_name = $block_data['acf_fc_layout'];
        $block_template = locate_template('acf-post-blocks/'.$block_name.'.php', false, false);
        if ($block_template) {
            include ($block_template);
        }
    }
}
?>
</div>


<section class="author sec-pad-half">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
<!--                <div class="row">-->
                <?php $authorID = get_the_author_meta('ID'); ?>
                <?php if (get_avatar($authorID)) { ?>
                    <div class="author-img">
                        <?php echo get_avatar($authorID, 'small-square'); ?>
                    </div>
                <?php } ?>
                    <div class="author-info">
                        <div class="author-desc">
                            <?php echo get_the_author_meta('description'); ?>
                        </div>
                        <div class="author-social">
                            <?php 
                                if (get_field('twitter_handle', 'user_'.$authorID) && get_field('twitter_link', 'user_'.$authorID)) {
                                    ?>
                                    <a href="<?php echo get_field('twitter_link', 'user_'.$authorID); ?>" target="_blank" class="author-social-item author-twitter">
                                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/author-twitter.png">
                                        <span><?php echo get_field('twitter_handle', 'user_'.$authorID); ?></span>
                                    </a>
                                    <?php
                                }
                            ?>
                            <?php 
                                if (get_field('instagram_handle', 'user_'.$authorID) && get_field('instagram_link', 'user_'.$authorID)) {
                                    ?>
                                    <a href="<?php echo get_field('instagram_link', 'user_'.$authorID); ?>" target="_blank" class="author-social-item author-insta">
                                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/author-instagram.png">
                                        <span><?php echo get_field('instagram_handle', 'user_'.$authorID); ?></span>
                                    </a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
<!--                </div>-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="post-tags full">
                    <?php 
                        $postTagsArray = get_the_tags(get_the_ID());
                        if($postTagsArray && sizeof($postTagsArray) > 0) {
                            echo 'Read More ';
                            foreach($postTagsArray as $tagObj) {
                                ?>
                                <a href="<?php echo site_url();?>/tag/<?php echo $tagObj->slug;?>" class="post-tag-link"><?php echo $tagObj->name;?></a>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>



<?php if (get_field('turn_commenting_on') == true) {
    ?>
<section class="author sec-pad-half">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                    <?php
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
                </div>
            </div>
        </div>
</section>
    <?php
}?>



<section class="related-articles archive-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="related-articles-heading">More Posts</h2>
            </div>
        </div>
        <div class="row">
            
            <?php 
            
                $related = get_posts( 
                    array( 
                        'category__in' => wp_get_post_categories( $post->ID ), 
                        'numberposts'  => 3, 
                        'orderby'      => 'rand',
                        'post__not_in' => array( $post->ID ) 
                    ) 
                );

                if( $related ) { 
                    foreach( $related as $relatedPost ) {
                        setup_postdata($relatedPost);
                        $relatedPostID = $relatedPost->ID;
                        
                        ?>
                        
                <div class="col-md-4" id="post-<?php echo $relatedPostID; ?>">
                    <div class="single-archive-post-wrap">

                       <?php 
                        $taxImgRatio = get_field('taxonomy_image_ratio', $relatedPostID); 
                        $taxThumbOptionalID = get_field('taxonomy_thumbnail_optional', $relatedPostID);
                
                        $postColorClass = '';
                        $thePostCat = get_the_category($relatedPostID);
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
                           <a href="<?php echo get_the_permalink($relatedPostID);?>" class="lead-img-wrap <?php echo $postColorClass;?>">
                           <?php if ($taxImgRatio == 'Horizontal') { ?>
                              
                                <?php 
                                if ($taxThumbOptionalID) {
                                    echo wp_get_attachment_image($taxThumbOptionalID, 'archive-hor');
                                } else {
                                    echo get_the_post_thumbnail( $relatedPostID, 'archive-hor' ); 
                                }
                                ?>
                               
                           <?php } else if ($taxImgRatio == 'Vertical') { ?>
                               
                                <?php 
                                if ($taxThumbOptionalID) {
                                    echo wp_get_attachment_image($taxThumbOptionalID, 'archive-ver');
                                } else {
                                    echo get_the_post_thumbnail( $relatedPostID, 'archive-ver' ); 
                                }
                                ?>
                                
                            <?php }  else if ($taxImgRatio == 'Square') { ?>
                               
                                <?php 
                                if ($taxThumbOptionalID) {
                                    echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                } else {
                                    echo get_the_post_thumbnail( $relatedPostID, 'archive-square' ); 
                                }
                                ?>
                                
                            <?php } else { ?>
                               
                                <?php 
                                if ($taxThumbOptionalID) {
                                    echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                } else {
                                    echo get_the_post_thumbnail( $relatedPostID, 'archive-square' ); 
                                }
                                ?>
                                
                            <?php } ?>
                            </a>
                        </span>

                        <?php 

                        $topics = wp_get_post_terms($relatedPostID, 'topic');
                        $topicName = $topics[0]->name;
                        $topicSlug = $topics[0]->slug;

                        ?>
                        <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category"><?php echo $topicName; ?></a></p>

                        <a href="<?php echo get_the_permalink($relatedPostID);?>">
                            <h2 class="entry-title"><?php echo get_the_title($relatedPostID); ?></h2>
                            <h3 class="subheading"><?php echo get_field('subheading', $relatedPostID);?></h3>
                        </a>
                    </div>
                </div>
                       
                         
                        <?php

                    }
                    wp_reset_postdata();
                }
            
            ?>
            
        </div>
    </div>
</section>

<?php
get_footer();
