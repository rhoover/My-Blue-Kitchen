<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mbk
 */
?>

<a href="<?php the_permalink(); ?>" class="article-card" data-post="post-<?php the_ID(); ?>">
	<div class="article-card-meta">
		<?php the_title('<h2 class="article-card-title">', '</h2>') ?>
		<p class="article-card-category">Posted In: <?php $cat = get_the_category(); echo $cat[0]->cat_name ?></p>
		<p class="article-card-date">Posted On:<?php the_time('F j, Y'); ?></p>
	</div>
  <?php if (get_field('grabber_quote') ): ?>
    <h3 class="article-card-excerpt">"<?php echo get_field('grabber_quote'); ?>"</h3>
  <?php endif; ?>
	<div>
	<!-- <?php 
	if ( has_post_thumbnail() ) {
    the_post_thumbnail();
	}
	?> -->
	</div>

</a>
