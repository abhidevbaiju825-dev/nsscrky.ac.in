<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Edit PTA Entry
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('AdminPortal/pta') ?>" class="inline-flex items-center text-sm text-gray-500 hover:text-nss-navy transition-colors">
        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        Back to PTA Management
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
        <h5 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg>
            Modify Entry
        </h5>
    </div>
    <div class="p-6">
        <form action="<?= base_url('AdminPortal/pta/update/' . $item['id']) ?>
    <?= csrf_field() ?>
" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Category <span class="text-red-500">*</span></label>
                    <select name="category" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                        <option value="about" <?= $item['category'] == 'about' ? 'selected' : ''; ?>>About (Text only)</option>
                        <option value="president" <?= $item['category'] == 'president' ? 'selected' : ''; ?>>President</option>
                        <option value="secretary" <?= $item['category'] == 'secretary' ? 'selected' : ''; ?>>Secretary</option>
                        <option value="incharge" <?= $item['category'] == 'incharge' ? 'selected' : ''; ?>>Executive Member / Incharge</option>
                        <option value="member" <?= $item['category'] == 'member' ? 'selected' : ''; ?>>General Member</option>
                        <option value="activity" <?= $item['category'] == 'activity' ? 'selected' : ''; ?>>Activity</option>
                    </select>
                </div>
                
                <div class="col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Title / Name</label>
                    <input type="text" name="title" value="<?= esc($item['title']) ?>"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Designation</label>
                    <input type="text" name="designation" value="<?= esc($item['designation']) ?>"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
                
                <div class="col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="<?= $item['sort_order'] ?>"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Description / Content</label>
                <textarea name="description" rows="5"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm resize-none"><?= esc($item['description']) ?></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Current Image</label>
                    <?php if ($item['image']): ?>
                        <div class="relative w-32 h-32 rounded-lg overflow-hidden border border-gray-200 mb-2">
                            <img src="<?= base_url($item['image']) ?>" class="w-full h-full object-cover">
                        </div>
                    <?php else: ?>
                        <div class="w-32 h-32 rounded-lg bg-gray-50 flex items-center justify-center border border-gray-200 text-gray-400 text-xs mb-2">No Image</div>
                    <?php endif; ?>
                </div>
                <div class="col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Update Image</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-nss-gold/10 file:text-nss-gold hover:file:bg-nss-gold/20">
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-gray-100">
                <a href="<?= base_url('AdminPortal/pta') ?>" class="px-6 py-2.5 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-bold transition-all text-sm">Cancel</a>
                <button type="submit" class="px-8 py-2.5 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all shadow-md hover:shadow-lg text-sm">
                    Update Entry
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
