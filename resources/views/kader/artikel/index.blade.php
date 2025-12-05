<x-app-main title="Manajemen Artikel">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <div class="p-6 md:p-8 min-h-screen">

        <div
            class="gsap-header opacity-0 -translate-y-5 flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-800 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-posyanduu/10 text-posyanduu flex items-center justify-center">
                        <i class="fas fa-newspaper"></i>
                    </span>
                    Daftar Artikel
                </h2>
                <p class="text-gray-500 mt-1 text-sm ml-14">Kelola konten informasi untuk pengguna.</p>
            </div>

            <a href="{{ route('kader.artikel.create') }}"
                class="group bg-gradient-to-r from-posyanduu to-teal-600 text-white px-6 py-3 rounded-xl hover:shadow-lg hover:shadow-teal-500/30 transition-all duration-300 flex items-center gap-2 font-medium">
                <i class="fas fa-plus group-hover:rotate-90 transition-transform duration-300"></i>
                <span>Tambah Artikel</span>
            </a>
        </div>

        @if (session('success'))
            <div
                class="gsap-header opacity-0 mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-green-100 p-2 rounded-full text-green-600">
                        <i class="fas fa-check"></i>
                    </div>
                    <p class="text-green-700 font-medium">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-gray-50/50 border-b border-gray-100 text-gray-500 text-xs uppercase tracking-wider">
                            <th class="px-6 py-4 font-bold">Artikel</th>
                            <th class="px-6 py-4 font-bold">Kategori</th>
                            <th class="px-6 py-4 font-bold">Penulis & Tanggal</th>
                            <th class="px-6 py-4 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($artikels as $item)
                            <tr
                                class="gsap-row opacity-0 translate-y-5 hover:bg-gray-50/80 transition-colors duration-200 group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="relative w-16 h-16 flex-shrink-0 rounded-lg overflow-hidden shadow-sm border border-gray-200 group-hover:shadow-md transition-shadow">
                                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                                alt="Thumbnail">
                                        </div>
                                        <div>
                                            <h3
                                                class="font-bold text-gray-800 group-hover:text-posyanduu transition-colors line-clamp-1 text-base">
                                                {{ $item->judul }}
                                            </h3>
                                            <span class="text-xs text-gray-400">ID: #{{ $item->id }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    @php
                                        $isBalita = $item->kategori == 'Balita';
                                        $badgeClass = $isBalita
                                            ? 'bg-blue-50 text-blue-600 border-blue-100'
                                            : 'bg-pink-50 text-pink-600 border-pink-100';
                                        $iconClass = $isBalita ? 'fa-baby' : 'fa-female';
                                    @endphp
                                    <span
                                        class="px-3 py-1.5 rounded-full text-xs font-bold border {{ $badgeClass }} inline-flex items-center gap-1.5">
                                        <i class="fas {{ $iconClass }}"></i>
                                        {{ $item->kategori }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <i class="far fa-user text-gray-400 text-xs"></i> {{ $item->penulis }}
                                        </span>
                                        <span class="text-xs text-gray-500 flex items-center gap-2 mt-1">
                                            <i class="far fa-clock text-gray-400 text-xs"></i>
                                            {{ $item->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-3">
                                        <a href="{{ route('kader.artikel.edit', $item->id) }}"
                                            class="w-9 h-9 rounded-lg bg-yellow-50 text-yellow-600 flex items-center justify-center hover:bg-yellow-500 hover:text-white transition-all duration-200 shadow-sm hover:shadow-yellow-200"
                                            title="Edit Artikel">
                                            <i class="fas fa-edit text-sm"></i>
                                        </a>

                                        <form action="{{ route('kader.artikel.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-9 h-9 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm hover:shadow-red-200"
                                                title="Hapus Artikel">
                                                <i class="fas fa-trash-alt text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div
                                            class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-folder-open text-3xl text-gray-300"></i>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-800">Belum ada artikel</h3>
                                        <p class="text-gray-500 text-sm mt-1">Mulai dengan menambahkan artikel baru.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                {{ $artikels->links() }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tl = gsap.timeline({
                defaults: {
                    ease: "power3.out"
                }
            });

            // 1. Header turun dari atas
            tl.to(".gsap-header", {
                    y: 0,
                    opacity: 1,
                    duration: 0.8,
                    stagger: 0.1
                })
                // 2. Baris tabel muncul satu per satu (Stagger)
                .to(".gsap-row", {
                    y: 0,
                    opacity: 1,
                    duration: 0.6,
                    stagger: 0.1
                }, "-=0.4");
        });
    </script>
</x-app-main>
