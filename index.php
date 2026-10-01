<?php
$page_title = 'Hitkarni College of Law | LL.B. College in Mankhurd, Mumbai';
include 'includes/header.php';

$hero_slides = [
    ['src' => 'college_build.jpg', 'pos' => 'object-[50%_70%]'],
    ['src' => 'court.jpg', 'pos' => 'object-center'],
    ['src' => 'library2.jpg', 'pos' => 'object-center'],
    ['src' => 'classroom.jpg', 'pos' => 'object-center'],
];

$programs = [
    ['year' => 'F.Y.LL.B', 'sub' => 'First Year · LL.B. (3 Yrs.)', 'text' => 'Apply for First Year Admission', 'href' => $links['fy_llb'], 'icon' => 'fa-user-graduate',
     'card' => 'bg-amber-50 ring-amber-200/70', 'chip' => 'bg-gold-400 text-navy-950', 'btn' => 'bg-gold-400 text-navy-950 hover:bg-gold-300'],
    ['year' => 'S.Y.LL.B', 'sub' => 'Second Year · LL.B. (3 Yrs.)', 'text' => 'Apply for Second Year Admission', 'href' => $links['sy_llb'], 'icon' => 'fa-scale-balanced',
     'card' => 'bg-brand-50 ring-brand-100', 'chip' => 'bg-brand-600 text-white', 'btn' => 'bg-brand-600 text-white hover:bg-brand-700'],
    ['year' => 'T.Y.LL.B', 'sub' => 'Third Year · LL.B. (3 Yrs.)', 'text' => 'Apply for Third Year Admission', 'href' => $links['ty_llb'], 'icon' => 'fa-gavel',
     'card' => 'bg-emerald-50 ring-emerald-200/70', 'chip' => 'bg-emerald-500 text-white', 'btn' => 'bg-emerald-500 text-white hover:bg-emerald-600'],
];

$highlights = [
    ['icon' => 'fa-building-columns', 'text' => 'Affiliated to University of Mumbai'],
    ['icon' => 'fa-scale-balanced', 'text' => 'Approved by Bar Council of India'],
    ['icon' => 'fa-landmark', 'text' => 'Recognized by Govt. of Maharashtra'],
    ['icon' => 'fa-shield-halved', 'text' => 'Safe & Inclusive Campus'],
];

$quotes = [
    'To provide affordable quality education and shape students into future leaders.',
    'Equal access and opportunities — especially for the socially and economically deprived.',
    'Excellence in Education: preparing young minds with knowledge, skills and sensitivity.',
];

$why = [
    ['icon' => 'fa-chalkboard-user', 'color' => 'bg-brand-50 text-brand-600', 'title' => 'Qualified Faculty', 'text' => 'Teachers holding LLM, NET and SET qualifications.'],
    ['icon' => 'fa-book-open-reader', 'color' => 'bg-emerald-50 text-emerald-600', 'title' => 'Dedicated Law Library', 'text' => 'Books, journals and digital resources for legal research.'],
    ['icon' => 'fa-gavel', 'color' => 'bg-amber-50 text-amber-600', 'title' => 'Moot Court Hall', 'text' => 'A courtroom set-up for practical advocacy training.'],
    ['icon' => 'fa-people-group', 'color' => 'bg-violet-50 text-violet-600', 'title' => 'Inclusive Campus', 'text' => 'Affordable education with a ladies common room on campus.'],
];
?>

