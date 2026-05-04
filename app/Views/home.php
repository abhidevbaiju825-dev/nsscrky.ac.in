<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<!-- ═══════════════════════════════
     HERO CAROUSEL
═══════════════════════════════ -->
<section id="hero">
  <?php if (!empty($carousel_slides)): ?>
    <?php foreach ($carousel_slides as $index => $slide): ?>
      <?php
      $isActive = $index === 0 ? 'active' : '';
      $bg_class = !empty($slide['bg_image_class']) ? $slide['bg_image_class'] : 's1-bg';
      $extra = isset($slide['extra_data']) ? $slide['extra_data'] : [];
      ?>
      <div class="slide <?= $isActive ?>" id="slide-<?= $index + 1 ?>">
        <div class="slide-bg <?= esc($bg_class) ?>"></div>

        <?php if ($slide['template_type'] === 'hero'): ?>
          <div class="s1-overlay" style="position:absolute;inset:0;"></div>
          <div class="hero-shape"
            style="right:0;top:0;bottom:0;width:42%;border-left:1px solid rgba(184,146,42,0.1);background:linear-gradient(to left,rgba(13,36,72,0.3),transparent);">
          </div>
          <div class="hero-shape"
            style="top:60px;left:60px;width:120px;height:120px;border-radius:50%;border:1px solid rgba(184,146,42,0.08);">
          </div>
          <div class="hero-shape"
            style="top:40px;left:40px;width:160px;height:160px;border-radius:50%;border:1px solid rgba(184,146,42,0.05);">
          </div>
        <?php elseif ($slide['template_type'] === 'ranklist'): ?>
          <div class="s2-overlay" style="position:absolute;inset:0;"></div>
          <div class="hero-shape"
            style="top:0;right:0;width:60%;height:100%;background:linear-gradient(to left,rgba(107,31,31,0.3),transparent);border-left:1px solid rgba(184,146,42,0.08);">
          </div>
          <div
            style="position:absolute;top:-50px;right:25%;width:1px;height:200%;background:linear-gradient(to bottom,transparent,rgba(184,146,42,0.12),transparent);transform:rotate(15deg);">
          </div>
        <?php elseif ($slide['template_type'] === 'admissions'): ?>
          <div class="s3-overlay" style="position:absolute;inset:0;"></div>
          <div class="hero-shape"
            style="bottom:-100px;right:-100px;width:500px;height:500px;border-radius:50%;border:1px solid rgba(184,146,42,0.07);">
          </div>
          <div class="hero-shape"
            style="bottom:-180px;right:-180px;width:650px;height:650px;border-radius:50%;border:1px solid rgba(184,146,42,0.04);">
          </div>
          <div
            style="position:absolute;inset:0;opacity:0.03;background-image:linear-gradient(rgba(184,146,42,1) 1px,transparent 1px),linear-gradient(90deg,rgba(184,146,42,1) 1px,transparent 1px);background-size:60px 60px;">
          </div>
        <?php endif; ?>

        <div class="slide-content max-w-screen-xl mx-auto px-6 w-full flex flex-col md:flex-row md:items-center h-full justify-between gap-10">

          <!-- LEFT CONTENT -->
          <div style="flex: 1; max-width: 600px;">
            <?php if (!empty($slide['slide_eyebrow'])): ?>
              <div class="slide-eyebrow">
                <span class="slide-eyebrow-line"></span>
                <?= esc($slide['slide_eyebrow']) ?>
              </div>
            <?php endif; ?>

            <h1 class="slide-title">
              <?= $slide['slide_title'] ?>
            </h1>

            <?php if (!empty($slide['slide_description'])): ?>
              <p class="slide-desc">
                <?= esc($slide['slide_description']) ?>
              </p>
            <?php endif; ?>



            <div style="margin-top:28px;">
              <?php if (!empty($slide['primary_cta_text'])): ?>
                <a href="<?= base_url($slide['primary_cta_link']) ?>"
                  class="slide-cta"><?= esc($slide['primary_cta_text']) ?></a>
              <?php endif; ?>
              <?php if (!empty($slide['secondary_cta_text'])): ?>
                <a href="<?= base_url($slide['secondary_cta_link']) ?>"
                  class="slide-cta-ghost"><?= esc($slide['secondary_cta_text']) ?></a>
              <?php endif; ?>
            </div>
          </div>

          <!-- RIGHT CONTENT -->
          <div style="flex: 1; display:flex; flex-direction:column; align-items: flex-end; justify-content: center; width: 100%;">
            
            <!-- TAGS FOR ADMISSIONS -->
            <?php if ($slide['template_type'] === 'admissions' && !empty($extra['tags'])): ?>
              <div style="display:flex;flex-wrap:wrap;justify-content:flex-end;gap:10px;margin-bottom:28px;max-width:300px; z-index: 30;">
                <?php foreach ($extra['tags'] as $tag): ?>
                  <span
                    style="background:rgba(255,255,255,0.07);border:1px solid var(--gold);color:var(--gold-bright);padding:6px 14px;font-size:12.5px;letter-spacing:0.06em;font-weight:600;font-family:'Outfit',sans-serif;"><?= esc($tag) ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- HERO STATS -->
            <?php if ($slide['template_type'] === 'hero' && !empty($extra['stats'])): ?>
              <div class="slide-aside hidden lg:flex">
                <div style="display:flex;flex-direction:column;gap:28px;width:100%;">
                  <?php foreach ($extra['stats'] as $st): ?>
                    <div style="border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:24px;">
                      <div
                        style="font-size:10px;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold);margin-bottom:6px;font-family:'Cinzel',serif;">
                        <?= esc($st['label_top'] ?? '') ?></div>
                      <div style="font-family:'EB Garamond',serif;font-size:48px;color:#fff;font-weight:400;line-height:1;">
                        <?= esc($st['number'] ?? '') ?></div>
                      <div style="font-size:12px;color:rgba(255,255,255,0.4);margin-top:4px;">
                        <?= esc($st['label_bottom'] ?? '') ?></div>
                    </div>
                  <?php endforeach; ?>
                  <?php if (!empty($extra['affiliation_top'])): ?>
                    <div>
                      <div
                        style="font-size:10px;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold);margin-bottom:6px;font-family:'Cinzel',serif;">
                        <?= esc($extra['affiliation_top']) ?></div>
                      <div style="font-size:14px;color:rgba(255,255,255,0.75);line-height:1.5;">
                        <?= $extra['affiliation_bottom'] ?? '' ?></div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>

            <!-- RANKLIST DYNAMIC STUDENTS -->
            <?php if ($slide['template_type'] === 'ranklist' && !empty($slide['students'])): ?>
              <style>
                .ranklist-grid {
                  display: flex;
                  gap: 15px;
                  flex-wrap: wrap;
                  justify-content: flex-end;
                  align-items: center;
                  margin-top: 40px;
                }

                .r-student-card {
                  background: rgba(255, 255, 255, 0.05);
                  border: 1px solid rgba(184, 146, 42, 0.3);
                  padding: 15px;
                  text-align: center;
                  border-radius: 8px;
                  width: 140px;
                  backdrop-filter: blur(5px);
                }

                .r-student-img {
                  width: 80px;
                  height: 80px;
                  border-radius: 50%;
                  object-fit: cover;
                  margin-bottom: 10px;
                  border: 2px solid #b8922a;
                }

                .r-student-name {
                  font-size: 14px;
                  color: #fff;
                  font-weight: 600;
                  font-family: 'Outfit', sans-serif;
                }

                .r-student-rank {
                  font-size: 11px;
                  color: #b8922a;
                  font-family: 'Cinzel', serif;
                  margin-top: 4px;
                  letter-spacing: 0.1em;
                }
              </style>
              <div class="ranklist-grid">
                <?php foreach ($slide['students'] as $stu): ?>
                  <div class="r-student-card">
                    <img src="<?= esc($stu['image']) ?>" class="r-student-img" alt="">
                    <div class="r-student-name"><?= esc($stu['name']) ?></div>
                    <div class="r-student-rank"><?= esc($stu['rank']) ?></div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- FALLBACK HARDCODED TOPPERS (if no students DB bound yet but template asks) -->
            <?php if ($slide['template_type'] === 'ranklist' && empty($slide['students'])): ?>
              <div style="display:flex;gap:20px;margin-top:28px;flex-wrap:wrap;justify-content:flex-end;">
                <div
                  style="text-align:center;background:rgba(255,255,255,0.06);border:1px solid rgba(184,146,42,0.2);padding:20px 28px;">
                  <div
                    style="font-family:'EB Garamond',serif;font-size:40px;color:var(--gold-bright);font-weight:400;line-height:1;">
                    3</div>
                  <div
                    style="font-size:10px;letter-spacing:0.15em;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-top:4px;">
                    Rank Holders</div>
                </div>
                <div
                  style="text-align:center;background:rgba(255,255,255,0.06);border:1px solid rgba(184,146,42,0.2);padding:20px 28px;">
                  <div
                    style="font-family:'EB Garamond',serif;font-size:40px;color:var(--gold-bright);font-weight:400;line-height:1;">
                    8<sup style="font-size:18px;">th</sup></div>
                  <div
                    style="font-size:10px;letter-spacing:0.15em;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-top:4px;">
                    Best Rank</div>
                </div>
                <div
                  style="text-align:center;background:rgba(255,255,255,0.06);border:1px solid rgba(184,146,42,0.2);padding:20px 28px;">
                  <div
                    style="font-family:'EB Garamond',serif;font-size:40px;color:var(--gold-bright);font-weight:400;line-height:1;">
                    8.64</div>
                  <div
                    style="font-size:10px;letter-spacing:0.15em;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-top:4px;">
                    Top CGPA</div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

    <!-- Carousel Controls -->
    <?php if (count($carousel_slides) > 1): ?>
      <button class="carousel-arrow" id="carousel-prev" onclick="changeSlide(-1)">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <button class="carousel-arrow" id="carousel-next" onclick="changeSlide(1)">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path d="M9 5l7 7-7 7" />
        </svg>
      </button>
      <div class="carousel-controls">
        <?php foreach ($carousel_slides as $index => $slide): ?>
          <div class="carousel-dot <?= $index === 0 ? 'active' : '' ?>" onclick="goToSlide(<?= $index ?>)"></div>
        <?php endforeach; ?>
      </div>
      <div class="slide-counter"><strong id="slide-current">01</strong> /
        <?= str_pad(count($carousel_slides), 2, '0', STR_PAD_LEFT) ?></div>
    <?php endif; ?>

  <?php else: ?>
    <!-- Fallback if no slides exist -->
    <div class="slide active" id="slide-1">
      <div class="slide-bg s1-bg"></div>
      <div class="slide-content max-w-screen-xl mx-auto px-6 w-full flex items-center justify-center h-full">
        <h1 class="slide-title">Welcome to NSS College</h1>
      </div>
    </div>
  <?php endif; ?>
