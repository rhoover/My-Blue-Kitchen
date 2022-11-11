<?php
add_shortcode('oils-list', 'oils_list_function');

function oils_list_function() {
  $include_slugs = array( 'anchooil', 'basiloil', 'lemonoil', 'tomatooil' );
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
  $oillinks =  preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="oil-list-count">(\\1)</span></a>', $oillinks);
  return '<section class="oil-list">' . $oillinks . '</section>';
}
?>