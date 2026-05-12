<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We'll be back soon!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
        .animate-fade-in { 
            animation: fade-in 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="min-h-screen bg-slate-950 flex flex-col items-center justify-center relative overflow-hidden text-white selection:bg-purple-500 selection:text-white">

    <!-- Abstract Background -->
    <div class="absolute top-1/4 -left-1/4 w-[800px] h-[800px] bg-purple-600/10 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-1/4 -right-1/4 w-[600px] h-[600px] bg-pink-600/10 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="relative z-10 max-w-2xl px-6 text-center animate-fade-in">
        <div class="w-24 h-24 bg-slate-900 rounded-3xl flex items-center justify-center mx-auto mb-10 border border-slate-800 shadow-2xl">
            <svg class="w-10 h-10 text-purple-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6">
            System <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Offline</span>
        </h1>
        
        <p class="text-xl text-slate-400 font-medium leading-relaxed max-w-lg mx-auto">
            The portfolio is currently undergoing scheduled maintenance to improve your experience. We'll be back online shortly.
        </p>

        <div class="mt-12 text-[10px] font-black uppercase tracking-widest text-slate-600">
            &copy; {{ date('Y') }} All Rights Reserved.
        </div>
    </div>
</body>
</html>
