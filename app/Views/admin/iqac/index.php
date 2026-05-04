<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
IQAC Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div x-data="{ tab: 'documents' }">
    <!-- Tabs Header -->
    <div class="flex items-center gap-2 mb-8 bg-gray-100 p-1 rounded-xl w-fit">
        <button @click="tab = 'documents'" 
                :class="tab === 'documents' ? 'bg-white text-nss-navy shadow-sm' : 'text-gray-500 hover:text-gray-700'"
                class="px-6 py-2.5 rounded-lg text-sm font-bold transition-all flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            Documents Registry
        </button>
        <button @click="tab = 'settings'" 
                :class="tab === 'settings' ? 'bg-white text-nss-navy shadow-sm' : 'text-gray-500 hover:text-gray-700'"
                class="px-6 py-2.5 rounded-lg text-sm font-bold transition-all flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            Page Settings
        </button>
    </div>

    <!-- Documents Registry Tab -->
    <div x-show="tab === 'documents'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h4 class="text-xl font-bold text-nss-navy m-0">All IQAC Documents</h4>
                <p class="text-sm text-gray-500 mt-1">Manage AQAR, NIRF, and other institutional quality reports.</p>
            </div>
            <a href="<?= base_url('AdminPortal/iqac/create') ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-nss-navy hover:bg-nss-navy-deep text-white text-sm font-medium rounded-lg shadow-sm transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add Document
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Document Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Year</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">File</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Order</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (!empty($documents)): ?>
                            <?php
                            $categoryStyles = [
                                'aqar' => 'bg-blue-50 text-blue-700 border-blue-100',
                                'meeting_minutes' => 'bg-green-50 text-green-700 border-green-100',
                                'best_practices' => 'bg-amber-50 text-amber-700 border-amber-100',
                                'nirf' => 'bg-purple-50 text-purple-700 border-purple-100',
                                'naac_certificate' => 'bg-indigo-50 text-indigo-700 border-indigo-100',
                                'undertaking' => 'bg-red-50 text-red-700 border-red-100',
                                'other' => 'bg-gray-50 text-gray-700 border-gray-100',
                            ];
                            $i = 1;
                            foreach ($documents as $doc):
                                $style = $categoryStyles[$doc['category']] ?? $categoryStyles['other'];
                            ?>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?= $i++ ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider border <?= $style ?>">
                                        <?= str_replace('_', ' ', $doc['category']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900 leading-tight"><?= esc($doc['title']) ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    <?= esc($doc['year'] ?? '—') ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <?php if (!empty($doc['file_path'])): ?>
                                        <a href="<?= base_url($doc['file_path']) ?>" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                            View PDF
                                        </a>
                                    <?php else: ?>
                                        <span class="text-xs text-gray-400 italic">No File</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500 font-medium">
                                    <?= $doc['sort_order'] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="<?= base_url('AdminPortal/iqac/edit/' . $doc['id']) ?>" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-blue-600 bg-blue-50 hover:bg-blue-100 transition-colors">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                        </a>
                                        <a href="<?= base_url('AdminPortal/iqac/delete/' . $doc['id']) ?>" onclick="return confirm('Delete this document?');" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-600 bg-red-50 hover:bg-red-100 transition-colors">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="7" class="px-6 py-12 text-center text-gray-500 text-sm">No documents found in the registry.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Settings Tab -->
    <div x-show="tab === 'settings'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-4xl">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h5 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
                    <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /></svg>
                    IQAC Page Content Settings
                </h5>
            </div>
            <div class="p-6">
                <form action="<?= base_url('AdminPortal/iqac/saveSettings') ?>
    <?= csrf_field() ?>
" method="post" class="space-y-6">
                    <?= csrf_field() ?>
<div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">About IQAC Text</label>
                        <textarea name="about_text" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm leading-relaxed" placeholder="Enter introductory paragraph..."><?= esc($settings['about_text'] ?? '') ?></textarea>
                        <p class="mt-1.5 text-[10px] text-gray-400 italic">This content appears as the main introduction on the IQAC public page.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Chairman</label>
                            <input type="text" name="chairman" value="<?= esc($settings['chairman'] ?? '') ?>" placeholder="e.g. Dr. Name, Principal"
                                   class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">IQAC Coordinator</label>
                            <input type="text" name="coordinator" value="<?= esc($settings['coordinator'] ?? '') ?>" placeholder="e.g. Dr. Name, Associate Professor"
                                   class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Committee Members</label>
                        <textarea name="members" rows="10" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm leading-relaxed font-mono" placeholder="Member 1&#10;Member 2&#10;..."><?= esc($settings['members'] ?? '') ?></textarea>
                        <p class="mt-1.5 text-[10px] text-gray-400 italic">Enter one member per line. These will be listed in the committee section.</p>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end">
                        <button type="submit" class="px-8 py-3 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                            Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
