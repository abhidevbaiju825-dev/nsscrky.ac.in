<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
<?= esc($album['_albumname']) ?> — Images
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Breadcrumb -->
<nav class="flex mb-6" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="<?= base_url('AdminPortal/gallery') ?>" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-nss-navy transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
        Albums
      </a>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="w-4 h-4 text-gray-400 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
        <span class="ml-1 text-sm font-bold text-gray-900 md:ml-2"><?= esc($album['_albumname']) ?></span>
      </div>
    </li>
  </ol>
</nav>

<!-- Upload Zone -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
        <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" /></svg>
        <h5 class="text-sm font-semibold text-gray-900 uppercase tracking-wider m-0">Upload New Image</h5>
    </div>
    <div class="p-6">
        <form action="<?= base_url('AdminPortal/gallery/upload/'.$album['_album_id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <div class="md:col-span-4">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Image File <span class="text-red-500">*</span></label>
                    <input type="file" name="gallery_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1" accept="image/*" required>
                </div>
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Title <span class="text-gray-400 font-normal lowercase">(Optional)</span></label>
                    <input type="text" name="img_title" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" placeholder="Image caption...">
                </div>
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Description <span class="text-gray-400 font-normal lowercase">(Optional)</span></label>
                    <input type="text" name="img_description" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" placeholder="Brief note...">
                </div>
                <div class="md:col-span-2">
                    <button type="submit" class="w-full inline-flex justify-center items-center rounded-md bg-nss-navy px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" /></svg>
                        Upload
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Image Grid -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center justify-between">
        <h6 class="text-sm font-bold text-gray-900 m-0"><?= count($images) ?> Image<?= count($images) !== 1 ? 's' : '' ?> in Album</h6>
    </div>
    
    <div class="p-6">
        <?php if(!empty($images)): ?>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                <?php foreach($images as $img): ?>
                    <div class="bg-gray-50 rounded-lg border border-gray-200 overflow-hidden group relative">
                        <div class="relative h-32 w-full overflow-hidden bg-gray-200">
                            <img src="<?= base_url($img['_imgloc']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="<?= esc($img['_img_title']) ?>">
                            
                            <!-- Overlay actions -->
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-start justify-end p-2">
                                <a href="<?= base_url('AdminPortal/gallery/delete-image/'.$img['_id']) ?>"
                                   class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-red-600 text-white hover:bg-red-700 shadow-sm transition-transform hover:scale-110"
                                   onclick="return confirm('Delete this image?');"
                                   title="Delete">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                </a>
                            </div>
                        </div>
                        <?php if(!empty($img['_img_title'])): ?>
                            <div class="p-2 border-t border-gray-200 bg-white">
                                <p class="text-xs text-gray-600 font-medium truncate" title="<?= esc($img['_img_title']) ?>"><?= esc($img['_img_title']) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" /></svg>
                <p class="text-lg font-medium text-gray-900 mb-1">Album is empty</p>
                <p class="text-gray-500">Use the form above to upload images.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
