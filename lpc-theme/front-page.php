<?php
/**
 * Front page template — LPC Homepage
 * Header (with hero) is handled in header.php
 */
get_header();
?>

<!-- ======================================================
     SERMONS SECTION
     Auto-fed from YouTube via Feeds for YouTube plugin
     Falls back to Sermon CPT if plugin not active
     ====================================================== -->
<div class="lpc-wave bg-cream" aria-hidden="true">
  <svg viewBox="0 0 1440 48" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 48 Q720 0 1440 48 L1440 48 Z" fill="#ffffff"/>
  </svg>
</div>

<section class="lpc-section bg-white" id="sermons" aria-labelledby="sermons-heading">
  <div class="lpc-section-inner">

    <div class="lpc-section-header-flex">
      <div>
        <span class="lpc-eyebrow"><?php _e('Latest from YouTube','lpc'); ?></span>
        <h2 id="sermons-heading"><?php _e('Recent Sermons','lpc'); ?></h2>
        <hr class="lpc-section-divider">
      </div>
      <a href="<?php echo esc_url(get_post_type_archive_link('sermon')); ?>" class="lpc-view-all">
        <?php _e('View all sermons','lpc'); ?>
        <i class="ti ti-arrow-right" aria-hidden="true"></i>
      </a>
    </div>

    <?php
    // Check if Feeds for YouTube plugin is active
    if ( function_exists('yt_feed_display') || shortcode_exists('youtube-feed') ) :
    ?>
      <!-- YouTube RSS feed plugin shortcode — configure channel in plugin settings -->
      <div class="sermons-grid yt-feed-wrapper">
        <?php echo do_shortcode('[youtube-feed type="channel" num=3 cols=3]'); ?>
      </div>

    <?php else :
      // Fallback: pull from Sermon CPT
      $sermons = lpc_get_sermons(3);
      if ( $sermons->have_posts() ) : ?>
        <div class="sermons-grid">
          <?php while ( $sermons->have_posts() ) : $sermons->the_post();
            $yt_url   = get_post_meta( get_the_ID(), '_lpc_youtube_url',  true );
            $date     = get_post_meta( get_the_ID(), '_lpc_sermon_date',  true );
            $pastor   = get_post_meta( get_the_ID(), '_lpc_pastor_name',  true );
            $language = get_post_meta( get_the_ID(), '_lpc_language',     true );
            $thumb    = $yt_url ? lpc_youtube_thumb($yt_url) : '';
            $embed    = $yt_url ? lpc_youtube_embed_url($yt_url) : '';
            $display_date = $date ? date('j M Y', strtotime($date)) : get_the_date('j M Y');
          ?>
          <article class="sermon-card" itemscope itemtype="https://schema.org/VideoObject">
            <div class="sermon-thumb">
              <?php if ( $thumb ) : ?>
                <img src="<?php echo esc_url($thumb); ?>"
                     alt="<?php printf(__('Thumbnail for %s','lpc'), get_the_title()); ?>"
                     loading="lazy"
                     itemprop="thumbnailUrl">
                <div class="sermon-thumb-overlay" aria-hidden="true"></div>
              <?php elseif ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('sermon-thumb', ['alt' => get_the_title(), 'itemprop' => 'thumbnailUrl']); ?>
                <div class="sermon-thumb-overlay" aria-hidden="true"></div>
              <?php endif; ?>

              <?php if ( $yt_url ) : ?>
                <a href="<?php echo esc_url($yt_url); ?>"
                   class="sermon-play"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="<?php printf(__('Watch: %s on YouTube','lpc'), get_the_title()); ?>"
                   itemprop="url">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor" aria-hidden="true">
                    <path d="M6 4l8 5-8 5V4z"/>
                  </svg>
                </a>
              <?php else : ?>
                <a href="<?php the_permalink(); ?>" class="sermon-play" aria-label="<?php printf(__('Listen: %s','lpc'), get_the_title()); ?>">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor" aria-hidden="true">
                    <path d="M6 4l8 5-8 5V4z"/>
                  </svg>
                </a>
              <?php endif; ?>
            </div>

            <div class="sermon-info">
              <p class="sermon-meta" aria-label="<?php _e('Sermon details','lpc'); ?>">
                <?php echo esc_html($display_date); ?>
                <?php if ($language) echo ' · ' . esc_html($language); ?>
              </p>
              <h3 class="sermon-title" itemprop="name">
                <a href="<?php echo esc_url($yt_url ?: get_permalink()); ?>"
                   <?php echo $yt_url ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>
                   style="color:inherit;text-decoration:none;">
                  <?php the_title(); ?>
                </a>
              </h3>
              <?php if ($pastor) : ?>
                <p class="sermon-pastor" itemprop="author"><?php echo esc_html($pastor); ?></p>
              <?php endif; ?>
            </div>
          </article>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

      <?php else : ?>
        <p style="color:var(--lpc-text-secondary);">
          <?php _e('Sermons coming soon. Subscribe to our','lpc'); ?>
          <a href="<?php echo esc_url(lpc_get('lpc_youtube','#')); ?>" target="_blank" rel="noopener noreferrer">
            <?php _e('YouTube channel','lpc'); ?>
          </a>
          <?php _e('to be notified of new messages.','lpc'); ?>
        </p>
      <?php endif;
    endif; ?>

  </div>
