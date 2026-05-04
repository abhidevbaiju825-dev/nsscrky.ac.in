<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
<?= $album ? 'Edit Album' : 'Create New Album' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-3xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
            <svg class="w-5 h-5 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
            <h5 class="text-lg font-semibold text-gray-900 m-0"><?= $album ? 'Update Album Details' : 'Album Information' ?></h5>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="<?= $album ? base_url('AdminPortal/gallery/update-album/'.$album['_album_id']) : base_url('AdminPortal/gallery/store-album') ?>" method="post" class="space-y-6">
                <?= csrf_field() ?>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Album Name <span class="text-red-500">*</span></label>
                    <input type="text" name="albumname" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required
                        value="<?= $album ? esc($album['_albumname']) : '' ?>"
                        placeholder="e.g. Annual Day 2026, Sports Meet, etc.">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description <span class="text-gray-400 font-normal">(Optional)</span></label>
                    <textarea name="description" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" rows="3"
                        placeholder="A brief description of this album..."><?= $album ? esc($album['_description']) : '' ?></textarea>
                </div>

                <div class="pt-6 flex items-center justify-between border-t border-gray-100">
                    <a href="<?= base_url('AdminPortal/gallery') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-nss-navy px-6 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        <?= $album ? 'Update Album' : 'Create Album' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
