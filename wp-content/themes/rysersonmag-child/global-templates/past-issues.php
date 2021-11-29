<section class="past-issues sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="past-issues-heading">
                    <h2 class="dotted-heading">Past Issues</h2>
                    <div class="arrows-inner">
                        <span class="prev">
                            <svg width="14" height="23" viewBox="0 0 14 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6672 0L1.41419 10.253L0.353526 11.3137L-2.73287e-05 11.6673L11.3137 22.981L12.7279 21.5668L2.8284 11.6673L13.0814 1.41421L11.6672 0Z" fill="black"/>
                            </svg>
                       </span>
                        <span class="next">
                            <svg width="14" height="23" viewBox="0 0 14 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.31372 22.981L12.5668 12.7279L13.6274 11.6672L13.981 11.3137L2.66727 -1.2964e-05L1.25306 1.4142L11.1526 11.3137L0.899507 21.5667L2.31372 22.981Z" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row past-issue-slider">
                <?php
                $pastIssueArgs = array (
                    'post_type' => array ('magazine'),
                    'orderby'   => 'menu_order',
                    'orderby' => 'ID',
                    'posts_per_page' => 8
                );

                $pastIssues = new WP_Query($pastIssueArgs);                           
                $counter = 0;
                ?>

                    <?php while ( $pastIssues->have_posts() ) : $pastIssues->the_post();?>

<!--                    <div class="col-md-3">-->
                       <div class="past-issue">
                            <a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail(); ?></a>
                            <h2><?php the_title();?></h2>
                       </div>
<!--                    </div>-->

                    <?php                                      
                    $counter++;        
                    ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
        </div>


    </div>
</section>