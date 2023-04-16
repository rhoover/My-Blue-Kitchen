<?php 

 // Stuff for any page
function get_post_data() {
  global $post;
  return $post;
}

// Detailed stuff for any page, if it exists
$post_data = get_post_data();

// Very detailed stuff for specific posts
$category = get_the_category();
$categories = get_the_category($post_data->ID);
$author_data = get_userdata($post_data->post_author);
$post_url = get_permalink();
$post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
$site_url = get_site_url();

$global_schema = [
  "@context" => "https://schema.org/",
  "@type" => "Blog",
  "name" => "My Blue Kitchen",
  "image"=> $site_url . "/wp-content/themes/mbk/images/flames-large.jpg",
  "@graph" => array(

    [
      "@type" => "Organization",
      "@id" => $site_url . "/#organization",
      "url" => $site_url,
      "image"=> $site_url . "/wp-content/themes/mbk/images/flames-large.jpg",
      "logo"=> array (
        "@type" => "ImageObject",
        "@id" => $site_url . "/#organizationLogo",
        "url" => $site_url . "/wp-content/uploads/2023/03/android-chrome-512x512-1.png"
      ),
      "address" => array (
        "@type"=> "PostalAddress",
        "@id" => $site_url . "/#organizationAddress",
        "streetAddress"=> "146B Sylvan Woods Drive",
        "addressLocality"=> "Stowe",
        "addressRegion"=> "VT",
        "postalCode"=> "05672",
        "addressCountry"=> "US"
      ),
      "contactPoint" => array(
        "@type" => "ContactPoint",
        "@id" => $site_url . "/#organizationContactPoint",
        "name" => "Jill Vize",
        "telephone" => "+18026969265",
        "email" => "jill@mybluekitchen.cooking",
        "contactType" => "leadership"
      ),
      "sameAs" => [
        "https://www.facebook.com/mybluekitchen",
        "https://mybluestore.cooking",
        "https://www.instagram.com/mybluekitchenvt/"
      ],
      "memberOf" => array(
        "@type" => "Organization",
        "@id" => "https://www.capitalcityfarmersmarket.com/#organization",
        "name" => "Capital City Farmers Market",
        "url" => "https://www.capitalcityfarmersmarket.com/"
      ),
    ], // end Organization

    [
      "@type" => "Website",
      "@id" => $site_url . "/#website",
      "name" => "My Blue Kitchen",
      "url" => $site_url,
      "description" => get_bloginfo("description"),
      "inLanguage" => "en-US",
      "publisher" => array(
        "@type"=> "FoodEstablishment",
        "@id" => $site_url . "/#organization",
        "name"=> "My Blue Kitchen",
        "url"=> $site_url
      ),
      "potentialAction"=> array(
        "@type" => "SearchAction",
        "target" => $site_url . "/?s={search_term}",
        "query-input" => "required name=search_term"
      )
    ], // end Website
  ) // end @graph
]; //end global_schema


if ( is_single() ) {
  $recipe_schema = array(
    "@type" => "Recipe",
    "@id" => $site_url . "/#recipe",
    "url" => $post_url,
    "author" => array(
      "@type" => "Person",
      "@id" => $post_url . "#author",
      "name" => $author_data->display_name
    ),
    "datePublished" => $post_data->post_date,
    "dateModified" => $post_data->post_modified,
    "image" => $post_thumb,
    "about" => get_field("grabber_quote"),
    "RecipeCategory" => array_map( function($category){ return $category->cat_name; }, $categories )
  ); // end $recipe_schema
    array_push($global_schema["@graph"], $recipe_schema);
    $mbkSD = $global_schema;
  } else {
    $mbkSD = $global_schema;
}; // end if

if ( is_search() || is_archive() ) {
  $searchSchema = array(
    "@type" => "SearchResultsPage",
    "name" => "My Blue Kitchen Site-Search Results",
    "Publisher" => "My Blue Kitchen",
    "url" => $site_url . add_query_arg( null, null ),
    "logo" => $site_url . "/wp-content/uploads/2023/03/android-chrome-512x512-1.png",
    "image" => $site_url . "/wp-content/themes/mbk/images/flames-large.jpg"
  ); // end $searchSchema
  array_push($global_schema["@graph"], $searchSchema);
  $mbkSD = $global_schema;
} else {
  $mbkSD = $global_schema;
}; // end if

?>