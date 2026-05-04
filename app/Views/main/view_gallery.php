<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<!-- ═══════════════════════════════
     BREADCRUMB / HERO
═══════════════════════════════ -->
<section style="background: #071530; padding: 40px 0;">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <nav class="mb-2">
                    <a href="<?= base_url('Home/gallery') ?>" class="text-[#b8922a] text-xs uppercase tracking-widest no-underline hover:opacity-80 transition-opacity flex items-center gap-2">
                        <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path d="M15 19l-7-7 7-7" />
                        </svg>
                        Back to Gallery
                    </a>
                </nav>
                <h1 style="font-family:'Cinzel',serif; color: #fff; font-size: 32px;"><?= esc($album['_albumname']) ?></h1>
            </div>
            <div class="md:text-right">
                <div style="color: #b8922a; font-size: 11px; letter-spacing: 0.15em; text-transform: uppercase; font-weight: 500;">
                    Published on <?= date('d M Y', strtotime($album['_created_at'])) ?>
                </div>
                <p class="text-white/50 text-xs mt-1"><?= $album['_imagecount'] ?> Total Photos</p>
            </div>
        </div>
        
        <?php if(!empty($album['_description'])): ?>
            <div class="mt-8 p-6 bg-white/5 border-l-2 border-[#b8922a] rounded-r-lg max-w-3xl">
                <p class="text-white/80 leading-relaxed italic" style="font-size: 15px;">
                    "<?= esc($album['_description']) ?>"
                </p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ═══════════════════════════════
     IMAGE GRID
═══════════════════════════════ -->
<section class="py-20" style="background:#fff;">
    <div class="max-w-screen-xl mx-auto px-4">
        <?php if(!empty($images)): ?>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <?php foreach($images as $img): ?>
                    <div class="group relative overflow-hidden rounded-lg shadow-sm aspect-square bg-gray-100">
                        <img src="<?= base_url($img['_imgloc']) ?>" 
                             alt="<?= esc($img['_img_title'] ?? '') ?>" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 cursor-pointer"
                             onclick="showLightbox('<?= base_url($img['_imgloc']) ?>', '<?= esc($img['_img_title']) ?>')">
                        
                        <?php if(!empty($img['_img_title'])): ?>
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4 pointer-events-none">
                                <p class="text-white text-xs font-medium border-l border-[#b8922a] pl-2"><?= esc($img['_img_title']) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-20 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                <p class="text-gray-400 font-serif text-lg">No photos found in this album.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ═══════════════════════════════
     LIGHTBOX (Simple Overlay)
═══════════════════════════════ -->
<div id="gallery-lightbox" class="fixed inset-0 z-[9999] bg-black/95 flex items-center justify-center p-4 md:p-10 opacity-0 pointer-events-none transition-opacity duration-300">
    <button onclick="closeLightbox()" class="absolute top-6 right-6 text-white hover:text-[#b8922a] transition-colors">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    
    <div class="max-w-5xl w-full h-full flex flex-col justify-center items-center">
        <img id="lightbox-img" src="" class="max-w-full max-h-[80vh] object-contain shadow-2xl">
        <p id="lightbox-caption" class="text-[#b8922a] font-serif text-xl mt-6 text-center"></p>
    </div>
</div>

<script>
function showLightbox(src, title) {
    const lb = document.getElementById('gallery-lightbox');
    const img = document.getElementById('lightbox-img');
    const caption = document.getElementById('lightbox-caption');
    
    img.src = src;
    caption.innerText = title;
    
    lb.classList.remove('opacity-0', 'pointer-events-none');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lb = document.getElementById('gallery-lightbox');
    lb.classList.add('opacity-0', 'pointer-events-none');
    document.body.style.overflow = '';
}

// Close on escape
window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeLightbox();
});
</script>

<?= $this->endSection() ?>
