<?php
add_shortcode('single-oil-list', 'single_oil_list_function');

function single_oil_list_function() {
  $include_slugs = array( 'culinaryoils' );
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