<!-- HERO -->
<section class="relative isolate overflow-hidden bg-navy-950">
  <div class="absolute inset-0 -z-20">
    <?php foreach ($hero_slides as $i => $slide): ?>
      <img src="assets/img/<?= e($slide['src']) ?>" alt="" class="hero-slide absolute inset-0 h-full w-full object-cover <?= e($slide['pos']) ?> <?= $i === 0 ? 'is-active' : '' ?>" <?= $i ? 'loading="lazy"' : '' ?>>
    <?php endforeach; ?>
  </div>
  <div class="absolute inset-0 -z-10 bg-gradient-to-r from-navy-950 via-navy-900/85 to-navy-900/10"></div>
  <div class="absolute inset-0 -z-10 bg-gradient-to-t from-navy-950/70 via-transparent to-transparent"></div>

  <div class="mx-auto grid max-w-7xl gap-10 px-4 pb-10 pt-14 sm:pt-20 lg:grid-cols-12 lg:px-6 lg:pb-12">
    <div class="lg:col-span-7">
      <p class="eyebrow text-white/80">Learn <span class="mx-2 text-gold-400">•</span> Grow <span class="mx-2 text-gold-400">•</span> Belong</p>
      <h1 class="mt-4 text-[2.15rem] font-extrabold leading-[1.05] tracking-tight text-white sm:text-6xl">
        Shape Your Future at<br>
        <span class="text-gold-400">Hitkarni College</span><br>
        of Law
      </h1>
      <p class="mt-6 max-w-xl text-base leading-relaxed text-white/85 sm:text-lg">
        Quality legal education, strong values and a supportive learning environment. Recognized by the Government of Maharashtra, affiliated to the University of Mumbai and approved by the Bar Council of India.
      </p>
      <div class="mt-8 flex flex-wrap gap-3">
        <a href="<?= e($links['fy_llb']) ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-xl bg-brand-600 px-6 py-3.5 font-semibold text-white shadow-lg shadow-brand-600/30 transition hover:bg-brand-500">Apply for Admission <i class="fa-solid fa-arrow-right"></i></a>
        <a href="#programs" class="inline-flex items-center gap-2 rounded-xl border border-white/40 px-6 py-3.5 font-semibold text-white backdrop-blur transition hover:bg-white/10"><i class="fa-regular fa-map"></i> Explore Programs</a>
      </div>
    </div>

    <div class="hidden flex-col items-end justify-between gap-6 lg:col-span-5 lg:flex">
      <div class="rotate-2 rounded-3xl border border-white/25 bg-white/10 px-8 py-6 text-right shadow-2xl backdrop-blur-md">
        <p class="font-script text-5xl leading-[0.95] text-white">Learn<br>Grow<br>Belong</p>
        <span class="mt-3 ml-auto block h-1 w-16 -rotate-6 rounded-full bg-gold-400"></span>
      </div>
      <figure class="w-full max-w-sm rounded-2xl bg-white p-5 shadow-2xl">
        <i class="fa-solid fa-quote-left text-2xl text-brand-600"></i>
        <div class="mt-2 min-h-[3.5rem]">
          <?php foreach ($quotes as $i => $q): ?>
            <blockquote class="quote-slide text-sm font-medium leading-relaxed text-navy-900 <?= $i === 0 ? 'is-active' : '' ?>"><?= e($q) ?></blockquote>
          <?php endforeach; ?>
        </div>
        <figcaption class="mt-3 flex items-center justify-between">
          <span class="text-xs text-slate-500">— Seva Foundation's Vision &amp; Mission</span>
          <span class="flex gap-1.5">
            <?php foreach ($quotes as $i => $q): ?>
              <button type="button" data-quote-dot class="h-2 w-2 rounded-full bg-slate-300 aria-[current=true]:w-5 aria-[current=true]:bg-brand-600 transition-all" aria-current="<?= $i === 0 ? 'true' : 'false' ?>" aria-label="Quote <?= $i + 1 ?>"></button>
            <?php endforeach; ?>
          </span>
        </figcaption>
      </figure>
    </div>

    <ul class="grid grid-cols-2 gap-3 lg:col-span-12 lg:grid-cols-4">
      <?php foreach ($highlights as $h): ?>
        <li class="flex items-center gap-3 rounded-xl bg-white/95 px-4 py-3 shadow-lg">
          <i class="fa-solid <?= e($h['icon']) ?> text-xl text-brand-600"></i>
          <span class="text-xs font-medium leading-snug text-navy-900 sm:text-sm"><?= e($h['text']) ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- CHOOSE YOUR PROGRAM -->
