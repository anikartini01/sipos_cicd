<x-app-main title="Riwayat Pemeriksaan">

    <main class="ml-2 md:ml-2">

        <div id="headerBox" class="mb-6 opacity-0">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                <i class="fas fa-notes-medical text-posyanduu"></i>
                Riwayat Pemeriksaan
            </h2>
            <p class="text-gray-600 text-sm">Ringkasan pemeriksaan balita & ibu hamil Anda</p>
        </div>

        <!-- Balita Section -->
        <h3 class="text-lg font-semibold text-gray-700 mt-6 mb-3 flex items-center gap-2 opacity-0" id="sub1">
            <i class="fas fa-child text-posyanduu"></i>
            Balita
        </h3>

        <div id="balitaList">
            @forelse ($balitas as $balita)
                <div class="riwayat-card opacity-0 mb-4">
                    <div class="flex items-center gap-3 mb-2">
                        <div
                            class="w-10 h-10 bg-posyanduu/10 text-posyanduu flex items-center justify-center rounded-full">
                            <i class="fas fa-baby"></i>
                        </div>
                        <div>
                            <h4 class="text-md font-bold text-gray-800">{{ $balita->nama_balita }}</h4>
                            <p class="text-gray-600 text-xs">NIK: {{ $balita->nik }}</p>
                        </div>
                    </div>

                    <p class="text-sm text-gray-700 mb-2">
                        Orang Tua: <span class="font-medium">{{ $balita->nama_orang_tua }}</span>
                    </p>

                    <a href="{{ route('laporan.pdf', ['tipe' => 'balita', 'id' => $balita->id]) }}"
                        class="download-btn">
                        <i class="fas fa-file-download mr-2"></i>
                        Download Riwayat
                    </a>
                </div>

            @empty
                <p class="empty-text">Tidak ada data balita yang terdaftar.</p>
            @endforelse
        </div>

        <!-- Ibu Hamil -->
        <h3 class="text-lg font-semibold text-gray-700 mt-8 mb-3 flex items-center gap-2 opacity-0" id="sub2">
            <i class="fas fa-female text-pink-500"></i>
            Ibu Hamil
        </h3>

        <div id="ibuList">
            @forelse ($ibuHamils as $ibu)
                <div class="riwayat-card opacity-0 mb-4">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-pink-200 text-pink-500 flex items-center justify-center rounded-full">
                            <i class="fas fa-user-md"></i>
                        </div>

                        <div>
                            <h4 class="text-md font-bold text-gray-800">{{ $ibu->nama_ibu_hamil }}</h4>
                            <p class="text-gray-600 text-xs">NIK: {{ $ibu->nik_ibu_hamil }}</p>
                        </div>
                    </div>

                    @if ($ibu->pemeriksaanTerakhir)
                        <p class="text-sm text-gray-700">
                            Pemeriksaan terakhir:
                            <span class="font-medium">{{ $ibu->pemeriksaanTerakhir->tanggal }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 italic">Belum ada pemeriksaan</p>
                    @endif

                    <a href="{{ route('laporan.pdf', ['tipe' => 'ibu', 'id' => $ibu->id]) }}" class="download-btn">
                        <i class="fas fa-file-download mr-2"></i>
                        Download Riwayat
                    </a>
                </div>
            @empty
                <p class="empty-text">Belum ada data ibu hamil.</p>
            @endforelse
        </div>

    </main>
</x-app-main>

<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<style>
    .riwayat-card {
        background: white;
        border-radius: 14px;
        padding: 16px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
        transition: 0.2s ease;
    }

    .riwayat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .download-btn {
        display: inline-flex;
        align-items: center;
        margin-top: 10px;
        padding: 8px 14px;
        background: #5daaaa;
        color: white;
        border-radius: 10px;
        font-size: 13px;
        transition: 0.2s;
    }

    .download-btn:hover {
        background: #4e9191;
        transform: scale(1.05);
    }

    .empty-text {
        color: #777;
        font-style: italic;
        padding: 10px 0;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        // Header
        gsap.to("#headerBox", {
            opacity: 1,
            duration: 0.8,
            y: 0,
            ease: "power2.out"
        });

        // Subtitles
        gsap.to("#sub1", {
            opacity: 1,
            y: 0,
            duration: 0.6,
            delay: 0.2
        });
        gsap.to("#sub2", {
            opacity: 1,
            y: 0,
            duration: 0.6,
            delay: 0.4
        });

        // Cards Balita
        gsap.to("#balitaList .riwayat-card", {
            opacity: 1,
            y: 0,
            duration: 0.5,
            ease: "power2.out",
            stagger: 0.12,
            delay: 0.3
        });

        // Cards Ibu Hamil
        gsap.to("#ibuList .riwayat-card", {
            opacity: 1,
            y: 0,
            duration: 0.5,
            ease: "power2.out",
            stagger: 0.12,
            delay: 0.5
        });
    });
</script>
