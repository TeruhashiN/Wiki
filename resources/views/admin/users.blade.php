<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Role / Permissions — BloomCity Wiki</title>
    @vite(['resources/css/app.css', 'resources/css/items.css', 'resources/js/app.js', 'resources/js/items.js'])
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
                        <div class="w-12 h-12 rounded-2xl border border-slate-700 bg-slate-800/80 flex items-center justify-center text-2xl shadow-lg shadow-indigo-500/10">🔐</div>
                        <div>
                            <h1 class="text-3xl font-black text-white tracking-tight">Add Role / Permissions</h1>
                            <p class="text-sm text-slate-500 mt-0.5">Create a new user for the BloomCity Wiki.</p>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="mb-6 rounded-xl border border-emerald-500/30 bg-emerald-500/10 p-4 text-sm text-emerald-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="rounded-2xl border border-indigo-500/30 bg-slate-900/50 p-6 shadow-lg shadow-indigo-500/5">
                        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
                            @csrf

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Username</label>
                                <input type="text" name="bloom_username" value="{{ old('bloom_username') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                @error('bloom_username')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Password</label>
                                <input type="password" name="bloom_password" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                @error('bloom_password')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Role</label>
                                <select name="bloom_role" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                    <option value="user" {{ old('bloom_role') == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ old('bloom_role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="moderator" {{ old('bloom_role') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                                </select>
                                @error('bloom_role')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <button type="submit" class="w-full py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition-all shadow-lg shadow-indigo-600/20 hover:shadow-xl hover:shadow-indigo-600/30">
                                Create User
                            </button>
                        </form>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
