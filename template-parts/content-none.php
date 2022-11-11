<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mbk
 */

?>

<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'mybluekitchen' ); ?></h1>
<?php
if ( is_home() && current_user_can( 'publish_posts' ) ) :

	printf(
		'<p>' . wp_kses(
			/* translators: 1: link to WP admin new post page. */
			__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mybluekitchen' ),
			array(
				'a' => array(
					'href' => array(),
				),
			)
		) . '</p>',
		esc_url( admin_url( 'post-new.php' ) )
	);

elseif ( is_search() ) :
	?>

	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mybluekitchen' ); ?></p>
	<?php
	get_search_form();

else :
	?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mybluekitchen' ); ?></p>
	<?php
	get_search_form();

endif;
?>
<p class="search-nothing-help">If you're really not finding anything useful, sorry about that. Please don't hesitate to drop me a question, I'd be delighted to help:</p>

<?php echo do_shortcode('[contact-form-7 id="886" title="Contact form 1"]'); ?>