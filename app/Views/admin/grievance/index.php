<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Student Grievance Cell
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="space-y-8">
    <!-- Grievance Policy/About -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <h3 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
                <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
                Grievance Cell Policy / About Text
            </h3>
        </div>
        <div class="p-6">
            <form action="<?= base_url('AdminPortal/grievance/update') ?>
    <?= csrf_field() ?>
" method="post" class="space-y-4">
                <?= csrf_field() ?>
<div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Policy Description</label>
                    <textarea name="description" rows="8" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm leading-relaxed" placeholder="Enter the official policy text..."><?= $item ? esc($item['description']) : '' ?></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2.5 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all shadow-md hover:shadow-lg text-sm">
                        Update Policy
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Student Complaints List -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
            <h3 class="text-lg font-bold text-nss-navy m-0">Student Complaints</h3>
            <span class="px-2.5 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-bold">Total Received: <?= count($complaints) ?></span>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Student Details</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Subject & Message</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if ($complaints): ?>
                        <?php foreach ($complaints as $c): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= date('d M Y', strtotime($c['created_at'])) ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900"><?= esc($c['name'] ?: 'Anonymous') ?></div>
                                    <div class="text-xs text-gray-500 mt-0.5"><?= esc($c['email']) ?></div>
                                    <div class="text-[10px] text-gray-400"><?= esc($c['phone']) ?></div>
                                </td>
                                <td class="px-6 py-4 max-w-md">
                                    <div class="text-sm font-semibold text-gray-800 mb-1"><?= esc($c['subject']) ?></div>
                                    <p class="text-xs text-gray-500 leading-relaxed italic line-clamp-2">"<?= esc($c['message']) ?>"</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <?php if($c['status'] == 'pending'): ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3"/></svg>
                                            Pending
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3"/></svg>
                                            Resolved
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="<?= base_url('AdminPortal/grievance/delete_complaint/' . $c['id']) ?>" 
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-600 bg-red-50 hover:bg-red-100 transition-colors" 
                                       onclick="return confirm('Delete this complaint permanently?');">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500 text-sm italic">No complaints received yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
