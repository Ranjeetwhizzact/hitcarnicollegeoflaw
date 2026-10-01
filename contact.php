<?php
$page_title = 'Contact Us | Hitkarni College of Law';
include 'includes/header.php';

$hero_eyebrow = "We'd love to hear from you";
$hero_title   = 'Contact Us';
$hero_image   = 'college_build.jpg';
$hero_crumbs  = ['Contact Us' => null];
include 'includes/page-hero.php';
?>

<section class="py-16">
  <div class="mx-auto grid max-w-7xl gap-8 px-4 lg:grid-cols-12 lg:px-6">
    <div class="space-y-4 lg:col-span-5">
      <div class="rounded-2xl bg-white p-6 shadow-card">
        <h2 class="text-lg font-bold text-navy-900">Contact Details</h2>
        <p class="mt-1 text-sm text-slate-500">Welcome to our college. We are glad to have you around.</p>
        <ul class="mt-6 space-y-5 text-sm">
          <li class="flex gap-4">
            <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600"><i class="fa-solid fa-phone"></i></span>
            <span><span class="block text-xs text-slate-500">Call Us</span>
              <?php foreach ($site['phones'] as $phone): ?>
                <a href="<?= e(tel_href($phone)) ?>" class="mr-3 inline-block font-semibold text-navy-900 hover:text-brand-600"><?= e($phone) ?></a>
              <?php endforeach; ?>
            </span>
          </li>
          <li class="flex gap-4">
            <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600"><i class="fa-solid fa-envelope"></i></span>
            <span><span class="block text-xs text-slate-500">Mail Us</span><a href="mailto:<?= e($site['email']) ?>" class="break-all font-semibold text-navy-900 hover:text-brand-600"><?= e($site['email']) ?></a></span>
          </li>
          <li class="flex gap-4">
            <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600"><i class="fa-solid fa-location-dot"></i></span>
            <span><span class="block text-xs text-slate-500">Address</span><span class="font-semibold text-navy-900"><?= e($site['address']) ?></span></span>
          </li>
        </ul>
      </div>
      <div class="overflow-hidden rounded-2xl shadow-card">
        <iframe src="<?= e($site['map_embed']) ?>" title="Map to Hitkarni College of Law" class="block h-72 w-full border-0" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
      </div>
    </div>

    <div class="lg:col-span-7">
      <form id="contact-form" class="rounded-2xl bg-white p-6 shadow-card sm:p-8" novalidate>
        <h2 class="text-lg font-bold text-navy-900">Drop Us a Message</h2>
        <p class="mt-1 text-sm text-slate-500">Submitting opens your email app with this message addressed to the college.</p>
        <div class="mt-6 grid gap-5 sm:grid-cols-2">
          <label class="block text-sm font-medium text-navy-900">Name
            <input type="text" name="name" required class="mt-1.5 w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500" placeholder="Your full name">
          </label>
          <label class="block text-sm font-medium text-navy-900">Email
            <input type="email" name="email" required class="mt-1.5 w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500" placeholder="you@example.com">
          </label>
          <label class="block text-sm font-medium text-navy-900 sm:col-span-2">Subject
            <input type="text" name="subject" required class="mt-1.5 w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500" placeholder="e.g. F.Y.LL.B admission enquiry">
          </label>
          <label class="block text-sm font-medium text-navy-900 sm:col-span-2">Message
            <textarea name="message" rows="6" required class="mt-1.5 w-full rounded-xl border-slate-200 focus:border-brand-500 focus:ring-brand-500" placeholder="How can we help?"></textarea>
          </label>
        </div>
        <p id="contact-error" class="error hidden" role="alert">Please fill in every field with a valid email address.</p>
        <button type="submit" class="mt-6 inline-flex items-center gap-2 rounded-xl bg-brand-600 px-6 py-3 font-semibold text-white hover:bg-brand-700">Send Message <i class="fa-solid fa-paper-plane"></i></button>
      </form>
    </div>
  </div>
</section>

<script>
  document.getElementById('contact-form').addEventListener('submit', function (e) {
    e.preventDefault();
    var f = e.target, err = document.getElementById('contact-error');
    if (!f.checkValidity()) { err.classList.remove('hidden'); return; }
    err.classList.add('hidden');
    var body = f.message.value + '\n\n— ' + f.name.value + ' (' + f.email.value + ')';
    window.location.href = 'mailto:<?= e($site['email']) ?>?subject=' + encodeURIComponent(f.subject.value) + '&body=' + encodeURIComponent(body);
  });
</script>

<?php include 'includes/footer.php'; ?>