</section>


<!-- ======================================================
     NEWS & ANNOUNCEMENTS
     Pulled from standard WP Posts
     ====================================================== -->
<div class="lpc-wave bg-parchment" aria-hidden="true">
  <svg viewBox="0 0 1440 48" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0 Q360 48 720 20 Q1080 -8 1440 38 L1440 0 Z" fill="#ffffff"/>
  </svg>
</div>

<section class="lpc-section bg-parchment" id="news" aria-labelledby="news-heading">
  <div class="lpc-section-inner">

    <div class="lpc-section-header-flex">
      <div>
        <span class="lpc-eyebrow"><?php _e('News & Announcements','lpc'); ?></span>
        <h2 id="news-heading"><?php _e('What\'s Happening at LPC','lpc'); ?></h2>
        <hr class="lpc-section-divider">
      </div>
      <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="lpc-view-all">
        <?php _e('All news','lpc'); ?>
        <i class="ti ti-arrow-right" aria-hidden="true"></i>
      </a>
    </div>

    <?php
    $news = new WP_Query([
      'post_type'      => 'post',
      'posts_per_page' => 3,
      'orderby'        => 'date',
      'order'          => 'DESC',
    ]);

    if ( $news->have_posts() ) :
      $count = 0;
    ?>
    <div class="news-grid">
      <div class="news-featured-col">
      <?php while ( $news->have_posts() ) : $news->the_post();
        $count++;
        $cats = get_the_category();
        $cat_name = $cats ? $cats[0]->name : __('Announcement','lpc');

        // Tag colour class
        $tag_class = 'tag-gold';
        if ( has_category('youth') || has_category('Young People') ) $tag_class = 'tag-lavender';
        if ( has_category('community') || has_category('outreach') ) $tag_class = 'tag-sky';

        if ( $count === 1 ) : // Featured card
      ?>
        <article class="news-card featured">
          <span class="news-tag <?php echo $tag_class; ?>"><?php echo esc_html($cat_name); ?></span>
          <h3 class="news-title">
            <a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a>
          </h3>
          <p class="news-excerpt"><?php the_excerpt(); ?></p>
          <p class="news-date">
            <i class="ti ti-calendar" aria-hidden="true"></i>
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('j F Y'); ?></time>
          </p>
        </article>
      </div>
      <div class="news-sidebar">

      <?php else : // Sidebar cards ?>
        <article class="news-card">
          <span class="news-tag <?php echo $tag_class; ?>"><?php echo esc_html($cat_name); ?></span>
          <h3 class="news-title sm">
            <a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a>
          </h3>
          <p class="news-date">
            <i class="ti ti-calendar" aria-hidden="true"></i>
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('j F Y'); ?></time>
          </p>
        </article>
      <?php endif; endwhile; wp_reset_postdata(); ?>
      </div>
    </div>

    <?php else : ?>
      <p style="color:var(--lpc-text-secondary);"><?php _e('No announcements at this time. Check back soon.','lpc'); ?></p>
    <?php endif; ?>

  </div>
</section>


<!-- ======================================================
     WHY LPC / VALUES
     ====================================================== -->
