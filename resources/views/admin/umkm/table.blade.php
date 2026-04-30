@forelse($umkms as $item)
    @php
        $detailJson = json_encode(
            [
                'name' => $item->name,
                'owner_highlight' => $item->owner_highlight,
                'category' => $item->category,
                'address' => $item->address,
                'is_open' => $item->is_open,
                'price_start' => $item->price_start,
                'open_time' => \Carbon\Carbon::parse($item->open_time)->format('H:i'),
                'close_time' => \Carbon\Carbon::parse($item->close_time)->format('H:i'),
                'whatsapp' => $item->whatsapp,
                'slogan' => $item->slogan,
                'description' => $item->description,
                'main_image' => asset('storage/' . $item->main_image),
                'menu' => $item->menu ?? [],
            ],
            JSON_HEX_APOS | JSON_HEX_QUOT,
        );
    @endphp
    <tr
        class="group hover:bg-gray-50/80 dark:hover:bg-white/5 transition-colors {{ !$item->is_open ? 'opacity-70' : '' }}">

        <td class="px-6 py-4 text-sm font-semibold text-brand-muted dark:text-white/50 text-center">
            {{ $loop->iteration }}
        </td>

        <td class="px-6 py-4">
            <p
                class="text-sm font-bold {{ $item->is_open ? 'text-brand-text dark:text-white' : 'text-gray-500 dark:text-white/50' }} truncate max-w-[200px]">
                {{ $item->name }}
            </p>
        </td>

        <td class="px-6 py-4">
            <p
                class="text-sm {{ $item->is_open ? 'text-brand-text dark:text-white/80' : 'text-gray-500 dark:text-white/50' }}">
                {{ $item->owner_highlight }}
            </p>
        </td>

        <td class="px-6 py-4">
            <span
                class="inline-flex items-center px-2.5 py-1 rounded-md bg-amber-50 dark:bg-brand-gold/10 text-amber-600 dark:text-brand-gold text-[10px] font-bold uppercase tracking-wider border border-amber-100 dark:border-brand-gold/20">
                {{ $item->category }}
            </span>
        </td>

        <td class="px-6 py-4">
            <a href="https://wa.me/{{ $item->whatsapp }}" target="_blank"
                class="inline-flex items-center gap-1.5 text-sm font-bold hover:text-emerald-500 transition-colors no-underline">
                {{ $item->whatsapp }}
            </a>
        </td>

        <td class="px-6 py-4 text-center">
            @if ($item->is_open)
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-[10px] font-extrabold uppercase border border-emerald-200 dark:border-emerald-500/20">
                    Buka
                </span>
            @else
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 text-[10px] font-extrabold uppercase border border-rose-200 dark:border-rose-500/20">
                    Tutup
                </span>
            @endif
        </td>

        <td class="px-6 py-4">
            <div class="flex items-center justify-center gap-2">

                <button type="button" data-detail="{{ $detailJson }}" onclick="openDetailModal(this)"
                    class="w-8 h-8 rounded-lg flex items-center justify-center bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-600 hover:text-white transition-colors outline-none border-none cursor-pointer">
                    <i class="iconoir-eye text-sm"></i>
                </button>

                <a href="{{ route('admin.umkm.edit', $item->id) }}"
                    class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white transition-colors">
                    <i class="iconoir-edit-pencil text-sm"></i>
                </a>

                <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 hover:bg-rose-600 hover:text-white transition-colors outline-none border-none cursor-pointer">
                        <i class="iconoir-trash text-sm"></i>
                    </button>
                </form>

            </div>
        </td>

    </tr>
@empty
    <tr>
        <td colspan="7" class="px-6 py-8 text-center text-sm text-brand-muted dark:text-white/50">
            Data tidak ditemukan
        </td>
    </tr>
@endforelse
