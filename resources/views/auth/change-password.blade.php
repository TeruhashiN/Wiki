<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings — BloomCity Wiki</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-950 text-slate-200 antialiased">

    <div id="sidebarOverlay" class="fixed inset-0 z-30 bg-slate-950/60 backdrop-blur-sm hidden lg:hidden"></div>

    <div class="min-h-full flex">
        @include('components.sidebar')

        <div class="flex-1 flex flex-col min-w-0">
            @include('components.header')

            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <section class="max-w-2xl mx-auto">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 rounded-2xl border border-slate-700 bg-slate-800/80 flex items-center justify-center text-2xl shadow-lg shadow-indigo-500/10">🔒</div>
                        <div>
                            <h1 class="text-3xl font-black text-white tracking-tight">Account Settings</h1>
                            <p class="text-sm text-slate-500 mt-0.5">Update your password to keep your account secure.</p>
                        </div>
                    </div>

                    @if(session('status'))
                        <div class="mb-6 rounded-xl border border-emerald-500/30 bg-emerald-500/10 p-4 text-sm text-emerald-400">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="rounded-2xl border border-indigo-500/30 bg-slate-900/50 p-6 shadow-lg shadow-indigo-500/5">
                        <form action="{{ route('account.password.update') }}" method="POST" class="space-y-5">
                            @csrf

                            <div>
                                <label for="current_password" class="block text-xs font-semibold text-slate-300 mb-2">Current Password</label>
                                <input type="password" id="current_password" name="current_password" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                @error('current_password')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="password" class="block text-xs font-semibold text-slate-300 mb-2">New Password</label>
                                <input type="password" id="password" name="password" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                @error('password')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-xs font-semibold text-slate-300 mb-2">Confirm New Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                            </div>

                            <div class="flex items-center gap-3 pt-2">
                                <button type="submit" class="py-3 px-6 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition-all shadow-lg shadow-indigo-600/20 hover:shadow-xl hover:shadow-indigo-600/30">
                                    Update Password
                                </button>
                                <a href="{{ route('dashboard') }}" class="py-3 px-6 rounded-xl text-sm font-semibold text-slate-300 border border-slate-700 hover:text-white hover:bg-slate-800 transition-colors">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
