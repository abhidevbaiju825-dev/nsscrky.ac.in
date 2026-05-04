<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
<?= isset($staff) ? 'Edit Staff Profile' : 'Staff Registration Form' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-5xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
            <svg class="w-5 h-5 text-nss-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
            <h5 class="text-lg font-semibold text-gray-900 m-0"><?= isset($staff) ? 'Update Staff Profile' : 'Register New Staff Member' ?></h5>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="<?= base_url('AdminPortal/staff/'.(isset($staff) ? 'update/'.$staff['_teacher_id'] : 'store')) ?>" method="post" enctype="multipart/form-data" class="space-y-8">
                <?= csrf_field() ?>
                <!-- Basic Information -->
                <div>
                    <h6 class="text-sm font-bold text-nss-navy uppercase tracking-wider border-b border-gray-200 pb-2 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" /></svg>
                        Basic Information
                    </h6>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="<?= isset($staff) ? esc($staff['_name']) : '' ?>" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Short Name <span class="text-gray-400 font-normal">(Optional)</span></label>
                            <input type="text" name="short_name" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="<?= isset($staff) ? esc($staff['_short_name']) : '' ?>" placeholder="e.g. ABC">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                            <select name="gender" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm">
                                <option value="">Select Gender</option>
                                <option value="Male" <?= (isset($staff) && $staff['_gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= (isset($staff) && $staff['_gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                                <option value="Other" <?= (isset($staff) && $staff['_gender'] == 'Other') ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Professional Details -->
                <div>
                    <h6 class="text-sm font-bold text-nss-navy uppercase tracking-wider border-b border-gray-200 pb-2 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        Professional Details
                    </h6>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Classification Role <span class="text-red-500">*</span></label>
                            <select name="role" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required>
                                <option value="teacher" <?= (isset($staff) && $staff['_role'] == 'teacher') ? 'selected' : '' ?>>Teaching Faculty</option>
                                <option value="officestaff" <?= (isset($staff) && ($staff['_role'] == 'officestaff' || $staff['_role'] == 'nonteachingstaff')) ? 'selected' : '' ?>>Office Staff</option>
                                <option value="librarystaff" <?= (isset($staff) && $staff['_role'] == 'librarystaff') ? 'selected' : '' ?>>Library Staff</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Designation <span class="text-red-500">*</span></label>
                            <?php $desig = isset($staff) ? $staff['_designation'] : ''; ?>
                            <select name="designation" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" required>
                                <option value="">-- Select Designation --</option>
                                <optgroup label="Teaching Faculty">
                                    <option value="Assistant Professor" <?= $desig == 'Assistant Professor' ? 'selected' : '' ?>>Assistant Professor</option>
                                    <option value="Assistant Professor & Head" <?= $desig == 'Assistant Professor & Head' ? 'selected' : '' ?>>Assistant Professor & Head (HOD)</option>
                                    <option value="Associate Professor" <?= $desig == 'Associate Professor' ? 'selected' : '' ?>>Associate Professor</option>
                                    <option value="Associate Professor & Head" <?= $desig == 'Associate Professor & Head' ? 'selected' : '' ?>>Associate Professor & Head (HOD)</option>
                                    <option value="Professor" <?= $desig == 'Professor' ? 'selected' : '' ?>>Professor</option>
                                    <option value="Guest Lecturer" <?= $desig == 'Guest Lecturer' ? 'selected' : '' ?>>Guest Lecturer</option>
                                </optgroup>
                                <optgroup label="Non-Teaching">
                                    <option value="Non-Teaching Staff" <?= $desig == 'Non-Teaching Staff' ? 'selected' : '' ?>>Non-Teaching Staff</option>
                                    <option value="Office Staff" <?= $desig == 'Office Staff' ? 'selected' : '' ?>>Office Staff</option>
                                    <option value="Librarian" <?= $desig == 'Librarian' ? 'selected' : '' ?>>Librarian</option>
                                    <option value="Lab Assistant" <?= $desig == 'Lab Assistant' ? 'selected' : '' ?>>Lab Assistant</option>
                                </optgroup>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Department Assignment</label>
                            <select name="department_id" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm">
                                <option value="0">Global / Administrative Office</option>
                                <?php foreach($departments as $d): ?>
                                    <option value="<?= $d['_dep_id'] ?>" <?= (isset($staff) && $staff['_department'] == $d['_dep_id']) ? 'selected' : '' ?>>
                                        <?= esc($d['_department_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Qualification</label>
                            <input type="text" name="qualification" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="<?= isset($staff) ? esc($staff['_qualification']) : '' ?>" placeholder="MSc, PhD...">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Area of Specialization</label>
                            <input type="text" name="area_of_specialization" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="<?= isset($staff) ? esc($staff['_area_of_specialization']) : '' ?>">
                        </div>
                    </div>
                </div>

                <!-- Contact & Media -->
                <div>
                    <h6 class="text-sm font-bold text-nss-navy uppercase tracking-wider border-b border-gray-200 pb-2 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        Contact & Media
                    </h6>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="email" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="<?= isset($staff) ? esc($staff['_email']) : '' ?>" placeholder="staff@nsscrky.ac.in">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contact Phone Number</label>
                            <input type="text" name="phone" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="<?= isset($staff) ? esc($staff['_phone']) : '' ?>">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address / Location</label>
                            <textarea name="address_line1" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" rows="2"><?= isset($staff) ? esc($staff['_address_line1']) : '' ?></textarea>
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Profile Portrait Image</label>
                            <?php if(isset($staff) && !empty($staff['_imgloc'])): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url($staff['_imgloc']) ?>" class="h-16 w-16 object-cover rounded shadow-sm border border-gray-200">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="profile_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md p-1" accept="image/png, image/jpeg, image/jpg">
                            <p class="mt-1.5 text-xs text-gray-500">Leave blank to keep current image.</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Details -->
                <div>
                    <h6 class="text-sm font-bold text-nss-navy uppercase tracking-wider border-b border-gray-200 pb-2 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        Additional Details
                    </h6>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                            <input type="date" name="dob" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="<?= isset($staff) ? esc($staff['_dob']) : '' ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date of Joining</label>
                            <input type="date" name="dateofjoin" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="<?= isset($staff) ? esc($staff['_dateofjoin']) : '' ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date of Retirement</label>
                            <input type="date" name="dateofretirement" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" value="<?= isset($staff) ? esc($staff['_dateofretirement']) : '' ?>">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">About / Description</label>
                            <textarea name="description" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm" rows="3"><?= isset($staff) ? esc($staff['_description']) : '' ?></textarea>
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" class="block w-full rounded-md border-gray-300 border p-2.5 focus:border-nss-gold focus:ring-nss-gold sm:text-sm shadow-sm">
                                <option value="approved" <?= (isset($staff) && $staff['_status'] == 'approved') ? 'selected' : '' ?>>Active / Approved</option>
                                <option value="pending" <?= (isset($staff) && $staff['_status'] == 'pending') ? 'selected' : '' ?>>Pending Approval</option>
                                <option value="inactive" <?= (isset($staff) && $staff['_status'] == 'inactive') ? 'selected' : '' ?>>Inactive / Retired</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="pt-6 flex items-center justify-between border-t border-gray-100">
                    <a href="<?= base_url('AdminPortal/staff') ?>" class="inline-flex items-center justify-center rounded-md bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-md bg-nss-navy px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        <?= isset($staff) ? 'Update Staff Profile' : 'Register New Staff' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
