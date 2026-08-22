@forelse($uploads as $upload)
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
            <p class="text-[11px] text-slate-500">{{ $upload->category->name ?? 'No category' }}</p>
        </div>
        <div class="flex items-center gap-2 shrink-0">
            @if($upload->status === 'pending')
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider text-amber-300 bg-amber-500/10 border border-amber-500/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                    Pending
                </span>
            @else
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider text-emerald-300 bg-emerald-500/10 border border-emerald-500/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    Accepted
                </span>
            @endif
            <a href="{{ route('uploads.edit', $upload->id) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-amber-400 hover:text-amber-300 hover:bg-amber-500/10 transition-colors">
                Edit
            </a>
            <form action="{{ route('uploads.destroy', $upload->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
        <p class="text-sm text-slate-400">No items uploaded yet.</p>
    </div>
@endforelse

@if($uploads->hasPages())
    <div class="mt-4 flex items-center justify-center gap-2">
        {{ $uploads->links() }}
    </div>
@endif
