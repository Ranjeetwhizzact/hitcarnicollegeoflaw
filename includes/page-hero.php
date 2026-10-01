<?php
/**
 * Inner-page banner. Set before including:
 *   $hero_eyebrow, $hero_title, $hero_image (path under assets/img), $hero_crumbs (['Label' => 'href' | null])
 * Optional: $hero_text (subtitle), $hero_script (true = "Learn Grow Belong" accent)
 */
$hero_image  = $hero_image ?? 'college.jpg';
$hero_crumbs = $hero_crumbs ?? [];
?>
<section class="relative isolate overflow-hidden bg-navy-900">
  <img src="assets/img/<?= e($hero_image) ?>" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover opacity-30">
  <div class="absolute inset-0 -z-10 bg-gradient-to-r from-navy-950 via-navy-900/90 to-navy-900/40"></div>
  <div class="mx-auto max-w-7xl px-4 py-14 sm:py-20 lg:px-6">
    <nav aria-label="Breadcrumb" class="text-xs text-white/60">
      <ol class="flex flex-wrap items-center gap-2">
        <li><a href="index.php" class="hover:text-white">Home</a></li>
        <?php foreach ($hero_crumbs as $label => $href): ?>
          <li aria-hidden="true"><i class="fa-solid fa-chevron-right text-[9px]"></i></li>
          <li><?php if ($href): ?><a href="<?= e($href) ?>" class="hover:text-white"><?= e($label) ?></a><?php else: ?><span class="text-white"><?= e($label) ?></span><?php endif; ?></li>
        <?php endforeach; ?>
      </ol>
    </nav>
    <?php if (!empty($hero_eyebrow)): ?>
      <p class="eyebrow mt-6 text-gold-400"><?= e($hero_eyebrow) ?></p>
    <?php endif; ?>
    <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-white sm:text-5xl"><?= $hero_title ?></h1>
    <?php if (!empty($hero_text)): ?>
      <p class="mt-4 max-w-2xl text-base leading-relaxed text-white/85 sm:text-lg"><?= e($hero_text) ?></p>
    <?php endif; ?>
  </div>
  <?php if (!empty($hero_script)): ?>
    <p class="pointer-events-none absolute right-6 top-1/2 hidden -translate-y-1/2 -rotate-6 text-right font-script text-4xl leading-[0.95] text-white/90 lg:block xl:right-16 xl:text-5xl" aria-hidden="true">Learn<br>Grow<br>Belong<span class="ml-auto mt-2 block h-1 w-14 rounded-full bg-gold-400"></span></p>
  <?php endif; ?>
</section>
