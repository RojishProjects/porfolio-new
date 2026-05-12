<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    New Graphic Design
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <a href="{{ route('admin.designs.index') }}" class="text-sm text-slate-500 hover:text-purple-500 transition-colors">Design Gallery</a>
                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-sm font-bold text-purple-500">New Visual Asset</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto pb-20">
        <form action="{{ route('admin.designs.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-8">
            @csrf

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 md:p-12 space-y-12">

                    {{-- Title Section --}}
                    <div class="space-y-6">
                        <h3 class="text-xs font-black uppercase tracking-[0.25em] text-purple-500 flex items-center gap-2">
                            <span class="w-8 h-px bg-purple-200"></span> Asset Identity
                        </h3>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Design Title *</label>
                            <x-text-input name="title" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-base font-bold p-5 focus:ring-purple-500"
                                :value="old('title')" placeholder="e.g. Modern UI Kit" required />
                            <x-input-error :messages="$errors->get('title')" />
                        </div>
                    </div>

                    {{-- Category Section --}}
                    <div class="space-y-3">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Category</label>
                        <x-text-input name="category" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-purple-500"
                            :value="old('category')" placeholder="e.g. Logo Design" />
                    </div>

                    {{-- Description Section --}}
                    <div class="space-y-3">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Description</label>
                        <textarea name="description" rows="6"
                            class="block w-full border border-slate-100 bg-slate-50/50 rounded-[1.5rem] text-sm font-medium p-6 focus:ring-purple-500 focus:outline-none focus:ring-2"
                            placeholder="Design context...">{{ old('description') }}</textarea>
                    </div>

                    {{-- Tools Section --}}
                    <div class="space-y-3">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Tools Used</label>
                        <x-text-input name="tools" type="text" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-purple-500"
                            :value="old('tools')" placeholder="e.g. Photoshop, Illustrator, Figma (comma separated)" />
                    </div>

                    {{-- Media Section --}}
                    <div class="space-y-6">
                        <h3 class="text-xs font-black uppercase tracking-[0.25em] text-purple-500 flex items-center gap-2">
                            <span class="w-8 h-px bg-purple-200"></span> Design File
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                            <div class="space-y-4">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Upload File</label>
                                <div class="border-2 border-dashed border-slate-200 rounded-[2rem] p-8 text-center hover:border-purple-300 transition-colors">
                                    <input type="file" name="image_upload" id="imageInput" accept="image/*"
                                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-2xl file:border-0 file:text-xs file:font-black file:uppercase file:bg-purple-50 file:text-purple-500 hover:file:bg-purple-500 hover:file:text-white transition-all cursor-pointer">
                                </div>
                            </div>
                            <div class="space-y-4">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Or Direct Link</label>
                                <x-text-input name="image_url" type="url" class="block w-full border-slate-100 bg-slate-50/50 rounded-2xl text-sm font-bold p-4 focus:ring-purple-500"
                                    :value="old('image_url')" placeholder="https://..." />
                            </div>
                        </div>
                        <div id="imagePreview" class="hidden mt-4">
                            <img src="" class="max-h-64 rounded-3xl border border-slate-100 mx-auto shadow-lg" id="previewImg">
                        </div>
                    </div>
                </div>

                <div class="px-8 py-8 bg-slate-50/50 border-t border-slate-100 flex items-center justify-end gap-4">
                    <a href="{{ route('admin.designs.index') }}" class="px-8 py-4 text-sm font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-all">Cancel</a>
                    <button type="submit" class="bg-slate-900 text-white px-12 py-5 rounded-2xl text-sm font-black transition-all shadow-xl hover:bg-purple-500 hover:-translate-y-1">
                        Push to Gallery
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const img = document.getElementById('previewImg');
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    img.src = ev.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
</x-app-layout>
