<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rojish Bhurtel - Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    keyframes: {
                        'fade-in': {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        'slide-in-right': {
                            '0%': { opacity: '0', transform: 'translateX(100px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        },
                        'scale-in': {
                            '0%': { opacity: '0', transform: 'scale(0.8)' },
                            '100%': { opacity: '1', transform: 'scale(1)' }
                        },
                        'float-fade': {
                            '0%, 100%': { opacity: '0', transform: 'scale(1) translate(0, 0)' },
                            '50%': { opacity: '0.7', transform: 'scale(1.1) translate(20px, -20px)' }
                        }
                    },
                    animation: {
                        'fade-in': 'fade-in 0.6s ease-out forwards',
                        'slide-in-right': 'slide-in-right 0.8s ease-out forwards',
                        'scale-in': 'scale-in 0.6s ease-out forwards',
                        'float-fade': 'float-fade 8s ease-in-out infinite'
                    }
                }
            }
        }
    </script>
    <style>
        .animate-delay-200 { animation-delay: 0.2s; }
        .animate-delay-400 { animation-delay: 0.4s; }
        .animate-delay-600 { animation-delay: 0.6s; }
        .animate-delay-800 { animation-delay: 0.8s; }
        .animate-delay-1000 { animation-delay: 1s; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0f172a;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #a855f7, #ec4899);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #9333ea, #db2777);
        }

        .skill-bar {
            transition: width 2s ease-out;
        }
        
        .skill-bar-container {
            animation-delay: var(--delay);
        }
        
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        
        .mobile-menu.open {
            transform: translateX(0);
        }

        /* Loading Screen Styles */
        #loader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: #050811;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.8s ease-out, visibility 0.8s;
        }

        .loader-content {
            position: relative;
            display: flex;
            flex-col;
            align-items: center;
        }

        .loader-circle {
            width: 80px;
            height: 80px;
            border: 4px solid rgba(168, 85, 247, 0.1);
            border-top-color: #a855f7;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .loader-logo {
            position: absolute;
            font-size: 1.5rem;
            font-weight: 900;
            color: white;
            animation: pulse-logo 1.5s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @keyframes pulse-logo {
            0%, 100% { opacity: 0.5; transform: scale(0.9); }
            50% { opacity: 1; transform: scale(1.1); }
        }

        body.loaded #loader {
            opacity: 0;
            visibility: hidden;
        }

        body.loaded {
            overflow: auto;
        }

        body:not(.loaded) {
            overflow: hidden;
        }

        /* Magnetic Card Effect */
        .magnetic-card {
            transition: transform 0.2s ease-out, box-shadow 0.2s ease-out;
        }
        
        /* Smooth Entrance */
        [data-animate] {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .reveal {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }


    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <div id="loader">
        <div class="loader-content">
            <div class="loader-circle"></div>
            <div class="loader-logo">RB</div>
        </div>
    </div>
    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        {{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}
                    </h1>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <button onclick="scrollToSection('#home')" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-purple-500/20">Home</button>
                    <button onclick="scrollToSection('#about')" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-purple-500/20">About Me</button>
                    <button onclick="scrollToSection('#skills')" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-purple-500/20">Skills</button>
                    <button onclick="scrollToSection('#designs')" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-purple-500/20">Designs</button>
                    <button onclick="scrollToSection('#projects')" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-purple-500/20">Projects</button>
                    <button onclick="scrollToSection('#contact')" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-purple-500/20">Contact</button>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button id="mobile-menu-btn" class="md:hidden text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden bg-slate-900/95 backdrop-blur-sm fixed top-16 left-0 w-full h-screen">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <button onclick="scrollToSection('#home')" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left transition-all duration-300 hover:bg-purple-500/20">Home</button>
                <button onclick="scrollToSection('#about')" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left transition-all duration-300 hover:bg-purple-500/20">About</button>
                <button onclick="scrollToSection('#skills')" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left transition-all duration-300 hover:bg-purple-500/20">Skills</button>
                <button onclick="scrollToSection('#designs')" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left transition-all duration-300 hover:bg-purple-500/20">Designs</button>
                <button onclick="scrollToSection('#projects')" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left transition-all duration-300 hover:bg-purple-500/20">Projects</button>
                <button onclick="scrollToSection('#contact')" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left transition-all duration-300 hover:bg-purple-500/20">Contact</button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 pt-16">
        <div class="max-w-7xl mx-auto w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="space-y-4">
                        <h2 class="text-lg text-purple-400 font-medium animate-slide-in-right animate-delay-200">Hello, I'm</h2>
                        <h1 class="text-5xl lg:text-7xl font-bold text-white leading-tight">
                            <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 bg-clip-text text-transparent animate-pulse">
                                {{ explode(' ', $settings['hero_name'] ?? 'Rojish')[0] }}
                            </span>
                            <br>
                            <span class="text-white">{{ str_replace(explode(' ', $settings['hero_name'] ?? 'Rojish Bhurtel')[0], '', $settings['hero_name'] ?? 'Rojish Bhurtel') }}</span>
                        </h1>
                        <div class="text-xl lg:text-3xl font-medium text-purple-300 min-h-[3rem]">
                            <span id="typing-text"></span><span class="animate-pulse">|</span>
                        </div>
                        <p class="text-lg text-gray-400 animate-fade-in animate-delay-400 max-w-lg">
                            {{ $settings['hero_tagline'] ?? 'Passionate about creating digital solutions and leading positive change' }}
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 animate-delay-600">
                        <button onclick="scrollToSection('#projects')" class="px-8 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg font-medium hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-purple-500/25">
                            View My Work
                        </button>
                        <button onclick="scrollToSection('#contact')" class="px-8 py-3 border-2 border-purple-400 text-purple-400 rounded-lg font-medium hover:bg-purple-400 hover:text-white transition-all duration-300">
                            Get In Touch
                        </button>
                    </div>
                </div>
                <div class="flex justify-center lg:justify-end animate-scale-in animate-delay-800">
                    <div class="relative">
                        <div class="w-80 h-80 lg:w-96 lg:h-96 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 p-1.5 animate-pulse relative z-10">
                            <div class="w-full h-full rounded-full bg-slate-900 flex items-center justify-center p-3 lg:p-4">
                                <div class="w-full h-full rounded-full border-2 border-white/10 overflow-hidden shadow-inner">
                                    <img src="{{ isset($settings['hero_image']) ? asset($settings['hero_image']) : asset('IMG_20241005_031308.jpg') }}" 
                                         alt="{{ $settings['hero_name'] ?? 'Rojish Bhurtel' }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                        <!-- Decorative Floating Circles -->
                        <div class="absolute -top-4 -right-4 w-20 h-20 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full animate-bounce z-0"></div>
                        <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-gradient-to-r from-green-400 to-blue-400 rounded-full animate-bounce z-0" style="animation-delay: 0.5s;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16  " data-animate>
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                    About <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Me</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    {{ $settings['about_summary'] ?? 'A multi-faceted professional passionate about technology, leadership, and creative marketing solutions.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @foreach($about_roles as $index => $role)
                <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 hover:bg-slate-800/70 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/20  " data-animate data-delay="{{ ($index + 1) * 200 }}">
                    <div class="flex items-center mb-6">
                        <div class="p-3 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white">{{ $role->title }}</h3>
                    </div>
                    
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        {{ $role->description }}
                    </p>
                    
                    @if($role->key_areas)
                    <div class="space-y-2">
                        <h4 class="text-purple-400 font-semibold">Key Areas:</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($role->key_areas as $area)
                            <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-sm hover:bg-purple-500/30 transition-colors duration-300">{{ $area }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            <!-- Stats Section -->
            <div class="mt-24 grid grid-cols-2 lg:grid-cols-4 gap-8" data-animate>
                <div class="text-center p-8 bg-white/5 rounded-3xl border border-white/10 hover:bg-white/10 transition-colors group">
                    <div class="text-4xl lg:text-5xl font-extrabold text-white mb-2 counter" data-target="{{ $settings['stats_projects'] ?? '50' }}">0</div>
                    <div class="text-purple-400 font-bold uppercase tracking-widest text-xs group-hover:text-pink-400 transition-colors">Projects Done</div>
                </div>
                <div class="text-center p-8 bg-white/5 rounded-3xl border border-white/10 hover:bg-white/10 transition-colors group">
                    <div class="text-4xl lg:text-5xl font-extrabold text-white mb-2 counter" data-target="{{ $settings['stats_clients'] ?? '15' }}">0</div>
                    <div class="text-purple-400 font-bold uppercase tracking-widest text-xs group-hover:text-pink-400 transition-colors">Happy Clients</div>
                </div>
                <div class="text-center p-8 bg-white/5 rounded-3xl border border-white/10 hover:bg-white/10 transition-colors group">
                    <div class="text-4xl lg:text-5xl font-extrabold text-white mb-2 counter" data-target="{{ $settings['stats_experience'] ?? '5' }}">0</div>
                    <div class="text-purple-400 font-bold uppercase tracking-widest text-xs group-hover:text-pink-400 transition-colors">Years Exp.</div>
                </div>
                <div class="text-center p-8 bg-white/5 rounded-3xl border border-white/10 hover:bg-white/10 transition-colors group">
                    <div class="text-4xl lg:text-5xl font-extrabold text-white mb-2 counter" data-target="{{ $settings['stats_certifications'] ?? '10' }}">0</div>
                    <div class="text-purple-400 font-bold uppercase tracking-widest text-xs group-hover:text-pink-400 transition-colors">Certifications</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 px-4 sm:px-6 lg:px-8 bg-slate-800/30">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16  " data-animate>
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                    My <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Skills</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    A comprehensive overview of my technical and soft skills across different domains.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @foreach($skills as $category => $categorySkills)
                <div class="bg-slate-900/50 backdrop-blur-sm rounded-xl p-8 hover:bg-slate-900/70 transition-all duration-300  " data-animate data-delay="{{ $loop->iteration * 200 }}">
                    <h3 class="text-2xl font-bold text-white mb-6 text-center">{{ $category }}</h3>
                    <div class="space-y-6">
                        @foreach($categorySkills as $skill)
                        <div class="space-y-2">
                            <div class="flex justify-between items-center px-1">
                                <span class="text-gray-300 font-medium">{{ $skill->name }}</span>
                                <span class="text-purple-400 text-sm">{{ $skill->percentage }}%</span>
                            </div>
                            <div class="w-full bg-slate-700/50 rounded-full h-2">
                                <div class="skill-bar bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full" data-width="{{ $skill->percentage }}"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Graphic Design Section -->
    <section id="designs" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-animate>
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4">Graphic Design Showcase</h2>
                <div class="h-1.5 w-24 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full"></div>
                <p class="mt-6 text-gray-400 text-lg max-w-2xl mx-auto italic">"Visualizing ideas through creative precision and bold aesthetics."</p>
            </div>

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
            <div class="text-center py-20 bg-slate-800/20 rounded-3xl border border-dashed border-slate-700">
                <p class="text-gray-500 text-lg font-medium">Design projects coming soon...</p>
            </div>
            @endif

            @if(isset($totalDesigns) && $totalDesigns > 6)
            <div class="text-center mt-12" data-animate>
                <a href="{{ route('designs.index') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-slate-800 hover:bg-slate-700 text-white rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-purple-500/20 group">
                    See All Designs
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-animate>
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4">My Projects</h2>
                <div class="h-1.5 w-24 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full"></div>
                <p class="mt-6 text-gray-400 text-lg max-w-2xl mx-auto italic">"Turning complex problems into elegant, functional digital solutions."</p>
            </div>

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
            <div class="text-center py-20 bg-slate-800/20 rounded-3xl border border-dashed border-slate-700">
                <p class="text-gray-500 text-lg font-medium">Projects coming soon...</p>
            </div>
            @endif

            @if(isset($totalProjects) && $totalProjects > 6)
            <div class="text-center mt-12" data-animate>
                <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-slate-800 hover:bg-slate-700 text-white rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-purple-500/20 group">
                    See All Projects
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-4 sm:px-6 lg:px-8 bg-slate-800/30">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16  " data-animate>
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                    Get In <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Touch</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Ready to start a conversation? I'd love to hear from you.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="space-y-8  " data-animate data-delay="200">
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-6">Let's Connect</h3>
                        <p class="text-gray-300 mb-8 leading-relaxed">
                            Whether you're looking for a developer, need leadership guidance, or want to discuss marketing strategies, 
                            I'm here to help bring your ideas to life.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center space-x-4 p-4 bg-slate-900/50 rounded-lg hover:bg-slate-900/70 transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">📧</span>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold">Email</h4>
                                <p class="text-gray-300">{{ $settings['contact_email'] ?? 'rojish.bhurtel@example.com' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 p-4 bg-slate-900/50 rounded-lg hover:bg-slate-900/70 transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">📱</span>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold">Phone</h4>
                                <p class="text-gray-300">{{ $settings['contact_phone'] ?? '+977 98XXXXXXXX' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 p-4 bg-slate-900/50 rounded-lg hover:bg-slate-900/70 transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">📍</span>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold">Location</h4>
                                <p class="text-gray-300">{{ $settings['contact_location'] ?? 'Kathmandu, Nepal' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" " data-animate data-delay="400">
                    <form id="contact-form" class="space-y-6">
                        @csrf
                        <div id="form-message" class="hidden px-4 py-3 rounded-lg text-sm font-medium transition-all duration-300"></div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name</label>
                                <input type="text" id="name" name="name" required class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300" placeholder="Your Name">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300" placeholder="your@email.com">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-300 mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" required class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300" placeholder="What's this about?">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Message</label>
                            <textarea id="message" name="message" required rows="6" class="w-full px-4 py-3 bg-slate-900/50 border border-slate-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 resize-none" placeholder="Tell me about your project or idea..."></textarea>
                        </div>

                        <button type="submit" class="w-full px-8 py-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg font-medium hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-purple-500/25">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative py-12 overflow-hidden">
        <!-- Stylish Background Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-purple-500/20 to-transparent"></div>
        <div class="absolute inset-0 bg-[#020408]"></div>
        <div class="absolute -bottom-24 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-purple-600/10 rounded-full blur-[100px]"></div>
        
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
            <p class="text-slate-400 text-sm font-medium tracking-[0.1em]">
                {!! $settings['footer_text'] ?? '&copy; ' . date('Y') . ' ' . ($settings['hero_name'] ?? 'Rojish Bhurtel') . ' &bull; All Rights Reserved' !!}
            </p>
        </div>
    </footer>

    <script>
        // Smooth scrolling function
        function scrollToSection(selector) {
            const element = document.querySelector(selector);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
                // Close mobile menu if open
                const mobileMenu = document.getElementById('mobile-menu');
                mobileMenu.classList.remove('open');
            }
        }

        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('open');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-slate-900/95', 'backdrop-blur-sm', 'shadow-lg');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-slate-900/95', 'backdrop-blur-sm', 'shadow-lg');
                navbar.classList.add('bg-transparent');
            }
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all elements with data-animate attribute
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loader
            window.addEventListener('load', function() {
                setTimeout(() => {
                    document.body.classList.add('loaded');
                    // Start typing animation after loader is gone
                    startTyping();
                }, 500);
            });

            const animateElements = document.querySelectorAll('[data-animate]');
            animateElements.forEach(el => {
                const delay = el.getAttribute('data-delay') || '0';
                el.style.transitionDelay = delay + 'ms';
                observer.observe(el);
            });

            // Intersection Observer for revealing elements
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('[data-animate]').forEach(el => revealObserver.observe(el));

            // Typing Animation
            const typingText = document.getElementById('typing-text');
            const roles = ['Developer', 'Youth Leader', 'Marketer', 'Professional Designer'];
            let roleIndex = 0;
            let charIndex = 0;
            let isDeleting = false;

            function startTyping() {
                const currentRole = roles[roleIndex];
                
                if (isDeleting) {
                    typingText.textContent = currentRole.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    typingText.textContent = currentRole.substring(0, charIndex + 1);
                    charIndex++;
                }

                let typeSpeed = isDeleting ? 50 : 100;

                if (!isDeleting && charIndex === currentRole.length) {
                    typeSpeed = 2000; // Wait at end
                    isDeleting = true;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    roleIndex = (roleIndex + 1) % roles.length;
                    typeSpeed = 500;
                }

                setTimeout(startTyping, typeSpeed);
            }



            // Magnetic Card Effect
            const cards = document.querySelectorAll('.magnetic-card');
            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    
                    card.style.transform = `scale(1.02) translateX(${x * 0.1}px) translateY(${y * 0.1}px)`;
                    card.style.boxShadow = `${-x * 0.2}px ${-y * 0.2}px 50px rgba(168, 85, 247, 0.2)`;
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = '';
                    card.style.boxShadow = '';
                });
            });

            // Counter Animation
            const counters = document.querySelectorAll('.counter');
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = +entry.target.getAttribute('data-target');
                        const count = +entry.target.innerText;
                        const increment = target / 50;

                        const updateCount = () => {
                            const current = +entry.target.innerText;
                            if (current < target) {
                                entry.target.innerText = Math.ceil(current + increment);
                                setTimeout(updateCount, 40);
                            } else {
                                entry.target.innerText = target + '+';
                            }
                        };
                        updateCount();
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 1 });

            counters.forEach(counter => counterObserver.observe(counter));

            // Animate skill bars when they come into view
            const skillBars = document.querySelectorAll('.skill-bar');
            const skillObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const bar = entry.target;
                        const width = bar.getAttribute('data-width');
                        setTimeout(() => {
                            bar.style.width = width + '%';
                        }, 500);
                    }
                });
            }, observerOptions);

            skillBars.forEach(bar => {
                bar.style.width = '0%';
                skillObserver.observe(bar);
            });
        });

        // Contact form submission
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerText;
            submitBtn.innerText = 'Sending...';
            submitBtn.disabled = true;

            const formData = new FormData(this);
            const messageBox = document.getElementById('form-message');
            messageBox.classList.remove('hidden', 'bg-green-500/20', 'text-green-300', 'bg-red-500/20', 'text-red-300');

            fetch('{{ route('contact.store') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                messageBox.classList.add('bg-green-500/20', 'text-green-300');
                messageBox.innerText = data.success ? data.message : 'Your message was sent successfully!';
                this.reset();
            })
            .catch(error => {
                console.error('Error:', error);
                messageBox.classList.add('bg-red-500/20', 'text-red-300');
                messageBox.innerText = 'An error occurred. Please try again later.';
            })
            .finally(() => {
                messageBox.classList.remove('hidden');
                submitBtn.innerText = originalText;
                submitBtn.disabled = false;
                setTimeout(() => messageBox.classList.add('hidden'), 5000);
            });
        });
    </script>
</body>
</html>
