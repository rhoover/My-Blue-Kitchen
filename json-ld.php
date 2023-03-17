<?php 
// https://builtvisible.com/implementing-json-ld-wordpress/
// JSON-LD for WordPress Home Articles and Author Pages
 // Stuff for any page
function get_post_data() {
  global $post;
  return $post;
}

// This has all the data of the post/page etc, is on every page/post
$payload["@context"] = "http://schema.org/";
$payload["@type"] = "FoodEstablishment";
$payload["name"] = "My Blue Kitchen";
$payload["Publisher"] = "My Blue Kitchen";
$payload["url"] = "http://mybluekitchen.cooking/";
$payload["logo"] = "https://mybluekitchen.cooking/wp-content/uploads/2023/03/android-chrome-512x512-1.png";
$payload["image"] = esc_html( get_template_directory_uri() . '/images/flames-large.jpg' );
$payload["address"] = [[
  "@type"=> "PostalAddress",
  "streetAddress"=> "146B Sylvan Woods Drive",
  "addressLocality"=> "Stowe",
  "addressRegion"=> "VT",
  "postalCode"=> "05672",
  "addressCountry"=> "US"]];
$payload["contactPoint"] = [
  [
    "@type" => "ContactPoint",
    "telephone" => "+18026969265",
    "email" => "jill@mybluekitchen.cooking",
    "contactType" => "leadership"
  ]
];
$payload["sameAs"] = [
  "https://www.facebook.com/mybluekitchen",
  "https://mybluestore.cooking",
  "https://www.instagram.com/mybluekitchenvt/"
];
$payload["potentialAction"] = [
  [
    "@type" => "SearchAction",
    "target" => "https://mybluekitchen.cooking/?s={search_term}",
    "query-input" => "required name=search_term"
  ]
];

// Stuff for any page, if it exists
$post_data = get_post_data();

// Stuff for specific pages
$category = get_the_category();
$categories = get_the_category($post_data->ID);

// We do all this separately so we keep the right things for organization together
// if (is_front_page()) {
//   $payload["@type"] = "Website";
//   $payload["name"] = "My Blue Kitchen";
//   $payload["Publisher"] = "My Blue Kitchen";
// };

// This gets the data for both the user who wrote that particular item and the post data
if (is_single()) {
  $author_data = get_userdata($post_data->post_author);
  $post_url = get_permalink();
  $post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

  $payload["@type"] = "Recipe";
  $payload["url"] = $post_url;
  $payload["name"] = $post_data->post_title;
  $payload["Publisher"] = "My Blue Kitchen";
  $payload["author"] = array( "@type" => "Person", "name" => $author_data->display_name, );
  $payload["logo"] = "https://mybluekitchen.cooking/wp-content/uploads/2023/03/android-chrome-512x512-1.png";
  $payload["datePublished"] = $post_data->post_date;
  $payload["dateModified"] = $post_data->post_modified;
  $payload["image"] = $post_thumb;
  $payload["RecipeExcerpt"] = get_field("grabber_quote");
  $payload["RecipeBody"] = $post_data->post_content;
  $payload["RecipeCategories"] = array_map( function($category){ return $category->cat_name; }, $categories );
  $payload["RecipeIngredients"] = get_field("recipe_ingredients");
  $payload["RecipeInstructions"] = get_field("recipe_methods");
  $payload["RecipeNotes"] = get_field("recipe_notes");
};

if ( is_search() || is_archive() ) {
  $payload["@type"] = "SearchResultsPage";
  $payload["name"] = "My Blue Kitchen";
  $payload["Publisher"] = "My Blue Kitchen";
  $payload["logo"] = "https://mybluekitchen.cooking/wp-content/uploads/2023/03/android-chrome-512x512-1.png";
  $payload["image"] = esc_html( get_template_directory_uri() . '/images/flames-large.jpg' );
};

?>