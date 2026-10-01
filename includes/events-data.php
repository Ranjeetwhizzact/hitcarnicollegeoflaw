<?php
/**
 * Events shown on events.php (and the "Events" tab on the homepage).
 *
 * The original site had no events, so every entry below is SAMPLE content
 * ('sample' => true) used to preview the layout. Sample events carry a visible
 * "Sample" badge and the page shows a notice while any remain.
 * Replace them with real events and delete the 'sample' key.
 *
 * Fields:
 *   title, date (YYYY-MM-DD), category (key of $event_categories),
 *   venue, summary (card text), details (optional, shown in the popup),
 *   image (cover photo, file in assets/img),
 *   photos (optional list of extra files in assets/img – clicking a card opens
 *           a gallery of the cover + these photos), sample (bool)
 */

$event_categories = [
    'national' => ['label' => 'National Days', 'icon' => 'fa-flag',            'chip' => 'bg-orange-100 text-orange-700'],
    'moot'     => ['label' => 'Moot Court',    'icon' => 'fa-gavel',           'chip' => 'bg-brand-100 text-brand-700'],
    'cultural' => ['label' => 'Cultural',      'icon' => 'fa-music',           'chip' => 'bg-fuchsia-100 text-fuchsia-700'],
    'academic' => ['label' => 'Academic',      'icon' => 'fa-graduation-cap',  'chip' => 'bg-sky-100 text-sky-700'],
    'sports'   => ['label' => 'Sports',        'icon' => 'fa-trophy',          'chip' => 'bg-emerald-100 text-emerald-700'],
    'nss'      => ['label' => 'NSS',           'icon' => 'fa-people-group',    'chip' => 'bg-rose-100 text-rose-700'],
    'other'    => ['label' => 'Other Events',  'icon' => 'fa-ellipsis',        'chip' => 'bg-amber-100 text-amber-700'],
];

