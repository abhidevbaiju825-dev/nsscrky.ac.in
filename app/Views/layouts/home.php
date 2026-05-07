<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>NSS College Rajakumari — Excellence in Higher Education Since 1995</title>
    <meta name="description" content="NSS College Rajakumari — A premier institution affiliated to Mahatma Gandhi University, Kottayam. Offering BBA, BCA, B.Sc Electronics, B.Com programmes in the High Ranges of Kerala."/>
    <link rel="icon" type="image/png" href="<?= base_url('uploads/static/icons/favicon.png') ?>"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700&family=Cinzel:wght@400;500;600&display=swap" rel="stylesheet"/>

    <!-- Tailwind CSS (compiled) -->
    <link rel="stylesheet" href="<?= base_url('assets/css/tailwind.css') ?>"/>

    <!-- Custom Home Styles -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/home-v2.css') ?>"/>

    <?= $this->renderSection('styles') ?>
</head>

<body style="font-family:'Outfit',sans-serif;color:#1a1a2e;overflow-x:hidden;margin:0;padding:0;">

<?php
  // Fetch nav data
  $db = \Config\Database::connect();
  $menu_dept_data = $db->tableExists('_departments') ? $db->table('_departments')->orderBy('_department_name','ASC')->get()->getResultArray() : [];
?>

<!-- ═══════════════════════════════
     TOP UTILITY BAR
═══════════════════════════════ -->
<div id="top-bar" style="background:#071530;border-bottom:1px solid rgba(184,146,42,0.25);padding:10px 0;font-size:12px;">
  <div class="max-w-screen-xl mx-auto px-4 flex items-center justify-between gap-4">
    <!-- Contact -->
    <div class="flex items-center gap-4">
      <div style="color:rgba(255,255,255,0.6);font-size:11.5px;display:flex;align-items:center;gap:5px;">
        <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#b8922a;">
          <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
        </svg>
        <span>04868-245370</span>
      </div>
        <a href="mailto:nssrajakumari@yahoo.com" style="color:rgba(255,255,255,0.6);font-size:11.5px;display:flex;align-items:center;gap:5px;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#d4a843'" onmouseout="this.style.color='rgba(255,255,255,0.6)'">
          <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#b8922a;">
            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
          </svg>
          <span>nssrajakumari@yahoo.com</span>
        </a>
    </div>
    <!-- Quick Links -->
    <div class="hidden md:flex items-center gap-0">

      <a href="<?= base_url('Home/iqac') ?>" style="color:rgba(255,255,255,0.55);letter-spacing:0.04em;text-decoration:none;padding:0 12px;border-right:1px solid rgba(255,255,255,0.1);font-size:12px;transition:color 0.2s;" onmouseover="this.style.color='#d4a843'" onmouseout="this.style.color='rgba(255,255,255,0.55)'">IQAC</a>
      <a href="<?= base_url('Home/placement') ?>" style="color:rgba(255,255,255,0.55);letter-spacing:0.04em;text-decoration:none;padding:0 12px;border-right:1px solid rgba(255,255,255,0.1);font-size:12px;transition:color 0.2s;" onmouseover="this.style.color='#d4a843'" onmouseout="this.style.color='rgba(255,255,255,0.55)'">Placement</a>
      <a href="<?= base_url('Home/gallery') ?>" style="color:rgba(255,255,255,0.55);letter-spacing:0.04em;text-decoration:none;padding:0 12px;border-right:1px solid rgba(255,255,255,0.1);font-size:12px;transition:color 0.2s;" onmouseover="this.style.color='#d4a843'" onmouseout="this.style.color='rgba(255,255,255,0.55)'">Gallery</a>
      <a href="<?= base_url('Home/rti') ?>" style="color:rgba(255,255,255,0.55);letter-spacing:0.04em;text-decoration:none;padding:0 12px;border-right:1px solid rgba(255,255,255,0.1);font-size:12px;transition:color 0.2s;" onmouseover="this.style.color='#d4a843'" onmouseout="this.style.color='rgba(255,255,255,0.55)'">RTI</a>
      <a href="<?= base_url('Home/greivence_cell') ?>" style="color:rgba(255,255,255,0.55);letter-spacing:0.04em;text-decoration:none;padding:0 12px;border-right:1px solid rgba(255,255,255,0.1);font-size:12px;transition:color 0.2s;" onmouseover="this.style.color='#d4a843'" onmouseout="this.style.color='rgba(255,255,255,0.55)'">Grievances</a>
      <a href="<?= base_url('Home/fee') ?>" style="color:rgba(255,255,255,0.55);letter-spacing:0.04em;text-decoration:none;padding:0 0 0 12px;font-size:12px;transition:color 0.2s;" onmouseover="this.style.color='#d4a843'" onmouseout="this.style.color='rgba(255,255,255,0.55)'">Fees</a>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════
     MAIN NAVBAR