</section>

<!-- ═══════════════════════════════
     DYNAMIC ANNOUNCEMENT TICKER
═══════════════════════════════ -->
<?php if (!empty($announcements)): ?>
  <div class="ticker-wrap">
    <div class="ticker-label">Announcements</div>
    <div class="ticker-content-wrap">
      <div class="ticker-content">
        <?php foreach ($announcements as $ann): ?>
          <a href="<?= !empty($ann['url']) ? esc($ann['url']) : '#' ?>"
            target="<?= !empty($ann['url']) ? '_blank' : '_self' ?>" class="ticker-item">
            <span>&bull;</span> <?= strip_tags($ann['title']) ?>
          </a>
        <?php endforeach; ?>
        <!-- Duplicate for seamless loop if items are few -->
        <?php if (count($announcements) < 5): ?>
          <?php foreach ($announcements as $ann): ?>
            <a href="<?= !empty($ann['url']) ? esc($ann['url']) : '#' ?>"
              target="<?= !empty($ann['url']) ? '_blank' : '_self' ?>" class="ticker-item">
              <span>&bull;</span> <?= strip_tags($ann['title']) ?>
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- ═══════════════════════════════
     STATS BAND
═══════════════════════════════ -->
<div class="stats-band">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="grid grid-cols-2 md:grid-cols-4">
      <div class="stat-box reveal">
        <div class="stat-num">30<sup>+</sup></div>
        <div class="stat-label">Years of Service</div>
      </div>
      <div class="stat-box reveal d1">
        <div class="stat-num">6</div>
        <div class="stat-label">Degree Programmes</div>
      </div>
      <div class="stat-box reveal d2">
        <div class="stat-num"><span data-count="400">0</span><sup>+</sup></div>
        <div class="stat-label">Active Students</div>
      </div>
      <div class="stat-box reveal d3">
        <div class="stat-num">40<sup>+</sup></div>
        <div class="stat-label">Expert Faculty</div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════
     ABOUT + NOTICE BOARD
