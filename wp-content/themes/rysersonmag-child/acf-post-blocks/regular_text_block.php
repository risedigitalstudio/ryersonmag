<section class="reg_text_block sec-pad-half">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
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
            </div>
        </div>
    </div>
</section>