<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Project Portfolio') }}
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-sm text-slate-500">Dashboard</span>
                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-sm font-bold text-indigo-600">Development & Solutions</span>
                </div>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-2xl text-sm font-black transition-all shadow-lg shadow-indigo-200 hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                New Project Entry
            </a>
        </div>
    </x-slot>

    <div x-data="{ 
        showDeleteModal: false, 
        deleteUrl: '', 
        projectName: '',
        confirmDelete(url, name) {
            this.deleteUrl = url;
            this.projectName = name;
            this.showDeleteModal = true;
        }
    }" class="space-y-10 pb-10">
        <!-- Add Section (Compact) -->
        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8 md:p-10 relative overflow-hidden group">
            <div class="relative z-10">
                <h3 class="text-xl font-black text-slate-900 mb-8 flex items-center gap-3">
                    <span class="p-3 bg-indigo-50 text-indigo-600 rounded-2xl group-hover:bg-indigo-600 group-hover:text-white transition-all duration-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </span>
                    Quick Draft
                </h3>
                <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 items-end">
                    @csrf
                    <div class="space-y-2 lg:col-span-1">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Project Name</label>
                        <x-text-input name="title" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold focus:ring-indigo-500 focus:border-indigo-500" placeholder="e.g. E-Commerce App" required />
                    </div>
                    <div class="space-y-2 lg:col-span-1">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Cover Image</label>
                        <input type="file" name="image_upload" class="block w-full text-xs font-bold text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-600 hover:file:text-white transition-all cursor-pointer">
                    </div>
                    <div class="space-y-2 lg:col-span-1">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Live URL</label>
                        <x-text-input name="project_url" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-[10px] font-bold focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://..." />
                    </div>
                    <div class="space-y-2 lg:col-span-1">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Category</label>
                        <x-text-input name="category" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold focus:ring-indigo-500 focus:border-indigo-500" placeholder="e.g. Web Dev" />
                    </div>
                    <div>
                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-900 text-white rounded-2xl font-black text-sm hover:bg-indigo-600 transition-all shadow-lg hover:shadow-indigo-200">
                            Save Project
                        </button>
                    </div>
                </form>
            </div>
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-indigo-50 rounded-full blur-3xl opacity-50"></div>
        </div>

        <!-- Manage Section -->
        <div class="space-y-6">
            <div class="flex items-center gap-4 px-2">
                <h3 class="text-xl font-black text-slate-900">Project Inventory</h3>
                <div class="h-px flex-1 bg-slate-100"></div>
            </div>

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm" role="alert">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-sm font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Project / Identity</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Context</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($projects as $project)
                                <tr class="hover:bg-slate-50/50 transition-all group" 
                                    x-data="{ 
                                        isHidden: {{ $project->is_hidden ? 'true' : 'false' }},
                                        toggle() {
                                            this.isHidden = !this.isHidden;
                                            fetch('{{ route('admin.projects.toggle-visibility', $project) }}', {
                                                method: 'POST',
                                                headers: {
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                    'Accept': 'application/json',
                                                    'Content-Type': 'application/json'
                                                }
                                            });
                                        }
                                    }" 
                                    :class="isHidden ? 'opacity-60 bg-slate-50/30' : ''">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-5">
                                            <div class="relative flex-shrink-0">
                                                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="h-20 w-20 object-cover rounded-2xl shadow-sm border border-slate-100">
                                            </div>
                                            <div>
                                                <h4 class="text-base font-black text-slate-900 uppercase tracking-tight">{{ $project->title }}</h4>
                                                <p class="text-[10px] text-slate-400 mt-1 font-black flex items-center gap-2">
                                                    <span class="w-1.5 h-1.5 rounded-full transition-colors" :class="isHidden ? 'bg-amber-400' : 'bg-indigo-400'"></span>
                                                    {{ $project->category }}
                                                    <span x-show="isHidden" class="px-2 py-0.5 bg-amber-100 text-amber-700 rounded-md text-[8px] uppercase tracking-widest ml-2" x-cloak>Hidden</span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex flex-col gap-1">
                                            <span class="text-[10px] font-bold text-slate-400 uppercase italic">Registered {{ $project->created_at->format('M d, Y') }}</span>
                                            @if($project->project_url)
                                                <a href="{{ $project->project_url }}" target="_blank" class="text-[10px] font-black text-indigo-500 hover:underline flex items-center gap-1">
                                                    Visit Project
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button type="button" @click="toggle" :title="isHidden ? 'Show Project' : 'Hide Project'" class="p-2.5 text-slate-400 hover:text-amber-600 hover:bg-white rounded-xl border border-transparent hover:border-slate-100 transition-all font-black focus:outline-none flex items-center justify-center">
                                                <svg x-show="isHidden" x-cloak class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                                <svg x-show="!isHidden" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </button>
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="p-2.5 text-slate-400 hover:text-indigo-600 hover:bg-white rounded-xl border border-transparent hover:border-slate-100 transition-all font-black text-xs uppercase tracking-widest flex items-center justify-center" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>
                                            <button type="button" 
                                                @click="confirmDelete('{{ route('admin.projects.destroy', $project) }}', '{{ $project->title }}')"
                                                class="p-2.5 text-slate-400 hover:text-rose-600 hover:bg-white rounded-xl border border-transparent hover:border-slate-100 transition-all font-black text-xs uppercase tracking-widest focus:outline-none">
                                                Discard
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-8 py-20 text-center">
                                        <div class="w-20 h-20 bg-slate-50 rounded-[2rem] flex items-center justify-center mx-auto mb-6 border border-slate-100 shadow-inner">
                                            <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                        </div>
                                        <h4 class="text-xl font-black text-slate-900 uppercase">Archive Empty</h4>
                                        <p class="text-sm text-slate-400 mt-1 font-medium italic">Your development journey is ready to be documented.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
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
                        <p class="text-slate-500 font-medium">Are you sure you want to discard <span class="text-slate-900 font-black" x-text="projectName"></span>? This action is irreversible.</p>
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