═══════════════════════════════ -->
<section id="about" class="py-20 md:py-28" style="background:var(--white);">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">

      <!-- About Content -->
      <div class="reveal-l">
        <div class="sec-eyebrow">Our Institution</div>
        <h2 class="sec-heading" style="margin-bottom:16px;">A Legacy of <em>Academic Excellence</em></h2>
        <div class="gold-rule" style="margin-bottom:24px;"></div>
        <p class="body-text" style="margin-bottom:16px;">
          The N.S.S. College, Rajakumari began its journey in June 1995, established under the
          auspices of the Nair Service Society — founded by the visionary Padma Bhushan Bharatha
          Kesari Mannathu Padmanabhan. By establishing this college, NSS extended its services
          in higher education to the educationally underserved High Ranges region.
        </p>
        <p class="body-text" style="margin-bottom:24px;">
          The present college building, constructed on a scenic hilltop near Kulapparachal,
          was officially inaugurated on 7th March 2000. The campus commands a breathtaking view
          of the hills and valleys of Kerala's High Ranges — a setting that inspires learning.
        </p>

        <!-- Timeline -->
        <div style="margin-top:8px;">
          <div class="tl-item reveal d1">
            <div class="tl-line">
              <div class="tl-dot"></div>
              <div class="tl-dash"></div>
            </div>
            <div>
              <div class="tl-yr">June 1995</div>
              <div class="tl-txt">College established by NSS; begins operations in rented premises at Rajakumari town.
              </div>
            </div>
          </div>
          <div class="tl-item reveal d2">
            <div class="tl-line">
              <div class="tl-dot"></div>
              <div class="tl-dash"></div>
            </div>
            <div>
              <div class="tl-yr">16 January 1995</div>
              <div class="tl-txt">Foundation stone of the permanent college building laid by Sri. P.K. Narayana
                Panicker.</div>
            </div>
          </div>
          <div class="tl-item reveal d3">
            <div class="tl-line">
              <div class="tl-dot"></div>
              <div class="tl-dash"></div>
            </div>
            <div>
              <div class="tl-yr">7 March 2000</div>
              <div class="tl-txt">New hilltop campus building officially inaugurated — a defining moment in the
                college's growth.</div>
            </div>
          </div>
          <div class="tl-item reveal d4">
            <div class="tl-line">
              <div class="tl-dot"></div>
            </div>
            <div>
              <div class="tl-yr">2002 — Present</div>
              <div class="tl-txt">B.Com with Computer Applications introduced per UGC mandate; continuous programme
                expansion.</div>
            </div>
          </div>
        </div>

      </div>

      <!-- Notice Board -->
      <div id="notice" class="reveal-r">
        <div class="sec-eyebrow">Stay Informed</div>
        <h2 class="sec-heading" style="font-size:28px;margin-bottom:16px;">Notice Board</h2>
        <div class="notice-board-v2">
          <div class="nb-header">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="var(--gold-bright)" stroke-width="2">
              <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
            </svg>
            <span class="nb-title">OFFICIAL NOTICES</span>
            <div class="nb-live"></div>
          </div>
          <div class="nb-scroll">
            <?php if (!empty($notice_list)):
              foreach ($notice_list as $noticeitem): ?>
                <div class="nb-item">
                  <div class="nb-item-title">
                    <?php if (($noticeitem['_important'] ?? '') === 'yes'): ?>
                      <span class="nb-badge-imp">IMP</span>
                    <?php endif; ?>
                    <?= esc($noticeitem['_title']) ?>
                  </div>
                  <div class="nb-item-meta">
                    <span class="nb-date">📅 <?= date('d M Y', strtotime($noticeitem['_display_date'])) ?></span>
                    <?php if (trim($noticeitem['_pdf_file_loc'] ?? '') !== ''): ?>
                      <a href="<?= base_url($noticeitem['_pdf_file_loc']) ?>" target="_blank" class="nb-dl">Download →</a>
                    <?php elseif (trim($noticeitem['_link'] ?? '') !== ''): ?>
                      <a href="<?= esc($noticeitem['_link']) ?>" target="_blank" class="nb-dl">View →</a>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; else: ?>
              <div class="nb-item">
                <div class="nb-item-title" style="color:var(--muted);text-align:center;">No notices at this time.</div>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div style="margin-top:10px;text-align:right;">
          <a href="<?= base_url('Home/news') ?>"
            style="font-size:12px;color:var(--navy);font-weight:600;letter-spacing:0.1em;text-decoration:none;border-bottom:1px solid var(--navy);transition:all 0.2s;">VIEW
            ALL NOTICES →</a>
        </div>
      </div>
    </div>

    <!-- Accreditation + Campus Video (full-width row below) -->
    <div class="grid lg:grid-cols-2 gap-8" style="margin-top:40px;">
      <div style="background:var(--cream);border:1px solid rgba(184,146,42,0.2);padding:24px;display:flex;flex-direction:column;justify-content:center;">
        <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.18em;color:var(--gold);margin-bottom:14px;">
          AFFILIATED &amp; RECOGNISED BY</div>
        <div class="grid gap-4">
          <div style="display:flex;align-items:center;gap:10px;">
            <div style="width:6px;height:6px;background:var(--navy);border-radius:50%;flex-shrink:0;"></div>
            <span style="font-size:13px;color:var(--muted);">MG University, Kottayam</span>
          </div>
          <div style="display:flex;align-items:center;gap:10px;">
            <div style="width:6px;height:6px;background:var(--navy);border-radius:50%;flex-shrink:0;"></div>
            <span style="font-size:13px;color:var(--muted);">Nair Service Society (NSS)</span>
          </div>
          <div style="display:flex;align-items:center;gap:10px;">
            <div style="width:6px;height:6px;background:var(--navy);border-radius:50%;flex-shrink:0;"></div>
            <span style="font-size:13px;color:var(--muted);">University Grants Commission (UGC)</span>
          </div>
        </div>
      </div>

      <!-- Campus Video -->
      <div class="reveal d4" style="border-radius:12px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);border:1px solid #eee;">
        <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
          <iframe src="https://www.youtube.com/embed/6jh7_1W-wzA?si=jM8YOsC4ZbRK3zyw" title="NSS College Rajakumari" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════
     COURSES SECTION
