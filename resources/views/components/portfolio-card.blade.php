@props(['item', 'route', 'index', 'badge' => null, 'details' => []])

<a href="{{ route($route, $item) }}" 
   target="_blank" 
   rel="noopener noreferrer" 
   class="group relative bg-slate-800/50 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-700/50 transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl hover:shadow-purple-500/20 block magnetic-card" 
   data-animate 
   data-delay="{{ ($index + 1) * 100 }}">
    
    <div class="relative h-64 overflow-hidden">
        @if($item->image)
            <img src="{{ $item->image }}" 
                 alt="{{ $item->title }}" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        @else
            <div class="w-full h-full bg-slate-700 flex items-center justify-center">
                <svg class="w-12 h-12 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        @endif

        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-60"></div>

        <div class="absolute inset-0 bg-purple-900/0 group-hover:bg-purple-900/30 transition-all duration-500 flex items-center justify-center">
            <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center gap-2 px-5 py-2.5 bg-white/10 backdrop-blur-md rounded-full text-white text-sm font-bold border border-white/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                View Details
            </span>
        </div>

        @if($badge || $item->category)
        <div class="absolute bottom-4 left-4 right-4 z-10">
            <span class="px-3 py-1 bg-purple-500 text-white text-xs font-bold rounded-full uppercase tracking-widest shadow-lg">
                {{ $badge ?? $item->category }}
            </span>
        </div>
        @endif
    </div>

    <div class="p-6">
        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-purple-400 transition-colors">
            {{ $item->title }}
        </h3>
        <p class="text-gray-400 text-sm mb-4 line-clamp-2 leading-relaxed">
            {{ $item->description }}
        </p>

        @if(!empty($details))
        <div class="flex flex-wrap gap-2 pt-4 border-t border-slate-700/50">
            @foreach($details as $detail)
            <span class="text-[10px] font-bold text-purple-300 uppercase tracking-tighter">{{ $detail }}</span>
            @if(!$loop->last) <span class="text-slate-600">•</span> @endif
            @endforeach
        </div>
        @endif
    </div>
</a>
