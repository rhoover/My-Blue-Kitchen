<?php

 // Stuff for any page
function get_post_data() {
  global $post;
  return $post;
};

// Detailed stuff for any page, if it exists
$post_data = get_post_data();

$site_url = site_url();

// Check if we are on the frontpage as wp_title() will return blank if we are
$is_front_page = is_front_page();

// Site name, set in Settings - General
$site_name = get_bloginfo('name');

// Page Title. Use $site_name for frontpage
$site_title = $is_front_page ? $site_name : wp_title('&raquo;', FALSE);

// Site description, set in Settings - General
$site_description = get_bloginfo('description');

$post_url = get_permalink();
$post_type = get_post_type();
$post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post_data->ID));
$category = get_the_category();
$categories = get_the_category($post_data->ID);

$global_schema = [

  '@context' => 'https://schema.org',

  '@graph' => [
    
    [
      "@type" => "Website",
      "@id" => $site_url . "/#website",
      "name" => "My Blue Kitchen",
      "description" => get_bloginfo("description"),
      "url" => $site_url,
      "inLanguage" => "en-US",
      "image"=> $site_url . "/wp-content/themes/mbk/images/flames-large.jpg",
      "sameAs" => [
        "https://www.facebook.com/mybluekitchen",
        "https://mybluestore.cooking",
        "https://www.instagram.com/mybluekitchenvt/"
      ],
      "publisher" => [
        "@type" => "FoodEstablishment",
        "@id" => $site_url . "/#publisher",
        "name"=> "My Blue Kitchen",
        "url"=> $site_url
      ],
      "creator" => [
        "@type" => "Organization",
        "@id" => "www.moosedog.io" . "/#publisher",
        "legalName" => "MooseDog Studios",
        "location" => "Stowe, VT",
        "logo" => "www.moosedog.io/img/moosedog-logo.png",
        "telephone" => "+18026962455"
      ]
    ], // end @Website

    [
      "@type" => "Organization",
      "@id" => $site_url . "/#organization",
      "url" => $site_url,
      "image"=> $site_url . "/wp-content/themes/mbk/images/flames-large.jpg",
      "telephone" => "+18026969265",
      "logo" => $site_url . "/wp-content/uploads/2023/03/android-chrome-512x512-1.png"
      ], // end @Organization

      [
        "@type" => "PostalAddress",
        "@id" => $site_url . "/#postaladdress",
        "streetAddress"=> "146B Sylvan Woods Drive",
        "addressLocality"=> "Stowe",
        "addressRegion"=> "VT",
        "postalCode"=> "05672",
        "addressCountry"=> "US"
      ], // end @PostalAddress

      [
        "@type" => "ContactPoint",
        "@id" => $site_url . "/#organizationcontactpoint",
        "name" => "Jill Vize",
        "telephone" => "+18026969265",
        "email" => "jill@mybluekitchen.cooking",
        "contactType" => "leadership"
        ] // end @ContactPoint
      ] // end graph
]; // end global_schema

// for recipe posts, not pages
if ( is_single() ) {
  $recipe_schema = array(
    "@type" => "Recipe",
    "@id" => $site_url . "/#recipe",
    "url" => $post_url,
    "datePublished" => $post_data->post_date,
    "dateModified" => $post_data->post_modified,
    "image" => $post_thumb,
    "about" => get_field("grabber_quote"),
    "RecipeCategory" => array_map( function($category){ return $category->cat_name; }, $categories )
  );
  array_push($global_schema["@graph"], $recipe_schema);
}; // end if recipe/post

if ($post_type == 'page') {
  $page_schema = array(
    "@type" => "Webpage",
    "@id" => $site_url . "/#webpage",
    "url" => $post_url,
    "datePublished" => $post_data->post_date,
    "dateModified" => $post_data->post_modified,
  );
  array_push($global_schema["@graph"], $page_schema);
};


?>

<!-- injected into head element by functions.php -->
<script type="application/ld+json"><?php echo json_encode($global_schema); ?></script>