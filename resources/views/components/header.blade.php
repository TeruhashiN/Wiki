<header class="sticky top-0 z-30 h-16 flex items-center gap-3 px-4 sm:px-6 bg-slate-950/80 backdrop-blur border-b border-slate-800">
    {{-- Mobile menu toggle --}}
    <button id="sidebarToggle" class="lg:hidden text-slate-400 hover:text-white p-2 rounded-lg hover:bg-slate-800 transition-colors" aria-label="Toggle sidebar">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
    </button>

    {{-- Search bar --}}
    <form action="{{ route('search') }}" method="GET" class="flex-1 max-w-xl">
        <div class="relative group">
            <svg class="w-5 h-5 text-slate-500 absolute left-3.5 top-1/2 -translate-y-1/2 group-focus-within:text-indigo-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
            </svg>
            <input type="text" name="q" placeholder="Search for items and news..."
                class="w-full h-10 pl-11 pr-4 rounded-xl bg-slate-900 border border-slate-800 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all">
            <span class="hidden sm:flex absolute right-3 top-1/2 -translate-y-1/2 text-[10px] font-semibold text-slate-500 border border-slate-700 rounded px-1.5 py-0.5">Ctrl K</span>
        </div>
    </form>

    {{-- Right actions --}}
    <div class="flex items-center gap-1.5 sm:gap-3 ml-auto">

        {{-- Quick nav (desktop) --}}
        <nav class="hidden xl:flex items-center gap-1 text-sm font-medium text-slate-300">
            <a href="https://discord.gg/ckjXc8dNu" target="_blank" rel="noopener noreferrer" class="px-3 py-2 rounded-lg hover:text-white hover:bg-slate-800 transition-colors">Discord</a>
            <a href="https://www.facebook.com/bloomcitygame" target="_blank" rel="noopener noreferrer" class="px-3 py-2 rounded-lg hover:text-white hover:bg-slate-800 transition-colors">Facebook</a>
        </nav>

        <span class="hidden xl:block h-6 w-px bg-slate-800 mx-1"></span>

        {{-- Notification bell --}}
        <button class="relative text-slate-400 hover:text-white p-2 rounded-lg hover:bg-slate-800 transition-colors" aria-label="Notifications">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
            </svg>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full border-2 border-slate-950"></span>
        </button>

        {{-- Account dropdown --}}
        @auth('bloom')
        @php
            $bloomUser = auth('bloom')->user();
            $isAdmin = $bloomUser->role === 'admin';
        @endphp
        <div id="headerProfileMenuContainer" class="dropdown shrink-0 relative">
            {{-- Dropdown Menu --}}
            <div id="headerProfileMenu"
                class="dropdown-menu absolute right-0 top-full mt-2 w-56 p-1.5 bg-slate-900 border border-slate-800 rounded-xl shadow-xl shadow-black/50 z-50 space-y-0.5"
                role="menu"
                aria-hidden="true"
                aria-labelledby="headerProfileMenuTrigger">

                <div class="px-2 py-1 text-[10px] font-bold tracking-wider text-slate-500 uppercase" role="presentation">Actions</div>

                @if($isAdmin || $bloomUser->role === 'moderator' || $bloomUser->role === 'bloom_user')
                <a href="{{ route('items.upload') }}" role="menuitem" tabindex="-1"
                    class="dropdown-item flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                    Upload Item
                </a>
                @endif

                @if($isAdmin)
                <a href="{{ route('admin.users') }}" role="menuitem" tabindex="-1"
                    class="dropdown-item flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235B8.967 8.967 0 0110 17.5c2.316 0 4.428.872 6 2.301"/></svg>
                    Add Role / Permissions
                </a>
                @endif

                <div class="my-1 border-t border-slate-800" role="presentation"></div>

                <a href="{{ route('account.settings') }}" role="menuitem" tabindex="-1"
                    class="dropdown-item flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56-.94 1.11-.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 010-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/></svg>
                    Account Settings
                </a>

                <div class="my-1 border-t border-slate-800" role="presentation"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" role="menuitem" tabindex="-1"
                        class="dropdown-item w-full flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>
                        Logout
                    </button>
                </form>
            </div>

            {{-- Profile Trigger Button --}}
            <button id="headerProfileMenuTrigger"
                class="hidden sm:inline-flex items-center gap-2.5 px-2 py-1.5 rounded-xl hover:bg-slate-800 transition-colors cursor-pointer text-left"
                aria-haspopup="menu"
                aria-expanded="false"
                aria-controls="headerProfileMenu">
                <div class="relative">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-sky-500 to-indigo-600 flex items-center justify-center text-white text-xs font-bold uppercase shadow-md shadow-indigo-500/30">
                        {{ strtoupper(substr($bloomUser->username, 0, 2)) }}
                    </div>
                    <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-emerald-400 rounded-full border-2 border-slate-950"></span>
                </div>
                <span class="hidden md:block text-left leading-tight">
                    <span class="block text-sm font-semibold text-white truncate max-w-[90px]">{{ $bloomUser->username }}</span>
                    <span class="block text-[10px] text-slate-500 capitalize">{{ $bloomUser->role }}</span>
                </span>
                <svg class="dropdown-chevron w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
            </button>

            {{-- Avatar (mobile) --}}
            <div class="sm:hidden relative group">
                <button id="headerMobileMenuTrigger"
                    class="w-9 h-9 rounded-full bg-gradient-to-br from-sky-500 to-indigo-600 flex items-center justify-center text-white text-sm font-bold uppercase shadow-md shadow-indigo-500/30"
                    aria-label="Account menu">
                    {{ strtoupper(substr($bloomUser->username, 0, 2)) }}
                </button>
                <div id="headerMobileMenu"
                    class="hidden absolute right-0 top-full mt-2 w-56 p-1.5 bg-slate-900 border border-slate-800 rounded-xl shadow-xl shadow-black/50 z-50 space-y-0.5">
                    <a href="{{ route('items.upload') }}" class="dropdown-item flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                        Upload Item
                    </a>
                    @if($isAdmin)
                    <a href="{{ route('admin.users') }}" class="dropdown-item flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235B8.967 8.967 0 0110 17.5c2.316 0 4.428.872 6 2.301"/></svg>
                        Add Role / Permissions
                    </a>
                    @endif
                    <div class="my-1 border-t border-slate-800"></div>
                    <a href="{{ route('account.settings') }}" class="dropdown-item flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56-.94 1.11-.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 010-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/></svg>
                    Account Settings
                </a>
                    <div class="my-1 border-t border-slate-800"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item w-full flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endauth
    </div>
</header>
