<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ $design->title }}
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <a href="{{ route('admin.designs.index') }}" class="text-sm text-slate-500 hover:text-purple-600 transition-colors">Graphic Showcase</a>
                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-sm font-bold text-purple-600">Preview</span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.designs.edit', $design) }}" class="inline-flex items-center gap-2 bg-slate-900 hover:bg-purple-600 text-white px-6 py-3 rounded-2xl text-sm font-black transition-all shadow-lg hover:-translate-y-0.5">
                    <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Refine
                </a>
                <form action="{{ route('admin.designs.destroy', $design) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center gap-2 bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white border border-rose-100 hover:border-rose-600 px-6 py-3 rounded-2xl text-sm font-black transition-all focus:outline-none">
                        <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Discard
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto pb-20 space-y-8">

        {{-- Hero Image --}}
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="relative bg-slate-900 flex items-center justify-center min-h-[400px] md:min-h-[600px]" style="background: repeating-conic-gradient(#f1f5f9 0% 25%, #e2e8f0 0% 50%) 0 0 / 24px 24px;">
                @if($design->image)
                    <img
                        src="{{ asset($design->image) }}"
                        alt="{{ $design->title }}"
                        class="max-w-full max-h-[80vh] object-contain drop-shadow-2xl"
                    >
                @else
                    <div class="text-center py-20">
                        <div class="w-24 h-24 bg-slate-100 rounded-[2rem] flex items-center justify-center mx-auto mb-4">
                            <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-slate-400 font-bold">No image uploaded yet</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Metadata Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Main Info --}}
            <div class="md:col-span-2 bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8 space-y-6">
                <div>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Design Title</span>
                    <h1 class="text-2xl font-black text-slate-900 mt-1">{{ $design->title }}</h1>
                </div>

                @if($design->description)
                    <div>
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Concept Narrative</span>
                        <p class="text-slate-600 mt-2 font-medium leading-relaxed">{{ $design->description }}</p>
                    </div>
                @endif

                @if($design->tools && count($design->tools) > 0)
                    <div>
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Creative Arsenal</span>
                        <div class="flex flex-wrap gap-2 mt-3">
                            @foreach($design->tools as $tool)
                                <span class="px-4 py-2 bg-purple-50 text-purple-600 text-xs font-black uppercase tracking-wider rounded-xl border border-purple-100">{{ $tool }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Side Stats --}}
            <div class="space-y-4">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-6 space-y-5">
                    <div>
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Category</span>
                        @if($design->category)
                            <div class="mt-2">
                                <span class="px-4 py-2 bg-purple-600 text-white text-xs font-black uppercase tracking-widest rounded-xl">{{ $design->category }}</span>
                            </div>
                        @else
                            <p class="text-slate-400 text-sm mt-1 italic">Uncategorized</p>
                        @endif
                    </div>
                    <div class="border-t border-slate-100 pt-5">
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Added</span>
                        <p class="text-slate-700 font-bold mt-1">{{ $design->created_at->format('d M Y') }}</p>
                        <p class="text-slate-400 text-xs mt-0.5">{{ $design->created_at->diffForHumans() }}</p>
                    </div>
                    @if($design->updated_at != $design->created_at)
                        <div class="border-t border-slate-100 pt-5">
                            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Last Updated</span>
                            <p class="text-slate-700 font-bold mt-1">{{ $design->updated_at->format('d M Y') }}</p>
                            <p class="text-slate-400 text-xs mt-0.5">{{ $design->updated_at->diffForHumans() }}</p>
                        </div>
                    @endif
                </div>

                <a href="{{ route('admin.designs.index') }}" class="flex items-center justify-center gap-2 w-full py-4 text-sm font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 bg-white rounded-2xl border border-slate-100 shadow-sm transition-all hover:-translate-y-0.5">
                    <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Collection
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
