@props(['active', 'href'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 px-3 py-2.5 text-sm font-semibold text-white bg-indigo-600/20 border-r-4 border-indigo-500 rounded-l-lg transition-all duration-200 group'
            : 'flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-slate-400 hover:text-white hover:bg-slate-800 rounded-lg transition-all duration-200 group';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if(isset($icon))
        <div class="{{ ($active ?? false) ? 'text-indigo-400' : 'text-slate-500 group-hover:text-slate-300' }} transition-colors">
            {{ $icon }}
        </div>
    @endif
    <span class="truncate">{{ $slot }}</span>
</a>
