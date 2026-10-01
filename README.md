# Hitkarni College of Law – Redesign

A self-contained redesign of the site. The original project in the parent folder was not modified.

Run it on XAMPP at `http://localhost/hitkarnicollegeoflaw/redesign/`, or run it on its own with:

```
php -S localhost:8090 -t redesign
```

## Stack

- PHP 8 includes, same as the original. Every page still uses its original filename, so old links keep working.
- Tailwind CSS from the Play CDN (`cdn.tailwindcss.com`), configured in `includes/header.php`.
  Before going to production, compile Tailwind with the Tailwind CLI. The Play CDN is meant for development.
- Font Awesome 6 (cdnjs) and Google Fonts: Poppins (carried over from the original) and Caveat (used for the "Learn · Grow · Belong" accent).
- Plain JavaScript. jQuery, Bootstrap and Owl Carousel are no longer needed.

## Structure

```
redesign/
├── includes/
│   ├── config.php          ← all site content: contacts, links, nav, notices, people, gallery
│   ├── header.php          ← top bar, header, desktop nav, mobile drawer, search modal
│   ├── footer.php
│   ├── page-hero.php       ← inner-page banner + breadcrumbs
│   ├── principal-card.php  ← shared principal's message
│   └── person-card.php     ← trustee/faculty card
├── assets/
│   ├── img/  pdf/          ← copied unchanged from ../assets
│   ├── css/app.css
│   └── js/main.js, admission.js, fslightbox.js (original lightbox)
└── index.php, about-clg.php, Vission&Mission.php, principle.php, trustee.php,
    staff.php, governing.php, library.php, gallery.php, contact.php, addmision.php
```

To update notices, merit lists, faculty or phone numbers, edit `includes/config.php`. To update events, edit `includes/events-data.php`.

**Events are sample content.** The original site had no events, so `events-data.php` ships with placeholder events marked `'sample' => true`. They use existing stock and campus photos. While any sample event remains, the cards show a "Sample" badge and the Events page shows a notice. Replace them with real events and delete the `sample` key. The homepage Events tab lists the next upcoming events from the same file.

## Page mapping

| Original | Redesign | Notes |
|---|---|---|
| index.php | index.php | Laid out like the mockup: hero, choose year, about + notices tabs, programme & campus, campus life, CTA |
| about-clg.php | about-clg.php | Adds key facts, a courses section with portal links, and fee and merit PDFs |
| Vission&Mission.php | same | Vision and mission cards |
| principle.php | same | |
| trustee.php / staff.php | same | Cards now come from data. The principal's message is a shared partial. |
| governing.php | same | The original page existed, but the menu linked to `#`. It is linked now. |
| library.php, gallery.php | same | Gallery keeps the fslightbox lightbox |
| — | **events.php** (new) | Category filter (`?category=moot` deep-links), events grouped by year, a year jump selector, "View More" after 8 cards per year, and a whole-card click that opens a photo gallery for the event (prev/next, thumbnails, arrow keys, swipe, with the event details underneath). Each event has a cover `image` plus an optional `photos` list. Data comes from `includes/events-data.php`. |
| contact.php | same | The map embed is fixed (the original URL was broken: `hps://` with line breaks) |
| addmision.php | same | 4-step wizard. Field ids and names are unchanged. |

## Behaviour notes

- **Admissions** still go through the external portals (onfees for F.Y. and S.Y., printallresults for T.Y.), with the same URLs as before.
- **Registration form (`addmision.php`).** The original never sent data anywhere: the AJAX call was commented out and it only ran `console.log`. The redesign keeps this behaviour on purpose. It validates the form using the same rules, then points the student to the admission portal. To store submissions, add a backend and post the form to it.
- **Remote dropdowns** (programme, year, category) use the same `mh.printallresults.com/api/v1` endpoints as before. When this was built, that host returned an invalid SSL certificate (`ERR_CERT_COMMON_NAME_INVALID`), so the dropdowns fail on the old site too. The redesign shows a message and does not block the form.
- **Contact form.** The original had no action. The redesign opens the visitor's email app with the message addressed to the college.
- **Search** (the magnifier icon, or press `/`) searches the site's own pages and notices in the browser.
- Mockup sections with no matching data were adapted, not invented. "Our Events" on the homepage became "Life on Campus". The full events listing is on `events.php`.

## Not carried over from the original

- `changes/.htaccess` and `changes/pdf (2).zip`. The `.htaccess` whitelists files such as `lock360.php`, `wp-l0gin.php` and `radio.php`. Those names are a common sign of a compromised server. Review it on the live host.
- Unused images (`demo*.png`, `gal*.png`, `image 4 (1).png` and others) were still copied, so nothing is lost.
