<?php
/**
 * Template Name: Layout Sample Variant
 * Description: Visual design direction samples for LPC.
 */
get_header();

$variant = function_exists( 'lpc_layout_sample_variant' ) ? lpc_layout_sample_variant() : '3';

$samples = [
    '3' => [
        'slug'       => 'sage',
        'name'       => 'Sage Light',
        'palette'    => 'Sage, ivory, charcoal, muted gold',
        'headline'   => 'A calm church home with room to breathe.',
        'intro'      => 'A lighter editorial direction built around organic swooshes, tactile ministry tiles and gentle responsive sections for new visitors.',
        'button'     => 'Plan your visit',
        'secondary'  => 'Explore ministries',
        'hero_note'  => 'Sunday 10:30 AM',
        'tiles'      => [ 'New here', 'Families', 'Prayer', 'Outreach', 'Youth', 'Groups' ],
        'stats'      => [ '4 branches', '18 groups', '1 shared mission' ],
        'sections'   => [ 'A warm welcome desk', 'Simple next steps', 'Stories from local people' ],
    ],
    '4' => [
        'slug'       => 'midnight',
        'name'       => 'Midnight Neon',
        'palette'    => 'Ink, electric blue, coral, violet glow',
        'headline'   => 'A bold digital-first expression for Sundays and stories.',
        'intro'      => 'A high contrast concept with curvy glow fields, strong event panels and media-led cards for a contemporary first impression.',
        'button'     => 'Watch latest',
        'secondary'  => 'See what is on',
        'hero_note'  => 'Live this Sunday',
        'tiles'      => [ 'Sermons', 'Worship', 'Events', 'Teams', 'Giving', 'Alpha' ],
        'stats'      => [ 'Live stream', 'Weekly events', 'City reach' ],
        'sections'   => [ 'Featured message carousel', 'Night-mode branch cards', 'Fast event discovery' ],
    ],
    '5' => [
        'slug'       => 'clay',
        'name'       => 'Clay Studio',
        'palette'    => 'Terracotta, oat, olive, warm black',
        'headline'   => 'A grounded community story with a crafted feel.',
        'intro'      => 'An earthy, human-centred layout using warm swooshes, editorial blocks and responsive community boxes for families and outreach.',
        'button'     => 'Meet the community',
        'secondary'  => 'Find a group',
        'hero_note'  => 'Local stories',
        'tiles'      => [ 'Community', 'Food bank', 'Kids', 'Care', 'Courses', 'Serve' ],
        'stats'      => [ 'Open doors', 'Shared tables', 'Local care' ],
        'sections'   => [ 'Story-led homepage', 'Warm activity tiles', 'Clear serving pathways' ],
    ],
    '6' => [
        'slug'       => 'sky',
        'name'       => 'Sky Glass',
        'palette'    => 'Ice blue, graphite, lime, white glass',
        'headline'   => 'A crisp system of responsive boxes for fast scanning.',
        'intro'      => 'A clean, structured concept with glass panels, angled swooshes and compact boxes for branches, sermons and next actions.',
        'button'     => 'Choose a branch',
        'secondary'  => 'Latest message',
        'hero_note'  => 'One church, many places',
        'tiles'      => [ 'Croydon', 'Bromley', 'Online', 'Messages', 'Connect', 'Serve' ],
        'stats'      => [ 'Branch finder', 'Quick actions', 'Mobile ready' ],
        'sections'   => [ 'Dense branch overview', 'Responsive sermon boxes', 'Clear mobile actions' ],
    ],
];

if ( ! isset( $samples[ $variant ] ) ) {
    $variant = '3';
}

$sample = $samples[ $variant ];
$next   = (string) ( ( (int) $variant ) < 6 ? ( (int) $variant ) + 1 : 3 );
$prev   = (string) ( ( (int) $variant ) > 3 ? ( (int) $variant ) - 1 : 6 );
?>

