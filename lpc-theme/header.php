<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#3c0814">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content"><?php _e('Skip to main content','lpc'); ?></a>

<!-- SITE HEADER -->
<header class="site-header <?php echo is_front_page() ? 'hero-mode' : 'scrolled'; ?>" id="site-header" role="banner">
  <div class="nav-container">

    <!-- Logo -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home" aria-label="<?php bloginfo('name'); ?> — Home">
      <?php if ( has_custom_logo() ) :
          $logo = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full' );
          if ( $logo ) : ?>
            <img src="<?php echo esc_url($logo[0]); ?>"
                 alt="<?php bloginfo('name'); ?> logo"
                 width="44" height="44"
                 loading="eager">
          <?php endif;
      endif; ?>
      <span class="site-logo-text">
        <?php
          $name = get_bloginfo('name');
          // Bold first word, accent second
          $words = explode(' ', $name, 2);
          echo esc_html($words[0]);
          if ( isset($words[1]) ) echo ' <span>' . esc_html($words[1]) . '</span>';
        ?>
      </span>
    </a>

    <!-- Primary navigation -->
    <nav class="primary-nav-wrap" id="primary-nav" role="navigation" aria-label="<?php _e('Primary Navigation','lpc'); ?>">
      <?php wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'primary-nav',
        'fallback_cb'    => 'lpc_fallback_menu',
        'walker'         => new LPC_Nav_Walker(),
      ]); ?>
      <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
         class="nav-cta btn">
        <?php _e('Join Us Sunday','lpc'); ?>
      </a>
    </nav>

    <!-- Mobile toggle -->
    <button class="nav-toggle"
            id="nav-toggle"
            aria-expanded="false"
            aria-controls="primary-nav"
            aria-label="<?php _e('Toggle navigation','lpc'); ?>">
      <i class="ti ti-menu-2" aria-hidden="true"></i>
    </button>

  </div>
</header><!-- /site-header -->

<main id="main-content" tabindex="-1">

<?php
// Hero — only on front page
if ( is_front_page() ) :
  $hero_eyebrow  = lpc_get('lpc_hero_eyebrow',  'Welcome · London Pentecostal Church');
  $hero_title    = lpc_get('lpc_hero_title',    'A Place of Peace, Hope & Belonging.');
  $hero_subtitle = lpc_get('lpc_hero_subtitle', 'Come as you are. You are welcomed, loved, and expected. A family gathering in the warmth of God\'s presence every Sunday.');
  $btn1_text     = lpc_get('lpc_hero_btn1',     'Plan Your Visit');
  $btn1_url      = lpc_get('lpc_hero_btn1_url', '/contact');
  $btn2_text     = lpc_get('lpc_hero_btn2',     'Watch a Sermon');
  $btn2_url      = lpc_get('lpc_hero_btn2_url', '/sermons');

  // Parse title for <em> wrapping italic phrases
  $hero_title_html = esc_html($hero_title);
  // Allow site admin to use *word* for italic
  $hero_title_html = preg_replace('/\*([^*]+)\*/', '<em>$1</em>', $hero_title_html);
?>

