<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Add PTA Entry
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('AdminPortal/pta') ?>" class="inline-flex items-center text-sm text-gray-500 hover:text-nss-navy transition-colors">
        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        Back to PTA Management
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
        <h5 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
            <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            Create New Entry
        </h5>
    </div>
    <div class="p-6">
        <form action="<?= base_url('AdminPortal/pta/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Category <span class="text-red-500">*</span></label>
                    <select name="category" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                        <option value="about">About (Text only)</option>
                        <option value="president">President</option>
                        <option value="secretary">Secretary</option>
                        <option value="incharge">Executive Member / Incharge</option>
                        <option value="member">General Member</option>
                        <option value="activity">Activity</option>
                    </select>
                </div>
                
                <div class="col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Title / Name</label>
                    <input type="text" name="title" placeholder="Member name or section title"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Designation</label>
                    <input type="text" name="designation" placeholder="e.g. Secretary, Asst. Professor"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
                
                <div class="col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="0"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Description / Content</label>
                <textarea name="description" rows="5" placeholder="Enter detailed information here..."
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm resize-none"></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Upload Image</label>
                <div class="mt-1 flex items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-lg hover:border-nss-gold transition-colors group cursor-pointer relative">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-nss-gold transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <span class="relative cursor-pointer rounded-md font-bold text-nss-navy hover:text-nss-gold transition-colors">Select a photo</span>
                        </div>
                        <p class="text-xs text-gray-500">JPG, PNG up to 2MB</p>
                    </div>
                    <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-gray-100">
                <a href="<?= base_url('AdminPortal/pta') ?>" class="px-6 py-2.5 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-bold transition-all text-sm">Cancel</a>
                <button type="submit" class="px-8 py-2.5 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all shadow-md hover:shadow-lg text-sm">
                    Save PTA Entry
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