<style>
.sample-variant {
  --ink: #17201d;
  --muted: rgba(23, 32, 29, 0.72);
  --paper: #f8f4ea;
  min-height: 100vh;
  overflow: hidden;
  color: var(--ink);
  background: var(--paper);
}
.sample-variant * {
  box-sizing: border-box;
}
.sample-shell {
  width: min(1180px, calc(100% - 32px));
  margin: 0 auto;
}
.sample-topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  padding: 1.2rem 0;
}
.sample-back,
.sample-nav a,
.sample-actions a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 42px;
  padding: 0.72rem 1rem;
  border-radius: 999px;
  text-decoration: none;
  font-weight: 800;
  line-height: 1;
}
.sample-back {
  background: rgba(255,255,255,0.58);
  color: inherit;
  border: 1px solid rgba(23,32,29,0.14);
}
.sample-nav {
  display: flex;
  gap: 0.55rem;
  flex-wrap: wrap;
  justify-content: flex-end;
}
.sample-nav a {
  background: rgba(255,255,255,0.32);
  color: inherit;
  border: 1px solid rgba(23,32,29,0.12);
}
.sample-nav a[aria-current="page"] {
  background: var(--ink);
  color: #fff;
}
.sample-hero {
  position: relative;
  min-height: 78vh;
  padding: 4.5rem 0 4rem;
}
.sample-hero-grid {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(320px, 0.82fr);
  gap: clamp(2rem, 5vw, 5rem);
  align-items: center;
}
.sample-kicker {
  display: inline-flex;
  margin-bottom: 1rem;
  padding: 0.46rem 0.7rem;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 900;
  letter-spacing: 0.12em;
  text-transform: uppercase;
}
.sample-hero h1 {
  max-width: 780px;
  margin: 0;
  font-size: clamp(2.7rem, 7vw, 6.5rem);
  line-height: 0.93;
  letter-spacing: 0;
}
.sample-hero p {
  max-width: 620px;
  margin: 1.3rem 0 0;
  color: var(--muted);
  font-size: clamp(1rem, 1.8vw, 1.22rem);
  line-height: 1.7;
}
.sample-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 0.8rem;
  margin-top: 2rem;
}
.sample-actions a:first-child {
  background: var(--ink);
  color: #fff;
}
.sample-actions a:last-child {
  background: rgba(255,255,255,0.58);
  color: inherit;
  border: 1px solid rgba(23,32,29,0.15);
}
.sample-stage {
  position: relative;
  min-height: 540px;
}
.sample-swoosh {
  position: absolute;
  inset: 4% -8% auto auto;
  width: min(620px, 88vw);
  height: 360px;
  border-radius: 48% 52% 57% 43% / 50% 38% 62% 50%;
  transform: rotate(-9deg);
  filter: drop-shadow(0 28px 48px rgba(0,0,0,0.18));
}
.sample-glow {
  position: absolute;
  width: 340px;
  height: 340px;
  border-radius: 50%;
  filter: blur(22px);
  opacity: 0.82;
}
.sample-glow.one {
  top: -3%;
  right: 14%;
}
.sample-glow.two {
  left: -6%;
  bottom: 8%;
}
.sample-card-stack {
  position: relative;
  z-index: 2;
  display: grid;
  gap: 1rem;
  padding-top: 3.4rem;
}
.feature-panel,
.mini-panel,
.sample-tile,
.responsive-box {
  border: 1px solid rgba(255,255,255,0.34);
  box-shadow: 0 22px 70px rgba(0,0,0,0.12);
  backdrop-filter: blur(18px);
}
.feature-panel {
  padding: clamp(1.25rem, 3vw, 2rem);
  border-radius: 28px;
}
.feature-panel b {
  display: block;
  margin-bottom: 3.8rem;
  font-size: 12px;
  letter-spacing: 0.14em;
  text-transform: uppercase;
}
.feature-panel strong {
  display: block;
  font-size: clamp(2rem, 4vw, 3.3rem);
  line-height: 1;
}
.mini-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
}
.mini-panel {
  min-height: 150px;
  padding: 1rem;
  border-radius: 22px;
}
.mini-panel span {
  display: block;
  margin-top: 2.7rem;
  font-size: 1.6rem;
  font-weight: 900;
}
.sample-section {
  position: relative;
  z-index: 2;
  padding: clamp(3.2rem, 6vw, 5rem) 0;
}
.section-head {
  display: flex;
  align-items: end;
  justify-content: space-between;
  gap: 1.5rem;
  margin-bottom: 1.5rem;
}
.section-head h2 {
  max-width: 620px;
  margin: 0;
  font-size: clamp(2rem, 4vw, 4rem);
  line-height: 1;
  letter-spacing: 0;
}
.section-head p {
  max-width: 360px;
  margin: 0;
  color: var(--muted);
}
.tile-grid {
  display: grid;
  grid-template-columns: repeat(6, minmax(0, 1fr));
  gap: 1rem;
}
.sample-tile {
  min-height: 170px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 1rem;
  border-radius: 24px;
  transition: transform 180ms ease, box-shadow 180ms ease;
}
.sample-tile:hover {
  transform: translateY(-5px);
}
.sample-tile span {
  width: 36px;
  height: 36px;
  border-radius: 13px;
}
.sample-tile b {
  font-size: 1.08rem;
}
.responsive-grid {
  display: grid;
  grid-template-columns: 1.4fr 1fr 1fr;
  grid-auto-rows: minmax(190px, auto);
  gap: 1rem;
}
.responsive-box {
  padding: 1.3rem;
  border-radius: 24px;
}
.responsive-box:first-child {
  grid-row: span 2;
}
.responsive-box h3 {
  margin: 0;
  font-size: clamp(1.45rem, 3vw, 2.3rem);
}
.responsive-box p {
  margin: 0.9rem 0 0;
  color: var(--muted);
}
.sample-footer-nav {
  display: flex;
  justify-content: space-between;
  gap: 1rem;
  padding: 2rem 0 5rem;
}
.sample-footer-nav a {
  color: inherit;
  font-weight: 900;
  text-decoration: none;
}

