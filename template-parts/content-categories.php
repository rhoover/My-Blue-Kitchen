<?php
/**
 * Template part for displaying page content in archive.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mbk
 */

?>
<a href="<?php the_permalink(); ?>" class="posts-card" data-post="post-<?php the_ID(); ?>">
  <div class="posts-card-meta">
    <?php the_title('<h3 class="posts-card-title">', '</h3>');?>
    <p class="posts-card-date"><?php the_time('F j, Y'); ?></p>
  </div>

  <?php if (get_field('grabber_quote') ): ?>
    <h3 class="posts-card-excerpt">"<?php echo get_field('grabber_quote'); ?>"</h3>
  <?php endif; ?>
</a>
