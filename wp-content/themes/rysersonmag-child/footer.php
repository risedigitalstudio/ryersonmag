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

</main>

<footer>

<section class="main-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
               <a href="https://www.ryerson.ca/">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ryerson-white.png" class="white-ryerson-logo" alt="Ryerson University Logo">
                </a>
                <p><a href="https://www.ryerson.ca/next-chapter/">Renaming in process</a></p>
                <p>350 Victoria Street,<br>Toronto, ON M5B 2K3<br>P: 416-979-5000</p>
            </div>
            <div class="col-md-3">
                <h2 class="footer-heading">Magazine</h2>
                <ul>
                    <li><a href="https://www.ryerson.ca/alumni/news-and-stories/ryerson-magazine/subscribe/">Update your subscription</a></li>
                    <li><a href="<?php echo site_url();?>/current-issue/">Issue archive</a></li>
                    <li><a href="<?php echo site_url();?>/advertising">Advertising</a></li>
                </ul>
            </div>
            <div class="col-lg-2 offset-lg-4 col-md-3 offset-md-2">
                <h2 class="footer-heading">Campus News &amp; Events</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <a href="https://www.ryerson.ca/news-events/">ryerson.ca/news-events/events</a></p>
            </div>
            <div class="col-md-2">
                <a href="https://ryerson.ca/giving/" class="give-btn">Give</a>
            </div>
        </div>
    </div>
    
    
    
	
	<div class="container-fluid footer-bottom">
	    <div class="row footer-bottom-inner">
	        <div class="col-lg-9">
	            <ul class="drawer-footer-links">
                    <li>
                        &copy; 2021 Ryerson University
                    </li>
	                <li><a href="https://www.ryerson.ca/alumni/">Ryerson Alumni</a></li>
	                <li><a href="<?php echo site_url();?>/contact">Contact Us</a></li>
	                <li><a href="#">Privacy Policy</a></li>
	                <li><a href="#">Accessibility</a></li>
	            </ul>
	        </div>
	        <div class="col-lg-3">
                <?php get_template_part( 'global-templates/social-icons' ); ?>
	        </div>
	    </div>
	</div>
</section>



<section class="main-footer-mob">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12 flex-row-between">
            <div class="footer-row-half">
               <a href="https://www.ryerson.ca/">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ryerson-white.png" class="white-ryerson-logo">
                </a>
                <p class="renaming-p"><a href="https://www.ryerson.ca/next-chapter/">Renaming in process</a></p>
            </div>
            <div class="footer-row-half">
                <p class="address">350 Victoria Street,<br>Toronto, ON M5B 2K3<br>P: 416-979-5000</p>
            </div>
        </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                <ul>
                    <li><a href="https://www.ryerson.ca/alumni/news-and-stories/ryerson-magazine/subscribe/">Update your subscription</a></li>
                    <li><a href="<?php echo site_url();?>/current-issue/">Issue archive</a></li>
                    <li><a href="<?php echo site_url();?>/advertising">Advertising</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    
    
	
	<div class="container-fluid footer-bottom">
	    <div class="row footer-bottom-inner">
	        <div class="col-lg-12">
                <?php get_template_part( 'global-templates/social-icons' ); ?>
	        </div>
	        <div class="col-lg-8">
	            <ul class="drawer-footer-links flex-row-between">
                    <div>
                        <li><a href="https://www.ryerson.ca/alumni/">Ryerson Alumni</a></li>
                        <li><a href="<?php echo site_url();?>/contact">Contact Us</a></li>
	                </div>
	                <div>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Accessibility</a></li>
	                </div>
	            </ul>
	        </div>
	        <div class="col-md-12">
	            <p>&copy; 2021 Ryerson University</p>
	        </div>
	    </div>
	</div>
</section>



</footer>



<?php wp_footer(); ?>

</body>

</html>