.theme-sage {
  --ink: #16241f;
  --muted: rgba(22,36,31,0.68);
  --paper: #f5f0e5;
  background:
    radial-gradient(circle at 86% 16%, rgba(201, 164, 83, 0.28), transparent 25rem),
    radial-gradient(circle at 8% 45%, rgba(102, 145, 121, 0.24), transparent 28rem),
    linear-gradient(145deg, #f7f3e9 0%, #e7eee3 100%);
}
.theme-sage .sample-kicker,
.theme-sage .sample-tile span {
  background: #c9a453;
  color: #16241f;
}
.theme-sage .sample-swoosh {
  background: linear-gradient(135deg, #9fb79c, #f7f1d8 58%, #d8b15f);
}
.theme-sage .sample-glow.one {
  background: #e5c978;
}
.theme-sage .sample-glow.two {
  background: #7ea18a;
}
.theme-sage .feature-panel,
.theme-sage .mini-panel,
.theme-sage .sample-tile,
.theme-sage .responsive-box {
  background: rgba(255,255,255,0.62);
}

.theme-midnight {
  --ink: #f7fbff;
  --muted: rgba(247,251,255,0.72);
  --paper: #080b16;
  background:
    radial-gradient(circle at 78% 18%, rgba(93, 61, 255, 0.48), transparent 26rem),
    radial-gradient(circle at 18% 22%, rgba(0, 217, 255, 0.28), transparent 22rem),
    linear-gradient(145deg, #070a13 0%, #111827 52%, #0b0e1a 100%);
}
.theme-midnight .sample-kicker,
.theme-midnight .sample-tile span {
  background: #26e4ff;
  color: #08101e;
}
.theme-midnight .sample-swoosh {
  background: linear-gradient(135deg, #26e4ff, #7048ff 52%, #ff6a64);
}
.theme-midnight .sample-glow.one {
  background: #6e4cff;
}
.theme-midnight .sample-glow.two {
  background: #ff6a64;
}
.theme-midnight .feature-panel,
.theme-midnight .mini-panel,
.theme-midnight .sample-tile,
.theme-midnight .responsive-box,
.theme-midnight .sample-back,
.theme-midnight .sample-nav a,
.theme-midnight .sample-actions a:last-child {
  background: rgba(255,255,255,0.09);
  border-color: rgba(255,255,255,0.16);
}
.theme-midnight .sample-nav a[aria-current="page"],
.theme-midnight .sample-actions a:first-child {
  background: #f7fbff;
  color: #080b16;
}

.theme-clay {
  --ink: #231c17;
  --muted: rgba(35,28,23,0.68);
  --paper: #efe2d0;
  background:
    radial-gradient(circle at 72% 16%, rgba(136, 152, 93, 0.34), transparent 25rem),
    radial-gradient(circle at 12% 20%, rgba(211, 104, 66, 0.34), transparent 25rem),
    linear-gradient(140deg, #f2e4d1 0%, #dac0a7 100%);
}
.theme-clay .sample-kicker,
.theme-clay .sample-tile span {
  background: #7f925a;
  color: #fff9ee;
}
.theme-clay .sample-swoosh {
  background: linear-gradient(135deg, #d46c45, #f1d1a7 52%, #7f925a);
}
.theme-clay .sample-glow.one {
  background: #d46c45;
}
.theme-clay .sample-glow.two {
  background: #7f925a;
}
.theme-clay .feature-panel,
.theme-clay .mini-panel,
.theme-clay .sample-tile,
.theme-clay .responsive-box {
  background: rgba(255,247,233,0.58);
}

.theme-sky {
  --ink: #13202a;
  --muted: rgba(19,32,42,0.68);
  --paper: #eef7fb;
  background:
    radial-gradient(circle at 82% 14%, rgba(184, 237, 89, 0.34), transparent 22rem),
    radial-gradient(circle at 22% 10%, rgba(94, 190, 232, 0.32), transparent 28rem),
    linear-gradient(140deg, #f8fcff 0%, #dceff8 100%);
}
.theme-sky .sample-kicker,
.theme-sky .sample-tile span {
  background: #b8ed59;
  color: #13202a;
}
.theme-sky .sample-swoosh {
  background: linear-gradient(135deg, #ffffff, #8fd5f0 58%, #b8ed59);
}
.theme-sky .sample-glow.one {
  background: #a9e9ff;
}
.theme-sky .sample-glow.two {
  background: #b8ed59;
}
.theme-sky .feature-panel,
.theme-sky .mini-panel,
.theme-sky .sample-tile,
.theme-sky .responsive-box {
  background: rgba(255,255,255,0.64);
}

@media (max-width: 980px) {
  .sample-topbar,
  .section-head {
    align-items: flex-start;
    flex-direction: column;
  }
  .sample-nav {
    justify-content: flex-start;
  }
  .sample-hero-grid {
    grid-template-columns: 1fr;
  }
  .sample-stage {
    min-height: 460px;
  }
  .tile-grid {
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }
  .responsive-grid {
    grid-template-columns: 1fr 1fr;
  }
  .responsive-box:first-child {
    grid-column: span 2;
    grid-row: auto;
  }
}
@media (max-width: 640px) {
  .sample-shell {
    width: min(100% - 24px, 1180px);
  }
  .sample-hero {
    padding-top: 2.2rem;
  }
  .sample-stage {
    min-height: 390px;
  }
  .sample-swoosh {
    width: 112vw;
    height: 270px;
    right: -30vw;
  }
  .mini-grid,
  .tile-grid,
  .responsive-grid {
    grid-template-columns: 1fr;
  }
  .responsive-box:first-child {
    grid-column: auto;
  }
  .sample-tile {
    min-height: 130px;
  }
  .sample-footer-nav {
    flex-direction: column;
  }
}
</style>

<main class="sample-variant theme-<?php echo esc_attr( $sample['slug'] ); ?>">
  <div class="sample-shell">
    <nav class="sample-topbar" aria-label="Layout sample navigation">
      <a class="sample-back" href="<?php echo esc_url( home_url( '/layout-samples' ) ); ?>">All samples</a>
      <div class="sample-nav">
        <?php foreach ( $samples as $number => $item ) : ?>
          <a href="<?php echo esc_url( home_url( '/layout-samples' . $number ) ); ?>" <?php echo $number === $variant ? 'aria-current="page"' : ''; ?>>
            <?php echo esc_html( $number . '. ' . $item['name'] ); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </nav>
  </div>

  <section class="sample-hero">
    <div class="sample-shell sample-hero-grid">
      <div>
        <span class="sample-kicker"><?php echo esc_html( 'Layout sample ' . $variant . ' / ' . $sample['palette'] ); ?></span>
        <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
        <p><?php echo esc_html( $sample['intro'] ); ?></p>
        <div class="sample-actions">
          <a href="#tiles"><?php echo esc_html( $sample['button'] ); ?></a>
          <a href="#responsive"><?php echo esc_html( $sample['secondary'] ); ?></a>
        </div>
      </div>
      <div class="sample-stage" aria-hidden="true">
        <span class="sample-glow one"></span>
        <span class="sample-glow two"></span>
        <span class="sample-swoosh"></span>
        <div class="sample-card-stack">
          <div class="feature-panel">
            <b><?php echo esc_html( $sample['hero_note'] ); ?></b>
            <strong><?php echo esc_html( $sample['name'] ); ?></strong>
          </div>
          <div class="mini-grid">
            <?php foreach ( $sample['stats'] as $stat ) : ?>
              <div class="mini-panel"><span><?php echo esc_html( $stat ); ?></span></div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="sample-section" id="tiles">
    <div class="sample-shell">
      <div class="section-head">
        <h2>Swoosh-led hero with ministry tiles.</h2>
        <p>Each direction keeps the first screen visual, then moves into scannable tiles for the team to compare quickly.</p>
      </div>
      <div class="tile-grid">
        <?php foreach ( $sample['tiles'] as $index => $tile ) : ?>
          <article class="sample-tile">
            <span></span>
            <b><?php echo esc_html( $tile ); ?></b>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="sample-section" id="responsive">
    <div class="sample-shell">
      <div class="section-head">
        <h2>Responsive boxes for real content.</h2>
        <p>The boxes change from a desktop dashboard feel into a single-column mobile flow without losing hierarchy.</p>
      </div>
      <div class="responsive-grid">
        <?php foreach ( $sample['sections'] as $index => $section ) : ?>
          <article class="responsive-box">
            <h3><?php echo esc_html( $section ); ?></h3>
            <p><?php echo esc_html( $index === 0 ? 'A prominent content area for the primary visitor journey.' : 'A compact module for quick choices, highlights or calls to action.' ); ?></p>
          </article>
        <?php endforeach; ?>
        <article class="responsive-box">
          <h3>Mobile first cards</h3>
          <p>Touch-friendly spacing, clear contrast and enough structure for future branch or ministry content.</p>
        </article>
      </div>
    </div>
  </section>

  <div class="sample-shell sample-footer-nav">
    <a href="<?php echo esc_url( home_url( '/layout-samples' . $prev ) ); ?>">Previous sample</a>
    <a href="<?php echo esc_url( home_url( '/layout-samples' . $next ) ); ?>">Next sample</a>
  </div>
</main>

<?php get_footer(); ?>
