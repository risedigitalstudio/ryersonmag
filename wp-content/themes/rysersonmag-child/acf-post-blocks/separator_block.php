<?php 
    $rmTopPaddingBtnums = $block_data['remove_top_padding'];
    $rmBotPaddingBtnums = $block_data['remove_bottom_padding'];
?>   
   
<section class="separator_block sec-pad-half" style="<?php if ($rmTopPaddingBtnums) {echo 'padding-top: 0 !important;';} ?> <?php if ($rmBotPaddingBtnums) {echo 'padding-bottom: 0 !important;';}?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <hr class="separator_block-sep">
            </div>
        </div>
    </div>
</section>