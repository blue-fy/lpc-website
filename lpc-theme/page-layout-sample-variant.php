<?php
/**
 * Template Name: Layout Sample Variant
 * Description: Distinct LPC layout concept samples.
 */
get_header();

$variant = function_exists( 'lpc_layout_sample_variant' ) ? lpc_layout_sample_variant() : '3';

$samples = [
    '3' => [
        'class'     => 'concept-swoosh',
        'name'      => 'Swoosh Sections',
        'palette'   => 'Lagoon teal, lemon cream, deep ink, coral',
        'headline'  => 'Flowing sections that feel warm, open and alive.',
        'intro'     => 'Every major band finishes with a bold swoosh edge, giving the page movement from welcome to Sundays, groups and next steps.',
        'primary'   => 'Plan a visit',
        'secondary' => 'View Sundays',
    ],
    '4' => [
        'class'     => 'concept-glow',
        'name'      => 'Glow Tile System',
        'palette'   => 'Obsidian, cyan, mango, orchid',
        'headline'  => 'A luminous tile board for events, sermons and community.',
        'intro'     => 'This concept is built from glowing content tiles with different sizes, useful for a church that wants a modern media-led homepage.',
        'primary'   => 'Watch latest',
        'secondary' => 'See events',
    ],
    '5' => [
        'class'     => 'concept-curves',
        'name'      => 'Curved Section Finish',
        'palette'   => 'Sunlit peach, mineral green, black olive, warm white',
        'headline'  => 'Soft curved bands for a welcoming community story.',
        'intro'     => 'Each section has a different curved finish, helping photos, stories and calls to action feel more crafted and less blocky.',
        'primary'   => 'Meet LPC',
        'secondary' => 'Find a group',
    ],
    '6' => [
        'class'     => 'concept-line',
        'name'      => 'Modern Line Art',
        'palette'   => 'Porcelain, cobalt, chartreuse, graphite',
        'headline'  => 'Clean structure with expressive line-art section finishes.',
        'intro'     => 'A more premium, studio-like direction using drawn lines, frames, grids and simple illustrations to finish each section.',
        'primary'   => 'Choose a branch',
        'secondary' => 'Explore ministries',
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
.layout-concept {
  --ink: #111719;
  --paper: #fffaf1;
  min-height: 100vh;
  overflow: hidden;
  color: var(--ink);
  background: var(--paper);
}
.layout-concept * {
  box-sizing: border-box;
}
.concept-shell {
  width: min(1180px, calc(100% - 32px));
  margin: 0 auto;
}
.concept-topbar {
  position: relative;
  z-index: 20;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  padding: 1.2rem 0;
}
.concept-nav {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
  gap: 0.5rem;
}
.concept-topbar a {
  min-height: 42px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0.7rem 1rem;
  border-radius: 999px;
  color: inherit;
  text-decoration: none;
  font-weight: 900;
  background: rgba(255,255,255,0.58);
  border: 1px solid rgba(17,23,25,0.14);
}
.concept-topbar a[aria-current="page"] {
  color: #fff;
  background: var(--ink);
}
.concept-kicker {
  display: inline-flex;
  margin-bottom: 1rem;
  padding: 0.45rem 0.75rem;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 900;
  letter-spacing: 0.11em;
  text-transform: uppercase;
}
.concept-hero h1 {
  max-width: 820px;
  margin: 0;
  font-size: clamp(2.6rem, 7.2vw, 7rem);
  line-height: 0.92;
  letter-spacing: 0;
}
.concept-hero p {
  max-width: 610px;
  margin: 1.2rem 0 0;
  font-size: clamp(1rem, 1.8vw, 1.22rem);
  line-height: 1.65;
}
.concept-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 0.8rem;
  margin-top: 2rem;
}
.concept-actions a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 48px;
  padding: 0.85rem 1.2rem;
  border-radius: 999px;
  text-decoration: none;
  font-weight: 900;
}
.concept-actions a:first-child {
  background: var(--ink);
  color: #fff;
}
.concept-actions a:last-child {
  color: inherit;
  background: rgba(255,255,255,0.62);
  border: 1px solid rgba(17,23,25,0.14);
}
.concept-section h2 {
  margin: 0;
  font-size: clamp(2.1rem, 4.4vw, 4.6rem);
  line-height: 0.98;
  letter-spacing: 0;
}
.concept-section p {
  color: rgba(17,23,25,0.72);
  line-height: 1.65;
}
.sample-footer-nav {
  display: flex;
  justify-content: space-between;
  gap: 1rem;
  padding: 2.5rem 0 5rem;
}
.sample-footer-nav a {
  color: inherit;
  font-weight: 900;
  text-decoration: none;
}

