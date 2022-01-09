<?php 
    $rmTopPaddingBtnums = $block_data['remove_top_padding'];
    $rmBotPaddingBtnums = $block_data['remove_bottom_padding'];
?>   
<section class="by_the_nums sec-pad-half" style="<?php if ($rmTopPaddingBtnums) {echo 'padding-top: 0 !important;';} ?> <?php if ($rmBotPaddingBtnums) {echo 'padding-bottom: 0 !important;';}?>">
    <div class="container">
        <div class="row">
           <div class="col-md-2">
           </div>
            <div class="col-md-6 offset-md-1">
                <div class="post-body">
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
               <div class="btnums-wrap">
                 <h3>By the numbers</h3>
                  <p class="btnums-sub"><?php echo $block_data['subheading'];?></p>
                  
                    <?php foreach($block_data['stats'] as $stat) {
                        ?>
                        <p class="btnum-num"><?php echo $stat['number']; ?></p>
                        <div class="btnum-content"><?php echo $stat['stat_content']; ?></div>
                        <?php
                    }?>

               </div>
            </div>
        </div>
    </div>
</section>