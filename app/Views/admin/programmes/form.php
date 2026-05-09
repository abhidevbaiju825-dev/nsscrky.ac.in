<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
<?= $programme ? 'Edit Programme' : 'New Programme' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-5xl mx-auto">
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h4 class="text-xl font-bold text-nss-navy m-0 flex items-center gap-2">
                <svg class="w-6 h-6 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                <?= $programme ? 'Edit Programme Details' : 'Initialize New Programme' ?>
            </h4>
            <p class="text-sm text-gray-500 mt-1">Configure department-specific programme details and syllabi.</p>
        </div>
        <a href="<?= base_url('AdminPortal/programmes') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Back to Programmes
        </a>
    </div>

    <form action="<?= base_url('AdminPortal/programmes/store') ?>" method="post" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>
<input type="hidden" name="id" value="<?= $programme ? $programme['id'] : '' ?>">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-nss-gold text-white text-xs font-bold">1</span>
                <h6 class="text-sm font-bold text-gray-900 m-0 uppercase tracking-wider">Basic Information</h6>
            </div>
            
            <div class="p-6 space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title of the Program <span class="text-red-500">*</span></label>
                    <input type="text" name="title" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm font-medium" required value="<?= $programme ? esc($programme['title']) : '' ?>" placeholder="e.g. B.Sc Electronics">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description <span class="text-red-500">*</span></label>
                    <textarea name="description" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="4" required placeholder="Program description..."><?= $programme ? esc($programme['description']) : '' ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Duration <span class="text-red-500">*</span></label>
                        <input type="text" name="duration" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" required value="<?= $programme ? esc($programme['duration']) : '3 Years' ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type <span class="text-red-500">*</span></label>
                        <select name="type" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" required>
                            <option value="">-- Select --</option>
                            <option value="UG" <?= ($programme && $programme['type'] == 'UG') ? 'selected' : '' ?>>UG</option>
                            <option value="PG" <?= ($programme && $programme['type'] == 'PG') ? 'selected' : '' ?>>PG</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Max Seats</label>
                        <input type="number" name="max_seats" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" value="<?= $programme ? esc($programme['max_seats']) : '0' ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Department <span class="text-red-500">*</span></label>
                        <select name="department_id" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" required>
                            <option value="">-- Select --</option>
                            <?php foreach($departments as $d): ?>
                                <option value="<?= $d['_dep_id'] ?>" <?= ($programme && $programme['department_id'] == $d['_dep_id']) ? 'selected' : '' ?>>
                                    <?= esc($d['_department_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-nss-gold text-white text-xs font-bold">2</span>
                <h6 class="text-sm font-bold text-gray-900 m-0 uppercase tracking-wider">Additional Details</h6>
            </div>
            
            <div class="p-6 space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Eligibility</label>
                    <textarea name="eligibility" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="2" placeholder="Eligibility criteria..."><?= $programme ? esc($programme['eligibility'] ?? '') : '' ?></textarea>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Vision</label>
                        <textarea name="vision" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="2"><?= $programme ? esc($programme['vision'] ?? '') : '' ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mission</label>
                        <textarea name="mission" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="2"><?= $programme ? esc($programme['mission'] ?? '') : '' ?></textarea>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Objectives</label>
                    <textarea name="objectives" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="2"><?= $programme ? esc($programme['objectives'] ?? '') : '' ?></textarea>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-nss-gold text-white text-xs font-bold">3</span>
                <h6 class="text-sm font-bold text-gray-900 m-0 uppercase tracking-wider">Media & Documents</h6>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Syllabus PDF</label>
                        <div class="flex flex-col items-start gap-3">
                            <div class="w-full">
                                <input type="file" name="syllabus" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1 bg-white shadow-sm" accept=".pdf">
                            </div>
                            <?php if($programme && !empty($programme['syllabus'])): ?>
                                <a href="<?= base_url($programme['syllabus']) ?>" target="_blank" class="inline-flex items-center gap-1.5 text-sm font-medium text-green-600 hover:text-green-700 transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                                    View Current Syllabus
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Programme Image</label>
                        <div class="flex flex-col items-start gap-3">
                            <div class="w-full">
                                <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1 bg-white shadow-sm" accept="image/*">
                            </div>
                            <?php if($programme && !empty($programme['image'])): ?>
                                <a href="<?= base_url($programme['image']) ?>" target="_blank" class="inline-flex items-center gap-1.5 text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    View Current Image
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 pb-8">
            <a href="<?= base_url('AdminPortal/programmes') ?>" class="inline-flex justify-center items-center rounded-md bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center items-center rounded-md bg-nss-navy px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                <?= $programme ? 'Update' : 'Save' ?>
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
