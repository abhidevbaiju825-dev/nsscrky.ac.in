<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Members: <?= esc($club['_name']) ?>
<?= $this->endSection() ?>

<?= $this->section('header_action') ?>
<?= view('admin/partials/batch_context') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h4 class="text-xl font-bold text-nss-navy flex items-center gap-2">
            <svg class="w-6 h-6 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
            Members: <?= esc($club['_name']) ?>
        </h4>
        <p class="text-sm text-gray-500 mt-1">Manage personnel assigned to this club/entity.</p>
    </div>
    <a href="<?= base_url('AdminPortal/clubs') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Back to Clubs
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Left Col: Add Member Form -->
    <div class="lg:col-span-4">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden sticky top-6">
            <div class="px-5 py-4 border-b border-gray-100 bg-gray-50">
                <h6 class="text-sm font-bold text-gray-900 m-0 flex items-center gap-2">
                    <svg class="w-4 h-4 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM15 9h-2M9 9H7" /></svg>
                    Enroll New Member
                </h6>
            </div>
            
            <div class="p-5">
                <form action="<?= base_url('AdminPortal/clubs/addMember/'.$club['_id']) ?>" method="POST" class="space-y-4">
                    <?= csrf_field() ?>
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Select Target Entity <span class="text-red-500">*</span></label>
                        <select name="in_member_id" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required>
                            <option value="">-- Choose Member --</option>
                            <?php foreach($member_list as $m): ?>
                                <option value="<?= $m['type'].'_'.$m['_id'] ?>"><?= esc($m['_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Assign Rank/Designation <span class="text-red-500">*</span></label>
                        <select name="in_resignation" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required>
                            <option value="">-- Choose Rank --</option>
                            <?php foreach($designations as $d): ?>
                                <option value="<?= $d['_id'] ?>"><?= esc($d['_designation']) ?> (Rank: <?= $d['_desig_rank'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Member Type (Label)</label>
                        <input type="text" name="in_member_type" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" placeholder="e.g. Core Team" value="normal">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Sort Internal Ordering Rank</label>
                        <input type="number" name="rank" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="1">
                        <p class="mt-1 text-xs text-gray-500">Optional override for sorting order</p>
                    </div>
                    
                    <button type="submit" class="w-full inline-flex justify-center items-center rounded-md bg-nss-navy px-4 py-2 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors mt-2">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Add to Hierarchy
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Right Col: Member List -->
    <div class="lg:col-span-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center">
                <h6 class="text-sm font-bold text-gray-900 m-0">Current Hierarchy List</h6>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Designation</th>
                            <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Member Class</th>
                            <th scope="col" class="px-5 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Remove</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if(!empty($assigned_members)): ?>
                            <?php foreach($assigned_members as $am): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-5 py-3 whitespace-nowrap">
                                        <div class="text-sm font-bold text-blue-700"><?= esc($am['dis_name']) ?></div>
                                    </td>
                                    <td class="px-5 py-3 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                            <?= esc($am['_designation'] ?? 'Unknown Rank') ?>
                                        </span>
                                    </td>
                                    <td class="px-5 py-3 whitespace-nowrap text-sm text-gray-500">
                                        <?= esc($am['_member_type']) ?>
                                    </td>
                                    <td class="px-5 py-3 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="<?= base_url('AdminPortal/clubs/deleteMember/'.$am['_club_mem_id'].'/'.$club['_id']) ?>" onclick="return confirm('Drop this member assignment?')" class="inline-flex items-center justify-center w-8 h-8 rounded text-red-500 hover:bg-red-50 hover:text-red-700 transition-colors">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="px-5 py-8 text-center text-gray-500 text-sm">No members enrolled. Use the form on the left.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
