<?php
/**
 * Template Name: Layout Samples
 * Description: Interactive showcase of different church website layout designs
 */
get_header();
?>

<style>
.layout-demo {
  margin: 4rem 0;
  border: 2px solid var(--lpc-burgundy);
  border-radius: var(--lpc-radius);
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(138, 48, 32, 0.1);
}

.layout-demo-header {
  background: var(--lpc-burgundy);
  color: white;
  padding: 1.5rem;
}

.layout-demo-header h3 {
  margin: 0;
  font-size: 1.5rem;
}

.layout-demo-description {
  color: rgba(255,255,255,0.9);
  margin-top: 0.5rem;
  font-size: 0.9rem;
}

.layout-demo-content {
  padding: 2rem;
  background: white;
}

.sample-hero {
  background: linear-gradient(135deg, var(--lpc-burgundy) 0%, var(--lpc-burgundy-light) 100%);
  color: white;
  padding: 4rem 2rem;
  text-align: center;
  border-radius: var(--lpc-radius);
  margin-bottom: 2rem;
}

.sample-hero h2 {
  color: white;
  margin: 1rem 0;
}

.sample-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
  margin: 2rem 0;
}

.sample-card {
  background: var(--lpc-cream);
  padding: 1.5rem;
  border-radius: var(--lpc-radius);
  border-left: 4px solid var(--lpc-burgundy);
}

.sample-card h4 {
  color: var(--lpc-burgundy);
  margin: 0.5rem 0;
}

.sample-button {
  display: inline-block;
  background: var(--lpc-burgundy);
  color: white;
  padding: 0.75rem 1.5rem;
  border-radius: var(--lpc-radius);
  text-decoration: none;
  margin-top: 1rem;
  transition: background 0.3s;
}

.sample-button:hover {
  background: var(--lpc-burgundy-light);
}

.layout-comparison {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
  margin: 1.5rem 0;
}

@media (max-width: 768px) {
  .layout-comparison {
    grid-template-columns: 1fr;
  }
}

.comparison-item {
  background: var(--lpc-cream);
  padding: 1rem;
  border-radius: var(--lpc-radius);
}

.comparison-item strong {
  color: var(--lpc-burgundy);
  display: block;
  margin-bottom: 0.5rem;
}
</style>

<!-- HERO -->
<section class="lpc-section bg-white" aria-labelledby="samples-title">
  <div class="lpc-section-inner">
    <div class="lpc-section-header text-center">
      <span class="lpc-eyebrow"><?php _e('Church Website Layouts','lpc'); ?></span>
      <h1 id="samples-title"><?php _e('Design Samples & Templates','lpc'); ?></h1>
      <p><?php _e('Explore different layout approaches for church websites. Click "Try This Layout" to see how each design style works.','lpc'); ?></p>
    </div>
  </div>
</section>

<!-- LAYOUT 1: TRADITIONAL -->
<div class="lpc-section-inner" style="max-width:900px;margin:0 auto;">
  <div class="layout-demo">
    <div class="layout-demo-header">
      <h3>📖 Traditional / Heritage Layout</h3>
      <div class="layout-demo-description">Classic design emphasizing church tradition, history, and stability</div>
    </div>
    <div class="layout-demo-content">
      <div class="sample-hero" style="background:linear-gradient(135deg, #663333 0%, #8a3020 100%);">
        <h2><?php _e('Welcome to Our Church','lpc'); ?></h2>
        <p><?php _e('A place of faith, community, and spiritual growth since 1998','lpc'); ?></p>
        <a href="#" class="sample-button"><?php _e('Visit Us This Sunday','lpc'); ?></a>
      </div>

      <div class="sample-cards">
        <div class="sample-card">
          <h4>⛪ <?php _e('Our History','lpc'); ?></h4>
          <p><?php _e('25+ years of serving the community with faith and dedication.','lpc'); ?></p>
        </div>
        <div class="sample-card">
          <h4>🙏 <?php _e('Our Mission','lpc'); ?></h4>
          <p><?php _e('To grow disciples of Jesus Christ in faith, hope, and love.','lpc'); ?></p>
        </div>
        <div class="sample-card">
          <h4>👥 <?php _e('Our Community','lpc'); ?></h4>
          <p><?php _e('Join hundreds of families in worship and service.','lpc'); ?></p>
        </div>
      </div>

      <div style="background:var(--lpc-cream);padding:1.5rem;border-radius:var(--lpc-radius);margin:1.5rem 0;">
        <h4><?php _e('Service Times','lpc'); ?></h4>
        <p><strong><?php _e('Sunday Morning:','lpc'); ?></strong> 10:00 AM & 12:00 PM</p>
        <p><strong><?php _e('Wednesday Evening:','lpc'); ?></strong> 7:00 PM</p>
      </div>

      <p style="color:#666;font-size:0.9rem;margin-top:2rem;font-style:italic;">
        ✨ <?php _e('Best for: Established churches emphasizing heritage, tradition, and spiritual depth','lpc'); ?>
      </p>
    </div>
  </div>
