<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Page Not Found | Rojish Bhurtel Portfolio</title>
    <meta name="robots" content="noindex, follow">
    <meta name="theme-color" content="#020617">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @verbatim
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
        .animate-fade-in { 
            animation: fade-in 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
    @endverbatim
</head>
<body class="min-h-screen bg-slate-950 flex flex-col items-center justify-center relative overflow-hidden text-white selection:bg-purple-500 selection:text-white p-6">

    <!-- Abstract Background Glows -->
    <div class="absolute top-1/4 -left-1/4 w-[800px] h-[800px] bg-purple-600/10 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-1/4 -right-1/4 w-[600px] h-[600px] bg-pink-600/10 rounded-full blur-[100px] pointer-events-none"></div>

    <main class="relative z-10 max-w-xl text-center animate-fade-in space-y-6">
        <div class="inline-block p-4 rounded-3xl bg-slate-900 border border-slate-800 shadow-2xl mb-2">
            <span class="text-6xl font-black bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 bg-clip-text text-transparent">404</span>
        </div>
        
        <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight">
            Page <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Not Found</span>
        </h1>
        
        <p class="text-slate-400 text-base md:text-lg leading-relaxed">
            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
            <a href="/" class="w-full sm:w-auto px-8 py-3.5 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-xl font-bold hover:scale-105 transition-all shadow-lg shadow-purple-500/25">
                Back to Homepage
            </a>
            <a href="/projects" class="w-full sm:w-auto px-8 py-3.5 bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-300 hover:text-white rounded-xl font-bold transition-all">
                Explore Projects
            </a>
        </div>

        <div class="pt-8 text-xs text-slate-600 font-medium">
            Rojish Bhurtel &bull; Tech Developer &bull; Kawasoti, Nepal
        </div>
    </main>
</body>
</html>
