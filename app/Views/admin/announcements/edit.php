<?= $this->extend('layouts/admin_tailwind') ?>
<?= $this->section('page_title') ?>
Edit Announcement
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
            <svg class="w-5 h-5 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg>
            <h5 class="text-lg font-semibold text-gray-900 m-0">Edit Announcement</h5>
        </div>
        
        <div class="p-6">
            <form action="<?= base_url('AdminPortal/announcements/update/' . $item['id']) ?>
    <?= csrf_field() ?>
" method="post" class="space-y-6">
                <?= csrf_field() ?>
<div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
                    <input type="text" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" name="title" required value="<?= esc($item['title']) ?>">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Link URL</label>
                    <input type="url" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" name="url" value="<?= esc($item['url'] ?? '') ?>">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                        <input type="number" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" name="sort_order" value="<?= $item['sort_order'] ?>" min="0">
                    </div>
                    
                    <div class="flex items-end pb-2">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" <?= $item['is_active'] ? 'checked' : '' ?> class="h-4 w-4 rounded border-gray-300 text-nss-navy focus:ring-nss-navy">
                            <label for="is_active" class="ml-2 block text-sm font-medium text-gray-900">Active</label>
                        </div>
                    </div>
                </div>
                
                <div class="pt-4 flex gap-3 border-t border-gray-100">
                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-nss-navy px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        Update
                    </button>
                    <a href="<?= base_url('AdminPortal/announcements') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