<!-- HERO SECTION -->
<section class="lpc-hero" aria-label="<?php _e('Welcome to London Pentecostal Church','lpc'); ?>">

  <!-- Decorative light beams -->
  <div class="hero-beam hero-beam-1" aria-hidden="true"></div>
  <div class="hero-beam hero-beam-2" aria-hidden="true"></div>
  <div class="hero-beam hero-beam-3" aria-hidden="true"></div>
  <div class="hero-beam hero-beam-4" aria-hidden="true"></div>

  <!-- Glow orbs -->
  <div class="hero-orb hero-orb-1" aria-hidden="true"></div>
  <div class="hero-orb hero-orb-2" aria-hidden="true"></div>
  <div class="hero-orb hero-orb-3" aria-hidden="true"></div>

  <!-- Brand star motif (from LPC logos) -->
  <div class="hero-star" aria-hidden="true">
    <svg width="180" height="180" viewBox="0 0 180 180" xmlns="http://www.w3.org/2000/svg" fill="none">
      <!-- Four-point star matching the logos -->
      <line x1="90" y1="10"  x2="90"  y2="170" stroke="white" stroke-width="3" stroke-linecap="round"/>
      <line x1="10" y1="90"  x2="170" y2="90"  stroke="white" stroke-width="3" stroke-linecap="round"/>
      <line x1="90" y1="30"  x2="90"  y2="150" stroke="white" stroke-width="1.5" stroke-linecap="round" opacity="0.5"/>
      <line x1="30" y1="90"  x2="150" y2="90"  stroke="white" stroke-width="1.5" stroke-linecap="round" opacity="0.5"/>
      <!-- Small sparkles -->
      <line x1="130" y1="40" x2="130" y2="60"  stroke="white" stroke-width="1.5" stroke-linecap="round" opacity="0.7"/>
      <line x1="120" y1="50" x2="140" y2="50"  stroke="white" stroke-width="1.5" stroke-linecap="round" opacity="0.7"/>
      <line x1="55"  y1="55" x2="55"  y2="68"  stroke="white" stroke-width="1"   stroke-linecap="round" opacity="0.5"/>
      <line x1="49"  y1="61" x2="62"  y2="61"  stroke="white" stroke-width="1"   stroke-linecap="round" opacity="0.5"/>
    </svg>
  </div>

  <!-- Hero content -->
  <div class="hero-content">
    <div class="hero-inner">
      <span class="hero-eyebrow"><?php echo esc_html($hero_eyebrow); ?></span>
      <h1 class="hero-title"><?php echo wp_kses($hero_title_html, ['em'=>[]]); ?></h1>
      <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
      <div class="hero-buttons">
        <a href="<?php echo esc_url($btn1_url); ?>" class="btn-primary">
          <i class="ti ti-calendar-event" aria-hidden="true"></i>
          <?php echo esc_html($btn1_text); ?>
        </a>
        <a href="<?php echo esc_url($btn2_url); ?>" class="btn-outline-hero">
          <i class="ti ti-player-play" aria-hidden="true"></i>
          <?php echo esc_html($btn2_text); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- SWOOSH DIVIDER — hero to body -->
<div class="lpc-swoosh" style="background:#3c0814;" aria-hidden="true">
  <svg viewBox="0 0 1440 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0 Q240 80 720 42 Q1200 5 1440 68 L1440 80 L0 80 Z" fill="#faf7f2"/>
    <path d="M0 18 Q360 72 760 38 Q1100 8 1440 58 L1440 80 L0 80 Z" fill="rgba(250,247,242,0.45)"/>
  </svg>
</div>

<!-- SERVICE TIMES -->
<section class="service-times" aria-label="<?php _e('Service Times','lpc'); ?>">
  <div class="service-times-inner">
    <?php
    $times = [
      [ 'key' => 'lpc_time_english',   'label' => __('English Service','lpc'),   'default' => 'Sunday · 10:00 AM', 'loc' => 'Chadwell Heath, Romford' ],
      [ 'key' => 'lpc_time_malayalam', 'label' => __('Malayalam Service','lpc'), 'default' => 'Sunday · 12:30 PM', 'loc' => 'Chadwell Heath, Romford' ],
      [ 'key' => 'lpc_time_hindi',     'label' => __('Hindi Service','lpc'),     'default' => 'Sunday · 3:00 PM',  'loc' => 'Chadwell Heath, Romford' ],
      [ 'key' => 'lpc_time_bible',     'label' => __('Bible Study','lpc'),       'default' => 'Wednesday · 7:00 PM','loc' => 'All branches' ],
    ];
    foreach ( $times as $t ) : ?>
      <div class="service-time-item">
        <span class="service-time-label"><?php echo esc_html($t['label']); ?></span>
        <span class="service-time-value"><?php echo esc_html( lpc_get($t['key'], $t['default']) ); ?></span>
        <span class="service-time-location"><?php echo esc_html($t['loc']); ?></span>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php endif; // is_front_page ?>

<?php
// Inner page hero for non-home pages
if ( ! is_front_page() && ! is_404() ) : ?>
<section class="page-hero">
  <div class="page-hero-inner">
    <?php if ( is_singular() || is_archive() ) : ?>
      <h1><?php
        if ( is_singular() ) the_title();
        elseif ( is_post_type_archive('sermon') ) _e('Sermons','lpc');
        elseif ( is_post_type_archive('ministry') ) _e('Our Ministries','lpc');
        elseif ( is_category() || is_tag() ) single_term_title();
        else wp_title('');
      ?></h1>
      <?php if ( is_singular() && get_the_excerpt() ) : ?>
        <p><?php the_excerpt(); ?></p>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</section>
<?php endif;
