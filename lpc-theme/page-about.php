<?php
/**
 * Template Name: About Page
 */
get_header();
?>

<section class="lpc-section bg-white" aria-labelledby="about-intro">
  <div class="lpc-section-inner">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:3rem;align-items:center;">
      <div>
        <span class="lpc-eyebrow"><?php _e('Our Story','lpc'); ?></span>
        <h2 id="about-intro"><?php _e('Rooted in Faith,<br>Growing in Grace','lpc'); ?></h2>
        <hr class="lpc-section-divider">
        <?php the_content(); ?>
      </div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
        <?php
        $stats = [
          [ 'num'=>'25+', 'label'=>__('Years of Ministry','lpc') ],
          [ 'num'=>'5',   'label'=>__('Branch Churches','lpc')   ],
          [ 'num'=>'3',   'label'=>__('Languages','lpc')          ],
          [ 'num'=>'100+','label'=>__('Families Served','lpc')   ],
        ];
        foreach ( $stats as $s ) : ?>
          <div style="background:var(--lpc-cream);border-radius:var(--lpc-radius);padding:1.5rem;text-align:center;border:1.5px solid rgba(138,48,32,0.1);">
            <div style="font-family:var(--lpc-font-heading);font-size:2.5rem;font-weight:700;color:var(--lpc-burgundy-light);line-height:1;">
              <?php echo esc_html($s['num']); ?>
            </div>
            <div style="font-size:12px;color:var(--lpc-text-secondary);margin-top:0.4rem;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;">
              <?php echo esc_html($s['label']); ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- VALUES -->
<div class="lpc-wave bg-parchment" aria-hidden="true">
  <svg viewBox="0 0 1440 48" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 48 Q720 0 1440 48 L1440 48 Z" fill="#ffffff"/>
  </svg>
</div>

<section class="lpc-section bg-parchment" aria-labelledby="values-about">
  <div class="lpc-section-inner">
    <div class="lpc-section-header text-center">
      <span class="lpc-eyebrow"><?php _e('What We Stand For','lpc'); ?></span>
      <h2 id="values-about"><?php _e('Our Values','lpc'); ?></h2>
      <hr class="lpc-section-divider" style="margin:0.5rem auto 0;">
    </div>
    <div class="values-grid" style="margin-top:2rem;">
      <?php
      $values = [
        [ 'icon'=>'ti-flame',      'title'=>__('Spirit-led','lpc'),     'text'=>__('Moved by the Holy Spirit in all we do — worship, prayer, and service.','lpc') ],
        [ 'icon'=>'ti-book',       'title'=>__('Word-rooted','lpc'),    'text'=>__('Scripture anchors every ministry, sermon, and decision we make.','lpc') ],
        [ 'icon'=>'ti-heart',      'title'=>__('Community','lpc'),      'text'=>__('A family to all who walk through our doors — multicultural, multilingual, one body.','lpc') ],
        [ 'icon'=>'ti-globe',      'title'=>__('Outreach','lpc'),       'text'=>__('Serving London and beyond through food banks, community projects, and evangelism.','lpc') ],
        [ 'icon'=>'ti-pray',       'title'=>__('Prayer','lpc'),         'text'=>__('Intercession is the foundation of everything we build — weekly prayer meetings open to all.','lpc') ],
        [ 'icon'=>'ti-star',       'title'=>__('Excellence','lpc'),     'text'=>__('Giving our best to God in every service, ministry, and act of worship.','lpc') ],
      ];
      foreach ( $values as $v ) : ?>
        <div class="value-card">
          <div class="value-icon" aria-hidden="true"><i class="ti <?php echo esc_attr($v['icon']); ?>"></i></div>
          <h3 class="value-title"><?php echo esc_html($v['title']); ?></h3>
          <p class="value-text"><?php echo esc_html($v['text']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
