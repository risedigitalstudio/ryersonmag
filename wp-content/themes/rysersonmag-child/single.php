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

<article>

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
                    <?php if (get_the_post_thumbnail_caption()) { ?>
                    <figcaption>
                        <?php get_template_part( 'global-templates/caption-arrow' ); ?>
                        <?php echo get_the_post_thumbnail_caption(); ?>
                    </figcaption>
                    <?php } else {echo '<div class="false-caption"></div>';} ?>
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
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                   <?php if (get_the_post_thumbnail_caption()) { ?>
                    <figcaption>
                        <?php get_template_part( 'global-templates/caption-arrow' ); ?>
                        <?php echo get_the_post_thumbnail_caption(); ?>
                    </figcaption>
                    <?php } else {echo '<div class="false-caption"></div>';} ?>
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
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-6">
                   <?php if (get_the_post_thumbnail_caption()) { ?>
                    <figcaption>
                        <?php get_template_part( 'global-templates/caption-arrow' ); ?>
                        <?php echo get_the_post_thumbnail_caption(); ?>
                    </figcaption>
                    <?php }else {echo '<div class="false-caption"></div>';} ?>
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
                <div class="col-md-12 px-0">
                    <?php the_post_thumbnail('horizontal-full-header', ['class'=>'full']); ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-8 offset-md-2">
               <?php if (get_the_post_thumbnail_caption()) { ?>
                <figcaption>
                    <?php get_template_part( 'global-templates/caption-arrow' ); ?>
                    <?php echo get_the_post_thumbnail_caption(); ?>
                </figcaption>
                <?php }else {echo '<div class="false-caption"></div>';} ?>
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