<section class="relative overflow-hidden py-16" aria-labelledby="choose-title">
  <div class="mx-auto max-w-7xl px-4 lg:px-6">
    <p class="eyebrow text-brand-600">Admissions Open</p>
    <h2 id="choose-title" class="section-title mt-2">Choose <span class="text-brand-600">Your Year</span></h2>
    <p class="mt-3 max-w-2xl text-slate-600">Hitkarni College of Law offers the three-year LL.B. degree programme. Select your year to continue to the online admission portal.</p>

    <div class="mt-8 grid gap-5 md:grid-cols-3">
      <?php foreach ($programs as $p): ?>
        <a href="<?= e($p['href']) ?>" target="_blank" rel="noopener" class="reveal group relative flex flex-col rounded-2xl p-6 ring-1 transition hover:-translate-y-1 hover:shadow-card <?= e($p['card']) ?>">
          <div class="flex items-start justify-between">
            <span class="grid h-14 w-14 place-items-center rounded-full text-xl shadow-md <?= e($p['chip']) ?>"><i class="fa-solid <?= e($p['icon']) ?>"></i></span>
            <span class="grid h-9 w-9 place-items-center rounded-full bg-white text-navy-900 shadow transition group-hover:translate-x-1"><i class="fa-solid fa-chevron-right text-xs"></i></span>
          </div>
          <h3 class="mt-6 text-2xl font-extrabold text-navy-900"><?= e($p['year']) ?></h3>
          <p class="text-sm font-semibold text-navy-800/70"><?= e($p['sub']) ?></p>
          <p class="mt-1 text-slate-600"><?= e($p['text']) ?></p>
          <span class="mt-6 inline-flex w-fit items-center gap-2 rounded-full px-5 py-2.5 text-sm font-semibold shadow <?= e($p['btn']) ?>">Apply Now <i class="fa-solid fa-arrow-right"></i></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ABOUT + NOTICES -->
