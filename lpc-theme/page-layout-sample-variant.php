<?php
/**
 * Template Name: Layout Sample Variant
 * Description: Visually distinct sacred LPC layout concepts.
 */
get_header();

$variant = function_exists( 'lpc_layout_sample_variant' ) ? lpc_layout_sample_variant() : '3';

$samples = [
    '3' => [
        'class'     => 'concept-river',
        'name'      => 'Royal Blue Sanctuary',
        'reference' => 'River Valley inspired: action-led hero, clear cards, location grid',
        'headline'  => 'A clear path for every visitor to find their place.',
        'intro'     => 'A practical church homepage with a royal blue sanctuary feel, bright white spacing and gold action points.',
        'primary'   => 'Plan your visit',
        'secondary' => 'Find a branch',
    ],
    '4' => [
        'class'     => 'concept-brook',
        'name'      => 'Royal Purple Welcome',
        'reference' => 'Brooklake inspired: large welcome statement, warm collage, story blocks',
        'headline'  => 'Everyone is welcome. Everyone has a next step.',
        'intro'     => 'A warmer people-first direction with royal purple, cream, gold and a contained image collage.',
        'primary'   => 'Visit this Sunday',
        'secondary' => 'Watch online',
    ],
    '5' => [
        'class'     => 'concept-vous',
        'name'      => 'Gold Editorial Worship',
        'reference' => 'VOUS inspired: bold editorial media, sermon focus, city rhythm',
        'headline'  => 'A bold worship-first homepage with holy energy.',
        'intro'     => 'A high-contrast editorial concept using black, white and luminous gold for sermons, events and worship moments.',
        'primary'   => 'Latest message',
        'secondary' => 'What is on',
    ],
    '6' => [
        'class'     => 'concept-stone',
        'name'      => 'White Mission Lines',
        'reference' => 'Austin Stone inspired: stacked mission type, photo strip, dense modules',
        'headline'  => 'One church. Many communities. One mission.',
        'intro'     => 'A calm, premium white layout with blue and purple linework, documentary image strips and structured ministry modules.',
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

function lpc_sample_img( $seed, $label = '' ) {
    $label_attr = $label ? ' aria-label="' . esc_attr( $label ) . '"' : ' aria-hidden="true"';
    return '<div class="sample-photo photo-' . esc_attr( $seed ) . '"' . $label_attr . '><span></span><i></i><b></b></div>';
}
?>

<style>
.sacred-sample {
  --ink: #111111;
  --paper: #ffffff;
  min-height: 100vh;
  overflow: hidden;
  color: var(--ink);
  background: var(--paper);
}
.sacred-sample * {
  box-sizing: border-box;
}
.sample-shell {
  width: min(1180px, calc(100% - 32px));
  margin: 0 auto;
}
.sample-nav {
  position: relative;
  z-index: 10;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  padding: 1rem 0;
}
.sample-nav-links {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
  gap: 0.45rem;
}
.sample-nav a,
.sample-actions a {
  min-height: 42px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0.72rem 1rem;
  color: inherit;
  text-decoration: none;
  font-weight: 900;
}
.sample-nav a {
  border-radius: 999px;
  background: rgba(255,255,255,0.76);
  border: 1px solid rgba(17,17,17,0.14);
}
.sample-nav a[aria-current="page"] {
  color: #fff;
  background: var(--ink);
}
.sample-kicker {
  display: inline-flex;
  margin-bottom: 1rem;
  padding: 0.42rem 0.72rem;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 900;
  letter-spacing: 0.1em;
  text-transform: uppercase;
}
.sample-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  margin-top: 1.8rem;
}
.sample-actions a:first-child {
  color: #fff;
  background: var(--ink);
}
.sample-actions a:last-child {
  background: rgba(255,255,255,0.72);
  border: 1px solid rgba(17,17,17,0.14);
}
.sample-photo {
  position: relative;
  overflow: hidden;
  background:
    radial-gradient(circle at 42% 20%, rgba(255,255,255,0.92) 0 34px, transparent 36px),
    linear-gradient(135deg, var(--a), var(--b) 52%, var(--c));
}
.sample-photo::before {
  content: "";
  position: absolute;
  left: 12%;
  right: 12%;
  bottom: 12%;
  height: 38%;
  border-radius: 50% 50% 0 0;
  background: rgba(255,255,255,0.24);
}
.sample-photo::after {
  content: "";
  position: absolute;
  inset: 10%;
  border: 1px solid rgba(255,255,255,0.52);
}
.sample-photo span,
.sample-photo i,
.sample-photo b {
  position: absolute;
  display: block;
  border-radius: 999px 999px 12px 12px;
  background: rgba(255,255,255,0.74);
}
.sample-photo span {
  width: 46px;
  height: 78px;
  left: 28%;
  bottom: 16%;
}
.sample-photo i {
  width: 40px;
  height: 68px;
  left: 46%;
  bottom: 15%;
}
.sample-photo b {
  width: 50px;
  height: 86px;
  left: 62%;
  bottom: 14%;
}
.photo-a { --a: #0d3b9e; --b: #f2c94c; --c: #ffffff; }
.photo-b { --a: #51208a; --b: #f8d26a; --c: #fff2dd; }
.photo-c { --a: #050505; --b: #e9b949; --c: #ffffff; }
.photo-d { --a: #f8fbff; --b: #2d55d4; --c: #6d35a8; }
.photo-e { --a: #143a7b; --b: #8f6bff; --c: #f6f1e2; }
.photo-f { --a: #fff7df; --b: #d3a128; --c: #29145b; }
.sample-section {
  padding: clamp(3.5rem, 7vw, 6.2rem) 0;
}
.sample-section h2 {
  margin: 0 0 1rem;
  font-size: clamp(2.2rem, 5vw, 4.8rem);
  line-height: 0.96;
  letter-spacing: 0;
}
.sample-section p {
  max-width: 660px;
  line-height: 1.66;
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

/* 3. Royal Blue Sanctuary */
.concept-river {
  --ink: #061a44;
  --paper: #f8fbff;
  background:
    radial-gradient(circle at 88% 18%, rgba(242,201,76,0.38), transparent 20rem),
    linear-gradient(180deg, #061a44 0%, #08276b 76vh, #f8fbff 76vh, #eef4ff 100%);
  background-size: auto;
}
.river-hero {
  min-height: 76vh;
  display: grid;
  align-items: center;
  padding: 3rem 0 4rem;
}
.river-grid {
  display: grid;
  grid-template-columns: minmax(0, 0.9fr) minmax(320px, 0.72fr);
  gap: clamp(2rem, 5vw, 5rem);
  align-items: center;
}
.concept-river .sample-kicker {
  color: #061a44;
  background: #f2c94c;
}
.concept-river .sample-nav a {
  color: #061a44;
}
.concept-river .sample-nav a[aria-current="page"] {
  color: #061a44;
  background: #f2c94c;
}
.river-copy h1 {
  margin: 0;
  max-width: 760px;
  color: #ffffff;
  font-size: clamp(3rem, 7vw, 6.8rem);
  line-height: 0.9;
  letter-spacing: 0;
}
.river-copy p {
  max-width: 580px;
  color: rgba(255,255,255,0.76);
  font-size: 1.12rem;
  line-height: 1.7;
}
.concept-river .sample-actions a:first-child {
  color: #061a44;
  background: #f2c94c;
}
.concept-river .sample-actions a:last-child {
  color: #ffffff;
  background: rgba(255,255,255,0.1);
  border-color: rgba(255,255,255,0.22);
}
.river-photo-wrap {
  position: relative;
}
.river-photo-wrap .sample-photo {
  height: min(62vh, 520px);
  border-radius: 26px;
  box-shadow: 0 28px 70px rgba(6,26,68,0.18);
}
.river-badge {
  position: absolute;
  left: -28px;
  bottom: 30px;
  max-width: 210px;
  padding: 1rem;
  border-radius: 20px;
  color: #061a44;
  background: #ffffff;
  box-shadow: 0 18px 48px rgba(6,26,68,0.18);
}
.river-actions {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0.75rem;
  margin-top: 2rem;
}
.river-actions div,
.river-card,
.river-location {
  background: #ffffff;
  border: 1px solid rgba(6,26,68,0.12);
  box-shadow: 0 16px 44px rgba(6,26,68,0.08);
}
.river-actions div {
  color: #061a44;
  padding: 1rem;
  border-radius: 14px;
  font-weight: 900;
}
.river-card-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
  margin-top: 2rem;
}
.river-card {
  min-height: 250px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 1.3rem;
  border-radius: 18px;
}
.river-card b {
  color: #0d3b9e;
  font-size: 1.45rem;
}
.river-location-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1rem;
}
.river-location {
  overflow: hidden;
  border-radius: 18px;
}
.river-location .sample-photo {
  height: 160px;
}
.river-location div:last-child {
  padding: 1rem;
}

/* 4. Royal Purple Welcome */
.concept-brook {
  --ink: #30105f;
  --paper: #fff7eb;
  background:
    radial-gradient(circle at 86% 12%, rgba(248,210,106,0.42), transparent 24rem),
    #fff7eb;
}
.concept-brook .sample-kicker {
  color: #fff;
  background: #5c238f;
}
.brook-hero {
  min-height: 78vh;
  padding: 3.5rem 0 2rem;
}
.brook-copy {
  display: grid;
  grid-template-columns: minmax(0, 0.95fr) minmax(300px, 0.55fr);
  gap: 2rem;
  align-items: end;
}
.brook-copy h1 {
  margin: 0;
  max-width: 1000px;
  color: #30105f;
  font-family: Georgia, "Times New Roman", serif;
  font-size: clamp(3.2rem, 7.8vw, 7.7rem);
  line-height: 0.88;
}
.brook-copy p {
  color: rgba(48,16,95,0.72);
  line-height: 1.7;
}
.brook-service {
  padding: 1.25rem;
  border-radius: 42px 42px 160px 160px;
  color: #fff7eb;
  background: #30105f;
  text-align: center;
}
.brook-collage {
  display: grid;
  grid-template-columns: 1.15fr 0.72fr 0.9fr;
  grid-template-rows: minmax(150px, 22vh) minmax(110px, 16vh);
  gap: 0.9rem;
  max-height: 46vh;
  margin-top: 1.4rem;
}
.brook-collage .sample-photo {
  border-radius: 34px;
}
.brook-collage .sample-photo:first-child {
  grid-row: span 2;
}
.brook-belief-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
}
.brook-belief {
  min-height: 250px;
  padding: 1.4rem;
  border-radius: 44px 44px 12px 12px;
  color: #fff7eb;
  background: #4b1e76;
}
.brook-belief:nth-child(2) {
  background: #f8d26a;
  color: #30105f;
}
.brook-belief:nth-child(3) {
  background: #ffffff;
  color: #30105f;
  border: 1px solid rgba(48,16,95,0.14);
}
.brook-belief b {
  display: block;
  font-family: Georgia, "Times New Roman", serif;
  font-size: 2rem;
  line-height: 1;
}
.brook-story {
  display: grid;
  grid-template-columns: 0.72fr 1fr;
  gap: 2rem;
  align-items: center;
}
.brook-story .sample-photo {
  height: min(58vh, 520px);
  border-radius: 50% 50% 24px 24px;
}

/* 5. Gold Editorial Worship */
.concept-vous {
  --ink: #fffaf0;
  --paper: #070707;
  background: #070707;
}
.concept-vous .sample-nav a {
  background: rgba(255,255,255,0.08);
  border-color: rgba(255,255,255,0.16);
}
.concept-vous .sample-nav a[aria-current="page"],
.concept-vous .sample-actions a:first-child {
  color: #070707;
  background: #f1c84b;
}
.concept-vous .sample-actions a:last-child {
  color: #fffaf0;
  background: transparent;
  border-color: rgba(255,255,255,0.22);
}
.concept-vous .sample-kicker {
  color: #070707;
  background: #ffffff;
}
.vous-hero {
  min-height: 76vh;
  padding: 4rem 0 3rem;
}
.vous-grid {
  display: grid;
  grid-template-columns: minmax(0, 0.8fr) minmax(330px, 0.82fr);
  gap: clamp(2rem, 5vw, 5rem);
  align-items: center;
}
.vous-copy h1 {
  margin: 0;
  max-width: 650px;
  color: #fffaf0;
  font-size: clamp(3rem, 6.6vw, 6.6rem);
  line-height: 0.86;
  text-transform: uppercase;
}
.vous-copy p,
.concept-vous .sample-section p {
  color: rgba(255,250,240,0.72);
}
.vous-media {
  display: grid;
  grid-template-columns: 1fr 0.7fr;
  gap: 0.75rem;
  max-height: 64vh;
}
.vous-media .sample-photo {
  min-height: 210px;
  border-radius: 0;
}
.vous-media .sample-photo:first-child {
  height: min(64vh, 540px);
}
.vous-sermon {
  border-top: 1px solid rgba(255,255,255,0.18);
  border-bottom: 1px solid rgba(255,255,255,0.18);
}
.vous-editorial-grid {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: 1rem;
  margin-top: 2rem;
}
.vous-panel {
  min-height: 330px;
  padding: 1.4rem;
  border-radius: 0;
  color: #070707;
  background: #f1c84b;
}
.vous-panel:nth-child(2) {
  color: #fffaf0;
  background: #141414;
  border: 1px solid rgba(255,255,255,0.16);
}
.vous-panel h3 {
  margin: 0;
  font-size: clamp(2.5rem, 5vw, 5.4rem);
  line-height: 0.88;
  text-transform: uppercase;
}
.vous-location-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 0.75rem;
}
.vous-location {
  min-height: 180px;
  padding: 1rem;
  color: #fffaf0;
  background: #141414;
  border: 1px solid rgba(255,255,255,0.16);
}

/* 6. White Mission Lines */
.concept-stone {
  --ink: #101828;
  --paper: #ffffff;
  background:
    linear-gradient(90deg, rgba(16,24,40,0.08) 1px, transparent 1px),
    #ffffff;
  background-size: 52px 52px;
}
.concept-stone .sample-kicker {
  color: #fff;
  background: #2d55d4;
}
.stone-hero {
  min-height: 76vh;
  padding: 4rem 0 2rem;
}
.stone-hero h1 {
  margin: 0;
  max-width: 1080px;
  color: #201044;
  font-size: clamp(3.3rem, 8.2vw, 8.4rem);
  line-height: 0.9;
}
.stone-hero p {
  color: rgba(16,24,40,0.72);
}
.stone-lines {
  margin-top: 1.4rem;
  border-top: 2px solid #101828;
}
.stone-lines span {
  display: grid;
  grid-template-columns: 80px 1fr;
  gap: 1rem;
  align-items: center;
  padding: 0.5rem 0;
  border-bottom: 2px solid #101828;
  color: #201044;
  font-size: clamp(1.6rem, 4vw, 4.5rem);
  font-weight: 900;
  line-height: 1;
}
.stone-lines span::before {
  content: "0" counter(line);
  counter-increment: line;
  color: #2d55d4;
  font-size: 1rem;
}
.stone-lines {
  counter-reset: line;
}
.stone-strip {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 0.75rem;
  max-height: 48vh;
  margin-top: 2rem;
}
.stone-strip .sample-photo {
  height: min(42vh, 320px);
  border-radius: 18px;
}
.stone-strip .sample-photo:nth-child(even) {
  margin-top: 2rem;
}
.stone-module-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
  margin-top: 2rem;
}
.stone-module {
  min-height: 330px;
  padding: 1.5rem;
  border: 2px solid #101828;
  border-radius: 22px;
  background: #ffffff;
}
.stone-module h3 {
  margin: 0;
  font-size: clamp(2rem, 4vw, 4rem);
  line-height: 0.95;
}
.stone-list {
  display: grid;
  gap: 0.4rem;
  margin-top: 1.5rem;
}
.stone-list div {
  display: flex;
  justify-content: space-between;
  gap: 1rem;
  padding: 0.9rem 0;
  border-top: 1px solid rgba(16,24,40,0.18);
}

@media (max-width: 980px) {
  .sample-nav,
  .brook-copy {
    align-items: flex-start;
    flex-direction: column;
  }
  .sample-nav-links {
    justify-content: flex-start;
  }
  .river-grid,
  .brook-copy,
  .brook-story,
  .vous-grid,
  .vous-editorial-grid {
    grid-template-columns: 1fr;
  }
  .river-card-grid,
  .river-location-grid,
  .brook-belief-grid,
  .vous-location-grid,
  .stone-module-grid {
    grid-template-columns: 1fr 1fr;
  }
  .brook-collage,
  .stone-strip {
    grid-template-columns: repeat(3, 1fr);
    max-height: none;
  }
}
@media (max-width: 640px) {
  .sample-shell {
    width: min(100% - 24px, 1180px);
  }
  .river-actions,
  .river-card-grid,
  .river-location-grid,
  .brook-belief-grid,
  .brook-collage,
  .brook-story,
  .vous-media,
  .vous-location-grid,
  .stone-strip,
  .stone-module-grid {
    grid-template-columns: 1fr;
  }
  .brook-collage .sample-photo:first-child {
    grid-row: auto;
  }
  .river-photo-wrap .sample-photo,
  .brook-story .sample-photo,
  .vous-media .sample-photo:first-child {
    height: 360px;
  }
  .stone-strip .sample-photo:nth-child(even) {
    margin-top: 0;
  }
}
</style>

<main class="sacred-sample <?php echo esc_attr( $sample['class'] ); ?>">
  <div class="sample-shell">
    <nav class="sample-nav" aria-label="Layout sample navigation">
      <a href="<?php echo esc_url( home_url( '/layout-samples' ) ); ?>">All samples</a>
      <div class="sample-nav-links">
        <?php foreach ( $samples as $number => $item ) : ?>
          <a href="<?php echo esc_url( home_url( '/layout-samples' . $number ) ); ?>" <?php echo $number === $variant ? 'aria-current="page"' : ''; ?>>
            <?php echo esc_html( $number . '. ' . $item['name'] ); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </nav>
  </div>

  <?php if ( '3' === $variant ) : ?>
    <section class="river-hero">
      <div class="sample-shell river-grid">
        <div class="river-copy">
          <span class="sample-kicker"><?php echo esc_html( $sample['reference'] ); ?></span>
          <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
          <p><?php echo esc_html( $sample['intro'] ); ?></p>
          <div class="sample-actions">
            <a href="#river-locations"><?php echo esc_html( $sample['primary'] ); ?></a>
            <a href="#river-around"><?php echo esc_html( $sample['secondary'] ); ?></a>
          </div>
          <div class="river-actions"><div>Visit</div><div>Watch</div><div>Give</div><div>Connect</div></div>
        </div>
        <div class="river-photo-wrap">
          <?php echo lpc_sample_img( 'a', 'Royal blue church welcome image panel' ); ?>
          <aside class="river-badge"><b>Sunday 10:30</b><p>Welcome, worship and kids check-in.</p></aside>
        </div>
      </div>
    </section>
    <section class="sample-section" id="river-around">
      <div class="sample-shell">
        <h2>Around LPC</h2>
        <p>A simple practical layer: quick cards for current message, seasonal events and serving, before the locations section.</p>
        <div class="river-card-grid">
          <article class="river-card"><span>Message</span><b>Recent teaching</b><p>Watch the latest Sunday message.</p></article>
          <article class="river-card"><span>June</span><b>Summer connect</b><p>Seasonal events with clear actions.</p></article>
          <article class="river-card"><span>Serve</span><b>Join a team</b><p>Move from attending to belonging.</p></article>
        </div>
      </div>
    </section>
    <section class="sample-section" id="river-locations">
      <div class="sample-shell">
        <h2>Find your branch</h2>
        <div class="river-location-grid">
          <?php foreach ( [ 'Croydon', 'Bromley', 'Online', 'South London' ] as $location ) : ?>
            <article class="river-location"><?php echo lpc_sample_img( 'd' ); ?><div><b><?php echo esc_html( $location ); ?></b><p>Sunday 10:30 AM</p></div></article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php elseif ( '4' === $variant ) : ?>
    <section class="brook-hero">
      <div class="sample-shell">
        <div class="brook-copy">
          <div>
            <span class="sample-kicker"><?php echo esc_html( $sample['reference'] ); ?></span>
            <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
            <p><?php echo esc_html( $sample['intro'] ); ?></p>
            <div class="sample-actions">
              <a href="#brook-story"><?php echo esc_html( $sample['primary'] ); ?></a>
              <a href="#brook-watch"><?php echo esc_html( $sample['secondary'] ); ?></a>
            </div>
          </div>
          <aside class="brook-service"><b>Sunday gatherings</b><p>9 AM, 11 AM and online</p></aside>
        </div>
        <div class="brook-collage">
          <?php echo lpc_sample_img( 'b' ); ?>
          <?php echo lpc_sample_img( 'f' ); ?>
          <?php echo lpc_sample_img( 'e' ); ?>
          <?php echo lpc_sample_img( 'b' ); ?>
          <?php echo lpc_sample_img( 'f' ); ?>
        </div>
      </div>
    </section>
    <section class="sample-section">
      <div class="sample-shell brook-belief-grid">
        <article class="brook-belief"><b>Everyone is welcome.</b><p>A soft invitation tone.</p></article>
        <article class="brook-belief"><b>Everyone has a next step.</b><p>Groups, serving and care.</p></article>
        <article class="brook-belief"><b>Everyone can belong.</b><p>People-first storytelling.</p></article>
      </div>
    </section>
    <section class="sample-section" id="brook-story">
      <div class="sample-shell brook-story">
        <?php echo lpc_sample_img( 'b', 'Royal purple community story image panel' ); ?>
        <div><h2>People just like you</h2><p>A contained portrait-style image and warm copy create a slower, more relational landing page.</p></div>
      </div>
    </section>
    <section class="sample-section" id="brook-watch"><div class="sample-shell"><h2>Watch before you visit</h2><p>A gentle sermon prompt follows the welcome story for visitors who want to understand the church first.</p></div></section>
  <?php elseif ( '5' === $variant ) : ?>
    <section class="vous-hero">
      <div class="sample-shell vous-grid">
        <div class="vous-copy">
          <span class="sample-kicker"><?php echo esc_html( $sample['reference'] ); ?></span>
          <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
          <p><?php echo esc_html( $sample['intro'] ); ?></p>
          <div class="sample-actions">
            <a href="#vous-message"><?php echo esc_html( $sample['primary'] ); ?></a>
            <a href="#vous-locations"><?php echo esc_html( $sample['secondary'] ); ?></a>
          </div>
        </div>
        <div class="vous-media">
          <?php echo lpc_sample_img( 'c', 'Gold editorial worship image panel' ); ?>
          <?php echo lpc_sample_img( 'f' ); ?>
          <?php echo lpc_sample_img( 'c' ); ?>
        </div>
      </div>
    </section>
    <section class="sample-section vous-sermon" id="vous-message">
      <div class="sample-shell">
        <h2>Latest at LPC</h2>
        <div class="vous-editorial-grid">
          <article class="vous-panel"><h3>Better together</h3><p>Large sermon-first editorial panel.</p></article>
          <article class="vous-panel"><h3>Prayer night</h3><p>Secondary event or worship callout.</p></article>
        </div>
      </div>
    </section>
    <section class="sample-section" id="vous-locations">
      <div class="sample-shell">
        <h2>Visit LPC</h2>
        <div class="vous-location-grid">
          <?php foreach ( [ 'Croydon', 'Bromley', 'Online', 'Kids', 'Crews' ] as $label ) : ?>
            <article class="vous-location"><b><?php echo esc_html( $label ); ?></b><p>Next step details.</p></article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php else : ?>
    <section class="stone-hero">
      <div class="sample-shell">
        <span class="sample-kicker"><?php echo esc_html( $sample['reference'] ); ?></span>
        <h1><?php echo esc_html( $sample['headline'] ); ?></h1>
        <p><?php echo esc_html( $sample['intro'] ); ?></p>
        <div class="sample-actions">
          <a href="#stone-modules"><?php echo esc_html( $sample['primary'] ); ?></a>
          <a href="#stone-media"><?php echo esc_html( $sample['secondary'] ); ?></a>
        </div>
        <div class="stone-lines" aria-hidden="true"><span>We worship</span><span>We gather</span><span>We serve</span></div>
        <div class="stone-strip">
          <?php echo lpc_sample_img( 'd' ); ?>
          <?php echo lpc_sample_img( 'e' ); ?>
          <?php echo lpc_sample_img( 'd' ); ?>
          <?php echo lpc_sample_img( 'e' ); ?>
          <?php echo lpc_sample_img( 'd' ); ?>
          <?php echo lpc_sample_img( 'e' ); ?>
        </div>
      </div>
    </section>
    <section class="sample-section" id="stone-modules">
      <div class="sample-shell">
        <h2>Structured paths for ministry and media</h2>
        <div class="stone-module-grid">
          <article class="stone-module"><h3>What's happening</h3><p>Classes, events and serving opportunities grouped in a calm, structured module.</p></article>
          <article class="stone-module" id="stone-media"><h3>Latest from media</h3><div class="stone-list"><div><b>Articles</b><span>View</span></div><div><b>Music</b><span>View</span></div><div><b>Sermons</b><span>View</span></div></div></article>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <div class="sample-shell sample-footer-nav">
    <a href="<?php echo esc_url( home_url( '/layout-samples' . $prev ) ); ?>">Previous sample</a>
    <a href="<?php echo esc_url( home_url( '/layout-samples' . $next ) ); ?>">Next sample</a>
  </div>
</main>

<?php get_footer(); ?>
