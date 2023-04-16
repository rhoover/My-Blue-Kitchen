<?php 
// https://builtvisible.com/implementing-json-ld-wordpress/

 // Stuff for any page
function get_post_data() {
  global $post;
  return $post;
}

// Stuff for any page, if it exists
$post_data = get_post_data();

// Stuff for specific pages
$category = get_the_category();
$categories = get_the_category($post_data->ID);
$author_data = get_userdata($post_data->post_author);
$post_url = get_permalink();
$post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

// this goes first to estalish context regardless of page/post
$payload["@context"] = "https://schema.org/";

// This appears on every page
$payload["@context"] = "https://schema.org/";
$payload["name"] = [[
  "@type" => "Organization",
  "name" => "My Blue Kitchen",
  "url" => "https://mybluekitchen.cooking/"
]];
$payload["url"] = "https://mybluekitchen.cooking/";
$payload["Publisher"] = [[
  "@type"=> "FoodEstablishment",
  "name"=> "My Blue Kitchen",
  "url"=> "https://mybluekitchen.cooking/",
  "address"=> [[
    "@type"=> "PostalAddress",
    "streetAddress"=> "146B Sylvan Woods Drive",
    "addressLocality"=> "Stowe",
    "addressRegion"=> "VT",
    "postalCode"=> "05672",
    "addressCountry"=> "US"
  ]],
  "contactPoint"=> [[
    "@type" => "ContactPoint",
    "telephone" => "+18026969265",
    "email" => "jill@mybluekitchen.cooking",
    "contactType" => "leadership"
  ]],
  "image"=> "https://mybluekitchen.cooking/wp-content/themes/mbk/images/flames-large.jpg",
  "logo"=> "https://mybluekitchen.cooking/wp-content/uploads/2023/03/android-chrome-512x512-1.png"
]];
$payload["Author"] = [[
  "@type"=> "person",
  "name"=> "Robin Hoover",
  "url"=> "https://moosedog.io",
  "image"=> "https://moosedog.io/mds-images/apple-touch-icon-144x144.png",
  "contactPoint"=> [[
    "@type" => "ContactPoint",
    "telephone"=> "+18026962455",
    "email"=> "robin@moosedog.io",
    "contactType"=> "Web Developer"
    ]]
]];
$payload["sameAs"] = [
  "https://www.facebook.com/mybluekitchen",
  "https://mybluestore.cooking",
  "https://www.instagram.com/mybluekitchenvt/"
];
$payload["potentialAction"] = [[
    "@type" => "SearchAction",
    "target" => "https://mybluekitchen.cooking/?s={search_term}",
    "query-input" => "required name=search_term"
  ]];
// We do all this separately so we keep the right things for organization together
if (is_front_page()) {
  $payload["@type"] = "Website";
};

// This gets the data for both the user who wrote that particular item and the post data
if (is_single()) {
  $payload["@type"] = "Recipe";
  $payload["url"] = $post_url;
  $payload["name"] = $post_data->post_title;
  $payload["Publisher"] = "My Blue Kitchen";
  $payload["author"] = array( "@type" => "Person", "name" => $author_data->display_name, );
  $payload["datePublished"] = $post_data->post_date;
  $payload["dateModified"] = $post_data->post_modified;
  $payload["image"] = $post_thumb;
  $payload["RecipeExcerpt"] = get_field("grabber_quote");
  // $payload["RecipeBody"] = $post_data->post_content;
  $payload["RecipeCategory"] = array_map( function($category){ return $category->cat_name; }, $categories );
  $payload["RecipeIngredient"] = get_field("recipe_ingredients");
  // $payload["RecipeInstructions"] = get_field("recipe_methods");
  // $payload["RecipeNotes"] = get_field("recipe_notes");
};

if ( is_search() || is_archive() ) {
  $payload["@type"] = "SearchResultsPage";
  $payload["name"] = "My Blue Kitchen Site-Search Results";
  $payload["Publisher"] = "My Blue Kitchen";
  $payload['url'] = "https://mybluekitchen.cooking" . add_query_arg( null, null );
  $payload["logo"] = "https://mybluekitchen.cooking/wp-content/uploads/2023/03/android-chrome-512x512-1.png";
  $payload["image"] = esc_html( get_template_directory_uri() . '/images/flames-large.jpg' );
};


?>