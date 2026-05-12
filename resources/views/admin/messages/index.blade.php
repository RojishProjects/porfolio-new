<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Communication Hub') }}
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-sm text-slate-500">Inbox</span>
                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-sm font-bold text-pink-600">Visitor Inquiries</span>
                </div>
            </div>
            <div class="flex items-center gap-3 bg-white p-2 rounded-2xl shadow-sm border border-slate-50 font-black text-[10px] uppercase tracking-widest text-slate-400">
                Total: {{ $messages->count() }}
            </div>
        </div>
    </x-slot>

    <div x-data="{ 
        showDeleteModal: false, 
        deleteUrl: '', 
        senderName: '',
        confirmDelete(url, name) {
            this.deleteUrl = url;
            this.senderName = name;
            this.showDeleteModal = true;
        }
    }" class="space-y-8">
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
                            <th class="px-10 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Sender Details</th>
                            <th class="px-10 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Message Preview</th>
                            <th class="px-10 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status & Date</th>
                            <th class="px-10 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($messages as $message)
                            <tr class="hover:bg-slate-50 transition-all group {{ !$message->is_read ? 'bg-pink-50/20' : '' }}">
                                <td class="px-10 py-6">
                                    <div class="flex items-center gap-5">
                                        <div class="w-12 h-12 rounded-2xl {{ !$message->is_read ? 'bg-pink-600' : 'bg-slate-100' }} flex items-center justify-center {{ !$message->is_read ? 'text-white' : 'text-slate-400' }} font-black text-lg shadow-sm">
                                            {{ substr($message->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-black text-slate-900">{{ $message->name }}</h4>
                                            <p class="text-xs text-slate-400 font-medium">{{ $message->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-10 py-6">
                                    <div class="max-w-xs xl:max-w-sm">
                                        <h5 class="text-sm font-bold text-slate-700 truncate mb-1">{{ $message->subject }}</h5>
                                        <p class="text-xs text-slate-400 font-medium truncate italic">"{{ $message->message }}"</p>
                                    </div>
                                </td>
                                <td class="px-10 py-6">
                                    <div class="flex flex-col gap-2">
                                        @if(!$message->is_read)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-black bg-pink-100 text-pink-600 uppercase tracking-tighter w-fit">UNREAD</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-black bg-slate-100 text-slate-400 uppercase tracking-tighter w-fit">READ</span>
                                        @endif
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $message->created_at->format('M d, Y') }}</span>
                                    </div>
                                </td>
                                <td class="px-10 py-6 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.messages.show', $message) }}" class="inline-flex items-center justify-center w-10 h-10 bg-white text-slate-400 hover:text-indigo-600 rounded-xl border border-slate-100 hover:border-indigo-100 transition-all shadow-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </a>
                                        <button type="button" 
                                            @click="confirmDelete('{{ route('admin.messages.destroy', $message) }}', '{{ $message->name }}')"
                                            class="inline-flex items-center justify-center w-10 h-10 bg-white text-slate-400 hover:text-rose-600 rounded-xl border border-slate-100 hover:border-rose-100 transition-all shadow-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-10 py-24 text-center">
                                    <div class="w-24 h-24 bg-slate-50 rounded-[2.5rem] flex items-center justify-center mx-auto mb-6 border border-slate-100 shadow-inner">
                                        <svg class="w-12 h-12 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <h4 class="text-xl font-black text-slate-900 uppercase">Inbox Zero</h4>
                                    <p class="text-sm text-slate-400 mt-1 font-medium italic">No messages found. Everything is calm.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
                        <p class="text-slate-500 font-medium">Are you sure you want to discard message from <span class="text-slate-900 font-black" x-text="senderName"></span>? This action is irreversible.</p>
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
