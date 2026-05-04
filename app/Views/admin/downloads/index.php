<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Downloads Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <h4 class="text-xl font-bold text-nss-navy flex items-center gap-2 m-0">
        <svg class="w-6 h-6 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg>
        Downloadable Files
    </h4>
    <p class="text-sm text-gray-500 mt-1">Manage public forms, documents, and application files available for download.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50">
        <h6 class="text-sm font-bold text-gray-900 m-0 flex items-center gap-2">
            <svg class="w-4 h-4 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            Upload New File
        </h6>
    </div>
    
    <div class="p-5">
        <form action="<?= base_url('AdminPortal/downloads/store') ?>
    <?= csrf_field() ?>
" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
<div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <div class="md:col-span-4">
                    <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1.5">Document Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required placeholder="e.g. Admission Form 2024">
                </div>
                <div class="md:col-span-4">
                    <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1.5">PDF File <span class="text-red-500">*</span></label>
                    <input type="file" name="pdf_file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1 shadow-sm bg-white" accept=".pdf" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="0">
                </div>
                <div class="md:col-span-2">
                    <button type="submit" class="w-full inline-flex justify-center items-center rounded-md bg-nss-navy px-4 py-2 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Upload
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-12">#</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">File</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Order</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (!empty($downloads)): ?>
                    <?php foreach ($downloads as $i => $d): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= $i+1 ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900"><?= esc($d['_title']) ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if(!empty($d['_pdfloc'])): ?>
                                    <a href="<?= base_url($d['_pdfloc']) ?>" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 hover:bg-blue-100 font-medium transition-colors border border-blue-200 text-xs">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                                        View PDF
                                    </a>
                                <?php else: ?>
                                    <span class="text-sm text-gray-400">—</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                    <?= $d['_order'] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="<?= base_url('AdminPortal/downloads/delete/'.$d['_web_downloads_id']) ?>" onclick="return confirm('Delete?');" class="inline-flex items-center justify-center w-8 h-8 rounded text-red-500 hover:bg-red-50 hover:text-red-700 transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500 text-sm">No downloads yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
