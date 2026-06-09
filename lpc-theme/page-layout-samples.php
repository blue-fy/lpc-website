<?php
/**
 * Template Name: Layout Samples
 * Description: Selector for LPC visual design directions.
 */
get_header();

$samples = [
    [
        'num' => '3',
        'name' => 'River Valley Inspired',
        'tone' => 'action hero, around-church cards, locations',
        'text' => 'Clear visitor actions, compact hero image, happening cards and multi-location panels.',
        'class' => 'sample-sage',
    ],
    [
        'num' => '4',
        'name' => 'Brooklake Inspired',
        'tone' => 'large welcome type, collage, human story',
        'text' => 'Generous welcome messaging, contained collage strip and people-first story blocks.',
        'class' => 'sample-midnight',
    ],
    [
        'num' => '5',
        'name' => 'VOUS Inspired',
        'tone' => 'dark editorial, sermon panels, city locations',
        'text' => 'Bold media-first layout with editorial panels, latest message and location cards.',
        'class' => 'sample-clay',
    ],
    [
        'num' => '6',
        'name' => 'Austin Stone Inspired',
        'tone' => 'stacked typography, photo strip, dense modules',
        'text' => 'Strong typographic opening, measured image strips and structured media/ministry blocks.',
        'class' => 'sample-sky',
    ],
];
?>

<style>
.sample-index {
  background: #f7f4ef;
}
.sample-index-hero {
  min-height: 68vh;
  padding: 8.5rem 2rem 4rem;
  background:
    radial-gradient(circle at 82% 18%, rgba(48, 110, 124, 0.24), transparent 28rem),
    radial-gradient(circle at 18% 18%, rgba(211, 124, 81, 0.22), transparent 24rem),
    linear-gradient(135deg, #141a1e 0%, #25302c 55%, #f4efe6 55%, #fbf8f1 100%);
  color: #fff;
}
.sample-index-inner {
  max-width: 1180px;
  margin: 0 auto;
}
.sample-index-hero h1 {
  max-width: 760px;
  margin: 0.8rem 0 1rem;
  color: #fff;
  font-size: clamp(2.5rem, 7vw, 5.4rem);
}
.sample-index-hero p {
  max-width: 620px;
  color: rgba(255,255,255,0.78);
  font-size: 17px;
}
.sample-index-kicker {
  display: inline-flex;
  padding: 0.45rem 0.75rem;
  border-radius: 999px;
  background: rgba(255,255,255,0.12);
  border: 1px solid rgba(255,255,255,0.26);
  font-size: 12px;
  font-weight: 800;
  letter-spacing: 0.11em;
  text-transform: uppercase;
}
.sample-index-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1rem;
  max-width: 1180px;
  margin: -4rem auto 0;
  padding: 0 2rem 4rem;
}
.sample-choice {
  min-height: 360px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  border-radius: 18px;
  overflow: hidden;
  text-decoration: none;
  color: inherit;
  border: 1px solid rgba(20, 26, 30, 0.12);
  box-shadow: 0 22px 60px rgba(20, 26, 30, 0.16);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.sample-choice:hover {
  transform: translateY(-6px);
  box-shadow: 0 30px 70px rgba(20, 26, 30, 0.22);
}
.sample-choice-top {
  min-height: 170px;
  padding: 1rem;
  position: relative;
}
.sample-choice-number {
  width: 44px;
  height: 44px;
  display: grid;
  place-items: center;
  border-radius: 50%;
  background: rgba(255,255,255,0.88);
  color: #141a1e;
  font-weight: 900;
}
.sample-choice-glow {
  position: absolute;
  inset: auto 1.1rem 1.1rem auto;
  width: 110px;
  height: 110px;
  border-radius: 44% 56% 63% 37%;
  filter: blur(1px);
}
.sample-choice-body {
  padding: 1.25rem;
  background: #fff;
}
.sample-choice h2 {
  margin-bottom: 0.4rem;
}
.sample-choice p {
  color: #55605c;
  font-size: 14px;
}
.sample-tone {
  display: block;
  margin-top: 1rem;
  color: #7b6251;
  font-size: 12px;
  font-weight: 800;
  letter-spacing: 0.04em;
  text-transform: uppercase;
}
.sample-sage .sample-choice-top {
  background: linear-gradient(135deg, #d7f7f2, #fff7df 58%, #ffb19f);
}
.sample-sage .sample-choice-glow {
  background: #00a6a6;
}
.sample-midnight .sample-choice-top {
  background: radial-gradient(circle at 80% 20%, #14dcff, transparent 34%), radial-gradient(circle at 15% 80%, #ffb84d, transparent 32%), linear-gradient(135deg, #080b12, #2b195d);
}
.sample-midnight .sample-choice-glow {
  background: #8d46ff;
}
.sample-clay .sample-choice-top {
  background: linear-gradient(135deg, #fff1d8, #f7b789 60%, #315b4f);
}
.sample-clay .sample-choice-glow {
  background: #f3c25c;
}
.sample-sky .sample-choice-top {
  background: linear-gradient(rgba(21,25,34,0.16) 1px, transparent 1px), linear-gradient(90deg, rgba(21,25,34,0.16) 1px, transparent 1px), radial-gradient(circle at 18% 18%, #a8e93b, transparent 28%), #fbfbf5;
  background-size: 30px 30px, 30px 30px, auto, auto;
}
.sample-sky .sample-choice-glow {
  background: #2451ff;
}
.sample-index-note {
  max-width: 860px;
  margin: 0 auto;
  padding: 0 2rem 4rem;
  color: #59625f;
  text-align: center;
}
@media (max-width: 980px) {
  .sample-index-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (max-width: 560px) {
  .sample-index-hero {
    min-height: auto;
    padding-top: 7rem;
  }
  .sample-index-grid {
    grid-template-columns: 1fr;
    margin-top: -2rem;
  }
}
</style>

<div class="sample-index">
  <section class="sample-index-hero" aria-labelledby="layout-samples-title">
    <div class="sample-index-inner">
      <span class="sample-index-kicker">Theme selection board</span>
      <h1 id="layout-samples-title">Choose a visual direction for LPC.</h1>
      <p>Four refreshed layout directions inspired by River Valley, Brooklake, VOUS and Austin Stone. Each keeps image-led sections contained so pictures do not dominate more than 70% of the screen.</p>
    </div>
  </section>

  <section class="sample-index-grid" aria-label="Layout sample options">
    <?php foreach ( $samples as $sample ) : ?>
      <a class="sample-choice <?php echo esc_attr( $sample['class'] ); ?>" href="<?php echo esc_url( home_url( '/layout-samples' . $sample['num'] ) ); ?>">
        <div class="sample-choice-top">
          <span class="sample-choice-number"><?php echo esc_html( $sample['num'] ); ?></span>
          <span class="sample-choice-glow" aria-hidden="true"></span>
        </div>
        <div class="sample-choice-body">
          <h2><?php echo esc_html( $sample['name'] ); ?></h2>
          <p><?php echo esc_html( $sample['text'] ); ?></p>
          <span class="sample-tone"><?php echo esc_html( $sample['tone'] ); ?></span>
        </div>
      </a>
    <?php endforeach; ?>
  </section>

  <div class="sample-index-note">
    <p>These are concept pages for visual selection, not final content architecture. Once the team picks a direction, the chosen system can be applied across homepage, branches, sermons, ministries and contact pages.</p>
  </div>
</div>

<?php get_footer(); ?>