═══════════════════════════════ -->
<nav id="main-nav" style="background:#fff;border-bottom:3px solid #b8922a;box-shadow:0 2px 20px rgba(13,36,72,0.1);position:sticky;top:0;z-index:9999;transition:all 0.3s ease;">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="flex items-center gap-4 py-4">

      <!-- Logo -->
      <a href="<?= base_url() ?>" class="flex items-center gap-3 flex-shrink-0" style="text-decoration:none;">
        <div style="width:58px;height:58px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <img src="<?= base_url('uploads/static/logo.png') ?>" alt="NSS" style="width:100%;height:100%;object-fit:contain;" onerror="this.outerHTML='<svg width=24 height=24 fill=none viewBox=&quot;0 0 24 24&quot; stroke=&quot;#b8922a&quot; stroke-width=1.5><path d=&quot;M12 3L2 9l10 6 10-6-10-6zM2 19l10 6 10-6M2 14l10 6 10-6&quot;/></svg>'">
        </div>
        <div>
          <div style="font-family:'Cinzel',serif;font-size:17px;font-weight:600;color:#0d2448;letter-spacing:0.05em;line-height:1.1;">NSS College</div>
          <div style="font-size:9.5px;letter-spacing:0.18em;text-transform:uppercase;color:#b8922a;font-weight:500;margin-top:2px;">Rajakumari · Est. 1995</div>
        </div>
      </a>

      <?php
        $cp = trim(service('request')->getUri()->getPath(), '/');
        // Returns 'active' class if the current path contains $seg
        function hnav(string $seg, bool $exact = false): string {
            global $cp;
            if ($exact) { return ($cp === $seg || $cp === '' && $seg === '') ? 'nav-btn active' : 'nav-btn'; }
            return str_contains($cp, $seg) ? 'nav-btn active' : 'nav-btn';
        }
        // Returns 'nav-btn active' if any of the given segments match the path
        function hnavAny(array $segs): string {
            global $cp;
            foreach ($segs as $s) { if (str_contains($cp, $s)) return 'nav-btn active'; }
            return 'nav-btn';
        }
      ?>
      <!-- Desktop Nav -->
      <div class="hidden lg:flex items-center ml-2 flex-1 justify-center gap-0" id="desktop-nav">

        <div class="nav-item"><a href="<?= base_url() ?>" class="<?= hnav('', true) ?>">Home</a></div>

        <div class="nav-item">
          <button class="<?= hnavAny(['Home/about','Home/principal','Home/organogram','Home/college_counsil','Home/staff','Home/non_staff','Home/codeofconduct']) ?>">About <span class="nav-chevron">▾</span></button>
          <div class="dropdown">
            <div class="dropdown-heading">Institution</div>
            <a href="<?= base_url('Home/about') ?>" class="dropdown-item">Our Management</a>
            <a href="<?= base_url('Home/principal_desk') ?>" class="dropdown-item">Principal's Desk</a>
            <a href="<?= base_url('Home/organogram') ?>" class="dropdown-item">Organogram</a>
            <a href="<?= base_url('Home/college_counsil') ?>" class="dropdown-item">College Council</a>
            <a href="<?= base_url('Home/staff') ?>" class="dropdown-item">Teaching Staff</a>
            <a href="<?= base_url('Home/non_staff') ?>" class="dropdown-item">Non Teaching Staff</a>
            <a href="<?= base_url('Home/codeofconduct') ?>" class="dropdown-item">Code of Conduct</a>
          </div>
        </div>

        <div class="nav-item">
          <button class="<?= hnavAny(['Home/programs','Home/syllabus','Home/college_examination','Home/university_toppers']) ?>">Academics <span class="nav-chevron">▾</span></button>
          <div class="dropdown">
            <div class="dropdown-heading">Programmes</div>
            <a href="<?= base_url('Home/programs') ?>" class="dropdown-item">All Programmes</a>
            <a href="<?= base_url('Home/syllabus') ?>" class="dropdown-item">Syllabus</a>
            <a href="<?= base_url('Home/college_examination') ?>" class="dropdown-item">College Examination</a>
            <a href="<?= base_url('Home/university_toppers') ?>" class="dropdown-item">University Toppers</a>
          </div>
        </div>

        <div class="nav-item">
          <button class="<?= str_contains($cp, 'Home/department_view') ? 'nav-btn active' : 'nav-btn' ?>">Departments <span class="nav-chevron">▾</span></button>
          <div class="dropdown" style="min-width:220px;">
            <?php if (!empty($menu_dept_data)): foreach ($menu_dept_data as $dept): ?>
              <a href="<?= base_url('Home/department_view/'.$dept['_dep_id'].'/'.preg_replace('#[^a-zA-Z0-9]+#', '-', trim($dept['_department_name'], '. '))) ?>" class="dropdown-item"><?= esc($dept['_department_name']) ?></a>
            <?php endforeach; endif; ?>
          </div>
        </div>

        <div class="nav-item">
          <button class="<?= hnavAny(['Home/students_union','Home/clubsandcells','Home/nationl_service_scheme','Home/nationl_cadet_corps','Home/scholarship','Home/anti_ragging_cell','Home/greivence_cell','Home/pta']) ?>">Student Life <span class="nav-chevron">▾</span></button>
          <div class="dropdown">
            <div class="dropdown-heading">Activities</div>
            <a href="<?= base_url('Home/students_union') ?>" class="dropdown-item">College Union</a>
            <a href="<?= base_url('Home/clubsandcells') ?>" class="dropdown-item">Clubs & Cells</a>
            <a href="<?= base_url('Home/nationl_service_scheme') ?>" class="dropdown-item">NSS</a>
            <a href="<?= base_url('Home/nationl_cadet_corps') ?>" class="dropdown-item">NCC</a>
            <a href="<?= base_url('Home/scholarship') ?>" class="dropdown-item">Scholarships</a>

            <div class="dropdown-heading">Cells</div>
            <a href="<?= base_url('Home/anti_ragging_cell') ?>" class="dropdown-item">Anti-Ragging Cell</a>
            <a href="<?= base_url('Home/greivence_cell') ?>" class="dropdown-item">Grievance Cell</a>
            <a href="<?= base_url('Home/pta') ?>" class="dropdown-item">PTA</a>
          </div>
        </div>

        <div class="nav-item">
          <button class="<?= hnavAny(['alumni']) ?>">Alumni <span class="nav-chevron">▾</span></button>
          <div class="dropdown">
            <a href="<?= base_url('alumni') ?>" class="dropdown-item">Directory & Activities</a>
            <div style="height:1px;background:#f0f0f0;margin:6px 0;"></div>
            <a href="<?= base_url('alumni/login') ?>" class="dropdown-item">Alumni Login</a>
            <a href="<?= base_url('alumni/register') ?>" class="dropdown-item">New Registration</a>
          </div>
        </div>

        <div class="nav-item"><a href="<?= base_url('Home/research') ?>" class="<?= hnav('Home/research') ?>">Research</a></div>
        <div class="nav-item"><a href="<?= base_url('Home/gallery') ?>" class="<?= hnav('Home/gallery') ?>">Gallery</a></div>
        <div class="nav-item"><a href="<?= base_url('Home/news') ?>" class="<?= hnav('Home/news') ?>">News</a></div>
        <div class="nav-item"><a href="<?= base_url('Home/contact') ?>" class="<?= hnav('Home/contact') ?>">Contact</a></div>
      </div>

      <!-- Mobile Buttons -->
      <div class="lg:hidden ml-auto flex items-center gap-2">
        <!-- Main Nav Toggle -->
        <button id="mob-nav-btn" onclick="toggleMobileNav()" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;background:#0d2448;border:none;border-radius:8px;cursor:pointer;transition:all 0.2s;">
          <svg id="mob-icon-menu" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#b8922a" stroke-width="2"><path d="M4 6h16M4 12h10M4 18h14"/></svg>
          <svg id="mob-icon-close" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#b8922a" stroke-width="2" style="display:none;"><path d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Nav Overlay -->
  <div id="mob-overlay" onclick="toggleMobileNav()" style="display:none;position:absolute;top:100%;left:0;right:0;height:100vh;background:rgba(7,21,48,0.6);z-index:9997;backdrop-filter:blur(4px);transition:opacity 0.3s;"></div>

  <!-- Mobile Slide-out Drawer -->
  <div id="mob-drawer" style="position:absolute;top:100%;right:-320px;width:310px;max-width:85vw;height:100vh;padding-bottom:120px;background:#fff;z-index:9998;overflow-y:auto;transition:right 0.35s cubic-bezier(.23,1,.32,1);box-shadow:-8px 0 40px rgba(0,0,0,0.2);">

    <!-- Navigation Links -->
    <div style="padding:8px 0;">
      <!-- Quick Links Accordion -->
      <div class="mob-accordion">
        <button class="mob-accordion-btn" onclick="toggleAccordion(this)">
          <span>Quick Links</span>
          <svg class="mob-accordion-arrow" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="mob-accordion-content">
          <div style="display:flex;flex-wrap:wrap;gap:8px;padding:12px 20px;">
            <a href="<?= base_url('Home/iqac') ?>" style="padding:6px 14px;font-size:11px;letter-spacing:0.06em;color:var(--navy);text-decoration:none;border:1px solid rgba(13,36,72,0.15);border-radius:6px;transition:all 0.2s;background:#fff;">IQAC</a>
            <a href="<?= base_url('Home/placement') ?>" style="padding:6px 14px;font-size:11px;letter-spacing:0.06em;color:var(--navy);text-decoration:none;border:1px solid rgba(13,36,72,0.15);border-radius:6px;transition:all 0.2s;background:#fff;">Placement</a>
            <a href="<?= base_url('Home/gallery') ?>" style="padding:6px 14px;font-size:11px;letter-spacing:0.06em;color:var(--navy);text-decoration:none;border:1px solid rgba(13,36,72,0.15);border-radius:6px;transition:all 0.2s;background:#fff;">Gallery</a>
            <a href="<?= base_url('Home/rti') ?>" style="padding:6px 14px;font-size:11px;letter-spacing:0.06em;color:var(--navy);text-decoration:none;border:1px solid rgba(13,36,72,0.15);border-radius:6px;transition:all 0.2s;background:#fff;">RTI</a>
            <a href="<?= base_url('Home/greivence_cell') ?>" style="padding:6px 14px;font-size:11px;letter-spacing:0.06em;color:var(--navy);text-decoration:none;border:1px solid rgba(13,36,72,0.15);border-radius:6px;transition:all 0.2s;background:#fff;">Grievances</a>
            <a href="<?= base_url('Home/fee') ?>" style="padding:6px 14px;font-size:11px;letter-spacing:0.06em;color:var(--navy);text-decoration:none;border:1px solid rgba(13,36,72,0.15);border-radius:6px;transition:all 0.2s;background:#fff;">Fees</a>
            <a href="<?= base_url('Home/anti_ragging_cell') ?>" style="padding:6px 14px;font-size:11px;letter-spacing:0.06em;color:var(--navy);text-decoration:none;border:1px solid rgba(13,36,72,0.15);border-radius:6px;transition:all 0.2s;background:#fff;">Anti-Ragging</a>
            <a href="<?= base_url('Home/pta') ?>" style="padding:6px 14px;font-size:11px;letter-spacing:0.06em;color:var(--navy);text-decoration:none;border:1px solid rgba(13,36,72,0.15);border-radius:6px;transition:all 0.2s;background:#fff;">PTA</a>
          </div>
        </div>
      </div>

      <a href="<?= base_url() ?>" class="mob-drawer-link" style="font-weight:600;color:#b8922a;">
        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        Home
      </a>

      <!-- About Accordion -->
      <div class="mob-accordion">
        <button class="mob-accordion-btn" onclick="toggleAccordion(this)">
          <span>About</span>
          <svg class="mob-accordion-arrow" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="mob-accordion-content">
          <a href="<?= base_url('Home/about') ?>" class="mob-sub-link">Our Management</a>
          <a href="<?= base_url('Home/principal_desk') ?>" class="mob-sub-link">Principal's Desk</a>
          <a href="<?= base_url('Home/organogram') ?>" class="mob-sub-link">Organogram</a>
          <a href="<?= base_url('Home/college_counsil') ?>" class="mob-sub-link">College Council</a>
          <a href="<?= base_url('Home/staff') ?>" class="mob-sub-link">Teaching Staff</a>
          <a href="<?= base_url('Home/non_staff') ?>" class="mob-sub-link">Non-Teaching Staff</a>
          <a href="<?= base_url('Home/codeofconduct') ?>" class="mob-sub-link">Code of Conduct</a>
        </div>
      </div>

      <!-- Academics Accordion -->
      <div class="mob-accordion">
        <button class="mob-accordion-btn" onclick="toggleAccordion(this)">
          <span>Academics</span>
          <svg class="mob-accordion-arrow" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="mob-accordion-content">
          <a href="<?= base_url('Home/programs') ?>" class="mob-sub-link">All Programmes</a>
          <a href="<?= base_url('Home/syllabus') ?>" class="mob-sub-link">Syllabus</a>
          <a href="<?= base_url('Home/college_examination') ?>" class="mob-sub-link">College Examination</a>
          <a href="<?= base_url('Home/university_toppers') ?>" class="mob-sub-link">University Toppers</a>
        </div>
      </div>

      <!-- Departments Accordion -->
      <div class="mob-accordion">
        <button class="mob-accordion-btn" onclick="toggleAccordion(this)">
          <span>Departments</span>
          <svg class="mob-accordion-arrow" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="mob-accordion-content">
          <?php if (!empty($menu_dept_data)): foreach ($menu_dept_data as $dept): ?>
            <a href="<?= base_url('Home/department_view/'.$dept['_dep_id'].'/'.preg_replace('#[^a-zA-Z0-9]+#', '-', trim($dept['_department_name'], '. '))) ?>" class="mob-sub-link"><?= esc($dept['_department_name']) ?></a>
          <?php endforeach; endif; ?>
        </div>
      </div>

      <!-- Student Life Accordion -->
      <div class="mob-accordion">
        <button class="mob-accordion-btn" onclick="toggleAccordion(this)">
          <span>Student Life</span>
          <svg class="mob-accordion-arrow" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="mob-accordion-content">
          <a href="<?= base_url('Home/students_union') ?>" class="mob-sub-link">College Union</a>
          <a href="<?= base_url('Home/clubsandcells') ?>" class="mob-sub-link">Clubs & Cells</a>
          <a href="<?= base_url('Home/nationl_service_scheme') ?>" class="mob-sub-link">NSS</a>
          <a href="<?= base_url('Home/nationl_cadet_corps') ?>" class="mob-sub-link">NCC</a>
          <a href="<?= base_url('Home/scholarship') ?>" class="mob-sub-link">Scholarships</a>
        </div>
      </div>

      <!-- Alumni Accordion -->
      <div class="mob-accordion">
        <button class="mob-accordion-btn" onclick="toggleAccordion(this)">
          <span>Alumni</span>
          <svg class="mob-accordion-arrow" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="mob-accordion-content">
          <a href="<?= base_url('alumni') ?>" class="mob-sub-link">Directory & Activities</a>
          <a href="<?= base_url('alumni/login') ?>" class="mob-sub-link">Alumni Login</a>
          <a href="<?= base_url('alumni/register') ?>" class="mob-sub-link">New Registration</a>
        </div>
      </div>

      <!-- Direct Links -->
      <a href="<?= base_url('Home/research') ?>" class="mob-drawer-link">
        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
        Research
      </a>
      <a href="<?= base_url('Home/gallery') ?>" class="mob-drawer-link">
        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        Gallery
      </a>
      <a href="<?= base_url('Home/news') ?>" class="mob-drawer-link">
        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
        News & Events
      </a>
      <a href="<?= base_url('Home/contact') ?>" class="mob-drawer-link">
        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        Contact
      </a>
    </div>

    <!-- Drawer Footer -->
    <div style="padding:20px;border-top:1px solid #eee;background:#fafafa;">
      <a href="mailto:nssrajakumari@yahoo.com" style="display:flex;align-items:center;gap:8px;font-size:12px;color:#666;text-decoration:none;margin-bottom:8px;">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#b8922a" stroke-width="1.5"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        nssrajakumari@yahoo.com
      </a>
      <div style="display:flex;align-items:center;gap:8px;font-size:12px;color:#666;">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#b8922a" stroke-width="1.5"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        04868-245370
      </div>
    </div>
  </div>
