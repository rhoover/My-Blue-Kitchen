<?php
/**
 * Template part for displaying posts in front-page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mbk
 */
?>

<a href="<?php the_permalink(); ?>" class="posts-card" data-post="post-<?php the_ID(); ?>">
  <div class="posts-card-meta">
    <?php the_title('<h2 class="posts-card-title">', '</h2>');?>
    <p class="posts-card-category"><?php $cat = get_the_category(); echo $cat[0]->cat_name ?></p>
    <p class="posts-card-date"><?php the_time('F j, Y'); ?></p>
  </div>
  <?php if (get_field('grabber_quote') ): ?>
    <h3 class="posts-card-excerpt">"<?php echo get_field('grabber_quote'); ?>"</h3>
  <?php endif; ?>

</a>
