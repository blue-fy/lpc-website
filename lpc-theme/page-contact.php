<?php
/**
 * Template Name: Contact Page
 */
get_header();
?>

<section class="lpc-section bg-white" aria-labelledby="contact-heading">
  <div class="lpc-section-inner">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:3rem;">

      <!-- Contact form -->
      <div>
        <span class="lpc-eyebrow"><?php _e('Get In Touch','lpc'); ?></span>
        <h2 id="contact-heading"><?php _e('We\'d Love to Hear From You','lpc'); ?></h2>
        <hr class="lpc-section-divider">
        <p style="color:var(--lpc-text-secondary);margin-bottom:1.5rem;">
          <?php _e('Whether you have a question, prayer request, or simply want to find out more about LPC — reach out and we will get back to you.','lpc'); ?>
        </p>

        <?php
        // Use WPForms shortcode if available, else render native form
        if ( shortcode_exists('wpforms') ) :
          echo do_shortcode('[wpforms id="contact"]');
        else :
        ?>
          <form class="lpc-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" novalidate>
            <?php wp_nonce_field('lpc_contact_form','_lpc_cf_nonce'); ?>
            <input type="hidden" name="action" value="lpc_contact">

            <div class="form-group">
              <label for="cf_name"><?php _e('Your Name *','lpc'); ?></label>
              <input type="text" id="cf_name" name="cf_name" required autocomplete="name"
                     placeholder="<?php _e('Full name','lpc'); ?>">
            </div>
            <div class="form-group">
              <label for="cf_email"><?php _e('Email Address *','lpc'); ?></label>
              <input type="email" id="cf_email" name="cf_email" required autocomplete="email"
                     placeholder="your@email.com">
            </div>
            <div class="form-group">
              <label for="cf_subject"><?php _e('Subject','lpc'); ?></label>
              <select id="cf_subject" name="cf_subject">
                <option value="General Enquiry"><?php _e('General Enquiry','lpc'); ?></option>
                <option value="Prayer Request"><?php _e('Prayer Request','lpc'); ?></option>
                <option value="Plan a Visit"><?php _e('Plan a Visit','lpc'); ?></option>
                <option value="Giving"><?php _e('Giving / Tithes','lpc'); ?></option>
                <option value="Media"><?php _e('Media / Press','lpc'); ?></option>
                <option value="Other"><?php _e('Other','lpc'); ?></option>
              </select>
            </div>
            <div class="form-group">
              <label for="cf_message"><?php _e('Message *','lpc'); ?></label>
              <textarea id="cf_message" name="cf_message" required
                        placeholder="<?php _e('How can we help?','lpc'); ?>"></textarea>
            </div>
            <button type="submit" class="btn btn-burgundy">
              <i class="ti ti-send" aria-hidden="true"></i>
              <?php _e('Send Message','lpc'); ?>
            </button>
          </form>
        <?php endif; ?>
      </div>

      <!-- Contact details -->
      <div>
        <span class="lpc-eyebrow"><?php _e('Find Us','lpc'); ?></span>
        <h2><?php _e('Come Join Us','lpc'); ?></h2>
        <hr class="lpc-section-divider">

        <?php
        $details = [
          [ 'icon'=>'ti-map-pin',     'label'=>__('Address','lpc'),      'value'=> lpc_get('lpc_address','Oasis Centre, Essex Road, Chadwell Heath, Romford RM6') ],
          [ 'icon'=>'ti-mail',        'label'=>__('Email','lpc'),         'value'=> lpc_get('lpc_email','info@londonpentecostalchurch.org') ],
          [ 'icon'=>'ti-clock',       'label'=>__('English Service','lpc'),'value'=> lpc_get('lpc_time_english','Sunday 10:00 AM') ],
          [ 'icon'=>'ti-clock',       'label'=>__('Malayalam','lpc'),     'value'=> lpc_get('lpc_time_malayalam','Sunday 12:30 PM') ],
          [ 'icon'=>'ti-clock',       'label'=>__('Hindi','lpc'),         'value'=> lpc_get('lpc_time_hindi','Sunday 3:00 PM') ],
          [ 'icon'=>'ti-book',        'label'=>__('Bible Study','lpc'),   'value'=> lpc_get('lpc_time_bible','Wednesday 7:00 PM') ],
          [ 'icon'=>'ti-brand-youtube','label'=>__('YouTube','lpc'),      'value'=> lpc_get('lpc_youtube','') ],
        ];
        foreach ( $details as $d ) :
          if ( ! $d['value'] ) continue; ?>
          <div style="display:flex;gap:1rem;align-items:flex-start;margin-bottom:1.25rem;">
            <div style="width:40px;height:40px;border-radius:50%;background:#f5e0da;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--lpc-burgundy-light);font-size:18px;">
              <i class="ti <?php echo esc_attr($d['icon']); ?>" aria-hidden="true"></i>
            </div>
            <div>
              <div style="font-size:11px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:var(--lpc-burgundy-light);margin-bottom:3px;"><?php echo esc_html($d['label']); ?></div>
              <div style="font-size:14px;color:var(--lpc-text-primary);"><?php echo esc_html($d['value']); ?></div>
            </div>
          </div>
        <?php endforeach; ?>

        <!-- Google map embed placeholder -->
        <div style="margin-top:1.5rem;border-radius:var(--lpc-radius);overflow:hidden;border:1.5px solid rgba(138,48,32,0.12);">
          <iframe
            title="<?php _e('London Pentecostal Church location map','lpc'); ?>"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2479.5!2d0.1366!3d51.5659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a63b0f4d0001%3A0x1!2sOasis+Centre%2C+Essex+Rd%2C+Chadwell+Heath!5e0!3m2!1sen!2suk!4v1"
            width="100%"
            height="220"
            style="border:0;display:block;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
