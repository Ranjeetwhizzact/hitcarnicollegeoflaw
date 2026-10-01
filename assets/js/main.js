(function () {
  'use strict';

  var $ = function (sel, ctx) { return (ctx || document).querySelector(sel); };
  var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); };

  // ---- Expose sticky header height for other sticky elements -------------
  var header = $('#site-header');
  function syncHeaderHeight() {
    if (header) document.documentElement.style.setProperty('--header-h', header.offsetHeight + 'px');
  }
  syncHeaderHeight();
  window.addEventListener('resize', syncHeaderHeight);

  // ---- Mobile drawer ------------------------------------------------------
  var drawer = $('#mobile-drawer');
  var drawerToggle = $('[data-open="drawer"]');
  function setDrawer(open) {
    if (!drawer) return;
    drawer.classList.toggle('is-open', open);
    drawer.setAttribute('aria-hidden', String(!open));
    if (drawerToggle) drawerToggle.setAttribute('aria-expanded', String(open));
    document.body.style.overflow = open ? 'hidden' : '';
  }
  $$('[data-open="drawer"]').forEach(function (b) { b.addEventListener('click', function () { setDrawer(true); }); });
  $$('[data-close="drawer"]').forEach(function (b) { b.addEventListener('click', function () { setDrawer(false); }); });

  // ---- Desktop dropdowns (click support for touch / keyboard) -------------
  $$('.dropdown > button').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      var li = btn.parentElement;
      var open = !li.classList.contains('is-open');
      $$('.dropdown.is-open').forEach(function (d) { d.classList.remove('is-open'); d.firstElementChild.setAttribute('aria-expanded', 'false'); });
      li.classList.toggle('is-open', open);
      btn.setAttribute('aria-expanded', String(open));
    });
  });
  document.addEventListener('click', function () {
    $$('.dropdown.is-open').forEach(function (d) { d.classList.remove('is-open'); });
  });

  // ---- Search -------------------------------------------------------------
  var modal = $('#search-modal');
  var input = $('#search-input');
  var results = $('#search-results');
  var index = window.SITE_INDEX || [];

  function renderResults(q) {
    q = (q || '').trim().toLowerCase();
    var items = index.filter(function (i) {
      return !q || i.label.toLowerCase().indexOf(q) > -1 || i.group.toLowerCase().indexOf(q) > -1;
    }).slice(0, 12);
    results.innerHTML = '';
    if (!items.length) {
      results.innerHTML = '<li class="px-3 py-6 text-center text-sm text-slate-500">No matches. Try “merit”, “fees” or “faculty”.</li>';
      return;
    }
    items.forEach(function (i) {
      var li = document.createElement('li');
      var a = document.createElement('a');
      a.href = i.href;
      if (/^https?:|\.pdf$/.test(i.href)) { a.target = '_blank'; a.rel = 'noopener'; }
      a.className = 'flex items-center justify-between gap-3 rounded-lg px-3 py-2.5 text-sm text-navy-900 hover:bg-brand-50 focus:bg-brand-50 focus:outline-none';
      a.textContent = i.label;
      var tag = document.createElement('span');
      tag.className = 'shrink-0 rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-semibold uppercase text-slate-500';
      tag.textContent = i.group;
      a.appendChild(tag);
      li.appendChild(a);
      results.appendChild(li);
    });
  }
  function setSearch(open) {
    if (!modal) return;
    modal.classList.toggle('is-open', open);
    modal.setAttribute('aria-hidden', String(!open));
    if (open) { renderResults(''); input.value = ''; setTimeout(function () { input.focus(); }, 30); }
  }
  $$('[data-open="search"]').forEach(function (b) { b.addEventListener('click', function () { setDrawer(false); setSearch(true); }); });
  $$('[data-close="search"]').forEach(function (b) { b.addEventListener('click', function () { setSearch(false); }); });
  if (modal) modal.addEventListener('click', function (e) { if (e.target === modal) setSearch(false); });
  if (input) input.addEventListener('input', function () { renderResults(input.value); });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') { setSearch(false); setDrawer(false); }
    if (e.key === '/' && !/input|textarea|select/i.test(document.activeElement.tagName)) { e.preventDefault(); setSearch(true); }
  });

  // ---- Back to top --------------------------------------------------------
  var toTop = $('#to-top');
  if (toTop) {
    window.addEventListener('scroll', function () { toTop.classList.toggle('is-visible', window.scrollY > 600); }, { passive: true });
    toTop.addEventListener('click', function () { window.scrollTo({ top: 0 }); });
  }

  // ---- Rotators (hero background + quote card) ----------------------------
  function rotator(selector, dotsSelector, delay) {
    var slides = $$(selector);
    var dots = $$(dotsSelector);
    if (slides.length < 2) return;
    var i = 0;
    function show(n) {
      i = (n + slides.length) % slides.length;
      slides.forEach(function (s, k) { s.classList.toggle('is-active', k === i); });
      dots.forEach(function (d, k) { d.setAttribute('aria-current', k === i ? 'true' : 'false'); });
    }
    dots.forEach(function (d, k) { d.addEventListener('click', function () { show(k); }); });
    setInterval(function () { show(i + 1); }, delay);
  }
  rotator('.hero-slide', '[data-hero-dot]', 6000);
  rotator('.quote-slide', '[data-quote-dot]', 5000);

  // ---- Tabs ---------------------------------------------------------------
  $$('[role="tablist"]').forEach(function (list) {
    var tabs = $$('[role="tab"]', list);
    function select(tab) {
      tabs.forEach(function (t) {
        var on = t === tab;
        t.setAttribute('aria-selected', String(on));
        t.tabIndex = on ? 0 : -1;
        var panel = document.getElementById(t.getAttribute('aria-controls'));
        if (panel) panel.hidden = !on;
      });
    }
    tabs.forEach(function (t, k) {
      t.addEventListener('click', function () { select(t); });
      t.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowRight' || e.key === 'ArrowLeft') {
          var next = tabs[(k + (e.key === 'ArrowRight' ? 1 : -1) + tabs.length) % tabs.length];
          select(next); next.focus();
        }
      });
    });
  });

  // ---- Reveal on scroll ---------------------------------------------------
  var reveals = $$('.reveal');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-visible'); io.unobserve(en.target); } });
    }, { rootMargin: '0px 0px -60px 0px' });
    reveals.forEach(function (r) { io.observe(r); });
  } else {
    reveals.forEach(function (r) { r.classList.add('is-visible'); });
  }
})();