<div class="lpc-wave bg-white" aria-hidden="true">
  <svg viewBox="0 0 1440 48" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 48 Q720 0 1440 48 L1440 48 Z" fill="#f8f2ee"/>
  </svg>
</div>

<section class="lpc-section bg-white" id="why-lpc" aria-labelledby="values-heading">
  <div class="lpc-section-inner">

    <div class="lpc-section-header text-center">
      <span class="lpc-eyebrow"><?php _e('Why LPC','lpc'); ?></span>
      <h2 id="values-heading"><?php _e('A Community Built on Love','lpc'); ?></h2>
      <hr class="lpc-section-divider" style="margin:0.5rem auto 0;">
    </div>

    <div class="values-grid" style="margin-top:2rem;">
      <?php
      $values = [
        [ 'icon' => 'ti-heart',  'title' => __('Welcoming All','lpc'),        'text' => __('No matter your background, season of life, or story — there is a seat for you at God\'s table.','lpc') ],
        [ 'icon' => 'ti-flame',  'title' => __('Spirit-led Worship','lpc'),   'text' => __('Authentic, Spirit-filled services in English, Malayalam, and Hindi every Sunday.','lpc') ],
        [ 'icon' => 'ti-users',  'title' => __('Rooted Community','lpc'),     'text' => __('A multicultural family across five branches, growing together in faith and love since 2001.','lpc') ],
      ];
      foreach ( $values as $v ) : ?>
        <div class="value-card">
          <div class="value-icon" aria-hidden="true">
            <i class="ti <?php echo esc_attr($v['icon']); ?>"></i>
          </div>
          <h3 class="value-title"><?php echo esc_html($v['title']); ?></h3>
          <p class="value-text"><?php echo esc_html($v['text']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ======================================================
     BRANCHES GRID
     Each branch has its own logo colour identity
     ====================================================== -->
<div class="lpc-wave bg-parchment" aria-hidden="true">
  <svg viewBox="0 0 1440 48" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0 Q720 48 1440 0 L1440 0 Z" fill="#ffffff"/>
  </svg>
</div>

<section class="lpc-section bg-parchment" id="branches" aria-labelledby="branches-heading">
  <div class="lpc-section-inner">

    <div class="lpc-section-header">
      <span class="lpc-eyebrow"><?php _e('Find Us Near You','lpc'); ?></span>
      <h2 id="branches-heading"><?php _e('Our Branches','lpc'); ?></h2>
      <hr class="lpc-section-divider">
    </div>

    <?php
    $branches = lpc_get_branches();
    if ( $branches->have_posts() ) : ?>
      <div class="branches-grid">
        <?php while ( $branches->have_posts() ) : $branches->the_post();
          $address   = get_post_meta( get_the_ID(), '_lpc_address',     true );
          $sun_time  = get_post_meta( get_the_ID(), '_lpc_sunday_time', true );
          $languages = get_post_meta( get_the_ID(), '_lpc_languages',   true );
          $css_class = get_post_meta( get_the_ID(), '_lpc_css_class',   true );
          $logo_url  = get_post_meta( get_the_ID(), '_lpc_logo_url',    true );
          $colour    = get_post_meta( get_the_ID(), '_lpc_brand_colour', true );
          $inline_style = $colour ? 'style="--branch-color:' . esc_attr($colour) . ';"' : '';
        ?>
          <article class="branch-card <?php echo esc_attr($css_class); ?>" <?php echo $inline_style; ?>>

            <?php if ( $logo_url ) : ?>
              <img src="<?php echo esc_url($logo_url); ?>"
                   alt="<?php printf( __('%s logo','lpc'), get_the_title() ); ?>"
                   class="branch-logo"
                   width="64" height="64"
                   loading="lazy">
            <?php elseif ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('thumbnail', ['class' => 'branch-logo', 'alt' => get_the_title() . ' logo']); ?>
            <?php else : ?>
              <div class="branch-logo" aria-hidden="true" style="width:64px;height:64px;border-radius:50%;background:#f5e0da;display:flex;align-items:center;justify-content:center;margin:0 auto 0.9rem;font-family:var(--lpc-font-heading);font-size:1.25rem;font-weight:700;color:var(--lpc-burgundy-light);">
                <?php echo esc_html( strtoupper( substr(get_the_title(), 0, 3) ) ); ?>
              </div>
            <?php endif; ?>

            <h3 class="branch-name"><?php the_title(); ?></h3>
            <?php if ( $address ) : ?>
              <p class="branch-location"><?php echo esc_html($address); ?></p>
            <?php endif; ?>
            <?php if ( $sun_time ) : ?>
              <p class="branch-times"><?php echo esc_html($sun_time); ?></p>
            <?php endif; ?>
            <?php if ( $languages ) : ?>
              <p style="font-size:11px;color:var(--lpc-text-secondary);margin-top:0.25rem;"><?php echo esc_html($languages); ?></p>
            <?php endif; ?>

          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>

    <?php else :
      // Fallback static branches if CPT not populated yet
      $static_branches = [
        [ 'name'=>'Chadwell Heath', 'loc'=>'Main Church · Romford',        'time'=>'Sun 10AM · 12:30PM · 3PM', 'class'=>'branch-lpc',  'logo'=>LPC_URI.'/images/LPC_transparent.png' ],
        [ 'name'=>'Basildon',       'loc'=>'Basildon Pentecostal, SS14',   'time'=>'Sunday 11:00 AM',           'class'=>'branch-bpc',  'logo'=>LPC_URI.'/images/BPC_transparent.png' ],
        [ 'name'=>'Chelmsford',     'loc'=>'Chelmsford Pentecostal, CM1',  'time'=>'Sunday 11:00 AM',           'class'=>'branch-cpc',  'logo'=>LPC_URI.'/images/CPC_transparent.png' ],
        [ 'name'=>'Harlow',         'loc'=>'Harlow Pentecostal, CM20',     'time'=>'Sunday 10:30 AM',           'class'=>'branch-hpc',  'logo'=>LPC_URI.'/images/HPC_transparent.png' ],
        [ 'name'=>'South London',   'loc'=>'SLPC, South East London',      'time'=>'Sunday 11:00 AM',           'class'=>'branch-slpc', 'logo'=>LPC_URI.'/images/SLPC_transparent.png' ],
      ];
    ?>
      <div class="branches-grid" style="grid-template-columns:repeat(5,1fr);">
        <?php foreach ( $static_branches as $b ) : ?>
          <div class="branch-card <?php echo esc_attr($b['class']); ?>">
            <img src="<?php echo esc_url($b['logo']); ?>"
                 alt="<?php echo esc_attr($b['name']); ?> logo"
                 class="branch-logo"
                 width="64" height="64"
                 loading="lazy">
            <h3 class="branch-name"><?php echo esc_html($b['name']); ?></h3>
            <p class="branch-location"><?php echo esc_html($b['loc']); ?></p>
            <p class="branch-times"><?php echo esc_html($b['time']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>

<!-- ======================================================
     LAYOUT SAMPLES PROMO
     Link to design showcase
     ====================================================== -->
<div class="lpc-wave bg-white" aria-hidden="true">
  <svg viewBox="0 0 1440 48" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 48 Q720 0 1440 48 L1440 48 Z" fill="#f5e0da"/>
  </svg>
</div>

<section class="lpc-section bg-parchment" id="samples" aria-labelledby="samples-heading">
  <div class="lpc-section-inner" style="max-width:800px;text-align:center;">
    <span class="lpc-eyebrow"><?php _e('Design Ideas','lpc'); ?></span>
    <h2 id="samples-heading"><?php _e('Explore Church Website Layouts','lpc'); ?></h2>
    <p><?php _e('Interested in different design approaches? Check out our layout samples to see various ways churches organize their websites.','lpc'); ?></p>
    <a href="<?php echo esc_url( get_page_link( get_page_by_title('Layout Samples')->ID ?? 0 ) ); ?>"
       class="lpc-button"
       style="display:inline-block;background:var(--lpc-burgundy);color:white;padding:0.75rem 1.5rem;border-radius:var(--lpc-radius);text-decoration:none;margin-top:1rem;transition:background 0.3s;">
      <?php _e('View Design Samples','lpc'); ?>
      <i class="ti ti-arrow-right" style="margin-left:0.5rem;" aria-hidden="true"></i>
    </a>
  </div>
</section>

<?php get_footer(); ?>
