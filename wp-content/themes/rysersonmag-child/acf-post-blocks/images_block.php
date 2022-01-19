<section class="image_block sec-pad-half">
   <?php if($block_data['size'] == "Large") {echo '<div class="container-fluid">';} else {echo '<div class="container">';}?>
        <div class="row">
          
          <?php if (sizeof($block_data['images']) == 1) { echo '<div class="col-md-8 offset-md-2">'; }?>
            
                <?php 
                
//                    var_dump($block_data['images']); 
                    $counter = 0;
                    foreach($block_data['images'] as $imgObj) {
                        if ($counter == 0) {$offset = "offset-md-2";} else {$offset = "";}
                        if (sizeof($block_data['images']) == 2) { echo '<div class="col-md-4 '.$offset.'">'; }
                        ?>
                        <div class="full">
                            <?php
                            if ($imgObj['variable_height']) {
                                echo wp_get_attachment_image($imgObj['image'], 'large', "", ['class'=>'full post-body-img']);
                            }else {
                                echo wp_get_attachment_image($imgObj['image'], 'post-body-image', "", ['class'=>'full post-body-img']);
                            }
                            ?>
                        </div>
                        
                        <?php
                        if ($imgObj['image_caption']) {
                            ?>
                            <div class="full">
                               <figcaption>    
                                    <?php get_template_part( 'global-templates/caption-arrow' ); ?>
                                   <?php echo $imgObj['image_caption']; ?>
                                </figcaption>
                            </div>
                            <?php
                        if (sizeof($block_data['images']) == 2) { echo '</div>'; }
                        }
                        $counter++;
                    }
                
                ?>
                
                <?php if (sizeof($block_data['images']) == 1) { echo '</div>'; }?>

            </div>
            
        </div>
    </div>
</section>