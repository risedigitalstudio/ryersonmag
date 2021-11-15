<section class="intro_block sec-pad-half">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-2">
                <div class="social-share-icons">
                    <?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="post-body intro-block-body">
                    <?php echo $block_data['intro_content'];?>
                </div>
            </div>
            <div class="offset-md-1 col-md-2">
                <div class="related-articles-sec">
                <?php 
                    if ($block_data['related_articles']) {
                        echo "<h3>Related Articles</h3><div class='dotted-line'></div>";
                        foreach($block_data['related_articles'] as $relatedArticle) {
                            ?>
                            <?php
                                $category = get_the_category($relatedArticle);
                                $topics = wp_get_post_terms($relatedArticle, 'topic');
                                $topicName = $topics[0]->name;
                                $topicSlug = $topics[0]->slug;
                            ?>
                            <div class="single-related-article">
                                <p class="mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category"><?php echo $topicName; ?></a></p>
    <!--                            <p><a href="<?php echo get_category_link($category[0]->term_id); ?>"><?php echo $category[0]->cat_name; ?></a></p>-->
                                <h4><a href="<?php echo get_the_permalink($relatedArticle);?>"><?php echo get_the_title($relatedArticle);?></a></h4>
                            </div>
                            <?php
                        } 
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>