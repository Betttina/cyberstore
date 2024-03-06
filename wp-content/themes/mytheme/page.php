<?php /*
function mytheme_hook_action_callback(){
    echo "Nu körs min action-hook!";
}
add_action("mytheme_page_content_loaded", "mytheme_hook_action_callback");

function mytheme_hook_action_callback2(){
    echo "Nu körs min andra action-hook!";
}
add_action("mytheme_page_content_loaded", "mytheme_hook_action_callback2");
*/?>


<?php get_header();?>

<!-- CONTENT -->


<main class="content">
    <?= the_title(); ?>
    <?= the_content(); ?>

    <?php
        do_action("mytheme_page_content_loaded");
    ?>



</main>

<?php get_footer();?>

