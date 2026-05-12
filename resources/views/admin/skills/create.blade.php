<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ isset($skill) ? __('Refine Proficiency') : __('Add Technical Skill') }}
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <a href="{{ route('admin.skills.index') }}" class="text-sm text-slate-500 hover:text-emerald-600 transition-colors">Expertise Hub</a>
                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-sm font-bold text-emerald-600">{{ isset($skill) ? 'Refining: '.$skill->name : 'New Entry' }}</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto pb-20">
        <form action="{{ isset($skill) ? route('admin.skills.update', $skill) : route('admin.skills.store') }}" method="POST" class="space-y-10">
            @csrf
            @if(isset($skill))
                @method('PUT')
            @endif

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 md:p-12 space-y-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="space-y-4">
                            <label for="name" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Skill Identifier</label>
                            <x-text-input id="name" name="name" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-base font-bold p-5 focus:ring-emerald-500 transition-all" :value="old('name', $skill->name ?? '')" placeholder="e.g. Laravel Architecture" required />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="space-y-4">
                            <label for="category" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Expertise Cluster</label>
                            <x-text-input id="category" name="category" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-base font-bold p-5 focus:ring-emerald-500 transition-all" :value="old('category', $skill->category ?? '')" placeholder="e.g. Backend Mastery" required />
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="flex justify-between items-center">
                            <label for="percentage" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Proficiency Level (%)</label>
                            <span id="percentage-indicator" class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-xl text-sm font-black">{{ old('percentage', $skill->percentage ?? 50) }}%</span>
                        </div>
                        <input type="range" id="percentage" name="percentage" min="0" max="100" class="w-full h-3 bg-slate-100 rounded-full appearance-none cursor-pointer accent-emerald-600" value="{{ old('percentage', $skill->percentage ?? 50) }}" oninput="document.getElementById('percentage-indicator').innerText = this.value + '%'">
                        <div class="flex justify-between text-[10px] font-black text-slate-300 uppercase tracking-widest px-1">
                            <span>Beginner</span>
                            <span>Expert</span>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('percentage')" />
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="px-8 py-8 bg-slate-50/50 border-t border-slate-100 flex items-center justify-end gap-4">
                    <a href="{{ route('admin.skills.index') }}" class="px-8 py-4 text-sm font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-all">Cancel</a>
                    <button type="submit" class="bg-slate-900 text-white px-10 py-4 rounded-2xl text-sm font-black transition-all shadow-xl hover:bg-emerald-600 hover:-translate-y-1">
                        {{ isset($skill) ? 'Commit Skill' : 'Add Proficiency' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
