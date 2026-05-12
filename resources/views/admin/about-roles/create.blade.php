<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Create Role Profile') }}
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <a href="{{ route('admin.about-roles.index') }}" class="text-sm text-slate-500 hover:text-orange-600 transition-colors">About Roles</a>
                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-sm font-bold text-orange-600">New Entry</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto pb-20">
        <form method="POST" action="{{ route('admin.about-roles.store') }}" class="space-y-8">
            @csrf

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 md:p-12 space-y-10">
                    <!-- Title Section -->
                    <div class="space-y-4">
                        <label for="title" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Professional Title</label>
                        <x-text-input id="title" name="title" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-lg font-bold p-5 focus:ring-orange-500 focus:border-orange-500 transition-all" placeholder="e.g. Lead Web Architect" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <!-- Description Section -->
                    <div class="space-y-4">
                        <label for="description" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Role Description</label>
                        <textarea id="description" name="description" rows="5" class="block w-full border-slate-100 bg-slate-50/50 rounded-3xl text-sm font-medium p-6 focus:ring-orange-500 focus:border-orange-500 transition-all" placeholder="Detail your impact and responsibilities in this role..." required></textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <!-- Key Areas Section -->
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Key Focus Areas</label>
                            <button type="button" onclick="addKeyArea()" class="text-[10px] font-black text-orange-600 uppercase tracking-widest bg-orange-50 px-4 py-2 rounded-xl hover:bg-orange-600 hover:text-white transition-all">
                                Add Field
                            </button>
                        </div>
                        
                        <div id="key-areas-container" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="relative">
                                <x-text-input name="key_areas[]" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-xs font-bold p-4 opacity-80" placeholder="e.g. Scalable Systems" />
                            </div>
                            <div class="relative">
                                <x-text-input name="key_areas[]" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-xs font-bold p-4 opacity-80" placeholder="e.g. User Experience" />
                            </div>
                        </div>
                        <p class="text-[10px] text-slate-400 italic">Define specific areas of expertise for this role.</p>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="px-8 py-8 bg-slate-50/50 border-t border-slate-100 flex items-center justify-end gap-4">
                    <a href="{{ route('admin.about-roles.index') }}" class="px-8 py-4 text-sm font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-all">Cancel</a>
                    <button type="submit" class="bg-slate-900 text-white px-10 py-4 rounded-2xl text-sm font-black transition-all shadow-xl hover:bg-orange-600 hover:-translate-y-1">
                        Publish Role Profile
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function addKeyArea() {
            const container = document.getElementById('key-areas-container');
            const div = document.createElement('div');
            div.className = 'relative animate-fade-in';
            div.innerHTML = `
                <input name="key_areas[]" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-xs font-bold p-4 opacity-80 focus:ring-orange-500 focus:border-orange-500 transition-all" placeholder="Enter focus area...">
                <button type="button" onclick="this.parentElement.remove()" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-300 hover:text-rose-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            `;
            container.appendChild(div);
        }
    </script>
</x-app-layout>