═══════════════════════════════ -->
<section id="courses" class="py-20 md:py-28" style="background:var(--navy-deep);">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6">
      <div class="reveal">
        <div class="sec-eyebrow" style="color:var(--gold);">Academic Programmes</div>
        <h2 class="sec-heading-light">Degree <em>Courses</em></h2>
      </div>
      <p class="reveal d2 body-text" style="color:rgba(255,255,255,0.35);max-width:300px;font-size:13px;">Various degree
        programmes affiliated to Mahatma Gandhi University, Kottayam.</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-px" style="border:1px solid rgba(255,255,255,0.04);">
      <?php
      // Default programmes if DB is empty
      $default_programmes = [
        ['title' => 'Bachelor of Business Administration', 'duration' => '3 Years', 'description' => 'Develop strategic management capabilities, entrepreneurial thinking, and professional skills.', '_department_name' => 'Management', 'type' => 'Self-Financing'],
        ['title' => 'Bachelor of Computer Applications', 'duration' => '3 Years', 'description' => 'Master software development, programming paradigms, database management, and computational thinking.', '_department_name' => 'Technology', 'type' => 'Self-Financing'],
        ['title' => 'B.Sc. Electronics', 'duration' => '3 Years', 'description' => 'Explore analog & digital circuits, embedded systems, signal processing, and instrumentation.', '_department_name' => 'Science', 'type' => 'Govt. Aided'],
        ['title' => 'B.Com — Model II', 'duration' => '3 Years', 'description' => 'Comprehensive commerce education integrating finance, accounting, taxation, and business economics.', '_department_name' => 'Commerce', 'type' => 'Govt. Aided'],
        ['title' => 'B.Com with Computer Applications', 'duration' => '3 Years', 'description' => 'A synergistic blend of commerce principles and computing skills for corporate and tech roles.', '_department_name' => 'Commerce + IT', 'type' => 'Self-Financing'],
      ];
      $display_programmes = !empty($programmes) ? $programmes : $default_programmes;
      $delays = ['', 'd1', 'd2', 'd1', 'd2', 'd3'];
      ?>
      <?php foreach ($display_programmes as $i => $prog): ?>
        <a href="<?= !empty($prog['syllabus']) ? base_url($prog['syllabus']) : base_url('Home/programs') ?>"
          class="course-card reveal <?= $delays[$i] ?? '' ?>" style="text-decoration:none;" <?= !empty($prog['syllabus']) ? 'target="_blank"' : '' ?>>
          <div class="course-code">PROGRAMME · <?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?> ·
            <?= esc($prog['duration'] ?? '3 YEARS') ?></div>
          <div class="course-name"><?= esc($prog['title'] ?? '') ?></div>
          <div class="course-desc"><?= esc($prog['description'] ?? 'Degree programme under Mahatma Gandhi University.') ?>
          </div>
          <div class="course-meta">
            <span class="course-tag"><?= esc($prog['_department_name'] ?? 'Department') ?></span>
            <span class="course-tag"><?= esc($prog['duration'] ?? 'Duration') ?></span>
            <?php if (!empty($prog['type'])): ?>
              <span class="course-tag"><?= esc($prog['type']) ?></span>
            <?php endif; ?>
          </div>
          <div class="course-arrow">→</div>
        </a>
      <?php endforeach; ?>

      <!-- Enquiry card -->
      <div class="course-card reveal d3" style="background:rgba(184,146,42,0.04);border-color:rgba(184,146,42,0.15);">
        <div style="height:100%;display:flex;flex-direction:column;justify-content:center;padding:10px 0;">
          <div
            style="font-family:'EB Garamond',serif;font-size:14px;color:rgba(255,255,255,0.3);margin-bottom:12px;letter-spacing:0.08em;">
            Admission Information</div>
          <div
            style="font-family:'EB Garamond',serif;font-size:32px;color:rgba(255,255,255,0.8);margin-bottom:10px;font-style:italic;line-height:1.2;">
            Enquire<br />About Our Programmes</div>
          <div
            style="height:1px;background:linear-gradient(90deg,rgba(184,146,42,0.4),transparent);margin-bottom:20px;">
          </div>
          <div style="font-size:13px;color:rgba(255,255,255,0.35);line-height:1.7;margin-bottom:20px;">Contact the
            admission office for eligibility, fee structure, and scholarship details.</div>
          <a href="<?= base_url('Home/contact') ?>"
            style="display:inline-flex;align-items:center;gap:8px;font-size:12px;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;color:var(--gold-bright);text-decoration:none;border-bottom:1px solid rgba(184,146,42,0.3);padding-bottom:3px;">Contact
            Admissions →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════
     VISION & MISSION
