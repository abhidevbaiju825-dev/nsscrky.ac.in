<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
<?= $testimonial ? 'Edit Testimonial' : 'New Testimonial' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-4xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
            <svg class="w-5 h-5 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg>
            <h5 class="text-lg font-semibold text-gray-900 m-0"><?= $testimonial ? 'Update Testimonial Details' : 'Add New Testimonial' ?></h5>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="<?= base_url('AdminPortal/testimonials/store') ?>" method="post" enctype="multipart/form-data" class="space-y-6">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $testimonial ? $testimonial['id'] : '' ?>">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Author Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required value="<?= $testimonial ? esc($testimonial['name']) : '' ?>" placeholder="e.g. Dr. Jane Doe">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Designation / Role <span class="text-red-500">*</span></label>
                        <input type="text" name="designation" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required value="<?= $testimonial ? esc($testimonial['designation']) : '' ?>" placeholder="e.g. Alumni, Batch 2020">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Testimonial Message <span class="text-red-500">*</span></label>
                    <textarea name="message" class="block w-full rounded-md border-gray-300 border p-3 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" rows="5" required placeholder="Write the testimonial content here..."><?= $testimonial ? esc($testimonial['message']) : '' ?></textarea>
                </div>

                <div class="p-5 bg-gray-50 rounded-lg border border-gray-200">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Author Image <span class="text-gray-400 font-normal">(Optional)</span></label>
                    <div class="flex items-center gap-6">
                        <?php if($testimonial && !empty($testimonial['image_url'])): ?>
                            <div class="flex-shrink-0">
                                <img src="<?= base_url($testimonial['image_url']) ?>" alt="Avatar" class="h-16 w-16 rounded-full object-cover border-2 border-white shadow-sm">
                            </div>
                        <?php else: ?>
                            <div class="flex-shrink-0 h-16 w-16 rounded-full bg-gray-200 border-2 border-white shadow-sm flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </div>
                        <?php endif; ?>
                        
                        <div class="flex-1">
                            <input type="file" name="image_url" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*">
                            <p class="mt-1 text-xs text-gray-500">Square images work best. Max 2MB.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6 flex items-center justify-between border-t border-gray-100">
                    <a href="<?= base_url('AdminPortal/testimonials') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-nss-navy px-6 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        <?= $testimonial ? 'Update Testimonial' : 'Save Testimonial' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
