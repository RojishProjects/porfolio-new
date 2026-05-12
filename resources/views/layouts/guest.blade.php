<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Login — {{ config('app.name', 'Portfolio') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="antialiased bg-slate-950 min-h-screen flex">

        <!-- Left Panel — Branding -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-gradient-to-br from-indigo-900 via-slate-900 to-purple-900 items-center justify-center p-16">
            <!-- Decorative orbs -->
            <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>

            <!-- Grid pattern -->
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(rgba(255,255,255,.5) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.5) 1px, transparent 1px); background-size: 40px 40px;"></div>

            <div class="relative z-10 text-white text-center">
                <!-- Logo icon -->
                <div class="w-24 h-24 bg-indigo-600 rounded-[2rem] flex items-center justify-center mx-auto mb-10 shadow-2xl shadow-indigo-900">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <h1 class="text-5xl font-black tracking-tight mb-4">Admin<span class="text-indigo-400">Panel</span></h1>
                <p class="text-slate-400 text-lg font-medium leading-relaxed max-w-xs mx-auto">
                    Your portfolio control center. Manage projects, designs, and everything in between.
                </p>

                <div class="mt-16 grid grid-cols-3 gap-6 text-center">
                    <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                        <div class="text-2xl font-black text-white mb-1">∞</div>
                        <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Projects</div>
                    </div>
                    <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                        <div class="text-2xl font-black text-indigo-400 mb-1">24/7</div>
                        <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Live</div>
                    </div>
                    <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                        <div class="text-2xl font-black text-white mb-1">🔒</div>
                        <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Secure</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel — Login Form -->
        <div class="flex-1 flex items-center justify-center p-6 lg:p-16">
            <div class="w-full max-w-md">
                <!-- Mobile logo -->
                <div class="lg:hidden flex items-center gap-3 mb-10">
                    <div class="p-2.5 bg-indigo-600 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-black text-white tracking-tight">Admin<span class="text-indigo-400">Panel</span></span>
                </div>

                <div class="mb-10">
                    <h2 class="text-4xl font-black text-white tracking-tight mb-3">Welcome back</h2>
                    <p class="text-slate-400 font-medium">Sign in to access your portfolio dashboard.</p>
                </div>

                <!-- Session Status -->
                @if(session('status'))
                    <div class="mb-6 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-5 py-4 rounded-2xl text-sm font-medium">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Email Address</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="block w-full bg-white/5 border border-white/10 text-white rounded-2xl px-5 py-4 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-slate-600 transition-all"
                            placeholder="you@example.com"
                        >
                        @error('email')
                            <p class="text-rose-400 text-xs font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Password</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="block w-full bg-white/5 border border-white/10 text-white rounded-2xl px-5 py-4 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-slate-600 transition-all"
                            placeholder="••••••••••••"
                        >
                        @error('password')
                            <p class="text-rose-400 text-xs font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="w-4 h-4 rounded border-white/20 bg-white/5 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-slate-950">
                            <span class="text-sm text-slate-400 font-medium">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-3 bg-indigo-600 hover:bg-indigo-500 text-white py-4 rounded-2xl font-black text-sm tracking-wide transition-all shadow-2xl shadow-indigo-900 hover:-translate-y-0.5 active:translate-y-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Sign In to Dashboard
                    </button>
                </form>

                <p class="mt-10 text-center text-xs text-slate-600">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Portfolio') }}. All rights reserved.
                </p>
            </div>
        </div>

    </body>
</html>
