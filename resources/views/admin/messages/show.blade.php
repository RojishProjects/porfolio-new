<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Message Details') }}
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <a href="{{ route('admin.messages.index') }}" class="text-sm text-slate-500 hover:text-pink-600 transition-colors">Communication Hub</a>
                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-sm font-bold text-pink-600">{{ Str::limit($message->name, 30) }}</span>
                </div>
            </div>
            <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center gap-2 bg-white text-slate-700 border border-slate-100 px-5 py-2.5 rounded-2xl text-sm font-black transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Inbox
            </a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-8 pb-10">
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <!-- Message Header -->
            <div class="px-10 py-10 bg-slate-50/50 border-b border-slate-100">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 bg-indigo-600 rounded-[2rem] flex items-center justify-center text-white text-3xl font-black shadow-lg shadow-indigo-100">
                            {{ strtoupper(substr($message->name, 0, 1)) }}
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-slate-900 tracking-tight">{{ $message->name }}</h3>
                            <a href="mailto:{{ $message->email }}" class="text-indigo-600 font-bold hover:underline text-sm">{{ $message->email }}</a>
                        </div>
                    </div>
                    <div class="flex flex-col items-start md:items-end gap-2">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Received On</span>
                        <span class="text-sm font-black text-slate-900">{{ $message->created_at->format('M d, Y @ H:i') }}</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black bg-emerald-100 text-emerald-600 uppercase tracking-tighter">Read</span>
                    </div>
                </div>
            </div>

            <!-- Message Body -->
            <div class="p-10 md:p-16">
                <div class="mb-12">
                    <span class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.2em] block mb-4">Subject Matter</span>
                    <h2 class="text-3xl font-black text-slate-900 leading-tight">{{ $message->subject }}</h2>
                </div>

                <div class="relative pl-8">
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-slate-100 rounded-full"></div>
                    <p class="text-slate-600 leading-relaxed font-medium whitespace-pre-line text-lg italic">
                        "{{ $message->message }}"
                    </p>
                </div>
            </div>

            <!-- Action footer -->
            <div class="px-10 py-10 bg-slate-50/50 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Delete this message permanently?')"
                        class="inline-flex items-center gap-2 text-rose-500 hover:text-rose-700 text-sm font-black transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Delete Message
                    </button>
                </form>
                <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="inline-flex items-center gap-3 bg-slate-900 text-white px-10 py-4 rounded-2xl text-base font-black transition-all shadow-xl hover:bg-indigo-600 hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Reply via Email
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
