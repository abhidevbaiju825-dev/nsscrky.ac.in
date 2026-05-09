<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Add IQAC Document
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
            <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            Add New IQAC Document
        </h5>
    </div>
    <div class="p-6">
        <form action="<?= base_url('AdminPortal/iqac/store') ?>" method="post" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>
<div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <div class="md:col-span-4">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Category <span class="text-red-500">*</span></label>
                    <select name="category" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                        <option value="">-- Select Category --</option>
                        <option value="aqar">AQAR Report</option>
                        <option value="meeting_minutes">Meeting Minutes</option>
                        <option value="best_practices">Best Practices</option>
                        <option value="nirf">NIRF</option>
                        <option value="naac_certificate">NAAC Certificate</option>
                        <option value="undertaking">Undertaking</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="md:col-span-5">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" required placeholder="e.g. AQAR 2023-24"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Year / Period</label>
                    <input type="text" name="year" placeholder="e.g. 2023-24"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Upload Document (PDF/Word)</label>
                    <input type="file" name="document_file" accept=".pdf,.doc,.docx,.txt"
                           class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-xs bg-white file:mr-4 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-nss-gold/10 file:text-nss-gold hover:file:bg-nss-gold/20">
                    <p class="mt-1.5 text-[10px] text-gray-400 italic">Supported formats: PDF, DOC, DOCX, TXT (Max 5MB)</p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="0" min="0"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Brief Description <span class="text-gray-400 font-normal">(optional)</span></label>
                <textarea name="description" rows="3" placeholder="Enter brief details about this document..."
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm resize-none"></textarea>
            </div>

            <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="<?= base_url('AdminPortal/iqac') ?>" class="px-6 py-2.5 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-bold transition-all text-sm">Cancel</a>
                <button type="submit" class="px-8 py-2.5 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all shadow-md hover:shadow-lg text-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                    Save Document
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
