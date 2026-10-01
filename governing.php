<?php
$page_title = 'Governing Body | Hitkarni College of Law';
include 'includes/header.php';

$hero_eyebrow = 'Management';
$hero_title   = 'Governing Body';
$hero_image   = 'college.jpg';
$hero_crumbs  = ['About College' => 'about-clg.php', 'Governing Body' => null];
include 'includes/page-hero.php';
?>

<section class="py-16">
  <div class="mx-auto max-w-4xl px-4 lg:px-6">
    <div class="rounded-3xl bg-white p-6 shadow-card sm:p-10">
      <h2 class="text-xl font-bold text-navy-900">Members of the Governing Body</h2>
      <ol class="mt-6 grid gap-3 sm:grid-cols-2">
        <?php foreach ($governing_body as $i => $member): ?>
          <li class="flex items-center gap-4 rounded-xl border border-slate-100 p-4">
            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-brand-50 font-bold text-brand-600"><?= $i + 1 ?></span>
            <span class="font-medium text-navy-900"><?= e($member) ?></span>
          </li>
        <?php endforeach; ?>
      </ol>
      <p class="mt-8 text-sm text-slate-500">See also: <a href="trustee.php" class="font-semibold text-brand-600 hover:underline">Trustees</a> · <a href="staff.php" class="font-semibold text-brand-600 hover:underline">Faculty</a></p>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
