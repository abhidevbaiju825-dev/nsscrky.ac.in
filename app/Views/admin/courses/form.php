<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
<?= $course ? 'Maintain Programme' : 'New Academic Programme' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-5xl mx-auto">
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h4 class="text-xl font-bold text-nss-navy m-0 flex items-center gap-2">
                <svg class="w-6 h-6 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" /></svg>
                <?= $course ? 'Edit Programme Details' : 'Initialize New Programme' ?>
            </h4>
            <p class="text-sm text-gray-500 mt-1">Configure academic details, duration, and course objectives.</p>
        </div>
        <a href="<?= base_url('AdminPortal/courses') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Back to Courses
        </a>
    </div>

    <form action="<?= base_url('AdminPortal/courses/store') ?>" method="post" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>
        <input type="hidden" name="courseid" value="<?= $course ? $course['_courseid'] : '' ?>">
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-nss-gold text-white text-xs font-bold">1</span>
                <h6 class="text-sm font-bold text-gray-900 m-0 uppercase tracking-wider">Core Course Information</h6>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                    <div class="md:col-span-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Title of Programme <span class="text-red-500">*</span></label>
                        <input type="text" name="title" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm font-medium" required value="<?= $course ? esc($course['_title']) : '' ?>" placeholder="e.g. B.Sc Electronics">
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Academic Category <span class="text-red-500">*</span></label>
                        <select name="category" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm">
                            <option value="UG" <?= ($course && $course['_category'] == 'UG') ? 'selected' : '' ?>>Undergraduate (UG)</option>
                            <option value="PG" <?= ($course && $course['_category'] == 'PG') ? 'selected' : '' ?>>Postgraduate (PG)</option>
                        </select>
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Duration (Sems) <span class="text-red-500">*</span></label>
                        <div class="relative rounded-md shadow-sm">
                            <input type="number" name="duration" class="block w-full rounded-md border-gray-300 border p-2.5 pr-12 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" value="<?= $course ? esc($course['_duration']) : '6' ?>">
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                <span class="text-gray-500 sm:text-sm">sems</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Marketing Tagline</label>
                    <input type="text" name="tagline" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" value="<?= $course ? esc($course['_tagline']) : '' ?>" placeholder="Brief catchy description">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Detailed Overview</label>
                    <textarea name="description" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="4"><?= $course ? esc($course['_description']) : '' ?></textarea>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-nss-gold text-white text-xs font-bold">2</span>
                <h6 class="text-sm font-bold text-gray-900 m-0 uppercase tracking-wider">Intake & Curriculum</h6>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Maximum Seats</label>
                        <input type="number" name="maxseat" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" value="<?= $course ? esc($course['_maxseat']) : '30' ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Syllabus PDF (Optional)</label>
                        <div class="flex items-center gap-4">
                            <input type="file" name="syllabus" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1 bg-white" accept=".pdf">
                        </div>
                        <?php if($course && $course['_syllabus']): ?>
                            <p class="mt-2 text-sm text-green-600 flex items-center gap-1.5 font-medium">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                Current file: <?= basename($course['_syllabus']) ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-nss-gold text-white text-xs font-bold">3</span>
                <h6 class="text-sm font-bold text-gray-900 m-0 uppercase tracking-wider">Programme specifics</h6>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Eligibility Criteria</label>
                        <textarea name="eligibility" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="3"><?= $course ? esc($course['_eligibity']) : '' ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Programme Objectives</label>
                        <textarea name="objectives" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="3"><?= $course ? esc($course['_objectives']) : '' ?></textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Programme Vision</label>
                        <textarea name="vision" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="3"><?= $course ? esc($course['_vission']) : '' ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Programme Mission</label>
                        <textarea name="mission" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="3"><?= $course ? esc($course['_mission']) : '' ?></textarea>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">HOD Message / Additional Info</label>
                    <textarea name="hodmessage" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold shadow-sm" rows="3"><?= $course ? esc($course['_hodmessage']) : '' ?></textarea>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 pb-8">
            <a href="<?= base_url('AdminPortal/courses') ?>" class="inline-flex justify-center items-center rounded-md bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center items-center rounded-md bg-nss-navy px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                <?= $course ? 'Save Transitions' : 'Deploy Programme' ?>
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
