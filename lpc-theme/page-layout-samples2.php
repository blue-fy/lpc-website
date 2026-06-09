<?php
/**
 * Layout Samples 2
 *
 * Virtual route: /layout-samples2
 */
get_header();
?>

<style>
.samples2-wrap {
  background: #fbf8f4;
}
.samples2-hero {
  padding: 8.5rem 2rem 4rem;
  background:
    linear-gradient(rgba(28, 18, 12, 0.48), rgba(28, 18, 12, 0.62)),
    url("https://images.unsplash.com/photo-1507692049790-de58290a4334?auto=format&fit=crop&w=1800&q=80") center 42% / cover;
  color: #fff;
}
.samples2-hero-inner,
.samples2-section {
  max-width: 1180px;
  margin: 0 auto;
}
.samples2-kicker {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 12px;
  font-weight: 800;
  letter-spacing: 0.12em;
  text-transform: uppercase;
}
.samples2-hero h1 {
  max-width: 760px;
  margin: 0.75rem 0 1rem;
  color: #fff;
  font-size: clamp(2.4rem, 6vw, 5rem);
}
.samples2-hero p {
  max-width: 620px;
  color: rgba(255, 248, 238, 0.88);
  font-size: 17px;
}
.samples2-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  margin-top: 1.5rem;
}
.samples2-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  min-height: 44px;
  padding: 0.8rem 1.15rem;
  border-radius: 8px;
  border: 1px solid transparent;
  font-size: 13px;
  font-weight: 800;
  letter-spacing: 0.03em;
  text-decoration: none;
}
.samples2-btn-primary {
  background: #f0c090;
  color: #2d1208;
}
.samples2-btn-dark {
  background: #26221e;
  color: #fff;
}
.samples2-btn-light {
  background: rgba(255,255,255,0.12);
  border-color: rgba(255,255,255,0.42);
  color: #fff;
}
.samples2-section {
  padding: 4rem 2rem;
}
.samples2-intro {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: 2rem;
  align-items: end;
}
.samples2-intro h2 {
  max-width: 680px;
}
.samples2-note {
  background: #ffffff;
  border: 1px solid rgba(60, 8, 20, 0.12);
  border-radius: 8px;
  padding: 1.25rem;
  color: #5a3e18;
}
.sample-layout {
  margin-top: 2rem;
  background: #fff;
  border: 1px solid rgba(60, 8, 20, 0.12);
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 18px 45px rgba(46, 31, 14, 0.08);
}
.sample-label {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 1rem;
  padding: 1rem 1.25rem;
  background: #2d2723;
  color: #fff;
}
.sample-label strong {
  font-family: var(--lpc-font-heading);
  font-size: 1.35rem;
}
.sample-label span {
  color: rgba(255,255,255,0.74);
  font-size: 13px;
}
.sample-preview {
  min-height: 520px;
}
.editorial-preview {
  display: grid;
  grid-template-columns: 1.05fr 0.95fr;
  background: #f7efe7;
}
.editorial-copy {
  padding: 3rem;
}
.editorial-copy h3 {
  font-size: clamp(2rem, 4vw, 3.6rem);
}
.editorial-copy p {
  color: #5d4c3b;
}
.editorial-photo {
  min-height: 520px;
  background:
    linear-gradient(rgba(60, 8, 20, 0.08), rgba(60, 8, 20, 0.26)),
    url("https://images.unsplash.com/photo-1490730141103-6cac27aaab94?auto=format&fit=crop&w=1100&q=80") center / cover;
}
.mini-schedule {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 0.75rem;
  margin-top: 2rem;
}
.mini-schedule div {
  background: #fff;
  border-radius: 8px;
  padding: 1rem;
  border: 1px solid rgba(60, 8, 20, 0.1);
}
.mini-schedule b {
  display: block;
  color: #8a3020;
  font-size: 13px;
}
.event-preview {
  background: #16191f;
  color: #fff;
  padding: 2rem;
}
.event-bar {
  display: grid;
  grid-template-columns: 1fr auto auto;
  gap: 0.8rem;
  align-items: center;
  padding: 0.8rem 0;
}
.event-hero-card {
  display: grid;
  grid-template-columns: 0.9fr 1.1fr;
  min-height: 420px;
  border-radius: 8px;
  overflow: hidden;
  background: #f3efe7;
  color: #241b16;
}
.event-date {
  align-self: start;
  display: inline-grid;
  place-items: center;
  width: 86px;
  height: 86px;
  background: #d9e9ef;
  color: #0e3f52;
  border-radius: 8px;
  font-weight: 900;
}
.event-image {
  background:
    linear-gradient(rgba(8, 21, 27, 0.1), rgba(8, 21, 27, 0.18)),
    url("https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=1000&q=80") center / cover;
}
.event-copy {
  padding: 2rem;
}
.event-copy h3 {
  font-size: clamp(2rem, 4vw, 3.8rem);
}
.teaching-preview {
  display: grid;
  grid-template-columns: 0.85fr 1.15fr;
  background: #fbfbf8;
}
.teaching-sidebar {
  background: #f0efe8;
  padding: 2rem;
}
.teaching-main {
  padding: 2rem;
}
.video-frame {
  aspect-ratio: 16 / 9;
  border-radius: 8px;
  background:
    linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.35)),
    url("https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80") center / cover;
  display: grid;
  place-items: center;
  color: #fff;
}
.play-circle {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  display: grid;
  place-items: center;
  background: #f0c090;
  color: #2d1208;
  font-size: 26px;
}
.resource-list {
  display: grid;
  gap: 0.75rem;
  margin-top: 1.5rem;
}
.resource-list div {
  display: flex;
  justify-content: space-between;
  gap: 1rem;
  border: 1px solid rgba(34, 30, 24, 0.12);
  border-radius: 8px;
  padding: 0.9rem 1rem;
  background: #fff;
}
.campus-preview {
  background: #edf2f5;
  padding: 2rem;
}
.campus-top {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
  align-items: center;
}
.campus-map {
  min-height: 280px;
  border-radius: 8px;
  background:
    linear-gradient(135deg, rgba(20, 73, 77, 0.18), rgba(138, 48, 32, 0.16)),
    repeating-linear-gradient(45deg, #dce7ea 0 18px, #eef4f5 18px 36px);
  position: relative;
}
.campus-pin {
  position: absolute;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background: #8a3020;
  box-shadow: 0 0 0 8px rgba(138, 48, 32, 0.14);
}
.campus-pin:nth-child(1) { left: 24%; top: 38%; }
.campus-pin:nth-child(2) { left: 56%; top: 28%; background: #174f5a; }
.campus-pin:nth-child(3) { left: 72%; top: 62%; background: #7a6512; }
.campus-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0.8rem;
  margin-top: 1.5rem;
}
.campus-card {
  background: #fff;
  border-radius: 8px;
  padding: 1rem;
  border-top: 4px solid #8a3020;
}
.samples2-final {
  background: #3c0814;
  color: #fff;
  text-align: center;
}
.samples2-final h2 {
  color: #fff;
}
.samples2-final p {
  max-width: 660px;
  margin-left: auto;
  margin-right: auto;
  color: rgba(255, 235, 210, 0.78);
}
@media (max-width: 900px) {
  .samples2-intro,
  .editorial-preview,
  .event-hero-card,
  .teaching-preview,
  .campus-top {
    grid-template-columns: 1fr;
  }
  .editorial-photo {
    min-height: 300px;
  }
  .campus-grid,
  .mini-schedule {
    grid-template-columns: 1fr 1fr;
  }
}
@media (max-width: 560px) {
  .samples2-hero {
    padding-top: 7rem;
  }
  .samples2-section,
  .event-preview,
  .campus-preview,
  .editorial-copy,
  .teaching-main,
  .teaching-sidebar {
    padding-left: 1rem;
    padding-right: 1rem;
  }
  .event-bar,
  .campus-grid,
  .mini-schedule {
    grid-template-columns: 1fr;
  }
}
</style>

<div class="samples2-wrap">
  <section class="samples2-hero" aria-labelledby="samples2-title">
    <div class="samples2-hero-inner">
      <span class="samples2-kicker">Layout Samples 2</span>
      <h1 id="samples2-title">Four modern directions for the LPC website</h1>
      <p>Original sample layouts for a church site that needs to welcome visitors, surface service details quickly, and make sermons, events, branches, and next steps easy to scan.</p>
      <div class="samples2-actions">
        <a class="samples2-btn samples2-btn-primary" href="#editorial">View Samples</a>
        <a class="samples2-btn samples2-btn-light" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Current Site</a>
      </div>
    </div>
  </section>

  <section class="samples2-section" aria-labelledby="samples2-overview">
    <div class="samples2-intro">
      <div>
        <span class="lpc-eyebrow">Inspired by builder templates</span>
        <h2 id="samples2-overview">Landing-page clarity with church-specific content blocks.</h2>
        <hr class="lpc-section-divider">
      </div>
      <div class="samples2-note">
        These are not copied templates. They borrow broad patterns from modern builder sites: strong first screen, clear calls to action, mobile-ready sections, event cards, resource hubs, and branch/location modules.
      </div>
    </div>

    <article class="sample-layout" id="editorial">
      <div class="sample-label">
        <strong>1. Editorial Welcome</strong>
        <span>Best for a warm, premium first impression.</span>
      </div>
      <div class="sample-preview editorial-preview">
        <div class="editorial-copy">
          <span class="lpc-eyebrow">Welcome Home</span>
          <h3>A Sunday gathering that feels personal from the first click.</h3>
          <p>Large photography, calm typography, and a simple two-button path help new visitors understand service times and plan their first visit.</p>
          <div class="samples2-actions">
            <a class="samples2-btn samples2-btn-dark" href="#">Plan Your Visit</a>
            <a class="samples2-btn" style="border-color:#8a3020;color:#8a3020;" href="#">Watch Latest Message</a>
          </div>
          <div class="mini-schedule">
            <div><b>English</b><span>Sunday 10:00</span></div>
            <div><b>Malayalam</b><span>Sunday 12:30</span></div>
            <div><b>Hindi</b><span>Sunday 15:00</span></div>
          </div>
        </div>
        <div class="editorial-photo" role="img" aria-label="Warm church gathering preview"></div>
      </div>
    </article>

    <article class="sample-layout">
      <div class="sample-label">
        <strong>2. Event-First Landing Page</strong>
        <span>Best for campaigns, conferences, and seasonal outreach.</span>
      </div>
      <div class="sample-preview event-preview">
        <div class="event-bar">
          <strong>LPC Events</strong>
          <span>Next gathering</span>
          <a class="samples2-btn samples2-btn-primary" href="#">Register</a>
        </div>
        <div class="event-hero-card">
          <div class="event-image" role="img" aria-label="Community event preview"></div>
          <div class="event-copy">
            <div class="event-date"><span>21<br>JUN</span></div>
            <h3>Revival Night and Worship Gathering</h3>
            <p>A focused event layout puts one major invitation first, then supports it with schedule, speaker, location, and registration modules.</p>
            <div class="samples2-actions">
              <a class="samples2-btn samples2-btn-dark" href="#">Reserve a Seat</a>
              <a class="samples2-btn" style="border-color:#174f5a;color:#174f5a;" href="#">See Full Schedule</a>
            </div>
          </div>
        </div>
      </div>
    </article>

    <article class="sample-layout">
      <div class="sample-label">
        <strong>3. Teaching Hub</strong>
        <span>Best for sermons, series, study notes, and media.</span>
      </div>
      <div class="sample-preview teaching-preview">
        <aside class="teaching-sidebar">
          <span class="lpc-eyebrow">Current Series</span>
          <h3>Rooted in the Spirit</h3>
          <p>A content-led layout gives sermons a strong home and makes past teaching easy to explore.</p>
          <div class="resource-list">
            <div><span>Video sermons</span><b>48</b></div>
            <div><span>Study notes</span><b>16</b></div>
            <div><span>Podcast audio</span><b>32</b></div>
          </div>
        </aside>
        <div class="teaching-main">
          <div class="video-frame">
            <span class="play-circle" aria-hidden="true"><i class="ti ti-player-play-filled"></i></span>
          </div>
          <h3 style="margin-top:1.5rem;">Latest Message: A Life of Prayer</h3>
          <p>Pair the latest video with a compact archive of series, speakers, languages, and related notes.</p>
          <div class="samples2-actions">
            <a class="samples2-btn samples2-btn-dark" href="#">Watch Message</a>
            <a class="samples2-btn" style="border-color:#8a3020;color:#8a3020;" href="#">Browse Archive</a>
          </div>
        </div>
      </div>
    </article>

    <article class="sample-layout">
      <div class="sample-label">
        <strong>4. Multi-Campus Community</strong>
        <span>Best for LPC branches and location discovery.</span>
      </div>
      <div class="sample-preview campus-preview">
        <div class="campus-top">
          <div>
            <span class="lpc-eyebrow">One Church, Many Locations</span>
            <h3>Find the LPC branch closest to you.</h3>
            <p>This direction makes branches the hero: visitors can quickly compare service languages, times, locations, and contact paths.</p>
            <a class="samples2-btn samples2-btn-dark" href="#">Find a Branch</a>
          </div>
          <div class="campus-map" aria-label="Stylised branch map" role="img">
            <span class="campus-pin"></span>
            <span class="campus-pin"></span>
            <span class="campus-pin"></span>
          </div>
        </div>
        <div class="campus-grid">
          <div class="campus-card"><b>Chadwell Heath</b><br><span>English, Malayalam, Hindi</span></div>
          <div class="campus-card" style="border-top-color:#174f5a;"><b>Basildon</b><br><span>Sunday 11:00</span></div>
          <div class="campus-card" style="border-top-color:#1a4fd6;"><b>Chelmsford</b><br><span>Sunday 11:00</span></div>
          <div class="campus-card" style="border-top-color:#7a6512;"><b>Harlow</b><br><span>Sunday 10:30</span></div>
        </div>
      </div>
    </article>
  </section>

  <section class="samples2-section samples2-final" aria-labelledby="samples2-next">
    <h2 id="samples2-next">Recommended direction</h2>
    <p>For LPC, the strongest next iteration is a hybrid: Editorial Welcome for the homepage, Teaching Hub for sermons, and Multi-Campus Community for branch discovery.</p>
    <a class="samples2-btn samples2-btn-primary" href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Discuss This Direction</a>
  </section>
</div>

<?php get_footer(); ?>
