<?php
/**
 * Template Name: Layout Sample Variant
 * Description: LPC layout concepts inspired by contemporary church websites.
 */
get_header();

$variant = function_exists( 'lpc_layout_sample_variant' ) ? lpc_layout_sample_variant() : '3';

$samples = [
    '3' => [
        'class'     => 'sample-river',
        'name'      => 'River Valley Inspired',
        'source'    => 'Around church cards, location grid, action-led hero',
        'headline'  => 'One church with clear next steps for every visitor.',
        'intro'     => 'A homepage direction inspired by River Valley: simple top actions, a compact hero, cards for what is happening, and a strong multi-location section.',
        'primary'   => 'Plan a visit',
        'secondary' => 'See locations',
    ],
    '4' => [
        'class'     => 'sample-brooklake',
        'name'      => 'Brooklake Inspired',
        'source'    => 'Large welcome type, collage strip, human story blocks',
        'headline'  => 'Everyone is welcome. Everyone has a next step.',
        'intro'     => 'A people-first direction inspired by Brooklake with generous type, a contained image collage, repeated welcome messaging, and simple story sections.',
        'primary'   => 'Visit this Sunday',
        'secondary' => 'Watch online',
    ],
    '5' => [
        'class'     => 'sample-vous',
        'name'      => 'VOUS Inspired',
        'source'    => 'Editorial media panels, sermon focus, city locations',
        'headline'  => 'A bold media-led church homepage with city energy.',
        'intro'     => 'A VOUS-inspired direction with dark editorial panels, sermon-first content, location cards, and a punchy community section.',
        'primary'   => 'Latest message',
        'secondary' => 'Visit LPC',
    ],
    '6' => [
        'class'     => 'sample-stone',
        'name'      => 'Austin Stone Inspired',
        'source'    => 'Stacked typography, image strips, dense ministry/media modules',
        'headline'  => 'One church. Multiple congregations. One shared mission.',
        'intro'     => 'An Austin Stone-inspired direction using stacked statements, measured photo strips, and structured modules for media, ministries and locations.',
        'primary'   => 'Choose a branch',
        'secondary' => 'Get involved',
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
.layout-ref {
  --ink: #111111;
  --paper: #f7f2e8;
  min-height: 100vh;
  overflow: hidden;
  color: var(--ink);
  background: var(--paper);
}
.layout-ref * {
  box-sizing: border-box;
}
.ref-shell {
  width: min(1180px, calc(100% - 32px));
  margin: 0 auto;
}
.ref-nav {
  position: relative;
  z-index: 20;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  padding: 1.2rem 0;
}
.ref-links {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
  gap: 0.5rem;
}
.ref-nav a,
.ref-actions a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 42px;
  padding: 0.75rem 1rem;
  border-radius: 999px;
  color: inherit;
  text-decoration: none;
  font-weight: 900;
  background: rgba(255,255,255,0.65);
  border: 1px solid rgba(17,17,17,0.14);
}
.ref-nav a[aria-current="page"] {
  color: #fff;
  background: var(--ink);
}
.ref-kicker {
  display: inline-flex;
  margin-bottom: 1rem;
  padding: 0.42rem 0.72rem;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 900;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  background: rgba(255,255,255,0.7);
}
.ref-hero h1 {
  max-width: 850px;
  margin: 0;
  font-size: clamp(2.7rem, 7.4vw, 6.8rem);
  line-height: 0.92;
  letter-spacing: 0;
}
.ref-hero p,
.ref-section p {
  max-width: 620px;
  color: rgba(17,17,17,0.72);
  font-size: clamp(1rem, 1.8vw, 1.18rem);
  line-height: 1.66;
}
.ref-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 0.8rem;
  margin-top: 2rem;
}
.ref-actions a:first-child {
  color: #fff;
  background: var(--ink);
}
.ref-section {
  padding: clamp(3.5rem, 7vw, 6rem) 0;
}
.ref-section h2 {
  max-width: 820px;
  margin: 0 0 1rem;
  font-size: clamp(2.1rem, 4.8vw, 4.5rem);
  line-height: 0.98;
}
.fake-photo,
.photo-tile,
.image-card {
  position: relative;
  overflow: hidden;
  background:
    radial-gradient(circle at 25% 24%, rgba(255,255,255,0.92), transparent 0 55px, transparent 56px),
    linear-gradient(135deg, var(--photo-a), var(--photo-b) 52%, var(--photo-c));
}
.fake-photo::before,
.photo-tile::before,
.image-card::before {
  content: "";
  position: absolute;
  inset: 12%;
  border-radius: inherit;
  border: 1px solid rgba(255,255,255,0.46);
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

/* 3. River Valley inspired */
.sample-river {
  --ink: #17241f;
  --paper: #f4f1e7;
  --photo-a: #79b4a9;
  --photo-b: #f2d36b;
  --photo-c: #e16f54;
}
.river-hero {
  min-height: 76vh;
  padding: 4rem 0 3rem;
}
.river-hero-grid {
  display: grid;
  grid-template-columns: minmax(0, 0.92fr) minmax(320px, 0.72fr);
  gap: clamp(2rem, 5vw, 4.5rem);
  align-items: center;
}
.river-hero .fake-photo {
  min-height: min(62vh, 520px);
  border-radius: 36px;
  box-shadow: 0 28px 80px rgba(0,0,0,0.16);
}
.river-quick {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0.75rem;
  margin-top: 2rem;
}
.river-quick div,
.river-card,
.river-location {
  background: #fffdf7;
  border: 1px solid rgba(23,36,31,0.12);
  box-shadow: 0 18px 48px rgba(23,36,31,0.08);
}
.river-quick div {
  padding: 1rem;
  border-radius: 18px;
  font-weight: 900;
}
.river-cards,
.river-locations {
  display: grid;
  gap: 1rem;
  margin-top: 2rem;
}
.river-cards {
  grid-template-columns: repeat(3, 1fr);
}
.river-card {
  min-height: 260px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 1.25rem;
  border-radius: 24px;
}
.river-card span {
  font-size: 12px;
  font-weight: 900;
  letter-spacing: 0.08em;
  text-transform: uppercase;
}
.river-card b {
  font-size: 1.5rem;
}
.river-locations {
  grid-template-columns: repeat(4, 1fr);
}
.river-location {
  overflow: hidden;
  border-radius: 22px;
}
.river-location .photo-tile {
  min-height: 150px;
}
.river-location div:last-child {
  padding: 1rem;
}

/* 4. Brooklake inspired */
.sample-brooklake {
  --ink: #201c17;
  --paper: #fff8ee;
  --photo-a: #f7c963;
  --photo-b: #e78370;
  --photo-c: #385b4f;
}
.brook-hero {
  min-height: 78vh;
  padding: 3.5rem 0 2.5rem;
}
.brook-title {
  display: grid;
  grid-template-columns: 1fr minmax(300px, 0.55fr);
  gap: 2rem;
  align-items: end;
}
.brook-title h1 {
  max-width: 980px;
  font-size: clamp(3rem, 9vw, 8.6rem);
}
.brook-service {
  padding: 1.2rem;
  border-radius: 24px;
  background: #201c17;
  color: #fff;
}
.brook-collage {
  display: grid;
  grid-template-columns: 1.1fr 0.7fr 0.9fr 0.7fr;
  grid-auto-rows: minmax(160px, 19vh);
  gap: 0.8rem;
  max-height: 58vh;
  margin-top: 2rem;
}
.brook-collage .image-card {
  border-radius: 28px;
}
.brook-collage .image-card:first-child {
  grid-row: span 2;
}
.brook-beliefs {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
  margin-top: 2rem;
}
.brook-beliefs article {
  min-height: 220px;
  padding: 1.3rem;
  border-radius: 32px;
  background: #201c17;
  color: #fff8ee;
}
.brook-beliefs b {
  display: block;
  font-size: 1.7rem;
  line-height: 1.08;
}
.brook-story {
  display: grid;
  grid-template-columns: 0.8fr 1fr;
  gap: 2rem;
  align-items: center;
}
.brook-story .fake-photo {
  min-height: min(58vh, 520px);
  border-radius: 44px;
}

/* 5. VOUS inspired */
.sample-vous {
  --ink: #f7f4e8;
  --paper: #070707;
  --photo-a: #ff6b3d;
  --photo-b: #fff05a;
  --photo-c: #2b6df6;
  background: #070707;
}
.sample-vous .ref-nav a {
  background: rgba(255,255,255,0.08);
  border-color: rgba(255,255,255,0.15);
}
.sample-vous .ref-nav a[aria-current="page"],
.sample-vous .ref-actions a:first-child {
  color: #070707;
  background: #f7f4e8;
}
.sample-vous .ref-kicker {
  color: #070707;
  background: #fff05a;
}
.sample-vous .ref-hero p,
.sample-vous .ref-section p {
  color: rgba(247,244,232,0.72);
}
.vous-hero {
  min-height: 76vh;
  padding: 4rem 0 3rem;
}
.vous-hero-grid {
  display: grid;
  grid-template-columns: minmax(0, 0.8fr) minmax(330px, 0.8fr);
  gap: clamp(2rem, 5vw, 5rem);
  align-items: center;
}
.vous-media {
  max-height: 64vh;
  display: grid;
  grid-template-columns: 1fr 0.72fr;
  gap: 0.8rem;
}
.vous-media .image-card {
  min-height: 220px;
  border-radius: 8px;
}
.vous-media .image-card:first-child {
  min-height: min(64vh, 540px);
}
.vous-sermon {
  padding: 2rem 0;
  border-top: 1px solid rgba(255,255,255,0.16);
  border-bottom: 1px solid rgba(255,255,255,0.16);
}
.vous-sermon-grid,
.vous-locations {
  display: grid;
  gap: 1rem;
  margin-top: 2rem;
}
.vous-sermon-grid {
  grid-template-columns: 1.2fr 0.8fr;
}
.vous-panel,
.vous-location {
  padding: 1.4rem;
  border-radius: 8px;
  background: #151515;
  border: 1px solid rgba(255,255,255,0.14);
}
.vous-panel h3 {
  margin: 0;
  font-size: clamp(2rem, 5vw, 4.8rem);
  line-height: 0.95;
}
.vous-locations {
  grid-template-columns: repeat(5, 1fr);
}
.vous-location {
  min-height: 180px;
}

/* 6. Austin Stone inspired */
.sample-stone {
  --ink: #12161c;
  --paper: #f8f5ed;
  --photo-a: #bcd2c7;
  --photo-b: #d7b45f;
  --photo-c: #5b6c83;
}
.stone-hero {
  min-height: 76vh;
  padding: 4rem 0 2rem;
}
.stone-hero h1 {
  max-width: 1040px;
  font-size: clamp(3rem, 8vw, 8rem);
}
.stone-lines {
  margin-top: 1rem;
}
.stone-lines span {
  display: block;
  border-top: 1px solid rgba(18,22,28,0.28);
  padding: 0.45rem 0;
  font-size: clamp(2rem, 5vw, 5rem);
  font-weight: 900;
  line-height: 1;
}
.stone-strip {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 0.75rem;
  max-height: 48vh;
  margin-top: 2rem;
}
.stone-strip .image-card {
  min-height: min(42vh, 330px);
  border-radius: 22px;
}
.stone-strip .image-card:nth-child(even) {
  margin-top: 2rem;
}
.stone-modules {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
  margin-top: 2rem;
}
.stone-module {
  min-height: 330px;
  padding: 1.4rem;
  border-radius: 28px;
  background: #fffdf7;
  border: 1px solid rgba(18,22,28,0.12);
}
.stone-module h3 {
  margin: 0;
  font-size: clamp(2rem, 4vw, 3.7rem);
  line-height: 1;
}
.stone-media-list {
  display: grid;
  gap: 0.6rem;
  margin-top: 1.5rem;
}
.stone-media-list div {
  display: flex;
  justify-content: space-between;
  gap: 1rem;
  padding: 0.9rem 0;
  border-top: 1px solid rgba(18,22,28,0.16);
}

@media (max-width: 980px) {
  .ref-nav,
  .brook-title {
    align-items: flex-start;
    flex-direction: column;
  }
  .ref-links {
    justify-content: flex-start;
  }
  .river-hero-grid,
  .brook-title,
  .brook-story,
  .vous-hero-grid,
  .vous-sermon-grid {
    grid-template-columns: 1fr;
  }
  .river-cards,
  .river-locations,
  .brook-beliefs,
  .vous-locations,
  .stone-modules {
    grid-template-columns: 1fr 1fr;
  }
  .brook-collage,
  .stone-strip {
    grid-template-columns: repeat(3, 1fr);
    max-height: none;
  }
}
@media (max-width: 640px) {
  .ref-shell {
    width: min(100% - 24px, 1180px);
  }
  .river-quick,
  .river-cards,
  .river-locations,
  .brook-beliefs,
  .brook-collage,
  .vous-media,
  .vous-locations,
  .stone-strip,
  .stone-modules {
    grid-template-columns: 1fr;
  }
  .brook-collage .image-card:first-child {
    grid-row: auto;
  }
  .vous-media .image-card:first-child,
  .river-hero .fake-photo,
  .brook-story .fake-photo {
    min-height: 360px;
  }
  .stone-strip .image-card:nth-child(even) {
    margin-top: 0;
  }
}
</style>

<main class="layout-ref <?php echo esc_attr( $sample['class'] ); ?>">
  <div class="ref-shell">
    <nav class="ref-nav" aria-label="Layout sample navigation">
      <a href="<?php echo esc_url( home_url( '/layout-samples' ) ); ?>">All samples</a>
      <div class="ref-links">
        <?php foreach ( $samples as $number => $item ) : ?>
          <a href="<?php echo esc_url( home_url( '/layout-samples' . $number ) ); ?>" <?php echo $number === $variant ? 'aria-current="page"' : ''; ?>>
            <?php echo esc_html( $number . '. ' . $item['name'] ); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </nav>
  </div>

  <?php if ( '3' === $variant ) : ?>
    <section class="ref-hero river-hero">
      <div class="ref-shell river-hero-grid">
        <div>
          <span class="ref-kicker"><?php echo esc_html( $sample['source'] ); ?></span>
          <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
          <p><?php echo esc_html( $sample['intro'] ); ?></p>
          <div class="ref-actions">
            <a href="#river-locations"><?php echo esc_html( $sample['primary'] ); ?></a>
            <a href="#river-around"><?php echo esc_html( $sample['secondary'] ); ?></a>
          </div>
          <div class="river-quick">
            <div>Visit</div><div>Watch</div><div>Give</div><div>Connect</div>
          </div>
        </div>
        <div class="fake-photo" aria-label="Generated church welcome photo treatment"></div>
      </div>
    </section>
    <section class="ref-section" id="river-around">
      <div class="ref-shell">
        <h2>Around LPC</h2>
        <p>Inspired by River Valley's quick “around church” flow: high-priority cards before the visitor reaches deeper content.</p>
        <div class="river-cards">
          <article class="river-card"><span>Message</span><b>Recent message</b><p>Watch the latest teaching from Sunday.</p></article>
          <article class="river-card"><span>June</span><b>Summer connect</b><p>Clear event cards for seasonal priorities.</p></article>
          <article class="river-card"><span>Serve</span><b>Join a team</b><p>Move people from interest to action.</p></article>
        </div>
      </div>
    </section>
    <section class="ref-section" id="river-locations">
      <div class="ref-shell">
        <h2>One church, multiple locations</h2>
        <div class="river-locations">
          <?php foreach ( [ 'Croydon', 'Bromley', 'Online', 'South London' ] as $location ) : ?>
            <article class="river-location">
              <div class="photo-tile"></div>
              <div><b><?php echo esc_html( $location ); ?></b><p>Sunday 10:30 AM</p></div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php elseif ( '4' === $variant ) : ?>
    <section class="ref-hero brook-hero">
      <div class="ref-shell">
        <div class="brook-title">
          <div>
            <span class="ref-kicker"><?php echo esc_html( $sample['source'] ); ?></span>
            <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
            <p><?php echo esc_html( $sample['intro'] ); ?></p>
            <div class="ref-actions">
              <a href="#brook-story"><?php echo esc_html( $sample['primary'] ); ?></a>
              <a href="#brook-sermon"><?php echo esc_html( $sample['secondary'] ); ?></a>
            </div>
          </div>
          <aside class="brook-service"><b>Sunday gatherings</b><p>9 AM, 11 AM and online</p></aside>
        </div>
        <div class="brook-collage" aria-label="Generated image collage treatment">
          <div class="image-card"></div><div class="image-card"></div><div class="image-card"></div><div class="image-card"></div><div class="image-card"></div>
        </div>
      </div>
    </section>
    <section class="ref-section">
      <div class="ref-shell">
        <div class="brook-beliefs">
          <article><b>Everyone is welcome.</b><p>Simple statement cards, repeated clearly.</p></article>
          <article><b>Everyone has a next step.</b><p>Connect pathways without complexity.</p></article>
          <article><b>Everyone can make a difference.</b><p>Serving and community are visible early.</p></article>
        </div>
      </div>
    </section>
    <section class="ref-section" id="brook-story">
      <div class="ref-shell brook-story">
        <div class="fake-photo"></div>
        <div><h2>People just like you</h2><p>A Brooklake-style story section pairs a contained human image with approachable copy, keeping the image below 70% of the viewport height.</p></div>
      </div>
    </section>
    <section class="ref-section" id="brook-sermon">
      <div class="ref-shell"><h2>Watch the latest sermon</h2><p>A simple media prompt sits after the welcome story, creating an easy path for visitors who want to watch before attending.</p></div>
    </section>
  <?php elseif ( '5' === $variant ) : ?>
    <section class="ref-hero vous-hero">
      <div class="ref-shell vous-hero-grid">
        <div>
          <span class="ref-kicker"><?php echo esc_html( $sample['source'] ); ?></span>
          <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
          <p><?php echo esc_html( $sample['intro'] ); ?></p>
          <div class="ref-actions">
            <a href="#vous-sermon"><?php echo esc_html( $sample['primary'] ); ?></a>
            <a href="#vous-locations"><?php echo esc_html( $sample['secondary'] ); ?></a>
          </div>
        </div>
        <div class="vous-media" aria-label="Generated editorial media treatment">
          <div class="image-card"></div><div class="image-card"></div><div class="image-card"></div>
        </div>
      </div>
    </section>
    <section class="ref-section vous-sermon" id="vous-sermon">
      <div class="ref-shell">
        <h2>Latest at LPC</h2>
        <div class="vous-sermon-grid">
          <article class="vous-panel"><h3>Better together</h3><p>Large sermon/event panels inspired by VOUS editorial modules.</p></article>
          <article class="vous-panel"><h3>Give now</h3><p>A secondary action panel for campaigns, care or giving.</p></article>
        </div>
      </div>
    </section>
    <section class="ref-section" id="vous-locations">
      <div class="ref-shell">
        <h2>Visit LPC</h2>
        <div class="vous-locations">
          <?php foreach ( [ 'Croydon', 'Bromley', 'Online', 'Kids', 'Crews' ] as $label ) : ?>
            <article class="vous-location"><b><?php echo esc_html( $label ); ?></b><p>Sunday rhythm and next-step details.</p></article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php else : ?>
    <section class="ref-hero stone-hero">
      <div class="ref-shell">
        <span class="ref-kicker"><?php echo esc_html( $sample['source'] ); ?></span>
        <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
        <p><?php echo esc_html( $sample['intro'] ); ?></p>
        <div class="ref-actions">
          <a href="#stone-modules"><?php echo esc_html( $sample['primary'] ); ?></a>
          <a href="#stone-media"><?php echo esc_html( $sample['secondary'] ); ?></a>
        </div>
        <div class="stone-lines" aria-hidden="true"><span>We are</span><span>one church</span><span>many communities</span></div>
        <div class="stone-strip" aria-label="Generated photo strip treatment">
          <div class="image-card"></div><div class="image-card"></div><div class="image-card"></div><div class="image-card"></div><div class="image-card"></div><div class="image-card"></div>
        </div>
      </div>
    </section>
    <section class="ref-section" id="stone-modules">
      <div class="ref-shell">
        <h2>Structured paths for ministries and media</h2>
        <div class="stone-modules">
          <article class="stone-module"><h3>What's happening</h3><p>Classes, events and serving opportunities are grouped in a dense but readable module.</p></article>
          <article class="stone-module" id="stone-media"><h3>Latest from media</h3><div class="stone-media-list"><div><b>Articles</b><span>View</span></div><div><b>Music</b><span>View</span></div><div><b>Sermons</b><span>View</span></div></div></article>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <div class="ref-shell sample-footer-nav">
    <a href="<?php echo esc_url( home_url( '/layout-samples' . $prev ) ); ?>">Previous sample</a>
    <a href="<?php echo esc_url( home_url( '/layout-samples' . $next ) ); ?>">Next sample</a>
  </div>
</main>

<?php get_footer(); ?>
