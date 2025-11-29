<x-app-main title="Jadwal">

    <div id="jadwalWrapper" class="space-y-4 p-4 bg-white rounded-lg shadow-md opacity-0">

        <h1 class="text-xl font-bold text-slate-800 flex items-center gap-2">
            <i class="fas fa-calendar-day text-posyanduu"></i>
            Jadwal Mendatang
        </h1>

        @forelse ($jadwals as $jadwal)
            <div class="jadwal-card flex items-center p-4 border border-gray-200 rounded-lg mt-4 opacity-0">
                <!-- Tanggal -->
                <div
                    class="bg-posyanduu text-white rounded-lg w-14 h-14 flex flex-col items-center justify-center shadow-md">
                    <span class="font-bold text-lg">
                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->translatedFormat('d') }}
                    </span>
                    <span class="text-xs opacity-80 -mt-1">
                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->translatedFormat('M') }}
                    </span>
                </div>

                <!-- Info -->
                <div class="ml-4 flex-1">
                    <h3 class="font-semibold text-gray-800 text-md">{{ $jadwal->keterangan }}</h3>
                    <p class="text-sm text-gray-600 flex items-center gap-2">
                        <i class="far fa-clock text-gray-400"></i>
                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }}
                        -
                        {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}
                        |
                        <i class="fas fa-map-marker-alt text-gray-400"></i>
                        {{ $jadwal->lokasi }}
                    </p>
                </div>

                <!-- Detail -->
                <div class="flex space-x-2">
                    <a href="{{ route('pengguna.show', $jadwal->slug) }}"
                        class="text-posyanduu underline underline-offset-2 hover:text-teal-600 transition text-sm flex items-center gap-1">
                        <i class="fas fa-info-circle"></i>
                        Detail
                    </a>
                </div>
            </div>

        @empty
            <div class="flex flex-col justify-center items-center py-10">
                <i class="fa-solid fa-calendar-xmark text-6xl text-gray-400 animate-pulse"></i>
                <p class="text-gray-500 mt-3 text-lg text-center">Belum ada jadwal tersedia.</p>
            </div>
        @endforelse
    </div>

</x-app-main>

<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<style>
    .jadwal-card {
        transition: 0.2s ease;
    }

    .jadwal-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07);
        border-color: #89c9c9;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Fade-in container
        gsap.to("#jadwalWrapper", {
            opacity: 1,
            duration: 0.6,
            y: 0,
            ease: "power2.out"
        });

        // Animate each card
        gsap.to(".jadwal-card", {
            opacity: 1,
            y: 0,
            duration: 0.5,
            stagger: 0.15,
            ease: "power2.out",
            delay: 0.2
        });
    });
</script>
