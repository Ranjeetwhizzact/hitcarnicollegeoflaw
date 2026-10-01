<?php
$page_title = "Principal's Message | Hitkarni College of Law";
include 'includes/header.php';

$hero_eyebrow = 'Leadership';
$hero_title   = "Principal's Message";
$hero_image   = 'library2.jpg';
$hero_crumbs  = ['About College' => 'about-clg.php', "Principal's Message" => null];
include 'includes/page-hero.php';
?>

<section class="py-16">
  <div class="mx-auto max-w-6xl px-4 lg:px-6">
    <?php include 'includes/principal-card.php'; ?>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
