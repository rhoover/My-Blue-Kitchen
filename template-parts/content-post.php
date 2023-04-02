<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mbk
 */

?>

<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

<?php if (has_post_thumbnail()) {
  the_post_thumbnail();
}?>


<!-- <article class="post-article" id="post-<?php the_ID(); ?>"> -->

	<?php
    the_content();
  ?>
  <?php if ( !in_category( array('musings', 'equipment', 'pantry') ) ): ?>
    <section class="post-recipe"><!-- .post-recipe -->
      <h2 class="post-recipe-desc post-recipe-desc-one">The Stuff You Need:</h2>
      <div class="post-recipe-stuff">
        <?php
          the_field('recipe_ingredients');
        ?>
      </div>
      <h2 class="post-recipe-desc post-recipe-desc-two">How To Do This:</h2>
      <div class="post-recipe-steps">
        <?php
          the_field('recipe_methods');
        ?>
      </div>
      <?php if (get_field('recipe_notes') ): ?>
        <h2 class="post-recipe-desc">Notes:</h2>
      <?php endif; ?>
      <div class="post-recipe-notes">
        <?php if (get_field('recipe_notes') ): ?>
          <p><?php echo get_field('recipe_notes'); ?></p>
        <?php endif; ?>
      </div>
      <div class="post-recipe-buttons">
        <div class="print-button">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 17H19C20.1046 17 21 16.1046 21 15V11C21 9.89543 20.1046 9 19 9H5C3.89543 9 3 9.89543 3 11V15C3 16.1046 3.89543 17 5 17H7M9 21H15C16.1046 21 17 20.1046 17 19V15C17 13.8954 16.1046 13 15 13H9C7.89543 13 7 13.8954 7 15V19C7 20.1046 7.89543 21 9 21ZM17 9V5C17 3.89543 16.1046 3 15 3H9C7.89543 3 7 3.89543 7 5V9H17Z" stroke="#149595" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <p>Print Recipe</p>
        </div>
        <div class="share-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke-width="1.5" class="footer-share-button-svg"><path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M18 22a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-14a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path stroke="#000" d="m15.5 6.5-7 4m0 3 7 4"/></svg>
          <p>Share Recipe</p>
        </div>
      </div>
    </section>
    <?php if (get_field('post_addendum') ): ?>
      <section class="post-addendum"><!-- .post-addendum -->
        <h2 class="post-addendum-header">Final Thoughts:</h2>
        <p><?php echo get_field('post_addendum'); ?></p>
      </section>
    <?php endif; ?>
  <?php endif; ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'jillevizev1' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

  <h3 class="cat-list-header">Be Inspired By, Explore, or Scroll Past My Other Recipes</h3>
  <section class="cat-list-oils">
    <p>Culinary Oils Uses and Recipes</p>
    <?php   $include_slugs = array( 'anchooil', 'basiloil', 'lemonoil', 'tomatooil' );
    $include_ids = array();
    foreach( $include_slugs as $slug ) {
        $tmp_term = get_term_by( 'slug', $slug, 'category' );

      if( is_object( $tmp_term ) ) {
          $include_ids[] = $tmp_term->term_id;
      }
    }
    $cattArgs = array(
      'hide_empty' => 0,
      'title_li' => '',
      'separator' => '',
      'show_count' => 1,
      'include' => $include_ids,
      'echo' => 0
    );
    $oillinks = strip_tags(wp_list_categories($cattArgs), '<a>');
    $oillinks =  preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="cat-list-oils-count">(\\1)</span></a>', $oillinks);
    echo $oillinks;
    ?>
    </section>
  <section class="cat-list-post">
    <p>All My Recipe Categories</p>
    <?php
      $exclude_slugs = array( 'musings', 'pantry', 'equipment' );
      $exclude_ids = array();
      foreach( $exclude_slugs as $slug ) {
          $tmp_term = get_term_by( 'slug', $slug, 'category' );

        if( is_object( $tmp_term ) ) {
            $exclude_ids[] = $tmp_term->term_id;
        }
      }
      $catArgs = array(
        'hide_empty' => 0,
        'title_li' => '',
        'separator' => '',
        'show_count' => 1,
        'exclude' => $exclude_ids,
        'echo' => 0
      );
      $links = strip_tags(wp_list_categories($catArgs), '<a>');
      $links =  preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="cat-list-count">(\\1)</span></a>', $links);
      echo $links;
    ?>
  </section>
<!-- </article> -->
<!-- .post-article -->
