<?php
require_once __DIR__ . '/config.php';

$page_title = $page_title ?? $site['name'];
$active     = $active ?? '';
$current    = basename($_SERVER['PHP_SELF']);

/** True when a nav item (or one of its children) points at the current page. */
function nav_is_active(array $item, string $current, string $active): bool
{
    if ($active !== '' && $item['label'] === $active) {
        return true;
    }
    if (isset($item['href']) && strtok($item['href'], '#') === $current) {
        return true;
    }
    foreach ($item['children'] ?? [] as $child) {
        if (isset($child['href']) && strtok($child['href'], '#') === $current) {
            return true;
        }
    }
    return false;
}

function nav_link_attrs(array $item): string
{
    if (!empty($item['soon']) || empty($item['href'])) {
        return 'href="#" aria-disabled="true"';
    }
    $attrs = 'href="' . e($item['href']) . '"';
    if (!empty($item['external'])) {
        $attrs .= ' target="_blank" rel="noopener"';
    }
    return $attrs;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($page_title) ?></title>
  <meta name="description" content="<?= e($site['name']) ?>, Mankhurd, Mumbai — <?= e($site['recognition']) ?>.">
  <link rel="icon" href="assets/img/Logo2 1.png" type="image/png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Caveat:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            script: ['Caveat', 'cursive'],
          },
          colors: {
            navy: { 950: '#071233', 900: '#0b1b48', 800: '#13286a', 700: '#1b358a' },
            brand: { 50: '#eef2ff', 100: '#e0e7ff', 500: '#3b5bfd', 600: '#2b44e0', 700: '#2336b8' },
            gold: { 300: '#fde68a', 400: '#facc15', 500: '#eab308' },
          },
          boxShadow: {
            card: '0 10px 30px -12px rgba(11, 27, 72, 0.18)',
          },
        },
      },
    };
  </script>
  <link rel="stylesheet" href="assets/css/app.css">
</head>
<body class="bg-slate-50 font-sans text-slate-700 antialiased">

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:text-navy-900">Skip to content</a>

<!-- Announcement bar -->
<div class="bg-navy-900 text-xs text-white/90">
  <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-2 lg:px-6">
    <div class="flex min-w-0 flex-1 items-center gap-3">
      <i class="fa-solid fa-bullhorn shrink-0 text-gold-400" aria-hidden="true"></i>
      <div class="marquee min-w-0 flex-1 overflow-hidden">
        <div class="marquee-track">
          <a href="<?= e($links['fy_llb']) ?>" target="_blank" rel="noopener" class="hover:text-gold-300">Admissions Open for F.Y.LL.B Course (3 Yrs.)</a>
          <span class="text-white/40">|</span>
          <a href="<?= e(tel_href($site['admission_phone'])) ?>" class="hover:text-gold-300">For F.Y.LL.B Admissions Contact: <?= e($site['admission_phone']) ?></a>
          <span class="text-white/40">|</span>
          <span>Approved by Bar Council of India · Affiliated to University of Mumbai</span>
        </div>
      </div>
    </div>
    <nav class="hidden shrink-0 items-center divide-x divide-white/25 md:flex" aria-label="Utility">
      <a href="assets/pdf/second_marit_list.pdf" target="_blank" class="px-3 hover:text-gold-300">Merit Lists</a>
      <a href="<?= e($links['fee_pdf']) ?>" target="_blank" class="px-3 hover:text-gold-300">Fee Structure</a>
      <a href="index.php#notices" class="pl-3 hover:text-gold-300">Latest Updates</a>
    </nav>
  </div>
</div>

