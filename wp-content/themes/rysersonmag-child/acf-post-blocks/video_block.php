<section class="video_block sec-pad-half">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="video">
                    <div class="videoWrapper">
                        <?php echo $block_data['youtube_embed_code'];?>
                    </div>
                </div>
                <?php if ($block_data['video_credit']) {
                    ?>
                   <figcaption>
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/caption-arrow.png" class="caption-arrow">
                       <?php echo $block_data['video_credit']; ?>
                    </figcaption>
                <?php } ?>
            </div>
        </div>
    </div>
</section>