<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
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


<?php /* ?>
<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
					understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php */ ?>

<?php
get_footer();
