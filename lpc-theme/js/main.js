/**
 * London Pentecostal Church — main.js
 * Scroll-aware nav, mobile menu, accessibility helpers
 */

(function () {
  'use strict';

  /* ── Scroll-aware navigation ─────────────────────────────────────── */
  const header   = document.getElementById('site-header');
  const isHome   = document.body.classList.contains('lpc-home');

  function updateNav() {
    if (!header) return;
    if (isHome) {
      if (window.scrollY > 60) {
        header.classList.remove('hero-mode');
        header.classList.add('scrolled');
      } else {
        header.classList.add('hero-mode');
        header.classList.remove('scrolled');
      }
    }
  }

  if (isHome) {
    window.addEventListener('scroll', updateNav, { passive: true });
    updateNav();
  }

  /* ── Mobile menu toggle ───────────────────────────────────────────── */
  const toggle  = document.getElementById('nav-toggle');
  const navWrap = document.getElementById('primary-nav');

  if (toggle && navWrap) {
    toggle.addEventListener('click', function () {
      const isOpen = navWrap.classList.toggle('open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

      // Update icon
      const icon = toggle.querySelector('i');
      if (icon) {
        icon.className = isOpen ? 'ti ti-x' : 'ti ti-menu-2';
      }

      // Trap focus inside when open
      if (isOpen) {
        const firstLink = navWrap.querySelector('a');
        if (firstLink) firstLink.focus();
      }
    });

    // Close on outside click
    document.addEventListener('click', function (e) {
      if (navWrap.classList.contains('open') &&
          !navWrap.contains(e.target) &&
          !toggle.contains(e.target)) {
        navWrap.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        const icon = toggle.querySelector('i');
        if (icon) icon.className = 'ti ti-menu-2';
      }
    });

    // Close on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && navWrap.classList.contains('open')) {
        navWrap.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.focus();
        const icon = toggle.querySelector('i');
        if (icon) icon.className = 'ti ti-menu-2';
      }
    });
  }

  /* ── Smooth scroll for anchor links ──────────────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 70; // nav height
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
        // Move focus for accessibility
        target.setAttribute('tabindex', '-1');
        target.focus({ preventScroll: true });
      }
    });
  });

  /* ── Sermon card: lazy YouTube embed on play click ───────────────── */
  document.querySelectorAll('.sermon-play[data-embed]').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      const embed = this.dataset.embed;
      const thumb = this.closest('.sermon-thumb');
      if (!thumb || !embed) return;

      const iframe = document.createElement('iframe');
      iframe.src = embed + '&autoplay=1';
      iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
      iframe.allowFullscreen = true;
      iframe.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;border:0;';
      thumb.style.paddingBottom = '56.25%';
      thumb.style.height = '0';
      thumb.appendChild(iframe);
      this.remove(); // remove play button
    });
  });

  /* ── Reduced motion: disable hero animations ──────────────────────── */
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  if (prefersReducedMotion.matches) {
    document.querySelectorAll('.hero-beam, .hero-orb, .hero-star').forEach(function (el) {
      el.style.animation = 'none';
    });
  }

  /* ── Announce dynamic page updates to screen readers ─────────────── */
  function announce(message) {
    let liveRegion = document.getElementById('lpc-live-region');
    if (!liveRegion) {
      liveRegion = document.createElement('div');
      liveRegion.id = 'lpc-live-region';
      liveRegion.setAttribute('aria-live', 'polite');
      liveRegion.setAttribute('aria-atomic', 'true');
      liveRegion.className = 'sr-only';
      document.body.appendChild(liveRegion);
    }
    liveRegion.textContent = '';
    setTimeout(function () { liveRegion.textContent = message; }, 100);
  }

  /* ── Back to top (auto-inject) ────────────────────────────────────── */
  const btt = document.createElement('button');
  btt.className = 'sr-only';
  btt.id = 'back-to-top';
  btt.setAttribute('aria-label', 'Back to top');
  btt.innerHTML = '<i class="ti ti-arrow-up" aria-hidden="true"></i>';
  btt.style.cssText = [
    'position:fixed', 'bottom:1.5rem', 'right:1.5rem',
    'background:var(--lpc-burgundy-deep)', 'color:#fff',
    'border:none', 'width:44px', 'height:44px',
    'border-radius:50%', 'font-size:20px',
    'cursor:pointer', 'display:flex',
    'align-items:center', 'justify-content:center',
    'box-shadow:0 2px 12px rgba(60,8,20,0.25)',
    'transition:opacity 0.2s,transform 0.2s',
    'opacity:0', 'pointer-events:none',
    'z-index:500'
  ].join(';');
  document.body.appendChild(btt);

  window.addEventListener('scroll', function () {
    if (window.scrollY > 400) {
      btt.style.opacity = '1';
      btt.style.pointerEvents = 'auto';
      btt.classList.remove('sr-only');
    } else {
      btt.style.opacity = '0';
      btt.style.pointerEvents = 'none';
    }
  }, { passive: true });

  btt.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    document.getElementById('main-content')?.focus({ preventScroll: true });
    announce('Returned to top of page');
  });

})();
