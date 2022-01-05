<section class="dyk_block sec-pad-half">
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
                <div class="dyk-wrap">
                   <div class="stars-wrapper">
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/dyk-stars-1.png" data-aos="fade" data-aos-delay="200">
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/dyk-stars-2.png" data-aos="fade" data-aos-delay="380">
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/dyk-stars-3.png" data-aos="fade" data-aos-delay="460">
                   </div>
                    <img src="<?php echo get_stylesheet_directory_uri();?>/img/dyk.png" class="dyk-img">
                    <div class="dyk-content">
                        <?php echo $block_data['did_you_know_content'];?>
                    </div>
                </div>
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