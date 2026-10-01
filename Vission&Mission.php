<?php
$page_title = 'Vision & Mission | Hitkarni College of Law';
include 'includes/header.php';

$hero_eyebrow = "Seva Foundation's";
$hero_title   = 'Vision &amp; Mission';
$hero_image   = 'law.jpg';
$hero_crumbs  = ['About College' => 'about-clg.php', 'Vision & Mission' => null];
include 'includes/page-hero.php';
?>

<section class="py-16">
  <div class="mx-auto grid max-w-6xl gap-6 px-4 md:grid-cols-2 lg:px-6">
    <article class="rounded-3xl bg-white p-8 shadow-card">
      <span class="grid h-14 w-14 place-items-center rounded-2xl bg-brand-50 text-2xl text-brand-600"><i class="fa-solid fa-eye"></i></span>
      <h2 class="mt-5 text-2xl font-extrabold text-navy-900">Vision</h2>
      <p class="mt-4 leading-relaxed text-slate-600">To provide affordable quality education, while equipping students with knowledge and skills in their chosen stream, inculcate values, identify potential and thus shape them into future leaders, entrepreneurs and hidden talents, provide opportunities for students to realize their full potential and, above all, be good human beings.</p>
      <p class="mt-4 leading-relaxed text-slate-600">To provide equal access and opportunities, especially to the socially and economically deprived.</p>
    </article>
    <article class="rounded-3xl bg-navy-900 p-8 text-white shadow-card">
      <span class="grid h-14 w-14 place-items-center rounded-2xl bg-white/10 text-2xl text-gold-400"><i class="fa-solid fa-bullseye"></i></span>
      <h2 class="mt-5 text-2xl font-extrabold">Mission</h2>
      <p class="mt-4 leading-relaxed text-white/80">To strive for quality education in keeping with the motto of the college, and prepare young minds for imbibing knowledge, skills and sensitivity.</p>
      <p class="mt-8 font-script text-4xl text-gold-400">“Excellence in Education”</p>
      <p class="text-xs uppercase tracking-widest text-white/50">College motto</p>
    </article>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