<section class="pb-16" aria-labelledby="about-title">
  <div class="mx-auto grid max-w-7xl gap-6 px-4 lg:grid-cols-12 lg:px-6">
    <div class="reveal lg:col-span-3">
      <p class="eyebrow text-brand-600">About Us</p>
      <h2 id="about-title" class="section-title mt-2">Hitkarni College <span class="block">of Law</span></h2>
      <p class="mt-4 text-sm leading-relaxed text-slate-600"><?= e($site['about']) ?></p>
      <a href="about-clg.php" class="mt-6 inline-flex items-center gap-2 rounded-xl border border-brand-600 px-5 py-2.5 text-sm font-semibold text-brand-600 transition hover:bg-brand-600 hover:text-white">Know More About Us <i class="fa-solid fa-arrow-right"></i></a>
    </div>

    <div class="reveal relative min-h-[320px] overflow-hidden rounded-2xl shadow-card lg:col-span-4">
      <img src="assets/img/image 2.png" alt="Graduates in caps and gowns" class="absolute inset-0 h-full w-full object-cover" loading="lazy">
      <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-navy-950/70 to-transparent p-4 pt-16">
        <div class="ml-auto flex max-w-[16rem] items-center gap-3 rounded-xl bg-white/95 p-3 shadow-lg">
          <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-600"><i class="fa-solid fa-people-group"></i></span>
          <p class="text-xs font-medium text-navy-900">Empowering students for a better tomorrow</p>
        </div>
      </div>
    </div>

    <div id="notices" class="reveal scroll-mt-40 rounded-2xl border border-slate-200 bg-white shadow-card lg:col-span-5">
      <div role="tablist" aria-label="Updates" class="grid grid-cols-3 gap-1 border-b border-slate-100 p-1.5 text-xs font-semibold text-navy-900 sm:text-sm">
        <button type="button" role="tab" id="tab-notices" aria-controls="panel-notices" aria-selected="true" class="tab-btn rounded-lg px-2 py-2.5">Notices</button>
        <button type="button" role="tab" id="tab-events" aria-controls="panel-events" aria-selected="false" tabindex="-1" class="tab-btn rounded-lg px-2 py-2.5 hover:bg-slate-50">Events</button>
        <button type="button" role="tab" id="tab-links" aria-controls="panel-links" aria-selected="false" tabindex="-1" class="tab-btn rounded-lg px-2 py-2.5 hover:bg-slate-50">Quick Links</button>
      </div>

      <div id="panel-notices" role="tabpanel" aria-labelledby="tab-notices" class="tab-panel p-3">
        <ul class="divide-y divide-slate-100">
          <?php foreach ($notices as $n): ?>
            <li>
              <a href="<?= e($n['href']) ?>" target="_blank" rel="noopener" class="group flex items-center gap-3 rounded-lg p-3 hover:bg-slate-50">
                <span class="grid h-10 w-10 shrink-0 place-items-center rounded-lg bg-brand-50 text-brand-600"><i class="fa-regular <?= str_ends_with($n['href'], '.pdf') ? 'fa-file-pdf' : 'fa-file-lines' ?>"></i></span>
                <span class="min-w-0 flex-1">
                  <span class="block text-sm font-medium text-navy-900 group-hover:text-brand-600"><?= e($n['title']) ?></span>
                  <span class="text-xs text-slate-500"><?= e($n['tag']) ?></span>
                </span>
                <?php if ($n['new']): ?><span class="shrink-0 rounded bg-red-500 px-2 py-0.5 text-[10px] font-bold uppercase text-white">New</span><?php endif; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <?php $home_events = upcoming_events($events, 4); ?>
      <div id="panel-events" role="tabpanel" aria-labelledby="tab-events" class="tab-panel p-3" hidden>
        <?php if ($home_events): ?>
          <ul class="divide-y divide-slate-100">
            <?php foreach ($home_events as $ev): $ts = strtotime($ev['date']); ?>
              <li>
                <a href="events.php?category=<?= e($ev['category']) ?>" class="group flex items-center gap-3 rounded-lg p-3 hover:bg-slate-50">
                  <time datetime="<?= e($ev['date']) ?>" class="grid h-11 w-11 shrink-0 place-items-center rounded-lg bg-brand-50 text-center leading-none text-brand-600">
                    <span><span class="block text-sm font-extrabold"><?= date('d', $ts) ?></span><span class="text-[9px] font-bold uppercase"><?= date('M', $ts) ?></span></span>
                  </time>
                  <span class="min-w-0 flex-1">
                    <span class="block text-sm font-medium text-navy-900 group-hover:text-brand-600"><?= e($ev['title']) ?></span>
                    <span class="text-xs text-slate-500"><?= e($ev['venue']) ?></span>
                  </span>
                  <?php if (!empty($ev['sample'])): ?><span class="shrink-0 rounded bg-amber-400 px-2 py-0.5 text-[10px] font-bold uppercase text-navy-950">Sample</span><?php endif; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <div class="flex flex-col items-center px-3 py-8 text-center">
            <span class="grid h-14 w-14 place-items-center rounded-full bg-amber-50 text-xl text-amber-500"><i class="fa-regular fa-calendar"></i></span>
            <p class="mt-4 font-semibold text-navy-900">No upcoming events right now</p>
            <p class="mt-1 text-sm text-slate-500">See what has happened on campus so far.</p>
          </div>
        <?php endif; ?>
        <a href="events.php" class="mx-3 mb-2 mt-1 inline-block text-sm font-semibold text-brand-600 hover:underline">View all events →</a>
      </div>

      <div id="panel-links" role="tabpanel" aria-labelledby="tab-links" class="tab-panel p-3" hidden>
        <ul class="grid gap-2 sm:grid-cols-2">
          <?php foreach ([
              ['FRA Fee Structure', $links['fee_pdf'], 'fa-indian-rupee-sign'],
              ['Registration Form', 'addmision.php', 'fa-pen-to-square'],
              ["Principal's Message", 'principle.php', 'fa-user-tie'],
              ['Our Faculty', 'staff.php', 'fa-chalkboard-user'],
              ['Library', 'library.php', 'fa-book'],
              ['Contact & Location', 'contact.php', 'fa-location-dot'],
          ] as [$label, $href, $icon]): ?>
            <li><a href="<?= e($href) ?>" class="flex items-center gap-3 rounded-lg border border-slate-100 p-3 text-sm font-medium text-navy-900 hover:border-brand-200 hover:bg-brand-50"><i class="fa-solid <?= e($icon) ?> w-4 text-brand-600"></i><?= e($label) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="flex justify-end border-t border-slate-100 p-3">
        <a href="<?= e($links['ty_llb']) ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-lg border border-brand-200 px-4 py-2 text-sm font-semibold text-brand-600 hover:bg-brand-50">Online Admission Portal <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- PROGRAMME + WHY CHOOSE -->
