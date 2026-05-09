<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Anti-Ragging Complaints
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h4 class="text-xl font-bold text-nss-navy flex items-center gap-2 m-0">
            <svg class="w-6 h-6 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
            Complaints Management
        </h4>
        <p class="text-sm text-gray-500 mt-1">Review and update the status of submitted anti-ragging complaints.</p>
    </div>
    <a href="<?= base_url('AdminPortal/antiragging') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Back to Settings
    </a>
</div>

<?php if (session()->getFlashdata('message')): ?>
    <div class="mb-6 p-4 border border-green-200 bg-green-50 rounded-lg flex items-center gap-3">
        <svg class="w-5 h-5 text-green-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span class="text-sm font-medium text-green-800"><?= session()->getFlashdata('message') ?></span>
    </div>
<?php endif; ?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <?php if (!empty($complaints)): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Subject</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider" style="min-width: 280px;">Complaint Details</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-5 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($complaints as $c): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-5 py-4 whitespace-nowrap">
                                <span class="text-xs font-mono font-bold text-gray-500">#<?= str_pad($c['id'], 4, '0', STR_PAD_LEFT) ?></span>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-900"><?= date('d M Y', strtotime($c['created_at'])) ?></div>
                                <div class="text-xs text-gray-500"><?= date('h:i A', strtotime($c['created_at'])) ?></div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="text-sm font-medium text-gray-900"><?= esc($c['subject']) ?></div>
                            </td>
                            <td class="px-5 py-4">
                                <p class="text-sm text-gray-600 whitespace-pre-wrap line-clamp-3"><?= esc($c['complaint']) ?></p>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <?php if ($c['status'] === 'pending'): ?>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3"/></svg>
                                        Pending
                                    </span>
                                <?php elseif ($c['status'] === 'under_review'): ?>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3"/></svg>
                                        Under Review
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3"/></svg>
                                        Resolved
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-right">
                                <form action="<?= base_url('AdminPortal/antiragging/updateStatus/' . $c['id']) ?>" method="POST" class="inline-flex items-center gap-2">
                                    <?= csrf_field() ?>
<select name="status" class="rounded-md border-gray-300 border p-1.5 focus:border-nss-gold focus:ring-nss-gold text-xs shadow-sm w-32">
                                        <option value="pending" <?= $c['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                        <option value="under_review" <?= $c['status'] === 'under_review' ? 'selected' : '' ?>>Under Review</option>
                                        <option value="resolved" <?= $c['status'] === 'resolved' ? 'selected' : '' ?>>Resolved</option>
                                    </select>
                                    <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 rounded-md bg-nss-navy text-white text-xs font-bold hover:bg-nss-navy-deep transition-colors shadow-sm">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="p-16 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
            <p class="text-gray-500 text-sm font-medium">No complaints have been received yet.</p>
            <p class="text-gray-400 text-xs mt-1">Complaints submitted via the public portal will appear here.</p>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