═══════════════════════════════ -->
<section id="vision" class="py-20 md:py-28" style="background:var(--cream);">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="text-center mb-14 reveal">
      <div class="sec-eyebrow" style="justify-content:center;">Our Purpose</div>
      <h2 class="sec-heading">Guided by <em>Values</em>, Driven by Purpose</h2>
      <div class="full-gold-rule" style="margin-top:20px;max-width:400px;margin-left:auto;margin-right:auto;"></div>
    </div>
    <div class="grid md:grid-cols-2 gap-8">
      <div class="vm-card reveal">
        <div class="vm-card-ico">
          <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
        </div>
        <div class="vm-card-heading">Our Vision</div>
        <div
          style="height:2px;background:linear-gradient(90deg,var(--gold),transparent);width:60px;margin-bottom:18px;">
        </div>
        <p class="body-text">
          To uplift the socio-economic backwardness of the High Ranges area by providing
          job-oriented education in new-generation programmes — Electronics, Computer Science,
          Business Administration, and Commerce — equipping graduates to competently navigate
          challenges in today's competitive global landscape.
        </p>
      </div>
      <div class="vm-card reveal d2">
        <div class="vm-card-ico" style="background:var(--cream);">
          <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--navy)" stroke-width="1.5">
            <path
              d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
          </svg>
        </div>
        <div class="vm-card-heading">Our Mission</div>
        <div
          style="height:2px;background:linear-gradient(90deg,var(--navy),transparent);width:60px;margin-bottom:18px;">
        </div>
        <ul style="list-style:none;padding:0;margin:0;">
          <li class="mission-li">Mould stakeholders of all programmes to excel in their respective professional fields.
          </li>
          <li class="mission-li">Create community awareness through extension activities and real-world engagement.</li>
          <li class="mission-li">Nurture the inbuilt capability of every student through curricular and co-curricular
            activities.</li>
          <li class="mission-li">Facilitate practical expertise through well-equipped laboratories and in-house
            projects.</li>
          <li class="mission-li">Transform laboratories into active research centres for innovation and discovery.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════
     TOPPERS SECTION — Dynamic
═══════════════════════════════ -->
<?php if (!empty($toppers)): ?>
<section id="toppers" class="py-20 md:py-28" style="background:var(--navy);">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="text-center mb-14 reveal">
      <div class="sec-eyebrow" style="color:var(--gold);justify-content:center;">Hall of Fame</div>
      <h2 class="sec-heading-light">University <em>Rank Holders</em></h2>
      <?php
        // Determine latest year label for sub-heading
        $topperYear = $toppers[0]['year'] ?? date('Y');
      ?>
      <p style="font-size:13px;color:rgba(255,255,255,0.35);margin-top:10px;letter-spacing:0.08em;">
        Class of <?= esc($topperYear) ?> — Mahatma Gandhi University
      </p>
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-<?= min(count($toppers), 4) ?> gap-6">
      <?php
        $delays = ['', 'd1', 'd2', 'd3', 'd1', 'd2'];
        $isFirst = true;
      ?>
      <?php foreach ($toppers as $i => $t): ?>
        <?php
          $initials = implode('', array_map(fn($w) => strtoupper($w[0]), array_slice(explode(' ', trim($t['name'])), 0, 2)));
          $isGold = $isFirst; // Highlight first (lowest rank number = best)
          $isFirst = false;
        ?>
        <div class="topper-card reveal <?= $delays[$i % 6] ?>"
             <?= $isGold ? 'style="border-color:rgba(184,146,42,0.45);background:rgba(184,146,42,0.07);"' : '' ?>>

          <div class="rank-badge">
            <?= esc($t['rank']) ?>
            · <?= esc($t['department']) ?>
            · <?= esc($t['year']) ?>
          </div>

          <div class="topper-avatar"
               <?= $isGold ? 'style="border-color:var(--gold);background:rgba(184,146,42,0.15);"' : '' ?>>
            <?php if (!empty($t['image'])): ?>
              <img src="<?= base_url($t['image']) ?>" alt="<?= esc($t['name']) ?>"
                style="width:100%;height:100%;object-fit:cover;border-radius:50%;"
                onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
              <span style="display:none;width:100%;height:100%;align-items:center;justify-content:center;font-family:'Cinzel',serif;font-size:22px;color:var(--gold);"><?= esc($initials) ?></span>
            <?php else: ?>
              <span style="display:flex;width:100%;height:100%;align-items:center;justify-content:center;font-family:'Cinzel',serif;font-size:22px;color:var(--gold);"><?= esc($initials) ?></span>
            <?php endif; ?>
          </div>

          <div class="topper-name"><?= esc($t['name']) ?></div>
          <div class="topper-dept"><?= esc($t['department']) ?></div>

          <?php if (!empty($t['cgpa'])): ?>
            <div class="topper-grade">CGPA: <?= esc($t['cgpa']) ?> · Mahatma Gandhi University</div>
          <?php else: ?>
            <div class="topper-grade">Mahatma Gandhi University</div>
          <?php endif; ?>

          <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(184,146,42,<?= $isGold ? '0.35' : '0.18' ?>),transparent);margin:16px 0;"></div>
          <div style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.12em;color:<?= $isGold ? 'var(--gold)' : 'rgba(255,255,255,0.3)' ?>;">
            UNIVERSITY RANK HOLDER
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-10 reveal">
      <a href="<?= base_url('Home/university_toppers') ?>"
        style="display:inline-flex;align-items:center;gap:8px;font-size:12px;font-weight:600;letter-spacing:0.15em;text-transform:uppercase;color:var(--gold-bright);border:1px solid rgba(184,146,42,0.3);padding:12px 28px;transition:all 0.3s;text-decoration:none;"
        onmouseover="this.style.background='rgba(184,146,42,0.1)'" onmouseout="this.style.background='transparent'">
        View All Rank Holders →
      </a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ═══════════════════════════════
     CAMPUS FACILITIES