</nav>

<main>
    <?= $this->renderSection('content') ?>
</main>

<!-- ═══════════════════════════════
     FOOTER (V2 Design)
═══════════════════════════════ -->
<footer style="background:#071530;">
  <div class="max-w-screen-xl mx-auto px-4 py-14">
    <div class="grid md:grid-cols-4 gap-10 mb-10">
      <div class="md:col-span-1">
        <div style="font-family:'EB Garamond',serif;font-size:26px;color:#fff;font-weight:400;margin-bottom:6px;">NSS College<br/><em style="color:#d4a843;">Rajakumari</em></div>
        <div style="font-size:11px;letter-spacing:0.12em;color:#b8922a;margin-bottom:14px;font-family:'Cinzel',serif;">Est. 1995 · Idukki, Kerala</div>
        <p style="font-size:12.5px;color:rgba(255,255,255,0.3);line-height:1.75;max-width:260px;">A premier institution of higher education under the Nair Service Society, serving the High Ranges since 1995.</p>
      </div>
      <div>
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:18px;">Institution</div>
        <a href="<?= base_url('Home/about') ?>" class="footer-link">About the College</a>
        <a href="<?= base_url('Home/principal_desk') ?>" class="footer-link">Principal's Desk</a>
        <a href="<?= base_url('Home/iqac') ?>" class="footer-link">IQAC</a>
        <a href="<?= base_url('Home/research') ?>" class="footer-link">Research</a>
        <a href="<?= base_url('Home/rti') ?>" class="footer-link">RTI</a>
      </div>
      <div>
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:18px;">Academics</div>
        <a href="<?= base_url('Home/programs') ?>" class="footer-link">All Programmes</a>
        <a href="<?= base_url('Home/syllabus') ?>" class="footer-link">Syllabus</a>
        <a href="<?= base_url('Home/college_examination') ?>" class="footer-link">Exam Results</a>
        <a href="<?= base_url('Home/university_toppers') ?>" class="footer-link">University Toppers</a>
        <a href="<?= base_url('Home/placement') ?>" class="footer-link">Placement</a>
      </div>
      <div>
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:18px;">Student Services</div>
        <a href="<?= base_url('Home/students_union') ?>" class="footer-link">College Union</a>
        <a href="<?= base_url('Home/clubsandcells') ?>" class="footer-link">Clubs & Cells</a>
        <a href="<?= base_url('Home/scholarship') ?>" class="footer-link">Scholarships</a>
        <a href="<?= base_url('alumni') ?>" class="footer-link">Alumni Network</a>
        <a href="<?= base_url('Home/contact') ?>" class="footer-link">Contact & Location</a>
      </div>
    </div>
    <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(184,146,42,0.2),transparent);margin-bottom:20px;"></div>
    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;gap:10px;">
      <span style="font-size:12px;color:rgba(255,255,255,0.2);">© <?= date('Y') ?> NSS College Rajakumari. All rights reserved. Affiliated to Mahatma Gandhi University, Kottayam.</span>
      <div style="display:flex;gap:20px;">
        <a href="<?= base_url('Home/rti') ?>" style="font-size:11px;color:rgba(255,255,255,0.2);text-decoration:none;letter-spacing:0.08em;">RTI</a>
        <a href="<?= base_url('Home/contact') ?>" style="font-size:11px;color:rgba(255,255,255,0.2);text-decoration:none;letter-spacing:0.08em;">Contact</a>
      </div>
    </div>
  </div>
