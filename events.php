<?php
$page_title   = 'Events | Hitkarni College of Law';
$page_scripts = ['assets/js/events.js'];
include 'includes/header.php';

$hero_eyebrow = 'Campus Life';
$hero_title   = 'Events at<br><span class="text-gold-400">Hitkarni College of Law</span>';
$hero_text    = 'A glimpse of our campus life. Explore our celebrations, moot courts and activities that build a stronger, united and progressive community.';
$hero_image   = 'college_build.jpg';
$hero_script  = true;
$hero_crumbs  = ['Events' => null];
include 'includes/page-hero.php';

$by_year     = events_by_year($events);
$years       = array_keys($by_year);
$per_year    = 8; // cards shown before "View More"
$has_samples = (bool) array_filter($events, fn($e) => !empty($e['sample']));
$today       = date('Y-m-d');

// Alternate section tints like the mockup (blue, green, ...).
$tints = [
    ['bg' => 'bg-brand-50',   'accent' => 'text-brand-600'],
    ['bg' => 'bg-emerald-50', 'accent' => 'text-emerald-600'],
];
?>

<!-- Category filter -->
<div class="sticky top-[var(--header-h,73px)] z-30 border-b border-slate-200 bg-white/95 backdrop-blur">
  <div class="mx-auto max-w-7xl px-4 lg:px-6">
    <div class="-mx-4 flex gap-2 overflow-x-auto px-4 py-3 [scrollbar-width:none] lg:mx-0 lg:px-0" role="toolbar" aria-label="Filter events by category">
      <button type="button" data-filter="all" aria-pressed="true" class="filter-btn">All Events</button>
      <?php foreach ($event_categories as $key => $cat): ?>
        <button type="button" data-filter="<?= e($key) ?>" aria-pressed="false" class="filter-btn">
          <i class="fa-solid <?= e($cat['icon']) ?>"></i><?= e($cat['label']) ?>
        </button>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="mx-auto max-w-7xl px-4 py-10 lg:px-6">

  <?php if ($has_samples): ?>
    <div class="mb-8 flex gap-3 rounded-2xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-900" role="note">
      <i class="fa-solid fa-triangle-exclamation mt-0.5"></i>
      <p><strong>Sample events.</strong> The cards marked “Sample” are placeholders that show the layout. Replace them with the college's real events in <code class="rounded bg-amber-100 px-1">includes/events-data.php</code>.</p>
    </div>
  <?php endif; ?>

  <?php if (!$by_year): ?>
    <div class="flex flex-col items-center rounded-3xl bg-white py-20 text-center shadow-card">
      <span class="grid h-16 w-16 place-items-center rounded-full bg-amber-50 text-2xl text-amber-500"><i class="fa-regular fa-calendar"></i></span>
      <h2 class="mt-4 text-xl font-bold text-navy-900">No events published yet</h2>
      <p class="mt-1 text-slate-500">Please check back soon.</p>
    </div>
  <?php endif; ?>

  <?php $section = 0; foreach ($by_year as $year => $year_events): $year = (string) $year; $tint = $tints[$section++ % 2]; ?>
    <section id="year-<?= e($year) ?>" class="year-section mb-14 scroll-mt-48" data-year="<?= e($year) ?>" aria-labelledby="year-title-<?= e($year) ?>">
      <header class="flex flex-wrap items-center justify-between gap-4 rounded-2xl px-5 py-4 <?= $tint['bg'] ?>">
        <div class="flex flex-wrap items-baseline gap-x-5 gap-y-1">
          <h2 id="year-title-<?= e($year) ?>" class="text-3xl font-extrabold text-navy-900 sm:text-4xl">Events <span class="<?= $tint['accent'] ?>"><?= e($year) ?></span></h2>
          <p class="text-sm text-slate-600">
            <?= $year >= date('Y') ? 'Upcoming and celebrated events of the year ' : 'Celebrations, activities and achievements of the year ' ?><?= e($year) ?>
          </p>
        </div>
        <label class="relative inline-flex items-center">
          <span class="sr-only">Jump to year</span>
          <i class="fa-regular fa-calendar pointer-events-none absolute left-3.5 text-brand-600"></i>
          <select data-year-jump class="rounded-xl border-slate-200 bg-white py-2 pl-10 pr-9 text-sm font-semibold text-navy-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
            <?php foreach ($years as $y): ?><option value="<?= e($y) ?>" <?= (string) $y === $year ? 'selected' : '' ?>><?= e($y) ?></option><?php endforeach; ?>
          </select>
        </label>
      </header>

      <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($year_events as $n => $ev):
            $cat = $event_categories[$ev['category']] ?? $event_categories['other'];
            $ts = strtotime($ev['date']);
            $upcoming = $ev['date'] >= $today;
            $photos = array_values(array_unique(array_merge([$ev['image']], $ev['photos'] ?? [])));
        ?>
          <article class="event-card group relative flex cursor-pointer flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-card <?= $n >= $per_year ? 'is-extra hidden' : '' ?>"
                   data-category="<?= e($ev['category']) ?>">
            <div class="relative aspect-[16/10] overflow-hidden bg-slate-100">
              <img src="assets/img/<?= e($ev['image']) ?>" alt="" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
              <time datetime="<?= e($ev['date']) ?>" class="absolute left-3 top-3 grid min-w-[3.25rem] rounded-xl bg-white px-2 py-1.5 text-center leading-none shadow-md">
                <span class="text-xl font-extrabold text-navy-900"><?= date('d', $ts) ?></span>
                <span class="mt-1 text-[10px] font-bold uppercase tracking-wide text-slate-500"><?= date('M', $ts) ?></span>
              </time>
              <div class="absolute right-3 top-3 flex gap-1.5">
                <?php if ($upcoming): ?><span class="rounded-full bg-emerald-500 px-2 py-0.5 text-[10px] font-bold uppercase text-white">Upcoming</span><?php endif; ?>
                <?php if (!empty($ev['sample'])): ?><span class="rounded-full bg-amber-400 px-2 py-0.5 text-[10px] font-bold uppercase text-navy-950">Sample</span><?php endif; ?>
              </div>
              <span class="absolute bottom-3 right-3 inline-flex items-center gap-1.5 rounded-full bg-navy-950/70 px-2.5 py-1 text-[11px] font-semibold text-white backdrop-blur">
                <i class="fa-regular fa-images"></i><?= count($photos) ?> <?= count($photos) === 1 ? 'photo' : 'photos' ?>
              </span>
            </div>
            <div class="flex flex-1 flex-col p-4">
              <span class="w-fit rounded-full px-2.5 py-0.5 text-[11px] font-semibold <?= e($cat['chip']) ?>"><?= e($cat['label']) ?></span>
              <h3 class="mt-2 font-bold leading-snug text-navy-900"><?= e($ev['title']) ?></h3>
              <p class="mt-1 flex-1 text-sm text-slate-600"><?= e($ev['summary']) ?></p>
              <div class="mt-4 flex items-center justify-between gap-3">
                <span class="flex min-w-0 items-center gap-1.5 text-xs text-slate-500"><i class="fa-solid fa-location-dot text-brand-600"></i><span class="truncate"><?= e($ev['venue']) ?></span></span>
                <button type="button" class="event-open grid h-9 w-9 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-600 transition after:absolute after:inset-0 after:rounded-2xl after:content-[''] group-hover:bg-brand-600 group-hover:text-white focus-visible:outline-none focus-visible:after:ring-2 focus-visible:after:ring-brand-500"
                        aria-label="Open photo gallery: <?= e($ev['title']) ?>"
                        data-title="<?= e($ev['title']) ?>"
                        data-date="<?= e(date('l, j F Y', $ts)) ?>"
                        data-venue="<?= e($ev['venue']) ?>"
                        data-category="<?= e($cat['label']) ?>"
                        data-chip="<?= e($cat['chip']) ?>"
                        data-photos="<?= e(json_encode(array_map(fn($f) => 'assets/img/' . $f, $photos), JSON_UNESCAPED_SLASHES)) ?>"
                        data-text="<?= e($ev['details'] ?? $ev['summary']) ?>"
                        data-sample="<?= !empty($ev['sample']) ? '1' : '' ?>">
                  <i class="fa-solid fa-arrow-right"></i>
                </button>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <p class="year-empty hidden rounded-2xl border border-dashed border-slate-300 py-10 text-center text-sm text-slate-500">No events in this category for <?= e($year) ?>.</p>

      <?php if (count($year_events) > $per_year): ?>
        <div class="mt-6 text-center">
          <button type="button" class="view-more inline-flex items-center gap-2 rounded-xl border border-brand-200 bg-brand-50 px-5 py-2.5 text-sm font-semibold text-brand-700 hover:bg-brand-100" aria-expanded="false">
            View More Events <?= e($year) ?> <i class="fa-solid fa-arrow-right"></i>
          </button>
        </div>
      <?php endif; ?>
    </section>
  <?php endforeach; ?>
