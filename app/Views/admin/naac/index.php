<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
NAAC Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="space-y-8">
    <!-- NAAC Certificates -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <h5 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
                <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 15a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.47.617-1.47 1.457v.356c0 .513.204 1.006.567 1.369l1.082 1.082a2.25 2.25 0 001.591.659h.008c.621 0 1.125-.504 1.125-1.125V5.25c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v1.457c0 .621.504 1.125 1.125 1.125h.008a2.25 2.25 0 001.591-.659l1.082-1.082a2.25 2.25 0 00.567-1.369v-.356c0-.84-.488-1.314-1.47-1.457M12 3.375L10.875 5.25h2.25L12 3.375z" /></svg>
                NAAC Certificates
            </h5>
        </div>
        <div class="p-6">
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 mb-8">
                <form action="<?= base_url('AdminPortal/naac/store_certificate') ?>" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <?= csrf_field() ?>
<div class="md:col-span-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="e.g. Cycle 3 Accreditation"
                               class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                    </div>
                    <div class="md:col-span-5">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Certificate Image <span class="text-red-500">*</span></label>
                        <input type="file" name="image" required accept="image/*"
                               class="w-full px-3 py-1.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-xs bg-white file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-nss-gold/10 file:text-nss-gold hover:file:bg-nss-gold/20">
                    </div>
                    <div class="md:col-span-3">
                        <button type="submit" class="w-full py-2.5 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all text-sm shadow-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                            Add Certificate
                        </button>
                    </div>
                </form>
            </div>

            <?php if (!empty($certificates)): ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <?php foreach ($certificates as $c): ?>
                        <div class="group bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all overflow-hidden relative">
                            <div class="aspect-w-4 aspect-h-5 overflow-hidden bg-gray-50 h-48">
                                <?php if(!empty($c['_imgloc'])): ?>
                                    <img src="<?= base_url($c['_imgloc']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center text-gray-300 italic text-xs uppercase">No Image</div>
                                <?php endif; ?>
                            </div>
                            <div class="p-3 flex items-center justify-between border-t border-gray-50">
                                <span class="text-xs font-bold text-nss-navy truncate mr-2" title="<?= esc($c['_title']) ?>"><?= esc($c['_title']) ?></span>
                                <a href="<?= base_url('AdminPortal/naac/delete_certificate/'.$c['_id']) ?>" 
                                   class="flex-shrink-0 w-8 h-8 rounded-lg bg-red-50 text-red-500 flex items-center justify-center hover:bg-red-100 transition-colors"
                                   onclick="return confirm('Delete this certificate?');">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12 text-gray-400 italic text-sm">No certificates added yet.</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- NAAC Journey -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <h5 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
                <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                NAAC Journey (Timeline)
            </h5>
        </div>
        <div class="p-6">
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 mb-8">
                <form action="<?= base_url('AdminPortal/naac/store_journey') ?>" method="POST" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <?= csrf_field() ?>
<div class="md:col-span-4">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Event Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="e.g. Cycle 1 Accreditation"
                               class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                    </div>
                    <div class="md:col-span-6">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Description</label>
                        <textarea name="description" rows="1" placeholder="Short description of the event..."
                                  class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm resize-none"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit" class="w-full py-2.5 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all text-sm shadow-sm">
                            Add Journey Entry
                        </button>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (!empty($journey)): ?>
                            <?php foreach ($journey as $i => $j): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?= $i+1 ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><div class="text-sm font-bold text-gray-900"><?= esc($j['_title']) ?></div></td>
                                    <td class="px-6 py-4"><div class="text-xs text-gray-500 max-w-sm line-clamp-2"><?= esc($j['_description'] ?? '—') ?></div></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <a href="<?= base_url('AdminPortal/naac/delete_journey/'.$j['_id']) ?>" 
                                           class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-600 bg-red-50 hover:bg-red-100 transition-colors"
                                           onclick="return confirm('Delete this journey entry?');">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="px-6 py-12 text-center text-gray-500 text-sm">No journey entries added yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Coordinators -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <h5 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
                <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                NAAC Coordinators
            </h5>
        </div>
        <div class="p-6">
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 mb-8">
                <form action="<?= base_url('AdminPortal/naac/store_cordinator') ?>" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <?= csrf_field() ?>
<div class="md:col-span-3">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Coordinator Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" required placeholder="Dr. John Doe"
                               class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Designation</label>
                        <input type="text" name="designation" placeholder="e.g. IQAC Coordinator"
                               class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Profile Photo</label>
                        <input type="file" name="image" accept="image/*"
                               class="w-full px-3 py-1.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-xs bg-white file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-nss-gold/10 file:text-nss-gold hover:file:bg-nss-gold/20">
                    </div>
                    <div class="md:col-span-3">
                        <button type="submit" class="w-full py-2.5 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all text-sm shadow-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                            Add Coordinator
                        </button>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-24">Photo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Designation</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (!empty($cordinators)): ?>
                            <?php foreach ($cordinators as $i => $c): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?= $i+1 ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-10 h-10 rounded-full border border-gray-200 overflow-hidden bg-gray-50">
                                            <?php if(!empty($c['_imgloc'])): ?>
                                                <img src="<?= base_url($c['_imgloc']) ?>" class="w-full h-full object-cover">
                                            <?php else: ?>
                                                <div class="w-full h-full flex items-center justify-center text-gray-300">
                                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap"><div class="text-sm font-bold text-gray-900"><?= esc($c['_name']) ?></div></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= esc($c['_designation'] ?? '—') ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <a href="<?= base_url('AdminPortal/naac/delete_cordinator/'.$c['_id']) ?>" 
                                           class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-600 bg-red-50 hover:bg-red-100 transition-colors"
                                           onclick="return confirm('Delete this coordinator?');">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="px-6 py-12 text-center text-gray-500 text-sm">No coordinators added yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
