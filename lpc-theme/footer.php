</main><!-- /main-content -->

<footer class="site-footer" role="contentinfo">

  <div class="footer-main">

    <!-- Brand column -->
    <div class="footer-brand">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home" aria-label="<?php bloginfo('name'); ?> — Home">
        <?php if ( has_custom_logo() ) :
            $logo = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full' );
            if ( $logo ) : ?>
              <img src="<?php echo esc_url($logo[0]); ?>"
                   alt="<?php bloginfo('name'); ?> logo"
                   width="44" height="44"
                   loading="lazy">
            <?php endif;
        endif; ?>
        <span class="site-logo-text">
          London <span>Pentecostal</span> Church
        </span>
      </a>
      <p class="footer-tagline">
        <?php _e('A community of faith, hope, and love — transforming London through worship, word, and the power of the Holy Spirit since 2001.','lpc'); ?>
      </p>
      <!-- Social links -->
      <div class="footer-social" role="list" aria-label="<?php _e('Social Media Links','lpc'); ?>">
        <?php if ( $yt = lpc_get('lpc_youtube') ) : ?>
          <a href="<?php echo esc_url($yt); ?>" target="_blank" rel="noopener noreferrer" role="listitem" aria-label="<?php _e('YouTube','lpc'); ?>">
            <i class="ti ti-brand-youtube" aria-hidden="true"></i>
          </a>
        <?php endif; ?>
        <?php if ( $fb = lpc_get('lpc_facebook') ) : ?>
          <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener noreferrer" role="listitem" aria-label="<?php _e('Facebook','lpc'); ?>">
            <i class="ti ti-brand-facebook" aria-hidden="true"></i>
          </a>
        <?php endif; ?>
        <?php if ( $ig = lpc_get('lpc_instagram') ) : ?>
          <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener noreferrer" role="listitem" aria-label="<?php _e('Instagram','lpc'); ?>">
            <i class="ti ti-brand-instagram" aria-hidden="true"></i>
          </a>
        <?php endif; ?>
      </div>
    </div>

    <!-- Quick links -->
    <div class="footer-col">
      <h3 class="footer-heading"><?php _e('Quick Links','lpc'); ?></h3>
      <?php wp_nav_menu([
        'theme_location' => 'footer',
        'container'      => false,
        'menu_class'     => 'footer-links',
        'fallback_cb'    => 'lpc_footer_fallback_menu',
        'depth'          => 1,
      ]); ?>
    </div>

    <!-- Service times -->
    <div class="footer-col">
      <h3 class="footer-heading"><?php _e('Service Times','lpc'); ?></h3>
      <ul class="footer-links">
        <li><a href="<?php echo esc_url(home_url('/#service-times')); ?>">
          <?php echo esc_html( lpc_get('lpc_time_english',   'Sunday 10:00 AM — English') ); ?>
        </a></li>
        <li><a href="<?php echo esc_url(home_url('/#service-times')); ?>">
          <?php echo esc_html( lpc_get('lpc_time_malayalam', 'Sunday 12:30 PM — Malayalam') ); ?>
        </a></li>
        <li><a href="<?php echo esc_url(home_url('/#service-times')); ?>">
          <?php echo esc_html( lpc_get('lpc_time_hindi',     'Sunday 3:00 PM — Hindi') ); ?>
        </a></li>
        <li><a href="<?php echo esc_url(home_url('/#service-times')); ?>">
          <?php echo esc_html( lpc_get('lpc_time_bible',     'Wednesday 7:00 PM — Bible Study') ); ?>
        </a></li>
      </ul>
    </div>

    <!-- Contact -->
    <div class="footer-col">
      <h3 class="footer-heading"><?php _e('Contact Us','lpc'); ?></h3>
      <ul class="footer-links" style="gap:0.75rem;">
        <?php if ( $addr = lpc_get('lpc_address') ) : ?>
        <li style="display:flex;gap:8px;align-items:flex-start;">
          <i class="ti ti-map-pin" aria-hidden="true" style="color:var(--lpc-rose-gold);margin-top:2px;flex-shrink:0;"></i>
          <span style="font-size:13px;color:rgba(255,220,190,0.65);"><?php echo esc_html($addr); ?></span>
        </li>
        <?php endif; ?>
        <?php if ( $email = lpc_get('lpc_email') ) : ?>
        <li style="display:flex;gap:8px;align-items:center;">
          <i class="ti ti-mail" aria-hidden="true" style="color:var(--lpc-rose-gold);flex-shrink:0;"></i>
          <a href="mailto:<?php echo esc_attr($email); ?>" style="font-size:13px;"><?php echo esc_html($email); ?></a>
        </li>
        <?php endif; ?>
        <?php if ( $phone = lpc_get('lpc_phone') ) : ?>
        <li style="display:flex;gap:8px;align-items:center;">
          <i class="ti ti-phone" aria-hidden="true" style="color:var(--lpc-rose-gold);flex-shrink:0;"></i>
          <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/','',$phone)); ?>" style="font-size:13px;"><?php echo esc_html($phone); ?></a>
        </li>
        <?php endif; ?>
      </ul>
    </div>

  </div><!-- /footer-main -->

  <div class="footer-bottom">
    <p>
      &copy; <?php echo date('Y'); ?>
      <a href="<?php echo esc_url(home_url('/')); ?>" style="color:rgba(255,220,190,0.5);"><?php bloginfo('name'); ?></a>.
      <?php _e('All rights reserved.','lpc'); ?>
      &nbsp;·&nbsp;
      <a href="<?php echo esc_url(get_privacy_policy_url()); ?>" style="color:rgba(255,220,190,0.5);"><?php _e('Privacy Policy','lpc'); ?></a>
    </p>
    <p><?php _e('Registered Charity · London, UK','lpc'); ?></p>
  </div>

</footer><!-- /site-footer -->

<?php wp_footer(); ?>
</body>
</html>
