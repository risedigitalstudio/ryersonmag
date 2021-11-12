<section class="reg_text_block sec-pad-half">
    <div class="container">
        <div class="row">
           <div class="col-md-2">
               <div class="watn-wrap">
                 <h3>Where are <br>they now?</h3>
                  <p class="watn-sub"><?php echo $block_data['watn_-_subhead'];?></p>
                  
                  <span class="watn-arrow">
                        <svg width="12" height="27" viewBox="0 0 12 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.46967 26.5303C5.76256 26.8232 6.23744 26.8232 6.53033 26.5303L11.3033 21.7574C11.5962 21.4645 11.5962 20.9896 11.3033 20.6967C11.0104 20.4038 10.5355 20.4038 10.2426 20.6967L6 24.9393L1.75736 20.6967C1.46447 20.4038 0.989593 20.4038 0.696699 20.6967C0.403806 20.9896 0.403806 21.4645 0.696699 21.7574L5.46967 26.5303ZM5.25 0V26H6.75V0H5.25Z" fill="#004C9B"/>
                        </svg>
                  </span>
                    
                  <?php $imgID = $block_data['watn_-_photo']; ?>
                  <?php echo wp_get_attachment_image($imgID, 'small-square', "", ['class'=>'watn-img']);?>
                  <p class="name-class">
                      <span><?php echo $block_data['watn_-_name_and_grad_class'];?></span>
                      <?php echo $block_data['watn_-_sub_name_and_grad_class'];?>
                  </p>
                   <span class="watn-sep">
                        <svg width="31" height="3" viewBox="0 0 31 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 1.5H30.5" stroke="#004C9B" stroke-width="1.5"/>
                        </svg>
                    </span>
                  <p class="watn-bottom">
                      <span><?php echo $block_data['watn_-_bottom_header'];?></span>
                      <?php echo $block_data['watn_-_bottom_content'];?>
                  </p>
               </div>
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
            </div>
        </div>
    </div>
</section>