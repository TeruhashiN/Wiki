<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login — BloomCity Wiki</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-950 text-slate-200 antialiased">

    {{-- Ambient background --}}
    <div class="fixed inset-0 -z-10"
        style="background:
            radial-gradient(ellipse 60% 50% at 20% 20%, rgba(99,102,241,0.25), transparent),
            radial-gradient(ellipse 50% 40% at 85% 80%, rgba(217,70,239,0.18), transparent),
            radial-gradient(ellipse 40% 40% at 60% 40%, rgba(56,189,248,0.08), transparent),
            #020617;">
    </div>

    <div class="min-h-full flex items-center justify-center p-4">
        <div class="w-full max-w-md">

            {{-- Brand --}}
            <div class="flex items-center justify-center gap-3 mb-8">
                <div class="relative">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-indigo-500 via-purple-500 to-fuchsia-500 flex items-center justify-center shadow-lg shadow-purple-500/30 overflow-hidden">
                        <img src="{{ asset('images/bloom.jpg') }}" alt="Logo" class="w-full h-full object-cover">
                    </div>
                    <span class="absolute -top-0.5 -right-0.5 w-2.5 h-2.5 bg-emerald-400 rounded-full border-2 border-slate-950"></span>
                </div>
                <div>
                    <h1 class="text-white font-bold text-xl leading-tight tracking-tight">BloomCity <span class="text-indigo-400">Wiki</span></h1>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-medium">The Game Encyclopedia</p>
                </div>
            </div>

            {{-- Card --}}
            <div class="rounded-2xl border border-slate-800 bg-slate-900/60 backdrop-blur p-6 sm:p-8 shadow-2xl shadow-black/50">

                <h2 class="text-xl font-bold text-white">Welcome back</h2>
                <p class="mt-1 text-sm text-slate-500">Sign in to access your BloomCity account.</p>

                @if ($errors->any())
                    <div class="mt-4 rounded-xl border border-red-500/30 bg-red-500/10 p-3 text-sm text-red-300">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="mt-4 rounded-xl border border-emerald-500/30 bg-emerald-500/10 p-3 text-sm text-emerald-300">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.attempt') }}" class="mt-6 space-y-4">
                    @csrf

                    {{-- Username --}}
                    <div>
                        <label for="username" class="block text-xs font-semibold uppercase tracking-widest text-slate-500 mb-1.5">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus autocomplete="username"
                            class="w-full h-11 px-4 rounded-xl bg-slate-950 border border-slate-800 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all"
                            placeholder="Enter your username">
                        @error('username')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-xs font-semibold uppercase tracking-widest text-slate-500 mb-1.5">Password</label>
                        <input type="password" id="password" name="password" required autocomplete="current-password"
                            class="w-full h-11 px-4 rounded-xl bg-slate-950 border border-slate-800 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all"
                            placeholder="Enter your password">
                        @error('password')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full h-11 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition-all shadow-lg shadow-indigo-600/30 inline-flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                        </svg>
                        Sign In
                    </button>
                </form>

                <a href="{{ route('dashboard') }}"
                    class="mt-4 w-full inline-flex items-center justify-center gap-2 rounded-xl border border-slate-700 py-2.5 text-sm font-semibold text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
                    </svg>
                    Continue as Guest
                </a>
            </div>

            <p class="mt-6 text-center text-xs text-slate-600">© 2025 BloomCity Wiki — The Game Encyclopedia. Fan-made project.</p>
        </div>
    </div>
</body>
</html>

