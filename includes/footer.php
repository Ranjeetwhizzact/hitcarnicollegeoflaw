</main>

<footer class="relative overflow-hidden bg-navy-950 text-white/80">
  <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-brand-600/20 blur-3xl"></div>
  <div class="relative mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:grid-cols-2 lg:grid-cols-12 lg:px-6">
    <div class="lg:col-span-4">
      <a href="index.php" class="flex items-center gap-3">
        <img src="assets/img/Logo2 1.png" alt="" class="h-14 w-14 rounded-full ring-2 ring-white/20">
        <span>
          <span class="block text-lg font-bold text-white"><?= e($site['name']) ?></span>
          <span class="block text-xs text-white/60">(<?= e($site['affiliation']) ?>)</span>
        </span>
      </a>
      <p class="mt-5 text-sm leading-relaxed text-white/60"><?= e($site['about']) ?></p>
      <dl class="mt-5 grid grid-cols-2 gap-3 text-sm">
        <div class="rounded-xl bg-white/5 px-4 py-3"><dt class="text-xs text-white/50">College Code</dt><dd class="font-semibold text-white"><?= e($site['college_code']) ?></dd></div>
        <div class="rounded-xl bg-white/5 px-4 py-3"><dt class="text-xs text-white/50">CET Cell Code</dt><dd class="font-semibold text-white"><?= e($site['cet_code']) ?></dd></div>
      </dl>
    </div>

    <div class="lg:col-span-2">
      <h2 class="footer-heading">Quick Links</h2>
      <ul class="mt-4 space-y-2 text-sm">
        <li><a class="footer-link" href="index.php">Home</a></li>
        <li><a class="footer-link" href="about-clg.php">About College</a></li>
        <li><a class="footer-link" href="governing.php">Governing Body</a></li>
        <li><a class="footer-link" href="staff.php">Faculty</a></li>
        <li><a class="footer-link" href="gallery.php">Gallery</a></li>
        <li><a class="footer-link" href="events.php">Events</a></li>
        <li><a class="footer-link" href="contact.php">Contact Us</a></li>
      </ul>
    </div>

    <div class="lg:col-span-2">
      <h2 class="footer-heading">Student Corner</h2>
      <ul class="mt-4 space-y-2 text-sm">
        <li><a class="footer-link" href="addmision.php">Admission</a></li>
        <li><a class="footer-link" href="<?= e($links['fee_pdf']) ?>" target="_blank">Fee Structure</a></li>
        <li><a class="footer-link" href="index.php#notices">Merit Lists</a></li>
        <li><a class="footer-link" href="library.php">Library</a></li>
        <li><span class="text-white/40">Syllabus (soon)</span></li>
        <li><span class="text-white/40">Scholarship (soon)</span></li>
      </ul>
    </div>

    <div class="lg:col-span-4">
      <h2 class="footer-heading">Contact Us</h2>
      <ul class="mt-4 space-y-4 text-sm">
        <li class="flex gap-3">
          <i class="fa-solid fa-phone mt-1 text-gold-400"></i>
          <span class="flex flex-wrap gap-x-2">
            <a class="footer-link" href="<?= e(tel_href($site['phones'][3])) ?>"><?= e($site['phones'][3]) ?></a><span class="text-white/30">/</span>
            <a class="footer-link" href="<?= e(tel_href($site['phones'][0])) ?>"><?= e($site['phones'][0]) ?></a>
          </span>
        </li>
        <li class="flex gap-3"><i class="fa-solid fa-envelope mt-1 text-gold-400"></i><a class="footer-link break-all" href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></li>
        <li class="flex gap-3"><i class="fa-solid fa-location-dot mt-1 text-gold-400"></i><span><?= e($site['address']) ?></span></li>
      </ul>
      <a href="<?= e($links['fy_llb']) ?>" target="_blank" rel="noopener" class="mt-6 inline-flex items-center gap-2 rounded-full bg-gold-400 px-5 py-2.5 text-sm font-semibold text-navy-950 hover:bg-gold-300">Apply for F.Y.LL.B <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <div class="border-t border-white/10">
    <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-2 px-4 py-5 text-xs text-white/50 sm:flex-row lg:px-6">
      <p>&copy; <?= date('Y') ?> <?= e($site['name']) ?>. All Rights Reserved. | <?= e($site['affiliation']) ?>.</p>
      <p>Developed by <a href="https://www.whizzact.com/" target="_blank" rel="noopener" class="text-white/70 underline-offset-2 hover:underline">WhizzAct</a></p>
    </div>
  </div>
</footer>

<button type="button" id="to-top" class="fixed bottom-5 right-5 z-40 grid h-11 w-11 translate-y-4 place-items-center rounded-full bg-brand-600 text-white opacity-0 shadow-lg transition" aria-label="Back to top"><i class="fa-solid fa-arrow-up"></i></button>

<script src="assets/js/main.js"></script>
<?php foreach ($page_scripts ?? [] as $script): ?>
<script src="<?= e($script) ?>"></script>
<?php endforeach; ?>
</body>
</html>