</div>

<!-- Event gallery -->
<dialog id="event-dialog" class="m-auto max-h-[94vh] w-[min(96vw,64rem)] overflow-y-auto rounded-3xl bg-white p-0 shadow-2xl backdrop:bg-navy-950/80" aria-labelledby="ed-title">
  <div class="relative bg-navy-950">
    <img id="ed-image" src="" alt="" class="mx-auto block aspect-[16/10] max-h-[62vh] w-full object-contain">
    <form method="dialog"><button class="absolute right-3 top-3 grid h-10 w-10 place-items-center rounded-full bg-white/95 text-navy-900 shadow" aria-label="Close gallery"><i class="fa-solid fa-xmark"></i></button></form>
    <button type="button" id="ed-prev" class="absolute left-3 top-1/2 grid h-11 w-11 -translate-y-1/2 place-items-center rounded-full bg-white/90 text-navy-900 shadow hover:bg-white" aria-label="Previous photo"><i class="fa-solid fa-chevron-left"></i></button>
    <button type="button" id="ed-next" class="absolute right-3 top-1/2 grid h-11 w-11 -translate-y-1/2 place-items-center rounded-full bg-white/90 text-navy-900 shadow hover:bg-white" aria-label="Next photo"><i class="fa-solid fa-chevron-right"></i></button>
    <span id="ed-counter" class="absolute bottom-3 left-1/2 -translate-x-1/2 rounded-full bg-navy-950/70 px-3 py-1 text-xs font-semibold text-white" aria-live="polite"></span>
  </div>
  <div id="ed-thumbs" class="flex gap-2 overflow-x-auto bg-navy-900 p-3"></div>
  <div class="p-6">
    <div class="flex flex-wrap items-center gap-2">
      <span id="ed-category" class="rounded-full px-2.5 py-0.5 text-xs font-semibold"></span>
      <span id="ed-sample" class="hidden rounded-full bg-amber-400 px-2 py-0.5 text-[10px] font-bold uppercase text-navy-950">Sample</span>
    </div>
    <h2 id="ed-title" class="mt-3 text-2xl font-extrabold text-navy-900"></h2>
    <ul class="mt-2 flex flex-wrap gap-x-6 gap-y-1 text-sm text-slate-600">
      <li><i class="fa-regular fa-calendar w-5 text-brand-600"></i><span id="ed-date"></span></li>
      <li><i class="fa-solid fa-location-dot w-5 text-brand-600"></i><span id="ed-venue"></span></li>
    </ul>
    <p id="ed-text" class="mt-3 leading-relaxed text-slate-600"></p>
  </div>
</dialog>

<?php include 'includes/footer.php'; ?>
