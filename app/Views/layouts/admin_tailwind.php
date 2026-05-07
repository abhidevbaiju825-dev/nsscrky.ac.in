<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSS Secure Admin Dashboard</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Cinzel:wght@400;500;600&display=swap" rel="stylesheet"/>
    
    <!-- Tailwind CSS (compiled) -->
    <link rel="stylesheet" href="<?= base_url('assets/css/tailwind.css') ?>"/>
    
    <!-- AlpineJS for Dropdowns and Interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        /* Prevent FOUC/jerk on page transitions */
        body { opacity: 0; transition: opacity 0.15s ease-in; }
        body.loaded { opacity: 1; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #071530; }
        ::-webkit-scrollbar-thumb { background: #b8922a; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #d4a843; }
    </style>
    
    <?= $this->renderSection('styles') ?>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased overflow-hidden flex h-screen">

    <!-- Mobile Sidebar Overlay -->
    <div x-data="{ open: false }" @open-sidebar.window="open = true" @keydown.escape.window="open = false">
        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 lg:hidden" @click="open = false" x-cloak></div>

        <!-- Sidebar -->
        <aside :class="open ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 bg-nss-navy-deep text-white transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-auto flex flex-col h-screen shadow-xl border-r border-nss-navy">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-center h-20 border-b border-white/10 shrink-0">
                <div class="text-center">
                    <h5 class="text-xl font-bold font-serif tracking-widest text-nss-gold-bright">NSS ADMIN</h5>
                    <span class="text-xs tracking-widest text-white/50 uppercase">Management Portal</span>
                </div>
            </div>

            <!-- Sidebar Navigation -->
            <?php
            // Active nav helper — normalize path (strip index.php prefix for WAMP)
            $cp = trim(service('request')->getUri()->getPath(), '/');
            $cp = preg_replace('#^index\.php/?#', '', $cp);
            function anav(string $seg, bool $exact = false): string {
                global $cp;
                $hit = $exact ? ($cp === $seg || $cp === $seg . '/') : str_contains($cp, $seg);
                return $hit
                    ? 'flex items-center gap-3 px-3 py-2 rounded-lg transition-colors bg-nss-gold/20 text-nss-gold-bright border-l-2 border-nss-gold-bright'
                    : 'flex items-center gap-3 px-3 py-2 rounded-lg text-gray-300 hover:bg-white/5 hover:text-white transition-colors';
            }
            function asubnav(string $seg): string {
                global $cp;
                return str_contains($cp, $seg) ? 'text-nss-gold-bright' : 'text-gray-400 hover:text-white';
            }
            function aopen(array $segs): string {
                global $cp;
                foreach ($segs as $s) { if (str_contains($cp, $s)) return 'true'; }
                return 'false';
            }
            ?>
            <nav id="sidebar-nav" class="flex-1 overflow-y-auto py-4 px-3 space-y-1 scrollbar-thin">
                
                <a href="<?= base_url('AdminPortal') ?>" class="<?= anav('AdminPortal', true) ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-3 text-xs font-semibold text-nss-gold uppercase tracking-wider">Homepage</p>
                </div>
                
                <a href="<?= base_url('AdminPortal/carousel') ?>" class="<?= anav('AdminPortal/carousel') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                    <span class="text-sm">Dynamic Carousel</span>
                </a>
                <a href="<?= base_url('AdminPortal/announcements') ?>" class="<?= anav('AdminPortal/announcements') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" /></svg>
                    <span class="text-sm">Announcements Ticker</span>
                </a>
                <a href="<?= base_url('AdminPortal/testimonials') ?>" class="<?= anav('AdminPortal/testimonials') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
                    <span class="text-sm">Testimonials</span>
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-3 text-xs font-semibold text-nss-gold uppercase tracking-wider">Modules</p>
                </div>

                <a href="<?= base_url('AdminPortal/news') ?>" class="<?= anav('AdminPortal/news') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" /></svg>
                    <span class="text-sm">News & Events</span>
                </a>
                <a href="<?= base_url('AdminPortal/gallery') ?>" class="<?= anav('AdminPortal/gallery') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                    <span class="text-sm">Gallery</span>
                </a>
                <a href="<?= base_url('AdminPortal/notices') ?>" class="<?= anav('AdminPortal/notices') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
                    <span class="text-sm">Notices</span>
                </a>
                <a href="<?= base_url('AdminPortal/enquiries') ?>" class="<?= anav('AdminPortal/enquiries') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                    <span class="text-sm">Enquiries</span>
                </a>
                <a href="<?= base_url('AdminPortal/departments') ?>" class="<?= anav('AdminPortal/departments') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" /></svg>
                    <span class="text-sm">Departments</span>
                </a>
                <a href="<?= base_url('AdminPortal/staff') ?>" class="<?= anav('AdminPortal/staff') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                    <span class="text-sm">Staff Directory</span>
                </a>
                <a href="<?= base_url('AdminPortal/programmes') ?>" class="<?= anav('AdminPortal/programmes') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                    <span class="text-sm">Programmes</span>
                </a>
                <a href="<?= base_url('AdminPortal/courses') ?>" class="<?= anav('AdminPortal/courses') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342" /></svg>
                    <span class="text-sm">Courses</span>
                </a>
                <a href="<?= base_url('AdminPortal/toppers') ?>" class="<?= anav('AdminPortal/toppers') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>
                    <span class="text-sm">Rank Holders</span>
                </a>

                <!-- Alumni Submenu -->
                <div x-data="{ expanded: <?= aopen(['AdminPortal/alumni']) ?> }" class="space-y-1">
                    <button @click="expanded = !expanded" class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-gray-300 hover:bg-white/5 hover:text-white transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" /></svg>
                            <span class="text-sm">Alumni</span>
                        </div>
                        <svg :class="expanded ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="expanded" x-collapse x-cloak class="pl-11 space-y-1">
                        <a href="<?= base_url('AdminPortal/alumni/requests') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/alumni/requests') ?>">Requests</a>
                        <a href="<?= base_url('AdminPortal/alumni') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/alumni') ?>">Directory</a>
                        <a href="<?= base_url('AdminPortal/alumni/activities') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/alumni/activities') ?>">Activities</a>
                    </div>
                </div>

                <div class="pt-4 pb-2">
                    <p class="px-3 text-xs font-semibold text-nss-gold uppercase tracking-wider">Extracurricular</p>
                </div>
                <a href="<?= base_url('AdminPortal/clubs') ?>" class="<?= anav('AdminPortal/clubs') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" /></svg>
                    <span class="text-sm">Clubs & Cells</span>
                </a>
                <a href="<?= base_url('AdminPortal/ncc') ?>" class="<?= anav('AdminPortal/ncc') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
                    <span class="text-sm">NCC</span>
                </a>
                <a href="<?= base_url('AdminPortal/nss') ?>" class="<?= anav('AdminPortal/nss') ?>">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" /></svg>
                    <span class="text-sm">NSS</span>
                </a>

                <!-- Union Submenu -->
                <div x-data="{ expanded: <?= aopen(['AdminPortal/union']) ?> }" class="space-y-1">
                    <button @click="expanded = !expanded" class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-gray-300 hover:bg-white/5 hover:text-white transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" /></svg>
                            <span class="text-sm">Students Union</span>
                        </div>
                        <svg :class="expanded ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="expanded" x-collapse x-cloak class="pl-11 space-y-1">
                        <a href="<?= base_url('AdminPortal/union/panel') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/union/panel') ?>">Union Panel</a>
                        <a href="<?= base_url('AdminPortal/union/incharge') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/union/incharge') ?>">In-Charge</a>
                        <a href="<?= base_url('AdminPortal/union/activities') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/union/activities') ?>">Activities</a>
                        <a href="<?= base_url('AdminPortal/union/gallery') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/union/gallery') ?>">Gallery</a>
                    </div>
                </div>

                <div class="pt-4 pb-2">
                    <p class="px-3 text-xs font-semibold text-nss-gold uppercase tracking-wider">Institutional</p>
                </div>
                <!-- Adding Institutional links under a single menu to save space if needed, or individually -->
                <div x-data="{ expanded: <?= aopen(['AdminPortal/principal_desk','AdminPortal/pta','AdminPortal/antiragging','AdminPortal/grievance','AdminPortal/rti','AdminPortal/iqac','AdminPortal/about','AdminPortal/council','AdminPortal/scholarship','AdminPortal/naac','AdminPortal/downloads']) ?> }" class="space-y-1">
                    <button @click="expanded = !expanded" class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-gray-300 hover:bg-white/5 hover:text-white transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" /></svg>
                            <span class="text-sm">Information Pages</span>
                        </div>
                        <svg :class="expanded ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="expanded" x-collapse x-cloak class="pl-11 space-y-1">
                        <a href="<?= base_url('AdminPortal/principal_desk') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/principal_desk') ?>">Principal Desk</a>
                        <a href="<?= base_url('AdminPortal/pta') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/pta') ?>">PTA</a>
                        <a href="<?= base_url('AdminPortal/antiragging') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/antiragging') ?>">Anti-Ragging</a>
                        <a href="<?= base_url('AdminPortal/grievance') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/grievance') ?>">Grievance Cell</a>
                        <a href="<?= base_url('AdminPortal/rti') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/rti') ?>">RTI</a>
                        <a href="<?= base_url('AdminPortal/iqac') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/iqac') ?>">IQAC</a>
                        <a href="<?= base_url('AdminPortal/about') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/about') ?>">About Page</a>
                        <a href="<?= base_url('AdminPortal/council') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/council') ?>">College Council</a>
                        <a href="<?= base_url('AdminPortal/scholarship') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/scholarship') ?>">Scholarships</a>
                        <a href="<?= base_url('AdminPortal/naac') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/naac') ?>">NAAC</a>
                        <a href="<?= base_url('AdminPortal/downloads') ?>" class="block py-1.5 text-sm <?= asubnav('AdminPortal/downloads') ?>">Downloads</a>
                    </div>
                </div>

            </nav>
        </aside>
    </div>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden bg-gray-50">
        
        <!-- Top Navbar -->
        <header class="bg-white border-b border-gray-200 h-20 shrink-0 flex items-center justify-between px-6 z-10 shadow-sm">
            <div class="flex items-center gap-4">
                <button @click="$dispatch('open-sidebar')" class="lg:hidden text-gray-500 hover:text-nss-navy focus:outline-none">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h2 class="text-xl font-bold text-nss-navy"><?= $this->renderSection('page_title') ?></h2>
            </div>

            <div class="flex items-center gap-4">
                <?= $this->renderSection('header_action') ?>
                
                <div class="hidden md:flex items-center gap-2 px-3 py-1.5 bg-gray-50 rounded-full border border-gray-100">
                    <div class="w-8 h-8 rounded-full bg-nss-gold text-white flex items-center justify-center font-bold text-sm">
                        <?= strtoupper(substr(session('username') ?? 'A', 0, 1)) ?>
                    </div>
                    <span class="text-sm font-medium text-gray-700"><?= esc(session('username')) ?></span>
                </div>
                
                <a href="<?= base_url('nssmanage/logout') ?>" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors border border-red-100">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>
                    <span class="hidden sm:inline">Logout</span>
                </a>
            </div>
        </header>

        <!-- Main Content Scroll Area -->
        <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8 scrollbar-thin">
            
            <?php if (session()->getFlashdata('message')): ?>
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-md shadow-sm" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">
                                <?= esc(session()->getFlashdata('message')) ?>
                            </p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" onclick="this.parentElement.parentElement.parentElement.parentElement.style.display='none'" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="max-w-7xl mx-auto">
                <?= $this->renderSection('content') ?>
            </div>
            
        </main>
    </div>

    <?= $this->renderSection('scripts') ?>

    <!-- Prevent FOUC: reveal body after DOM is ready -->
    <script>document.body.classList.add('loaded');</script>

    <!-- Sidebar scroll position persistence -->
    <script>
    (function() {
        var nav = document.getElementById('sidebar-nav');
        if (!nav) return;

        // Restore saved scroll position
        var saved = sessionStorage.getItem('sidebar_scroll');
        if (saved) {
            nav.scrollTop = parseInt(saved, 10);
        } else {
            // First visit or cleared session: scroll active item into view
            var active = nav.querySelector('.border-nss-gold-bright');
            if (active) active.scrollIntoView({ block: 'center', behavior: 'instant' });
        }

        // Save scroll position on scroll (debounced)
        var timer;
        nav.addEventListener('scroll', function() {
            clearTimeout(timer);
            timer = setTimeout(function() {
                sessionStorage.setItem('sidebar_scroll', nav.scrollTop);
            }, 100);
        });
    })();
    </script>
</body>
</html>