═══════════════════════════════ -->
<section class="py-20 md:py-24" style="background:var(--white);">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="text-center mb-14 reveal">
      <div class="sec-eyebrow" style="justify-content:center;">Infrastructure</div>
      <h2 class="sec-heading">Campus <em>Facilities</em></h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
      <div class="facility-item reveal">
        <div class="facility-ico"><svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.5">
            <path
              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253" />
          </svg></div>
        <div class="facility-name">Central Library</div>
        <div class="facility-desc">Extensive collection of textbooks, journals, and digital resources with reading hall
          facilities.</div>
      </div>
      <div class="facility-item reveal d1">
        <div class="facility-ico"><svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.5">
            <path d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4" />
          </svg></div>
        <div class="facility-name">Computer Laboratories</div>
        <div class="facility-desc">Modern computing infrastructure with high-speed internet and latest software
          environments.</div>
      </div>
      <div class="facility-item reveal d2">
        <div class="facility-ico"><svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.5">
            <path d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg></div>
        <div class="facility-name">Electronics Lab</div>
        <div class="facility-desc">Well-equipped laboratory with modern instruments for practical electronics
          experiments.</div>
      </div>
      <div class="facility-item reveal d3">
        <div class="facility-ico"><svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.5">
            <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7" />
          </svg></div>
        <div class="facility-name">Sports Facilities</div>
        <div class="facility-desc">Multi-sport grounds, gymnasium, and athletics training areas for student well-being.
        </div>
      </div>
      <div class="facility-item reveal d1">
        <div class="facility-ico"><svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.5">
            <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16" />
          </svg></div>
        <div class="facility-name">Seminar Hall</div>
        <div class="facility-desc">Fully air-conditioned auditorium with AV facilities for seminars, workshops and
          events.</div>
      </div>
      <div class="facility-item reveal d2">
        <div class="facility-ico"><svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.5">
            <path
              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg></div>
        <div class="facility-name">Student Support Cells</div>
        <div class="facility-desc">Anti-ragging, Women's Cell, Career Guidance, Counselling, and Grievance Redressal.
        </div>
      </div>
      <div class="facility-item reveal d3">
        <div class="facility-ico"><svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.5">
            <path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945" />
          </svg></div>
        <div class="facility-name">NCC / NSS Units</div>
        <div class="facility-desc">Active NCC and NSS units fostering discipline, community service and national spirit.
        </div>
      </div>
      <div class="facility-item reveal d4">
        <div class="facility-ico"><svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.5">
            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg></div>
        <div class="facility-name">Canteen &amp; Hostel</div>
        <div class="facility-desc">Hygienic canteen services and hostel accommodation available for outstation students.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════
     NEWS & EVENTS
═══════════════════════════════ -->
<?php if (!empty($news_list)): ?>
  <section id="news" class="py-20 md:py-24" style="background:var(--offwhite);">
    <div class="max-w-screen-xl mx-auto px-4">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
        <div class="reveal">
          <div class="sec-eyebrow">Latest Updates</div>
          <h2 class="sec-heading">News &amp; <em>Events</em></h2>
        </div>
        <a href="<?= base_url('Home/news') ?>" class="reveal d2"
          style="font-size:12px;font-weight:600;letter-spacing:0.14em;text-transform:uppercase;color:var(--navy);border-bottom:1px solid var(--navy);text-decoration:none;white-space:nowrap;transition:all 0.2s;">View
          All News →</a>
      </div>
      <div class="grid md:grid-cols-3 gap-6">
        <?php foreach (array_slice($news_list, 0, 3) as $idx => $row): ?>
          <div class="news-card reveal <?= $idx > 0 ? 'd' . $idx : '' ?>">
            <?php if (!empty($row['_imgloc'])): ?>
              <img src="<?= base_url($row['_imgloc']) ?>" alt="<?= esc($row['_newsheading'] ?? '') ?>"
                style="width:100%;height:180px;object-fit:cover;display:block;">
            <?php else: ?>
              <div class="news-img-placeholder" <?= $idx === 1 ? 'style="background:linear-gradient(135deg,var(--maroon),#3d1111);"' : ($idx === 2 ? 'style="background:linear-gradient(135deg,#1a2a4a,#0d3366);"' : '') ?>>
                <svg width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="rgba(184,146,42,0.3)" stroke-width="1">
                  <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14" />
                </svg>
              </div>
            <?php endif; ?>
            <div style="padding:22px;">
              <span class="news-tag">News</span>
              <div class="news-title-v2"><?= esc($row['_newsheading'] ?? '') ?></div>
              <div class="news-date-v2">📅 <?= date('d M Y', strtotime($row['_date'])) ?></div>
              <a href="<?= base_url('Home/newsdetails/' . $row['_newsid']) ?>" class="news-more">Read More
                <span>→</span></a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- ═══════════════════════════════
     TESTIMONIALS CAROUSEL
═══════════════════════════════ -->
<?php if (!empty($testimonials)): ?>
  <section class="py-20 md:py-24" style="background:var(--cream);">
    <div class="max-w-screen-xl mx-auto px-4">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
        <div class="reveal">
          <div class="sec-eyebrow">Voices of Our Community</div>
          <h2 class="sec-heading">What People <em>Say</em></h2>
        </div>
        <div class="flex gap-2 reveal d2">
          <button class="testimonial-nav-btn" onclick="scrollTestimonials(-1)">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button class="testimonial-nav-btn" onclick="scrollTestimonials(1)">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>
      <div class="testimonial-track" id="testimonialTrack">
        <?php foreach ($testimonials as $t): ?>
          <div class="testimonial-card">
            <div class="testimonial-text"><?= esc($t['message'] ?? '') ?></div>
            <div class="testimonial-author">
              <div class="testimonial-avatar">
                <?php if (!empty($t['image_url'])): ?>
                  <img src="<?= base_url($t['image_url']) ?>" alt="<?= esc($t['name'] ?? '') ?>">
                <?php else: ?>
                  <?= strtoupper(substr($t['name'] ?? 'N', 0, 1)) ?>
                <?php endif; ?>
              </div>
              <div>
                <div class="testimonial-name"><?= esc($t['name'] ?? '') ?></div>
                <div class="testimonial-role"><?= esc($t['designation'] ?? '') ?></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- ═══════════════════════════════
     ACCREDITATION BAND
