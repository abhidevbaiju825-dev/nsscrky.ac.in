<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Designations hierarchy: <?= esc($club['_name']) ?>
<?= $this->endSection() ?>

<?= $this->section('header_action') ?>
<?= view('admin/partials/batch_context') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h4 class="text-xl font-bold text-nss-navy flex items-center gap-2">
            <svg class="w-6 h-6 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" /></svg>
            Designations: <?= esc($club['_name']) ?>
        </h4>
        <p class="text-sm text-gray-500 mt-1">Manage ranks and hierarchy for this entity.</p>
    </div>
    <a href="<?= base_url('AdminPortal/clubs') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Back to Clubs
    </a>
</div>

<div class="max-w-4xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <svg class="w-5 h-5 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
            <h5 class="text-sm font-semibold text-gray-900 m-0 uppercase tracking-wider">Hierarchy Definition</h5>
        </div>
        
        <div class="p-6">
            <form action="<?= base_url('AdminPortal/clubs/saveDesignations/'.$club['_id']) ?>
    <?= csrf_field() ?>
" method="POST" class="space-y-6">
                
                <!-- Existing Designations -->
                <div>
                    <?php if(!empty($designations)): ?>
                        <div class="space-y-3">
                            <?php foreach($designations as $d): ?>
                                <div class="flex items-end gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
                                    <input type="hidden" name="desigId[]" value="<?= $d['_id'] ?>">
                                    
                                    <div class="flex-grow">
                                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Designation Name</label>
                                        <input type="text" name="cdesig[]" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" value="<?= esc($d['_designation']) ?>" required>
                                    </div>
                                    
                                    <div class="w-32 shrink-0">
                                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Rank Level</label>
                                        <input type="number" name="crank[]" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" value="<?= $d['_desig_rank'] ?>" required min="1">
                                    </div>
                                    
                                    <div class="shrink-0 pb-0.5">
                                        <a href="<?= base_url('AdminPortal/clubs/deleteDesignation/'.$d['_id'].'/'.$club['_id']) ?>" onclick="return confirm('Delete this rank? This will break relations with members holding it.')" class="inline-flex items-center justify-center w-10 h-[38px] rounded-md text-red-600 bg-white border border-red-200 hover:bg-red-50 hover:border-red-300 transition-colors" title="Delete">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="rounded-lg border border-dashed border-gray-300 p-6 text-center">
                            <p class="text-sm text-gray-500">No designations defined. Add them below ensuring 1 is highest rank.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Add New -->
                <div class="pt-6 border-t border-gray-100">
                    <h6 class="text-sm font-bold text-nss-navy mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Add New Rank
                    </h6>
                    
                    <div class="flex items-end gap-3 p-4 bg-blue-50/50 rounded-lg border border-blue-100">
                        <input type="hidden" name="desigId[]" value="">
                        
                        <div class="flex-grow">
                            <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1.5">Designation Name</label>
                            <input type="text" name="cdesig[]" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" placeholder="e.g. Secretary">
                        </div>
                        
                        <div class="w-32 shrink-0">
                            <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1.5">Rank Level</label>
                            <input type="number" name="crank[]" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" placeholder="e.g. 2">
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-nss-navy px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" /></svg>
                        Save Hierarchy
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
