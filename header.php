<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mbk
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
		<?php if(is_front_page() || is_home()) {
			echo get_bloginfo('name');
		} else {
			echo get_bloginfo('name');
			echo " | ";
			echo wp_title('');
		}?>
	</title>

	<?php
		echo "<style id=\"critical\">";
		$base_dir = trailingslashit(get_template_directory());
		$cssCriticalVersion = glob($base_dir.'css/critical/style-critical.css');
		$cssCriticalVersionName = basename($cssCriticalVersion[0]);
		$criticalstyles = $base_dir . 'css/critical/' . $cssCriticalVersionName;
		echo file_get_contents($criticalstyles);
		echo "</style>";
	?>
	
  <?php
		if (is_single()) {
			echo "<style id=\"print\">";
			$base_dir = trailingslashit(get_template_directory());
			$cssPrintVersion = glob($base_dir.'css/print/style-print.css');
			$cssPrintVersionName = basename($cssPrintVersion[0]);
	    $printstyles = $base_dir . 'css/print/' . $cssPrintVersionName;
	    echo file_get_contents($printstyles);
			echo "</style>";
		}
  ?>

	<link rel="stylesheet" href="
		<?php
			$base_dir = trailingslashit(get_template_directory());
			$cssVersion = glob($base_dir.'style-*.css');
			$cssVersionName = basename($cssVersion[0]);
			echo esc_url(get_template_directory_uri() ) .'/' . $cssVersionName;
		?>" 
		media="tty" onload="this.media='screen' "
	>


	<meta name="description" <?php
		$post_slug = get_post_field('post_name', get_the_ID());
		if ($post_slug == "france") {
			echo ' content="My Blue Kitchen Presents The Flavors of France, A Pop Up Dinner Event" ';
		} else {
			echo ' content="My Blue Kitchen, Where Confidence Reluctance and Sass Come To A Boil" ';
		};
	?> >
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="application-name" content="My Blue Kitchen">
	<meta name="apple-mobile-web-app-title" content="My Blue Kitchen">
	<meta name='apple-touch-fullscreen' content='yes'>
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="theme-color" content="#149595">

	<!-- Because Microsoft Exists, SAMF's -->
	<meta name="msapplication-TileImage" content="<?php  echo esc_url( get_template_directory_uri() . '/mbk-icns/mstile-150x150.png' ); ?>">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-starturl" content="mybluekitchen.cooking">
	<meta name="msapplication-config" content="/mbk-icns/browserconfig.xml">
	<meta name="msapplication-navbutton-color" content="#149595">

	<!-- Chrome for Android Add To Homescreen -->
	<meta name="mobile-web-app-capable" content="yes">

	<!-- Chrome for Android Tool Bar Color -->
	<meta name="theme-color" content="#56721C">

	<!-- canonical tag on all pages for og -->
	<?php
		if ( is_front_page() ) {
			$accurate_url = get_home_url();
		} else {
			$accurate_url = get_permalink();
		}
	?>

	<!-- Facebook -->
	<meta property="og:url" content="<?php echo $accurate_url ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="
		<?php if(is_front_page() || is_home()) {
			echo get_bloginfo('name');
		} else {
			echo get_bloginfo('name');
			echo " | ";
			echo wp_title('');
		}?>" />
	<meta property="og:image" content="https://mybluekitchen.cooking/images/flames-large.jpg" />
	<meta name="description" <?php
		$og_post_slug = get_post_field('post_name', get_the_ID());
		if ($og_post_slug == "france") {
			echo ' content="My Blue Kitchen Presents The Flavors of France, A Pop Up Dinner Event" ';
		} else {
			echo ' content="My Blue Kitchen, Where Confidence Reluctance and Sass Come To A Boil" ';
		};
	?> >
	<meta property="og:site_name" content="My Blue Kitchen" />
	<meta property="og:locale" content="en_US" />

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="manifest" href="<?php  echo esc_url( get_template_directory_uri() . '/manifest.webmanifest' ); ?>">

	<!-- canonical tag on all pages -->
	<?php
		if ( is_front_page() ) {
			$canonical_url = get_home_url();
		} else {
			$canonical_url = get_permalink();
		}
	?>
	<link rel="canonical" href="<?php echo $canonical_url ?>" >

	<!-- Favicon For Everybody -->
	<link rel="icon"
	  href="<?php  echo esc_url( get_template_directory_uri() . '/mbk-icns/favicon.ico' ); ?>" sizes="16x16">
	<link rel="icon"
	  href="<?php  echo esc_url( get_template_directory_uri() . '/mbk-icns/favicon-16x16.png' ); ?>" sizes="16x16" type="image/png">
	<link rel="icon"
	  href="<?php  echo esc_url( get_template_directory_uri() . '/mbk-icns/favicon-32x32.png' ); ?>" sizes="32x32" type="image/png">
	<link rel="icon"
	  href="<?php  echo esc_url( get_template_directory_uri() . '/mbk-icns/android-chrome-192x192.png' ); ?>" sizes="192x192" type="image/png">
	<link rel="icon"
	  href="<?php  echo esc_url( get_template_directory_uri() . '/mbk-icns/android-chrome-512x512.png' ); ?>" sizes="512x512" type="image/png">
	<link rel="icon"
	  href="<?php  echo esc_url( get_template_directory_uri() . '/mbk-icns/apple-touch-icon.png' ); ?>" sizes="192x192" type="image/png">
	<link rel="mask-icon"
	  href="<?php  echo esc_url( get_template_directory_uri() . '/mbk-icns/safari-pinned-tab.svg' ); ?>" color="#149595">

	<?php
		if (is_page( 'contact' )) {
			if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        wpcf7_enqueue_scripts();
	    }
	    if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
	        wpcf7_enqueue_styles();
	    }
		}
	?>
	



	<?php wp_head(); ?>
