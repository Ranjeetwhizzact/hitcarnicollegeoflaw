<?php
$page_title = 'Admission Registration | Hitkarni College of Law';
$page_scripts = ['assets/js/admission.js'];
include 'includes/header.php';

$hero_eyebrow = 'Admissions';
$hero_title   = 'Registration Form';
$hero_image   = 'classroom.jpg';
$hero_crumbs  = ['Admissions' => null, 'Registration' => null];
include 'includes/page-hero.php';

/*
 * Field ids and names are kept identical to the original addmision.php so any
 * future backend written against the old form keeps working.
 * [id, name, label, type, required, placeholder, extra-classes]
 */
$input = function (string $id, string $name, string $label, string $type = 'text', bool $required = false, string $placeholder = '', string $wrap = '') {
    $req = $required ? ' required' : '';
    $tag = $type === 'textarea'
        ? '<textarea id="' . e($id) . '" name="' . e($name) . '" rows="3" placeholder="' . e($placeholder) . '" class="field"></textarea>'
        : '<input type="' . e($type) . '" id="' . e($id) . '" name="' . e($name) . '" placeholder="' . e($placeholder) . '" class="field">';
    echo '<div class="' . e($wrap) . '"><label for="' . e($id) . '" class="label' . $req . '">' . e($label) . '</label>' . $tag . '<span id="' . e($id) . 'Error" class="error"></span></div>';
};

$radio_group = function (string $name, string $label, array $options) {
    echo '<fieldset><legend class="label required">' . e($label) . '</legend><div class="mt-2 flex flex-wrap gap-2">';
    foreach ($options as $id => $text) {
        echo '<label for="' . e($id) . '" class="choice"><input type="radio" id="' . e($id) . '" name="' . e($name) . '" value="' . e($text) . '" class="text-brand-600 focus:ring-brand-500"> ' . e($text) . '</label>';
    }
    echo '</div><span id="' . e($name) . 'Error" class="error"></span></fieldset>';
};

