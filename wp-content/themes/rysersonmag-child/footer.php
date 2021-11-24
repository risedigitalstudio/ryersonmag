<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>


<section class="main-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ryerson-white.png" class="white-ryerson-logo">
                <p><a href="https://www.ryerson.ca/next-chapter/" target="_blank">Renaming in process</a></p>
                <p>350 Victoria Street,<br>Toronto, ON M5B 2K3<br>P: 416-979-5000</p>
            </div>
            <div class="col-md-2">
                <h2 class="footer-heading">Magazine</h2>
                <ul>
                    <li><a href="#" target="_blank">Update your subscription</a></li>
                    <li><a href="#" target="_blank">Issue archive</a></li>
                    <li><a href="#" target="_blank">Advertising</a></li>
                    <li><a href="#" target="_blank">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-2 offset-md-5">
                <h2 class="footer-heading">Campus News &amp; Events</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <a href="#" target="
                ">ryerson.ca/news-events/events</a></p>
            </div>
            <div class="col-md-1">
                <a href="#" target="_blank" class="give-btn">Give</a>
            </div>
        </div>
    </div>
    
    
    
	
	<div class="container-fluid footer-bottom">
	    <div class="row footer-bottom-inner">
	        <div class="col-md-8">
	            <ul class="drawer-footer-links">
                    <li>
                        &copy; 2021 Ryerson University
                    </li>
	                <li><a href="#">Ryerson Alumni</a></li>
	                <li><a href="#">About Us</a></li>
	                <li><a href="#">Contact Us</a></li>
	                <li><a href="#">Privacy Policy</a></li>
	                <li><a href="#">Accessibility</a></li>
	            </ul>
	        </div>
	        <div class="col-md-4">
	            <ul class="drawer-footer-social">
	                <li>
                        <a href="#">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/img/drawer-social-fb.png">
                        </a>
	                </li>
	                <li>
                        <a href="#">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/img/drawer-social-insta.png">
                        </a>
	                </li>
	                <li>
                        <a href="#">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/img/drawer-social-twitter.png">
                        </a>
	                </li>
	                <li>
                        <a href="#">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/img/drawer-social-linkedin.png">
                        </a>
	                </li>
	                <li>
                        <a href="#">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/img/drawer-social-tiktok.png">
                        </a>
	                </li>
	            </ul>
	        </div>
	    </div>
	</div>
</section>

<?php wp_footer(); ?>

</body>

</html>

