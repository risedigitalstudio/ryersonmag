<section class="vertical_image_block sec-pad-half">
   <div class="container">
        <div class="row">
          
             <div class="<?php if ($block_data['flush_with_article']) {echo 'col-md-6 offset-md-3';} else {echo 'col-md-8 offset-md-2';}?>">
            
               
                <?php
                 if ($block_data['flush_with_article']) {
                     echo wp_get_attachment_image($block_data['image'], 'large', "", ['class'=>'full']);
                 } else {
                    echo wp_get_attachment_image($block_data['image'], 'post-body-vertical', "", ['class'=>'full']);
                 }
                ?>
                <?php if ($block_data['image_caption']) { ?>
                <div class="full">
                   <figcaption>
                       <img src="<?php echo get_stylesheet_directory_uri();?>/img/caption-arrow.png" class="caption-arrow" alt="">
                       <?php echo $block_data['image_caption']; ?>
                    </figcaption>
                </div>
                <?php } ?>

            </div>
           </div>
        </div>
</section>