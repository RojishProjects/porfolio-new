<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} — Project by {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }} | Tech & IT Developer</title>
    <meta name="description" content="{{ Str::limit(strip_tags($project->description), 155) }}">
    <meta name="keywords" content="{{ implode(', ', $project->tags ?? []) }}, {{ $project->title }}, Rojish Bhurtel, Developer Kawasoti, IT Developer Nepal, Laravel Developer Nepal">
    <meta name="author" content="{{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="theme-color" content="#020617">
    <link rel="canonical" href="{{ route('project.show', $project) }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('project.show', $project) }}">
    <meta property="og:title" content="{{ $project->title }} — Project by {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($project->description), 155) }}">
    <meta property="og:image" content="{{ asset($project->image) }}">
    <meta property="og:image:alt" content="{{ $project->title }} by {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}">
    <meta property="og:site_name" content="{{ $settings['hero_name'] ?? 'Rojish Bhurtel' }} Portfolio">
    <meta property="og:locale" content="en_US">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ route('project.show', $project) }}">
    <meta name="twitter:title" content="{{ $project->title }} | {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($project->description), 155) }}">
    <meta name="twitter:image" content="{{ asset($project->image) }}">
    <meta name="twitter:creator" content="@@rojishbhurtel">

    <!-- Structured Data -->
    <?php
    $projectSchema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'CreativeWork',
        'name'        => $project->title,
        'description' => Str::limit(strip_tags($project->description), 200),
        'url'         => route('project.show', $project),
        'image'       => asset($project->image),
        'author'      => [
            '@type' => 'Person',
            'name'  => $settings['hero_name'] ?? 'Rojish Bhurtel',
            'url'   => url('/'),
        ],
        'keywords'    => implode(', ', $project->tags ?? []),
    ];

    $breadcrumbSchema = [
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
            [
                '@type'    => 'ListItem',
                'position' => 3,
                'name'     => $project->title,
                'item'     => route('project.show', $project),
            ],
        ],
    ];
    ?>
    <script type="application/ld+json"><?php echo json_encode($projectSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?></script>
    <script type="application/ld+json"><?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?></script>

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

        .image-container img {
            user-select: none;
            -webkit-user-drag: none;
        }
    </style>
    @endverbatim
</head>
<body class="min-h-screen flex flex-col bg-slate-950 text-white selection:bg-purple-500 selection:text-white">

    <!-- Header & Navigation -->
    <header>
        <nav class="w-full sticky top-0 z-50 bg-slate-900/90 backdrop-blur-md shadow-lg border-b border-slate-800" aria-label="Project Breadcrumb Navigation">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-4">
                    <a href="{{ route('portfolio') }}" class="text-2xl font-black bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent hover:opacity-80 transition-opacity">
                        {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}
                    </a>
                    
                    <div class="flex items-center gap-3">
                        <a href="{{ route('projects.index') }}" class="flex items-center gap-2 text-gray-300 hover:text-white px-4 py-2 rounded-xl text-sm font-bold transition-all hover:bg-slate-800 border border-transparent hover:border-slate-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Back to Projects
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow w-full animate-fade-in">
        <!-- Hero Section -->
        <section class="w-full bg-slate-950 flex items-center justify-center py-12 md:py-20 px-4 relative overflow-hidden" aria-label="Project Preview">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-700/10 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-pink-700/10 rounded-full blur-[100px] pointer-events-none"></div>

            @if($project->image)
                <div class="relative z-10 max-w-4xl w-full mx-auto shadow-2xl rounded-2xl overflow-hidden group image-container">
                    <img
                        src="{{ asset($project->image) }}"
                        alt="{{ $project->title }} — Web & Software Project by {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}"
                        loading="lazy"
                        width="896"
                        height="504"
                        class="w-full h-auto block group-hover:scale-[1.01] transition-transform duration-700"
                        oncontextmenu="return false;"
                        draggable="false"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/20 to-transparent pointer-events-none"></div>
                </div>
            @else
                <div class="text-center py-20">
                    <div class="w-24 h-24 bg-slate-800 rounded-3xl flex items-center justify-center mx-auto mb-4 border border-slate-700">
                        <svg class="w-12 h-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <p class="text-slate-500 font-bold">No preview available</p>
                </div>
            @endif
        </section>

        <div class="h-px bg-slate-900"></div>

        <!-- Content -->
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <nav class="mb-8 text-xs font-semibold uppercase tracking-wider text-purple-400" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                    <li><span class="text-slate-600">/</span></li>
                    <li><a href="{{ route('projects.index') }}" class="hover:underline">Projects</a></li>
                    <li><span class="text-slate-600">/</span></li>
                    <li class="text-slate-300 truncate max-w-xs">{{ $project->title }}</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Main Info -->
                <div class="lg:col-span-2 space-y-8">
                    @if($project->category)
                        <div>
                            <span class="px-4 py-1.5 bg-purple-500/20 backdrop-blur-md rounded-full text-[10px] font-black text-purple-300 border border-purple-500/30 uppercase tracking-[0.2em]">
                                {{ $project->category }}
                            </span>
                        </div>
                    @endif

                    <h1 class="text-4xl md:text-6xl font-black text-white leading-tight tracking-tight">
                        {{ $project->title }}
                    </h1>

                    @if($project->description)
                        <div class="pt-8 border-t border-slate-900">
                            <h2 class="text-xs font-black uppercase tracking-[0.25em] text-slate-500 mb-6">Project Overview</h2>
                            <p class="text-gray-300 text-lg leading-relaxed font-medium whitespace-pre-wrap">{{ $project->description }}</p>
                        </div>
                    @endif

                    @if($project->tags && count($project->tags) > 0)
                        <div class="pt-8 border-t border-slate-900">
                            <h2 class="text-xs font-black uppercase tracking-[0.25em] text-slate-500 mb-6">Technologies & Skills</h2>
                            <div class="flex flex-wrap gap-3">
                                @foreach($project->tags as $tag)
                                    <span class="px-5 py-2.5 bg-slate-900 text-purple-300 text-xs font-bold uppercase tracking-wider rounded-xl border border-slate-800 hover:border-purple-500/50 transition-all">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <aside class="space-y-6">
                    <div class="bg-slate-900/50 backdrop-blur-sm rounded-3xl border border-slate-800 p-8 space-y-8 shadow-xl">
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 w-full py-5 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:scale-105 transition-all shadow-xl shadow-purple-500/20 active:scale-95">
                                <span>Visit Live Project</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        @endif

                        <div class="space-y-2">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Developer</p>
                            <p class="text-white font-bold">{{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}</p>
                            <p class="text-slate-500 text-xs">Kawasoti, Nawalpur, Nepal</p>
                        </div>

                        <div class="pt-6 border-t border-slate-800 space-y-2">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Status</p>
                            <p class="text-white font-bold">Completed</p>
                        </div>

                        @if($project->category)
                            <div class="pt-6 border-t border-slate-800 space-y-2">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Category</p>
                                <span class="text-purple-300 font-bold">{{ $project->category }}</span>
                            </div>
                        @endif
                    </div>

                    <a href="{{ route('projects.index') }}"
                       class="flex items-center justify-center gap-2 w-full py-5 text-xs font-black text-slate-400 uppercase tracking-widest hover:text-white bg-slate-900/50 hover:bg-slate-800 rounded-2xl border border-slate-800 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        All Projects
                    </a>
                </aside>
            </div>
        </div>
    </main>

    <footer class="mt-auto border-t border-slate-900 bg-slate-950 py-12" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 text-center space-y-4">
            <div class="flex justify-center flex-wrap gap-6 text-sm text-slate-400">
                <a href="{{ url('/') }}" class="hover:text-purple-400 transition-colors">Home</a>
                <a href="{{ route('projects.index') }}" class="hover:text-purple-400 transition-colors">All Projects</a>
                <a href="{{ route('designs.index') }}" class="hover:text-purple-400 transition-colors">Graphic Designs</a>
                <a href="{{ url('/#contact') }}" class="hover:text-purple-400 transition-colors">Contact Rojish</a>
            </div>
            <p class="text-slate-600 text-xs font-bold uppercase tracking-widest">&copy; {{ date('Y') }} {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }} &bull; Kawasoti, Nepal &bull; All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
</body>
</html>
