<x-app-main title="Tambah Pengguna Baru">

    <main class="ml-2 md:ml-2">

        <!-- Header -->
        <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-3 opacity-0"
            id="headerBox">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-user-plus text-posyanduu"></i>
                    Tambah Pengguna Baru
                </h1>
                <p class="text-gray-600 text-sm md:text-md">
                    Daftarkan pengguna baru untuk mengakses layanan posyandu
                </p>
            </div>

            <a href="{{ route('admin.pengguna.index') }}"
                class="px-4 py-2 bg-gray-100 hover:bg-gray-200 transition rounded-lg text-gray-700 flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#70b2b2',
                });
            </script>
        @endif

        <!-- Card Form -->
        <div class="bg-white rounded-xl shadow-md p-6 md:p-8 max-w-2xl opacity-0" id="formCard">

            <form action="{{ route('admin.pengguna.store') }}" method="POST" class="space-y-6" id="formFields">
                @csrf

                <!-- Nama -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                        <i class="fas fa-user text-posyanduu"></i>
                        Nama Pengguna
                    </label>
                    <input type="text" name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                        placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Email -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                        <i class="fas fa-envelope text-posyanduu"></i>
                        Email
                    </label>
                    <input type="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                        placeholder="contoh@email.com" required>
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                        <i class="fas fa-lock text-posyanduu"></i>
                        Password
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="passwordInput"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                            placeholder="******" required>
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-2.5 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-button hover:bg-buttonhover transition text-white rounded-lg shadow-md flex items-center gap-2">
                        <i class="fas fa-save"></i> Simpan Pengguna
                    </button>
                </div>

            </form>

        </div>

    </main>

    <!-- GSAP Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.to("#headerBox", {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: "power2.out"
            });

            gsap.to("#formCard", {
                opacity: 1,
                y: -10,
                delay: 0.2,
                duration: 0.8,
                ease: "power2.out"
            });

            gsap.from("#formFields > div", {
                opacity: 0,
                x: -20,
                duration: 0.6,
                stagger: 0.15,
                delay: 0.35,
                ease: "power2.out"
            });
        });

        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('toggleIcon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>

</x-app-main>