</div>

<!-- LAYOUT 2: MODERN MINIMALIST -->
<div class="lpc-section-inner" style="max-width:900px;margin:0 auto;margin-top:2rem;">
  <div class="layout-demo">
    <div class="layout-demo-header">
      <h3>🎨 Modern Minimalist Layout</h3>
      <div class="layout-demo-description">Clean, contemporary design with focus on clarity and simplicity</div>
    </div>
    <div class="layout-demo-content">
      <div class="sample-hero" style="background:#f5f5f5;color:#333;border:2px solid #ddd;">
        <h2 style="color:#8a3020;"><?php _e('Let\'s Gather','lpc'); ?></h2>
        <p style="color:#666;font-size:1.1rem;"><?php _e('Sunday 10am at our main campus','lpc'); ?></p>
        <a href="#" class="sample-button" style="background:#333;border:none;"><?php _e('Learn More','lpc'); ?></a>
      </div>

      <div class="layout-comparison">
        <div class="comparison-item">
          <strong>🕐 When</strong>
          <p>Sundays 10:00 AM<br>Wednesdays 7:00 PM</p>
        </div>
        <div class="comparison-item">
          <strong>📍 Where</strong>
          <p>123 Faith Street<br>London, UK</p>
        </div>
        <div class="comparison-item">
          <strong>💬 Connect</strong>
          <p><a href="#">hello@church.org</a><br><a href="#">(+44) 20 1234 5678</a></p>
        </div>
        <div class="comparison-item">
          <strong>🎥 Watch</strong>
          <p><a href="#">Latest Sermons</a><br><a href="#">Subscribe to Podcast</a></p>
        </div>
      </div>

      <p style="color:#666;font-size:0.9rem;margin-top:2rem;font-style:italic;">
        ✨ <?php _e('Best for: Young churches, plant churches, tech-savvy congregations','lpc'); ?>
      </p>
    </div>
  </div>
</div>

<!-- LAYOUT 3: MISSION-FOCUSED -->
<div class="lpc-section-inner" style="max-width:900px;margin:0 auto;margin-top:2rem;">
  <div class="layout-demo">
    <div class="layout-demo-header">
      <h3>🌍 Mission & Impact Layout</h3>
      <div class="layout-demo-description">Action-oriented design emphasizing outreach, service, and community impact</div>
    </div>
    <div class="layout-demo-content">
      <div class="sample-hero" style="background:linear-gradient(135deg, var(--lpc-burgundy) 0%, #660000 100%);">
        <h2><?php _e('Making a Difference','lpc'); ?></h2>
        <p><?php _e('Serving our community through faith, action, and love','lpc'); ?></p>
        <a href="#" class="sample-button"><?php _e('Get Involved','lpc'); ?></a>
      </div>

      <div class="sample-cards">
        <div class="sample-card">
          <h4>🍽️ <?php _e('Food Bank Ministry','lpc'); ?></h4>
          <p><?php _e('Serving 200+ families monthly with nutritious meals and care packages.','lpc'); ?></p>
          <a href="#" class="sample-button" style="background:#8a3020;color:white;padding:0.5rem 1rem;font-size:0.9rem;"><?php _e('Join Us','lpc'); ?></a>
        </div>
        <div class="sample-card">
          <h4>📚 <?php _e('Youth Education','lpc'); ?></h4>
          <p><?php _e('After-school tutoring and mentorship for 50+ young people in our area.','lpc'); ?></p>
          <a href="#" class="sample-button" style="background:#8a3020;color:white;padding:0.5rem 1rem;font-size:0.9rem;"><?php _e('Volunteer','lpc'); ?></a>
        </div>
        <div class="sample-card">
          <h4>🏥 <?php _e('Community Health','lpc'); ?></h4>
          <p><?php _e('Free health clinics and wellness programs every month.','lpc'); ?></p>
          <a href="#" class="sample-button" style="background:#8a3020;color:white;padding:0.5rem 1rem;font-size:0.9rem;"><?php _e('Help Out','lpc'); ?></a>
        </div>
      </div>

      <p style="color:#666;font-size:0.9rem;margin-top:2rem;font-style:italic;">
        ✨ <?php _e('Best for: Mission-driven churches, active community outreach, social justice focus','lpc'); ?>
      </p>
    </div>
  </div>
</div>

