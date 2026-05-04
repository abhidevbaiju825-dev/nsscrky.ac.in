<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Edit IQAC Document
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('AdminPortal/iqac') ?>" class="inline-flex items-center text-sm text-gray-500 hover:text-nss-navy transition-colors">
        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        Back to Registry
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-4xl">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
        <h5 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
            Edit Document Details
        </h5>
    </div>
    <div class="p-6">
        <form action="<?= base_url('AdminPortal/iqac/update/' . $doc['id']) ?>
    <?= csrf_field() ?>
" method="post" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>
<div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <div class="md:col-span-4">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Category <span class="text-red-500">*</span></label>
                    <select name="category" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                        <?php
                        $cats = [
                            'aqar' => 'AQAR Report',
                            'meeting_minutes' => 'Meeting Minutes',
                            'best_practices' => 'Best Practices',
                            'nirf' => 'NIRF',
                            'naac_certificate' => 'NAAC Certificate',
                            'undertaking' => 'Undertaking',
                            'other' => 'Other',
                        ];
                        foreach ($cats as $val => $label):
                        ?>
                            <option value="<?= $val ?>" <?= ($doc['category'] === $val) ? 'selected' : '' ?>><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="md:col-span-5">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" required value="<?= esc($doc['title']) ?>"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Year / Period</label>
                    <input type="text" name="year" value="<?= esc($doc['year'] ?? '') ?>"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Document File</label>
                    <?php if (!empty($doc['file_path'])): ?>
                        <div class="mb-3">
                            <a href="<?= base_url($doc['file_path']) ?>" target="_blank" class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg text-xs font-bold border border-blue-100 hover:bg-blue-100 transition-colors w-full justify-center">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                Current File: <?= basename($doc['file_path']) ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <input type="file" name="document_file" accept=".pdf,.doc,.docx,.txt"
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-xs bg-white file:mr-4 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-nss-gold/10 file:text-nss-gold hover:file:bg-nss-gold/20">
                    <p class="mt-1.5 text-[10px] text-gray-400 italic">Leave empty to keep the existing file. Max 5MB.</p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="<?= $doc['sort_order'] ?>" min="0"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Description <span class="text-gray-400 font-normal">(optional)</span></label>
                <textarea name="description" rows="3" placeholder="Enter brief details..."
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm resize-none"><?= esc($doc['description'] ?? '') ?></textarea>
            </div>

            <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="<?= base_url('AdminPortal/iqac') ?>" class="px-6 py-2.5 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-bold transition-all text-sm">Cancel</a>
                <button type="submit" class="px-8 py-2.5 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all shadow-md hover:shadow-lg text-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                    Update Document
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
