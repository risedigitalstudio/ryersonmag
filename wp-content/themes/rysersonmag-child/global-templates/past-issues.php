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
<!--
        <div class="row sec-pad-top">
            <div class="col-md-12 flex">
                <a href="<?php echo site_url();?>/past-issues" class="default-btn">View all</a>
            </div>
        </div>
-->
    </div>
</section>