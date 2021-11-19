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
                <div class="col-md-6 px-0">
                    <?php get_template_part( 'global-templates/post-header' ); ?>
                </div>
                <div class="col-md-6 px-0">
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
                <div class="col-md-6 info-side px-0">
                    <?php get_template_part( 'global-templates/post-header' ); ?>
                </div>
                <div class="col-md-6 px-0">
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
                <div class="row">
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
                </div>
                <div class="row">
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
    </div>
</section>


<section class="related-articles sec-pad-half">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>3 related articles go here</h2>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
