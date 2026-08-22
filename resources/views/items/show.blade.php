<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $upload->name }} — BloomCity Wiki</title>
    @vite(['resources/css/app.css', 'resources/css/items.css', 'resources/js/app.js', 'resources/js/items.js'])
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
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <div class="w-full mx-auto grid lg:grid-cols-[1fr_320px] gap-8">
                    {{-- Main content --}}
                    <div class="min-w-0 space-y-6">
                        {{-- Back button --}}
                        <a href="{{ $upload->category ? route('categories.show', $upload->category->slug) : route('items') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56-.94 1.11-.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 010-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/></svg>
                            Back
                        </a>

                        {{-- Breadcrumb --}}
                        <nav class="flex items-center gap-2 text-xs text-slate-500">
                            <a href="{{ route('items') }}" class="hover:text-white transition-colors">Items</a>
                            <span>/</span>
                            <a href="{{ $upload->category ? route('categories.show', $upload->category->slug) : route('items') }}" class="hover:text-white transition-colors">{{ $upload->category->name ?? 'Items' }}</a>
                            <span>/</span>
                            <span class="text-slate-300 truncate">{{ $upload->name }}</span>
                        </nav>
                        {{-- Title --}}
                        <h1 class="text-3xl sm:text-4xl font-black text-white border-b border-slate-800 pb-4">
                            {{ $upload->name }}
                        </h1>
                        {{-- Description --}}
                        <section>
                            <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                                {{ $upload->description ?? 'No description provided.' }}
                            </p>
                        </section>
                        {{-- Price section --}}
                        @if($upload->price)
                            <section class="rounded-2xl border border-emerald-500/30 bg-slate-900/50 p-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.5-2.303 1.5-3.659s-.328-2.78-1.5-3.659L12 3m0 0h.008"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Price</p>
                                        <p class="text-xl font-black text-emerald-400">🪙{{ number_format($upload->price, 2) }}</p>
                                    </div>
                                </div>
                            </section>
                        @endif
                    </div>
                    {{-- Wikipedia-style infobox --}}
                    <aside class="lg:sticky lg:top-24 h-fit">
                        <div class="rounded-2xl border border-slate-800 bg-slate-900/50 overflow-hidden">
                            <div class="bg-slate-800/50 px-4 py-3 border-b border-slate-800">
                                <h3 class="text-xs font-bold text-white uppercase tracking-wider">Infobox</h3>
                            </div>
                            <div class="p-4 space-y-4">
                                {{-- Image --}}
                                <div>
                                    @if($upload->image)
                                        <img src="{{ asset('storage/' . $upload->image) }}" alt="{{ $upload->name }}" class="w-full rounded-xl border border-slate-700 object-cover bg-slate-950">
                                    @else
                                        <div class="w-full aspect-video rounded-xl border border-slate-800 bg-slate-950/40 flex items-center justify-center text-slate-500 text-xs">
                                            No image
                                        </div>
                                    @endif
                                </div>
                                {{-- Details --}}
                                <table class="w-full text-xs">
                                    <tbody class="divide-y divide-slate-800">
                                        <tr>
                                            <td class="py-2 text-slate-500 font-semibold w-1/2">Name</td>
                                            <td class="py-2 text-slate-200">{{ $upload->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 text-slate-500 font-semibold">Category</td>
                                            <td class="py-2 text-slate-200">{{ $upload->category->name ?? '—' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 text-slate-500 font-semibold">Price</td>
                                            <td class="py-2 text-slate-200">{{ $upload->price ? '🪙' . number_format($upload->price, 2) : '—' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 text-slate-500 font-semibold">Added By</td>
                                            <td class="py-2 text-slate-200">{{ $upload->addedBy->username ?? '—' }}</td>
                                        </tr>
                                        @if($upload->category && $upload->category->slug === 'seeds' && $upload->seed)
                                            <tr>
                                                <td class="py-2 text-slate-500 font-semibold">Grow Time</td>
                                                <td class="py-2 text-slate-200">{{ $upload->seed->grow_time ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 text-slate-500 font-semibold">Issue Count</td>
                                                <td class="py-2 text-slate-200">{{ $upload->seed->issue_count ?? 0 }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 text-slate-500 font-semibold">Issue Duration</td>
                                                <td class="py-2 text-slate-200">{{ $upload->seed->issue_duration ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 text-slate-500 font-semibold">Quality</td>
                                                <td class="py-2 text-slate-200">{{ $upload->seed->quality ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 text-slate-500 font-semibold">Merit Event</td>
                                                <td class="py-2 text-slate-200">{{ $upload->seed->merit_event ?? '—' }}</td>
                                            </tr>
                                        @endif
                                        @if($upload->category && $upload->category->slug === 'tools' && $upload->tool)
                                            <tr>
                                                <td class="py-2 text-slate-500 font-semibold">BrokenChance</td>
                                                <td class="py-2 text-slate-200">{{ $upload->tool->broken_chance ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 text-slate-500 font-semibold align-top">Problem</td>
                                                <td class="py-2 text-slate-200">
                                                    @if($upload->tool && $upload->tool->problem)
                                                        @foreach(explode(',', $upload->tool->problem) as $line)
                                                            {{ trim($line) }}<br>
                                                        @endforeach
                                                    @else
                                                        —
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </aside>
                </div>

                {{-- Related items by alphabet --}}
                @if(isset($groupedUploads) && $groupedUploads->count() > 0)
                    <div class="mt-8">
                        <h2 class="text-lg font-bold text-white mb-4">More in {{ $upload->category->name ?? 'this category' }}</h2>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($groupedUploads as $letter => $items)
                                <div class="rounded-xl border border-slate-800 bg-slate-900/50 p-4">
                                    <h3 class="text-sm font-bold text-indigo-400 mb-3 uppercase tracking-wider">{{ $letter }}</h3>
                                    <ul class="space-y-2">
                                        @foreach($items as $index => $related)
                                            <li class="flex items-center gap-2 text-xs">
                                                <span class="w-5 h-5 rounded-md bg-slate-800 border border-slate-700 flex items-center justify-center text-[10px] font-bold text-slate-400 shrink-0">{{ $index + 1 }}</span>
                                                <a href="{{ route('uploads.show', $related->id) }}" class="text-slate-300 hover:text-white transition-colors truncate">{{ $related->name }}</a>
                                                @if($related->status === 'pending')
                                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse shrink-0" title="Waiting for approval"></span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </main>
        </div>
    </div>
</body>
</html>