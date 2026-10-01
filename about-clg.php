<?php
$page_title = 'About College | Hitkarni College of Law';
include 'includes/header.php';

$hero_eyebrow = 'About';
$hero_title   = 'About the College';
$hero_image   = 'college.jpg';
$hero_crumbs  = ['About College' => null];
include 'includes/page-hero.php';
?>

<section class="py-16">
  <div class="mx-auto grid max-w-7xl gap-10 px-4 lg:grid-cols-12 lg:px-6">
    <div class="lg:col-span-7">
      <p class="eyebrow text-brand-600"><?= e($site['foundation']) ?></p>
      <h2 class="section-title mt-2">Hitkarni College of Law</h2>
      <p class="mt-2 text-sm font-medium text-slate-500"><?= e($site['recognition']) ?>.</p>
      <p class="mt-6 leading-relaxed text-slate-600"><?= e($site['about']) ?></p>

      <dl class="mt-8 grid gap-4 sm:grid-cols-3">
        <div class="rounded-2xl bg-white p-5 shadow-card"><dt class="text-xs text-slate-500">Founded</dt><dd class="mt-1 text-lg font-bold text-navy-900">6 September 2022</dd></div>
        <div class="rounded-2xl bg-white p-5 shadow-card"><dt class="text-xs text-slate-500">College Code</dt><dd class="mt-1 text-lg font-bold text-navy-900"><?= e($site['college_code']) ?></dd></div>
        <div class="rounded-2xl bg-white p-5 shadow-card"><dt class="text-xs text-slate-500">CET Cell Code</dt><dd class="mt-1 text-lg font-bold text-navy-900"><?= e($site['cet_code']) ?></dd></div>
      </dl>
    </div>
    <div class="lg:col-span-5">
      <img src="assets/img/college_build.jpg" alt="Hitkarni College of Law building, Mankhurd" class="h-full max-h-[460px] w-full rounded-3xl object-cover object-[50%_75%] shadow-card">
    </div>
  </div>
</section>

<section id="courses" class="scroll-mt-32 bg-white py-16">
  <div class="mx-auto max-w-7xl px-4 lg:px-6">
    <h2 class="section-title">Available <span class="text-brand-600">Courses</span></h2>
    <span class="mt-3 block h-1 w-14 rounded-full bg-brand-600"></span>
    <div class="mt-8 grid gap-6 md:grid-cols-2">
      <article class="flex gap-5 rounded-2xl border border-slate-200 p-6">
        <span class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-brand-50 text-2xl text-brand-600"><i class="fa-solid fa-scale-balanced"></i></span>
        <div>
          <h3 class="text-xl font-bold text-navy-900">LL.B. Course (3 Yrs.)</h3>
          <p class="mt-1 text-sm text-slate-600">Bachelor of Laws — affiliated to the University of Mumbai and approved by the Bar Council of India. Admissions are open for First, Second and Third year.</p>
          <div class="mt-4 flex flex-wrap gap-2 text-sm font-semibold">
            <a href="<?= e($links['fy_llb']) ?>" target="_blank" rel="noopener" class="rounded-full bg-brand-600 px-4 py-2 text-white hover:bg-brand-700">F.Y.LL.B</a>
            <a href="<?= e($links['sy_llb']) ?>" target="_blank" rel="noopener" class="rounded-full bg-brand-50 px-4 py-2 text-brand-700 hover:bg-brand-100">S.Y.LL.B</a>
            <a href="<?= e($links['ty_llb']) ?>" target="_blank" rel="noopener" class="rounded-full bg-brand-50 px-4 py-2 text-brand-700 hover:bg-brand-100">T.Y.LL.B</a>
          </div>
        </div>
      </article>
      <article class="flex gap-5 rounded-2xl border border-slate-200 p-6">
        <span class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-amber-50 text-2xl text-amber-600"><i class="fa-solid fa-file-invoice"></i></span>
        <div>
          <h3 class="text-xl font-bold text-navy-900">Fees &amp; Merit Lists</h3>
          <p class="mt-1 text-sm text-slate-600">Download the FRA-approved fee structure and the latest merit lists.</p>
          <ul class="mt-4 space-y-2 text-sm">
            <?php foreach ($notices as $n): if (!str_ends_with($n['href'], '.pdf')) continue; ?>
              <li><a href="<?= e($n['href']) ?>" target="_blank" class="inline-flex items-center gap-2 font-medium text-brand-600 hover:underline"><i class="fa-regular fa-file-pdf"></i><?= e($n['title']) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="py-16">
  <div class="mx-auto grid max-w-7xl gap-5 px-4 sm:grid-cols-2 lg:grid-cols-4 lg:px-6">
    <?php foreach ([
        ['Vision & Mission', 'Vission&Mission.php', 'fa-bullseye'],
        ["Principal's Message", 'principle.php', 'fa-user-tie'],
        ['Trustees', 'trustee.php', 'fa-handshake'],
        ['Faculty', 'staff.php', 'fa-chalkboard-user'],
    ] as [$label, $href, $icon]): ?>
      <a href="<?= e($href) ?>" class="group flex items-center justify-between rounded-2xl bg-white p-5 shadow-card transition hover:-translate-y-1">
        <span class="flex items-center gap-3 font-semibold text-navy-900"><i class="fa-solid <?= e($icon) ?> text-brand-600"></i><?= e($label) ?></span>
        <i class="fa-solid fa-arrow-right text-slate-400 transition group-hover:translate-x-1 group-hover:text-brand-600"></i>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
