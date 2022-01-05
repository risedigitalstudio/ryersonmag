<section class="mobile-header-drawer mobile" id="mobileHeaderDrawer">
   
    <div class="container mobile-header-pad">
        <div class="row">
            <div class="col-8">
                <?php the_custom_logo(); ?>
            </div>
            <div class="col-4">
                <a title="Close" href="#" class="nav-link" aria-current="page" id="mobileDrawerClose">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 9.91304L21.913 0L24 2.08696L14.087 12L24 21.913L21.913 24L12 14.087L2.08696 24L0 21.913L9.91304 12L0 2.08696L2.08696 0L12 9.91304Z" fill="black"/>
                    </svg>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <?php get_search_form();?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ul class="mobile-drawer-cat-list">
                    <li><a href="<?php echo site_url();?>/category/people" class="green">People</a></li>
                    <li><a href="<?php echo site_url();?>/category/campus" class="orange">Campus</a></li>
                    <li><a href="<?php echo site_url();?>/category/research-ideas" class="blue">Research &amp; Ideas</a></li>
                    <li><a href="<?php echo site_url();?>/current-issue/" class="yellow">Magazine</a></li>
                </ul>
            </div>
        </div>
   

    <div class="row">
        <div class="col-md-12">
            <ul class="drawer-footer-social">
                <li>
                    <a href="https://www.facebook.com/ryersonu/" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/mob-drawer-fb.png">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/ryerson_u/" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/mob-drawer-insta.png">
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/RyersonU" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/mob-drawer-twitter.png">
                    </a>
                </li>
                <li>
                    <a href="https://linkedin.com/school/ryerson-university" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/mob-drawer-linkedin.png">
                    </a>
                </li>
                <li>
                    <a href="https://www.tiktok.com/@ryersonu" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/img/mob-drawer-tiktok.png">
                    </a>
                </li>
            </ul>
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-12">
            <div class="mobile-drawer-link-wrapper">
                <div class="half">
                    <ul class="mobile-drawer-links">
	                <li><a href="https://www.ryerson.ca/alumni/" target="_blank">Ryerson Alumni</a></li>
	                <li><a href="#">About Us</a></li>
	                <li><a href="<?php echo site_url();?>/contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="half">
                    <ul class="mobile-drawer-links">
	                <li><a href="#">Privacy Policy</a></li>
	                <li><a href="#">Accessibility</a></li>
                    </ul>
                </div>
            </div>
            <p class="mob-drawer-copy">&copy; 2021 Ryerson University</p>
        </div>
    </div>

    </div>
</section>



