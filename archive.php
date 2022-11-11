<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mbk
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

		<?php
			the_archive_title( '<h2 class="categories-title">', '</h2>' );
		?>

<section class="category-items">
	<?php

	/* Start the Loop */
	while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
     * get_template_part( 'template-parts/content', get_post_format() );
		 */

		get_template_part( 'template-parts/content', 'categories' );

	endwhile;

	the_posts_navigation();

else :

	// if (is_category( 'culinaryoils' )) { echo '<p>hello oils</p>';}
	get_template_part( 'template-parts/content', 'none' );

endif; ?>
</section>

<?php
get_footer();
