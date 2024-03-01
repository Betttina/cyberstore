

<div class="grey-banner">

</div>


<footer>

    <div class="main-footer">
    <div class="colm-1">
        <div class="logo-white"> <img src="<?php echo get_template_directory_uri(); ?>/resources/images/image%201.png" alt="white-logo"></div>

        <div class="footer-text">
            <p>We are a residential interior design firm located in Portland. Our boutique-studio offers more than</p>
        </div>

    </div>


    <div class="colm-2">
        <h3>Services</h3>

	    <?php
	    $menu = array(
		    'theme_location' => 'footer_service',
		    'menu_id' => 'footer_service',
		    'container' => 'nav-container',
		    'container_class' => "menu"
	    );

	    wp_nav_menu($menu);
	    ?>

    </div>


    <div class="colm-3">
        <h3>Assistance to the buyer</h3>

	    <?php
	    $menu = array(
		    'theme_location' => 'footer_buyer',
		    'menu_id' => 'footer_buyer',
		    'container' => 'nav-container',
		    'container_class' => "menu"
	    );

	    wp_nav_menu($menu);
	    ?>


    </div>
    </div>


    <div class="social-media">
        <div class="social-icons">
		    <?php
		    // get links from theme settings
		    // define variables
		    $twitter_link = get_option('twitter_link');
		    $facebook_link = get_option('facebook_link');
		    $tiktok_link = get_option('tiktok_link');
		    $instagram_link = get_option('instagram_link');

		    // show icons and links if they are set
		    if ($twitter_link) {
			    echo '<a href="' . esc_url($twitter_link) . '" target="_blank"><i class="fab fa-twitter"></i></a>';
		    }
            if ($facebook_link) {
			    echo '<a href="' . esc_url($facebook_link) . '" target="_blank"><i class="fab fa-facebook"></i></a>';
		    }
		    if ($tiktok_link) {
			    echo '<a href="' . esc_url($tiktok_link) . '" target="_blank"><i class="fa-brands fa-tiktok"></i></a>';
		    }
		    if ($instagram_link) {
			    echo '<a href="' . esc_url($instagram_link) . '" target="_blank"><i class="fa-brands fa-instagram"></i></a>';
		    }

		    ?>
        </div>

    </div>


</footer>


<?php wp_footer() ?>
</main>
</body>


