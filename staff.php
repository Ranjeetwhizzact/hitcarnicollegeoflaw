<?php
$page_title = 'Faculty | Hitkarni College of Law';
include 'includes/header.php';

$hero_eyebrow = 'About';
$hero_title   = 'Our Faculty';
$hero_image   = 'image 16 (1).png';
$hero_crumbs  = ['About College' => 'about-clg.php', 'Faculty' => null];
include 'includes/page-hero.php';
?>

<section class="py-16">
  <div class="mx-auto max-w-6xl px-4 lg:px-6">
    <?php include 'includes/principal-card.php'; ?>
  </div>
</section>

<section class="bg-white py-16" aria-labelledby="teaching-title">
  <div class="mx-auto max-w-7xl px-4 lg:px-6">
    <h2 id="teaching-title" class="section-title">Teaching <span class="text-brand-600">Staff</span></h2>
    <span class="mt-3 block h-1 w-14 rounded-full bg-brand-600"></span>
    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-5">
      <?php foreach ($faculty as $person) include 'includes/person-card.php'; ?>
    </div>
  </div>
</section>

<section class="py-16" aria-labelledby="nonteaching-title">
  <div class="mx-auto max-w-7xl px-4 lg:px-6">
    <h2 id="nonteaching-title" class="section-title">Non-Teaching <span class="text-brand-600">Staff</span></h2>
    <span class="mt-3 block h-1 w-14 rounded-full bg-brand-600"></span>
    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-5">
      <?php foreach ($non_teaching as $person) include 'includes/person-card.php'; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
