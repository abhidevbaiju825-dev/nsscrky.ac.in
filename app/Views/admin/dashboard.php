<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Overview Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Total News Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute right-0 top-0 w-24 h-24 bg-blue-50 rounded-bl-full -z-10 transition-transform group-hover:scale-110"></div>
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total News</p>
            <h3 class="text-3xl font-bold text-gray-800"><?= esc($news_count ?? 0) ?></h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
        </div>
    </div>

    <!-- Gallery Items Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute right-0 top-0 w-24 h-24 bg-green-50 rounded-bl-full -z-10 transition-transform group-hover:scale-110"></div>
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Gallery Items</p>
            <h3 class="text-3xl font-bold text-gray-800"><?= esc($gallery_count ?? 0) ?></h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-600">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
        </div>
    </div>

    <!-- Active Notices Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute right-0 top-0 w-24 h-24 bg-amber-50 rounded-bl-full -z-10 transition-transform group-hover:scale-110"></div>
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Active Notices</p>
            <h3 class="text-3xl font-bold text-gray-800"><?= esc($notice_count ?? 0) ?></h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
        </div>
    </div>

    <!-- Departments Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute right-0 top-0 w-24 h-24 bg-purple-50 rounded-bl-full -z-10 transition-transform group-hover:scale-110"></div>
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Departments</p>
            <h3 class="text-3xl font-bold text-gray-800"><?= esc($dept_count ?? 0) ?></h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" /></svg>
        </div>
    </div>
    <!-- Grievances Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute right-0 top-0 w-24 h-24 bg-red-50 rounded-bl-full -z-10 transition-transform group-hover:scale-110"></div>
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Pending Grievances</p>
            <h3 class="text-3xl font-bold text-gray-800"><?= esc($grievance_count ?? 0) ?></h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center text-red-600">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
        </div>
    </div>

    <!-- Enquiries Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute right-0 top-0 w-24 h-24 bg-teal-50 rounded-bl-full -z-10 transition-transform group-hover:scale-110"></div>
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">New Enquiries</p>
            <h3 class="text-3xl font-bold text-gray-800"><?= esc($enquiry_count ?? 0) ?></h3>
        </div>
        <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-teal-600">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Quick Links -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden h-full">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-semibold text-nss-navy flex items-center gap-2">
                    <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    Quick Actions
                </h3>
            </div>
            <div class="p-4 grid grid-cols-2 gap-4 h-[calc(100%-60px)] content-start">
                <a href="<?= base_url('AdminPortal/news') ?>" class="flex flex-col items-center justify-center gap-2 p-4 rounded-lg bg-gray-50 hover:bg-nss-navy/5 text-gray-700 hover:text-nss-navy transition-colors text-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                    <span class="text-xs font-medium">Add News</span>
                </a>
                <a href="<?= base_url('AdminPortal/notices') ?>" class="flex flex-col items-center justify-center gap-2 p-4 rounded-lg bg-gray-50 hover:bg-nss-navy/5 text-gray-700 hover:text-nss-navy transition-colors text-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                    <span class="text-xs font-medium">Add Notice</span>
                </a>
                <a href="<?= base_url('AdminPortal/gallery') ?>" class="flex flex-col items-center justify-center gap-2 p-4 rounded-lg bg-gray-50 hover:bg-nss-navy/5 text-gray-700 hover:text-nss-navy transition-colors text-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" /></svg>
                    <span class="text-xs font-medium">Upload Photos</span>
                </a>
                <a href="<?= base_url('AdminPortal/alumni/requests') ?>" class="flex flex-col items-center justify-center gap-2 p-4 rounded-lg bg-gray-50 hover:bg-nss-navy/5 text-gray-700 hover:text-nss-navy transition-colors text-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" /></svg>
                    <span class="text-xs font-medium">Alumni Req.</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Latest Grievances -->
    <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-full">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
            <h3 class="font-semibold text-nss-navy flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                Recent Grievances
            </h3>
            <a href="<?= base_url('AdminPortal/grievance') ?>" class="text-xs text-blue-600 hover:text-blue-800 font-medium bg-blue-50 px-2 py-1 rounded">View All &rarr;</a>
        </div>
        <div class="p-0">
            <?php if(!empty($latest_grievances)): ?>
                <ul class="divide-y divide-gray-100">
                    <?php foreach($latest_grievances as $g): ?>
                        <li class="p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex justify-between items-start mb-1">
                                <span class="text-sm font-bold text-gray-900 line-clamp-1 pr-2"><?= esc($g['subject']) ?></span>
                                <?php if($g['status'] == 'pending'): ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-amber-100 text-amber-800 shrink-0">Pending</span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-green-100 text-green-800 shrink-0">Resolved</span>
                                <?php endif; ?>
                            </div>
                            <div class="text-xs text-gray-500 mb-2 truncate">From: <?= esc($g['name'] ?: 'Anonymous') ?> &bull; <?= date('d M Y', strtotime($g['created_at'])) ?></div>
                            <p class="text-sm text-gray-600 line-clamp-2"><?= esc($g['message']) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="p-8 text-center flex flex-col items-center justify-center text-gray-500">
                    <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    <span class="text-sm">No recent grievances found.</span>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Latest Enquiries -->
    <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-full">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
            <h3 class="font-semibold text-nss-navy flex items-center gap-2">
                <svg class="w-5 h-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                Recent Enquiries
            </h3>
            <a href="<?= base_url('AdminPortal/enquiries') ?>" class="text-xs text-blue-600 hover:text-blue-800 font-medium bg-blue-50 px-2 py-1 rounded">View All &rarr;</a>
        </div>
        <div class="p-0">
            <?php if(!empty($latest_enquiries)): ?>
                <ul class="divide-y divide-gray-100">
                    <?php foreach($latest_enquiries as $eq): ?>
                        <li class="p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex justify-between items-start mb-1">
                                <span class="text-sm font-bold text-gray-900 line-clamp-1 pr-2"><?= esc($eq['name']) ?></span>
                                <?php if($eq['status'] === 'New'): ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-red-100 text-red-800 shrink-0">New</span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-gray-100 text-gray-800 shrink-0">Read</span>
                                <?php endif; ?>
                            </div>
                            <div class="text-xs text-gray-500 mb-2 truncate">
                                <?= esc($eq['email']) ?> &bull; <?= esc($eq['phone']) ?> &bull; <?= date('d M Y', strtotime($eq['created_at'])) ?>
                            </div>
                            <p class="text-sm text-gray-600 line-clamp-2"><?= esc($eq['message']) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="p-8 text-center flex flex-col items-center justify-center text-gray-500">
                    <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    <span class="text-sm">No recent enquiries found.</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
