<section class="header-drawer" id="headerDrawer">

	<div id="wrapper-navbar">
	
		<nav id="main-nav" class="navbar navbar-expand-md navbar-light px-0" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label-drawer" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>


			<div class="container-fluid">
            <a href="<?php echo site_url();?>" class="navbar-brand custom-logo-link" id="focusDrawerStart">
                <img src="<?php echo get_stylesheet_directory_uri();?>/img/drawer-logo.png" alt="Logo">
            </a>

            <div id="navbarNavDropdown" class="collapse navbar-collapse">
                <ul id="main-menu" class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button title="Close" class="nav-link" aria-label="close" id="drawerClose" data-toggle="collapse" data-target="#headerDrawer" aria-expanded="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 9.91304L21.913 0L24 2.08696L14.087 12L24 21.913L21.913 24L12 14.087L2.08696 24L0 21.913L9.91304 12L0 2.08696L2.08696 0L12 9.91304Z" fill="white"/>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>	

			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
	
	
	<div class="container-fluid full mt-4">
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
                    $drawerCounter = 0;
                    foreach($drawerTagsArray as $drawerTag) {
                        ?>
                        <div class="full">
                            <a href="<?php echo site_url();?>/topic/<?php echo $drawerTag->slug; ?>" class="drawUnderline">
                                <?php echo $drawerTag->name; ?>
                            </a>
                        </div>
                        <?php
                        $drawerCounter++;
                        if ($drawerCounter % 7 == 0) {echo '</div><div class="col-md-3">';}
                    }
                ?>
	        </div>
	        
	    </div>
	</div>
	
	
	<div class="container-fluid drawer-footer">
	    <div class="row full drawer-footer-inner">
	        <div class="col-md-8">
	            <ul class="drawer-footer-links">
	                <li><a href="https://www.ryerson.ca/alumni/" target="_blank">Ryerson Alumni</a></li>
	                <li><a href="<?php echo site_url();?>/contact">Contact Us</a></li>
	                <li><a href="#">Privacy Policy</a></li>
	                <li><a href="#">Accessibility</a></li>
	            </ul>
	        </div>
	        <div class="col-md-4">
                <?php get_template_part( 'global-templates/social-icons' ); ?>
	        </div>
	    </div>
	</div>
	
</section>


