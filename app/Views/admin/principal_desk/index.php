<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Principal Desk Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Current Principal Profile -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
        <h5 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
            <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
            Current Principal Profile
        </h5>
    </div>
    <div class="p-6">
        <form action="<?= base_url('AdminPortal/principal_desk/update') ?>" method="POST" enctype="multipart/form-data" class="space-y-8">
            <?= csrf_field() ?>
<input type="hidden" name="id" value="<?= isset($principal) ? esc($principal['_id']) : '' ?>">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Left Column -->
                <div class="lg:col-span-8 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Principal Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="<?= isset($principal) ? esc($principal['_name']) : '' ?>" required
                                   class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Qualifications <span class="text-red-500">*</span></label>
                            <input type="text" name="qualification" value="<?= isset($principal) ? esc($principal['_qualification']) : '' ?>" required
                                   class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Email Address</label>
                            <input type="email" name="email" value="<?= isset($principal) ? esc($principal['_email']) : '' ?>"
                                   class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Phone Number</label>
                            <input type="text" name="phone" value="<?= isset($principal) ? esc($principal['_phone']) : '' ?>"
                                   class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Short Message / Quote</label>
                        <textarea name="message" rows="3" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm resize-none"><?= isset($principal) ? esc($principal['_message']) : '' ?></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">About / Full Profile</label>
                        <textarea name="about" rows="6" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm resize-none"><?= isset($principal) ? esc($principal['_about']) : '' ?></textarea>
                    </div>
                </div>

                <!-- Right Column (Image) -->
                <div class="lg:col-span-4">
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 text-center">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Profile Photo</label>
                        
                        <div class="relative group inline-block mb-6">
                            <div class="w-48 h-60 rounded-xl overflow-hidden border-4 border-white shadow-lg bg-white">
                                <?php if (isset($principal) && !empty($principal['_imgloc'])): ?>
                                    <img src="<?= base_url($principal['_imgloc']) ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center text-gray-300">
                                        <svg class="w-20 h-20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="text-left">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Upload New Photo</label>
                            <input type="file" name="profile_image" accept="image/*"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-xs bg-white file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-nss-gold/10 file:text-nss-gold hover:file:bg-nss-gold/20">
                            <p class="mt-2 text-[10px] text-gray-400 italic leading-tight text-center">Recommended: 500x600px. Leave blank to keep current.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex justify-end gap-3">
                <?php if (isset($principal) && !empty($principal['_id'])): ?>
                    <a href="<?= base_url('AdminPortal/principal_desk/make_former/' . $principal['_id']) ?>" 
                       onclick="return confirm('Are you sure you want to move the current Principal to Former records? This will clear the current profile and move the name to the historical list.');"
                       class="px-6 py-3 bg-white hover:bg-gray-50 border border-gray-200 text-gray-700 font-bold rounded-lg transition-all shadow-sm hover:shadow flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>
                        Make as Former Principal
                    </a>
                <?php endif; ?>
                <button type="submit" class="px-8 py-3 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    Save Principal Profile
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Former Principals Section -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
        <h5 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
            <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
            Former Principals
        </h5>
    </div>
    <div class="p-6">
        <!-- Add / Edit Former Principal Form -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 mb-8">
            <h6 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                <?php if(isset($edit_former)): ?>
                    <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                    Edit Former Principal
                <?php else: ?>
                    <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    Add Former Principal
                <?php endif; ?>
            </h6>
            <form action="<?= isset($edit_former) ? base_url('AdminPortal/principal_desk/update_former/'.$edit_former['_id']) : base_url('AdminPortal/principal_desk/store_former') ?>" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <?= csrf_field() ?>
<div class="md:col-span-1">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="<?= isset($edit_former) ? esc($edit_former['_name']) : '' ?>" required placeholder="Dr. John Doe"
                           class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
                <div class="md:col-span-1">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">From Date <span class="text-red-500">*</span></label>
                    <input type="date" name="from_date" value="<?= isset($edit_former) ? esc($edit_former['_from_date']) : '' ?>" required
                           class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
                <div class="md:col-span-1">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">To Date</label>
                    <input type="date" name="to_date" value="<?= isset($edit_former) ? esc($edit_former['_to_date']) : '' ?>"
                           class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
                <div class="md:col-span-1 flex gap-2">
                    <button type="submit" class="flex-1 py-2 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all text-sm shadow-sm">
                        <?= isset($edit_former) ? 'Update' : 'Add' ?>
                    </button>
                    <?php if(isset($edit_former)): ?>
                        <a href="<?= base_url('AdminPortal/principal_desk') ?>" class="px-3 py-2 border border-gray-200 text-gray-500 hover:bg-white rounded-lg transition-all text-sm">
                            Cancel
                        </a>
                    <?php endif; ?>
                </div>
            </form>
            <p class="mt-2 text-[10px] text-gray-400">Note: Leave "To Date" blank if currently serving as Principal.</p>
        </div>

        <!-- Former Principals Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Period From</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Period To</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($former_principals)): ?>
                        <?php foreach ($former_principals as $i => $fp): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                <?= $i + 1 ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900"><?= esc($fp['_name']) ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?= !empty($fp['_from_date']) ? date('d M Y', strtotime($fp['_from_date'])) : '—' ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if(empty($fp['_to_date'])): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">
                                        Presently Serving
                                    </span>
                                <?php else: ?>
                                    <span class="text-sm text-gray-600"><?= date('d M Y', strtotime($fp['_to_date'])) ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?= base_url('AdminPortal/principal_desk/edit_former/'.$fp['_id']) ?>" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-blue-600 bg-blue-50 hover:bg-blue-100 transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                    </a>
                                    <a href="<?= base_url('AdminPortal/principal_desk/delete_former/'.$fp['_id']) ?>" onclick="return confirm('Remove this former principal?');" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-600 bg-red-50 hover:bg-red-100 transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500 text-sm">No former principals added yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
