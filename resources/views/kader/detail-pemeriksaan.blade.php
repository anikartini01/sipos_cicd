<x-app-main title="Detail Pemeriksaan">
    <main class="py-6 px-4 sm:px-6 lg:px-8 bg-gray-50 min-h-screen">
        <div class="w-full mx-auto">

            <!-- Card Utama -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-indigo-300/50 transition duration-300">

                <!-- Header -->
                <div class="bg-posyanduu px-6 py-5 sm:px-8">
                    <h1 class="text-3xl font-extrabold tracking-tight text-white">Detail Pemeriksaan</h1>
                    @if ($pemeriksaan->balita)
                        <p class="text-gray-800 text-sm mt-1">Pemeriksaan untuk Balita</p>
                    @elseif($pemeriksaan->ibu_hamil)
                        <p class="text-gray-800 text-sm mt-1">Pemeriksaan untuk Ibu Hamil</p>
                    @endif
                </div>

                <!-- Konten -->
                <div class="p-6 sm:p-8">
                    <dl class="divide-y divide-gray-200 border border-gray-200 rounded-xl">

                        <!-- Tanggal Pemeriksaan -->
                        <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50">
                            <dt class="text-sm font-medium text-gray-500">Tanggal Pemeriksaan</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 font-semibold">
                                {{ \Carbon\Carbon::parse($pemeriksaan->tanggal)->format('d F Y') }}
                            </dd>
                        </div>

                        @if ($pemeriksaan->balita)
                            <!-- Untuk Balita -->
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Nama Balita</dt>
                                <dd class="mt-1 text-sm font-bold text-indigo-700 sm:col-span-2">
                                    {{ $pemeriksaan->balita->nama_balita }}</dd>
                            </div>

                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50">
                                <dt class="text-sm font-medium text-gray-500">NIK Balita</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $pemeriksaan->balita->nik }}
                                </dd>
                            </div>

                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Berat Badan</dt>
                                <dd class="mt-1 text-sm font-semibold text-green-700 sm:col-span-2">
                                    {{ $pemeriksaan->berat_badan_balita }} kg
                                </dd>
                            </div>

                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50">
                                <dt class="text-sm font-medium text-gray-500">Tinggi Badan</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $pemeriksaan->tinggi_badan }} cm
                                </dd>
                            </div>

                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Status Gizi</dt>
                                <dd
                                    class="mt-1 text-sm font-bold sm:col-span-2 uppercase 
                                    @if ($pemeriksaan->status_gizi === 'Gizi Buruk') text-red-600
                                    @elseif($pemeriksaan->status_gizi === 'Stunting') text-yellow-600
                                    @else text-green-600 @endif">
                                    {{ $pemeriksaan->status_gizi ?? '-' }}
                                </dd>
                            </div>
                        @elseif($pemeriksaan->ibu_hamil)
                            <!-- Untuk Ibu Hamil -->
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Nama Ibu Hamil</dt>
                                <dd class="mt-1 text-sm font-bold text-indigo-700 sm:col-span-2">
                                    {{ $pemeriksaan->ibu_hamil->nama_ibu_hamil }}
                                </dd>
                            </div>

                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50">
                                <dt class="text-sm font-medium text-gray-500">NIK Ibu Hamil</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                    {{ $pemeriksaan->ibu_hamil->nik_ibu_hamil }}</dd>
                            </div>

                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Berat Badan</dt>
                                <dd class="mt-1 text-sm font-semibold text-green-700 sm:col-span-2">
                                    {{ $pemeriksaan->berat_badan_ibu }} kg
                                </dd>
                            </div>

                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50">
                                <dt class="text-sm font-medium text-gray-500">Tekanan Darah</dt>
                                @php
                                    $sistolik = $pemeriksaan->tekanan_sistolik;
                                    $diastolik = $pemeriksaan->tekanan_diastolik;
                                    $warnaTekanan =
                                        $sistolik > 140 || $diastolik > 90 ? 'text-red-600' : 'text-green-600';
                                @endphp
                                <dd class="mt-1 text-sm font-bold sm:col-span-2 {{ $warnaTekanan }}">
                                    {{ $sistolik }}/{{ $diastolik }} mmHg
                                </dd>
                            </div>

                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Usia Kehamilan</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                    {{ $pemeriksaan->usia_kehamilan }} minggu
                                </dd>
                            </div>

                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50">
                                <dt class="text-sm font-medium text-gray-500">Status Ibu</dt>
                                <dd
                                    class="mt-1 text-sm font-bold uppercase sm:col-span-2
                                    @if ($pemeriksaan->status_ibu === 'Anemia') text-red-600
                                    @elseif($pemeriksaan->status_ibu === 'Kondisi Baik') text-green-600
                                    @else text-gray-600 @endif">
                                    {{ $pemeriksaan->status_ibu ?? '-' }}
                                </dd>
                            </div>
                        @endif
                    </dl>

                    <!-- Tombol Kembali -->
                    <div class="mt-8 text-right">
                        <a href="{{ route('pemeriksaan.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-lg text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300 ">
                            <i class="fa-solid fa-arrow-left mr-2"></i>
                            Kembali ke Daftar Pemeriksaan
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>
</x-app-main>
