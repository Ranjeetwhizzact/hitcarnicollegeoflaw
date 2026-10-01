<?php /* Expects $person with name, photo, and optional role / quals. */ ?>
<article class="reveal group overflow-hidden rounded-2xl bg-white text-center shadow-card transition hover:-translate-y-1">
  <div class="aspect-[4/5] overflow-hidden bg-slate-100">
    <img src="assets/img/<?= e($person['photo']) ?>" alt="<?= e($person['name']) ?>" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-105" loading="lazy">
  </div>
  <div class="p-5">
    <h3 class="font-bold text-navy-900"><?= e($person['name']) ?></h3>
    <?php if (!empty($person['role'])): ?><p class="mt-1 text-sm font-medium text-brand-600"><?= e($person['role']) ?></p><?php endif; ?>
    <?php if (!empty($person['quals'])): ?><p class="mt-2 text-xs leading-relaxed text-slate-500"><?= e($person['quals']) ?></p><?php endif; ?>
  </div>
</article>
