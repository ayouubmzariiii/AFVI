/**
 * AFVI School Theme — Main JavaScript
 * Handles: mobile menu, sticky header, counter animation, scroll reveals, hero slider
 *
 * @package AFVI
 */
(function () {
  'use strict';

  /* ------------------------------------------------
     DOM READY
     ------------------------------------------------ */
  document.addEventListener('DOMContentLoaded', function () {
    initMobileMenu();
    initStickyHeader();
    initScrollReveal();
    initCounterAnimation();
    initHeroSlider();
    initSubmenuToggles();
    initProgTabs();
  });

  /* ------------------------------------------------
     1. MOBILE MENU
     ------------------------------------------------ */
  function initMobileMenu() {
    var toggle = document.getElementById('menu-toggle');
    var nav = document.getElementById('main-nav');
    var overlay = document.getElementById('mobile-overlay');

    if (!toggle || !nav) return;

    toggle.addEventListener('click', function () {
      toggle.classList.toggle('active');
      nav.classList.toggle('active');
      if (overlay) overlay.classList.toggle('active');
      document.body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
    });

    if (overlay) {
      overlay.addEventListener('click', function () {
        toggle.classList.remove('active');
        nav.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
      });
    }

    // Close menu on link click (mobile)
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        if (window.innerWidth <= 768) {
          toggle.classList.remove('active');
          nav.classList.remove('active');
          if (overlay) overlay.classList.remove('active');
          document.body.style.overflow = '';
        }
      });
    });
  }

  /* ------------------------------------------------
     2. SUBMENU TOGGLES (MOBILE)
     ------------------------------------------------ */
  function initSubmenuToggles() {
    document.querySelectorAll('.submenu-toggle').forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var parent = btn.closest('li');
        parent.classList.toggle('submenu-open');
        // Rotate chevron
        var icon = btn.querySelector('i');
        if (icon) {
          icon.style.transform = parent.classList.contains('submenu-open')
            ? 'rotate(180deg)'
            : 'rotate(0)';
          icon.style.transition = 'transform 0.3s ease';
        }
      });
    });
  }

  /* ------------------------------------------------
     3. STICKY HEADER
     ------------------------------------------------ */
  function initStickyHeader() {
    var header = document.getElementById('site-header');
    if (!header) return;

    var lastScroll = 0;

    window.addEventListener(
      'scroll',
      function () {
        var currentScroll = window.pageYOffset;

        if (currentScroll > 50) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }

        lastScroll = currentScroll;
      },
      { passive: true }
    );
  }

  /* ------------------------------------------------
     4. SCROLL REVEAL (Intersection Observer)
     ------------------------------------------------ */
  function initScrollReveal() {
    var reveals = document.querySelectorAll(
      '.reveal, .reveal-left, .reveal-right'
    );

    if (!reveals.length) return;

    if (!('IntersectionObserver' in window)) {
      // Fallback: show everything immediately
      reveals.forEach(function (el) {
        el.classList.add('revealed');
      });
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
    );

    reveals.forEach(function (el) {
      observer.observe(el);
    });
  }

  /* ------------------------------------------------
     5. ANIMATED NUMBER COUNTERS
     ------------------------------------------------ */
  function initCounterAnimation() {
    var counters = document.querySelectorAll('.stat-number[data-target], .stats-strip-number[data-target], .home-stats-num[data-target]');
    if (!counters.length) return;

    if (!('IntersectionObserver' in window)) {
      counters.forEach(function (c) {
        c.textContent = c.getAttribute('data-target');
      });
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 }
    );

    counters.forEach(function (counter) {
      observer.observe(counter);
    });
  }

  function animateCounter(el) {
    var rawTarget = el.getAttribute('data-target');
    var prefix = '';
    var suffix = '';

    // Extract prefix (e.g., "+") and suffix
    var match = rawTarget.match(/^([^\d]*)(\d+)([^\d]*)$/);
    if (match) {
      prefix = match[1];
      var target = parseInt(match[2], 10);
      suffix = match[3];
    } else {
      var target = parseInt(rawTarget, 10) || 0;
    }

    var duration = 2000;
    var start = 0;
    var startTime = null;

    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / duration, 1);

      // Ease out
      var eased = 1 - Math.pow(1 - progress, 3);
      var current = Math.floor(eased * target);

      el.textContent = prefix + current + suffix;

      if (progress < 1) {
        requestAnimationFrame(step);
      } else {
        el.textContent = rawTarget;
      }
    }

    requestAnimationFrame(step);
  }

  /* ------------------------------------------------
     6. HERO SLIDER
     ------------------------------------------------ */
  function initHeroSlider() {
    var slides = document.querySelectorAll('.hero-slide');
    var indicators = document.querySelectorAll('.hero-indicator');

    if (slides.length <= 1) return;

    var current = 0;
    var total = slides.length;
    var interval = 5000;
    var timer;

    function goToSlide(index) {
      slides.forEach(function (s) {
        s.classList.remove('active');
      });
      indicators.forEach(function (d) {
        d.classList.remove('active');
      });

      slides[index].classList.add('active');
      if (indicators[index]) indicators[index].classList.add('active');
      current = index;
    }

    function nextSlide() {
      var next = (current + 1) % total;
      goToSlide(next);
    }

    // Auto-play
    timer = setInterval(nextSlide, interval);

    // Indicator clicks
    indicators.forEach(function (dot, i) {
      dot.addEventListener('click', function () {
        clearInterval(timer);
        goToSlide(i);
        timer = setInterval(nextSlide, interval);
      });
    });
  }
  /* ------------------------------------------------
     7. PROGRAMME TABS
     ------------------------------------------------ */
  function initProgTabs() {
    var tabs = document.querySelectorAll('.prog-tab');
    var panels = document.querySelectorAll('.prog-panel');
    if (!tabs.length) return;

    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        var targetId = tab.getAttribute('data-tab');

        // Deactivate all
        tabs.forEach(function (t) { t.classList.remove('active'); });
        panels.forEach(function (p) { p.classList.remove('active'); });

        // Activate selected
        tab.classList.add('active');
        var panel = document.getElementById(targetId);
        if (panel) panel.classList.add('active');
      });
    });
  }

})();