<!-- LAYOUT 4: COMMUNITY-CENTERED -->
<div class="lpc-section-inner" style="max-width:900px;margin:0 auto;margin-top:2rem;">
  <div class="layout-demo">
    <div class="layout-demo-header">
      <h3>👥 Community & Fellowship Layout</h3>
      <div class="layout-demo-description">Relationship-focused design highlighting groups, fellowship, and belonging</div>
    </div>
    <div class="layout-demo-content">
      <div class="sample-hero" style="background:var(--lpc-burgundy);color:white;text-align:left;">
        <h2><?php _e('Find Your People','lpc'); ?></h2>
        <p><?php _e('Join small groups, ministries, and communities that match your interests','lpc'); ?></p>
      </div>

      <h4 style="margin-top:2rem;color:var(--lpc-burgundy);"><?php _e('Featured Groups','lpc'); ?></h4>
      <div class="sample-cards">
        <div class="sample-card">
          <h4>👶 <?php _e('Young Parents Group','lpc'); ?></h4>
          <p><?php _e('Thursdays 6pm - Support, friendship, and faith for parents of young children.','lpc'); ?></p>
        </div>
        <div class="sample-card">
          <h4>🎸 <?php _e('Worship & Arts','lpc'); ?></h4>
          <p><?php _e('Tuesdays 7pm - Music, drama, dance, and creative expressions of faith.','lpc'); ?></p>
        </div>
        <div class="sample-card">
          <h4>📖 <?php _e('Bible Study','lpc'); ?></h4>
          <p><?php _e('Mondays 6pm - Deep dive into Scripture with friends and coffee.','lpc'); ?></p>
        </div>
        <div class="sample-card">
          <h4>⚽ <?php _e('Sports & Recreation','lpc'); ?></h4>
          <p><?php _e('Weekends - Football, badminton, hiking, and outdoor fellowship.','lpc'); ?></p>
        </div>
      </div>

      <p style="color:#666;font-size:0.9rem;margin-top:2rem;font-style:italic;">
        ✨ <?php _e('Best for: Churches with strong small group ministries, high member engagement','lpc'); ?>
      </p>
    </div>
  </div>
</div>

<!-- LAYOUT 5: SERMON & TEACHING FOCUSED -->
<div class="lpc-section-inner" style="max-width:900px;margin:0 auto;margin-top:2rem;margin-bottom:3rem;">
  <div class="layout-demo">
    <div class="layout-demo-header">
      <h3>🎤 Teaching & Sermon Hub Layout</h3>
      <div class="layout-demo-description">Content-rich design emphasizing sermons, teaching series, and spiritual growth</div>
    </div>
    <div class="layout-demo-content">
      <div class="sample-hero" style="background:linear-gradient(135deg, var(--lpc-burgundy-light) 0%, var(--lpc-burgundy) 100%);">
        <h2><?php _e('Latest Message','lpc'); ?></h2>
        <p><?php _e('"Grace in Crisis" - Pastor John Smith','lpc'); ?></p>
        <a href="#" class="sample-button"><?php _e('Watch Sermon','lpc'); ?></a>
      </div>

      <div style="margin:2rem 0;">
        <h4 style="color:var(--lpc-burgundy);"><?php _e('Current Series: "Foundations of Faith"','lpc'); ?></h4>
        <div class="sample-cards">
          <div class="sample-card">
            <h4>Week 1: Foundation</h4>
            <p><?php _e('Understanding the core truths of Christian faith','lpc'); ?></p>
            <a href="#" class="sample-button" style="background:#8a3020;color:white;padding:0.5rem 1rem;font-size:0.9rem;"><?php _e('Listen','lpc'); ?></a>
          </div>
          <div class="sample-card">
            <h4>Week 2: Building</h4>
            <p><?php _e('Constructing a life on solid spiritual ground','lpc'); ?></p>
            <a href="#" class="sample-button" style="background:#8a3020;color:white;padding:0.5rem 1rem;font-size:0.9rem;"><?php _e('Listen','lpc'); ?></a>
          </div>
          <div class="sample-card">
            <h4>Week 3: Standing</h4>
            <p><?php _e('Remaining strong through life\'s challenges','lpc'); ?></p>
            <a href="#" class="sample-button" style="background:#8a3020;color:white;padding:0.5rem 1rem;font-size:0.9rem;"><?php _e('Listen','lpc'); ?></a>
          </div>
        </div>
      </div>

      <div style="background:var(--lpc-cream);padding:1.5rem;border-radius:var(--lpc-radius);">
        <h4 style="margin-top:0;"><?php _e('All Teaching Resources','lpc'); ?></h4>
        <ul style="list-style:none;padding:0;margin:0.5rem 0;">
          <li>📹 <a href="#" style="color:var(--lpc-burgundy);"><?php _e('Video Sermons','lpc'); ?></a></li>
          <li>🎧 <a href="#" style="color:var(--lpc-burgundy);"><?php _e('Audio Podcast','lpc'); ?></a></li>
          <li>📖 <a href="#" style="color:var(--lpc-burgundy);"><?php _e('Study Notes','lpc'); ?></a></li>
          <li>💬 <a href="#" style="color:var(--lpc-burgundy);"><?php _e('Discussion Questions','lpc'); ?></a></li>
        </ul>
      </div>

      <p style="color:#666;font-size:0.9rem;margin-top:2rem;font-style:italic;">
        ✨ <?php _e('Best for: Teaching-focused ministries, multi-campus churches, sermon archives','lpc'); ?>
      </p>
    </div>
  </div>
</div>

<?php get_footer(); ?>
