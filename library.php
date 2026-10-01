<?php
$page_title = 'Library | Hitkarni College of Law';
include 'includes/header.php';

$hero_eyebrow = 'Academics';
$hero_title   = 'College Library';
$hero_image   = 'library1.jpg';
$hero_crumbs  = ['Library' => null];
include 'includes/page-hero.php';
?>

<section class="py-16">
  <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 lg:grid-cols-2 lg:px-6">
    <div class="grid grid-cols-2 gap-4">
      <img src="assets/img/library1.jpg" alt="Library study tables" class="col-span-2 aspect-[16/9] w-full rounded-2xl object-cover shadow-card">
      <img src="assets/img/library2.jpg" alt="Library book shelves" class="aspect-square w-full rounded-2xl object-cover shadow-card">
      <div class="flex flex-col justify-center rounded-2xl bg-navy-900 p-5 text-white">
        <i class="fa-solid fa-book-open-reader text-3xl text-gold-400"></i>
        <p class="mt-3 font-semibold">Quiet, modern space for focused legal research</p>
      </div>
    </div>
    <div>
      <p class="eyebrow text-brand-600">Hitkarni College of Law</p>
      <h2 class="section-title mt-2">Where legal knowledge <span class="text-brand-600">meets opportunity</span></h2>
      <p class="mt-6 leading-relaxed text-slate-600">Our library is a hub of resources, meticulously curated to aid students, faculty and researchers in their pursuit of legal excellence. With a diverse collection of books, journals and digital resources, we provide a comprehensive platform for legal research. Our dedicated staff is here to help you find the information you need.</p>
      <p class="mt-4 leading-relaxed text-slate-600">Discover specialized research guides, access legal databases, and take part in workshops to enhance your research skills. The library offers a quiet and conducive environment for study, equipped with modern facilities. We value your feedback and continuously strive to improve our services.</p>
      <ul class="mt-8 grid gap-3 sm:grid-cols-2">
        <?php foreach ([['fa-book', 'Books & Journals'], ['fa-database', 'Digital Legal Resources'], ['fa-compass', 'Research Guides'], ['fa-user-check', 'Librarian Assistance']] as [$icon, $label]): ?>
          <li class="flex items-center gap-3 rounded-xl bg-white p-4 text-sm font-medium text-navy-900 shadow-sm"><i class="fa-solid <?= e($icon) ?> text-brand-600"></i><?= e($label) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
