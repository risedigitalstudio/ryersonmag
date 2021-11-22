<section class="header-drawer" id="headerDrawer">

	<div id="wrapper-navbar">
	
		<nav id="main-nav" class="navbar navbar-expand-md navbar-light px-0" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>


			<div class="container-fluid">
            <a href="<?php echo site_url();?>" class="navbar-brand custom-logo-link">
                <img src="<?php echo get_stylesheet_directory_uri();?>/img/drawer-logo.png">
            </a>

            <div id="navbarNavDropdown" class="collapse navbar-collapse">
                <ul id="main-menu" class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a title="Close" href="#" class="nav-link" aria-current="page" id="drawerClose">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 9.91304L21.913 0L24 2.08696L14.087 12L24 21.913L21.913 24L12 14.087L2.08696 24L0 21.913L9.91304 12L0 2.08696L2.08696 0L12 9.91304Z" fill="white"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>	

			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
	
	
	<div class="container-fluid full mt-5">
	    <div class="row full">
	        <div class="col-md-12">
	            <?php get_search_form();?>
	        </div>
	    </div>
	</div>	
	
	
	<div class="container-fluid explore mt-5">
	    <div class="row full">
	        <div class="col-md-12">
	            <h2>Explore</h2>
	        </div>
	    </div>
	    <div class="row full drawer-tags-row">
	        <div class="col-md-3">
	            <?php 
                    $drawerTagsArray = get_field('drawer_tags', 7);
                    foreach($drawerTagsArray as $drawerTag) {
                        ?>
                        <a href="<?php echo site_url();?>/topic/<?php echo $drawerTag->slug; ?>">
                            <?php echo $drawerTag->name; ?>
                        </a>
                        <?php
                    }
                ?>
	        </div>
	        
	    </div>
	</div>
	
	
	<div class="container-fluid drawer-footer">
	    <div class="row full drawer-footer-inner">
	        <div class="col-md-8">
	            <ul class="drawer-footer-links">
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