/* 3. Swoosh Sections */
.concept-swoosh {
  --ink: #102326;
  --paper: #fff7df;
  background: #fff7df;
}
.concept-swoosh .concept-kicker {
  background: #f7df62;
}
.swoosh-hero {
  position: relative;
  min-height: 86vh;
  padding: 4rem 0 10rem;
  background:
    radial-gradient(circle at 82% 15%, rgba(255, 111, 91, 0.35), transparent 25rem),
    linear-gradient(135deg, #d7f7f2 0%, #fff7df 58%, #ffe6d5 100%);
}
.swoosh-hero::after,
.swoosh-band::after,
.swoosh-story::after {
  content: "";
  position: absolute;
  left: -8%;
  right: -8%;
  bottom: -70px;
  height: 150px;
  border-radius: 0 0 50% 50% / 0 0 100% 100%;
  background: inherit;
  transform: rotate(-2deg);
}
.swoosh-hero-grid {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: 1fr 0.75fr;
  gap: clamp(2rem, 5vw, 5rem);
  align-items: center;
}
.swoosh-visual {
  position: relative;
  min-height: 470px;
}
.swoosh-ribbon {
  position: absolute;
  inset: 7% -12% auto auto;
  width: 640px;
  max-width: 92vw;
  height: 290px;
  border-radius: 45% 55% 60% 40%;
  background: linear-gradient(135deg, #00a6a6, #f7df62 52%, #ff6f5b);
  transform: rotate(-13deg);
  box-shadow: 0 40px 80px rgba(0,0,0,0.15);
}
.swoosh-card {
  position: absolute;
  right: 2rem;
  bottom: 2rem;
  width: min(340px, 82vw);
  padding: 1.4rem;
  border-radius: 28px;
  background: rgba(255,255,255,0.78);
  box-shadow: 0 22px 60px rgba(0,0,0,0.16);
}
.swoosh-card strong {
  display: block;
  font-size: 2.4rem;
  line-height: 1;
}
.swoosh-band {
  position: relative;
  padding: 7rem 0 9rem;
  background: #102326;
  color: #fff;
}
.swoosh-band p {
  color: rgba(255,255,255,0.7);
}
.swoosh-list {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
  margin-top: 2rem;
}
.swoosh-list article {
  min-height: 260px;
  padding: 1.4rem;
  border-radius: 34px 34px 80px 34px;
  background: #153b3e;
  border: 1px solid rgba(255,255,255,0.12);
}
.swoosh-list b {
  display: block;
  margin-top: 8rem;
  font-size: 1.5rem;
}
.swoosh-story {
  position: relative;
  padding: 8rem 0 9rem;
  background: linear-gradient(135deg, #ffe3c5, #fff7df);
}
.swoosh-story-grid {
  display: grid;
  grid-template-columns: 0.8fr 1fr;
  gap: 2rem;
}
.swoosh-photo {
  min-height: 420px;
  border-radius: 50% 50% 16px 16px;
  background:
    radial-gradient(circle at 30% 30%, rgba(255,255,255,0.95), transparent 8rem),
    linear-gradient(145deg, #00a6a6, #f7df62);
}

/* 4. Glow Tiles */
.concept-glow {
  --ink: #f8fbff;
  --paper: #080b12;
  background:
    radial-gradient(circle at 70% 12%, rgba(141, 70, 255, 0.42), transparent 28rem),
    radial-gradient(circle at 12% 20%, rgba(20, 220, 255, 0.28), transparent 25rem),
    #080b12;
}
.concept-glow .concept-topbar a {
  background: rgba(255,255,255,0.08);
  border-color: rgba(255,255,255,0.16);
}
.concept-glow .concept-topbar a[aria-current="page"],
.concept-glow .concept-actions a:first-child {
  color: #080b12;
  background: #f8fbff;
}
.concept-glow .concept-kicker {
  color: #061017;
  background: #14dcff;
}
.glow-hero {
  padding: 4rem 0 2rem;
}
.glow-hero-grid {
  display: grid;
  grid-template-columns: minmax(0, 0.78fr) minmax(360px, 1fr);
  gap: clamp(2rem, 5vw, 5rem);
  align-items: center;
}
.concept-glow .concept-hero p,
.concept-glow .concept-section p {
  color: rgba(248,251,255,0.72);
}
.glow-board {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  grid-auto-rows: 115px;
  gap: 0.9rem;
}
.glow-tile {
  position: relative;
  overflow: hidden;
  padding: 1rem;
  border-radius: 28px;
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.16);
  box-shadow: 0 0 38px rgba(20,220,255,0.12);
}
.glow-tile::after {
  content: "";
  position: absolute;
  inset: auto -20% -35% auto;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background: var(--glow, #14dcff);
  filter: blur(28px);
  opacity: 0.78;
}
.glow-tile b {
  position: relative;
  z-index: 2;
  display: block;
  font-size: 1.3rem;
}
.glow-large {
  grid-column: span 3;
  grid-row: span 2;
}
.glow-wide {
  grid-column: span 3;
}
.glow-small {
  grid-column: span 2;
}
.glow-section {
  padding: 5rem 0;
}
.glow-feature-row {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: 1rem;
  margin-top: 2rem;
}
.glow-feature {
  min-height: 360px;
  padding: 1.5rem;
  border-radius: 34px;
  background: linear-gradient(135deg, rgba(255,184,77,0.2), rgba(141,70,255,0.22));
  border: 1px solid rgba(255,255,255,0.16);
}
.glow-feature:last-child {
  background: linear-gradient(135deg, rgba(20,220,255,0.18), rgba(255,91,127,0.2));
}
.glow-feature h3 {
  margin: 0;
  font-size: clamp(2rem, 4vw, 3.6rem);
  line-height: 1;
}

/* 5. Curved Section Finish */
.concept-curves {
  --ink: #202018;
  --paper: #fff9ef;
  background: #fff9ef;
}
.concept-curves .concept-kicker {
  color: #fff;
  background: #315b4f;
}
.curves-hero {
  position: relative;
  min-height: 84vh;
  padding: 4rem 0 11rem;
  background: linear-gradient(135deg, #fff1d8, #f7b789);
  border-bottom-left-radius: 55% 12%;
  border-bottom-right-radius: 55% 12%;
}
.curves-hero-grid {
  display: grid;
  grid-template-columns: 1fr 0.78fr;
  gap: clamp(2rem, 5vw, 5rem);
  align-items: center;
}
.curves-stack {
  display: grid;
  gap: 1rem;
}
.curves-pill,
.curves-photo,
.curves-note {
  box-shadow: 0 26px 70px rgba(61,40,25,0.16);
}
.curves-photo {
  min-height: 330px;
  border-radius: 999px 999px 80px 80px;
  background:
    radial-gradient(circle at 32% 28%, rgba(255,255,255,0.85), transparent 7rem),
    linear-gradient(135deg, #315b4f, #f3c25c);
}
.curves-pill {
  padding: 1.1rem 1.3rem;
  border-radius: 999px;
  background: #fff9ef;
  font-weight: 900;
}
.curves-note {
  padding: 1.4rem;
  border-radius: 60px 22px 60px 22px;
  background: #202018;
  color: #fff;
}
.curves-band {
  padding: 7rem 0;
}
.curves-band.green {
  color: #fff;
  background: #315b4f;
  border-top-left-radius: 55% 10%;
  border-top-right-radius: 55% 10%;
  border-bottom-left-radius: 55% 10%;
  border-bottom-right-radius: 55% 10%;
}
.curves-band.green p {
  color: rgba(255,255,255,0.72);
}
.curves-cards {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 1rem;
  margin-top: 2rem;
}
.curves-cards article {
  min-height: 280px;
  padding: 1.4rem;
  border-radius: 120px 120px 26px 26px;
  background: rgba(255,255,255,0.16);
  border: 1px solid rgba(255,255,255,0.18);
}
.curves-cards b {
  display: block;
  margin-top: 9rem;
  font-size: 1.5rem;
}
.curves-final {
  display: grid;
  grid-template-columns: 0.9fr 1.1fr;
  gap: 1rem;
  align-items: stretch;
  margin-top: 2rem;
}
.curves-final div {
  min-height: 330px;
  padding: 1.5rem;
  border-radius: 32px 140px 32px 140px;
  background: #f6d594;
}
.curves-final div:last-child {
  border-radius: 140px 32px 140px 32px;
  background: #f4b38a;
}

/* 6. Modern Line Art */
.concept-line {
  --ink: #151922;
  --paper: #fbfbf5;
  background:
    linear-gradient(rgba(21,25,34,0.06) 1px, transparent 1px),
    linear-gradient(90deg, rgba(21,25,34,0.06) 1px, transparent 1px),
    #fbfbf5;
  background-size: 44px 44px;
}
.concept-line .concept-kicker {
  color: #fff;
  background: #2451ff;
}
.line-hero {
  padding: 4rem 0 5rem;
}
.line-hero-grid {
  display: grid;
  grid-template-columns: 1fr 0.8fr;
  gap: clamp(2rem, 5vw, 5rem);
  align-items: center;
}
.line-art {
  position: relative;
  min-height: 500px;
  border: 3px solid #151922;
  border-radius: 34px;
  background: rgba(255,255,255,0.72);
}
.line-art::before,
.line-art::after {
  content: "";
  position: absolute;
  border: 3px solid #2451ff;
  border-radius: 50%;
}
.line-art::before {
  width: 220px;
  height: 220px;
  top: 42px;
  left: 42px;
}
.line-art::after {
  width: 260px;
  height: 160px;
  right: 38px;
  bottom: 58px;
  border-color: #a8e93b;
  border-radius: 999px;
}
.line-squiggle {
  position: absolute;
  left: 12%;
  right: 12%;
  top: 52%;
  height: 5px;
  background: repeating-linear-gradient(90deg, #151922 0 26px, transparent 26px 42px);
  transform: rotate(-12deg);
}
.line-section {
  padding: 5rem 0;
  border-top: 3px solid #151922;
}
.line-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1rem;
  margin-top: 2rem;
}
.line-card {
  min-height: 240px;
  padding: 1rem;
  border: 3px solid #151922;
  border-radius: 26px;
  background: #fbfbf5;
}
.line-card span {
  display: block;
  width: 72px;
  height: 72px;
  margin-bottom: 5rem;
  border: 3px solid #2451ff;
  border-radius: 50% 50% 10px 50%;
}
.line-card:nth-child(even) span {
  border-color: #a8e93b;
  border-radius: 12px 50% 50% 50%;
}
.line-card b {
  font-size: 1.35rem;
}
.line-feature {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
  margin-top: 2rem;
}
.line-feature article {
  min-height: 320px;
  padding: 1.4rem;
  border: 3px solid #151922;
  border-radius: 34px;
  background:
    radial-gradient(circle at 90% 12%, #a8e93b 0 36px, transparent 38px),
    #fff;
}
.line-feature article:last-child {
  background:
    radial-gradient(circle at 12% 84%, #2451ff 0 36px, transparent 38px),
    #fff;
}
.line-feature h3 {
  margin: 0;
  font-size: clamp(2rem, 4vw, 3.5rem);
  line-height: 1;
}

@media (max-width: 980px) {
  .concept-topbar {
    align-items: flex-start;
    flex-direction: column;
  }
  .concept-nav {
    justify-content: flex-start;
  }
  .swoosh-hero-grid,
  .swoosh-story-grid,
  .glow-hero-grid,
  .glow-feature-row,
  .curves-hero-grid,
  .curves-final,
  .line-hero-grid,
  .line-feature {
    grid-template-columns: 1fr;
  }
  .swoosh-list,
  .curves-cards {
    grid-template-columns: 1fr 1fr;
  }
  .glow-board {
    grid-template-columns: repeat(4, 1fr);
  }
  .glow-large,
  .glow-wide,
  .glow-small {
    grid-column: span 2;
  }
  .line-grid {
    grid-template-columns: 1fr 1fr;
  }
}
@media (max-width: 640px) {
  .concept-shell {
    width: min(100% - 24px, 1180px);
  }
  .concept-hero h1 {
    font-size: clamp(2.4rem, 15vw, 4.5rem);
  }
  .swoosh-hero,
  .curves-hero {
    min-height: auto;
    padding-bottom: 7rem;
  }
  .swoosh-list,
  .curves-cards,
  .glow-board,
  .line-grid {
    grid-template-columns: 1fr;
  }
  .glow-large,
  .glow-wide,
  .glow-small {
    grid-column: auto;
  }
  .glow-board {
    grid-auto-rows: minmax(140px, auto);
  }
  .line-art {
    min-height: 360px;
  }
}
</style>

<main class="layout-concept <?php echo esc_attr( $sample['class'] ); ?>">
  <div class="concept-shell">
    <nav class="concept-topbar" aria-label="Layout sample navigation">
      <a href="<?php echo esc_url( home_url( '/layout-samples' ) ); ?>">All samples</a>
      <div class="concept-nav">
        <?php foreach ( $samples as $number => $item ) : ?>
          <a href="<?php echo esc_url( home_url( '/layout-samples' . $number ) ); ?>" <?php echo $number === $variant ? 'aria-current="page"' : ''; ?>>
            <?php echo esc_html( $number . '. ' . $item['name'] ); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </nav>
  </div>

  <?php if ( '3' === $variant ) : ?>
    <section class="concept-hero swoosh-hero">
      <div class="concept-shell swoosh-hero-grid">
        <div>
          <span class="concept-kicker"><?php echo esc_html( $sample['palette'] ); ?></span>
          <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
          <p><?php echo esc_html( $sample['intro'] ); ?></p>
          <div class="concept-actions">
            <a href="#swoosh-sections"><?php echo esc_html( $sample['primary'] ); ?></a>
            <a href="#swoosh-story"><?php echo esc_html( $sample['secondary'] ); ?></a>
          </div>
        </div>
        <div class="swoosh-visual" aria-hidden="true">
          <span class="swoosh-ribbon"></span>
          <div class="swoosh-card"><strong>Sunday<br>10:30</strong><p>Visitor-first panel over the flowing hero shape.</p></div>
        </div>
      </div>
    </section>
    <section class="concept-section swoosh-band" id="swoosh-sections">
      <div class="concept-shell">
        <h2>Each section ends with a confident swoosh.</h2>
        <p>The page has visual momentum without relying on heavy photos. Useful for a friendly church homepage with clear movement between content bands.</p>
        <div class="swoosh-list">
          <article><b>Welcome</b><p>First-visit content sits in a soft curved card.</p></article>
          <article><b>Worship</b><p>Sunday details get a bold dark band.</p></article>
          <article><b>Next steps</b><p>Groups and serving flow into action.</p></article>
        </div>
      </div>
    </section>
    <section class="concept-section swoosh-story" id="swoosh-story">
      <div class="concept-shell swoosh-story-grid">
        <div class="swoosh-photo" aria-hidden="true"></div>
        <div>
          <h2>Great for a lively, family-friendly identity.</h2>
          <p>The swoosh language can carry across homepage, branch pages, kids pages and event banners, giving the website an ownable visual signature.</p>
        </div>
      </div>
    </section>
  <?php elseif ( '4' === $variant ) : ?>
    <section class="concept-hero glow-hero">
      <div class="concept-shell glow-hero-grid">
        <div>
          <span class="concept-kicker"><?php echo esc_html( $sample['palette'] ); ?></span>
          <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
          <p><?php echo esc_html( $sample['intro'] ); ?></p>
          <div class="concept-actions">
            <a href="#glow-board"><?php echo esc_html( $sample['primary'] ); ?></a>
            <a href="#glow-events"><?php echo esc_html( $sample['secondary'] ); ?></a>
          </div>
        </div>
        <div class="glow-board" id="glow-board">
          <article class="glow-tile glow-large" style="--glow:#14dcff"><b>Latest message</b></article>
          <article class="glow-tile glow-small" style="--glow:#ffb84d"><b>Alpha</b></article>
          <article class="glow-tile glow-small" style="--glow:#ff5b7f"><b>Youth night</b></article>
          <article class="glow-tile glow-wide" style="--glow:#8d46ff"><b>Sunday gathering</b></article>
          <article class="glow-tile glow-small" style="--glow:#14dcff"><b>Prayer</b></article>
          <article class="glow-tile glow-small" style="--glow:#ffb84d"><b>Serve</b></article>
        </div>
      </div>
    </section>
    <section class="concept-section glow-section" id="glow-events">
      <div class="concept-shell">
        <h2>Glow tiles create a digital noticeboard.</h2>
        <p>Cards can expand, collapse and reorder around priority content, making it suitable for sermons, events, giving, branches and campaigns.</p>
        <div class="glow-feature-row">
          <article class="glow-feature"><h3>Media led homepage</h3><p>Large glowing modules make new sermons and event highlights feel current.</p></article>
          <article class="glow-feature"><h3>Fast choices</h3><p>Visitors scan the board and jump straight into the next action.</p></article>
        </div>
      </div>
    </section>
  <?php elseif ( '5' === $variant ) : ?>
    <section class="concept-hero curves-hero">
      <div class="concept-shell curves-hero-grid">
        <div>
          <span class="concept-kicker"><?php echo esc_html( $sample['palette'] ); ?></span>
          <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
          <p><?php echo esc_html( $sample['intro'] ); ?></p>
          <div class="concept-actions">
            <a href="#curved-community"><?php echo esc_html( $sample['primary'] ); ?></a>
            <a href="#curved-groups"><?php echo esc_html( $sample['secondary'] ); ?></a>
          </div>
        </div>
        <div class="curves-stack" aria-hidden="true">
          <div class="curves-pill">A softer church homepage</div>
          <div class="curves-photo"></div>
          <div class="curves-note">Curved panels for welcome, care and stories.</div>
        </div>
      </div>
    </section>
    <section class="concept-section curves-band green" id="curved-community">
      <div class="concept-shell">
        <h2>Curved finishes make each band feel intentional.</h2>
        <p>This style is warmer and more human than a grid-only layout, with strong section identity for community stories and ministries.</p>
        <div class="curves-cards">
          <article><b>Families</b><p>Rounded ministry panels.</p></article>
          <article><b>Care</b><p>Soft story-focused sections.</p></article>
          <article><b>Outreach</b><p>Warm activity highlights.</p></article>
        </div>
      </div>
    </section>
    <section class="concept-section" id="curved-groups">
      <div class="concept-shell">
        <h2>Better for storytelling and belonging.</h2>
        <div class="curves-final">
          <div><h3>Community pathways</h3><p>Large rounded panels can introduce groups, teams and care ministries.</p></div>
          <div><h3>Visitor confidence</h3><p>Soft visual transitions make long pages feel less rigid on mobile.</p></div>
        </div>
      </div>
    </section>
  <?php else : ?>
    <section class="concept-hero line-hero">
      <div class="concept-shell line-hero-grid">
        <div>
          <span class="concept-kicker"><?php echo esc_html( $sample['palette'] ); ?></span>
          <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
          <p><?php echo esc_html( $sample['intro'] ); ?></p>
          <div class="concept-actions">
            <a href="#line-sections"><?php echo esc_html( $sample['primary'] ); ?></a>
            <a href="#line-modules"><?php echo esc_html( $sample['secondary'] ); ?></a>
          </div>
        </div>
        <div class="line-art" aria-hidden="true"><span class="line-squiggle"></span></div>
      </div>
    </section>
    <section class="concept-section line-section" id="line-sections">
      <div class="concept-shell">
        <h2>Line art finishes give each section a modern drawn edge.</h2>
        <p>This approach uses strokes, frames, simple symbols and modular illustrations instead of heavy gradients or decorative photos.</p>
        <div class="line-grid">
          <article class="line-card"><span></span><b>Branches</b></article>
          <article class="line-card"><span></span><b>Sermons</b></article>
          <article class="line-card"><span></span><b>Groups</b></article>
          <article class="line-card"><span></span><b>Serve</b></article>
        </div>
      </div>
    </section>
    <section class="concept-section line-section" id="line-modules">
      <div class="concept-shell">
        <h2>Premium, clean and very flexible.</h2>
        <div class="line-feature">
          <article><h3>Drawn section dividers</h3><p>Custom line motifs can finish each section without making the site feel busy.</p></article>
          <article><h3>Strong content hierarchy</h3><p>Useful for a website with many branches, ministries and repeated information blocks.</p></article>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <div class="concept-shell sample-footer-nav">
    <a href="<?php echo esc_url( home_url( '/layout-samples' . $prev ) ); ?>">Previous sample</a>
    <a href="<?php echo esc_url( home_url( '/layout-samples' . $next ) ); ?>">Next sample</a>
  </div>
</main>

<?php get_footer(); ?>
