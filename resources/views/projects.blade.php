<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software & Web Projects — {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }} | Tech & IT Developer · Kawasoti</title>
    <meta name="description" content="Explore software development, web applications, and digital solutions built by {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}, a Full Stack Developer & Generative AI Specialist based in Kawasoti, Nepal.">
    <meta name="keywords" content="Rojish Bhurtel Projects, Developer Projects Nepal, Tech Portfolio Kawasoti, Full Stack Developer Kawasoti, Laravel Projects Nepal, Web Applications Kawasoti, Software Engineer Nepal">
    <meta name="author" content="{{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="theme-color" content="#020617">
    <link rel="canonical" href="{{ route('projects.index') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('projects.index') }}">
    <meta property="og:title" content="Software & Web Projects — {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}">
    <meta property="og:description" content="View all web development and software engineering projects by {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}, a Tech Developer based in Kawasoti, Nepal.">
    <meta property="og:image" content="{{ asset($settings['hero_image'] ?? 'IMG_20241005_031308.jpg') }}">
    <meta property="og:site_name" content="{{ $settings['hero_name'] ?? 'Rojish Bhurtel' }} Portfolio">
    <meta property="og:locale" content="en_US">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ route('projects.index') }}">
    <meta name="twitter:title" content="Software & Web Projects — {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}">
    <meta name="twitter:description" content="Explore development projects and software solutions by {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }} from Kawasoti, Nepal.">
    <meta name="twitter:image" content="{{ asset($settings['hero_image'] ?? 'IMG_20241005_031308.jpg') }}">
    <meta name="twitter:creator" content="@@rojishbhurtel">

    <!-- Structured Data -->
    <?php
    $breadcrumbJson = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type'    => 'ListItem',
                'position' => 1,
                'name'     => 'Home',
                'item'     => url('/'),
            ],
            [
                '@type'    => 'ListItem',
                'position' => 2,
                'name'     => 'Projects',
                'item'     => route('projects.index'),
            ],
        ],
    ];
    $collectionJson = [
        '@context'    => 'https://schema.org',
        '@type'       => 'CollectionPage',
        'name'        => 'Software & Web Projects — ' . ($settings['hero_name'] ?? 'Rojish Bhurtel'),
        'description' => 'A complete collection of web applications and digital solutions built by ' . ($settings['hero_name'] ?? 'Rojish Bhurtel') . ' from Kawasoti, Nepal.',
        'url'         => route('projects.index'),
        'author'      => [
            '@type' => 'Person',
            'name'  => $settings['hero_name'] ?? 'Rojish Bhurtel',
            'url'   => url('/'),
        ],
    ];
    ?>
    <script type="application/ld+json"><?php echo json_encode($breadcrumbJson, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?></script>
    <script type="application/ld+json"><?php echo json_encode($collectionJson, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?></script>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"></noscript>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @verbatim
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
    @endverbatim
</head>
<body class="min-h-screen flex flex-col bg-slate-950 text-white selection:bg-purple-500 selection:text-white">

    <!-- Header & Navigation -->
    <header>
        <nav class="w-full sticky top-0 z-50 bg-slate-900/90 backdrop-blur-md shadow-lg border-b border-slate-800" aria-label="Breadcrumb Navigation">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-4">
                    <a href="{{ route('portfolio') }}" class="text-2xl font-black bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent hover:opacity-80 transition-opacity">
                        {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}
                    </a>
                    
                    <div class="flex items-center gap-3">
                        <a href="{{ route('designs.index') }}" class="hidden sm:inline-flex items-center gap-1 text-gray-400 hover:text-white px-3 py-2 rounded-xl text-sm font-medium transition-all hover:bg-slate-800">
                            View Designs
                        </a>
                        <a href="{{ route('portfolio') }}" class="flex items-center gap-2 text-gray-300 hover:text-white px-4 py-2 rounded-xl text-sm font-bold transition-all hover:bg-slate-800 border border-transparent hover:border-slate-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow">
        <!-- Header Section -->
        <section class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-700/10 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-pink-700/10 rounded-full blur-[100px] pointer-events-none"></div>
            
            <div class="max-w-7xl mx-auto relative z-10 text-center animate-fade-in">
                <nav class="flex justify-center mb-4 text-xs font-semibold uppercase tracking-wider text-purple-400" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-2">
                        <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                        <li><span class="text-slate-600">/</span></li>
                        <li class="text-slate-300">Projects</li>
                    </ol>
                </nav>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 tracking-tight">Software & Web Projects — {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}</h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full mb-8"></div>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto font-medium">A complete collection of web applications, custom systems, and digital software solutions built from Kawasoti, Nepal.</p>
            </div>
        </section>

        <!-- Projects Grid -->
        <section class="pb-24 px-4 sm:px-6 lg:px-8" aria-label="Projects list">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($projects as $index => $project)
                        <x-portfolio-card 
                            :item="$project" 
                            route="project.show" 
                            :index="$index" 
                            :details="$project->tags ?? []"
                        />
                    @endforeach
                </div>

                @if($projects->isEmpty())
                <div class="text-center py-20 bg-slate-900 rounded-3xl border border-dashed border-slate-800">
                    <p class="text-gray-500 text-lg font-medium">No projects found at this time.</p>
                </div>
                @endif
            </div>
        </section>
    </main>

    <footer class="mt-auto border-t border-slate-900 bg-slate-950 py-12" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 text-center space-y-4">
            <div class="flex justify-center flex-wrap gap-6 text-sm text-slate-400">
                <a href="{{ url('/') }}" class="hover:text-purple-400 transition-colors">Home</a>
                <a href="{{ route('designs.index') }}" class="hover:text-purple-400 transition-colors">Designs</a>
                <a href="{{ url('/#about') }}" class="hover:text-purple-400 transition-colors">About Rojish</a>
                <a href="{{ url('/#skills') }}" class="hover:text-purple-400 transition-colors">Skills</a>
                <a href="{{ url('/#contact') }}" class="hover:text-purple-400 transition-colors">Contact</a>
            </div>
            <p class="text-slate-600 text-xs font-bold uppercase tracking-widest">{!! $settings['footer_text'] ?? '&copy; ' . date('Y') . ' ' . ($settings['hero_name'] ?? 'Rojish Bhurtel') . ' &bull; Kawasoti, Nepal &bull; All Rights Reserved' !!}</p>
        </div>
    </footer>
</body>
</html>
</body>
</html>
