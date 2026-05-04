<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Preview</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700&family=Cinzel:wght@400;500;600&display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Home Styles -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/home-v2.css') ?>"/>
    <style>
        body { margin: 0; padding: 0; overflow: hidden; background: #000; }
        #hero { height: 100vh; min-height: unset; padding: 0; }
        .slide { opacity: 1 !important; visibility: visible !important; display: block !important; position: relative; }
        .carousel-controls, .slide-counter { display: none !important; }
        .hero-shape { position: absolute; z-index: 1; }
        /* Add some specific fixes for preview isolation */
        .slide-content { position: relative; z-index: 10; padding-top: 60px; }
        
        /* Ranklist student image balancing snippet for preview */
        .ranklist-grid { display: flex; gap: 15px; flex-wrap: wrap; justify-content: flex-end; align-items: center; margin-top: 40px; }
        .r-student-card { background: rgba(255,255,255,0.05); border: 1px solid rgba(184,146,42,0.3); padding: 15px; text-align: center; border-radius: 8px; width: 140px; backdrop-filter: blur(5px); }
        .r-student-img { width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 10px; border: 2px solid #b8922a; }
        .r-student-name { font-size: 14px; color: #fff; font-weight: 600; font-family: 'Outfit', sans-serif; }
        .r-student-rank { font-size: 11px; color: #b8922a; font-family: 'Cinzel', serif; margin-top: 4px; letter-spacing: 0.1em; }
    </style>
</head>
<body>

<section id="hero">
    <?php if ($slide): ?>
        <?php
            $bg_class = !empty($slide['bg_image_class']) ? $slide['bg_image_class'] : 's1-bg';
            $extra = isset($slide['extra_data']) ? $slide['extra_data'] : [];
        ?>

        <div class="slide active" style="opacity:1;">
            <div class="slide-bg <?= esc($bg_class) ?>"></div>
            
            <?php if ($slide['template_type'] === 'hero'): ?>
                <div class="s1-overlay" style="position:absolute;inset:0;"></div>
                <div class="hero-shape" style="right:0;top:0;bottom:0;width:42%;border-left:1px solid rgba(184,146,42,0.1);background:linear-gradient(to left,rgba(13,36,72,0.3),transparent);"></div>
                <div class="hero-shape" style="top:60px;left:60px;width:120px;height:120px;border-radius:50%;border:1px solid rgba(184,146,42,0.08);"></div>
            <?php elseif ($slide['template_type'] === 'ranklist'): ?>
                <div class="s2-overlay" style="position:absolute;inset:0;"></div>
                <div class="hero-shape" style="top:0;right:0;width:60%;height:100%;background:linear-gradient(to left,rgba(107,31,31,0.3),transparent);border-left:1px solid rgba(184,146,42,0.08);"></div>
            <?php elseif ($slide['template_type'] === 'admissions'): ?>
                <div class="s3-overlay" style="position:absolute;inset:0;"></div>
                <div class="hero-shape" style="bottom:-100px;right:-100px;width:500px;height:500px;border-radius:50%;border:1px solid rgba(184,146,42,0.07);"></div>
            <?php endif; ?>

            <div class="slide-content max-w-screen-xl mx-auto px-6 w-full flex items-center h-full justify-between gap-10">
                
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

                    <!-- TAGS FOR ADMISSIONS -->
                    <?php if ($slide['template_type'] === 'admissions' && !empty($extra['tags'])): ?>
                    <div style="display:flex;flex-wrap:wrap;gap:10px;margin-bottom:28px;">
                        <?php foreach($extra['tags'] as $tag): ?>
                        <span style="background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.12);color:rgba(255,255,255,0.6);padding:6px 14px;font-size:12px;letter-spacing:0.06em;"><?= esc($tag) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div style="margin-top:28px;">
                        <?php if (!empty($slide['primary_cta_text'])): ?>
                        <a href="javascript:void(0)" class="slide-cta"><?= esc($slide['primary_cta_text']) ?></a>
                        <?php endif; ?>

                        <?php if (!empty($slide['secondary_cta_text'])): ?>
                        <a href="javascript:void(0)" class="slide-cta-ghost"><?= esc($slide['secondary_cta_text']) ?></a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- RIGHT CONTENT (Template Dependent) -->
                <div style="flex: 1; display:flex; justify-content: flex-end;">
                    
                    <?php if ($slide['template_type'] === 'hero' && !empty($extra['stats'])): ?>
                    <!-- HERO STATS -->
                    <div class="slide-aside hidden lg:flex">
                        <div style="display:flex;flex-direction:column;gap:28px;width:100%;">
                            <?php foreach($extra['stats'] as $st): ?>
                            <div style="border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:24px;">
                                <div style="font-size:10px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:6px;font-family:'Cinzel',serif;"><?= esc($st['label_top'] ?? '') ?></div>
                                <div style="font-family:'EB Garamond',serif;font-size:48px;color:#fff;font-weight:400;line-height:1;"><?= esc($st['number'] ?? '') ?></div>
                                <div style="font-size:12px;color:rgba(255,255,255,0.4);margin-top:4px;"><?= esc($st['label_bottom'] ?? '') ?></div>
                            </div>
                            <?php endforeach; ?>
                            <?php if (!empty($extra['affiliation_top'])): ?>
                            <div>
                                <div style="font-size:10px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:6px;font-family:'Cinzel',serif;"><?= esc($extra['affiliation_top']) ?></div>
                                <div style="font-size:14px;color:rgba(255,255,255,0.75);line-height:1.5;"><?= $extra['affiliation_bottom'] ?? '' ?></div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php elseif ($slide['template_type'] === 'ranklist' && !empty($slide['students'])): ?>
                    <!-- RANKLIST DYNAMIC STUDENTS -->
                    <div class="ranklist-grid">
                        <?php foreach($slide['students'] as $stu): ?>
                        <div class="r-student-card">
                            <img src="<?= esc($stu['image']) ?>" class="r-student-img" alt="">
                            <div class="r-student-name"><?= esc($stu['name']) ?></div>
                            <div class="r-student-rank"><?= esc($stu['rank']) ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    <?php endif; ?>
</section>

</body>
</html>
