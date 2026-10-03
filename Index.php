<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitalisasi K3-IMS Lapangan Olahraga Polteknaker</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Inter & FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">

    <nav class="bg-blue-900 text-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center space-x-3.5">
                    <div class="bg-white p-1 rounded-xl shadow-md flex items-center justify-center w-12 h-12 overflow-hidden border border-blue-200">
                        <img src="image.png" alt="Logo Polteknaker" class="w-full h-full object-contain" onerror="this.src='https://placehold.co/100x100/1e3a8a/ffffff?text=POLTEK'">
                    </div>
                    <div>
                        <span class="font-bold text-base sm:text-lg tracking-tight block leading-tight text-white">POLITEKNIK KETENAGAKERJAAN</span>
                        <span class="text-xs text-amber-300 font-medium">Digitalisasi K3-IMS Lapangan Olahraga</span>
                    </div>
                </div>
                <!-- Dynamic Header Navigation -->
                <div class="hidden md:flex items-center space-x-5 text-sm font-medium">
                    <span id="headerRoleBadge" class="bg-blue-800/80 text-blue-100 text-xs px-3 py-1.5 rounded-full border border-blue-700 flex items-center">
                        <i class="fa-solid fa-user mr-1.5 text-amber-400"></i> Mode: Pengguna / Umum
                    </span>
                    <button id="navLoginBtn" onclick="openLoginModal()" class="bg-amber-500 hover:bg-amber-400 text-blue-950 font-bold px-4 py-2 rounded-xl transition shadow text-xs flex items-center">
                        <i class="fa-solid fa-lock mr-1.5"></i> Login Admin K3
                    </button>
                    <button id="navLogoutBtn" onclick="handleLogout()" class="hidden bg-rose-600 hover:bg-rose-700 text-white font-semibold px-4 py-2 rounded-xl transition shadow text-xs flex items-center">
                        <i class="fa-solid fa-right-from-bracket mr-1.5"></i> Keluar Admin
                    </button>
                </div>
                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center space-x-2">
                    <button id="mobileLoginBtn" onclick="openLoginModal()" class="bg-amber-500 text-blue-950 px-3 py-1.5 rounded-lg text-xs font-bold">Admin</button>
                    <button id="mobileLogoutBtn" onclick="handleLogout()" class="hidden bg-rose-600 text-white px-3 py-1.5 rounded-lg text-xs font-bold">Keluar</button>
                </div>
            </div>
        </div>
        <!-- Sub Navigation / Tabs -->
        <div class="bg-blue-950 px-4 border-t border-blue-800/80">
            <div class="max-w-7xl mx-auto flex space-x-6 overflow-x-auto text-xs sm:text-sm py-2.5 font-medium scrollbar-none">
                <button onclick="switchTab('beranda')" id="tabBtn-beranda" class="tab-btn text-amber-400 hover:text-white transition whitespace-nowrap flex items-center"><i class="fa-solid fa-house mr-1.5"></i> Beranda & Status</button>
                <button onclick="switchTab('pelaporan')" id="tabBtn-pelaporan" class="tab-btn text-blue-300 hover:text-white transition whitespace-nowrap flex items-center"><i class="fa-solid fa-triangle-exclamation mr-1.5"></i> Lapor Bahaya (QR)</button>
                <button onclick="switchTab('permit')" id="tabBtn-permit" class="tab-btn text-blue-300 hover:text-white transition whitespace-nowrap flex items-center"><i class="fa-solid fa-clipboard-check mr-1.5"></i> Cek Kelayakan (Permit)</button>
                <button onclick="switchTab('sos')" id="tabBtn-sos" class="tab-btn text-rose-400 hover:text-rose-200 transition whitespace-nowrap flex items-center font-bold"><i class="fa-solid fa-bell mr-1.5 animate-pulse"></i> Tombol SOS</button>
                <button onclick="checkAdminAccessTab()" id="tabBtn-admin" class="tab-btn text-amber-300 hover:text-white transition whitespace-nowrap hidden flex items-center"><i class="fa-solid fa-gauge-high mr-1.5"></i> Dashboard Admin K3</button>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <!-- TAB 1: BERANDA & STATS -->
        <div id="tab-beranda" class="tab-content space-y-6">
            <div class="bg-gradient-to-r from-blue-900 via-indigo-900 to-blue-950 rounded-2xl p-6 sm:p-8 text-white shadow-lg relative overflow-hidden flex flex-col md:flex-row justify-between items-center">
                <div class="relative z-10 max-w-2xl">
                    <span class="bg-amber-500 text-blue-950 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide inline-block mb-3">Politeknik Ketenagakerjaan</span>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight mb-2">Digitalisasi K3-IMS Lapangan Olahraga</h1>
                    <p class="text-blue-100 text-sm sm:text-base leading-relaxed">
                        Platform integrasi manajemen keselamatan, kesehatan kerja, dan lingkungan fasilitas olahraga kampus untuk mewujudkan budaya K3 yang unggul dan zero accident.
                    </p>
                </div>
                <div class="mt-6 md:mt-0 relative z-10 bg-white/10 backdrop-blur-md p-5 rounded-xl border border-white/20 text-center min-w-[220px]">
                    <span class="text-xs uppercase tracking-wider text-blue-200 block mb-1">Status Lapangan Kampus</span>
                    <div id="statusBadge" class="inline-flex items-center px-4 py-2 rounded-full font-bold text-sm bg-emerald-500 text-white shadow">
                        <i class="fa-solid fa-circle-check mr-2"></i> AMAN / SIAP DIGUNAKAN
                    </div>
                    <p class="text-xs text-blue-200 mt-2">Update Sensor & Inspeksi Real-time</p>
                </div>
                <div class="absolute -right-10 -bottom-10 opacity-10 text-white text-9xl pointer-events-none">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 flex items-center space-x-4">
                    <div class="bg-blue-100 text-blue-700 p-3.5 rounded-xl text-xl"><i class="fa-solid fa-clipboard-list"></i></div>
                    <div><p class="text-xs font-medium text-slate-500">Total Laporan Masuk</p><h3 id="statTotal" class="text-2xl font-bold text-slate-800">0</h3></div>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 flex items-center space-x-4">
                    <div class="bg-amber-100 text-amber-700 p-3.5 rounded-xl text-xl"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <div><p class="text-xs font-medium text-slate-500">Menunggu / Diproses</p><h3 id="statPending" class="text-2xl font-bold text-slate-800">0</h3></div>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 flex items-center space-x-4">
                    <div class="bg-emerald-100 text-emerald-700 p-3.5 rounded-xl text-xl"><i class="fa-solid fa-circle-check"></i></div>
                    <div><p class="text-xs font-medium text-slate-500">Selesai Ditangani</p><h3 id="statDone" class="text-2xl font-bold text-slate-800">0</h3></div>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 flex items-center space-x-4">
                    <div class="bg-indigo-100 text-indigo-700 p-3.5 rounded-xl text-xl"><i class="fa-solid fa-cloud-sun"></i></div>
                    <div><p class="text-xs font-medium text-slate-500">Kondisi Lingkungan</p><h3 class="text-lg font-bold text-slate-800">31°C <span class="text-xs text-emerald-600 font-normal">Ideal (Cerah)</span></h3></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="bg-amber-500 text-white p-2.5 rounded-lg"><i class="fa-solid fa-qrcode text-lg"></i></div>
                            <h2 class="text-lg font-bold text-slate-800">Smart Hazard Reporting</h2>
                        </div>
                        <p class="text-slate-600 text-sm mb-4">Temukan lantai licin, fasilitas rusak, atau potensi bahaya di sekitar lapangan? Laporkan segera secara transparan.</p>
                    </div>
                    <button onclick="switchTab('pelaporan')" class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-2.5 px-4 rounded-xl transition text-sm flex items-center justify-center shadow">
                        <i class="fa-solid fa-plus-circle mr-2"></i> Buat Laporan Bahaya
                    </button>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="bg-emerald-600 text-white p-2.5 rounded-lg"><i class="fa-solid fa-clipboard-check text-lg"></i></div>
                            <h2 class="text-lg font-bold text-slate-800">Digital Permit-to-Use</h2>
                        </div>
                        <p class="text-slate-600 text-sm mb-4">Lakukan swa-inspeksi atau cek kelayakan sebelum menggunakan lapangan untuk kegiatan turnamen atau olahraga bersama.</p>
                    </div>
                    <button onclick="switchTab('permit')" class="w-full bg-emerald-700 hover:bg-emerald-800 text-white font-semibold py-2.5 px-4 rounded-xl transition text-sm flex items-center justify-center shadow">
                        <i class="fa-solid fa-check-to-slot mr-2"></i> Cek Kelayakan Lapangan
                    </button>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="bg-rose-600 text-white p-2.5 rounded-lg"><i class="fa-solid fa-bell text-lg"></i></div>
                            <h2 class="text-lg font-bold text-slate-800">Tombol Darurat (SOS)</h2>
                        </div>
                        <p class="text-slate-600 text-sm mb-4">Panggilan cepat siaga darurat medis atau kecelakaan fatal saat berolahraga di lingkungan Polteknaker.</p>
                    </div>
                    <button onclick="switchTab('sos')" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-semibold py-2.5 px-4 rounded-xl transition text-sm flex items-center justify-center shadow">
                        <i class="fa-solid fa-triangle-exclamation mr-2"></i> Panel SOS Darurat
                    </button>
                </div>
            </div>
        </div>

        <!-- TAB 2: PELAPORAN BAHAYA -->
        <div id="tab-pelaporan" class="tab-content hidden space-y-6">
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-slate-200 max-w-3xl mx-auto">
                <div class="border-b border-slate-100 pb-4 mb-6">
                    <h2 class="text-xl font-bold text-slate-800 flex items-center">
                        <i class="fa-solid fa-triangle-exclamation text-amber-500 mr-2.5"></i> Form Smart Hazard Reporting (QR Scan)
                    </h2>
                    <p class="text-xs text-slate-500 mt-1">Laporkan kondisi tidak aman di area fasilitas olahraga Politeknik Ketenagakerjaan.</p>
                </div>

                <form id="hazardForm" onsubmit="handleFormSubmit(event)" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Nama Pelapor / NIM / Unit</label>
                            <input type="text" id="reporterName" required placeholder="Contoh: Budi Santoso (D4 K3)" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Lokasi Titik Lapangan</label>
                            <select id="hazardLocation" required class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600">
                                <option value="">-- Pilih Lokasi --</option>
                                <option value="Lapangan Basket Utama">Lapangan Basket Utama</option>
                                <option value="Lapangan Futsal Outdoor">Lapangan Futsal Outdoor</option>
                                <option value="Area Tribun Penonton">Area Tribun Penonton</option>
                                <option value="Kamar Ganti & Toilet">Kamar Ganti & Toilet</option>
                                <option value="Pojok Kebugaran / Fitness">Pojok Kebugaran / Fitness</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Kategori Bahaya (Hazard Type)</label>
                            <select id="hazardCategory" required class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Fisik (Lantai licin / Genangan)">Fisik (Lantai licin / Genangan)</option>
                                <option value="Mekanikal (Ring / Tiang longgar)">Mekanikal (Ring / Tiang longgar)</option>
                                <option value="Elektrikal (Kabel lampu terekspos)">Elektrikal (Kabel lampu terekspos)</option>
                                <option value="Lingkungan (Pencahayaan kurang / Sampah)">Lingkungan (Pencahayaan kurang / Sampah)</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Tingkat Risiko (Risk Level)</label>
                            <select id="hazardRisk" required class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600">
                                <option value="Rendah">Rendah (Low Risk)</option>
                                <option value="Sedang" selected>Sedang (Medium Risk)</option>
                                <option value="Tinggi">Tinggi (High Risk - Perlu Penanganan Segera)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Deskripsi Kondisi Tidak Aman</label>
                        <textarea id="hazardDesc" required rows="3" placeholder="Jelaskan detail kerusakan atau potensi bahaya secara spesifik..." class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
                    </div>

                    <div class="pt-2 flex items-center justify-end space-x-3">
                        <button type="button" onclick="switchTab('beranda')" class="px-5 py-2.5 text-sm font-medium bg-slate-200 text-slate-700 rounded-xl hover:bg-slate-300 transition">Batal</button>
                        <button type="submit" class="px-6 py-2.5 text-sm font-semibold bg-blue-900 hover:bg-blue-800 text-white rounded-xl shadow transition flex items-center">
                            <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Laporan K3
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- TAB 3: DIGITAL PERMIT TO USE (CEK KELAYAKAN) -->
        <div id="tab-permit" class="tab-content hidden space-y-6">
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-slate-200 max-w-2xl mx-auto">
                <div class="border-b border-slate-100 pb-4 mb-6">
                    <h2 class="text-xl font-bold text-slate-800 flex items-center">
                        <i class="fa-solid fa-clipboard-check text-emerald-600 mr-2.5"></i> Cek Kelayakan & Permit Lapangan
                    </h2>
                    <p class="text-xs text-slate-500 mt-1">Pastikan seluruh instrumen K3 terpenuhi sebelum menggunakan fasilitas lapangan olahraga.</p>
                </div>

                <div class="space-y-4 mb-6">
                    <label class="flex items-start space-x-3 p-3 bg-slate-50 rounded-xl border border-slate-200 cursor-pointer hover:bg-slate-100 transition">
                        <input type="checkbox" class="permit-check mt-1 h-4 w-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700"><strong class="block text-slate-900">Pemeriksaan Permukaan Lapangan</strong> Permukaan lapangan bersih dari genangan air, minyak, atau benda tajam yang berisiko menyebabkan terpeleset.</span>
                    </label>
                    <label class="flex items-start space-x-3 p-3 bg-slate-50 rounded-xl border border-slate-200 cursor-pointer hover:bg-slate-100 transition">
                        <input type="checkbox" class="permit-check mt-1 h-4 w-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700"><strong class="block text-slate-900">Stabilitas Gawang & Ring Basket</strong> Tiang gawang futsal dan ring basket terpasang kokoh, tidak goyang, serta dilengkapi pelindung bantalan.</span>
                    </label>
                    <label class="flex items-start space-x-3 p-3 bg-slate-50 rounded-xl border border-slate-200 cursor-pointer hover:bg-slate-100 transition">
                        <input type="checkbox" class="permit-check mt-1 h-4 w-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700"><strong class="block text-slate-900">Kotak P3K & Jalur Evakuasi</strong> Kotak P3K darurat tersedia di dekat area lapangan dan jalur evakuasi bebas dari hambatan.</span>
                    </label>
                    <label class="flex items-start space-x-3 p-3 bg-slate-50 rounded-xl border border-slate-200 cursor-pointer hover:bg-slate-100 transition">
                        <input type="checkbox" class="permit-check mt-1 h-4 w-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700"><strong class="block text-slate-900">Kondisi Cuaca & Penerangan</strong> Cuaca terpantau aman (tidak ada potensi petir/hujan deras) atau pencahayaan malam memadai.</span>
                    </label>
                </div>

                <button onclick="evaluatePermit()" class="w-full bg-emerald-700 hover:bg-emerald-800 text-white font-semibold py-3 px-4 rounded-xl shadow transition text-sm flex items-center justify-center">
                    <i class="fa-solid fa-shield-check mr-2"></i> Validasi Kelayakan Lapangan
                </button>

                <div id="permitResultBox" class="hidden mt-6 p-4 rounded-xl text-center text-sm font-semibold"></div>
            </div>
        </div>

        <!-- TAB 4: TOMBOL SOS DARURAT -->
        <div id="tab-sos" class="tab-content hidden space-y-6">
            <div class="bg-gradient-to-br from-rose-900 via-rose-800 to-slate-900 rounded-2xl p-6 sm:p-10 text-white shadow-xl max-w-2xl mx-auto text-center relative overflow-hidden">
                <div class="absolute -right-16 -top-16 opacity-10 text-white text-9xl pointer-events-none">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="inline-flex bg-rose-700 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4 shadow">
                    <i class="fa-solid fa-triangle-exclamation mr-1.5"></i> Emergency Response System
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold mb-3">Pusat Bantuan Darurat (SOS)</h2>
                <p class="text-rose-100 text-sm mb-8 leading-relaxed">
                    Tekan tombol di bawah ini jika terjadi kecelakaan olahraga berat, pingsan, atau kondisi darurat medis di lingkungan Kampus Polteknaker.
                </p>

                <div class="my-6">
                    <button onclick="triggerSOS()" class="w-44 h-44 sm:w-52 sm:h-52 rounded-full bg-gradient-to-tr from-red-600 to-rose-500 hover:from-red-500 hover:to-rose-400 text-white font-black text-xl tracking-wider shadow-2xl border-8 border-rose-950/60 transition-all transform hover:scale-105 active:scale-95 flex flex-col items-center justify-center mx-auto uppercase">
                        <i class="fa-solid fa-bell text-4xl sm:text-5xl mb-2 animate-bounce"></i>
                        PANGGIL SOS
                    </button>
                </div>

                <div id="sosAlertBox" class="hidden mt-6 bg-rose-950/90 border border-rose-500/50 p-4 rounded-xl text-left text-xs sm:text-sm animate-pulse">
                    <div class="flex items-center font-bold text-amber-300 mb-1">
                        <i class="fa-solid fa-circle-exclamation mr-2"></i> DARURAT TERKIRIM KE TIM K3 & KLINIK!
                    </div>
                    <p class="text-rose-200">Tim medis dan petugas keamanan lapangan sedang dikerahkan ke lokasi Anda. Harap tetap tenang.</p>
                </div>

                <div class="mt-8 pt-6 border-t border-rose-800/60 grid grid-cols-2 gap-4 text-xs text-rose-200">
                    <div class="bg-rose-950/50 p-3 rounded-xl border border-rose-800/40">
                        <span class="font-bold block text-white mb-0.5">Puskesmas Kecamatan Ciracas</span>
                        <span>(021) 877-878-88</span>
                    </div>
                    <div class="bg-rose-950/50 p-3 rounded-xl border border-rose-800/40">
                        <span class="font-bold block text-white mb-0.5">Petugas Inspeksi (Ratna)</span>
                        <span>Hotline: 0822-9872-6876</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 5: ADMIN DASHBOARD (PROTECTED) -->
        <div id="tab-admin" class="tab-content hidden space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <div class="flex items-center space-x-2">
                            <span class="bg-amber-100 text-amber-800 text-xs px-2.5 py-1 rounded-md font-bold"><i class="fa-solid fa-shield-halved mr-1"></i> Panel Khusus Admin</span>
                            <span id="adminUsernameDisplay" class="text-xs text-slate-500 font-medium"></span>
                        </div>
                        <h2 class="text-xl font-bold text-slate-800 mt-1 flex items-center">
                            <i class="fa-solid fa-gauge-high text-blue-700 mr-2.5"></i> Dashboard Manajemen Laporan K3
                        </h2>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="resetData()" class="px-3 py-1.5 text-xs font-medium bg-slate-100 text-slate-600 hover:bg-rose-50 hover:text-rose-600 rounded-lg transition border border-slate-200">
                            <i class="fa-solid fa-rotate-left mr-1"></i> Reset Simulasi
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-slate-100/70 text-slate-700 text-xs uppercase tracking-wider font-semibold border-b border-slate-200">
                                <th class="py-3 px-4">Waktu / Pelapor</th>
                                <th class="py-3 px-4">Lokasi & Kategori</th>
                                <th class="py-3 px-4">Detail Bahaya</th>
                                <th class="py-3 px-4">Risiko</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4 text-center">Aksi / Ubah Status</th>
                            </tr>
                        </thead>
                        <tbody id="reportTableBody" class="divide-y divide-slate-100">
                            <!-- Rendered dynamically -->
                        </tbody>
                    </table>
                </div>
                <div id="emptyState" class="hidden p-12 text-center text-slate-400">
                    <i class="fa-solid fa-folder-open text-4xl mb-3 text-slate-300"></i>
                    <p class="text-sm font-medium">Belum ada laporan bahaya tercatat di sistem.</p>
                </div>
            </div>
        </div>

    </main>

    <footer class="bg-white border-t border-slate-200 py-4 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-slate-500">
            &copy; 2026 Politeknik Ketenagakerjaan (Polteknaker) - Inovasi Digitalisasi K3-IMS Fasilitas Olahraga.
        </div>
    </footer>

    <!-- ADMIN LOGIN MODAL -->
    <div id="loginModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/60 backdrop-blur-sm hidden">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 sm:p-8 mx-4 border border-slate-200 transform transition-all">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-900 text-amber-400 p-2.5 rounded-xl"><i class="fa-solid fa-lock text-lg"></i></div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 leading-tight">Login Admin K3-IMS</h3>
                        <p class="text-xs text-slate-500">Khusus Petugas & Pengelola K3 Polteknaker</p>
                    </div>
                </div>
                <button onclick="closeLoginModal()" class="text-slate-400 hover:text-slate-600 text-xl p-1"><i class="fa-solid fa-xmark"></i></button>
            </div>

            <form id="loginForm" onsubmit="handleLoginSubmit(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Username Admin</label>
                    <input type="text" id="adminUser" required placeholder="Contoh: admin" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Password</label>
                    <input type="password" id="adminPass" required placeholder="Contoh: poltek123" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>
                                <div class="pt-2 flex items-center justify-end space-x-3">
                    <button type="button" onclick="closeLoginModal()" class="px-5 py-2.5 text-sm font-medium bg-slate-200 text-slate-700 rounded-xl hover:bg-slate-300 transition">Batal</button>
                    <button type="submit" class="px-6 py-2.5 text-sm font-semibold bg-blue-900 hover:bg-blue-800 text-white rounded-xl shadow transition flex items-center">
                        <i class="fa-solid fa-right-to-bracket mr-2"></i> Masuk Admin
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Custom Notification Message Box -->
    <div id="customToast" class="fixed bottom-6 right-6 z-50 transform translate-y-32 opacity-0 transition-all duration-300 bg-slate-900 text-white px-5 py-3 rounded-xl shadow-xl flex items-center space-x-3 text-sm">
        <div id="toastIcon" class="text-emerald-400 text-lg"><i class="fa-solid fa-circle-check"></i></div>
        <div id="toastMessage" class="font-medium">Pesan berhasil diproses.</div>
    </div>

    <script>
        const defaultReports = [
            {
                id: 1,
                reporter: "Ahmad Fauzi (D4 K3)",
                location: "Lapangan Basket Utama",
                category: "Fisik (Lantai licin / Genangan)",
                risk: "Sedang",
                description: "Terdapat genangan air akibat kebocoran atap dekat ring sisi timur.",
                status: "Menunggu",
                time: "2026-10-03 08:30"
            },
            {
                id: 2,
                reporter: "Siti Rahma (HIMA K3)",
                location: "Area Tribun Penonton",
                category: "Mekanikal (Ring / Tiang longgar)",
                risk: "Tinggi",
                description: "Baut pada kursi tribun penonton baris ke-3 longgar dan goyang.",
                status: "Diproses",
                time: "2026-10-02 14:15"
            },
            {
                id: 3,
                reporter: "Rian Hidayat (Mahasiswa)",
                location: "Lapangan Futsal Outdoor",
                category: "Elektrikal (Kabel lampu terekspos)",
                risk: "Tinggi",
                description: "Kabel lampu sorot mengelupas di pinggir lapangan futsal.",
                status: "Selesai",
                time: "2026-10-01 10:00"
            }
        ];

        function getReports() {
            let data = localStorage.getItem('k3_polteknaker_reports');
            if (!data) {
                localStorage.setItem('k3_polteknaker_reports', JSON.stringify(defaultReports));
                return defaultReports;
            }
            return JSON.parse(data);
        }

        function saveReports(reports) {
            localStorage.setItem('k3_polteknaker_reports', JSON.stringify(reports));
        }

        function isAdminLoggedIn() {
            return localStorage.getItem('k3_admin_logged') === 'true';
        }

        // Tab Navigation
        function switchTab(tabId) {
            if(tabId === 'admin' && !isAdminLoggedIn()) {
                openLoginModal();
                return;
            }

            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.getElementById('tab-' + tabId).classList.remove('hidden');

            document.querySelectorAll('.tab-btn').forEach(el => {
                el.classList.remove('text-amber-400', 'font-bold');
                if(!el.id.includes('sos')) el.classList.add('text-blue-300');
            });

            const activeBtn = document.getElementById('tabBtn-' + tabId);
            if(activeBtn) {
                activeBtn.classList.add('text-amber-400', 'font-bold');
                activeBtn.classList.remove('text-blue-300');
            }

            if(tabId === 'admin') {
                renderTable();
            }
            updateStats();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function checkAdminAccessTab() {
            if(isAdminLoggedIn()) {
                switchTab('admin');
            } else {
                openLoginModal();
            }
        }

        // Login / Logout Handlers
        function openLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
        }

        function handleLoginSubmit(e) {
            e.preventDefault();
            const u = document.getElementById('adminUser').value.trim();
            const p = document.getElementById('adminPass').value.trim();

            if(u === 'admin' && p === 'poltek123') {
                localStorage.setItem('k3_admin_logged', 'true');
                localStorage.setItem('k3_admin_user', u);
                closeLoginModal();
                updateAuthUI();
                switchTab('admin');
                showToast("Berhasil masuk sebagai Admin K3 Polteknaker!", "success");
            } else {
                showToast("Username atau Password salah! (admin / poltek123)", "error");
            }
        }

        function handleLogout() {
            localStorage.removeItem('k3_admin_logged');
            localStorage.removeItem('k3_admin_user');
            updateAuthUI();
            switchTab('beranda');
            showToast("Anda telah keluar dari sesi Admin.", "info");
        }

        function updateAuthUI() {
            const logged = isAdminLoggedIn();
            const navLoginBtn = document.getElementById('navLoginBtn');
            const navLogoutBtn = document.getElementById('navLogoutBtn');
            const mobileLoginBtn = document.getElementById('mobileLoginBtn');
            const mobileLogoutBtn = document.getElementById('mobileLogoutBtn');
            const tabBtnAdmin = document.getElementById('tabBtn-admin');
            const headerRoleBadge = document.getElementById('headerRoleBadge');
            const adminUsernameDisplay = document.getElementById('adminUsernameDisplay');

            if(logged) {
                navLoginBtn.classList.add('hidden');
                navLogoutBtn.classList.remove('hidden');
                mobileLoginBtn.classList.add('hidden');
                mobileLogoutBtn.classList.remove('hidden');
                tabBtnAdmin.classList.remove('hidden');
                headerRoleBadge.innerHTML = '<i class="fa-solid fa-user-shield mr-1.5 text-amber-400"></i> Mode: Admin K3 Aktif';
                adminUsernameDisplay.innerText = "Login sebagai: admin";
            } else {
                navLoginBtn.classList.remove('hidden');
                navLogoutBtn.classList.add('hidden');
                mobileLoginBtn.classList.remove('hidden');
                mobileLogoutBtn.classList.add('hidden');
                tabBtnAdmin.classList.add('hidden');
                headerRoleBadge.innerHTML = '<i class="fa-solid fa-user mr-1.5 text-amber-400"></i> Mode: Pengguna / Umum';
            }
        }

        // Form Submit Handler
        function handleFormSubmit(e) {
            e.preventDefault();
            const reporter = document.getElementById('reporterName').value;
            const location = document.getElementById('hazardLocation').value;
            const category = document.getElementById('hazardCategory').value;
            const risk = document.getElementById('hazardRisk').value;
            const description = document.getElementById('hazardDesc').value;

            const now = new Date();
            const timeStr = now.toISOString().slice(0, 16).replace('T', ' ');

            const newReport = {
                id: Date.now(),
                reporter,
                location,
                category,
                risk,
                description,
                status: "Menunggu",
                time: timeStr
            };

            let reports = getReports();
            reports.unshift(newReport);
            saveReports(reports);

            document.getElementById('hazardForm').reset();
            showToast("Laporan bahaya berhasil dikirim ke database IMS!", "success");
            
            if(isAdminLoggedIn()) {
                switchTab('admin');
            } else {
                switchTab('beranda');
            }
        }

        // Permit Validation
        function evaluatePermit() {
            const checkboxes = document.querySelectorAll('.permit-check');
            const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
            const resultBox = document.getElementById('permitResultBox');
            resultBox.classList.remove('hidden');

            if(checkedCount === checkboxes.length) {
                resultBox.className = "mt-6 p-4 rounded-xl text-center text-sm font-bold bg-emerald-100 text-emerald-800 border border-emerald-300";
                resultBox.innerHTML = '<i class="fa-solid fa-circle-check text-lg mr-1.5"></i> PERMIT TERBIT: Lapangan 100% Aman & Layak Digunakan!';
                showToast("Permit kelayakan lapangan berhasil diterbitkan!", "success");
            } else {
                resultBox.className = "mt-6 p-4 rounded-xl text-center text-sm font-bold bg-amber-100 text-amber-900 border border-amber-300";
                resultBox.innerHTML = `<i class="fa-solid fa-triangle-exclamation text-lg mr-1.5"></i> PERMIT DITUNDA: ${checkboxes.length - checkedCount} checklist K3 belum terpenuhi.`;
                showToast("Mohon centang seluruh pemeriksaan keselamatan.", "error");
            }
        }

        // Render Admin Table Data
        function renderTable() {
            if(!isAdminLoggedIn()) return;
            const reports = getReports();
            const tbody = document.getElementById('reportTableBody');
            const emptyState = document.getElementById('emptyState');
            tbody.innerHTML = '';

            if (reports.length === 0) {
                emptyState.classList.remove('hidden');
                return;
            } else {
                emptyState.classList.add('hidden');
            }

            reports.forEach(r => {
                let riskBadge = '';
                if(r.risk === 'Tinggi') riskBadge = '<span class="px-2 py-0.5 text-xs font-bold rounded bg-rose-100 text-rose-700">Tinggi</span>';
                else if(r.risk === 'Sedang') riskBadge = '<span class="px-2 py-0.5 text-xs font-bold rounded bg-amber-100 text-amber-700">Sedang</span>';
                else riskBadge = '<span class="px-2 py-0.5 text-xs font-bold rounded bg-blue-100 text-blue-700">Rendah</span>';

                let statusBadge = '';
                if(r.status === 'Selesai') statusBadge = '<span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800"><i class="fa-solid fa-check mr-1"></i> Selesai</span>';
                else if(r.status === 'Diproses') statusBadge = '<span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800"><i class="fa-solid fa-spinner mr-1 animate-spin"></i> Diproses</span>';
                else statusBadge = '<span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-700"><i class="fa-solid fa-clock mr-1"></i> Menunggu</span>';

                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50/80 transition';
                tr.innerHTML = `
                    <td class="py-3 px-4">
                        <div class="font-semibold text-slate-800">${escapeHtml(r.reporter)}</div>
                        <div class="text-xs text-slate-400">${r.time}</div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="font-medium text-slate-700">${escapeHtml(r.location)}</div>
                        <div class="text-xs text-slate-500">${escapeHtml(r.category)}</div>
                    </td>
                    <td class="py-3 px-4 max-w-xs truncate text-slate-600" title="${escapeHtml(r.description)}">${escapeHtml(r.description)}</td>
                    <td class="py-3 px-4">${riskBadge}</td>
                    <td class="py-3 px-4">${statusBadge}</td>
                    <td class="py-3 px-4 text-center">
                        <div class="inline-flex items-center space-x-1">
                            <button onclick="updateStatus(${r.id})" title="Ubah Status Penanganan" class="px-2.5 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-lg transition text-xs font-semibold flex items-center"><i class="fa-solid fa-pen-to-square mr-1"></i> Status</button>
                            <button onclick="deleteReport(${r.id})" title="Hapus Laporan" class="p-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 rounded-lg transition"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);
            });
            updateStats();
        }

        function updateStatus(id) {
            if(!isAdminLoggedIn()) return;
            let reports = getReports();
            let report = reports.find(r => r.id === id);
            if(!report) return;

            let nextStatus = "Menunggu";
            if(report.status === "Menunggu") nextStatus = "Diproses";
            else if(report.status === "Diproses") nextStatus = "Selesai";
            else nextStatus = "Menunggu";

            report.status = nextStatus;
            saveReports(reports);
            renderTable();
            showToast(`Status laporan diperbarui menjadi: ${nextStatus}`, "success");
        }

        function deleteReport(id) {
            if(!isAdminLoggedIn()) return;
            if(!confirm("Apakah Anda yakin ingin menghapus data laporan ini?")) return;
            let reports = getReports();
            reports = reports.filter(r => r.id !== id);
            saveReports(reports);
            renderTable();
            showToast("Laporan berhasil dihapus.", "info");
        }

        function resetData() {
            localStorage.setItem('k3_polteknaker_reports', JSON.stringify(defaultReports));
            if(isAdminLoggedIn()) renderTable();
            updateStats();
            showToast("Simulasi data direset ke awal.", "info");
        }

        function updateStats() {
            const reports = getReports();
            const total = reports.length;
            const pending = reports.filter(r => r.status === 'Menunggu' || r.status === 'Diproses').length;
            const done = reports.filter(r => r.status === 'Selesai').length;

            document.getElementById('statTotal').innerText = total;
            document.getElementById('statPending').innerText = pending;
            document.getElementById('statDone').innerText = done;

            const highRiskPending = reports.filter(r => r.risk === 'Tinggi' && r.status !== 'Selesai').length;
            const badge = document.getElementById('statusBadge');
            if(highRiskPending > 0) {
                badge.className = "inline-flex items-center px-4 py-2 rounded-full font-bold text-sm bg-amber-500 text-white shadow animate-pulse";
                badge.innerHTML = `<i class="fa-solid fa-triangle-exclamation mr-2"></i> WASPADA (${highRiskPending} Bahaya Tinggi)`;
            } else {
                badge.className = "inline-flex items-center px-4 py-2 rounded-full font-bold text-sm bg-emerald-500 text-white shadow";
                badge.innerHTML = `<i class="fa-solid fa-circle-check mr-2"></i> AMAN / SIAP DIGUNAKAN`;
            }
        }

        function triggerSOS() {
            const alertBox = document.getElementById('sosAlertBox');
            alertBox.classList.remove('hidden');
            showToast("DARURAT: Sinyal SOS dikirim ke Tim K3 & Klinik Polteknaker!", "error");
        }

        function showToast(message, type = 'success') {
            const toast = document.getElementById('customToast');
            const toastMsg = document.getElementById('toastMessage');
            const toastIcon = document.getElementById('toastIcon');

            toastMsg.innerText = message;
            if(type === 'success') {
                toastIcon.innerHTML = '<i class="fa-solid fa-circle-check text-emerald-400"></i>';
            } else if(type === 'error') {
                toastIcon.innerHTML = '<i class="fa-solid fa-triangle-exclamation text-rose-400"></i>';
            } else {
                toastIcon.innerHTML = '<i class="fa-solid fa-circle-info text-blue-400"></i>';
            }

            toast.classList.remove('translate-y-32', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('translate-y-32', 'opacity-0');
            }, 3500);
        }

        function escapeHtml(str) {
            return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
        }

        window.onload = function() {
            updateAuthUI();
            updateStats();
        };
    </script>
</body>
</html>
```
eof
