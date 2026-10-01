<?php
/**
 * Central site data for the redesign.
 * Every value here was taken from the original project (component/header.php,
 * component/footer.php, index.php and the inner pages) so content stays in one place.
 */

$site = [
    'name'        => 'Hitkarni College of Law',
    'foundation'  => "Seva Foundation's",
    'affiliation' => 'Affiliated to University of Mumbai',
    'recognition' => 'Recognized by Government of Maharashtra, Affiliated to University of Mumbai and Approved by Bar Council of India',
    'email'       => 'hitkarnicollegeoflaw@gmail.com',
    'phones'      => ['+91 91376 80919', '+91 97681 67183', '+91 98337 74251', '+91 99879 19992'],
    'admission_phone' => '+91 99879 19992',
    'address'     => 'Hitkarni College of Law, Lallubhai Compound, A Wing, School Building, Mankhurd, Mumbai 400043',
    'college_code' => '1182',
    'cet_code'    => '2407110812',
    'about'       => 'The College was founded on 6th September 2022 by the Seva Foundation. The object of the Society in starting the institution was to cater to the educational needs of the ever growing population of this cosmopolitan city in general, and to promote higher education among the Scheduled Castes and Scheduled Tribes in particular.',
    'map_embed'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d942.8045129892087!2d72.9278529284634!3d19.0541481988795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c78a6ebabd15%3A0xf75d180eced39020!2sHitkarni%20College%20of%20Law!5e0!3m2!1sen!2sin!4v1695571144317!5m2!1sen!2sin',
];

// External admission portals used by the original site.
$links = [
    'fy_llb'   => 'https://admission.onfees.com/admissionLogin?instituteId=493&formPolicyId=422',
    'sy_llb'   => 'https://admission.onfees.com/admissionLogin?instituteId=493&formPolicyId=423',
    'ty_llb'   => 'https://mh.printallresults.com/new-student/2',
    'fee_pdf'  => 'assets/pdf/online_fee_proposal.pdf',
];