<?php if(get_field('show_author'))  { ?>


    <?php if(get_field('overwrite_author') == true)  { ?>

        <section class="author sec-pad-half">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                       
                        <?php if (get_field('author_photo')) { ?>
                            <div class="author-img">
                                <?php echo wp_get_attachment_image(get_field('author_photo'), 'small-square'); ?>
                            </div>
                        <?php } ?>
                            <div class="author-info">
                                <div class="author-desc">
                                    <?php echo get_field('author_bio'); ?>
                                </div>
                                <div class="author-social">
                                    <?php 
                                        if (get_field('twitter_handle') && get_field('twitter_url')) {
                                            ?>
                                            <a href="<?php echo get_field('twitter_url'); ?>" target="_blank" class="author-social-item author-twitter">
<!--                                                <i class="fa fa-twitter"></i>-->
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM11.6658 10.169L11.6406 9.75375C11.5651 8.67755 12.2282 7.69456 13.2774 7.31323C13.6635 7.17765 14.3182 7.1607 14.7463 7.27934C14.9142 7.33018 15.2331 7.49966 15.4598 7.65219L15.8711 7.93184L16.3243 7.78778C16.5761 7.71151 16.9119 7.5844 17.063 7.49966C17.2057 7.42339 17.3316 7.38102 17.3316 7.40645C17.3316 7.5505 17.021 8.042 16.7608 8.31317C16.4083 8.6945 16.509 8.72839 17.2224 8.47417C17.6505 8.33011 17.6589 8.33011 17.575 8.49112C17.5246 8.57586 17.2644 8.87245 16.9874 9.14362C16.5174 9.60969 16.4922 9.66054 16.4922 10.0503C16.4922 10.652 16.2068 11.9062 15.9214 12.5925C15.3926 13.8806 14.2595 15.211 13.1263 15.8805C11.5315 16.8211 9.40786 17.0584 7.61999 16.5075C7.02404 16.3211 6 15.8466 6 15.7618C6 15.7364 6.31057 15.7025 6.68829 15.694C7.4773 15.6771 8.26631 15.4568 8.93781 15.067L9.39108 14.7958L8.87066 14.6178C8.13201 14.3636 7.46891 13.7789 7.30103 13.2281C7.25067 13.0501 7.26746 13.0417 7.73751 13.0417L8.22434 13.0332L7.81305 12.8383C7.32621 12.5925 6.88134 12.1773 6.66311 11.7536C6.50362 11.4486 6.30218 10.6774 6.36093 10.6181C6.37772 10.5927 6.55399 10.6435 6.75544 10.7113C7.33461 10.9232 7.41015 10.8723 7.0744 10.5164C6.44487 9.87239 6.25181 8.91482 6.55399 8.0081L6.69668 7.60135L7.25067 8.15216C8.38383 9.26226 9.71843 9.92323 11.2461 10.1181L11.6658 10.169Z" fill="#D9D9D9"/>
                                                    </svg>

                                                <span><?php echo get_field('twitter_handle'); ?></span>
                                            </a>
                                            <?php
                                        }
                                    ?>
                                    <?php 
                                        if (get_field('instagram_handle') && get_field('instagram_url')) {
                                            ?>
                                            <a href="<?php echo get_field('instagram_url'); ?>" target="_blank" class="author-social-item author-insta">                 
<!--                                                <i class="fa fa-instagram"></i>-->
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM9.36163 5.63867C10.0443 5.6076 10.2624 5.6 12.0006 5.6H11.9986C13.7373 5.6 13.9546 5.6076 14.6373 5.63867C15.3186 5.66987 15.784 5.77773 16.192 5.936C16.6133 6.09934 16.9693 6.31801 17.3253 6.67401C17.6813 7.02975 17.9 7.38682 18.064 7.80776C18.2213 8.21469 18.3293 8.67976 18.3613 9.3611C18.392 10.0438 18.4 10.2619 18.4 12.0001C18.4 13.7382 18.392 13.9558 18.3613 14.6385C18.3293 15.3196 18.2213 15.7848 18.064 16.1918C17.9 16.6126 17.6813 16.9697 17.3253 17.3255C16.9697 17.6815 16.6132 17.9007 16.1924 18.0641C15.7852 18.2224 15.3196 18.3303 14.6382 18.3615C13.9555 18.3925 13.7381 18.4001 11.9998 18.4001C10.2618 18.4001 10.0438 18.3925 9.36109 18.3615C8.67989 18.3303 8.21468 18.2224 7.80748 18.0641C7.38681 17.9007 7.02974 17.6815 6.67413 17.3255C6.31826 16.9697 6.09959 16.6126 5.93599 16.1917C5.77786 15.7848 5.66999 15.3197 5.63866 14.6384C5.60772 13.9557 5.59999 13.7382 5.59999 12.0001C5.59999 10.2619 5.60799 10.0436 5.63852 9.36097C5.66919 8.6799 5.77719 8.21469 5.93586 7.80762C6.09986 7.38682 6.31853 7.02975 6.67453 6.67401C7.03027 6.31814 7.38734 6.09947 7.80828 5.936C8.21522 5.77773 8.68029 5.66987 9.36163 5.63867ZM11.4265 6.75337C11.538 6.7532 11.6579 6.75325 11.7873 6.75331L12.0006 6.75337C13.7094 6.75337 13.912 6.7595 14.5868 6.79017C15.2108 6.8187 15.5495 6.92297 15.7751 7.01057C16.0737 7.12657 16.2867 7.26524 16.5105 7.48924C16.7345 7.71325 16.8732 7.92658 16.9895 8.22525C17.0771 8.45059 17.1815 8.78926 17.2099 9.41327C17.2405 10.0879 17.2472 10.2906 17.2472 11.9986C17.2472 13.7066 17.2405 13.9093 17.2099 14.584C17.1813 15.208 17.0771 15.5467 16.9895 15.772C16.8735 16.0707 16.7345 16.2833 16.5105 16.5072C16.2865 16.7312 16.0739 16.8699 15.7751 16.9859C15.5497 17.0739 15.2108 17.1779 14.5868 17.2064C13.9121 17.2371 13.7094 17.2437 12.0006 17.2437C10.2917 17.2437 10.0891 17.2371 9.41447 17.2064C8.79046 17.1776 8.45179 17.0733 8.22606 16.9857C7.92739 16.8697 7.71405 16.7311 7.49005 16.5071C7.26605 16.2831 7.12738 16.0703 7.01111 15.7715C6.92351 15.5461 6.81911 15.2075 6.79071 14.5835C6.76004 13.9088 6.75391 13.7061 6.75391 11.997C6.75391 10.2879 6.76004 10.0863 6.79071 9.41166C6.81924 8.78766 6.92351 8.44899 7.01111 8.22339C7.12711 7.92472 7.26605 7.71138 7.49005 7.48738C7.71405 7.26338 7.92739 7.12471 8.22606 7.00844C8.45166 6.92044 8.79046 6.81644 9.41447 6.78777C10.0049 6.7611 10.2337 6.7531 11.4265 6.75177V6.75337ZM15.417 7.81605C14.9929 7.81605 14.6489 8.15965 14.6489 8.58379C14.6489 9.00779 14.9929 9.3518 15.417 9.3518C15.841 9.3518 16.185 9.00779 16.185 8.58379C16.185 8.15979 15.841 7.81578 15.417 7.81578V7.81605ZM8.71395 12.0001C8.71395 10.1851 10.1855 8.71346 12.0005 8.71339C13.8156 8.71339 15.2868 10.185 15.2868 12.0001C15.2868 13.8152 13.8157 15.2861 12.0006 15.2861C10.1856 15.2861 8.71395 13.8152 8.71395 12.0001ZM12.0005 9.8667C13.1787 9.8667 14.1339 10.8218 14.1339 12.0001C14.1339 13.1782 13.1787 14.1334 12.0005 14.1334C10.8223 14.1334 9.86719 13.1782 9.86719 12.0001C9.86719 10.8218 10.8223 9.8667 12.0005 9.8667Z" fill="#D9D9D9"/>
                                            </svg>

                                                <span><?php echo get_field('instagram_handle'); ?></span>
                                            </a>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    

    <?php } else { ?>

        <section class="author sec-pad-half">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
        <!--                <div class="row">-->
                        <?php $authorID = get_the_author_meta('ID'); ?>
                        <?php 
                            if (get_field('custom_author_image', 'user_'.$authorID)) {
                                ?>
                                    <div class="author-img">
                                        <?php echo wp_get_attachment_image(get_field('custom_author_image', 'user_'.$authorID), 'small-square'); ?>
                                    </div>
                                <?php
                            } else {
                        ?>
                        <?php if (get_avatar($authorID)) { ?>
                            <div class="author-img">
                                <?php echo get_avatar($authorID, 'small-square'); ?>
                            </div>
                        <?php } 
                        }
                        ?>
                            <div class="author-info">
                                <div class="author-desc">
                                    <?php echo get_the_author_meta('description'); ?>
                                </div>
                                <div class="author-social">
                                    <?php 
                                        if (get_field('twitter_handle', 'user_'.$authorID) && get_field('twitter_link', 'user_'.$authorID)) {
                                            ?>
                                            <a href="<?php echo get_field('twitter_link', 'user_'.$authorID); ?>" target="_blank" class="author-social-item author-twitter">
<!--                                                <i class="fa fa-twitter"></i>-->
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM11.6658 10.169L11.6406 9.75375C11.5651 8.67755 12.2282 7.69456 13.2774 7.31323C13.6635 7.17765 14.3182 7.1607 14.7463 7.27934C14.9142 7.33018 15.2331 7.49966 15.4598 7.65219L15.8711 7.93184L16.3243 7.78778C16.5761 7.71151 16.9119 7.5844 17.063 7.49966C17.2057 7.42339 17.3316 7.38102 17.3316 7.40645C17.3316 7.5505 17.021 8.042 16.7608 8.31317C16.4083 8.6945 16.509 8.72839 17.2224 8.47417C17.6505 8.33011 17.6589 8.33011 17.575 8.49112C17.5246 8.57586 17.2644 8.87245 16.9874 9.14362C16.5174 9.60969 16.4922 9.66054 16.4922 10.0503C16.4922 10.652 16.2068 11.9062 15.9214 12.5925C15.3926 13.8806 14.2595 15.211 13.1263 15.8805C11.5315 16.8211 9.40786 17.0584 7.61999 16.5075C7.02404 16.3211 6 15.8466 6 15.7618C6 15.7364 6.31057 15.7025 6.68829 15.694C7.4773 15.6771 8.26631 15.4568 8.93781 15.067L9.39108 14.7958L8.87066 14.6178C8.13201 14.3636 7.46891 13.7789 7.30103 13.2281C7.25067 13.0501 7.26746 13.0417 7.73751 13.0417L8.22434 13.0332L7.81305 12.8383C7.32621 12.5925 6.88134 12.1773 6.66311 11.7536C6.50362 11.4486 6.30218 10.6774 6.36093 10.6181C6.37772 10.5927 6.55399 10.6435 6.75544 10.7113C7.33461 10.9232 7.41015 10.8723 7.0744 10.5164C6.44487 9.87239 6.25181 8.91482 6.55399 8.0081L6.69668 7.60135L7.25067 8.15216C8.38383 9.26226 9.71843 9.92323 11.2461 10.1181L11.6658 10.169Z" fill="#D9D9D9"/>
                                                    </svg>

                                                <span><?php echo get_field('twitter_handle', 'user_'.$authorID); ?></span>
                                            </a>
                                            <?php
                                        }
                                    ?>
                                    <?php 
                                        if (get_field('instagram_handle', 'user_'.$authorID) && get_field('instagram_link', 'user_'.$authorID)) {
                                            ?>
                                            <a href="<?php echo get_field('instagram_link', 'user_'.$authorID); ?>" target="_blank" class="author-social-item author-insta">                 
<!--                                                <i class="fa fa-instagram"></i>-->
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM9.36163 5.63867C10.0443 5.6076 10.2624 5.6 12.0006 5.6H11.9986C13.7373 5.6 13.9546 5.6076 14.6373 5.63867C15.3186 5.66987 15.784 5.77773 16.192 5.936C16.6133 6.09934 16.9693 6.31801 17.3253 6.67401C17.6813 7.02975 17.9 7.38682 18.064 7.80776C18.2213 8.21469 18.3293 8.67976 18.3613 9.3611C18.392 10.0438 18.4 10.2619 18.4 12.0001C18.4 13.7382 18.392 13.9558 18.3613 14.6385C18.3293 15.3196 18.2213 15.7848 18.064 16.1918C17.9 16.6126 17.6813 16.9697 17.3253 17.3255C16.9697 17.6815 16.6132 17.9007 16.1924 18.0641C15.7852 18.2224 15.3196 18.3303 14.6382 18.3615C13.9555 18.3925 13.7381 18.4001 11.9998 18.4001C10.2618 18.4001 10.0438 18.3925 9.36109 18.3615C8.67989 18.3303 8.21468 18.2224 7.80748 18.0641C7.38681 17.9007 7.02974 17.6815 6.67413 17.3255C6.31826 16.9697 6.09959 16.6126 5.93599 16.1917C5.77786 15.7848 5.66999 15.3197 5.63866 14.6384C5.60772 13.9557 5.59999 13.7382 5.59999 12.0001C5.59999 10.2619 5.60799 10.0436 5.63852 9.36097C5.66919 8.6799 5.77719 8.21469 5.93586 7.80762C6.09986 7.38682 6.31853 7.02975 6.67453 6.67401C7.03027 6.31814 7.38734 6.09947 7.80828 5.936C8.21522 5.77773 8.68029 5.66987 9.36163 5.63867ZM11.4265 6.75337C11.538 6.7532 11.6579 6.75325 11.7873 6.75331L12.0006 6.75337C13.7094 6.75337 13.912 6.7595 14.5868 6.79017C15.2108 6.8187 15.5495 6.92297 15.7751 7.01057C16.0737 7.12657 16.2867 7.26524 16.5105 7.48924C16.7345 7.71325 16.8732 7.92658 16.9895 8.22525C17.0771 8.45059 17.1815 8.78926 17.2099 9.41327C17.2405 10.0879 17.2472 10.2906 17.2472 11.9986C17.2472 13.7066 17.2405 13.9093 17.2099 14.584C17.1813 15.208 17.0771 15.5467 16.9895 15.772C16.8735 16.0707 16.7345 16.2833 16.5105 16.5072C16.2865 16.7312 16.0739 16.8699 15.7751 16.9859C15.5497 17.0739 15.2108 17.1779 14.5868 17.2064C13.9121 17.2371 13.7094 17.2437 12.0006 17.2437C10.2917 17.2437 10.0891 17.2371 9.41447 17.2064C8.79046 17.1776 8.45179 17.0733 8.22606 16.9857C7.92739 16.8697 7.71405 16.7311 7.49005 16.5071C7.26605 16.2831 7.12738 16.0703 7.01111 15.7715C6.92351 15.5461 6.81911 15.2075 6.79071 14.5835C6.76004 13.9088 6.75391 13.7061 6.75391 11.997C6.75391 10.2879 6.76004 10.0863 6.79071 9.41166C6.81924 8.78766 6.92351 8.44899 7.01111 8.22339C7.12711 7.92472 7.26605 7.71138 7.49005 7.48738C7.71405 7.26338 7.92739 7.12471 8.22606 7.00844C8.45166 6.92044 8.79046 6.81644 9.41447 6.78777C10.0049 6.7611 10.2337 6.7531 11.4265 6.75177V6.75337ZM15.417 7.81605C14.9929 7.81605 14.6489 8.15965 14.6489 8.58379C14.6489 9.00779 14.9929 9.3518 15.417 9.3518C15.841 9.3518 16.185 9.00779 16.185 8.58379C16.185 8.15979 15.841 7.81578 15.417 7.81578V7.81605ZM8.71395 12.0001C8.71395 10.1851 10.1855 8.71346 12.0005 8.71339C13.8156 8.71339 15.2868 10.185 15.2868 12.0001C15.2868 13.8152 13.8157 15.2861 12.0006 15.2861C10.1856 15.2861 8.71395 13.8152 8.71395 12.0001ZM12.0005 9.8667C13.1787 9.8667 14.1339 10.8218 14.1339 12.0001C14.1339 13.1782 13.1787 14.1334 12.0005 14.1334C10.8223 14.1334 9.86719 13.1782 9.86719 12.0001C9.86719 10.8218 10.8223 9.8667 12.0005 9.8667Z" fill="#D9D9D9"/>
                                            </svg>

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
            </div>
        </section>


<?php 
        }
     }
?>

<section class="post-tag-wrap sec-pad-half-bot">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="post-tags full">
                    <?php 
                        $postTagsArray = get_the_tags(get_the_ID());
                        if($postTagsArray && sizeof($postTagsArray) > 0) {
                            echo '<span class="read-about-tags-label">Read More</span>';
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



<section class="related-articles">
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
                           <a href="<?php echo get_the_permalink($relatedPostID);?>" class="lead-img-wrap <?php echo $postColorClass;?>" tabindex="-1" aria-hidden="true">
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
                        $term_list = wp_get_post_terms(get_the_ID(), 'topic', ['fields' => 'all']);
                        foreach($term_list as $term) {
                           if( get_post_meta(get_the_ID(), '_yoast_wpseo_primary_topic',true) == $term->term_id ) {
                             // this is a primary category
                               $topicName = $term->name;
                               $topicSlug = $term->slug;
                           }
                        }
                        ?>
                        
                        <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category drawUnderline"><?php echo $topicName; ?></a></p>

                        <a href="<?php echo get_the_permalink($relatedPostID);?>" class="post-title-subtitle">
                            <h2 class="entry-title"><?php echo get_the_title($relatedPostID); ?></h2>
                            <?php if (get_field('subheading', $relatedPostID)) { ?>
                            <h3 class="subheading"><?php echo get_field('subheading', $relatedPostID);?></h3>
                            <?php } ?>
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

</article>

<?php
get_footer();
