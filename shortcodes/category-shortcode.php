<?php
add_shortcode('cat-list', 'category_list_function');

function category_list_function() {
  $exclude_slugs = array( 'musings', 'pantry', 'equipment', 'basiloil', 'anchooil', 'lemonoil' );
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
  return '<section class="cat-list">' . $links . '</section>';
}

?>