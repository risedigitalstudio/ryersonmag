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
                    $editorsPicksOn = $block_data['show_editors_picks'];
                    $editorsPicksArray = get_field('editors_picks', 7);

                    if ($editorsPicksOn) {

                            echo "<h3>Editor's Picks</h3><div class='dotted-line'></div>";
                            foreach(array_slice($editorsPicksArray, 0, 3)  as $editorsPick) {
                                
                                $postColorClass = '';
                                $thePostCat = get_the_category($editorsPick);
                                $thePostCatSlug = $thePostCat[0]->slug;
                                if ($thePostCatSlug == 'people') {
                                    $postColorClass = 'green';
                                } else if ($thePostCatSlug == 'research-ideas') {
                                    $postColorClass = 'blue';
                                } else if ($thePostCatSlug == 'campus') { 
                                    $postColorClass = 'orange';
                                }
                               
                                ?>
                                <?php
                                    $category = get_the_category($editorsPick);
                                    $topics = wp_get_post_terms($editorsPick, 'topic');
                                    $topicName = $topics[0]->name;
                                    $topicSlug = $topics[0]->slug;
                                ?>
                                <div class="single-related-article">
                                   <a href="<?php echo get_the_permalink($editorsPick);?>" class="<?php echo $postColorClass; ?>">
                                        <p class="mb-0 primary-category"><?php echo $topicName; ?></p>
                                        <h4><?php echo get_the_title($editorsPick);?></h4>
                                    </a>
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