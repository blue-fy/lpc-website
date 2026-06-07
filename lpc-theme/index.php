<?php get_header(); ?>
<section class="lpc-section bg-white">
  <div class="lpc-section-inner">
    <?php if ( have_posts() ) : ?>
      <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:1.5rem;">
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="news-card">
            <?php if ( has_post_thumbnail() ) the_post_thumbnail('news-featured',['style'=>'width:100%;height:200px;object-fit:cover;border-radius:8px 8px 0 0;margin-bottom:1rem;']); ?>
            <h2 class="news-title"><a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a></h2>
            <p class="news-excerpt"><?php the_excerpt(); ?></p>
            <p class="news-date"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php the_date(); ?></time></p>
          </article>
        <?php endwhile; ?>
      </div>
      <div style="margin-top:2rem;"><?php the_posts_pagination(); ?></div>
    <?php else : ?>
      <p><?php _e('No content found.','lpc'); ?></p>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
