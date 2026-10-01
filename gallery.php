<?php
$page_title = 'Gallery | Hitkarni College of Law';
$page_scripts = ['assets/js/fslightbox.js'];
include 'includes/header.php';

$hero_eyebrow = 'Campus';
$hero_title   = 'Gallery';
$hero_image   = 'court.jpg';
$hero_crumbs  = ['Gallery' => null];
include 'includes/page-hero.php';
?>

<section class="py-16">
  <div class="mx-auto max-w-7xl px-4 lg:px-6">
    <p class="max-w-2xl text-slate-600">A look at our infrastructure — the moot court hall, library, classrooms and student facilities. Click any photo to view it full size.</p>
    <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($gallery as $g): ?>
        <a data-fslightbox="campus" data-caption="<?= e($g['caption']) ?>" href="assets/img/<?= e($g['src']) ?>" class="reveal group relative block aspect-[4/3] overflow-hidden rounded-2xl shadow-card">
          <img src="assets/img/<?= e($g['src']) ?>" alt="<?= e($g['caption']) ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
          <span class="absolute inset-x-0 bottom-0 flex items-center justify-between bg-gradient-to-t from-navy-950/80 to-transparent p-4 pt-12 text-sm font-semibold text-white">
            <?= e($g['caption']) ?> <i class="fa-solid fa-up-right-and-down-left-from-center opacity-0 transition group-hover:opacity-100"></i>
          </span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
