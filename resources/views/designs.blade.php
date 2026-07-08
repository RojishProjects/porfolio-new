<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic Designs — {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }} | Portfolio</title>
    <meta name="description" content="Explore the graphic design gallery of {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}, showcasing creative visual artwork, UI/UX designs, and more.">
    <meta name="keywords" content="Rojish Bhurtel Designs, Graphic Design Kawasoti, UI/UX Design, Visual Artwork">
    <meta name="author" content="{{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#020617">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Graphic Designs — {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}">
    <meta property="og:description" content="Explore the graphic design gallery of {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}, showcasing creative visual artwork, UI/UX designs, and more.">
    <meta property="og:image" content="{{ asset($settings['hero_image'] ?? 'IMG_20241005_031308.jpg') }}">
    <meta property="og:site_name" content="{{ $settings['hero_name'] ?? 'Rojish Bhurtel' }} Portfolio">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Graphic Designs — {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}">
    <meta name="twitter:description" content="Explore the graphic design gallery of {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}, showcasing creative visual artwork, UI/UX designs, and more.">
    <meta name="twitter:image" content="{{ asset($settings['hero_image'] ?? 'IMG_20241005_031308.jpg') }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ url('/') }}"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "Designs",
        "item": "{{ url('/designs') }}"
      }]
    }
    </script>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"></noscript>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>
<body class="min-h-screen bg-slate-950 text-white selection:bg-purple-500 selection:text-white">

    <!-- Navbar -->
    <nav class="w-full sticky top-0 z-50 bg-slate-900/90 backdrop-blur-md shadow-lg border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4">
                <a href="{{ route('portfolio') }}" class="text-2xl font-black bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent hover:opacity-80 transition-opacity">
                    {{ $settings['hero_name'] ?? 'Portfolio' }}
                </a>
                
                <a href="{{ route('portfolio') }}#designs" class="flex items-center gap-2 text-gray-300 hover:text-white px-4 py-2 rounded-xl text-sm font-bold transition-all hover:bg-slate-800 border border-transparent hover:border-slate-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Home
                </a>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-700/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-pink-700/10 rounded-full blur-[100px] pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto relative z-10 text-center animate-fade-in">
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 tracking-tight">Design Gallery</h1>
            <div class="h-1.5 w-24 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full mb-8"></div>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto font-medium">A complete collection of my visual artwork and design projects.</p>
        </div>
    </section>

    <!-- Designs Grid -->
    <section class="pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($designs as $index => $design)
                    <x-portfolio-card 
                        :item="$design" 
                        route="design.show" 
                        :index="$index" 
                        :details="$design->tools ?? []"
                    />
                @endforeach
            </div>

            @if($designs->isEmpty())
            <div class="text-center py-20 bg-slate-900 rounded-3xl border border-dashed border-slate-800">
                <p class="text-gray-500 text-lg font-medium">No graphic designs found.</p>
            </div>
            @endif
        </div>
    </section>

    <footer class="mt-auto border-t border-slate-900 bg-slate-950 py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-slate-600 text-sm font-bold uppercase tracking-widest">{!! $settings['footer_text'] ?? '&copy; ' . date('Y') . ' ' . ($settings['hero_name'] ?? 'Portfolio') . ' &bull; All Rights Reserved' !!}</p>
        </div>
    </footer>
</body>
</html>
