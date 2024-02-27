<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>
<body>
    <?php wp_body_open(); ?>

<main>

    <header>

        <div class="primary_menu">
		    <?php
		    $menu= array(
			    'theme_location' => 'primary_menu',
			    'menu_id' => 'primary_menu',
			    'container' => 'nav',
			    'container_class' => 'menu'
		    );

		    wp_nav_menu($menu);
		    ?>
        </div>

        <div class="secondary_menu">
		    <?php
		    $menu= array(
			    'theme_location' => 'secondary_menu',
			    'menu_id' => 'secondary_menu',
			    'container' => 'nav',
			    'container_class' => 'menu'
		    );

		    wp_nav_menu($menu);
		    ?>




        </div>


    </header>

    <div class="hero2">

    </div>



