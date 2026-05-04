<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
<?= isset($club) ? 'Edit Entity' : 'New Club/Cell Entity' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h4 class="text-xl font-bold text-nss-navy m-0"><?= isset($club) ? 'Edit Details: ' . esc($club['_name']) : 'Initialize New Entity' ?></h4>
            <p class="text-sm text-gray-500 mt-1">Manage clubs, cells, NCC, NSS, PTA, or the Students Union</p>
        </div>
        <a href="<?= base_url('AdminPortal/clubs') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Back to Directory
        </a>
    </div>

    <form action="<?= isset($club) ? base_url('AdminPortal/clubs/update/'.$club['_id']) : base_url('AdminPortal/clubs/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Basic Identification -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-nss-gold text-white text-xs font-bold">1</span>
                <h6 class="text-sm font-bold text-gray-900 m-0 uppercase tracking-wider">Basic Identification</h6>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Entity Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" value="<?= isset($club) ? esc($club['_name']) : '' ?>" placeholder="e.g. Photography Club" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Category Type <span class="text-red-500">*</span></label>
                        <select name="display_as" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" required>
                            <option value="club" <?= (isset($club) && $club['_display_as']=='club') ? 'selected':'' ?>>Club / Cell / Chapter</option>
                            <option value="ncc" <?= (isset($club) && $club['_display_as']=='ncc') ? 'selected':'' ?>>National Cadet Corps (NCC)</option>
                            <option value="nss" <?= (isset($club) && $club['_display_as']=='nss') ? 'selected':'' ?>>National Service Scheme (NSS)</option>
                            <option value="pta" <?= (isset($club) && $club['_display_as']=='pta') ? 'selected':'' ?>>PTA</option>
                            <option value="union" <?= (isset($club) && $club['_display_as']=='union') ? 'selected':'' ?>>Students Union</option>
                        </select>
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description & Objectives</label>
                        <textarea name="description" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="4" placeholder="Briefly describe the purpose, vision, and activities of this entity..."><?= isset($club) ? esc($club['_description']) : '' ?></textarea>
                        <p class="mt-1.5 text-xs text-gray-500 flex items-center gap-1">
                            <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            This text appears on the public profile page.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management & Hierarchy -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-nss-gold text-white text-xs font-bold">2</span>
                <h6 class="text-sm font-bold text-gray-900 m-0 uppercase tracking-wider">Assignments & Hierarchy</h6>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Primary Staff In-charge</label>
                        <select name="staff_id" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm">
                            <option value="0">-- Select Staff Member --</option>
                            <?php foreach($staff as $s): ?>
                                <option value="<?= $s['_teacher_id'] ?>" <?= (isset($club) && $club['_staf_id']==$s['_teacher_id']) ? 'selected':'' ?>><?= esc($s['_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Associated Department</label>
                        <select name="dept_id" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm">
                            <option value="0">-- General / Institute Level --</option>
                            <?php foreach($departments as $d): ?>
                                <option value="<?= $d['_dep_id'] ?>" <?= (isset($club) && $club['_dept_id']==$d['_dep_id']) ? 'selected':'' ?>><?= esc($d['_department_name'] ?? $d['_department'] ?? 'Unknown') ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p class="mt-1.5 text-xs text-gray-500">Link this entity to a specific department if applicable.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Branding -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-nss-gold text-white text-xs font-bold">3</span>
                <h6 class="text-sm font-bold text-gray-900 m-0 uppercase tracking-wider">Media & Brand Assets</h6>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Logo Info -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Entity Badge / Logo</label>
                        <div class="flex flex-col items-start gap-3">
                            <?php if(isset($club) && !empty($club['_logo'])): ?>
                                <div class="h-20 w-20 rounded bg-gray-50 border border-gray-200 p-1 flex items-center justify-center">
                                    <img src="<?= base_url($club['_logo']) ?>" class="max-h-full max-w-full object-contain">
                                </div>
                            <?php endif; ?>
                            <div class="w-full">
                                <input type="file" name="logo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1" accept="image/*">
                                <p class="mt-2 text-xs text-gray-500">Square format recommended. PNG with transparency works best.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Listing Banner -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Directory Thumbnail</label>
                        <div class="flex flex-col items-start gap-3">
                            <?php if(isset($club) && !empty($club['_imgloc'])): ?>
                                <div class="h-20 w-28 rounded bg-gray-50 border border-gray-200 overflow-hidden">
                                    <img src="<?= base_url($club['_imgloc']) ?>" class="h-full w-full object-cover">
                                </div>
                            <?php endif; ?>
                            <div class="w-full">
                                <input type="file" name="clubimsg" class="block w-full text-sm text-gray-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1" accept="image/*">
                                <p class="mt-2 text-xs text-gray-500">Used on the main grid directory (Standard 4:3 image).</p>
                            </div>
                        </div>
                    </div>

                    <!-- Header Banner -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Profile Header Banner</label>
                        <div class="flex flex-col items-start gap-3">
                            <?php if(isset($club) && !empty($club['_hbanner'])): ?>
                                <div class="h-20 w-full rounded bg-gray-50 border border-gray-200 overflow-hidden">
                                    <img src="<?= base_url($club['_hbanner']) ?>" class="h-full w-full object-cover">
                                </div>
                            <?php endif; ?>
                            <div class="w-full">
                                <input type="file" name="hbanner" class="block w-full text-sm text-gray-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1" accept="image/*">
                                <p class="mt-2 text-xs text-gray-500">Panoramic/Wide format. Displayed prominently at the top.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end gap-3 pt-4 pb-8">
            <a href="<?= base_url('AdminPortal/clubs') ?>" class="inline-flex justify-center items-center rounded-md bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center items-center rounded-md bg-nss-navy px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                <?= isset($club) ? 'Save Entity Details' : 'Create Entity' ?>
            </button>
        </div>
        
    </form>
</div>

<?= $this->endSection() ?>
