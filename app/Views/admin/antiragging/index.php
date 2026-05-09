<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Anti-Ragging Cell Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h4 class="text-xl font-bold text-nss-navy flex items-center gap-2 m-0">
            <svg class="w-6 h-6 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
            Anti-Ragging Cell Management
        </h4>
        <p class="text-sm text-gray-500 mt-1">Update the institutional anti-ragging policy and incharge details.</p>
    </div>
    <a href="<?= base_url('AdminPortal/antiragging/complaints') ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded-lg shadow-sm transition-colors">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
        View Complaints
    </a>
</div>

<?php if (session()->getFlashdata('message')): ?>
    <div class="mb-6 p-4 border border-green-200 bg-green-50 rounded-lg flex items-center gap-3">
        <svg class="w-5 h-5 text-green-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span class="text-sm font-medium text-green-800"><?= session()->getFlashdata('message') ?></span>
    </div>
<?php endif; ?>

<div class="max-w-4xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6">
            <form action="<?= base_url('AdminPortal/antiragging/update') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <?= csrf_field() ?>
<div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Policy / Description</label>
                    <textarea name="description" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="10"><?= $item ? esc($item['description']) : '' ?></textarea>
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <h6 class="text-sm font-bold text-nss-navy mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        Incharge Details
                    </h6>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" name="incharge_name" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" value="<?= $item ? esc($item['incharge_name']) : '' ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Designation</label>
                            <input type="text" name="incharge_designation" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" value="<?= $item ? esc($item['incharge_designation']) : '' ?>">
                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Incharge Image</label>
                        <div class="flex items-start gap-4">
                            <?php if ($item && $item['incharge_image']): ?>
                                <div class="w-24 h-24 rounded-lg border border-gray-200 overflow-hidden shrink-0">
                                    <img src="<?= base_url($item['incharge_image']) ?>" class="w-full h-full object-cover">
                                </div>
                            <?php endif; ?>
                            <div class="flex-grow">
                                <input type="file" name="incharge_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1 bg-white shadow-sm">
                                <p class="mt-2 text-xs text-gray-500">Square format recommended for uniform display.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex justify-end border-t border-gray-100">
                    <button type="submit" class="inline-flex justify-center items-center rounded-md bg-nss-navy px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        Update Anti-Ragging Info
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
