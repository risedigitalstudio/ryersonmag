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
                            echo wp_get_attachment_image($imgObj['image'], 'post-body-image', "", ['class'=>'full post-body-img']);
                            ?>
                        </div>
                        
                        <?php
                        if ($imgObj['image_caption']) {
                            ?>
                            <div class="full">
                               <figcaption>
                                  <svg class="caption-arrow" width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 2.83338C5 10.2892 11.0442 16.3334 18.5 16.3334" stroke="#585858" stroke-width="1.25"/>
                                    <path d="M1 5.96594L4.36746 1.00004L9.33337 4.3675" stroke="#585858" stroke-width="1.25"/>
                                   </svg>

<!--                                   <img src="<?php echo get_stylesheet_directory_uri();?>/img/caption-arrow.png" class="caption-arrow" alt="">-->
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