</footer>

<!-- Scripts -->
<script src="<?= base_url('assets/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<script>
  /* ─── Mobile Navigation ─── */
  let drawerOpen = false;

  function toggleMobileNav() {
    const drawer = document.getElementById('mob-drawer');
    const overlay = document.getElementById('mob-overlay');
    const iconMenu = document.getElementById('mob-icon-menu');
    const iconClose = document.getElementById('mob-icon-close');
    
    drawerOpen = !drawerOpen;
    
    if (drawerOpen) {
      drawer.style.right = '0';
      overlay.style.display = 'block';
      document.body.style.overflow = 'hidden';
      iconMenu.style.display = 'none';
      iconClose.style.display = 'block';
    } else {
      drawer.style.right = '-320px';
      overlay.style.display = 'none';
      document.body.style.overflow = '';
      iconMenu.style.display = 'block';
      iconClose.style.display = 'none';
    }
  }

  function toggleAccordion(btn) {
    const acc = btn.closest('.mob-accordion');
    const wasOpen = acc.classList.contains('open');
    // Close all others
    document.querySelectorAll('.mob-accordion.open').forEach(a => a.classList.remove('open'));
    if (!wasOpen) acc.classList.add('open');
  }

  // Close drawer on link click
  document.querySelectorAll('#mob-drawer a').forEach(a => a.addEventListener('click', () => {
    if (drawerOpen) toggleMobileNav();
  }));

  /* Navbar scroll effect */
  window.addEventListener('scroll', () => {
    const nav = document.getElementById('main-nav');
    if (nav) nav.style.boxShadow = window.scrollY > 80 ? '0 4px 30px rgba(13,36,72,0.18)' : '0 2px 20px rgba(13,36,72,0.1)';
  });
</script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