<!-- Brand row -->
<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur" id="site-header">
  <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-3 lg:px-6">
    <a href="index.php" class="flex min-w-0 items-center gap-3">
      <img src="assets/img/Logo2 1.png" alt="" class="h-12 w-12 shrink-0 rounded-full shadow-md ring-2 ring-white sm:h-14 sm:w-14">
      <span class="min-w-0">
        <span class="block text-[15px] font-bold leading-tight text-navy-900 sm:text-2xl">Hitkarni College <span class="text-brand-600">of Law</span></span>
        <span class="block truncate text-[11px] text-slate-500 sm:text-sm">(<?= e($site['affiliation']) ?>)</span>
      </span>
    </a>

    <div class="hidden items-center gap-6 lg:flex">
      <a href="<?= e(tel_href($site['phones'][0])) ?>" class="group flex items-center gap-3">
        <span class="grid h-10 w-10 place-items-center rounded-full bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white"><i class="fa-solid fa-phone"></i></span>
        <span class="leading-tight"><span class="block text-sm font-semibold text-navy-900"><?= e($site['phones'][0]) ?></span><span class="text-xs text-slate-500">Call Us</span></span>
      </a>
      <a href="mailto:<?= e($site['email']) ?>" class="group flex items-center gap-3">
        <span class="grid h-10 w-10 place-items-center rounded-full bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white"><i class="fa-solid fa-envelope"></i></span>
        <span class="leading-tight"><span class="block text-sm font-semibold text-navy-900"><?= e($site['email']) ?></span><span class="text-xs text-slate-500">Mail Us</span></span>
      </a>
      <button type="button" data-open="search" class="grid h-10 w-10 place-items-center rounded-full border border-slate-200 text-brand-600 hover:bg-brand-50" aria-label="Search the site"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>

    <div class="flex items-center gap-2 xl:hidden">
      <button type="button" data-open="search" class="grid h-10 w-10 lg:hidden place-items-center rounded-full border border-slate-200 text-brand-600" aria-label="Search the site"><i class="fa-solid fa-magnifying-glass"></i></button>
      <button type="button" data-open="drawer" class="grid h-10 w-10 place-items-center rounded-full bg-navy-900 text-white" aria-label="Open menu" aria-controls="mobile-drawer" aria-expanded="false"><i class="fa-solid fa-bars"></i></button>
    </div>
  </div>

  <!-- Desktop navigation -->
  <div class="hidden border-t border-slate-100 xl:block">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 lg:px-6">
      <nav aria-label="Main">
        <ul class="flex items-center gap-0.5 whitespace-nowrap text-[13px] font-medium text-navy-900 2xl:gap-1 2xl:text-sm">
          <?php foreach ($nav as $item): $is = nav_is_active($item, $current, $active); ?>
            <?php if (empty($item['children'])): ?>
              <li><a <?= nav_link_attrs($item) ?> class="block rounded-lg px-2.5 py-2 transition 2xl:px-3 <?= $is ? 'bg-brand-600 text-white shadow' : 'hover:bg-brand-50 hover:text-brand-600' ?>"><?= e($item['label']) ?></a></li>
            <?php else: ?>
              <li class="dropdown relative">
                <button type="button" class="flex items-center gap-1 rounded-lg px-2.5 py-2 transition 2xl:px-3 <?= $is ? 'text-brand-600' : 'hover:bg-brand-50 hover:text-brand-600' ?>" aria-expanded="false">
                  <?= e($item['label']) ?> <i class="fa-solid fa-chevron-down text-[9px]"></i>
                </button>
                <ul class="dropdown-menu absolute left-0 top-full z-50 min-w-[220px] rounded-xl border border-slate-100 bg-white p-2 shadow-card">
                  <?php foreach ($item['children'] as $child): ?>
                    <li>
                      <?php if (!empty($child['soon'])): ?>
                        <span class="flex items-center justify-between gap-3 rounded-lg px-3 py-2 text-slate-400"><?= e($child['label']) ?><span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-semibold uppercase">Soon</span></span>
                      <?php else: ?>
                        <a <?= nav_link_attrs($child) ?> class="flex items-center justify-between gap-3 rounded-lg px-3 py-2 hover:bg-brand-50 hover:text-brand-600">
                          <?= e($child['label']) ?>
                          <?php if (!empty($child['external'])): ?><i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-slate-400"></i><?php endif; ?>
                        </a>
                      <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </nav>
      <a href="<?= e($links['fy_llb']) ?>" target="_blank" rel="noopener" class="my-2 inline-flex shrink-0 items-center gap-2 rounded-full bg-navy-900 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-navy-900/20 transition hover:bg-brand-600">
        Apply Now <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </div>
</header>

