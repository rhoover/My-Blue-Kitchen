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
    </section>
    <section class="post-recipe-buttons">
      <div class="print-button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 17H19C20.1046 17 21 16.1046 21 15V11C21 9.89543 20.1046 9 19 9H5C3.89543 9 3 9.89543 3 11V15C3 16.1046 3.89543 17 5 17H7M9 21H15C16.1046 21 17 20.1046 17 19V15C17 13.8954 16.1046 13 15 13H9C7.89543 13 7 13.8954 7 15V19C7 20.1046 7.89543 21 9 21ZM17 9V5C17 3.89543 16.1046 3 15 3H9C7.89543 3 7 3.89543 7 5V9H17Z" stroke="#149595" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <p>Print Recipe</p>
      </div>
      <div class="share-button">
        <svg class="svg-icon" style="width: 24px; height: 24px;vertical-align: middle;fill: #149595";overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M778.24 712.704c-36.864 0-69.632 16.384-90.112 40.96 0 0 0 0 0 0l-360.448-204.8c4.096-12.288 8.192-24.576 8.192-36.864s-4.096-24.576-8.192-36.864l360.448-204.8c0 0 0 0 0 0 20.48 24.576 53.248 40.96 90.112 40.96 65.536 0 114.688-53.248 114.688-114.688S843.776 77.824 778.24 77.824s-114.688 53.248-114.688 114.688c0 12.288 4.096 24.576 8.192 36.864l-360.448 204.8c0 0 0 0 0 0-20.48-24.576-53.248-40.96-90.112-40.96-65.536 0-114.688 53.248-114.688 114.688s53.248 114.688 114.688 114.688c36.864 0 69.632-16.384 90.112-40.96 0 0 0 0 0 0l360.448 204.8c-4.096 12.288-8.192 24.576-8.192 36.864 0 65.536 53.248 114.688 114.688 114.688s114.688-53.248 114.688-114.688S843.776 712.704 778.24 712.704zM778.24 118.784c40.96 0 73.728 32.768 73.728 73.728S819.2 270.336 778.24 270.336c-40.96 0-73.728-32.768-73.728-73.728S737.28 118.784 778.24 118.784zM221.184 585.728c-40.96 0-73.728-32.768-73.728-73.728s32.768-73.728 73.728-73.728c40.96 0 73.728 32.768 73.728 73.728S262.144 585.728 221.184 585.728zM778.24 905.216c-40.96 0-73.728-32.768-73.728-73.728s32.768-73.728 73.728-73.728c40.96 0 73.728 32.768 73.728 73.728S819.2 905.216 778.24 905.216z"  /></svg>
        <p>Share Recipe</p>
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
