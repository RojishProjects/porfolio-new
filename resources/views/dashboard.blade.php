
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Admin Overview') }}
                </h2>
                <p class="text-sm text-slate-500 mt-1 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                    Monitor and manage your portfolio performance.
                </p>
            </div>
            <div class="flex items-center gap-4 bg-white p-2 rounded-2xl shadow-sm border border-slate-100">
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-green-50 text-green-700 border border-green-100">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    <span class="text-xs font-bold tracking-wide uppercase">System Live</span>
                </div>
                <div class="h-8 w-px bg-slate-200"></div>
                <div class="flex flex-col items-end px-2">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Current Date</p>
                    <p class="text-sm font-black text-slate-700">{{ now()->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="space-y-10 pb-10">
        <!-- Welcome Section -->
        <div class="relative overflow-hidden bg-slate-900 rounded-[2rem] p-8 md:p-12 text-white shadow-2xl shadow-slate-200">
            <div class="relative z-10 max-w-2xl">
                <h3 class="text-4xl font-black mb-4 leading-tight">Welcome back, <span class="bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">{{ explode(' ', Auth::user()->name)[0] }}!</span></h3>
                <p class="text-slate-400 text-lg mb-8 leading-relaxed">Your professional portfolio is currently active and reaching visitors. Here's a quick look at your current standing and recent activities.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-slate-900 rounded-xl font-bold shadow-lg hover:bg-slate-50 hover:-translate-y-1 transition-all duration-300">
                        View Live Site
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-800 text-white border border-slate-700 rounded-xl font-bold hover:bg-slate-700 transition-all duration-300">
                        Quick Settings
                    </a>
                </div>
            </div>
            <!-- Abstract background shape -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-purple-600/10 rounded-full blur-3xl"></div>
            <svg class="absolute bottom-0 right-0 w-64 h-64 text-slate-800 opacity-20 pointer-events-none" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
        </div>

        <!-- Dashboard Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Projects Card -->
            <div class="group bg-white p-2 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-2xl hover:shadow-indigo-500/10 transition-all duration-500">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-8">
                        <div class="p-4 bg-indigo-50 text-indigo-600 rounded-[1.25rem] group-hover:bg-indigo-600 group-hover:text-white transition-all duration-500 shadow-sm group-hover:shadow-indigo-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <span class="text-[10px] font-black tracking-widest text-indigo-400 bg-indigo-50 px-3 py-1 rounded-full uppercase">Develop</span>
                    </div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-[0.2em]">Total Projects</p>
                    <h3 class="text-4xl font-black text-slate-900 mt-2 tracking-tight group-hover:scale-110 origin-left transition-transform duration-500">{{ $stats['projects_count'] }}</h3>
                    <div class="mt-8 flex items-center justify-between">
                        <a href="{{ route('admin.projects.index') }}" class="text-sm font-extrabold text-indigo-600 flex items-center gap-1 group/link">
                            Explore
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        <div class="w-10 h-1 bg-indigo-100 rounded-full overflow-hidden">
                            <div class="w-1/2 h-full bg-indigo-600"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Designs Card -->
            <div class="group bg-white p-2 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-2xl hover:shadow-purple-500/10 transition-all duration-500">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-8">
                        <div class="p-4 bg-purple-50 text-purple-600 rounded-[1.25rem] group-hover:bg-purple-600 group-hover:text-white transition-all duration-500 shadow-sm group-hover:shadow-purple-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="text-[10px] font-black tracking-widest text-purple-400 bg-purple-50 px-3 py-1 rounded-full uppercase">Creative</span>
                    </div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-[0.2em]">Graphic Designs</p>
                    <h3 class="text-4xl font-black text-slate-900 mt-2 tracking-tight group-hover:scale-110 origin-left transition-transform duration-500">{{ $stats['designs_count'] }}</h3>
                    <div class="mt-8 flex items-center justify-between">
                        <a href="{{ route('admin.designs.index') }}" class="text-sm font-extrabold text-purple-600 flex items-center gap-1 group/link">
                            Gallery
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        <div class="w-10 h-1 bg-purple-100 rounded-full overflow-hidden">
                            <div class="w-3/4 h-full bg-purple-600"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages Card -->
            <div class="group bg-white p-2 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-2xl hover:shadow-pink-500/10 transition-all duration-500">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-8">
                        <div class="p-4 bg-pink-50 text-pink-600 rounded-[1.25rem] group-hover:bg-pink-600 group-hover:text-white transition-all duration-500 shadow-sm group-hover:shadow-pink-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        @if($stats['messages_unread'] > 0)
                            <span class="animate-pulse inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black bg-pink-500 text-white uppercase tracking-tighter">New Alert</span>
                        @else
                            <span class="text-[10px] font-black tracking-widest text-slate-400 bg-slate-50 px-3 py-1 rounded-full uppercase">Inbox</span>
                        @endif
                    </div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-[0.2em]">Unread Messages</p>
                    <h3 class="text-4xl font-black text-slate-900 mt-2 tracking-tight group-hover:scale-110 origin-left transition-transform duration-500">{{ $stats['messages_unread'] }}</h3>
                    <div class="mt-8 flex items-center justify-between">
                        <a href="{{ route('admin.messages.index') }}" class="text-sm font-extrabold text-pink-600 flex items-center gap-1 group/link">
                            View All
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        <div class="w-10 h-1 bg-pink-100 rounded-full overflow-hidden">
                            <div class="w-1/4 h-full bg-pink-600"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Skills Card -->
            <div class="group bg-white p-2 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-500">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-8">
                        <div class="p-4 bg-emerald-50 text-emerald-600 rounded-[1.25rem] group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500 shadow-sm group-hover:shadow-emerald-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <span class="text-[10px] font-black tracking-widest text-emerald-400 bg-emerald-50 px-3 py-1 rounded-full uppercase">Expertise</span>
                    </div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-[0.2em]">Core Skills</p>
                    <h3 class="text-4xl font-black text-slate-900 mt-2 tracking-tight group-hover:scale-110 origin-left transition-transform duration-500">{{ $stats['skills_count'] }}</h3>
                    <div class="mt-8 flex items-center justify-between">
                        <a href="{{ route('admin.skills.index') }}" class="text-sm font-extrabold text-emerald-600 flex items-center gap-1 group/link">
                            Proficiency
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        <div class="w-10 h-1 bg-emerald-100 rounded-full overflow-hidden">
                            <div class="w-full h-full bg-emerald-600"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Recent Activity -->
            <div class="lg:col-span-2 bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="px-10 py-8 border-b border-slate-50 flex justify-between items-center bg-slate-50/30">
                    <div>
                        <h3 class="text-xl font-black text-slate-900">Recent Inbox</h3>
                        <p class="text-xs text-slate-500 mt-1 font-medium italic">Latest inquiries from your digital doorstep.</p>
                    </div>
                    <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-slate-500 hover:text-indigo-600 hover:bg-white px-5 py-2.5 rounded-xl border border-slate-100 transition-all shadow-sm">Archive</a>
                </div>
                <div class="divide-y divide-slate-50">
                    @forelse($recent_messages as $message)
                        <div class="px-10 py-8 hover:bg-slate-50/50 transition-all group relative">
                            <div class="flex justify-between items-start relative z-10">
                                <div class="flex gap-6">
                                    <div class="relative">
                                        <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-500 font-black border border-slate-200 uppercase group-hover:bg-white group-hover:text-indigo-600 group-hover:border-indigo-100 group-hover:rotate-6 transition-all duration-500">
                                            {{ substr($message->name, 0, 1) }}
                                        </div>
                                        @if(!$message->is_read)
                                            <span class="absolute -top-1 -right-1 w-4 h-4 bg-indigo-500 border-2 border-white rounded-full"></span>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="text-base font-black text-slate-900 group-hover:text-indigo-600 transition-colors">{{ $message->name }}</h4>
                                        <p class="text-xs text-slate-400 mt-0.5 font-medium">{{ $message->email }}</p>
                                        <div class="flex items-center gap-2 mt-3">
                                            <span class="text-[10px] font-black text-slate-400 bg-white px-2 py-1 rounded-md border border-slate-100 uppercase tracking-tighter">{{ $message->created_at->diffForHumans() }}</span>
                                            @if(!$message->is_read)
                                                <span class="text-[10px] font-black text-indigo-600 tracking-tighter uppercase px-2 py-1 bg-indigo-50 rounded-md">Urgent Inqury</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('admin.messages.show', $message) }}" class="text-xs font-black text-slate-400 hover:text-white hover:bg-slate-900 px-5 py-2.5 rounded-xl border border-slate-100 hover:border-slate-900 transition-all shadow-sm opacity-0 group-hover:opacity-100 -translate-x-4 group-hover:translate-x-0">Open Details</a>
                            </div>
                            <div class="mt-6 bg-slate-50 group-hover:bg-white p-5 rounded-2xl border border-slate-100 group-hover:border-indigo-50 transition-all">
                                <p class="text-sm text-slate-600 italic leading-relaxed line-clamp-2">"{{ $message->message }}"</p>
                            </div>
                        </div>
                    @empty
                        <div class="px-10 py-24 text-center">
                            <div class="w-24 h-24 bg-slate-50 rounded-[2rem] flex items-center justify-center mx-auto mb-6 transform -rotate-12 border border-slate-100">
                                <svg class="w-12 h-12 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            </div>
                            <h4 class="text-xl font-black text-slate-900">Quiet for Now</h4>
                            <p class="text-sm text-slate-400 mt-1 font-medium">When visitors reach out, their messages will land here beautifully.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Access & Stats -->
            <div class="space-y-10">
                <div class="bg-gradient-to-br from-indigo-700 to-indigo-900 rounded-[2.5rem] p-10 text-white shadow-2xl shadow-indigo-200 relative overflow-hidden group">
                    <div class="relative z-10">
                        <h4 class="text-2xl font-black mb-3">Live Site</h4>
                        <p class="text-indigo-200 text-sm mb-8 leading-relaxed font-medium">Your portfolio is currently live and showcasing your talent to the global audience.</p>
                        <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-3 w-full justify-center px-8 py-4 bg-white text-indigo-900 rounded-[1.25rem] font-black shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all">
                            Browse Site
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    </div>
                    <!-- Decorative patterns -->
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                </div>

                <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-10 relative overflow-hidden">
                    <h4 class="text-xl font-black text-slate-900 mb-8 flex items-center gap-2">
                        Quick Launch
                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                    </h4>
                    <div class="grid grid-cols-2 gap-6 relative z-10">
                        <a href="{{ route('admin.projects.create') }}" class="group/action flex flex-col items-center justify-center p-6 rounded-[2rem] border-2 border-slate-50 hover:border-indigo-100 hover:bg-indigo-50/50 transition-all text-center">
                            <div class="w-14 h-14 bg-slate-50 group-hover/action:bg-indigo-600 group-hover/action:text-white text-indigo-600 rounded-2xl flex items-center justify-center mb-4 transition-all duration-300 shadow-sm border border-slate-100 group-hover/action:border-indigo-600 group-hover/action:rotate-12">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            </div>
                            <span class="text-[10px] font-black tracking-widest text-slate-900 uppercase">New Project</span>
                        </a>
                        <a href="{{ route('admin.about-roles.index') }}" class="group/action flex flex-col items-center justify-center p-6 rounded-[2rem] border-2 border-slate-50 hover:border-purple-100 hover:bg-purple-50/50 transition-all text-center">
                            <div class="w-14 h-14 bg-slate-50 group-hover/action:bg-purple-600 group-hover/action:text-white text-purple-600 rounded-2xl flex items-center justify-center mb-4 transition-all duration-300 shadow-sm border border-slate-100 group-hover/action:border-purple-600 group-hover/action:rotate-12">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <span class="text-[10px] font-black tracking-widest text-slate-900 uppercase">Manage Roles</span>
                        </a>
                        <a href="{{ route('admin.skills.create') }}" class="group/action flex flex-col items-center justify-center p-6 rounded-[2rem] border-2 border-slate-50 hover:border-emerald-100 hover:bg-emerald-50/50 transition-all text-center">
                            <div class="w-14 h-14 bg-slate-50 group-hover/action:bg-emerald-600 group-hover/action:text-white text-emerald-600 rounded-2xl flex items-center justify-center mb-4 transition-all duration-300 shadow-sm border border-slate-100 group-hover/action:border-emerald-600 group-hover/action:rotate-12">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <span class="text-[10px] font-black tracking-widest text-slate-900 uppercase">Skill Master</span>
                        </a>
                        <a href="{{ route('admin.settings.index') }}" class="group/action flex flex-col items-center justify-center p-6 rounded-[2rem] border-2 border-slate-50 hover:border-slate-300 hover:bg-slate-50 transition-all text-center">
                            <div class="w-14 h-14 bg-slate-50 group-hover/action:bg-slate-900 group-hover/action:text-white text-slate-600 rounded-2xl flex items-center justify-center mb-4 transition-all duration-300 shadow-sm border border-slate-100 group-hover/action:border-slate-900 group-hover/action:rotate-12">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <span class="text-[10px] font-black tracking-widest text-slate-900 uppercase">Core Prefs</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

