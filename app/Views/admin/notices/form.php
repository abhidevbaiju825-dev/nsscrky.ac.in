<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Upload Notice
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-4xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
            <svg class="w-5 h-5 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <h5 class="text-lg font-semibold text-gray-900 m-0">Create New Notice</h5>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="<?= base_url('AdminPortal/notices/store') ?>" method="post" enctype="multipart/form-data" class="space-y-6">
                <?= csrf_field() ?>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Notice Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required placeholder="Subject or Title...">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            Expiration Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="exp_date" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required>
                        <p class="mt-1.5 text-xs text-gray-500">The notice drops from the board after this date.</p>
                    </div>
                    
                    <div class="md:mt-7">
                        <div class="relative flex items-start p-4 border border-red-100 bg-red-50 rounded-lg">
                            <div class="flex h-6 items-center">
                                <input id="importantSwitch" name="important" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-red-600 focus:ring-red-600">
                            </div>
                            <div class="ml-3 text-sm leading-6">
                                <label for="importantSwitch" class="font-bold text-red-800">Mark as High Priority</label>
                                <p class="text-red-600/80 text-xs">Blinks and highlights on the homepage.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-5 bg-gray-50 rounded-lg border border-gray-200">
                    <label class="block text-sm font-medium text-gray-900 mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        Attach PDF Document <span class="text-gray-400 font-normal">(Optional)</span>
                    </label>
                    <input type="file" name="pdf_file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 bg-white border border-gray-300 rounded-md p-2" accept="application/pdf">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">External URL Link <span class="text-gray-400 font-normal">(Optional)</span></label>
                    <input type="url" name="link" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" placeholder="https://...">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Brief Description <span class="text-gray-400 font-normal">(Optional)</span></label>
                    <textarea name="description" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" rows="3" placeholder="Optional context..."></textarea>
                </div>

                <div class="pt-6 flex items-center justify-between border-t border-gray-100">
                    <a href="<?= base_url('AdminPortal/notices') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-amber-500 px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                        Upload Notice
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
