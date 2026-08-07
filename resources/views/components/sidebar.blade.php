<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-40 w-64 transform bg-slate-950/95 backdrop-blur border-r border-slate-800 transition-transform duration-300 -translate-x-full lg:translate-x-0 lg:static lg:z-auto lg:flex lg:flex-col flex flex-col"
    style="box-shadow: 8px 0 24px -12px rgba(0,0,0,0.5);">

    {{-- Brand / Logo --}}
    <div class="flex items-center gap-3 px-5 h-16 shrink-0 border-b border-slate-800/70">
        <div class="relative">
            <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-indigo-500 via-purple-500 to-fuchsia-500 flex items-center justify-center shadow-lg shadow-purple-500/30 overflow-hidden">
                <img src="{{ asset('images/bloom.jpg') }}" alt="Logo" class="w-full h-full object-cover">
            </div>
            <span class="absolute -top-0.5 -right-0.5 w-2.5 h-2.5 bg-emerald-400 rounded-full border-2 border-slate-950"></span>
        </div>
        <div>
            <h1 class="text-white font-bold text-lg leading-tight tracking-tight">BloomCity <span class="text-indigo-400">Wiki</span></h1>
            <p class="text-[10px] uppercase tracking-widest text-slate-500 font-medium">The Game Encyclopedia</p>
        </div>
    </div>

    {{-- Sidebar content (scrollable) --}}
    <div class="flex-1 overflow-y-auto px-3 py-4 space-y-6 sidebar-scroll">

        {{-- Main Navigation --}}
        <nav class="space-y-1">
            <p class="px-3 mb-2 text-[11px] font-semibold uppercase tracking-widest text-slate-500">Main Menu</p>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/70 transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75"/>
                </svg>
                Home
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-white bg-gradient-to-r from-indigo-600/40 to-purple-600/30 border border-indigo-500/30">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-1.036.7-1.93 1.5-2.122"/>
                </svg>
                Dashboard
                <span class="ml-auto text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-500/20 text-indigo-300">NEW</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/70 transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 5.625c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"/>
                </svg>
                Items
                <span class="ml-auto text-slate-600 text-xs font-bold">1924</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/70 transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a2.25 2.25 0 00-1.036 2.968l.413.826a2.25 2.25 0 001.036 1.036l.826.413a2.25 2.25 0 002.968-1.036l.048-.143a2.25 2.25 0 01.886-1.161l.766-.51a2.25 2.25 0 011.49-.216l.89.213c.216.054.448-.025.66-.194a2.25 2.25 0 00.467-.659l.149-.322a2.25 2.25 0 00-1.026-2.854l-.463-.206a2.25 2.25 0 01-1.036-1.036l-.206-.463a2.25 2.25 0 00-2.854-1.026l-.322.149a2.25 2.25 0 01-1.07.15l-.274-.05a2.25 2.25 0 00-2.25 3.004l.052.133z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9.75l-2.25 2.25 1.5 1.5 2.25-2.25-1.5-1.5zM6.75 3.75c-1.5 1.5-3 3.75-3 6.75s1.5 5.25 3 6.75c0 0-1.5 1.5-3 1.5 1.5 1.5 3 2.25 6 2.25"/>
                </svg>
                New Releases
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/70 transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-amber-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                </svg>
                Top Rated
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/70 transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                </svg>
                Upcoming
            </a>
        </nav>

        {{-- Community --}}
        <nav class="space-y-1">
            <p class="px-3 mb-2 text-[11px] font-semibold uppercase tracking-widest text-slate-500">Community</p>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/70 transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/>
                </svg>
                Forums
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/70 transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                </svg>
                Achievements
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/70 transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                </svg>
                Players
            </a>
        </nav>
    </div>

    {{-- Sidebar footer: user profile + dropdown --}}
    @auth('bloom')
    @php
        $bloomUser = auth('bloom')->user();
        $isAdmin = $bloomUser->role === 'admin';
    @endphp
    <div id="profileMenuContainer" class="dropdown shrink-0 p-4 border-t border-slate-800/70 relative">

        {{-- Dropdown Menu (Pops up above profile) --}}
        <div id="profileMenu"
            class="dropdown-menu absolute bottom-full left-4 right-4 mb-2 p-1.5 bg-slate-900 border border-slate-800 rounded-xl shadow-xl shadow-black/50 z-50 space-y-0.5"
            role="menu"
            aria-hidden="true"
            aria-labelledby="profileMenuTrigger">

            {{-- Section 1: Quick Actions --}}
            <div class="px-2 py-1 text-[10px] font-bold tracking-wider text-slate-500 uppercase" role="presentation">Actions</div>

            <a href="#" role="menuitem" tabindex="-1"
                class="dropdown-item flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                </svg>
                Upload Item
            </a>

            @if ($isAdmin)
            <a href="#" role="menuitem" tabindex="-1"
                class="dropdown-item flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235B8.967 8.967 0 0110 17.5c2.316 0 4.428.872 6 2.301"/>
                </svg>
                Add Role / Permissions
            </a>
            @endif

            <div class="my-1 border-t border-slate-800" role="presentation"></div>

            {{-- Section 2: Preferences & System --}}
            <a href="#" role="menuitem" tabindex="-1"
                class="dropdown-item flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 010-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Account Settings
            </a>

            {{-- Section 3: Account / Logout --}}
            <div class="my-1 border-t border-slate-800" role="presentation"></div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" role="menuitem" tabindex="-1"
                    class="dropdown-item w-full flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>

        {{-- Profile Trigger Button --}}
        <button id="profileMenuTrigger"
            class="w-full flex items-center gap-3 px-2 py-2 rounded-xl hover:bg-slate-800/60 transition-colors cursor-pointer text-left"
            aria-haspopup="menu"
            aria-expanded="false"
            aria-controls="profileMenu">
            <div class="relative">
                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-sky-500 to-indigo-600 flex items-center justify-center text-white text-sm font-bold shadow-md shadow-indigo-500/30 uppercase">
                    {{ strtoupper(substr($bloomUser->username, 0, 2)) }}
                </div>
                <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-400 rounded-full border-2 border-slate-950"></span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ $bloomUser->username }}</p>
                <p class="text-[11px] text-slate-500 truncate capitalize">{{ $bloomUser->role }}</p>
            </div>
            <svg class="dropdown-chevron w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
            </svg>
        </button>
    </div>
    @else
    {{-- Guest state: Login button --}}
    <div class="shrink-0 p-4 border-t border-slate-800/70">
        <a href="{{ route('login') }}"
            class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-800/60 transition-colors group">
            <div class="relative">
                <div class="w-9 h-9 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 text-sm font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                </div>
                <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-slate-600 rounded-full border-2 border-slate-950"></span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-slate-300 truncate">Guest</p>
                <p class="text-[11px] text-slate-500 truncate">Not signed in</p>
            </div>
            <span class="text-[11px] font-bold px-2.5 py-1 rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 text-white group-hover:from-indigo-500 group-hover:to-purple-500 transition-all shadow-md shadow-indigo-600/20">
                Login
            </span>
        </a>
    </div>
    @endauth
</aside>

