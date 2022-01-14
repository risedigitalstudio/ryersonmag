<?php 
    $rmTopPaddingTxt = $block_data['remove_top_padding'];
    $rmBotPaddingTxt = $block_data['remove_bottom_padding'];
?>   
<section class="reg_text_block sec-pad-half" style="<?php if ($rmTopPaddingTxt) {echo 'padding-top: 0 !important;';} ?> <?php if ($rmBotPaddingTxt) {echo 'padding-bottom: 0 !important;';}?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="post-body">
                    <div class="inset-image <?php if (!$block_data['image_caption']) {echo 'img-margin-bot';} ?> <?php if ($block_data['image_position'] == 'Float Image Right') {echo 'float-img-right';}?>">
                       <?php echo wp_get_attachment_image($block_data['image'], "medium", "", ['class'=>'inset-img']); ;?>
                       <?php if ($block_data['image_caption']) { ?>
                        <figcaption>
                            <?php get_template_part( 'global-templates/caption-arrow' ); ?>
                            <?php echo $block_data['image_caption']; ?>
                        </figcaption>
                        <?php } ?>
                    </div>
                    <?php echo $block_data['content'];?>
                </div>
            </div>
            <div class="col-md-2 offset-md-1">
                <div class="sidebar-citations">
                <?php 
                    if ($block_data['foot_notes'] !== false ) {
                        foreach($block_data['foot_notes'] as $footnote) {
                            ?>
                            <cite class="aside">
                                <span class="num"><?php echo $footnote["number"]; ?></span>
                                <span class="desc"><?php echo $footnote["foot_note"]; ?></span>
                            </cite>
                            <?php
                        } 
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>