<!-- Mobile drawer -->
<div id="mobile-drawer" class="drawer fixed inset-0 z-[60] xl:hidden" aria-hidden="true">
  <div class="drawer-backdrop absolute inset-0 bg-navy-950/60" data-close="drawer"></div>
  <aside class="drawer-panel absolute left-0 top-0 flex h-full w-[86%] max-w-sm flex-col bg-white shadow-2xl" role="dialog" aria-label="Menu">
    <div class="flex items-center justify-between border-b border-slate-100 p-4">
      <img src="assets/img/hitkarnicollegeoflaw2.png" alt="<?= e($site['name']) ?>" class="h-10 w-auto">
      <button type="button" data-close="drawer" class="grid h-9 w-9 place-items-center rounded-full bg-slate-100" aria-label="Close menu"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <nav class="flex-1 overflow-y-auto p-3 text-[15px] font-medium text-navy-900" aria-label="Mobile">
      <?php foreach ($nav as $item): ?>
        <?php if (empty($item['children'])): ?>
          <a <?= nav_link_attrs($item) ?> class="block rounded-lg px-3 py-3 hover:bg-brand-50"><?= e($item['label']) ?></a>
        <?php else: ?>
          <details class="group rounded-lg">
            <summary class="flex cursor-pointer list-none items-center justify-between rounded-lg px-3 py-3 hover:bg-brand-50">
              <?= e($item['label']) ?> <i class="fa-solid fa-chevron-down text-xs transition group-open:rotate-180"></i>
            </summary>
            <div class="mb-2 ml-3 border-l-2 border-brand-100 pl-3">
              <?php foreach ($item['children'] as $child): ?>
                <?php if (!empty($child['soon'])): ?>
                  <span class="block px-3 py-2 text-sm text-slate-400"><?= e($child['label']) ?></span>
                <?php else: ?>
                  <a <?= nav_link_attrs($child) ?> class="block rounded-lg px-3 py-2 text-sm text-slate-600 hover:text-brand-600"><?= e($child['label']) ?></a>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </details>
        <?php endif; ?>
      <?php endforeach; ?>
    </nav>
    <div class="space-y-3 border-t border-slate-100 p-4 text-sm">
      <a href="<?= e(tel_href($site['phones'][0])) ?>" class="flex items-center gap-3 text-navy-900"><i class="fa-solid fa-phone text-brand-600"></i><?= e($site['phones'][0]) ?></a>
      <a href="mailto:<?= e($site['email']) ?>" class="flex items-center gap-3 break-all text-navy-900"><i class="fa-solid fa-envelope text-brand-600"></i><?= e($site['email']) ?></a>
      <a href="<?= e($links['fy_llb']) ?>" target="_blank" rel="noopener" class="flex items-center justify-center gap-2 rounded-full bg-brand-600 px-5 py-3 font-semibold text-white">Apply Now <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </aside>
</div>

<!-- Site search (client-side over the site's own pages and documents) -->
<div id="search-modal" class="modal fixed inset-0 z-[70] hidden items-start justify-center bg-navy-950/60 p-4 pt-24" aria-hidden="true">
  <div class="w-full max-w-xl overflow-hidden rounded-2xl bg-white shadow-2xl" role="dialog" aria-label="Search">
    <div class="flex items-center gap-3 border-b border-slate-100 px-4">
      <i class="fa-solid fa-magnifying-glass text-slate-400"></i>
      <input id="search-input" type="search" placeholder="Search pages, merit lists, fees…" class="w-full border-0 py-4 text-base focus:ring-0" autocomplete="off">
      <button type="button" data-close="search" class="rounded-md px-2 py-1 text-xs text-slate-500 ring-1 ring-slate-200">Esc</button>
    </div>
    <ul id="search-results" class="max-h-80 overflow-y-auto p-2"></ul>
  </div>
</div>
<?php
$search_index = [];
foreach ($nav as $item) {
    if (empty($item['children'])) {
        $search_index[] = ['label' => $item['label'], 'href' => $item['href'], 'group' => 'Page'];
    }
    foreach ($item['children'] ?? [] as $child) {
        if (empty($child['soon']) && !empty($child['href'])) {
            $search_index[] = ['label' => $child['label'], 'href' => $child['href'], 'group' => $item['label']];
        }
    }
}
foreach ($notices as $notice) {
    $search_index[] = ['label' => $notice['title'], 'href' => $notice['href'], 'group' => 'Notice'];
}
?>
<?php
// Drop duplicate destinations (e.g. Library appears in two menus).
$search_index = array_values(array_intersect_key($search_index, array_unique(array_column($search_index, 'href'))));
?>
<script>
  window.SITE_INDEX = <?= json_encode($search_index, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?>;
</script>

<main id="content">
