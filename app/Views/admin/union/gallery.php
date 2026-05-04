<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Students Union Gallery
<?= $this->endSection() ?>

<?= $this->section('header_action') ?>
<?= view('admin/partials/batch_context') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <h4 class="text-xl font-bold text-nss-navy flex items-center gap-2">
        <svg class="w-6 h-6 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
        Union Gallery
    </h4>
    <p class="text-sm text-gray-500 mt-1">Manage image gallery for Students Union.</p>
</div>

<!-- Upload Zone -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
        <svg class="w-5 h-5 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" /></svg>
        <h5 class="text-sm font-semibold text-gray-900 uppercase tracking-wider m-0">Upload to Union Gallery</h5>
    </div>
    <div class="p-6">
        <form action="<?= base_url('AdminPortal/union/gallery/store') ?>" method="post" enctype="multipart/form-data" class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
            <?= csrf_field() ?>
            <div class="flex-grow max-w-md w-full">
                <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1" accept="image/*" required>
            </div>
            <button type="submit" class="inline-flex justify-center items-center rounded-md bg-nss-navy px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors shrink-0">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                Upload Image
            </button>
        </form>
    </div>
</div>

<!-- Image Grid -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center justify-between">
        <h6 class="text-sm font-bold text-gray-900 m-0">Uploaded Images</h6>
    </div>
    
    <div class="p-6">
        <?php if(!empty($images)): ?>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                <?php foreach($images as $img): ?>
                    <div class="bg-gray-50 rounded-lg border border-gray-200 overflow-hidden group relative">
                        <div class="relative h-40 w-full overflow-hidden bg-gray-200">
                            <img src="<?= base_url($img['_imgloc']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            
                            <!-- Overlay actions -->
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-start justify-end p-2">
                                <a href="<?= base_url('AdminPortal/union/gallery/delete/'.$img['_union_gallery_id']) ?>"
                                   class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-600 text-white hover:bg-red-700 shadow-sm transition-transform hover:scale-110"
                                   onclick="return confirm('Delete this image?');"
                                   title="Delete">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                <p class="text-lg font-medium text-gray-900 mb-1">Gallery is empty</p>
                <p class="text-gray-500">Use the form above to upload images.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
