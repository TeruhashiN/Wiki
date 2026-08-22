<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Items — BloomCity Wiki</title>
    @vite(['resources/css/app.css', 'resources/css/upload.css', 'resources/js/app.js', 'resources/js/upload.js'])
</head>
<body class="h-full bg-slate-950 text-slate-200 antialiased">

    <div id="sidebarOverlay" class="fixed inset-0 z-30 bg-slate-950/60 backdrop-blur-sm hidden lg:hidden"></div>

    <div class="min-h-full flex">
        @include('components.sidebar')

        <div class="flex-1 flex flex-col min-w-0">
            @include('components.header')

            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <section class="max-w-3xl mx-auto">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 rounded-2xl border border-amber-700 bg-slate-800/80 flex items-center justify-center text-2xl shadow-lg shadow-amber-500/10">⏳</div>
                        <div>
                            <h1 class="text-3xl font-black text-white tracking-tight">Pending Items</h1>
                            <p class="text-sm text-slate-500 mt-0.5">Review user uploads and accept or reject them.</p>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-amber-500/30 bg-slate-900/50 p-6 shadow-lg shadow-amber-500/5">
                        <div id="pendingItemsList" class="max-h-[600px] overflow-y-auto space-y-2 pr-1">
                            @forelse($pendingUploads as $upload)
                                <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-800 bg-slate-950/40 hover:border-slate-700 transition-colors">
                                    <div class="w-10 h-10 shrink-0 rounded-lg overflow-hidden bg-slate-800 border border-slate-700">
                                        @if($upload->image)
                                            <img src="{{ asset('storage/' . $upload->image) }}" alt="{{ $upload->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-500">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0 1.125.504 1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-bold text-white truncate">{{ $upload->name }}</p>
                                        <p class="text-[11px] text-slate-500">{{ $upload->category->name ?? 'No category' }} • {{ $upload->addedBy->username ?? 'Unknown' }} • {{ $upload->created_at->format('M d, Y h:i A') }}</p>
                                        @if($upload->description)
                                            <p class="text-xs text-slate-400 mt-1 line-clamp-2">{{ $upload->description }}</p>
                                        @endif
                                    </div>
                                    <div class="flex items-center gap-2 shrink-0">
                                        <form action="{{ route('uploads.accept', $upload->id) }}" method="POST" class="inline" onsubmit="return confirm('Accept this item? It will be visible to all users.');">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="px-4 py-2 rounded-lg text-xs font-bold text-emerald-400 hover:text-emerald-300 hover:bg-emerald-500/10 transition-colors border border-emerald-500/30">
                                                Accept
                                            </button>
                                        </form>
                                        <form action="{{ route('uploads.reject', $upload->id) }}" method="POST" class="inline" onsubmit="return confirm('Reject and permanently delete this item? This cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 rounded-lg text-xs font-bold text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-colors border border-red-500/30">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <p class="text-4xl mb-3">✅</p>
                                    <p class="text-sm text-slate-400">No pending items to review.</p>
                                </div>
                            @endforelse
                        </div>

                        @if($pendingUploads->hasPages())
                            <div class="mt-4 flex items-center justify-center gap-2">
                                {{ $pendingUploads->links() }}
                            </div>
                        @endif
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
