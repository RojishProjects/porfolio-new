<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Site Configuration') }}
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-sm text-slate-500">Core</span>
                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-sm font-bold text-blue-600">Preferences & Identity</span>
                </div>
            </div>
            <div x-data="{ 
                status: '{{ $settings['system_status'] ?? 'live' }}',
                toggleStatus() {
                    this.status = this.status === 'live' ? 'maintenance' : 'live';
                    fetch('{{ route('admin.settings.toggle-status') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    });
                }
            }" @click="toggleStatus" class="flex items-center gap-3 bg-white p-2 rounded-2xl shadow-sm border border-slate-50 font-black text-[10px] uppercase tracking-widest text-slate-400 cursor-pointer select-none hover:border-slate-200 transition-colors">
                System Status: 
                <span x-show="status === 'live'" class="text-emerald-500 ml-1 flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Live
                </span>
                <span x-show="status === 'maintenance'" class="text-rose-500 ml-1 flex items-center gap-1" x-cloak>
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                    Off
                </span>
            </div>
        </div>
    </x-slot>

    <div class="space-y-10 pb-20">
        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm animate-fade-in" role="alert">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <span class="text-sm font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-10">
            @csrf
            
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-10">
                <!-- Left Column: Identity & Branding -->
                <div class="xl:col-span-2 space-y-10">
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                        <div class="px-10 py-8 border-b border-slate-50 bg-slate-50/30 flex items-center gap-4">
                            <div class="p-3 bg-blue-600 rounded-2xl text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight uppercase">Identity & Hero</h3>
                        </div>
                        <div class="p-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Hero Display Name</label>
                                <x-text-input name="hero_name" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-blue-500" :value="$settings['hero_name'] ?? ''" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Professional Subtitle</label>
                                <x-text-input name="hero_subtitle" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-blue-500" :value="$settings['hero_subtitle'] ?? ''" />
                            </div>
                            <div class="md:col-span-2 space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Brand Tagline</label>
                                <x-text-input name="hero_tagline" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-blue-500" :value="$settings['hero_tagline'] ?? ''" />
                            </div>
                            <div class="md:col-span-2 space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">About Summary (Brief)</label>
                                <textarea name="about_summary" rows="4" class="block w-full border-slate-100 bg-slate-50/50 rounded-3xl text-sm font-medium p-5 focus:ring-blue-500 transition-all">{{ $settings['about_summary'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Section -->
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                        <div class="px-10 py-8 border-b border-slate-50 bg-slate-50/30 flex items-center gap-4">
                            <div class="p-3 bg-emerald-600 rounded-2xl text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            </div>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight uppercase">Dashboard Statistics</h3>
                        </div>
                        <div class="p-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Projects Done</label>
                                <x-text-input name="stats_projects" type="number" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-emerald-500" :value="$settings['stats_projects'] ?? '50'" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Happy Clients</label>
                                <x-text-input name="stats_clients" type="number" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-emerald-500" :value="$settings['stats_clients'] ?? '15'" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Years Experience</label>
                                <x-text-input name="stats_experience" type="number" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-emerald-500" :value="$settings['stats_experience'] ?? '5'" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Certifications</label>
                                <x-text-input name="stats_certifications" type="number" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-emerald-500" :value="$settings['stats_certifications'] ?? '10'" />
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                        <div class="px-10 py-8 border-b border-slate-50 bg-slate-50/30 flex items-center gap-4">
                            <div class="p-3 bg-purple-600 rounded-2xl text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.821a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            </div>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight uppercase">Social Ecosystem</h3>
                        </div>
                        <div class="p-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                            @foreach(['github', 'linkedin', 'twitter', 'instagram'] as $social)
                            <div class="space-y-2 group">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 group-hover:text-purple-600 transition-colors">{{ ucfirst($social) }} Profile URL</label>
                                <x-text-input name="social_{{ $social }}" type="url" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-purple-500" :value="$settings['social_'.$social] ?? ''" placeholder="https://{{ $social }}.com/..." />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column: Media, Contact & Footer -->
                <div class="space-y-10">
                    <!-- Hero Image Asset -->
                    <div class="p-10 bg-white rounded-[2.5rem] shadow-sm border border-slate-100 space-y-6">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Visual Identity Asset</label>
                        <div class="relative group">
                            <div class="w-full aspect-square bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-200 flex items-center justify-center overflow-hidden transition-all group-hover:border-blue-300">
                                @if(isset($settings['hero_image']))
                                    <img src="{{ asset($settings['hero_image']) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                @endif
                                <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="text-white text-xs font-black uppercase tracking-widest">Update Photo</span>
                                </div>
                                <input type="file" name="hero_image" class="absolute inset-0 opacity-0 cursor-pointer">
                            </div>
                        </div>
                        <p class="text-[10px] text-slate-400 text-center font-medium italic">High resolution JPG or PNG recommended.</p>
                    </div>

                    <!-- Contact & Footer -->
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                        <div class="px-8 py-6 border-b border-slate-50 bg-slate-50/30 flex items-center gap-4">
                            <div class="p-2.5 bg-rose-600 rounded-xl text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-lg font-black text-slate-900 tracking-tight uppercase">Contact & Base</h3>
                        </div>
                        <div class="p-8 space-y-6">
                            <div class="space-y-1">
                                <label class="text-[9px] font-black uppercase tracking-widest text-slate-400">Direct Email</label>
                                <x-text-input name="contact_email" type="email" class="block w-full border-slate-100 bg-slate-50/50 rounded-xl text-sm font-bold p-3" :value="$settings['contact_email'] ?? ''" />
                            </div>
                            <div class="space-y-1">
                                <label class="text-[9px] font-black uppercase tracking-widest text-slate-400">Phone Signal</label>
                                <x-text-input name="contact_phone" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-xl text-sm font-bold p-3" :value="$settings['contact_phone'] ?? ''" />
                            </div>
                            <div class="space-y-1">
                                <label class="text-[9px] font-black uppercase tracking-widest text-slate-400">Copyright / Footer Text</label>
                                <x-text-input name="footer_text" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-xl text-sm font-bold p-3" :value="$settings['footer_text'] ?? ''" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Global Action Bar -->
            <div class="fixed bottom-10 left-1/2 -translate-x-1/2 md:translate-x-0 md:left-auto md:right-10 z-30">
                <button type="submit" class="flex items-center gap-3 bg-slate-900 text-white px-10 py-5 rounded-[2rem] font-black text-sm uppercase tracking-widest shadow-2xl shadow-slate-400 hover:bg-blue-600 hover:-translate-y-2 transition-all duration-500 group">
                    <svg class="w-6 h-6 animate-pulse group-hover:scale-125 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Commit Configuration
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