═══════════════════════════════ -->
<div class="accred-band">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="grid grid-cols-2 md:grid-cols-5">
      <div class="accred-item reveal">
        <div class="accred-logo" style="background:transparent;border:none;"><img src="<?= base_url('uploads/static/mguniversity.jpeg') ?>" alt="Mahatma Gandhi University" style="width:100%;height:100%;object-fit:contain;"></div>
        <div class="accred-label">Mahatma Gandhi<br />University</div>
      </div>
      <div class="accred-item reveal d1">
        <div class="accred-logo" style="background:transparent;border:none;"><img src="<?= base_url('uploads/static/nairservice.jpeg') ?>" alt="Nair Service Society" style="width:100%;height:100%;object-fit:contain;"></div>
        <div class="accred-label">Nair Service<br />Society</div>
      </div>
      <div class="accred-item reveal d2">
        <div class="accred-logo" style="background:transparent;border:none;"><img src="<?= base_url('uploads/static/universitygrants.jpeg') ?>" alt="University Grants Commission" style="width:100%;height:100%;object-fit:contain;"></div>
        <div class="accred-label">University Grants<br />Commission</div>
      </div>
      <div class="accred-item reveal d3">
        <div class="accred-logo" style="background:transparent;border:none;"><img src="<?= base_url('uploads/static/naac.jpeg') ?>" alt="NAAC" style="width:100%;height:100%;object-fit:contain;"></div>
        <div class="accred-label">NAAC<br />Accredited</div>
      </div>
      <div class="accred-item reveal d4">
        <div class="accred-logo" style="background:transparent;border:none;"><img src="<?= base_url('uploads/static/nirf.jpeg') ?>" alt="NIRF" style="width:100%;height:100%;object-fit:contain;"></div>
        <div class="accred-label">NIRF<br />Ranked</div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════
     CONTACT & LOCATION
═══════════════════════════════ -->
<section id="contact" class="py-20 md:py-28" style="background:var(--white);">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
      <div class="reveal-l">
        <div class="sec-eyebrow">Get In Touch</div>
        <h2 class="sec-heading" style="margin-bottom:20px;">Contact &amp; <em>Location</em></h2>
        <p class="body-text" style="margin-bottom:32px;">
          NSS College Rajakumari is situated on a scenic hilltop near Kulapparachal, 2 km east
          of Rajakumari town, Idukki District, Kerala — surrounded by the breathtaking High Ranges.
        </p>
        <div style="display:flex;flex-direction:column;gap:16px;margin-bottom:32px;">
          <div style="display:flex;gap:14px;align-items:flex-start;">
            <div
              style="width:40px;height:40px;background:var(--cream);border:1px solid rgba(184,146,42,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="var(--navy)" stroke-width="1.5">
                <path d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div>
              <div
                style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--gold);font-weight:600;font-family:'Cinzel',serif;margin-bottom:3px;">
                Address</div>
              <div style="font-size:14px;color:var(--muted);line-height:1.65;">NSS College, Rajakumari
                P.O,<br />Kulapparachal, Idukki, Kerala — 685 619</div>
            </div>
          </div>
          <div style="display:flex;gap:14px;align-items:flex-start;">
            <div
              style="width:40px;height:40px;background:var(--cream);border:1px solid rgba(184,146,42,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="var(--navy)" stroke-width="1.5">
                <path
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
            </div>
            <div>
              <div
                style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--gold);font-weight:600;font-family:'Cinzel',serif;margin-bottom:3px;">
                Telephone</div>
              <div style="font-size:14px;color:var(--muted);">04868-245370 / 04868-245515</div>
            </div>
          </div>
          <div style="display:flex;gap:14px;align-items:flex-start;">
            <div
              style="width:40px;height:40px;background:var(--cream);border:1px solid rgba(184,146,42,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="var(--navy)" stroke-width="1.5">
                <path
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div>
              <div
                style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--gold);font-weight:600;font-family:'Cinzel',serif;margin-bottom:3px;">
                Email</div>
              <div style="font-size:14px;color:var(--muted);"><a href="mailto:nssrajakumari@yahoo.com" style="color:var(--muted);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#b8922a'" onmouseout="this.style.color='var(--muted)'">nssrajakumari@yahoo.com</a></div>
            </div>
          </div>
        </div>
        <!-- Map -->
        <div style="width:100%;height:220px;overflow:hidden;">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.654177138351!2d77.16909861428178!3d9.96270327641009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b07a0f52b1a501d%3A0x5e52b98bfcc0d3e7!2sNSS+College!5e0!3m2!1sen!2sin!4v1544351228773"
            width="100%" height="220" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="reveal-r">
        <form action="<?= base_url('Home/submit_enquiry') ?>" method="post" style="background:var(--cream);padding:40px;border-top:3px solid var(--navy);">
          <?= csrf_field() ?>
          <h3 style="font-family:'EB Garamond',serif;font-size:28px;color:var(--navy);margin-bottom:6px;">Send Us a Message</h3>
          <p style="font-size:13px;color:var(--muted);margin-bottom:28px;">For admissions enquiries, academic queries, or general information.</p>

          <?php if (session()->getFlashdata('success')): ?>
              <div style="background:#e6f4ea; border:1px solid #cce5d4; color:#1e4620; padding:12px; margin-bottom:20px; font-size:13px; font-family:'Outfit',sans-serif;">
                  <?= session()->getFlashdata('success') ?>
              </div>
          <?php endif; ?>
          
          <?php if (session()->getFlashdata('error')): ?>
              <div style="background:#fce8e6; border:1px solid #fad2cf; color:#a50e0e; padding:12px; margin-bottom:20px; font-size:13px; font-family:'Outfit',sans-serif;">
                  <?= session()->getFlashdata('error') ?>
              </div>
          <?php endif; ?>

          <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:12px;">
            <div>
              <label style="font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:var(--navy);font-weight:600;display:block;margin-bottom:6px;">Full Name *</label>
              <input type="text" name="name" placeholder="Your full name" required
                style="width:100%;padding:11px 14px;border:1px solid rgba(13,36,72,0.15);background:white;font-size:14px;font-family:'Outfit',sans-serif;outline:none;transition:border-color 0.3s;"
                onfocus="this.style.borderColor='var(--gold)'" onblur="this.style.borderColor='rgba(13,36,72,0.15)'" />
            </div>
            <div>
              <label style="font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:var(--navy);font-weight:600;display:block;margin-bottom:6px;">Phone Number</label>
              <input type="tel" name="phone" placeholder="Contact number"
                style="width:100%;padding:11px 14px;border:1px solid rgba(13,36,72,0.15);background:white;font-size:14px;font-family:'Outfit',sans-serif;outline:none;transition:border-color 0.3s;"
                onfocus="this.style.borderColor='var(--gold)'" onblur="this.style.borderColor='rgba(13,36,72,0.15)'" />
            </div>
          </div>
          <div style="margin-bottom:12px;">
            <label style="font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:var(--navy);font-weight:600;display:block;margin-bottom:6px;">Email Address *</label>
            <input type="email" name="email" placeholder="your@email.com" required
              style="width:100%;padding:11px 14px;border:1px solid rgba(13,36,72,0.15);background:white;font-size:14px;font-family:'Outfit',sans-serif;outline:none;transition:border-color 0.3s;"
              onfocus="this.style.borderColor='var(--gold)'" onblur="this.style.borderColor='rgba(13,36,72,0.15)'" />
          </div>
          <div style="margin-bottom:20px;">
            <label style="font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:var(--navy);font-weight:600;display:block;margin-bottom:6px;">Message</label>
            <textarea name="message" rows="4" placeholder="Your message or enquiry..."
              style="width:100%;padding:11px 14px;border:1px solid rgba(13,36,72,0.15);background:white;font-size:14px;font-family:'Outfit',sans-serif;outline:none;resize:vertical;transition:border-color 0.3s;"
              onfocus="this.style.borderColor='var(--gold)'"
              onblur="this.style.borderColor='rgba(13,36,72,0.15)'"></textarea>
          </div>
          <button type="submit"
            style="width:100%;background:var(--navy);color:white;font-size:12.5px;font-weight:600;letter-spacing:0.14em;text-transform:uppercase;padding:15px 28px;border:none;cursor:pointer;transition:all 0.3s;font-family:'Outfit',sans-serif;"
            onmouseover="this.style.background='var(--gold)';this.style.color='var(--navy-deep)'"
            onmouseout="this.style.background='var(--navy)';this.style.color='white'">Send Message →</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Back to top -->