<section id="programs" class="scroll-mt-32 bg-white py-16" aria-labelledby="programs-title">
  <div class="mx-auto grid max-w-7xl gap-8 px-4 lg:grid-cols-12 lg:px-6">
    <div class="lg:col-span-8">
      <h2 id="programs-title" class="section-title">Our Programme <span class="text-brand-600">&amp; Campus</span></h2>
      <span class="mt-3 block h-1 w-14 rounded-full bg-brand-600"></span>

      <div class="mt-8 grid gap-5 sm:grid-cols-3">
        <?php foreach ([
            ['img' => 'law.jpg', 'icon' => 'fa-scale-balanced', 'title' => 'LL.B. (3 Yrs.)', 'sub' => 'Bachelor of Laws', 'text' => 'A three-year degree in law for graduates, affiliated to the University of Mumbai.', 'href' => 'about-clg.php#courses'],
            ['img' => 'library1.jpg', 'icon' => 'fa-book', 'title' => 'Law Library', 'sub' => 'Research & Reference', 'text' => 'A curated collection of books, journals and digital legal resources.', 'href' => 'library.php'],
            ['img' => 'classroom.jpg', 'icon' => 'fa-chalkboard', 'title' => 'Classrooms', 'sub' => 'Modern Learning Spaces', 'text' => 'Bright classrooms equipped with projectors and smart displays.', 'href' => 'gallery.php'],
        ] as $c): ?>
          <article class="reveal group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-card">
            <div class="aspect-[16/10] overflow-hidden"><img src="assets/img/<?= e($c['img']) ?>" alt="" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy"></div>
            <div class="flex flex-1 flex-col p-5">
              <div class="flex items-center gap-3">
                <i class="fa-solid <?= e($c['icon']) ?> text-2xl text-brand-600"></i>
                <div><h3 class="font-bold text-navy-900"><?= e($c['title']) ?></h3><p class="text-xs text-slate-500"><?= e($c['sub']) ?></p></div>
              </div>
              <p class="mt-3 flex-1 text-sm text-slate-600"><?= e($c['text']) ?></p>
              <a href="<?= e($c['href']) ?>" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-brand-600">Know More <i class="fa-solid fa-arrow-right transition group-hover:translate-x-1"></i></a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>

    <aside class="reveal rounded-2xl border border-slate-200 bg-slate-50 p-5 lg:col-span-4" aria-labelledby="why-title">
      <div class="flex items-center justify-between">
        <h2 id="why-title" class="text-lg font-bold text-navy-900">Why Choose Hitkarni?</h2>
        <a href="about-clg.php" class="text-xs font-semibold text-brand-600 hover:underline">About us →</a>
      </div>
      <ul class="mt-4 space-y-3">
        <?php foreach ($why as $w): ?>
          <li class="flex items-center gap-4 rounded-xl bg-white p-4 shadow-sm">
            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-xl text-xl <?= e($w['color']) ?>"><i class="fa-solid <?= e($w['icon']) ?>"></i></span>
            <span><span class="block text-sm font-semibold text-navy-900"><?= e($w['title']) ?></span><span class="text-xs text-slate-500"><?= e($w['text']) ?></span></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </aside>
  </div>
</section>

<!-- CAMPUS LIFE -->
<section class="py-16" aria-labelledby="campus-title">
  <div class="mx-auto max-w-7xl px-4 lg:px-6">
    <div class="flex flex-wrap items-end justify-between gap-4">
      <div>
        <h2 id="campus-title" class="section-title">Life on <span class="text-brand-600">Campus</span></h2>
        <span class="mt-3 block h-1 w-14 rounded-full bg-brand-600"></span>
      </div>
      <a href="gallery.php" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-600 hover:underline">View Full Gallery <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="mt-8 grid grid-cols-2 gap-4 lg:grid-cols-4">
      <?php foreach (array_slice($gallery, 0, 4) as $g): ?>
        <a href="gallery.php" class="reveal group relative block aspect-[4/3] overflow-hidden rounded-2xl shadow-sm">
          <img src="assets/img/<?= e($g['src']) ?>" alt="<?= e($g['caption']) ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
          <span class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-navy-950/80 to-transparent p-3 pt-10 text-sm font-semibold text-white"><?= e($g['caption']) ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="pb-16">
  <div class="mx-auto max-w-7xl px-4 lg:px-6">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-navy-900 to-brand-700 px-6 py-10 sm:px-12">
      <i class="fa-solid fa-scale-balanced pointer-events-none absolute -right-6 -top-6 text-[11rem] text-white/5"></i>
      <div class="relative flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
        <div>
          <h2 class="text-2xl font-extrabold text-white sm:text-3xl">Ready to begin your legal career?</h2>
          <p class="mt-2 text-white/75">For F.Y.LL.B admissions, call <a class="font-semibold text-gold-300 hover:underline" href="<?= e(tel_href($site['admission_phone'])) ?>"><?= e($site['admission_phone']) ?></a> or apply online.</p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="<?= e($links['fy_llb']) ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-xl bg-gold-400 px-6 py-3 font-semibold text-navy-950 hover:bg-gold-300">Apply Now <i class="fa-solid fa-arrow-right"></i></a>
          <a href="contact.php" class="inline-flex items-center gap-2 rounded-xl border border-white/40 px-6 py-3 font-semibold text-white hover:bg-white/10">Contact Us</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
