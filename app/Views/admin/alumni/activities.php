<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Alumni Activities & Events
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- Form Section -->
    <div class="lg:col-span-4">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 sticky top-8">
            <div class="px-6 py-4 border-b border-gray-100">
                <h5 class="text-lg font-bold text-nss-navy m-0 flex items-center gap-2">
                    <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                    Post New Activity
                </h5>
            </div>
            <div class="p-6">
                <form action="<?= base_url('AdminPortal/alumni/store_activity') ?>
    <?= csrf_field() ?>
" method="post" enctype="multipart/form-data" class="space-y-4">
                    <?= csrf_field() ?>
<div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Activity Title</label>
                        <input type="text" name="title" required placeholder="Enter event name"
                               class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Description</label>
                        <textarea name="description" rows="4" required placeholder="Describe the event details..."
                                  class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm resize-none"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Date of Activity</label>
                        <input type="date" name="activity_date" required
                               class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-nss-gold focus:ring-2 focus:ring-nss-gold/20 outline-none transition-all text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Cover Image (Optional)</label>
                        <div class="mt-1 flex items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-lg hover:border-nss-gold transition-colors group cursor-pointer relative">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-nss-gold transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <span class="relative cursor-pointer rounded-md font-bold text-nss-navy hover:text-nss-gold transition-colors">Upload a file</span>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                            </div>
                            <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                        </div>
                    </div>
                    <button type="submit" class="w-full py-3 bg-nss-navy hover:bg-nss-navy-deep text-white font-bold rounded-lg transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                        Post Activity
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Data List Section -->
    <div class="lg:col-span-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h5 class="text-lg font-bold text-nss-navy m-0">Recent Activities</h5>
                <span class="px-2.5 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-bold">Total: <?= count($activities) ?></span>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-32">Image</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Activity Details</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if(!empty($activities)): ?>
                            <?php foreach($activities as $act): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php if(!empty($act['image_url'])): ?>
                                            <div class="w-20 h-14 rounded-lg overflow-hidden border border-gray-100 bg-gray-50">
                                                <img src="<?= base_url($act['image_url']) ?>" class="w-full h-full object-cover">
                                            </div>
                                        <?php else: ?>
                                            <div class="w-20 h-14 rounded-lg bg-gray-50 flex items-center justify-center border border-gray-100">
                                                <span class="text-[10px] font-bold text-gray-400 uppercase">No Image</span>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-bold text-gray-900 mb-1"><?= esc($act['title']) ?></div>
                                        <div class="text-xs text-gray-500 line-clamp-2 max-w-xs leading-relaxed">
                                            <?= esc($act['description']) ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100">
                                            <?= date('d M Y', strtotime($act['activity_date'])) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="<?= base_url('AdminPortal/alumni/delete_activity/'.$act['id']) ?>" 
                                           class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-red-600 bg-red-50 hover:bg-red-100 transition-colors" 
                                           onclick="return confirm('Delete this activity?');">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="px-6 py-12 text-center text-gray-500 text-sm">No activities posted yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
