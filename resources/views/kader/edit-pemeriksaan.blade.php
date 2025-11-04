<x-app-main title="Edit Pemeriksaan">
    <main>
        <div class="bg-white shadow-lg rounded-2xl p-6 max-w-full border border-gray-100">
            <div class="flex justify-between mb-6 pb-4 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">Edit Data Pemeriksaan</h2>
                <div class="text-sm text-gray-500 bg-blue-50 px-3 py-1 rounded-full">
                    ID: {{ $pemeriksaan->id }}
                </div>
            </div>

            <form action="{{ route('pemeriksaan.update', $pemeriksaan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Tanggal Pemeriksaan -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Tanggal Pemeriksaan</label>
                    <input type="datetime-local" name="tanggal" value="{{ $pemeriksaan->tanggal }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                </div>

                @if ($pemeriksaan->balita)
                    <!-- Section Balita -->
                    <div class="mb-8 p-4 bg-blue-50 rounded-xl border border-blue-100">
                        <h3 class="text-lg font-semibold text-blue-800 mb-4 flex items-center">
                            <i class="fa-solid fa-baby"> </i>
                            Data Balita
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Berat Badan (kg)</label>
                                <input type="number" name="berat_badan_balita"
                                    value="{{ $pemeriksaan->berat_badan_balita }}" step="0.1"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Tinggi Badan (cm)</label>
                                <input type="number" name="tinggi_badan" value="{{ $pemeriksaan->tinggi_badan }}"
                                    step="0.1"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Status Gizi</label>
                            <select name="status_gizi"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                                <option value="">-- Pilih Status Gizi --</option>
                                <option value="Gizi Baik"
                                    {{ $pemeriksaan->status_gizi == 'Gizi Baik' ? 'selected' : '' }}>Gizi Baik</option>
                                <option value="Gizi Buruk"
                                    {{ $pemeriksaan->status_gizi == 'Gizi Buruk' ? 'selected' : '' }}>Gizi Buruk
                                </option>
                                <option value="Stunting"
                                    {{ $pemeriksaan->status_gizi == 'Stunting' ? 'selected' : '' }}>Stunting</option>
                            </select>
                        </div>
                    </div>
                @endif

                @if ($pemeriksaan->ibu_hamil)
                    <!-- Section Ibu Hamil -->
                    <div class="mb-8 p-4 bg-pink-50 rounded-xl border border-pink-100">
                        <h3 class="text-lg font-semibold text-pink-800 mb-4 flex items-center">
                            <i class="fa-solid fa-person-breastfeeding"></i>
                            Data Ibu Hamil
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Berat Badan Ibu (kg)</label>
                                <input type="number" name="berat_badan_ibu" value="{{ $pemeriksaan->berat_badan_ibu }}"
                                    step="0.1"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Usia Kehamilan (minggu)</label>
                                <input type="number" name="usia_kehamilan" value="{{ $pemeriksaan->usia_kehamilan }}"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Tekanan Darah</label>
                            <div class="flex gap-3">
                                <div class="flex-1">
                                    <input type="number" name="tekanan_sistolik" placeholder="Sistolik"
                                        value="{{ $pemeriksaan->tekanan_sistolik }}"
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                                    <span class="text-xs text-gray-500 mt-1 block">Sistolik</span>
                                </div>
                                <div class="flex items-center justify-center text-gray-400">
                                    <span class="text-xl">/</span>
                                </div>
                                <div class="flex-1">
                                    <input type="number" name="tekanan_diastolik" placeholder="Diastolik"
                                        value="{{ $pemeriksaan->tekanan_diastolik }}"
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                                    <span class="text-xs text-gray-500 mt-1 block">Diastolik</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Status Ibu</label>
                            <select name="status_ibu"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                                <option value="">-- Pilih Status Ibu --</option>
                                <option value="Kondisi Baik"
                                    {{ $pemeriksaan->status_ibu == 'Kondisi Baik' ? 'selected' : '' }}>Kondisi Baik
                                </option>
                                <option value="Anemia" {{ $pemeriksaan->status_ibu == 'Anemia' ? 'selected' : '' }}>
                                    Anemia</option>
                            </select>
                        </div>
                    </div>
                @endif

                <div class="flex justify-end pt-4 border-t border-gray-200">
                    <a href="{{ route('pemeriksaan.index') }}"
                        class="mr-4 px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200 font-medium">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition-colors duration-200 font-medium shadow-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-app-main>
