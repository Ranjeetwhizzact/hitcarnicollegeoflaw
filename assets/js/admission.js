/*
 * Admission registration wizard.
 * Validation rules are ported from the original assets/js/script.js
 * (jQuery + Bootstrap tabs) to plain JavaScript.
 */
(function () {
  'use strict';

  var API = 'https://mh.printallresults.com/api/v1';
  var CLIENT_ID = 2;

  var form = document.getElementById('collegeRegistration');
  if (!form) return;

  var steps = Array.prototype.slice.call(form.querySelectorAll('.wizard-step'));
  var pills = Array.prototype.slice.call(form.querySelectorAll('[data-step-pill]'));
  var prev = document.getElementById('prevButton');
  var next = document.getElementById('nextButton');
  var submit = document.getElementById('submit');
  var current = 0;
  var maxReached = 0;

  var NAME = /^[A-Za-z.'\s]+$/;
  var ALPHA = /^[A-Za-z\s]+$/;
  var EMAIL = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var DIGITS = function (n) { return new RegExp('^\\d{' + n + '}$'); };
  var UPTO_DIGITS = function (n) { return new RegExp('^\\d{1,' + n + '}$'); };
  var UA_FORM = /^(?=.*[A-Z])(?=.*\d)[A-Z\d]{12}$/;

  // [id, required, pattern, message-if-pattern-fails]
  var rules = {
    0: [
      ['surname', true, NAME, 'Only letters are allowed.'],
      ['firstname', true, NAME, 'Only letters are allowed.'],
      ['mothername', true, NAME, 'Only letters are allowed.'],
      ['fathername', true, NAME, 'Only letters are allowed.'],
      ['pra_no', false, UPTO_DIGITS(16), 'PRN should contain up to 16 digits.'],
      ['Ua_formno', true, UA_FORM, 'Enter the 12-character form number (capital letters and digits).'],
      ['abc_id', true, DIGITS(12), 'ABC ID must be exactly 12 digits.'],
      ['aadhar', true, DIGITS(12), 'Aadhaar number must be exactly 12 digits.'],
      ['Program', true],
      ['class_detail', true],
    ],
    1: [
      ['ownaddress', true],
      ['number', true, DIGITS(10), 'Mobile number must have 10 digits.'],
      ['Whatapp', true, DIGITS(10), 'WhatsApp number must have 10 digits.'],
      ['tel', false, UPTO_DIGITS(10), 'Number must be at most 10 digits.'],
      ['email', true, EMAIL, 'Please enter a valid email address.'],
      ['parent_num', false, UPTO_DIGITS(10), 'Number must be at most 10 digits.'],
    ],
    2: [
      ['dob', true],
      ['pob', true, ALPHA, 'Only letters are allowed.'],
      ['district', false, ALPHA, 'Only letters are allowed.'],
      ['state', false, ALPHA, 'Only letters are allowed.'],
      ['Sub_Caste', false, ALPHA, 'Only letters are allowed.'],
      ['religion', false, ALPHA, 'Only letters are allowed.'],
      ['gaurdian', false, ALPHA, 'Only letters are allowed.'],
      ['Occupation', false, ALPHA, 'Only letters are allowed.'],
      ['relation', false, ALPHA, 'Only letters are allowed.'],
      ['officetel', false, UPTO_DIGITS(10), 'Number must be at most 10 digits.'],
      ['income', false, /^\d+$/, 'Enter the amount in digits only.'],
    ],
    3: [
      ['ssc_place', true], ['ssc_borad', true, ALPHA, 'Only letters are allowed.'], ['ssc_dor', true], ['ssc_esn', true],
      ['ssc_markobtn', true, /^\d+(\.\d+)?$/, 'Enter marks as a number.'], ['ssc_tm', true, /^\d+$/, 'Enter total marks as a number.'],
      ['hsc_place', true], ['hsc_borad', true, ALPHA, 'Only letters are allowed.'], ['hsc_dor', true], ['hsc_esn', true],
      ['hsc_markobtn', true, /^\d+(\.\d+)?$/, 'Enter marks as a number.'], ['hsc_tm', true, /^\d+$/, 'Enter total marks as a number.'],
      ['hsc_marksno', true], ['address_last_attended', true],
      ['University', true, ALPHA, 'Only letters are allowed.'],
      ['last_year', true, /^\d{4}$/, 'Enter a 4-digit year.'],
    ],
  };
  var radioRules = {
    2: [['std_category_id', 'casteError'], ['Physically_challenged', 'Physically_challengedError'], ['gender', 'genderError'], ['marital_status', 'marital_statusError']],
  };

  function setError(id, el, msg) {
    var span = document.getElementById(id);
    if (span) span.textContent = msg || '';
    if (el) { el.classList.toggle('is-invalid', !!msg); el.setAttribute('aria-invalid', msg ? 'true' : 'false'); }
  }

  function validateStep(n) {
    var ok = true;
    var firstBad = null;
    (rules[n] || []).forEach(function (r) {
      var el = document.getElementById(r[0]);
      if (!el) return;
      // Remote-populated selects that failed to load can't be required.
      if (el.tagName === 'SELECT' && el.options.length <= 1) { setError(r[0] + 'Error', el, ''); return; }
      var v = el.value.trim();
      var msg = '';
      if (!v && r[1]) msg = 'This field is required.';
      else if (v && r[2] && !r[2].test(v)) msg = r[3];
      setError(r[0] + 'Error', el, msg);
      if (msg) { ok = false; firstBad = firstBad || el; }
    });
    (radioRules[n] || []).forEach(function (r) {
      // Category options come from a remote API; don't block the user if it failed to load.
      if (!form.querySelector('input[name="' + r[0] + '"]')) return;
      var checked = form.querySelector('input[name="' + r[0] + '"]:checked');
      setError(r[1], null, checked ? '' : 'Please select an option.');
      if (!checked) { ok = false; firstBad = firstBad || form.querySelector('input[name="' + r[0] + '"]'); }
    });
    if (n === 0) {
      var photo = document.getElementById('imageUpload');
      var sign = document.getElementById('imageUploads');
      if (!photo.files.length) { setError('photoError', null, 'Photo is required.'); ok = false; }
      if (!sign.files.length) { setError('signError', null, 'Signature is required.'); ok = false; }
    }
    if (n === 3) {
      var agree = document.getElementById('agree');
      setError('selectagreeError', null, agree.checked ? '' : 'Please agree to the terms and conditions.');
      if (!agree.checked) ok = false;
    }
    if (firstBad) firstBad.focus();
    return ok;
  }

  function show(n) {
    current = n;
    maxReached = Math.max(maxReached, n);
    steps.forEach(function (s, i) { s.classList.toggle('hidden', i !== n); });
    pills.forEach(function (p, i) {
      if (i === n) p.setAttribute('aria-current', 'step'); else p.removeAttribute('aria-current');
      p.classList.toggle('is-done', i < maxReached && i !== n);
    });
    prev.classList.toggle('invisible', n === 0);
    var last = n === steps.length - 1;
    next.classList.toggle('hidden', last);
    submit.classList.toggle('hidden', !last);
    submit.classList.toggle('inline-flex', last);
    form.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }

  next.addEventListener('click', function () { if (validateStep(current)) show(current + 1); });
  prev.addEventListener('click', function () { show(current - 1); });
  pills.forEach(function (p, i) {
    p.addEventListener('click', function () {
      if (i <= maxReached) show(i);
      else if (i === current + 1 && validateStep(current)) show(i);
    });
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!validateStep(current)) return;
    // The original form only logged its data (its AJAX call was commented out),
    // so nothing is sent anywhere here either.
    steps.forEach(function (s) { s.classList.add('hidden'); });
    document.querySelector('[aria-label="Form steps"]').classList.add('hidden');
    document.getElementById('wizard-nav').classList.add('hidden');
    document.getElementById('wizard-done').classList.remove('hidden');
  });

  // ---- File previews with size limits (500 KB photo, 50 KB signature) ----
  function preview(inputId, containerId, errorId, maxKb, label) {
    var input = document.getElementById(inputId);
    input.addEventListener('change', function () {
      var file = input.files[0];
      if (!file) return;
      if (file.size > maxKb * 1024) {
        setError(errorId, null, label + ' must be smaller than ' + maxKb + ' KB.');
        input.value = '';
        return;
      }
      setError(errorId, null, '');
      var reader = new FileReader();
      reader.onload = function (ev) {
        var box = document.getElementById(containerId);
        box.innerHTML = '';
        var img = document.createElement('img');
        img.src = ev.target.result;
        img.alt = label + ' preview';
        img.className = 'h-full w-full object-contain';
        box.appendChild(img);
      };
      reader.readAsDataURL(file);
    });
  }
  preview('imageUpload', 'imageContainer', 'photoError', 500, 'Photo');
  preview('imageUploads', 'imageContainers', 'signError', 50, 'Signature');

  // ---- Auto percentage ----------------------------------------------------
  ['ssc', 'hsc'].forEach(function (p) {
    var marks = document.getElementById(p + '_markobtn');
    var total = document.getElementById(p + '_tm');
    var out = document.getElementById(p + '_per');
    function calc() {
      var m = parseFloat(marks.value), t = parseFloat(total.value);
      out.value = (!isNaN(m) && t > 0) ? (m / t * 100).toFixed(2) + '%' : '';
    }
    marks.addEventListener('input', calc);
    total.addEventListener('input', calc);
  });

  // ---- Remote option lists (same endpoints as the original page) ---------
  function getJSON(url) {
    return fetch(url).then(function (r) { if (!r.ok) throw new Error(r.status); return r.json(); });
  }
  function fillSelect(select, items, valueKey, textKey, placeholder) {
    select.innerHTML = '';
    var blank = document.createElement('option');
    blank.value = ''; blank.textContent = placeholder;
    select.appendChild(blank);
    items.forEach(function (it) {
      var o = document.createElement('option');
      o.value = it[valueKey]; o.textContent = it[textKey];
      select.appendChild(o);
    });
  }

  var program = document.getElementById('Program');
  var year = document.getElementById('class_detail');
  var caste = document.getElementById('casteData');

  getJSON(API + '/stream/byid/' + CLIENT_ID).then(function (res) {
    if (String(res.status) !== 'true') throw new Error('bad status');
    fillSelect(program, res.data, 'id', 'stream_name', 'Select programme');
  }).catch(function () {
    fillSelect(program, [], 'id', 'stream_name', 'Could not load – please refresh');
  });

  program.addEventListener('change', function () {
    fillSelect(year, [], 'id', 'class_name', 'Loading…');
    if (!program.value) { fillSelect(year, [], 'id', 'class_name', 'Select a programme first'); return; }
    getJSON(API + '/class/bystreamid/' + encodeURIComponent(program.value)).then(function (res) {
      if (String(res.status) !== 'true') throw new Error('bad status');
      fillSelect(year, res.data, 'id', 'class_name', 'Select year');
    }).catch(function () {
      fillSelect(year, [], 'id', 'class_name', 'Could not load – please retry');
    });
  });

  getJSON(API + '/student/category/' + CLIENT_ID).then(function (list) {
    caste.innerHTML = '';
    list.forEach(function (c) {
      var label = document.createElement('label');
      label.className = 'choice';
      label.htmlFor = 'cat-' + c.id;
      var input = document.createElement('input');
      input.type = 'radio'; input.name = 'std_category_id'; input.id = 'cat-' + c.id; input.value = c.std_category;
      input.className = 'text-brand-600 focus:ring-brand-500';
      label.appendChild(input);
      label.appendChild(document.createTextNode(' ' + c.std_category));
      caste.appendChild(label);
    });
  }).catch(function () {
    caste.textContent = 'Could not load categories – please refresh the page.';
  });
})();
