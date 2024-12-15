<?php
/**
 * The Front Page template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mbk
 */

get_header(); ?>
<h2 class="home-list-header">On the stove right now...</h2>
<p class="home-list-tagline">Amazing prose, blue language and a guiding hand.</p>
<section class="posts">
  <?php
    if ( have_posts() ) :

    /* Start the Loop */
    while ( have_posts() ) : the_post();

    	/*
    	 * Include the Post-Format-specific template for the content.
    	 * If you want to override this in a child theme, then include a file
    	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    	 *
    	get_template_part( 'template-parts/content', get_post_format() ); */

    	get_template_part( 'template-parts/content', 'front' );
    endwhile;

    // the_posts_navigation();

    else :

    get_template_part( 'template-parts/content', 'none' );

    endif;
  ?>
</section>

<!-- Big List --> <!-- n.b. that for both lists Wordpress goes first to archive.php for a category page -->
<h2 class="home-list-header">What would you like to make today?</h2>
<p class="home-list-tagline">Battle tested techniques, ingredients and recipes to get you cooking and serving with confidence.</p>

<section class="cat-list-oils">
    <p>Culinary Oils: Uses and Recipes</p>
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
<section class="cat-list" id="recipes">
  <?php
    $exclude_slugs = array( 'musings', 'pantry', 'equipment', 'basiloil', 'lemonoil', 'anchooil', 'tomatooil' );
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

<!-- Small List -->
<h2 class="home-list-header">What's going on here?</h2>
<p class="home-list-tagline">How to get things done without falling into a homicidal rage.</p>
<section class="cat-list">
  <?php
    $include_slugs = array( 'musings', 'pantry', 'equipment' );
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
    $linkss = strip_tags(wp_list_categories($cattArgs), '<a>');
    $linkss =  preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="cat-list-count">(\\1)</span></a>', $linkss);
    echo $linkss;
  ?>
</section>

<?php
get_footer();