</head>

<body>

	<header class="header" role="banner" aria-level="1">
		<section class="header-backbutton">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 634.975 634.975" class="header-arrow"><path d="M283.123 159.09V25.424c.77-6.686-1.065-13.598-6.232-18.743-8.97-8.9-23.52-8.9-32.5 0L18.03 254.89c-4.782 4.758-6.822 11.06-6.504 17.29-.317 6.233 1.722 12.534 6.504 17.293l225.137 246.85c4.17 5.052 10.22 8.476 17.27 8.476 6.414 0 12.147-2.7 16.272-6.98.06-.05.13-.07.2-.14 5.16-5.12 7-12.06 6.23-18.74 0 0 .38-125.67.38-133.4 149.577 0 284.854 107.69 311.71 249.43 18.085-41.568 28.24-87.348 28.24-135.57 0-187.95-152.388-340.318-340.358-340.318zm23.07 181.127c-14.844 0-68.442.385-68.442.385v121.883L64.2 272.18 237.75 81.878v122.586s56.637-.59 68.444-.227c160.048 4.963 271.188 187.22 271.914 272.48-48.907-62.777-177.408-136.5-271.914-136.5z"/></svg>
			<p class="header-back-text">Back</p>
		</section>
		<section class="header-center">
			<svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="header-center-logo"
			 width="32.000000pt" height="32.000000pt" viewBox="0 0 512.000000 512.000000"
			 preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
			fill="#149595" stroke="none"><path d="M2040 4780 c0 -5 4 -11 9 -14 5 -4 30 -54 54 -114 115 -272 131 -472
			56 -697 -65 -194 -160 -329 -479 -681 -317 -348 -445 -520 -549 -737 -97 -202
			-142 -365 -161 -590 -52 -603 274 -1163 843 -1449 55 -27 146 -65 202 -84 157
			-52 413 -102 277 -54 -136 49 -239 116 -334 219 -80 87 -122 158 -161 268 -27
			78 -31 104 -35 226 -19 618 265 1103 922 1575 55 39 101 70 104 68 2 -2 -10
			-44 -26 -93 -63 -188 -74 -342 -35 -468 34 -107 89 -179 287 -377 189 -189
			240 -254 288 -369 45 -109 61 -204 56 -348 -4 -108 -9 -139 -35 -214 -39 -110
			-81 -181 -161 -268 -95 -103 -198 -170 -334 -219 -70 -24 -36 -24 80 0 594
			125 1062 556 1202 1106 54 208 59 471 16 777 -131 925 -694 1733 -1588 2281
			-198 121 -498 275 -498 256z"/></g></svg>
	    <a class="header-center-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</section>
		<section class="header-menu menu-toggle">
				<svg class="icon icon-menu-toggle" aria-hidden="true" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"><g class="svg-menu-toggle"><path class="line line-1" d="M5 13h90v14H5z"/><path class="line line-2" d="M5 43h90v14H5z"/><path class="line line-3" d="M5 73h90v14H5z"/></g></svg>
			<p class="menu-button-text" data-text-swap="Close">Menu</p>
		</section>
	</header>

	<div class="header-magnify">
		<svg xmlns='http://www.w3.org/2000/svg' class="header-magnify-svg" viewBox='0 0 512 512'><path d='M221.09,64A157.09,157.09,0,1,0,378.18,221.09,157.1,157.1,0,0,0,221.09,64Z' /><line x1='338.29' y1='338.29' x2='448' y2='448' /></svg>
	</div>
	
	<!-- renders out .header-search -->
	<div class="header-search">
		<?php 
			if ( function_exists( 'wpes_search_form' ) ) {
				wpes_search_form( array( 
					'wpessid' => 1367 
				) );
			}
		?>
	</div>

  <?php
    //courtesy of:  http://zoerooney.com/blog/tutorials/removing-list-items-wordpress-menus/
    // combine with addition to functions.php
    // first let's get our nav menu using the regular wp_nav_menu() function with special parameters
    // Updated 1/3/17 for WP 4.7
    $cleanermenu = wp_nav_menu( array(
      'theme_location' => 'primary', // we've registered a theme location in functions.php
      'container' => 'nav', // nav element makes more sense for a navigation menu
      'container_class' => 'nav-main',
      'container_id' => '',
      'menu_id' => '', //added by me
      'menu_class' => 'nav-main', //added by me
      'items_wrap' => '%3$s',
      'echo' => false, // don't display it just yet, instead we're storing it in the variable $cleanermenu
    ) );
    // Find the closing bracket of each li and the opening of the link (><a), then all instances of "<li"
    $find = array('><a','<li','<ul>','</ul>');
    // Replace the ><a with nothing (a.k.a. delete) and the "<li" with "<a"
    $replace = array('','<a','','');
    echo str_replace( $find, $replace, $cleanermenu );
  ?>

	<section class="branding">
		<p class="branding-lede"><?php echo get_bloginfo('description', 'display'); ?></p>
		<img class="branding-image"
			sizes="641w, 1025w, 2049w"
			width="2048"
			height="567"
			alt="Badass Burning Flames"
			srcset="<?php echo esc_html( get_template_directory_uri() . '/images/flames-large.jpg' ); ?> 2049w,
							<?php echo esc_html( get_template_directory_uri() . '/images/flames-medium.jpg' ); ?> 1025w,
							<?php echo esc_html( get_template_directory_uri() . '/images/flames-small.jpg' ); ?> 641w"
			src="<?php echo esc_html( get_template_directory_uri() . '/images/flames-large.jpg' ); ?>"
		>
	</section>

	<main class="content <?php if (is_404()) { echo "fourohfour";	}; ?>">