/** Strip spaces/dashes so a display number can be used in a tel: link. */
function tel_href(string $phone): string
{
    return 'tel:' . preg_replace('/[^0-9+]/', '', $phone);
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/*
 * Navigation. 'soon' => true marks sections that the original site listed but
 * never filled in ("We will update soon" / placeholder "Action" items).
 */
$nav = [
    ['label' => 'Home', 'href' => 'index.php'],
    ['label' => 'About College', 'children' => [
        ['label' => 'About Us', 'href' => 'about-clg.php'],
        ['label' => 'Vision & Mission', 'href' => 'Vission&Mission.php'],
        ['label' => "Principal's Message", 'href' => 'principle.php'],
        ['label' => 'Trustees', 'href' => 'trustee.php'],
        ['label' => 'Governing Body', 'href' => 'governing.php'],
        ['label' => 'Faculty', 'href' => 'staff.php'],
        ['label' => 'Infrastructure', 'href' => 'gallery.php'],
    ]],
    ['label' => 'Academics', 'children' => [
        ['label' => 'LL.B. Course (3 Yrs.)', 'href' => 'about-clg.php#courses'],
        ['label' => 'Library', 'href' => 'library.php'],
        ['label' => 'Syllabus', 'soon' => true],
    ]],
    ['label' => 'Admissions', 'children' => [
        ['label' => 'F.Y.LL.B Admission', 'href' => $links['fy_llb'], 'external' => true],
        ['label' => 'S.Y.LL.B Admission', 'href' => $links['sy_llb'], 'external' => true],
        ['label' => 'T.Y.LL.B Admission', 'href' => $links['ty_llb'], 'external' => true],
        ['label' => 'Registration Form', 'href' => 'addmision.php'],
        ['label' => 'FRA Fee Structure', 'href' => $links['fee_pdf'], 'external' => true],
    ]],
    ['label' => 'Committees', 'children' => [['label' => 'Will be updated soon', 'soon' => true]]],
    ['label' => 'NAAC', 'children' => [['label' => 'Will be updated soon', 'soon' => true]]],
    ['label' => 'IQAC', 'children' => [['label' => 'Will be updated soon', 'soon' => true]]],
    ['label' => 'RTI', 'children' => [['label' => 'Will be updated soon', 'soon' => true]]],
    ['label' => 'Library', 'href' => 'library.php'],
    ['label' => 'Gallery', 'href' => 'gallery.php'],
    ['label' => 'Events', 'href' => 'events.php'],
    ['label' => 'Contact Us', 'href' => 'contact.php'],
];

// Notices from the "Announcement" and "Notice Board" cards on the original homepage.
$notices = [
    ['title' => 'Online Admission Open – LL.B.', 'href' => $links['ty_llb'], 'tag' => 'Admission', 'new' => true],
    ['title' => 'FYLLB Institutional Round Merit List 2025-26', 'href' => 'assets/pdf/first_marit_list.pdf', 'tag' => 'Merit List', 'new' => true],
    ['title' => 'FYLLB Second Merit List 2025-26', 'href' => 'assets/pdf/second_marit_list.pdf', 'tag' => 'Merit List', 'new' => true],
    ['title' => 'Approved Fee Structure for 2025-26', 'href' => $links['fee_pdf'], 'tag' => 'Fees', 'new' => false],
];

$principal = [
    'name'   => 'Prof. Rajhans Gaikwad',
    'role'   => 'Principal',
    'quals'  => 'BSc, MSW (TISS), LLM, NET, SET, PGDLL&LW, PGDCL, PGDHR, PhD (Research Scholar – Law)',
    'photo'  => 'assets/img/law_principle.jpg',
    'title'  => 'Education is the Vision of Life',
    'message' => [
        'We need education to lead a meaningful and comfortable life. Focusing on higher education plays a vital role in the development of a society. Today in India, higher education is in a transition period.',
        'Our institution always provides opportunities for aspiring students. Our teaching and non-teaching staff organize various events to elicit positive response from talented students.',
        'Our aim is to become a premier institution in providing higher education in general and law education in particular, to deprived students in the city of Mumbai.',
    ],
];

$trustees = [
    ['name' => 'Mr. Prakash P. Charhate', 'role' => 'President', 'quals' => 'M.Com, M.A, M.Ed, PGDC&J, CPCT', 'photo' => 'Prakash_precident.jpg'],
    ['name' => 'Dr. Vishnu Magre', 'role' => 'Vice-President', 'quals' => 'MSc, PhD', 'photo' => 'visthnu_vc-precident.jpg'],
    ['name' => 'Prof. Rajhans Gaikwad', 'role' => 'Secretary', 'quals' => 'BSc, MSW (TISS), LLM, NET, SET, PGDLL&LW, PGDCL, PGDHR, PhD (Research Scholar – Law)', 'photo' => 'rajan_secretary.jpg'],
    ['name' => 'Mr. Laxmidhar Naik', 'role' => 'Treasurer', 'quals' => '', 'photo' => 'lakshmidhar_Treasurer.png'],
    ['name' => 'Prof. Nileshwari Khandare', 'role' => 'Committee Member', 'quals' => 'B.A, LLM, NET, SET', 'photo' => 'nileshwari_cm.jpg'],
    ['name' => 'Mr. Javed Gani Moosa', 'role' => 'Committee Member', 'quals' => '', 'photo' => 'javed_cm.jpg'],
    ['name' => 'Dr. Praveen Buram (M.D)', 'role' => 'Committee Member', 'quals' => '', 'photo' => 'praveen_cm.jpg'],
];

$faculty = [
    ['name' => 'Prof. Nileshwari Khandare', 'quals' => 'B.A, LLM, NET, SET', 'photo' => 'prof_nileshwari.jpg'],
    ['name' => 'Prof. Renu Yadav', 'quals' => 'LLM, SET', 'photo' => 'prof_renu.jpg'],
    ['name' => 'Prof. Prishit Bagul', 'quals' => 'BA, LLM', 'photo' => 'prof_prishith.jpg'],
    ['name' => 'Prof. Shazia Ansari', 'quals' => 'M.Com, MA, LLM', 'photo' => 'prof_shajiya.jpg'],
    ['name' => 'Prof. Vivek Tiwari', 'quals' => 'B.Com, LLM', 'photo' => 'prof_vivek.jpg'],
];

$non_teaching = [
    ['name' => 'Sonam Jagtap', 'role' => 'Librarian', 'photo' => 'sonam.jpg'],
];

$governing_body = [
    'Smt. Shusma Rathore',
    'Dr. Manish Patil',
    'Mr. Ranjeet Kalicharan',
    'Mr. Anurag Devi Prasad',
    'Mr. Dindayal Uppadhyay',
];

$gallery = [
    ['src' => 'library1.jpg', 'caption' => 'College Library'],
    ['src' => 'classroom.jpg', 'caption' => 'Classroom'],
    ['src' => 'ladies_common_room.jpg', 'caption' => 'Ladies Common Room'],
    ['src' => 'law.jpg', 'caption' => 'Moot Court Hall'],
    ['src' => 'court.jpg', 'caption' => 'Moot Court – Bench View'],
    ['src' => 'library2.jpg', 'caption' => 'Library Reading Area'],
    ['src' => 'college_build.jpg', 'caption' => 'College Building'],
];

require_once __DIR__ . '/events-data.php';