$events = [
    // ---- 2026 (sample) ----
    ['title' => 'Alumni Meet 2026', 'date' => '2026-12-15', 'category' => 'other', 'venue' => 'College Campus', 'image' => 'gal1.png', 'photos' => ['image 2.png', 'gal2.png', 'college_build.jpg'], 'sample' => true,
     'summary' => 'Reconnecting with our alumni and celebrating their journeys in law.'],
    ['title' => 'Inter-Collegiate Sports Event', 'date' => '2026-10-22', 'category' => 'sports', 'venue' => 'College Ground', 'image' => 'gal8 (2).png', 'photos' => ['gal8 (1).png', 'gal3.png'], 'sample' => true,
     'summary' => 'Competing with neighbouring colleges to promote sportsmanship.'],
    ['title' => 'Clean Campus Drive', 'date' => '2026-09-12', 'category' => 'nss', 'venue' => 'College Campus', 'image' => 'gal3.png', 'photos' => ['gal4.png', 'college_build.jpg', 'gal5.png'], 'sample' => true,
     'summary' => 'Students take part in cleanliness and sustainability activities.'],
    ['title' => 'Independence Day Celebration 2026', 'date' => '2026-08-15', 'category' => 'national', 'venue' => 'College Campus', 'image' => 'college_build.jpg', 'photos' => ['college.jpg', 'gal4.png'], 'sample' => true,
     'summary' => 'Flag hoisting and cultural performances paying tribute to our freedom fighters.'],
    ['title' => 'Intra-College Moot Court Competition', 'date' => '2026-03-14', 'category' => 'moot', 'venue' => 'Moot Court Hall', 'image' => 'law.jpg', 'photos' => ['court.jpg', 'demo4.png', 'library2.jpg'], 'sample' => true,
     'summary' => 'Students argue mock cases before a bench to sharpen advocacy skills.'],
    ['title' => 'Annual Gathering 2026', 'date' => '2026-02-07', 'category' => 'cultural', 'venue' => 'College Hall', 'image' => 'image 16 (1).png', 'photos' => ['demo3.png', 'gal2.png'], 'sample' => true,
     'summary' => 'A day full of talent, creativity and unforgettable performances.'],
    ['title' => 'Republic Day Celebration 2026', 'date' => '2026-01-26', 'category' => 'national', 'venue' => 'College Campus', 'image' => 'gal4.png', 'photos' => ['college_build.jpg', 'college.jpg'], 'sample' => true,
     'summary' => 'Flag hoisting followed by a talk on the Constitution of India.'],
    ['title' => 'Workshop on Legal Drafting', 'date' => '2026-01-18', 'category' => 'academic', 'venue' => 'Seminar Hall', 'image' => 'demo1.png', 'photos' => ['classroom.jpg', 'library1.jpg', 'demo3.png'], 'sample' => true,
     'summary' => 'Hands-on workshop on drafting notices, petitions and agreements.'],

    // ---- 2025 (sample) ----
    ['title' => 'Legal Aid Awareness Camp', 'date' => '2025-12-24', 'category' => 'other', 'venue' => 'Mankhurd Community Centre', 'image' => 'demo3.png', 'photos' => ['demo1.png', 'gal4.png'], 'sample' => true,
     'summary' => 'Students explain basic legal rights and free legal aid to residents.'],
    ['title' => 'Inter-Class Cricket Tournament', 'date' => '2025-10-05', 'category' => 'sports', 'venue' => 'College Ground', 'image' => 'gal8 (1).png', 'photos' => ['gal8 (2).png', 'gal3.png'], 'sample' => true,
     'summary' => 'Building team spirit through sports and healthy competition.'],
    ['title' => 'Tree Plantation Drive', 'date' => '2025-09-21', 'category' => 'nss', 'venue' => 'College Campus', 'image' => 'gal3.png', 'photos' => ['gal8 (1).png', 'gal5.png'], 'sample' => true,
     'summary' => 'Students come together for a greener and healthier tomorrow.'],
    ['title' => 'Independence Day Celebration 2025', 'date' => '2025-08-15', 'category' => 'national', 'venue' => 'College Campus', 'image' => 'college_build.jpg', 'photos' => ['college.jpg', 'gal4.png'], 'sample' => true,
     'summary' => 'Flag hoisting, cultural performances and tribute to our freedom fighters.'],
    ['title' => 'Moot Court Orientation', 'date' => '2025-03-12', 'category' => 'moot', 'venue' => 'Moot Court Hall', 'image' => 'court.jpg', 'photos' => ['law.jpg', 'demo4.png'], 'sample' => true,
     'summary' => 'An introduction to courtroom procedure and moot court etiquette.'],
    ['title' => 'Annual Gathering 2025', 'date' => '2025-02-28', 'category' => 'cultural', 'venue' => 'College Hall', 'image' => 'image 16 (1).png', 'photos' => ['demo3.png', 'gal2.png'], 'sample' => true,
     'summary' => 'A day full of talent, creativity and unforgettable performances.'],
    ['title' => 'Republic Day Celebration 2025', 'date' => '2025-01-26', 'category' => 'national', 'venue' => 'College Campus', 'image' => 'gal4.png', 'photos' => ['college_build.jpg', 'college.jpg'], 'sample' => true,
     'summary' => 'Flag hoisting, march past and patriotic performances.'],
    ['title' => 'Guest Lecture on Constitutional Law', 'date' => '2025-01-10', 'category' => 'academic', 'venue' => 'Classroom 1', 'image' => 'classroom.jpg', 'photos' => ['gal2.png', 'library1.jpg', 'demo4.png'], 'sample' => true,
     'summary' => 'An interactive session with a practising advocate on landmark judgments.'],
];

/** Events grouped by year (newest year first, newest event first). */
function events_by_year(array $events): array
{
    usort($events, fn($a, $b) => strcmp($b['date'], $a['date']));
    $years = [];
    foreach ($events as $ev) {
        $years[substr($ev['date'], 0, 4)][] = $ev;
    }
    krsort($years);
    return $years;
}

/** Upcoming events (today or later), soonest first. */
function upcoming_events(array $events, int $limit = 3): array
{
    $today = date('Y-m-d');
    $up = array_values(array_filter($events, fn($e) => $e['date'] >= $today));
    usort($up, fn($a, $b) => strcmp($a['date'], $b['date']));
    return array_slice($up, 0, $limit);
}
