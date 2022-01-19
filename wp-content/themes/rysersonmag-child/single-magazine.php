<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$thisIssue = get_the_ID();

?>
					
<section class="single-mag sec-pad" id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header>
                   <h1 class="page-title yellow"><?php the_title(); ?></h1>
                </header><!-- .page-header -->
            </div>
        </div>
        <div class="row issue-info-row">
           <div class="col-md-4">
               <?php echo get_the_post_thumbnail(); ?>
           </div>
            <div class="col-md-6">
                <div class="current-issue-info mag-archive-pg-info">
                    <div class="issue-description">
                        <?php echo get_field("issue_description"); ?>
                    </div>
                    <div class="file-link">
                        <?php 
                        $pdfFile = get_field("pdf_file"); 
                        $pdfUrl = $pdfFile['url'];
                        ?>
                        <a href="<?php echo $pdfUrl; ?>" target="_blank" class="downloadPdf drawUnderline">Download PDF</a>
                    </div>
                </div>
                
                <div class="post-tags full">
                    <?php 
                        $tagArray = get_field("tags_in_this_issue");
                        if($tagArray && sizeof($tagArray) > 0) {
                            echo '<span class="read-about-tags-label">Read About</span>';
                            foreach($tagArray as $tagObj) {
                                ?>
                                <a href="<?php echo site_url();?>/tag/<?php echo $tagObj->slug;?>" class="post-tag-link"><?php echo $tagObj->name;?></a>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>

        </div>
        <div class="row">
            
            
                <?php 
                    $issueArticleArray = get_field("all_articles_in_this_issue", $thisIssue);
                    foreach($issueArticleArray as $issueArticle) {
                        ?>
                        <div class="col-md-4">
                            <div class="single-archive-post-wrap">

                               <?php 
                                $taxImgRatio = get_field('taxonomy_image_ratio', $issueArticle); 
                                $taxThumbOptionalID = get_field('taxonomy_thumbnail_optional', $issueArticle);

                                $postColorClass = '';
                                $thePostCat = get_the_category($issueArticle);
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
                               <a href="<?php echo get_the_permalink($issueArticle);?>" class="lead-img-wrap <?php echo $postColorClass;?>" tabindex="-1" aria-hidden="true">
                                   <?php if ($taxImgRatio == 'Horizontal') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-hor');
                                        } else {
                                            echo get_the_post_thumbnail( $issueArticle, 'archive-hor' ); 
                                        }
                                        ?>

                                   <?php } else if ($taxImgRatio == 'Vertical') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-ver');
                                        } else {
                                            echo get_the_post_thumbnail( $issueArticle, 'archive-ver' ); 
                                        }
                                        ?>

                                    <?php }  else if ($taxImgRatio == 'Square') { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $issueArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } else { ?>

                                        <?php 
                                        if ($taxThumbOptionalID) {
                                            echo wp_get_attachment_image($taxThumbOptionalID, 'archive-square');
                                        } else {
                                            echo get_the_post_thumbnail( $issueArticle, 'archive-square' ); 
                                        }
                                        ?>

                                    <?php } ?>
                                    
                                    </a>
                                </span>

                                <?php
                                $term_list = wp_get_post_terms($issueArticle, 'topic', ['fields' => 'all']);
                                foreach($term_list as $term) {
                                   if( get_post_meta($issueArticle, '_yoast_wpseo_primary_topic',true) == $term->term_id ) {
                                     // this is a primary category
                                       $topicName = $term->name;
                                       $topicSlug = $term->slug;
                                   }
                                }
                                ?>
                               
                                <p class="pb-0 mb-0"><a href="<?php echo site_url();?>/topic/<?php echo $topicSlug; ?>" class="primary-category drawUnderline"><?php echo $topicName; ?></a></p>

                                <a href="<?php echo get_the_permalink($issueArticle);?>" class="post-title-subtitle">
                                    <h2 class="entry-title"><?php echo get_the_title($issueArticle); ?></h2>
                                    <?php if (get_field('subheading', $issueArticle)) { ?>
                                        <h3 class="subheading"><?php echo get_field('subheading', $issueArticle);?></h3>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            
        </div>
    </div>
</section>




<section class="mag-pagination sec-pad-xl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 flex-row-pages">
            
<?php
$prev_post = get_previous_post();
if($prev_post) {
   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
   echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="mag-pagination-next ">&nbsp;<svg width="14" height="23" viewBox="0 0 14 23" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.6672 0L1.41419 10.253L0.353526 11.3137L-2.73287e-05 11.6673L11.3137 22.981L12.7279 21.5668L2.8284 11.6673L13.0814 1.41421L11.6672 0Z" fill="black"/>
</svg>
'. $prev_title . '</a>' . "\n";
}

$next_post = get_next_post();
if($next_post) {
   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
   echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="mag-pagination-next ">'. $next_title . '&nbsp;<svg width="14" height="23" viewBox="0 0 14 23" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M2.31372 22.981L12.5668 12.7279L13.6274 11.6672L13.981 11.3137L2.66727 -1.2964e-05L1.25306 1.4142L11.1526 11.3137L0.899507 21.5667L2.31372 22.981Z" fill="black"/>
</svg>
</a>' . "\n";
}
?>



                
                
                
            </div>
        </div>
    </div>
</section>





<?php
get_footer();
