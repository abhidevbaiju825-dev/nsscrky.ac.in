<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Students Union Panel
<?= $this->endSection() ?>

<?= $this->section('header_action') ?>
<?= view('admin/partials/batch_context') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <h4 class="text-xl font-bold text-nss-navy flex items-center gap-2">
        <svg class="w-6 h-6 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" /></svg>
        Union Panel
    </h4>
    <p class="text-sm text-gray-500 mt-1">Manage the elected student representatives of the union.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Form Col -->
    <div class="lg:col-span-4">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden sticky top-6">
            <div class="px-5 py-4 border-b border-gray-100 bg-gray-50">
                <h6 class="text-sm font-bold text-gray-900 m-0 flex items-center gap-2">
                    <svg class="w-4 h-4 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM15 9h-2M9 9H7" /></svg>
                    Add Union Panel Member
                </h6>
            </div>
            
            <div class="p-5">
                <form action="<?= base_url('AdminPortal/union/panel/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <?= csrf_field() ?>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" required>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Designation <span class="text-red-500">*</span></label>
                        <input type="text" name="designation" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" placeholder="e.g. Chairman" required>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Department</label>
                        <input type="text" name="department" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" placeholder="e.g. Computer Science">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Profile Image</label>
                        <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1" accept="image/*">
                    </div>
                    
                    <button type="submit" class="w-full inline-flex justify-center items-center rounded-md bg-nss-navy px-4 py-2 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors mt-2">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Add Member
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Table Col -->
    <div class="lg:col-span-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center">
                <h6 class="text-sm font-bold text-gray-900 m-0">Current Union Panel</h6>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Photo</th>
                            <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name & Dept</th>
                            <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Designation</th>
                            <th scope="col" class="px-5 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Remove</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if(!empty($panel)): ?>
                            <?php foreach($panel as $p): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-5 py-3 whitespace-nowrap">
                                        <?php if(!empty($p['_imgloc'])): ?>
                                            <img src="<?= base_url($p['_imgloc']) ?>" class="h-10 w-10 rounded-full object-cover shadow-sm border border-gray-100">
                                        <?php else: ?>
                                            <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 border border-gray-200">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-5 py-3 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900"><?= esc($p['_name']) ?></div>
                                        <div class="text-xs text-gray-500"><?= esc($p['_department']) ?></div>
                                    </td>
                                    <td class="px-5 py-3 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-amber-50 text-amber-800 border border-amber-200">
                                            <?= esc($p['_designation']) ?>
                                        </span>
                                    </td>
                                    <td class="px-5 py-3 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="<?= base_url('AdminPortal/union/panel/delete/'.$p['_id']) ?>" onclick="return confirm('Remove panel member?')" class="inline-flex items-center justify-center w-8 h-8 rounded text-red-500 hover:bg-red-50 hover:text-red-700 transition-colors">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="px-5 py-8 text-center text-gray-500 text-sm">No panel members added yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
