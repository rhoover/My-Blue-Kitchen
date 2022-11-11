<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mbk
 */

?>

<!-- <?php the_title( '<h1 class="page-title">', '</h1>' ); ?> -->

	<?php mybluekitchen_post_thumbnail(); ?>

	<?php
	the_content();

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mybluekitchen' ),
		'after'  => '</div>',
	) );
	?>

	<?php if ( get_edit_post_link() ) : ?>
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'mybluekitchen' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
	<?php endif; ?>
