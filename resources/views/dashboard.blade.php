<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GameWiki — The Game Encyclopedia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar-scroll::-webkit-scrollbar { width: 5px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: #334155; border-radius: 999px; }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover { background: #475569; }
        .hero-gradient {
            background:
                radial-gradient(ellipse 80% 60% at 70% 20%, rgba(99,102,241,0.35), transparent),
                radial-gradient(ellipse 60% 50% at 20% 80%, rgba(217,70,239,0.25), transparent),
                linear-gradient(135deg, #0f172a 0%, #1e1b4b 55%, #2e1065 100%);
        }
    </style>
</head>
<body class="h-full bg-slate-950 text-slate-200 antialiased">

    {{-- Mobile overlay --}}
    <div id="sidebarOverlay" class="fixed inset-0 z-30 bg-slate-950/60 backdrop-blur-sm hidden lg:hidden"></div>

    <div class="min-h-full flex">

        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main column --}}
        <div class="flex-1 flex flex-col min-w-0">

            {{-- Header --}}
            @include('components.header')

            {{-- Page content --}}
            <main class="flex-1 p-4 sm:p-6 lg:p-8 space-y-6 lg:space-y-8">

                {{-- Hero spotlight --}}
                <section class="relative overflow-hidden rounded-2xl border border-slate-800 hero-gradient">
                    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 fill=%22none%22/><circle cx=%2220%22 cy=%2220%22 r=%222%22 fill=%22white%22/><circle cx=%2280%22 cy=%2280%22 r=%222%22 fill=%22white%22/><circle cx=%2250%22 cy=%2250%22 r=%221%22 fill=%22white%22/></svg>');"></div>

                    <div class="relative p-6 sm:p-10 lg:p-12 grid lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/15 border border-indigo-400/30 text-indigo-300 text-xs font-semibold mb-4">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
                                GAME OF THE WEEK
                            </div>
                            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight">
                                Eldoria: <span class="bg-gradient-to-r from-indigo-400 via-purple-400 to-fuchsia-400 bg-clip-text text-transparent">Shattered Realms</span>
                            </h1>
                            <p class="mt-4 text-slate-400 text-sm sm:text-base leading-relaxed max-w-lg">
                                A breathtaking open-world RPG where ancient kingdoms collide. Forge alliances, master forbidden magic, and shape the fate of Eldoria across a sprawling 200-hour campaign.
                            </p>

                            <div class="mt-5 flex flex-wrap items-center gap-3">
                                <span class="flex items-center gap-1 text-sm font-semibold text-white">
                                    <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                                    9.4
                                </span>
                                <span class="text-xs text-slate-500 font-medium px-2 py-1 rounded-md bg-slate-800/80 border border-slate-700">RPG</span>
                                <span class="text-xs text-slate-500 font-medium px-2 py-1 rounded-md bg-slate-800/80 border border-slate-700">Open World</span>
                                <span class="text-xs text-slate-500 font-medium px-2 py-1 rounded-md bg-slate-800/80 border border-slate-700">PC</span>
                                <span class="text-xs text-slate-500 font-medium px-2 py-1 rounded-md bg-slate-800/80 border border-slate-700">PS5</span>
                                <span class="text-xs text-slate-500 font-medium px-2 py-1 rounded-md bg-slate-800/80 border border-slate-700">Xbox</span>
                            </div>

                            <div class="mt-6 flex flex-wrap gap-3">
                                <a href="#" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition-all shadow-xl shadow-indigo-600/30">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 010 1.972l-11.54 6.347a1.125 1.125 0 01-1.667-.986V5.653z"/></svg>
                                    Play Now
                                </a>
                                <a href="#" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-bold text-white bg-slate-800/80 hover:bg-slate-700/80 border border-slate-700 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                                    Add to Library
                                </a>
                            </div>
                        </div>

                        {{-- Hero visual / stats cards --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 rounded-xl border border-slate-700/50 bg-slate-900/60 backdrop-blur p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Player Count</p>
                                    <span class="text-[10px] font-bold text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded-full">LIVE</span>
                                </div>
                                <div class="flex items-end gap-1 h-16">
                                    @php
                                        $bars = [35, 55, 45, 70, 60, 85, 75, 95, 82, 100, 88, 92];
                                    @endphp
                                    @foreach($bars as $i => $h)
                                        <div class="flex-1 rounded-t bg-gradient-to-t from-indigo-600 to-purple-400 opacity-70 hover:opacity-100 transition-opacity" style="height: {{ $h }}%;"></div>
                                    @endforeach
                                </div>
                                <p class="mt-3 text-sm text-slate-400"><span class="text-white font-bold text-lg">2.4M</span> playing right now</p>
                            </div>

                            <div class="rounded-xl border border-slate-700/50 bg-slate-900/60 backdrop-blur p-4">
                                <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Rating</p>
                                <div class="mt-2 flex items-center gap-1">
                                    <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                                    <span class="text-2xl font-black text-white">9.4</span>
                                </div>
                                <p class="mt-1 text-xs text-slate-500">Based on 128K reviews</p>
                            </div>

                            <div class="rounded-xl border border-slate-700/50 bg-slate-900/60 backdrop-blur p-4">
                                <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Metascore</p>
                                <div class="mt-2 flex items-center gap-1">
                                    <span class="w-8 h-8 rounded-md bg-emerald-500/20 border border-emerald-500/40 flex items-center justify-center text-emerald-400 text-sm font-black">94</span>
                                    <span class="text-xs text-slate-500 ml-1">Must-Play</span>
                                </div>
                                <p class="mt-2 text-xs text-slate-500">#1 this week</p>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Stats row --}}
                <section class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @php
                        $stats = [
                            ['label' => 'Games in Database', 'value' => '1,924', 'icon' => 'game', 'color' => 'text-indigo-400 bg-indigo-500/10 border-indigo-500/20'],
                            ['label' => 'Registered Players', 'value' => '482K', 'icon' => 'users', 'color' => 'text-purple-400 bg-purple-500/10 border-purple-500/20'],
                            ['label' => 'Community Reviews', 'value' => '2.1M', 'icon' => 'chat', 'color' => 'text-emerald-400 bg-emerald-500/10 border-emerald-500/20'],
                            ['label' => 'Total Downloads', 'value' => '38.9M', 'icon' => 'download', 'color' => 'text-amber-400 bg-amber-500/10 border-amber-500/20'],
                        ];
                    @endphp
                    @foreach($stats as $stat)
                        <div class="flex items-center gap-4 rounded-xl border border-slate-800 bg-slate-900/50 p-4 sm:p-5 hover:border-slate-700 hover:bg-slate-900 transition-all">
                            <div class="w-11 h-11 shrink-0 rounded-lg border flex items-center justify-center {{ $stat['color'] }}">
                                @if($stat['icon'] === 'game')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/></svg>
                                @elseif($stat['icon'] === 'users')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                                @elseif($stat['icon'] === 'chat')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/></svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <p class="text-xl sm:text-2xl font-black text-white">{{ $stat['value'] }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ $stat['label'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </section>

                {{-- Trending games grid + Top rated --}}
                <div class="grid xl:grid-cols-3 gap-6 lg:gap-8">

                    {{-- Trending games --}}
                    <section class="xl:col-span-2">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="flex items-center gap-2 text-lg font-bold text-white">
                                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25l-2.25 3-2.25 3H3v-6zM3 12h7.5l2.25 3 2.25 3H3v-6z"/></svg>
                                Trending Now
                            </h2>
                            <a href="#" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">View All →</a>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            @php
                                $games = [
                                    ['title' => 'Cyberstorm 2077', 'genre' => 'Action RPG', 'rating' => '9.2', 'platforms' => ['PC', 'PS5'], 'gradient' => 'from-cyan-500 via-blue-600 to-indigo-700', 'badge' => 'HOT'],
                                    ['title' => 'Shadow of the Void', 'genre' => 'Adventure', 'rating' => '8.9', 'platforms' => ['PC', 'Xbox'], 'gradient' => 'from-purple-500 via-fuchsia-600 to-pink-700', 'badge' => null],
                                    ['title' => 'Neon Drift: Turbo', 'genre' => 'Racing', 'rating' => '8.5', 'platforms' => ['PS5', 'Switch'], 'gradient' => 'from-orange-500 via-red-500 to-rose-600', 'badge' => 'NEW'],
                                    ['title' => 'Kingdom Tactics III', 'genre' => 'Strategy', 'rating' => '9.0', 'platforms' => ['PC'], 'gradient' => 'from-emerald-500 via-teal-600 to-cyan-700', 'badge' => null],
                                ];
                            @endphp
                            @foreach($games as $game)
                                <a href="#" class="group relative overflow-hidden rounded-xl border border-slate-800 bg-slate-900 hover:border-slate-600 transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-indigo-900/20">
                                    {{-- Cover art (gradient) --}}
                                    <div class="relative h-32 bg-gradient-to-br {{ $game['gradient'] }} overflow-hidden">
                                        <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 fill=%22none%22/><circle cx=%2220%22 cy=%2220%22 r=%223%22 fill=%22white%22/><circle cx=%2280%22 cy=%2270%22 r=%224%22 fill=%22white%22/><circle cx=%2250%22 cy=%2285%22 r=%222%22 fill=%22white%22/></svg>');"></div>
                                        @if($game['badge'])
                                            <span class="absolute top-3 left-3 text-[10px] font-black px-2 py-1 rounded-md bg-white/15 backdrop-blur border border-white/30 text-white">{{ $game['badge'] }}</span>
                                        @endif
                                        <div class="absolute bottom-3 right-3 w-10 h-10 rounded-full bg-slate-950/70 backdrop-blur flex items-center justify-center opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 010 1.972l-11.54 6.347a1.125 1.125 0 01-1.667-.986V5.653z"/></svg>
                                        </div>
                                    </div>

                                    <div class="p-4">
                                        <div class="flex items-start justify-between gap-2">
                                            <div class="min-w-0">
                                                <h3 class="font-bold text-white text-sm truncate group-hover:text-indigo-300 transition-colors">{{ $game['title'] }}</h3>
                                                <p class="text-xs text-slate-500 mt-0.5">{{ $game['genre'] }}</p>
                                            </div>
                                            <span class="flex items-center gap-1 text-xs font-bold text-amber-400 shrink-0">
                                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                                                {{ $game['rating'] }}
                                            </span>
                                        </div>
                                        <div class="mt-3 flex flex-wrap gap-1.5">
                                            @foreach($game['platforms'] as $plat)
                                                <span class="text-[10px] font-semibold text-slate-400 bg-slate-800 border border-slate-700 rounded px-1.5 py-0.5">{{ $plat }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </section>

                    {{-- Top rated list --}}
                    <section>
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="flex items-center gap-2 text-lg font-bold text-white">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                                Top Rated
                            </h2>
                            <a href="#" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">See All →</a>
                        </div>

                        <div class="rounded-xl border border-slate-800 bg-slate-900/50 divide-y divide-slate-800/70">
                            @php
                                $top = [
                                    ['rank' => 1, 'title' => 'The Witcher\'s of Valor', 'rating' => '9.7', 'gradient' => 'from-emerald-500 to-teal-600'],
                                    ['rank' => 2, 'title' => 'Gods of War Ragnarok', 'rating' => '9.6', 'gradient' => 'from-red-500 to-rose-600'],
                                    ['rank' => 3, 'title' => 'Elden Horizons', 'rating' => '9.5', 'gradient' => 'from-indigo-500 to-purple-600'],
                                    ['rank' => 4, 'title' => 'Baldur\'s Gate of Legends', 'rating' => '9.3', 'gradient' => 'from-amber-500 to-orange-600'],
                                    ['rank' => 5, 'title' => 'Final Fantasy Reborn', 'rating' => '9.2', 'gradient' => 'from-sky-500 to-blue-600'],
                                ];
                            @endphp
                            @foreach($top as $t)
                                <a href="#" class="flex items-center gap-3 p-3 hover:bg-slate-800/50 transition-colors group">
                                    <span class="w-7 h-7 shrink-0 rounded-lg bg-gradient-to-br {{ $t['gradient'] }} flex items-center justify-center text-white text-xs font-black shadow-md">{{ $t['rank'] }}</span>
                                    <span class="flex-1 min-w-0">
                                        <span class="block text-sm font-semibold text-white truncate group-hover:text-indigo-300 transition-colors">{{ $t['title'] }}</span>
                                        <span class="block text-[11px] text-slate-500">Action RPG</span>
                                    </span>
                                    <span class="flex items-center gap-1 text-xs font-bold text-amber-400 shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                                        {{ $t['rating'] }}
                                    </span>
                                </a>
                            @endforeach
                        </div>

                        {{-- Quick genre filter pills --}}
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach(['Action', 'RPG', 'Shooter', 'Strategy', 'Racing', 'Indie'] as $g)
                                <a href="#" class="text-xs font-semibold text-slate-400 bg-slate-900 border border-slate-800 hover:border-indigo-500 hover:text-white hover:bg-indigo-500/10 rounded-full px-3 py-1.5 transition-colors">{{ $g }}</a>
                            @endforeach
                        </div>
                    </section>
                </div>

                {{-- Latest news --}}
                <section>
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="flex items-center gap-2 text-lg font-bold text-white">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                            Latest News
                        </h2>
                        <a href="#" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">All News →</a>
                    </div>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @php
                            $news = [
                                ['title' => 'Summer Gaming Fest 2025: All the Big Reveals', 'tag' => 'Events', 'date' => '2 hours ago', 'gradient' => 'from-indigo-600 to-purple-700'],
                                ['title' => 'Patch 3.2 Brings Major Balance Changes to Arena', 'tag' => 'Update', 'date' => '5 hours ago', 'gradient' => 'from-emerald-600 to-teal-700'],
                                ['title' => 'Indie Spotlight: 10 Hidden Gems You Must Try', 'tag' => 'Features', 'date' => '8 hours ago', 'gradient' => 'from-orange-500 to-red-600'],
                            ];
                        @endphp
                        @foreach($news as $n)
                            <a href="#" class="group rounded-xl overflow-hidden border border-slate-800 bg-slate-900/50 hover:border-slate-600 transition-all hover:-translate-y-0.5">
                                <div class="h-24 bg-gradient-to-br {{ $n['gradient'] }} relative">
                                    <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 fill=%22none%22/><circle cx=%2225%22 cy=%2225%22 r=%222%22 fill=%22white%22/><circle cx=%2275%22 cy=%2275%22 r=%222%22 fill=%22white%22/></svg>');"></div>
                                    <span class="absolute top-3 left-3 text-[10px] font-bold px-2 py-0.5 rounded bg-slate-950/60 backdrop-blur border border-white/20 text-white">{{ $n['tag'] }}</span>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-sm font-bold text-white leading-snug group-hover:text-indigo-300 transition-colors line-clamp-2">{{ $n['title'] }}</h3>
                                    <p class="mt-2 text-[11px] text-slate-500 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        {{ $n['date'] }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>

                {{-- Footer --}}
                <footer class="pt-4 border-t border-slate-800/70 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-600">
                    <p>© 2025 GameWiki — The Game Encyclopedia. Fan-made project.</p>
                    <div class="flex items-center gap-4">
                        <a href="#" class="hover:text-slate-400 transition-colors">About</a>
                        <a href="#" class="hover:text-slate-400 transition-colors">Contact</a>
                        <a href="#" class="hover:text-slate-400 transition-colors">Privacy</a>
                        <a href="#" class="hover:text-slate-400 transition-colors">Terms</a>
                    </div>
                </footer>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggle = document.getElementById('sidebarToggle');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }

            if (toggle) {
                toggle.addEventListener('click', function (e) {
                    e.stopPropagation();
                    if (sidebar.classList.contains('-translate-x-full')) {
                        openSidebar();
                    } else {
                        closeSidebar();
                    }
                });
            }

            if (overlay) {
                overlay.addEventListener('click', closeSidebar);
            }

            // Keyboard shortcut: Ctrl+K focuses search
            document.addEventListener('keydown', function (e) {
                if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
                    e.preventDefault();
                    const input = document.querySelector('header input[type="text"]');
                    if (input) input.focus();
                }
            });
        });
    </script>
</body>
</html>

