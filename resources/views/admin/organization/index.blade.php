@extends('layouts.admin')

@section('title', 'Pengurus Organisasi')
@section('subtitle', 'Kelola struktur kepengurusan dan anggota paguyuban Odeon.')

@section('content')

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        <div class="relative w-full sm:w-96">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="iconoir-search text-gray-400 dark:text-white/40 text-lg"></i>
            </div>
            <input id="searchInput" type="text"
                class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold outline-none transition-all duration-300 placeholder:text-gray-400 dark:placeholder:text-white/30 shadow-sm"
                placeholder="Cari nama atau divisi...">
        </div>

        <button onclick="openFormModal('add')"
            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 py-3 px-6 rounded-xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-lg shadow-brand-accent/20 dark:shadow-brand-gold/20 hover:-translate-y-0.5 transition-all duration-300 outline-none border-none cursor-pointer">
            <i class="iconoir-plus"></i> Tambah Pengurus
        </button>
    </div>

    <div
        class="bg-white dark:bg-[#1E1212] rounded-[2rem] border border-gray-100 dark:border-white/5 shadow-sm overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 dark:bg-black/20 border-b border-gray-100 dark:border-white/5">
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 w-16">
                            No</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">
                            Nama</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">
                            Divisi</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">
                            Email</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">
                            No. Telepon</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 text-center w-32">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-white/5">

                    @foreach ($pengurus as $item)
                        <tr class="group hover:bg-gray-50/80 dark:hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 text-sm font-semibold text-brand-muted dark:text-white/50">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 text-sm font-bold text-brand-text dark:text-white">
                                {{ $item->nama }}
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-md bg-rose-50 dark:bg-brand-accent/10 text-brand-accent dark:text-brand-gold text-[10px] font-bold uppercase tracking-wider border border-rose-100 dark:border-brand-accent/20">
                                    {{ $item->jabatan }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-sm text-brand-muted dark:text-white/70">
                                {{ $item->email }}
                            </td>

                            <td class="px-6 py-4 text-sm text-brand-muted dark:text-white/70">
                                {{ $item->no_wa }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    <button type="button"
                                        onclick="openDetailModal('{{ $item->nama }}',
                                        '{{ $item->jabatan }}',
                                        '{{ $item->tahun_bergabung }}',
                                        '{{ $item->email }}',
                                        '{{ $item->no_wa }}',
                                        '{{ $item->photo ? asset('storage/' . $item->photo) : asset('images/default-user.png') }}'
                                        )"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-600 hover:text-white transition-colors tooltip-trigger outline-none border-none cursor-pointer"
                                        title="Detail">
                                        <i class="iconoir-eye text-sm"></i>
                                    </button>

                                    <button type="button"
                                        onclick="openFormModal(
                                        'edit',
                                        '{{ $item->id }}',
                                        '{{ $item->nama }}',
                                        '{{ $item->jabatan }}',
                                        '{{ $item->email }}',
                                        '{{ $item->no_wa }}',
                                        '{{ $item->tahun_bergabung }}'
                                        )"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white transition-colors tooltip-trigger outline-none border-none cursor-pointer"
                                        title="Edit">

                                        <i class="iconoir-edit-pencil text-sm"></i>

                                    </button>

                                    <form action="{{ route('admin.organizations.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 hover:bg-rose-600 hover:text-white transition-colors tooltip-trigger outline-none border-none cursor-pointer"
                                            title="Hapus">
                                            <i class="iconoir-trash text-sm"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-100 dark:border-white/5 flex items-center justify-between">
            <p class="text-xs text-brand-muted dark:text-white/50 font-medium">Menampilkan <span
                    class="font-bold text-brand-text dark:text-white">2</span> pengurus</p>
        </div>
    </div>

    <div id="formModal"
        class="fixed inset-0 z-[100] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer" onclick="closeModal('formModal')">
        </div>
        <div
            class="relative w-full max-w-2xl bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl overflow-hidden flex flex-col max-h-[95vh]">

            <div
                class="px-6 py-5 border-b border-gray-100 dark:border-white/5 flex items-center justify-between bg-gray-50/50 dark:bg-black/20">
                <div>
                    <h3 id="formModalTitle" class="font-bold text-brand-text dark:text-white text-lg">Tambah Pengurus Baru
                    </h3>
                    <p class="text-xs text-brand-muted dark:text-brand-gold/70 mt-0.5">Lengkapi data profil pengurus
                        organisasi.</p>
                </div>
                <button type="button" onclick="closeModal('formModal')"
                    class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-rose-50 dark:hover:bg-rose-500/10 text-gray-400 dark:text-white/40 hover:text-rose-500 dark:hover:text-rose-400 transition-colors outline-none cursor-pointer border-none bg-transparent">
                    <i class="iconoir-xmark text-xl"></i>
                </button>
            </div>

            <div class="p-6 sm:p-8 overflow-y-auto custom-scrollbar flex-1">
                <form action="{{ route('admin.organizations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Nama Lengkap <span
                                    class="text-rose-500">*</span></label>
                            <input type="text" name="nama" required placeholder="Contoh: Hendra Saputra"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold transition-all placeholder:text-gray-400 dark:placeholder:text-white/30">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Jabatan / Divisi
                                <span class="text-rose-500">*</span></label>
                            <input type="text" name="jabatan" required placeholder="Contoh: Humas & Pemasaran"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold transition-all placeholder:text-gray-400 dark:placeholder:text-white/30">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Email Akses <span
                                    class="text-rose-500">*</span></label>
                            <input type="email" name="email" required placeholder="Contoh: email@kampoengnaga.com"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold transition-all placeholder:text-gray-400 dark:placeholder:text-white/30">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Nomor Telepon / WA
                                <span class="text-rose-500">*</span></label>
                            <input type="number" name="no_wa" required placeholder="Contoh: 081234567890"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold transition-all placeholder:text-gray-400 dark:placeholder:text-white/30">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-8">
                        <div>
                            <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Tahun Bergabung
                                <span class="text-rose-500">*</span></label>
                            <input type="number" name="tahun_bergabung" required placeholder="Contoh: 2020"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold transition-all placeholder:text-gray-400 dark:placeholder:text-white/30">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Foto
                                Profil</label>
                            <label
                                class="flex flex-col items-center justify-center w-full h-12 rounded-xl border border-dashed border-gray-300 dark:border-white/20 hover:bg-gray-50 dark:hover:bg-white/5 transition-all cursor-pointer">
                                <span class="text-xs text-gray-500 dark:text-white/50 flex items-center gap-2"><i
                                        class="iconoir-cloud-upload"></i> Unggah Foto (Max 1MB)</span>
                                <input type="file" name="photo" class="hidden" accept="image/*" />
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row gap-3 pt-6 border-t border-gray-100 dark:border-white/5">
                        <button type="button" onclick="closeModal('formModal')"
                            class="w-full sm:w-auto px-8 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-transparent text-gray-600 dark:text-white/60 font-bold text-sm hover:bg-gray-50 dark:hover:bg-white/5 transition-colors outline-none cursor-pointer">Batal</button>
                        <button type="submit" id="formSubmitBtn"
                            class="w-full sm:w-auto flex-1 py-3.5 rounded-xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-lg shadow-brand-accent/20 dark:shadow-brand-gold/20 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2 outline-none cursor-pointer border-none">
                            <i class="iconoir-floppy-disk text-lg"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="detailModal"
        class="fixed inset-0 z-[100] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer"
            onclick="closeModal('detailModal')"></div>
        <div class="relative w-full max-w-sm bg-white dark:bg-[#1E1212] rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col transform scale-95 transition-transform duration-300"
            id="detailModalCard">

            <button type="button" onclick="closeModal('detailModal')"
                class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-black/10 hover:bg-rose-500 text-brand-dark hover:text-white dark:text-white transition-colors outline-none cursor-pointer border-none z-10">
                <i class="iconoir-xmark text-xl"></i>
            </button>

            <div class="p-8 pb-10 flex flex-col items-center text-center relative mt-6">
                <div
                    class="w-28 h-28 rounded-full overflow-hidden border-4 border-white dark:border-[#0A0505] shadow-lg mb-5 bg-gray-100">
                    <img id="detailPhoto" src="" alt="Profile" class="w-full h-full object-cover">
                </div>

                <h3 id="detailNama" class="font-serif text-2xl font-bold text-brand-text dark:text-white mb-1"></h3>
                <p id="detailJabatan"
                    class="inline-flex items-center px-3 py-1 rounded-full bg-rose-50 dark:bg-brand-accent/10 text-brand-accent dark:text-brand-gold text-[10px] font-extrabold uppercase tracking-widest mb-6">
                </p>

                <div class="w-full space-y-4 text-left border-t border-gray-100 dark:border-white/5 pt-6">
                    <div>
                        <p
                            class="text-[10px] font-bold text-brand-muted dark:text-white/40 uppercase tracking-widest mb-1">
                            Tahun Bergabung
                        </p>

                        <p class="text-sm font-semibold text-brand-text dark:text-white flex items-center gap-2">
                            <i class="iconoir-calendar text-brand-accent dark:text-brand-gold"></i>
                            <span id="detailTahun"></span>
                        </p>
                    </div>

                    <div>
                        <p
                            class="text-[10px] font-bold text-brand-muted dark:text-white/40 uppercase tracking-widest mb-1">
                            Email
                        </p>

                        <p class="text-sm font-semibold text-brand-text dark:text-white flex items-center gap-2">
                            <i class="iconoir-mail text-brand-accent dark:text-brand-gold"></i>
                            <span id="detailEmail"></span>
                        </p>
                    </div>

                    <div>
                        <p
                            class="text-[10px] font-bold text-brand-muted dark:text-white/40 uppercase tracking-widest mb-1">
                            Nomor Telepon
                        </p>

                        <p class="text-sm font-semibold text-brand-text dark:text-white flex items-center gap-2">
                            <i class="iconoir-phone text-brand-accent dark:text-brand-gold"></i>
                            <span id="detailWa"></span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="deleteModal"
        class="fixed inset-0 z-[100] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer"
            onclick="closeModal('deleteModal')"></div>
        <div class="relative w-full max-w-sm bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl p-8 text-center transform scale-95 transition-transform duration-300"
            id="deleteModalCard">

            <div
                class="w-20 h-20 rounded-full bg-rose-50 dark:bg-rose-500/10 flex items-center justify-center text-rose-500 mx-auto mb-5">
                <i class="iconoir-trash text-4xl"></i>
            </div>

            <h3 class="font-bold text-brand-text dark:text-white text-xl mb-2">Hapus Pengurus?</h3>
            <p class="text-sm text-brand-muted dark:text-white/60 mb-8 leading-relaxed">Anda yakin ingin menghapus data
                pengurus ini? Tindakan ini tidak dapat dibatalkan.</p>

            <div class="flex flex-col gap-3">
                <button type="button"
                    class="w-full py-3.5 rounded-xl bg-rose-500 text-white font-bold text-sm shadow-lg shadow-rose-500/30 hover:bg-rose-600 transition-colors outline-none border-none cursor-pointer">
                    Ya, Hapus Permanen
                </button>
                <button type="button" onclick="closeModal('deleteModal')"
                    class="w-full py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-transparent text-brand-text dark:text-white font-bold text-sm hover:bg-gray-50 dark:hover:bg-white/5 transition-colors outline-none cursor-pointer">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script>
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('opacity-0');

            const card = document.getElementById(modalId + 'Card');
            if (card) card.classList.replace('scale-100', 'scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        /* GANTI SCRIPT openFormModal LAMA KAMU DENGAN INI SAJA */
        /* CSS HTML TIDAK DIUBAH */

        function openFormModal(
            type,
            id = '',
            nama = '',
            jabatan = '',
            email = '',
            wa = '',
            tahun = ''
        ) {

            const modal = document.getElementById('formModal');
            const title = document.getElementById('formModalTitle');
            const btnText = document.getElementById('formSubmitBtn');
            const form = document.querySelector('#formModal form');

            let methodField = document.getElementById('methodField');

            if (!methodField) {
                methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.id = 'methodField';
                form.appendChild(methodField);
            }

            if (type === 'add') {

                title.innerText = "Tambah Pengurus Baru";
                btnText.innerHTML =
                    '<i class="iconoir-floppy-disk text-lg"></i> Simpan Data';

                form.action = "{{ route('admin.organizations.store') }}";

                methodField.removeAttribute('name');
                methodField.removeAttribute('value');

                form.reset();

            } else {

                title.innerText = "Edit Data Pengurus";
                btnText.innerHTML =
                    '<i class="iconoir-check-circle text-lg"></i> Perbarui Data';

                form.action = "/admin/organizations/" + id;

                methodField.name = "_method";
                methodField.value = "PUT";

                form.querySelector('[name=nama]').value = nama;
                form.querySelector('[name=jabatan]').value = jabatan;
                form.querySelector('[name=email]').value = email;
                form.querySelector('[name=no_wa]').value = wa;
                form.querySelector('[name=tahun_bergabung]').value = tahun;
            }

            modal.classList.remove('hidden');

            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
        }

        function openDetailModal(nama, jabatan, tahun, email, wa, photo) {

            document.getElementById('detailNama').innerText = nama;
            document.getElementById('detailJabatan').innerText = jabatan;
            document.getElementById('detailTahun').innerText = tahun;
            document.getElementById('detailEmail').innerText = email;
            document.getElementById('detailWa').innerText = wa;
            document.getElementById('detailPhoto').src = photo;

            const modal = document.getElementById('detailModal');
            const card = document.getElementById('detailModalCard');

            modal.classList.remove('hidden');

            setTimeout(() => {
                modal.classList.remove('opacity-0');
                card.classList.replace('scale-95', 'scale-100');
            }, 10);
        }

        function openDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const card = document.getElementById('deleteModalCard');

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                card.classList.replace('scale-95', 'scale-100');
            }, 10);
        }

        const searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('keyup', function() {

            const keyword = this.value.toLowerCase();

            const rows = document.querySelectorAll('tbody tr');

            rows.forEach((row, index) => {

                const nama = row.children[1].innerText.toLowerCase();
                const jabatan = row.children[2].innerText.toLowerCase();
                const email = row.children[3].innerText.toLowerCase();
                const wa = row.children[4].innerText.toLowerCase();

                if (
                    nama.includes(keyword) ||
                    jabatan.includes(keyword) ||
                    email.includes(keyword) ||
                    wa.includes(keyword)
                ) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }

            });

        });
    </script>

@endsection
