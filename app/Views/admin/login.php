<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSS Secure Login</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Cinzel:wght@400;500;600&display=swap" rel="stylesheet"/>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              nss: {
                navy: '#0d2448',
                'navy-deep': '#071530',
                gold: '#b8922a',
                'gold-bright': '#d4a843',
                cream: '#fafafa',
              }
            },
            fontFamily: {
              sans: ['Outfit', 'sans-serif'],
              serif: ['Cinzel', 'serif'],
            }
          }
        }
      }
    </script>
</head>
<body class="bg-gray-100 font-sans flex items-center justify-center min-h-screen">
    
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg border border-gray-100 p-8 m-4">
        
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-nss-navy-deep rounded-full flex items-center justify-center mx-auto mb-4 shadow-inner">
                <svg class="w-8 h-8 text-nss-gold-bright" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold font-serif text-nss-navy">NSS Admin Portal</h3>
            <p class="text-sm text-gray-500 mt-1">Please enter your credentials to proceed</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-sm text-red-600 flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('message')): ?>
            <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-sm text-green-600 flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('nssmanage/attempt') ?>" method="post" class="space-y-5">
            <?= csrf_field() ?>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="text" name="username" class="pl-10 block w-full rounded-lg border-gray-300 border bg-gray-50 p-2.5 text-gray-900 focus:ring-nss-gold focus:border-nss-gold outline-none transition-colors" required autocomplete="off" placeholder="Enter username">
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="password" name="password" class="pl-10 block w-full rounded-lg border-gray-300 border bg-gray-50 p-2.5 text-gray-900 focus:ring-nss-gold focus:border-nss-gold outline-none transition-colors" required autocomplete="off" placeholder="••••••••">
                </div>
            </div>
            
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-nss-navy hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-nss-navy transition-colors">
                Secure Login
            </button>
        </form>
        
        <div class="mt-8 pt-6 border-t border-gray-100 text-center text-xs text-gray-400">
            &copy; <?= date('Y') ?> NSS College Rajakumari.
        </div>
    </div>
    
</body>
</html>
