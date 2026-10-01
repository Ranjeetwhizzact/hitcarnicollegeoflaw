<?php
$page_title = 'Trustees | Hitkarni College of Law';
include 'includes/header.php';

$hero_eyebrow = "Seva Foundation's";
$hero_title   = 'Our Trustees';
$hero_image   = 'image 16 (1).png';
$hero_crumbs  = ['About College' => 'about-clg.php', 'Trustees' => null];
include 'includes/page-hero.php';
?>

<section class="py-16">
  <div class="mx-auto max-w-7xl px-4 lg:px-6">
    <p class="max-w-2xl text-slate-600">The college is managed by the Seva Foundation. Meet the trustees and committee members who guide the institution.</p>
    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      <?php foreach ($trustees as $person) include 'includes/person-card.php'; ?>
    </div>
  </div>
</section>

<section class="bg-white py-16">
  <div class="mx-auto max-w-6xl px-4 lg:px-6">
    <?php include 'includes/principal-card.php'; ?>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
