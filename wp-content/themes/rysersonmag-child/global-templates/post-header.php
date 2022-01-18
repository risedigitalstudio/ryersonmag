<?php
    $category = get_the_category(); 
    $primaryCategoryUrl = get_category_link($category[0]->term_id);
    $primaryCategoryName = $category[0]->cat_name;

?>

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



<div class="post-header-info-wrap sec-pad-top">
    <p class="pb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category drawUnderline"><?php echo $topicName; ?></a></p>
    <h1 class="single-post-title"><?php the_title();?></h1>
    <p class="single-post-subheading" role="doc-subtitle"><?php echo get_field('subheading');?></p>
    <p class="author-meta"><span class="bold">By 
        <?php echo the_author_meta('first_name');?>
        <?php echo the_author_meta('last_name');?><?php if (get_the_author_meta('title') !== "") { 
            echo ', </span>'; 
        } else {
            echo '</span>'; 
        }
        ?>

        <?php echo get_the_author_meta('title'); ?>&#32;<span class="author-date-sep">|</span>&#32;
        <span class="post-date"><?php echo get_the_date('F j, Y'); ?></span>
    </p>
</div>
