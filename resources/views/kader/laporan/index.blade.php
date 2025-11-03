<x-app-main title="Laporan">
    {{-- Header --}}
    <main class="">
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-file-pdf mr-3 text-posyanduu"></i>
                        Ekspor Data Balita dan Ibu Hamil ke PDF
                    </h1>
                    <p class="text-gray-600 mt-1">
                        Cari dan pilih data pengguna yang ingin di Eskpor
                    </p>
                </div>
                <a href="#" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>

        {{-- Form Pencarian --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Pencarian dan Daftar Balita -->
            <div class="bg-white rounded-xl p-6 card-shadow">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-search mr-3 text-posyanduu"></i>
                    Cari Balita
                </h2>

                <!-- Search Box -->
                <div class="mb-6">
                    <div class="relative">
                        <input type="text" id="cari-balita"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-posyandu focus:border-posyandu"
                            placeholder="Ketik nama balita..." />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Daftar Balita -->
                <div class="max-h-96 overflow-y-auto space-y-3">
                    <!-- Balita 1 -->
                    <div class="patient-card bg-white p-4 rounded-lg cursor-pointer" onclick="selectBalita(this)"
                        data-id="PS-2023-001">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="rounded-full w-12 h-12 bg-blue-100 flex items-center justify-center mr-4">
                                    <i class="fas fa-baby text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">
                                        Ahmad Sutisna
                                    </h4>
                                    <p class="text-sm text-gray-600">
                                        2 Tahun 3 Bulan • Laki-laki
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-mono text-gray-600">
                                    3212987776545454
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Preview dan Ekspor -->
            <div class="space-y-6">
                <!-- Info Balita Terpilih -->
                <div class="bg-white rounded-xl p-6 card-shadow">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle mr-3 text-posyanduu"></i>
                        Data yang Akan Diekspor
                    </h2>

                    <div id="balita-info" class="text-center py-8 text-gray-500">
                        <i class="fas fa-baby text-4xl mb-3 text-gray-300"></i>
                        <p>Pilih balita dari daftar di sebelah kiri</p>
                        <p class="text-sm">Data lengkap akan ditampilkan di sini</p>
                    </div>

                    <div id="selected-balita-data" class="hidden">
                        <!-- Data akan diisi oleh JavaScript -->
                    </div>
                </div>

                <!-- Tombol Ekspor -->
                <div class="bg-white rounded-xl p-6 card-shadow">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-download mr-3 text-posyanduu"></i>
                        Ekspor ke PDF
                    </h2>

                    <div class="space-y-4">
                        <button id="btn-export" disabled
                            class="w-full bg-posyanduu hover:bg-posyanduDark text-white py-3 px-4 rounded-lg flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-file-pdf mr-2"></i>
                            Ekspor ke PDF
                        </button>

                        <button id="btn-print" disabled
                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-print mr-2"></i>
                            Cetak Langsung
                        </button>
                    </div>
                </div>

                <!-- Informasi -->
                <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                    <div class="flex items-start">
                        <i class="fas fa-lightbulb text-yellow-500 mt-1 mr-3"></i>
                        <div>
                            <p class="text-blue-800 font-semibold">Tips Ekspor</p>
                            <p class="text-blue-700 text-sm mt-1">
                                PDF yang dihasilkan sudah termasuk data lengkap dan siap
                                untuk dicetak atau dibagikan ke orang tua.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuToggle = document.getElementById("menu-toggle");
            const sidebar = document.querySelector(".sidebar");
            const overlay = document.getElementById("overlay");

            // Toggle mobile sidebar
            menuToggle.addEventListener("click", function() {
                sidebar.classList.toggle("active");
                overlay.classList.toggle("active");
            });

            overlay.addEventListener("click", function() {
                sidebar.classList.remove("active");
                overlay.classList.remove("active");
            });

            // Search functionality
            document
                .getElementById("cari-balita")
                .addEventListener("input", function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const patients = document.querySelectorAll(".patient-card");

                    patients.forEach((patient) => {
                        const name = patient
                            .querySelector("h4")
                            .textContent.toLowerCase();
                        if (name.includes(searchTerm)) {
                            patient.style.display = "block";
                        } else {
                            patient.style.display = "none";
                        }
                    });
                });
        });

        let selectedBalita = null;

        function selectBalita(element) {
            // Remove selection from all patients
            document.querySelectorAll(".patient-card").forEach((card) => {
                card.classList.remove("selected");
            });

            // Add selection to clicked patient
            element.classList.add("selected");
            selectedBalita = element.getAttribute("data-id");

            // Enable export buttons
            document.getElementById("btn-export").disabled = false;
            document.getElementById("btn-print").disabled = false;

            // Show selected balita data
            showBalitaData(selectedBalita);
        }

        function showBalitaData(balitaId) {
            const balitaInfo = document.getElementById("balita-info");
            const selectedData = document.getElementById("selected-balita-data");

            // Hide placeholder, show data
            balitaInfo.classList.add("hidden");
            selectedData.classList.remove("hidden");

            // Sample data - in real app this would come from API
            const balitaData = {
                "PS-2023-001": {
                    name: "Ahmad Sutisna",
                    age: "2 Tahun 3 Bulan",
                    gender: "Laki-laki",
                    birthDate: "15 Juni 2021",
                    parent: "Santoso & Siti",
                    address: "Jl. Melati No. 123, RT 01/RW 02",
                    lastCheck: "20 September 2023",
                    totalChecks: 5,
                    weight: "12.5 kg",
                    height: "88 cm",
                    status: "Normal",
                },
                "PS-2023-002": {
                    name: "Budi Santoso",
                    age: "3 Tahun",
                    gender: "Laki-laki",
                    birthDate: "10 Agustus 2020",
                    parent: "Bambang & Ani",
                    address: "Jl. Anggrek No. 45, RT 02/RW 03",
                    lastCheck: "18 September 2023",
                    totalChecks: 8,
                    weight: "14.2 kg",
                    height: "95 cm",
                    status: "Normal",
                },
            };

            const data = balitaData[balitaId] || balitaData["PS-2023-001"];

            selectedData.innerHTML = `
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="font-semibold text-gray-700">Nama Lengkap</p>
                            <p class="text-gray-900">${data.name}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-700">Usia</p>
                            <p class="text-gray-900">${data.age}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-700">Jenis Kelamin</p>
                            <p class="text-gray-900">${data.gender}</p>
                        </div>
                    </div>
                    
                    <div class="border-t pt-4">
                        <p class="font-semibold text-gray-700 mb-2">Orang Tua & Alamat</p>
                        <p class="text-sm text-gray-900">${data.parent}</p>
                        <p class="text-sm text-gray-600">${data.address}</p>
                    </div>
                    
                    <div class="border-t pt-4">
                        <p class="font-semibold text-gray-700 mb-2">Pemeriksaan Terakhir</p>
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div class="bg-blue-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-600">Berat Badan</p>
                                <p class="font-bold text-blue-700">${data.weight}</p>
                            </div>
                            <div class="bg-green-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-600">Tinggi Badan</p>
                                <p class="font-bold text-green-700">${data.height}</p>
                            </div>
                            <div class="bg-purple-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-600">Status Gizi</p>
                                <p class="font-bold text-purple-700">${data.status}</p>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2 text-center">Terakhir diperiksa: ${data.lastCheck}</p>
                    </div>
                </div>
            `;
        }

        // Export functionality
        document
            .getElementById("btn-export")
            .addEventListener("click", function() {
                if (!selectedBalita) return;

                // Simulate PDF export
                const balitaName = document.querySelector(
                    ".patient-card.selected h4"
                ).textContent;
                alert(
                    `Mengekspor data ${balitaName} ke PDF...\nFile PDF akan segera diunduh.`
                );

                // In real implementation, this would trigger PDF generation
                // window.open(`/export-pdf/${selectedBalita}`, '_blank');
            });

        document
            .getElementById("btn-print")
            .addEventListener("click", function() {
                if (!selectedBalita) return;

                const balitaName = document.querySelector(
                    ".patient-card.selected h4"
                ).textContent;
                alert(
                    `Mencetak data ${balitaName}...\nBuka preview cetak di browser Anda.`
                );

                // In real implementation, this would trigger print dialog
                // window.print();
            });
    </script>
</x-app-main>
