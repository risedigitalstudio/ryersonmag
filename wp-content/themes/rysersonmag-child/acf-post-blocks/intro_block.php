<?php 
//    $rmTopPaddingIntro = $block_data['remove_top_padding'];
    $rmBotPaddingIntro = $block_data['remove_bottom_padding'];
?>              
<section class="intro_block sec-pad-half" style="<?php if ($rmBotPaddingIntro) {echo 'padding-bottom: 0 !important;';}?>">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-2">
                <div class="social-share-icons">
                    <?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="post-body intro-block-body <?php if($block_data['drop_cap']) {echo 'intro-block-body-drop-cap';}?>">
                    <?php echo $block_data['intro_content'];?>
                </div>
            </div>
            <div class="offset-md-1 col-md-2">
                <div class="related-articles-sec">
                
                <?php 
                    $editorsPicksOn = $block_data['show_editors_picks'];
                    $editorsPicksArray = get_field('editors_picks', 7);

                    if ($editorsPicksOn) {

                            echo "<h2>Editors&rsquo; Picks</h2><div class='dotted-line'></div>";
                        
                            ?><ul class="editors-picks-list"><?php
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
//                                    $topics = wp_get_post_terms($editorsPick, 'topic');
//                                    $topicName = $topics[0]->name;
//                                    $topicSlug = $topics[0]->slug;
                                ?>
                                
                                <?php
                                $term_list = wp_get_post_terms($editorsPick, 'topic', ['fields' => 'all']);
                                foreach($term_list as $term) {
                                   if( get_post_meta($editorsPick, '_yoast_wpseo_primary_topic',true) == $term->term_id ) {
                                     // this is a primary category
                                       $topicName = $term->name;
                                       $topicSlug = $term->slug;
                                   }
                                }
                                ?>
                                
                                
                                <li class="single-related-article">
                                   <a href="<?php echo get_the_permalink($editorsPick);?>" class="<?php echo $postColorClass; ?>">
                                        <p class="mb-0 primary-category"><?php echo $topicName; ?></p>
                                        <p class="editors-pick-title"><?php echo get_the_title($editorsPick);?></p>
                                    </a>
                                </li>
                                <?php
                            } 
                        ?></ul><?php

                    }
                ?>

                </div>
            </div>
        </div>
    </div>
</section>