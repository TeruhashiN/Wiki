<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="icon" href="{{ asset('bloom.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Item — BloomCity Wiki</title>
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
                        <div class="w-12 h-12 rounded-2xl border border-slate-700 bg-slate-800/80 flex items-center justify-center text-2xl shadow-lg shadow-indigo-500/10">📤</div>
                        <div>
                            <h1 class="text-3xl font-black text-white tracking-tight">Upload Item</h1>
                            <p class="text-sm text-slate-500 mt-0.5">Choose an action below to get started.</p>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-wrap gap-3 mb-8">
                        @auth('bloom')
                        @if(in_array(auth('bloom')->user()->role, ['admin', 'moderator']))
                        <button type="button" id="btnNews" class="action-btn inline-flex items-center gap-3 rounded-xl border border-cyan-500/30 bg-slate-900/80 px-4 py-3 text-left hover:border-cyan-400 hover:shadow-lg hover:shadow-cyan-500/10">
                            <div class="w-10 h-10 shrink-0 rounded-lg bg-gradient-to-br from-cyan-600 to-sky-600 flex items-center justify-center text-white shadow-md shadow-cyan-500/20">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h.008v.008H12V7.5zm0 3.75h.008v.008H12v-.008zm0 3.75h.008v.008H12v-.008zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">Add News</h3>
                                <p class="text-xs text-slate-400 leading-relaxed hidden sm:block">Post an announcement</p>
                            </div>
                            <svg class="w-4 h-4 shrink-0 text-cyan-400 ml-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                        </button>
                        @endif
                        @endauth

                        @auth('bloom')
                        <button type="button" id="btnUpload" class="action-btn inline-flex items-center gap-3 rounded-xl border border-indigo-500/30 bg-slate-900/80 px-4 py-3 text-left hover:border-indigo-400 hover:shadow-lg hover:shadow-indigo-500/10">
                            <div class="w-10 h-10 shrink-0 rounded-lg bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-white shadow-md shadow-indigo-500/20">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">Upload Item</h3>
                                <p class="text-xs text-slate-400 leading-relaxed hidden sm:block">Add a new item</p>
                            </div>
                            <svg class="w-4 h-4 shrink-0 text-indigo-400 ml-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                        </button>
                        @else
                        <button type="button" id="btnUpload" class="action-btn inline-flex items-center gap-3 rounded-xl border border-indigo-500/30 bg-slate-900/80 px-4 py-3 text-left hover:border-indigo-400 hover:shadow-lg hover:shadow-indigo-500/10">
                            <div class="w-10 h-10 shrink-0 rounded-lg bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-white shadow-md shadow-indigo-500/20">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">Upload Item</h3>
                                <p class="text-xs text-slate-400 leading-relaxed hidden sm:block">Add a new item</p>
                            </div>
                            <svg class="w-4 h-4 shrink-0 text-indigo-400 ml-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                        </button>
                        @endauth

                        @auth('bloom')
                        @if(auth('bloom')->user()->role === 'admin')
                        <button type="button" id="btnManage" class="action-btn inline-flex items-center gap-3 rounded-xl border border-amber-500/30 bg-slate-900/80 px-4 py-3 text-left hover:border-amber-400 hover:shadow-lg hover:shadow-amber-500/10">
                            <div class="w-10 h-10 shrink-0 rounded-lg bg-gradient-to-br from-amber-600 to-orange-600 flex items-center justify-center text-white shadow-md shadow-amber-500/20">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">Manage Items</h3>
                                <p class="text-xs text-slate-400 leading-relaxed hidden sm:block">Edit or delete uploads</p>
                            </div>
                            <svg class="w-4 h-4 shrink-0 text-amber-400 ml-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                        </button>
                        @endif
                        @endauth

                        @auth('bloom')
                        @if(auth('bloom')->user()->role === 'admin')
                        <button type="button" id="btnCategory" class="action-btn inline-flex items-center gap-3 rounded-xl border border-emerald-500/30 bg-slate-900/80 px-4 py-3 text-left hover:border-emerald-400 hover:shadow-lg hover:shadow-emerald-500/10">
                            <div class="w-10 h-10 shrink-0 rounded-lg bg-gradient-to-br from-emerald-600 to-teal-600 flex items-center justify-center text-white shadow-md shadow-emerald-500/20">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h.008v.008H12V7.5zm0 3.75h.008v.008H12v-.008zm0 3.75h.008v.008H12v-.008zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">Add Categories</h3>
                                <p class="text-xs text-slate-400 leading-relaxed hidden sm:block">Create a new category</p>
                            </div>
                            <svg class="w-4 h-4 shrink-0 text-emerald-400 ml-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                        </button>
                        <button type="button" id="btnManageNews" class="action-btn inline-flex items-center gap-3 rounded-xl border border-rose-500/30 bg-slate-900/80 px-4 py-3 text-left hover:border-rose-400 hover:shadow-lg hover:shadow-rose-500/10">
                            <div class="w-10 h-10 shrink-0 rounded-lg bg-gradient-to-br from-rose-600 to-pink-600 flex items-center justify-center text-white shadow-md shadow-rose-500/20">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">Manage News</h3>
                                <p class="text-xs text-slate-400 leading-relaxed hidden sm:block">Edit or delete news</p>
                            </div>
                            <svg class="w-4 h-4 shrink-0 text-rose-400 ml-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                        </button>
                        @endif
                        @endauth
                    </div>

                    {{-- Category Form Panel --}}
                    @auth('bloom')
                    @if(auth('bloom')->user()->role === 'admin')
                    <div id="panelCategory" class="panel">
                        <div class="rounded-2xl border border-emerald-500/30 bg-slate-900/50 p-6 shadow-lg shadow-emerald-500/5">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-1 h-8 rounded-full bg-gradient-to-b from-emerald-500 to-teal-500"></div>
                                <div>
                                    <h2 class="text-lg font-bold text-white">Add Wiki Category</h2>
                                    <p class="text-xs text-slate-500">Fill in the details below to create a new category.</p>
                                </div>
                            </div>

                            <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
                                @csrf
                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500/50" required>
                                        @error('name')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Slug</label>
                                        <input type="text" name="slug" value="{{ old('slug') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500/50" required>
                                        @error('slug')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Description</label>
                                    <textarea name="description" rows="2" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500/50 resize-none">{{ old('description') }}</textarea>
                                    @error('description')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Icon</label>
                                        <input type="text" name="icon" value="{{ old('icon') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500/50">
                                        @error('icon')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-2">Sort Order</label>
                                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500/50">
                                        @error('sort_order')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <button type="submit" class="w-full py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 transition-all shadow-lg shadow-emerald-600/20 hover:shadow-xl hover:shadow-emerald-600/30">
                                    Add Category
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif
                    @endauth

                    {{-- Manage Items Panel --}}
                    @auth('bloom')
                    @if(auth('bloom')->user()->role === 'admin')
                    <div id="panelManage" class="panel">
                        <div class="rounded-2xl border border-amber-500/30 bg-slate-900/50 p-6 shadow-lg shadow-amber-500/5">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-1 h-8 rounded-full bg-gradient-to-b from-amber-500 to-orange-500"></div>
                                <div>
                                    <h2 class="text-lg font-bold text-white">Manage Items</h2>
                                    <p class="text-xs text-slate-500">Edit or delete existing uploads.</p>
                                </div>
                            </div>

                            <form id="manageSearchForm" action="{{ route('items.upload') }}" method="GET" class="mb-4">
                                <input type="hidden" name="panel" value="manage">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Search</label>
                                <input id="manageSearchInput" type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search items..." class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500/50">
                            </form>

                            <div id="manageItemsList" class="max-h-[360px] overflow-y-auto space-y-2 pr-1">
                                @include('items.partials.manage-items', ['uploads' => $uploads])
                            </div>
                        </div>
                    </div>
                    @endif
                    @endauth

                    {{-- News Form Panel --}}
                    @auth('bloom')
                    @if(in_array(auth('bloom')->user()->role, ['admin', 'moderator']))
                    <div id="panelNews" class="panel">
                        <div class="rounded-2xl border border-cyan-500/30 bg-slate-900/50 p-6 shadow-lg shadow-cyan-500/5">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-1 h-8 rounded-full bg-gradient-to-b from-cyan-500 to-sky-500"></div>
                                <div>
                                    <h2 class="text-lg font-bold text-white">Add News</h2>
                                    <p class="text-xs text-slate-500">Fill in the details below to post a new announcement.</p>
                                </div>
                            </div>

                            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                                @csrf
                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500/50" required>
                                    @error('title')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Image</label>
                                    <input type="file" name="image" accept="image/*" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500/50">
                                    @error('image')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Description</label>
                                    <textarea name="description" rows="3" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500/50 resize-none">{{ old('description') }}</textarea>
                                    @error('description')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">News By</label>
                                    <input type="text" name="news_by" value="{{ old('news_by') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500/50">
                                    @error('news_by')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Date</label>
                                    <input type="date" name="date" value="{{ old('date', now()->toDateString()) }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500/50">
                                    @error('date')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <button type="submit" class="w-full py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-cyan-600 to-sky-600 hover:from-cyan-500 hover:to-sky-500 transition-all shadow-lg shadow-cyan-600/20 hover:shadow-xl hover:shadow-cyan-600/30">
                                    Post News
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif
                    @endauth

                    {{-- Manage News Panel --}}
                    @auth('bloom')
                    @if(auth('bloom')->user()->role === 'admin')
                    <div id="panelManageNews" class="panel">
                        <div class="rounded-2xl border border-rose-500/30 bg-slate-900/50 p-6 shadow-lg shadow-rose-500/5">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-1 h-8 rounded-full bg-gradient-to-b from-rose-500 to-pink-500"></div>
                                <div>
                                    <h2 class="text-lg font-bold text-white">Manage News</h2>
                                    <p class="text-xs text-slate-500">Edit or delete existing news.</p>
                                </div>
                            </div>

                            <form id="manageNewsSearchForm" action="{{ route('items.upload') }}" method="GET" class="mb-4">
                                <input type="hidden" name="panel" value="manageNews">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">Search</label>
                                <input id="manageNewsSearchInput" type="text" name="search" value="{{ request('search') }}" placeholder="Search news..." class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-rose-500 focus:outline-none focus:ring-1 focus:ring-rose-500/50">
                            </form>

                            <div id="manageNewsList" class="max-h-[360px] overflow-y-auto space-y-2 pr-1">
                                @forelse($news ?? [] as $newsItem)
                                    <div class="flex items-center gap-3 p-3 rounded-xl border border-slate-800 bg-slate-950/40 hover:border-slate-700 transition-colors">
                                        <div class="w-10 h-10 shrink-0 rounded-lg overflow-hidden bg-slate-800 border border-slate-700">
                                            @if($newsItem->image)
                                                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-slate-500">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h.008v.008H12V7.5zm0 3.75h.008v.008H12v-.008zm0 3.75h.008v.008H12v-.008zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-bold text-white truncate">{{ $newsItem->title }}</p>
                                            <p class="text-[11px] text-slate-500">{{ $newsItem->news_by ?? 'Unknown' }} • {{ \Carbon\Carbon::parse($newsItem->date)->format('M d, Y') }}</p>
                                        </div>
                                        <div class="flex items-center gap-2 shrink-0">
                                            <a href="{{ route('news.edit', $newsItem->id) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-rose-400 hover:text-rose-300 hover:bg-rose-500/10 transition-colors">
                                                Edit
                                            </a>
                                            <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this news?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-colors">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <p class="text-sm text-slate-400">No news posted yet.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @endif
                    @endauth
                    {{-- Pending Items Panel --}}
                    @auth('bloom')
                    @if(auth('bloom')->user()->role === 'admin')
                    <div id="panelPending" class="panel">
                        <div class="rounded-2xl border border-amber-500/30 bg-slate-900/50 p-6 shadow-lg shadow-amber-500/5">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-1 h-8 rounded-full bg-gradient-to-b from-amber-500 to-orange-500"></div>
                                <div>
                                    <h2 class="text-lg font-bold text-white">Pending Items</h2>
                                    <p class="text-xs text-slate-500">Review and approve or reject uploads.</p>
                                </div>
                            </div>

                            <div id="pendingItemsList" class="max-h-[360px] overflow-y-auto space-y-2 pr-1">
                                @php
                                    $pendingUploads = \App\Models\Upload::with(['category', 'addedBy'])
                                        ->where('status', 'pending')
                                        ->orderByDesc('created_at')
                                        ->get();
                                @endphp
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
                                            <p class="text-[11px] text-slate-500">{{ $upload->category->name ?? 'No category' }} • {{ $upload->addedBy->username ?? 'Unknown' }} • {{ $upload->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="flex items-center gap-2 shrink-0">
                                            <form action="{{ route('uploads.accept', $upload->id) }}" method="POST" class="inline" onsubmit="return confirm('Accept this item?');">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-emerald-400 hover:text-emerald-300 hover:bg-emerald-500/10 transition-colors">
                                                    Accept
                                                </button>
                                            </form>
                                            <form action="{{ route('uploads.reject', $upload->id) }}" method="POST" class="inline" onsubmit="return confirm('Reject and delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-colors">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <p class="text-sm text-slate-400">No pending items.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @endif
                    @endauth
                    <div id="panelUpload" class="panel">
                        <div class="rounded-2xl border border-indigo-500/30 bg-slate-900/50 p-6 shadow-lg shadow-indigo-500/5">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-1 h-8 rounded-full bg-gradient-to-b from-indigo-500 to-purple-500"></div>
                                <div>
                                    <h2 class="text-lg font-bold text-white">Upload Item</h2>
                                    <p class="text-xs text-slate-500">Fill in the details below to upload a new item.</p>
                                </div>
                            </div>

                            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                                @csrf
                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Image</label>
                                    <input type="file" name="image" accept="image/*" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                    @error('image')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Category</label>
                                    <select name="category_id" id="categorySelect" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                        <option value="">Select category...</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" data-slug="{{ $category->slug }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" required>
                                    @error('name')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Description</label>
                                    <textarea name="description" rows="2" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50 resize-none">{{ old('description') }}</textarea>
                                    @error('description')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Price</label>
                                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                    @error('price')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                </div>

                                @auth('bloom')
                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">Added By</label>
                                    <input type="text" value="{{ auth('bloom')->user()->username ?? auth('bloom')->user()->getUsernameAttribute() }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50" readonly>
                                    <input type="hidden" name="added_by" value="{{ auth('bloom')->id() }}">
                                </div>
                                @endauth

                                {{-- Seed-specific fields (shown when Category = Seeds) --}}
                                <div id="seedFields" class="hidden">
                                    <div class="rounded-xl border border-slate-800 bg-slate-900/40 p-4 space-y-4">
                                        <h3 class="text-sm font-bold text-indigo-400">Seed Details</h3>

                                        <div class="grid sm:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-xs font-semibold text-slate-300 mb-2">Grow Time</label>
                                                <input type="text" name="seed[grow_time]" value="{{ old('seed.grow_time') }}" placeholder="e.g. 2h 30m" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                                @error('seed.grow_time')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold text-slate-300 mb-2">Issue Count</label>
                                                <input type="number" name="seed[issue_count]" value="{{ old('seed.issue_count', 0) }}" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                                @error('seed.issue_count')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-2">Issue Duration</label>
                                            <input type="text" name="seed[issue_duration]" value="{{ old('seed.issue_duration') }}" placeholder="e.g. Every 4h" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                            @error('seed.issue_duration')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-2">Quality</label>
                                            <input type="text" name="seed[quality]" value="{{ old('seed.quality') }}" placeholder="e.g. 50" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                            @error('seed.quality')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-2">Merit Event</label>
                                            <input type="text" name="seed[merit_event]" value="{{ old('seed.merit_event') }}" placeholder="e.g. -10 Rainy, +10 Sunny" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                            @error('seed.merit_event')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Tool-specific fields (shown when Category = Tools) --}}
                                <div id="toolFields" class="hidden">
                                    <div class="rounded-xl border border-slate-800 bg-slate-900/40 p-4 space-y-4">
                                        <h3 class="text-sm font-bold text-indigo-400">Tool Details</h3>

                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-2">BrokenChance Percent</label>
                                            <input type="text" name="tool[broken_chance]" value="{{ old('tool.broken_chance') }}" placeholder="e.g. 10%" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                            @error('tool.broken_chance')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-2">Problem</label>
                                            <input type="text" name="tool[problem]" value="{{ old('tool.problem') }}" placeholder="e.g. Fishing Rate, Energy Cost Reduction, etc... (just comma (,) for every new line)" class="w-full rounded-xl bg-slate-950 border border-slate-700 text-sm text-slate-200 p-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500/50">
                                            @error('tool.problem')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="w-full py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition-all shadow-lg shadow-indigo-600/20 hover:shadow-xl hover:shadow-indigo-600/30">
                                    Save Item
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>