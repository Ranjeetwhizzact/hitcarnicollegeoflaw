<?php /* Principal's message card — shared by principle.php, staff.php and trustee.php (the original repeated it on all three). */ ?>
<article class="grid overflow-hidden rounded-3xl bg-white shadow-card md:grid-cols-12">
  <div class="relative md:col-span-4">
    <img src="<?= e($principal['photo']) ?>" alt="<?= e($principal['name']) ?>" class="h-72 w-full object-cover object-[60%_30%] md:h-full">
  </div>
  <div class="p-6 sm:p-10 md:col-span-8">
    <p class="eyebrow text-brand-600">Principal's Message</p>
    <h2 class="mt-2 text-2xl font-extrabold text-navy-900 sm:text-3xl"><?= e($principal['title']) ?></h2>
    <i class="fa-solid fa-quote-left mt-6 text-3xl text-brand-100"></i>
    <?php foreach ($principal['message'] as $para): ?>
      <p class="mt-3 leading-relaxed text-slate-600"><?= e($para) ?></p>
    <?php endforeach; ?>
    <div class="mt-8 border-t border-slate-100 pt-5">
      <p class="font-bold text-navy-900"><?= e($principal['name']) ?> <span class="font-medium text-brand-600">| <?= e($principal['role']) ?></span></p>
      <p class="mt-1 text-xs text-slate-500"><?= e($principal['quals']) ?></p>
    </div>
  </div>
</article>
