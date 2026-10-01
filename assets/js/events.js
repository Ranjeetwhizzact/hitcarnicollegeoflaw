(function () {
  'use strict';

  var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); };
  var buttons = $$('[data-filter]');
  var sections = $$('.year-section');
  var active = 'all';

  // Re-applies the category filter and the per-year "View More" limit.
  function render() {
    sections.forEach(function (section) {
      var cards = $$('.event-card', section);
      var more = section.querySelector('.view-more');
      var expanded = more && more.getAttribute('aria-expanded') === 'true';
      var visible = 0;
      cards.forEach(function (card) {
        var match = active === 'all' || card.dataset.category === active;
        // While filtering, show every match; otherwise respect the "View More" limit.
        var show = match && (active !== 'all' || expanded || !card.classList.contains('is-extra'));
        card.classList.toggle('hidden', !show);
        if (show) visible++;
      });
      section.querySelector('.year-empty').classList.toggle('hidden', visible > 0);
      if (more) more.parentElement.classList.toggle('hidden', active !== 'all' || expanded);
    });
  }

  function setFilter(key) {
    if (!buttons.some(function (b) { return b.dataset.filter === key; })) key = 'all';
    active = key;
    buttons.forEach(function (b) { b.setAttribute('aria-pressed', String(b.dataset.filter === key)); });
    render();
    var url = new URL(window.location);
    if (key === 'all') url.searchParams.delete('category'); else url.searchParams.set('category', key);
    history.replaceState(null, '', url);
  }

  buttons.forEach(function (b) { b.addEventListener('click', function () { setFilter(b.dataset.filter); }); });

  $$('.view-more').forEach(function (btn) {
    btn.addEventListener('click', function () { btn.setAttribute('aria-expanded', 'true'); render(); });
  });

  $$('[data-year-jump]').forEach(function (select) {
    select.addEventListener('change', function () {
      var target = document.getElementById('year-' + select.value);
      if (target) target.scrollIntoView({ behavior: 'smooth' });
      // Keep this section's selector showing its own year.
      select.value = select.closest('.year-section').dataset.year;
    });
  });

  // ---- Event photo gallery -------------------------------------------------
  var dialog = document.getElementById('event-dialog');
  var mainImg = document.getElementById('ed-image');
  var thumbs = document.getElementById('ed-thumbs');
  var counter = document.getElementById('ed-counter');
  var prevBtn = document.getElementById('ed-prev');
  var nextBtn = document.getElementById('ed-next');
  var photos = [];
  var index = 0;
  var title = '';

  function fill(id, text) { document.getElementById(id).textContent = text; }

  function showPhoto(n) {
    index = (n + photos.length) % photos.length;
    mainImg.src = photos[index];
    mainImg.alt = title + ' – photo ' + (index + 1) + ' of ' + photos.length;
    counter.textContent = (index + 1) + ' / ' + photos.length;
    $$('button', thumbs).forEach(function (t, k) {
      var on = k === index;
      t.setAttribute('aria-current', on ? 'true' : 'false');
      t.classList.toggle('ring-2', on);
      t.classList.toggle('opacity-60', !on);
      if (on) t.scrollIntoView({ block: 'nearest', inline: 'nearest' });
    });
  }

  function openGallery(btn) {
    var d = btn.dataset;
    try { photos = JSON.parse(d.photos); } catch (e) { photos = []; }
    if (!photos.length) return;
    title = d.title;
    fill('ed-title', d.title);
    fill('ed-date', d.date);
    fill('ed-venue', d.venue);
    fill('ed-text', d.text);
    var cat = document.getElementById('ed-category');
    cat.textContent = d.category;
    cat.className = 'rounded-full px-2.5 py-0.5 text-xs font-semibold ' + d.chip;
    document.getElementById('ed-sample').classList.toggle('hidden', !d.sample);

    var single = photos.length < 2;
    [prevBtn, nextBtn, counter, thumbs].forEach(function (el) { el.classList.toggle('hidden', single); });
    thumbs.innerHTML = '';
    photos.forEach(function (src, k) {
      var t = document.createElement('button');
      t.type = 'button';
      t.className = 'h-16 w-24 shrink-0 overflow-hidden rounded-lg ring-gold-400 transition hover:opacity-100';
      t.setAttribute('aria-label', 'Show photo ' + (k + 1));
      var img = document.createElement('img');
      img.src = src; img.alt = ''; img.loading = 'lazy';
      img.className = 'h-full w-full object-cover';
      t.appendChild(img);
      t.addEventListener('click', function () { showPhoto(k); });
      thumbs.appendChild(t);
    });

    if (dialog.showModal) dialog.showModal(); else dialog.setAttribute('open', '');
    showPhoto(0);
  }

  $$('.event-open').forEach(function (btn) {
    btn.addEventListener('click', function () { openGallery(btn); });
  });
  prevBtn.addEventListener('click', function () { showPhoto(index - 1); });
  nextBtn.addEventListener('click', function () { showPhoto(index + 1); });
  dialog.addEventListener('keydown', function (e) {
    if (photos.length < 2) return;
    if (e.key === 'ArrowLeft') { e.preventDefault(); showPhoto(index - 1); }
    if (e.key === 'ArrowRight') { e.preventDefault(); showPhoto(index + 1); }
  });
  // Swipe on touch screens.
  var touchX = null;
  mainImg.addEventListener('touchstart', function (e) { touchX = e.touches[0].clientX; }, { passive: true });
  mainImg.addEventListener('touchend', function (e) {
    if (touchX === null) return;
    var dx = e.changedTouches[0].clientX - touchX;
    if (Math.abs(dx) > 40) showPhoto(index + (dx < 0 ? 1 : -1));
    touchX = null;
  });
  dialog.addEventListener('click', function (e) { if (e.target === dialog) dialog.close(); });

  setFilter(new URLSearchParams(window.location.search).get('category') || 'all');
})();
