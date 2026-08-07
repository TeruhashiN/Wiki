<header class="sticky top-0 z-30 h-16 flex items-center gap-3 px-4 sm:px-6 bg-slate-950/80 backdrop-blur border-b border-slate-800">
    {{-- Mobile menu toggle --}}
    <button id="sidebarToggle" class="lg:hidden text-slate-400 hover:text-white p-2 rounded-lg hover:bg-slate-800 transition-colors" aria-label="Toggle sidebar">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
    </button>

    {{-- Search bar --}}
    <div class="flex-1 max-w-xl">
        <div class="relative group">
            <svg class="w-5 h-5 text-slate-500 absolute left-3.5 top-1/2 -translate-y-1/2 group-focus-within:text-indigo-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
            </svg>
            <input type="text" placeholder="Search for games, genres, platforms..."
                class="w-full h-10 pl-11 pr-4 rounded-xl bg-slate-900 border border-slate-800 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all">
            <span class="hidden sm:flex absolute right-3 top-1/2 -translate-y-1/2 text-[10px] font-semibold text-slate-500 border border-slate-700 rounded px-1.5 py-0.5">Ctrl K</span>
        </div>
    </div>

    {{-- Right actions --}}
    <div class="flex items-center gap-1.5 sm:gap-3 ml-auto">

        {{-- Quick nav (desktop) --}}
        <nav class="hidden xl:flex items-center gap-1 text-sm font-medium text-slate-300">
            <a href="#" class="px-3 py-2 rounded-lg hover:text-white hover:bg-slate-800 transition-colors">Latest</a>
            <a href="#" class="px-3 py-2 rounded-lg hover:text-white hover:bg-slate-800 transition-colors">Gameplay</a>
            <a href="#" class="px-3 py-2 rounded-lg hover:text-white hover:bg-slate-800 transition-colors">Community</a>
        </nav>

        <span class="hidden xl:block h-6 w-px bg-slate-800 mx-1"></span>

        {{-- Notification bell --}}
        <button class="relative text-slate-400 hover:text-white p-2 rounded-lg hover:bg-slate-800 transition-colors" aria-label="Notifications">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
            </svg>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full border-2 border-slate-950"></span>
        </button>

        {{-- Sign In button --}}
        <a href="#" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition-all shadow-lg shadow-indigo-600/20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
            </svg>
            Sign In
        </a>

        {{-- Avatar (mobile) --}}
        <button class="sm:hidden w-9 h-9 rounded-full bg-gradient-to-br from-sky-500 to-indigo-600 flex items-center justify-center text-white text-sm font-bold shadow-md shadow-indigo-500/30" aria-label="Account">
            BG
        </button>
    </div>
</header>
