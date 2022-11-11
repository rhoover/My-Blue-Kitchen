<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mbk
 */

get_header();
?>

<img class="fourohfour-image" sizes="100vw" alt="Badass Burning Flames"
	srcset="<?php echo esc_html( get_template_directory_uri() . '/images/fourohfour-large.jpg' ); ?> 2048w,
					<?php echo esc_html( get_template_directory_uri() . '/images/fourohfour-medium.jpg' ); ?> 1024w,
					<?php echo esc_html( get_template_directory_uri() . '/images/fourohfour-small.jpg' ); ?> 640w"
	src="<?php echo esc_html( get_template_directory_uri() . '/images/fourohfour-large.jpg' ); ?>"
>
<p class="fourohfour-title">Might be your fault, might be mine, but something has clearly gone wrong.</p>
<p class="fourohfour-text">Let's just <a class="fourohfour-link" href="/">start all over</a> again, no hard feelings.</p>

<?php
get_footer();
