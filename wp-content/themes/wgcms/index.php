<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Girlie
 */

get_header(); 
?>
    <div id="menu">
        <?php wp_nav_menu( array('theme_location' => 'primary')); ?>
    </div><!-- nav -->

<?php get_footer(); ?>