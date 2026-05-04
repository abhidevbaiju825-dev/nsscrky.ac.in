<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Publish New Article
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-4xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
            <svg class="w-5 h-5 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" /></svg>
            <h5 class="text-lg font-semibold text-gray-900 m-0">Create News Post</h5>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="<?= base_url('AdminPortal/news/store') ?>" method="post" enctype="multipart/form-data" class="space-y-6">
                <?= csrf_field() ?>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">News Heading <span class="text-red-500">*</span></label>
                    <input type="text" name="heading" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required placeholder="Enter the primary headline...">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Description <span class="text-red-500">*</span></label>
                    <textarea name="description" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" rows="6" required placeholder="Type the main content text here..."></textarea>
                </div>

                <div class="p-5 bg-gray-50 rounded-lg border border-gray-200">
                    <label class="block text-sm font-medium text-gray-900 mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Primary Image Cover <span class="text-gray-400 font-normal">(Optional)</span>
                    </label>
                    <input type="file" name="news_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 bg-white border border-gray-300 rounded-md p-2" accept="image/*">
                    <p class="mt-2 text-xs text-gray-500">Recommended resolution: 800x600px. Used for main preview.</p>
                </div>

                <div class="pt-6 flex items-center justify-between border-t border-gray-100">
                    <a href="<?= base_url('AdminPortal/news') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-nss-navy px-6 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                        Publish Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