<div id="btt-v2" onclick="window.scrollTo({top:0,behavior:'smooth'})">
  <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path d="M5 15l7-7 7 7" />
  </svg>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  /* ─── Hero Carousel ─── */
  let currentSlide = 0;
  const slides = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.carousel-dot');

  function getCounter(num) { return num < 10 ? '0' + num : num; }

  let carouselTimer;

  function goToSlide(n) {
    if (!slides.length || !slides[n]) return;
    slides[currentSlide].classList.remove('active');
    if (dots[currentSlide]) dots[currentSlide].classList.remove('active');

    currentSlide = (n + slides.length) % slides.length;

    slides[currentSlide].classList.add('active');
    if (dots[currentSlide]) dots[currentSlide].classList.add('active');

    const slideCurrentEl = document.getElementById('slide-current');
    if (slideCurrentEl) slideCurrentEl.textContent = getCounter(currentSlide + 1);

    clearInterval(carouselTimer);
    carouselTimer = setInterval(() => goToSlide(currentSlide + 1), 6000);
  }
  function changeSlide(dir) { goToSlide(currentSlide + dir); }
  if (slides.length > 0) {
    carouselTimer = setInterval(() => goToSlide(currentSlide + 1), 6000);
  }

  /* ─── Scroll Effects ─── */
  window.addEventListener('scroll', () => {
    const btt = document.getElementById('btt-v2');
    if (btt) btt.classList.toggle('show', window.scrollY > 400);
  });

  /* ─── Scroll Reveal ─── */
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('show'); });
  }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
  document.querySelectorAll('.reveal, .reveal-l, .reveal-r').forEach(el => observer.observe(el));

  /* ─── Counter Animation ─── */
  const cObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el = e.target;
      const target = parseInt(el.dataset.count);
      let val = 0;
      const step = target / 60;
      const t = setInterval(() => {
        val += step;
        if (val >= target) { el.textContent = target; clearInterval(t); }
        else el.textContent = Math.floor(val);
      }, 20);
      cObs.unobserve(el);
    });
  }, { threshold: 0.5 });
  document.querySelectorAll('[data-count]').forEach(el => cObs.observe(el));

  /* ─── Testimonials Scroll ─── */
  function scrollTestimonials(dir) {
    const track = document.getElementById('testimonialTrack');
    if (!track) return;
    const maxScroll = track.scrollWidth - track.clientWidth;
    if (dir > 0 && Math.ceil(track.scrollLeft) >= maxScroll - 10) {
      track.scrollTo({ left: 0, behavior: 'smooth' });
    } else if (dir < 0 && track.scrollLeft <= 10) {
      track.scrollTo({ left: maxScroll, behavior: 'smooth' });
    } else {
      track.scrollBy({ left: dir * 400, behavior: 'smooth' });
    }
  }
  // Auto-scroll testimonials
  let testimonialTimer = setInterval(() => scrollTestimonials(1), 5000);
  const tTrack = document.getElementById('testimonialTrack');
  if (tTrack) {
    tTrack.addEventListener('mouseenter', () => clearInterval(testimonialTimer));
    tTrack.addEventListener('mouseleave', () => {
      testimonialTimer = setInterval(() => scrollTestimonials(1), 5000);
    });
  }

  /* ─── Touch Swipe for Hero ─── */
  let touchX = 0;
  document.getElementById('hero').addEventListener('touchstart', e => { touchX = e.touches[0].clientX; });
  document.getElementById('hero').addEventListener('touchend', e => {
    const dx = e.changedTouches[0].clientX - touchX;
    if (Math.abs(dx) > 50) changeSlide(dx < 0 ? 1 : -1);
  });

  /* ─── Smooth Scroll ─── */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const t = document.querySelector(a.getAttribute('href'));
      if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
    });
  });
</script>
<?= $this->endSection() ?>