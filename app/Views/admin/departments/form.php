<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
<?= isset($department) ? 'Edit Department' : 'Add New Department' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-4xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
            <svg class="w-5 h-5 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" /></svg>
            <h5 class="text-lg font-semibold text-gray-900 m-0"><?= isset($department) ? 'Update Department Details' : 'Create Department Profile' ?></h5>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="<?= isset($department) ? base_url('AdminPortal/departments/update/'.$department['_dep_id']) : base_url('AdminPortal/departments/store') ?>" method="post" class="space-y-6">
                <?= csrf_field() ?>
                <div>
                    <label class="block text-sm font-bold text-nss-navy mb-1">Department Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="department_name" class="block w-full rounded-md border-nss-navy border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required value="<?= isset($department) ? esc($department['_department_name']) : '' ?>" placeholder="e.g. Department of Computer Science">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Department Description <span class="text-red-500">*</span></label>
                    <textarea name="description" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" rows="5" required placeholder="Department background and objectives..."><?= isset($department) ? esc($department['_description']) : '' ?></textarea>
                </div>

                <div class="bg-gray-50 rounded-lg p-5 border border-gray-200">
                    <h6 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        Association Data
                    </h6>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Association Name <span class="text-gray-400 font-normal">(Optional)</span></label>
                            <input type="text" name="association_name" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm bg-white" value="<?= isset($department) ? esc($department['_association_name']) : '' ?>" placeholder="e.g. Compsoc">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Association Detail <span class="text-gray-400 font-normal">(Optional)</span></label>
                            <textarea name="association_description" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm bg-white" rows="2" placeholder="Brief info about association activities..."><?= isset($department) ? esc($department['_association_description']) : '' ?></textarea>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">HoD Public Message <span class="text-gray-400 font-normal">(Optional)</span></label>
                    <textarea name="hod_message" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" rows="3" placeholder="Message from Head of Department..."><?= isset($department) ? esc($department['_hod_message']) : '' ?></textarea>
                </div>

                <div class="pt-6 flex items-center justify-between border-t border-gray-100">
                    <a href="<?= base_url('AdminPortal/departments') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-nss-navy px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg>
                        <?= isset($department) ? 'Update Department' : 'Create Department' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