$steps = ['Personal Info', 'Contact Info', 'Other Info', 'Qualification'];
?>
<style>
  .label { display:block; margin-bottom:.375rem; font-size:.8125rem; font-weight:500; color:#0b1b48; }
  .field { width:100%; border-radius:.75rem; border-color:#e2e8f0; font-size:.875rem; }
  .field:focus { border-color:#3b5bfd; --tw-ring-color:#3b5bfd; }
  .choice { display:inline-flex; align-items:center; gap:.5rem; border:1px solid #e2e8f0; border-radius:.75rem; padding:.5rem .875rem; font-size:.875rem; cursor:pointer; }
  .choice:has(input:checked) { border-color:#2b44e0; background:#eef2ff; }
  .field.is-invalid { border-color:#dc2626; }
</style>

<section class="py-12">
  <div class="mx-auto max-w-5xl px-4 lg:px-6">
    <div class="mb-8 flex flex-col items-center gap-2 text-center">
      <img src="assets/img/Logo2 1.png" alt="" class="h-16 w-16 rounded-full shadow">
      <p class="text-xs font-semibold uppercase tracking-widest text-slate-500"><?= e($site['foundation']) ?></p>
      <h2 class="text-2xl font-extrabold text-navy-900">Hitkarni College of Law, Mumbai</h2>
      <p class="text-sm text-slate-500">(<?= e($site['affiliation']) ?>) · Lallubhai Compound, Mankhurd – 400 043</p>
    </div>

    <div class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-900">
      <i class="fa-solid fa-circle-info mr-1"></i>
      Admissions are processed through the official online portal:
      <a href="<?= e($links['fy_llb']) ?>" target="_blank" rel="noopener" class="font-semibold underline">F.Y.LL.B</a> ·
      <a href="<?= e($links['sy_llb']) ?>" target="_blank" rel="noopener" class="font-semibold underline">S.Y.LL.B</a> ·
      <a href="<?= e($links['ty_llb']) ?>" target="_blank" rel="noopener" class="font-semibold underline">T.Y.LL.B</a>.
      Use this form to prepare and check your details first.
    </div>

    <form id="collegeRegistration" class="college_form overflow-hidden rounded-3xl bg-white shadow-card" novalidate>
      <input type="hidden" name="client_id" id="client_id" value="2">

      <ol class="grid grid-cols-2 gap-2 border-b border-slate-100 p-4 sm:grid-cols-4" aria-label="Form steps">
        <?php foreach ($steps as $i => $label): ?>
          <li><button type="button" class="step-pill flex w-full items-center gap-2 rounded-xl border border-slate-200 px-3 py-2.5 text-left text-xs font-semibold text-slate-500 sm:text-sm" data-step-pill="<?= $i ?>" <?= $i === 0 ? 'aria-current="step"' : '' ?>>
            <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-black/5 text-xs"><?= $i + 1 ?></span><?= e($label) ?>
          </button></li>
        <?php endforeach; ?>
      </ol>

      <!-- Step 1: Personal -->
      <fieldset class="wizard-step p-6 sm:p-8" data-step="0">
        <legend class="sr-only">Personal info</legend>
        <div class="grid gap-6 md:grid-cols-3">
          <div class="space-y-4">
            <div>
              <span class="label required">Photograph</span>
              <label for="imageUpload" class="flex aspect-[3/4] cursor-pointer flex-col items-center justify-center gap-2 overflow-hidden rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 text-center text-xs text-slate-500 hover:border-brand-400">
                <span id="imageContainer" class="contents"><img src="assets/img/image-gallery.png" alt="" class="h-12 w-12 opacity-60"><span>Affix I-Card size photograph<br>(max 500 KB)</span></span>
              </label>
              <input type="file" id="imageUpload" accept="image/*" class="sr-only">
              <span id="photoError" class="error"></span>
            </div>
            <div>
              <span class="label required">Signature</span>
              <label for="imageUploads" class="flex h-20 cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 text-xs text-slate-500 hover:border-brand-400">
                <span id="imageContainers" class="contents"><i class="fa-solid fa-signature text-lg"></i> Upload signature (max 50 KB)</span>
              </label>
              <input type="file" id="imageUploads" accept="image/*" class="sr-only">
              <span id="signError" class="error"></span>
            </div>
          </div>
          <div class="grid gap-4 sm:grid-cols-2 md:col-span-2">
            <?php
            $input('surname', 'student_lname', 'Surname', 'text', true, 'Enter your surname');
            $input('firstname', 'student_fname', 'First Name', 'text', true, 'Enter your first name');
            $input('mothername', 'mother_fname', "Mother's Name", 'text', true, "Enter your mother's name");
            $input('fathername', 'father_fname', "Father's Name", 'text', true, "Enter your father's name");
            $input('pra_no', 'pra_no', 'PRN No. (not for first year students)', 'text', false, 'Type');
            $input('Ua_formno', 'Ua_formno', 'University Application Form No.', 'text', true, '12 characters, e.g. AB1234567890');
            $input('abc_id', 'abc_id', 'ABC ID', 'text', true, 'Academic Bank of Credits – 12 digits');
            $input('aadhar', 'aadhar', 'Aadhaar Card', 'text', true, '12 digits');
            ?>
            <div>
              <label for="Program" class="label required">Programme Offered</label>
              <select id="Program" name="Program" class="field"><option value="">Loading…</option></select>
              <span id="ProgramError" class="error"></span>
            </div>
            <div>
              <label for="class_detail" class="label required">Year</label>
              <select id="class_detail" name="class_detail" class="field"><option value="">Select a programme first</option></select>
              <span id="class_detailError" class="error"></span>
            </div>
          </div>
        </div>
      </fieldset>

      <!-- Step 2: Contact -->
      <fieldset class="wizard-step hidden p-6 sm:p-8" data-step="1">
        <legend class="sr-only">Contact info</legend>
        <div class="grid gap-8 md:grid-cols-2">
          <div class="space-y-4">
            <h3 class="font-bold text-navy-900">Your Contact Details</h3>
            <?php
            $input('ownaddress', 'ownaddres', 'Address', 'textarea', true, 'Type here…');
            $input('number', 'Phonenumber', 'Mobile Number', 'tel', true, '10-digit mobile number');
            $input('Whatapp', 'Whatapp', 'WhatsApp Number', 'tel', true, '10-digit WhatsApp number');
            $input('tel', 'telno', 'Tel. No.', 'tel', false, 'Telephone number');
            $input('email', 'email_id', 'Email ID', 'email', true, 'you@example.com');
            ?>
          </div>
          <div class="space-y-4">
            <h3 class="font-bold text-navy-900">Your Parent's Details</h3>
            <?php
            $input('native_place', 'Native_Place', 'Native Place', 'textarea', false, 'Type here…');
            $input('parent_num', "Parent's_number", "Parent's Number", 'tel', false, "Enter your parent's number");
            ?>
          </div>
        </div>
      </fieldset>

      <!-- Step 3: Other -->
      <fieldset class="wizard-step hidden p-6 sm:p-8" data-step="2">
        <legend class="sr-only">Other info</legend>
        <div class="grid gap-8 md:grid-cols-2">
          <div class="space-y-5">
            <fieldset>
              <legend class="label required">Category</legend>
              <div id="casteData" class="mt-2 flex flex-wrap gap-2 text-sm text-slate-500">Loading categories…</div>
              <span id="casteError" class="error"></span>
            </fieldset>
            <?php
            $radio_group('Physically_challenged', 'Physically Challenged', ['yes' => 'Yes', 'no' => 'No']);
            $radio_group('gender', 'Gender', ['Male' => 'Male', 'Female' => 'Female', 'trans' => 'Transgender']);
            $radio_group('marital_status', 'Marital Status', ['married' => 'Married', 'unmarried' => 'Unmarried']);
            ?>
            <div class="grid gap-4 sm:grid-cols-2">
              <?php
              $input('dob', 'dob', 'Date of Birth', 'date', true);
              $input('pob', 'pob', 'Place of Birth', 'text', true, 'Place of birth');
              $input('district', 'District', 'District', 'text', false, 'District');
              $input('state', 'state', 'State', 'text', false, 'State');
              $input('Sub_Caste', 'Sub_Caste', 'Sub Caste', 'text', false, 'Sub caste');
              $input('religion', 'Religion', 'Religion', 'text', false, 'Religion');
              ?>
            </div>
            <p class="text-xs text-slate-500">If you belong to Scheduled Caste / Scheduled Tribe / Nomadic Tribes / Other Backward Classes, mention the caste and sub-caste and attach a copy of the certificate.</p>
          </div>
          <div class="space-y-4">
            <h3 class="font-bold text-navy-900">Guardian Details</h3>
            <?php
            $input('gaurdian', 'gaurdian', 'Full Name of Father / Mother / Guardian', 'text', false, 'Full name of guardian');
            $input('Occupation', 'Occupation', "Guardian's Occupation", 'text', false, "Guardian's occupation");
            $input('relation', 'Relation', 'Relation', 'text', false, 'Relation');
            $input('officetel', 'officetel', 'Tel. No.', 'tel', false, 'Telephone number');
            $input('add_of_place_work', 'add_of_place_work', 'Working Place Address', 'textarea', false, 'Type here…');
            $input('income', 'incone', 'Family Income per Year (all sources) Rs.', 'text', false, 'Type here…');
            ?>
          </div>
        </div>
      </fieldset>

      <!-- Step 4: Qualification -->
      <fieldset class="wizard-step hidden p-6 sm:p-8" data-step="3">
        <legend class="sr-only">Qualification</legend>
        <?php foreach (['ssc' => 'SSC Record', 'hsc' => 'HSC Record'] as $p => $title): ?>
          <h3 class="mb-4 mt-2 font-bold text-navy-900"><?= e($title) ?></h3>
          <div class="mb-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <?php
            $input("{$p}_place", "{$p}_place", 'Name and Place of Institute', 'text', true, 'Please enter here', 'sm:col-span-2');
            $input("{$p}_borad", "{$p}_borad", 'Board', 'text', true, 'Board');
            $input("{$p}_dor", "{$p}_dor", 'Date of Result', 'date', true);
            $input("{$p}_esn", "{$p}_esn", 'Exam Seat No.', 'text', true, 'Exam seat no.');
            ?>
            <div>
              <label for="<?= $p ?>_obtain" class="label">Class Obtained</label>
              <select id="<?= $p ?>_obtain" name="<?= $p ?>_obtain" class="field"><?php foreach (['A', 'B', 'C', 'D', 'E'] as $c): ?><option value="<?= $c ?>"><?= $c ?></option><?php endforeach; ?></select>
            </div>
            <?php
            $input("{$p}_markobtn", "{$p}_markobtn", 'Marks Obtained', 'text', true, 'Marks obtained');
            $input("{$p}_tm", "{$p}_tm", 'Total Marks', 'text', true, 'Total marks');
            ?>
            <div>
              <label for="<?= $p ?>_per" class="label">Percentage</label>
              <input type="text" id="<?= $p ?>_per" name="<?= $p ?>_per" readonly class="field bg-slate-50" placeholder="Auto-calculated">
            </div>
            <?php if ($p === 'hsc') $input('hsc_marksno', 'hsc_marksno', 'H.S.C. Mark Sheet No.', 'text', true, 'Please enter here'); ?>
          </div>
        <?php endforeach; ?>

        <div class="grid gap-4 sm:grid-cols-3">
          <?php
          $input('address_last_attended', 'address_last_attended', 'School / College Last Attended', 'textarea', true, 'Type here…');
          $input('University', 'University/Board', 'University / Board', 'text', true, 'Type here…');
          $input('last_year', 'last_year', 'Year', 'text', true, 'e.g. 2024');
          ?>
        </div>

        <details class="mt-8 rounded-2xl border border-slate-200 p-5 text-sm leading-relaxed text-slate-600" open>
          <summary class="cursor-pointer font-bold text-navy-900">Declarations</summary>
          <p class="mt-4">The information furnished in this form is true to the best of my knowledge, and I am aware that my admission will stand cancelled if any of the information is found to be incorrect.</p>
          <h4 class="mt-5 font-semibold text-navy-900">For the Guardian</h4>
          <p class="mt-1">I have permitted my ward to join your College and shall see that he/she observes the rules of the College. In particular I shall be vigilant to ensure that he/she attends the minimum of 75% lectures and practicals. I also state that the information supplied by him/her in this application is correct.</p>
          <h4 class="mt-5 font-semibold text-navy-900">Declaration by Student</h4>
          <ul class="mt-1 list-disc space-y-1.5 pl-5">
            <li>I have read all the rules and regulations framed by the college authorities as given in the college prospectus, which are presently in force.</li>
            <li>I may not be granted terms or allowed to appear for the College/University examination if my attendance in lectures and tutorials falls short of 75%.</li>
            <li>I have not registered my name at any other institution for any full-time course.</li>
            <li>The information filled in by me in this form is accurate and true to the best of my knowledge. I will be responsible for any discrepancy, and I undertake that in the absence of any document the final admission will not be granted and/or will stand cancelled.</li>
            <li>I give my consent for the use of my contact details for educational purposes.</li>
            <li>As per University Circular No. SW/42 of 2015 dated 29th Oct 2015, I am compulsorily required to give an undertaking on <a href="https://www.antiragging.in" target="_blank" rel="noopener" class="text-brand-600 underline">antiragging.in</a> &amp; <a href="https://www.amanmovement.org" target="_blank" rel="noopener" class="text-brand-600 underline">amanmovement.org</a>.</li>
            <li>If I am unable to fill the online fee concession form (Scholarship/Freeship, Govt. of India) within the prescribed time limit, I will not get a refund and the institute will not be held responsible.</li>
            <li>Students with ATKT in FY/SY are not eligible for TY. If such a student is admitted, the admission will be cancelled by the college and the student will be responsible.</li>
          </ul>
        </details>
        <label for="agree" class="mt-5 flex items-start gap-3 text-sm font-medium text-navy-900">
          <input type="checkbox" name="agree" id="agree" class="mt-0.5 rounded text-brand-600 focus:ring-brand-500"> I agree to all the guidelines
        </label>
        <span id="selectagreeError" class="error"></span>
      </fieldset>

      <div id="wizard-done" class="hidden p-8 text-center sm:p-12">
        <span class="mx-auto grid h-16 w-16 place-items-center rounded-full bg-emerald-50 text-2xl text-emerald-600"><i class="fa-solid fa-check"></i></span>
        <h3 class="mt-4 text-xl font-bold text-navy-900">Your details look complete</h3>
        <p class="mx-auto mt-2 max-w-md text-sm text-slate-600">This page does not store or send your information. Please complete your admission on the official online portal with the same details.</p>
        <a href="<?= e($links['fy_llb']) ?>" target="_blank" rel="noopener" class="mt-6 inline-flex items-center gap-2 rounded-xl bg-brand-600 px-6 py-3 font-semibold text-white hover:bg-brand-700">Continue to Admission Portal <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
      </div>

      <div id="wizard-nav" class="flex items-center justify-between gap-3 border-t border-slate-100 bg-slate-50 px-6 py-4 sm:px-8">
        <button type="button" id="prevButton" class="invisible inline-flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold text-navy-900 hover:bg-white"><i class="fa-solid fa-arrow-left"></i> Back</button>
        <button type="button" id="nextButton" class="inline-flex items-center gap-2 rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-brand-700">Next <i class="fa-solid fa-arrow-right"></i></button>
        <button type="submit" id="submit" class="hidden items-center gap-2 rounded-xl bg-emerald-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700">Submit <i class="fa-solid fa-check"></i></button>
      </div>
    </form>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
