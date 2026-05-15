<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $design->title }} | Rojish Bhurtel Design</title>
    <meta name="description" content="{{ Str::limit($design->description, 160) }}">
    <meta property="og:title" content="{{ $design->title }} | Rojish Bhurtel">
    <meta property="og:description" content="{{ Str::limit($design->description, 160) }}">
    <meta property="og:image" content="{{ asset($design->image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }

        .animate-fade-in { 
            animation: fade-in 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .image-container img {
            user-select: none;
            -webkit-user-drag: none;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-slate-950 text-white selection:bg-purple-500 selection:text-white">

    <!-- Navbar -->
    <nav class="w-full sticky top-0 z-50 bg-slate-900/90 backdrop-blur-md shadow-lg border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4">
                <a href="{{ route('portfolio') }}" class="text-2xl font-black bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent hover:opacity-80 transition-opacity">
                    {{ $settings['hero_name'] ?? 'Portfolio' }}
                </a>
                
                <a href="{{ route('portfolio') }}#designs" class="flex items-center gap-2 text-gray-300 hover:text-white px-4 py-2 rounded-xl text-sm font-bold transition-all hover:bg-slate-800 border border-transparent hover:border-slate-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Designs
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-grow w-full animate-fade-in">

        <!-- Hero Section -->
        <section class="w-full bg-slate-950 flex items-center justify-center py-12 md:py-20 px-4 relative overflow-hidden">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-700/10 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-pink-700/10 rounded-full blur-[100px] pointer-events-none"></div>

            @if($design->image)
                <div class="relative z-10 max-w-4xl w-full mx-auto shadow-2xl rounded-2xl overflow-hidden group image-container">
                    <img
                        src="{{ $design->image }}"
                        alt="{{ $design->title }}"
                        loading="lazy"
                        class="w-full h-auto block select-none group-hover:scale-[1.01] transition-transform duration-700"
                        oncontextmenu="return false;"
                        draggable="false"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/20 to-transparent pointer-events-none"></div>
                </div>
            @else
                <div class="text-center py-20">
                    <div class="w-24 h-24 bg-slate-800 rounded-3xl flex items-center justify-center mx-auto mb-4 border border-slate-700">
                        <svg class="w-12 h-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-slate-500 font-bold">No image available</p>
                </div>
            @endif
        </section>

        <div class="h-px bg-slate-900"></div>

        <!-- Content -->
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <!-- Main Info -->
                <div class="lg:col-span-2 space-y-8">
                    @if($design->category)
                        <div>
                            <span class="px-4 py-1.5 bg-purple-500/20 backdrop-blur-md rounded-full text-[10px] font-black text-purple-300 border border-purple-500/30 uppercase tracking-[0.2em]">
                                {{ $design->category }}
                            </span>
                        </div>
                    @endif

                    <h1 class="text-4xl md:text-6xl font-black text-white leading-tight tracking-tight">
                        {{ $design->title }}
                    </h1>

                    @if($design->description)
                        <div class="pt-8 border-t border-slate-900">
                            <h2 class="text-xs font-black uppercase tracking-[0.25em] text-slate-500 mb-6">Concept & Narrative</h2>
                            <p class="text-gray-300 text-lg leading-relaxed font-medium whitespace-pre-wrap">{{ $design->description }}</p>
                        </div>
                    @endif

                    @if($design->tools && count($design->tools) > 0)
                        <div class="pt-8 border-t border-slate-900">
                            <h2 class="text-xs font-black uppercase tracking-[0.25em] text-slate-500 mb-6">Tools Used</h2>
                            <div class="flex flex-wrap gap-3">
                                @foreach($design->tools as $tool)
                                    <span class="px-5 py-2.5 bg-slate-900 text-purple-300 text-xs font-bold uppercase tracking-wider rounded-xl border border-slate-800 hover:border-purple-500/50 transition-all">
                                        {{ $tool }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <aside class="space-y-6">
                    <div class="bg-slate-900/50 backdrop-blur-sm rounded-3xl border border-slate-800 p-8 space-y-8 shadow-xl">
                        <div class="space-y-2">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Added</p>
                            <p class="text-white font-bold">{{ $design->created_at->format('d M Y') }}</p>
                            <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest">{{ $design->created_at->diffForHumans() }}</p>
                        </div>

                        @if($design->category)
                            <div class="pt-6 border-t border-slate-800 space-y-2">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Category</p>
                                <span class="text-purple-300 font-bold">{{ $design->category }}</span>
                            </div>
                        @endif
                    </div>

                    <a href="{{ route('portfolio') }}#designs"
                       class="flex items-center justify-center gap-2 w-full py-5 text-xs font-black text-slate-400 uppercase tracking-widest hover:text-white bg-slate-900/50 hover:bg-slate-800 rounded-2xl border border-slate-800 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        All Designs
                    </a>
                </aside>
            </div>
        </div>
    </main>

    <footer class="mt-auto border-t border-slate-900 bg-slate-950 py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-slate-600 text-sm font-bold uppercase tracking-widest">&copy; {{ date('Y') }} {{ $settings['hero_name'] ?? 'Portfolio' }}.</p>
        </div>
    </footer>
</body>
</html>
