<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Skill Management') }}
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-sm text-slate-500">Expertise</span>
                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-sm font-bold text-emerald-600">Technical Proficiency</span>
                </div>
            </div>
            <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-2xl text-sm font-black transition-all shadow-lg shadow-emerald-200 hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add Proficiency
            </a>
        </div>
    </x-slot>

    <div x-data="{ 
        showDeleteModal: false, 
        deleteUrl: '', 
        skillName: '',
        confirmDelete(url, name) {
            this.deleteUrl = url;
            this.skillName = name;
            this.showDeleteModal = true;
        }
    }" class="space-y-10 pb-10">
        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm" role="alert">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <span class="text-sm font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @php $currentCategory = null; @endphp
            @forelse($skills->groupBy('category') as $category => $categorySkills)
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden flex flex-col">
                    <div class="px-8 py-6 bg-slate-50/50 border-b border-slate-100 flex items-center justify-between">
                        <h4 class="text-sm font-black text-slate-900 uppercase tracking-widest">{{ $category }}</h4>
                        <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-black uppercase">{{ $categorySkills->count() }} Skills</span>
                    </div>
                    <div class="p-8 space-y-8 flex-1">
                        @foreach($categorySkills as $skill)
                            <div class="space-y-3 group/skill">
                                <div class="flex justify-between items-center">
                                    <h5 class="text-sm font-bold text-slate-700 group-hover/skill:text-emerald-600 transition-colors">{{ $skill->name }}</h5>
                                    <div class="flex items-center gap-3">
                                        <span class="text-xs font-black text-slate-400">{{ $skill->percentage }}%</span>
                                        <div class="flex gap-2 opacity-0 group-hover/skill:opacity-100 transition-opacity">
                                            <a href="{{ route('admin.skills.edit', $skill) }}" class="text-slate-400 hover:text-emerald-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></a>
                                            <button type="button" 
                                                @click="confirmDelete('{{ route('admin.skills.destroy', $skill) }}', '{{ $skill->name }}')"
                                                class="text-slate-400 hover:text-rose-600 focus:outline-none">
                                                <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                    <div class="bg-gradient-to-r from-emerald-500 to-teal-400 h-full rounded-full transition-all duration-1000" style="width: {{ $skill->percentage }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-[2rem] shadow-sm border border-slate-100 p-20 text-center">
                    <div class="w-20 h-20 bg-slate-50 rounded-[2rem] flex items-center justify-center mx-auto mb-6 border border-slate-100">
                        <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h4 class="text-xl font-black text-slate-900 uppercase">No Skills Found</h4>
                    <p class="text-sm text-slate-400 mt-1 font-medium italic">Your expertise dashboard is empty. Add your skills to show them off.</p>
                </div>
            @endforelse
        </div>
        <!-- Deletion Modal -->
        <template x-teleport="body">
            <div x-show="showDeleteModal" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm"
                 x-cloak>
                <div @click.away="showDeleteModal = false" 
                     class="bg-white rounded-[2.5rem] shadow-2xl max-w-md w-full overflow-hidden animate-scale-in">
                    <div class="p-8 md:p-10 text-center">
                        <div class="w-20 h-20 bg-rose-50 text-rose-600 rounded-[2rem] flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </div>
                        <h4 class="text-2xl font-black text-slate-900 mb-2 uppercase tracking-tight">Confirm Deletion</h4>
                        <p class="text-slate-500 font-medium">Are you sure you want to discard <span class="text-slate-900 font-black" x-text="skillName"></span>? This action is irreversible.</p>
                    </div>
                    <div class="px-8 py-8 bg-slate-50 border-t border-slate-100 flex items-center justify-center gap-4">
                        <button @click="showDeleteModal = false" class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-all">Cancel</button>
                        <form :action="deleteUrl" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-rose-600 text-white px-10 py-4 rounded-2xl text-xs font-black transition-all shadow-xl hover:bg-rose-700 hover:-translate-y-1">
                                Discard Permanently
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </template>
    </div>
</x-app-layout>

