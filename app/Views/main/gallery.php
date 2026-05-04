<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<!-- ═══════════════════════════════
     BREADCRUMB / HERO
═══════════════════════════════ -->
<section style="background: linear-gradient(135deg, #071530 0%, #0d2448 100%); padding: 80px 0 60px;">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
        <h1 style="font-family:'Cinzel',serif; color: #b8922a; font-size: 38px; margin-bottom: 10px;">Photo <em>Gallery</em></h1>
        <div style="color: rgba(255,255,255,0.6); font-size: 14px; letter-spacing: 0.1em; text-transform: uppercase;">
            Captured Moments & Academic Milestone
        </div>
    </div>
</section>

<!-- ═══════════════════════════════
     ALBUM GRID
═══════════════════════════════ -->
<section class="py-20" style="background:#fff;">
    <div class="max-w-screen-xl mx-auto px-4">
        <?php if(!empty($albums)): ?>
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-8">
                <?php foreach($albums as $album): ?>
                    <a href="<?= base_url('Home/view_gallery/'.$album['_album_id']) ?>" class="group block no-underline">
                        <div class="relative overflow-hidden rounded-xl bg-gray-100 shadow-sm transition-all duration-500 group-hover:shadow-xl group-hover:-translate-y-2" style="aspect-ratio: 4/5;">
                            <?php if(!empty($album['cover'])): ?>
                                <img src="<?= base_url($album['cover']) ?>" alt="<?= esc($album['_albumname']) ?>" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <?php else: ?>
                                <div class="absolute inset-0 flex items-center justify-center bg-gray-50 border border-gray-100">
                                    <svg width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="0.5" class="text-gray-300">
                                        <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                            
                            <!-- Content -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                <span class="inline-block px-2 py-1 bg-[#b8922a] text-[10px] font-bold tracking-widest uppercase mb-2 rounded-sm">
                                    <?= $album['image_count'] ?> Photos
                                </span>
                                <h3 class="font-serif text-xl border-b border-white/20 pb-2 mb-2"><?= esc($album['_albumname']) ?></h3>
                                <p class="text-xs text-white/70 line-clamp-2 leading-relaxed"><?= esc($album['_description'] ?? '') ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-24 border border-dashed border-gray-200 rounded-2xl bg-gray-50">
                <svg width="64" height="64" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="0.5" class="mx-auto text-gray-300 mb-4">
                     <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="font-serif text-2xl text-gray-400">No albums published yet</h3>
                <p class="text-gray-400 max-w-sm mx-auto mt-2">Check back soon for latest photos from our campus events and activities.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
