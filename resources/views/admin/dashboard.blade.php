<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Sealed with Love 👑</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Playpen+Sans:wght@400;600;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html, body, button, a, input, textarea, select {
            cursor: auto !important; /* Normal mouse for admin ease of use */
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #09050d 0%, #150a1d 50%, #210e2d 100%) !important;
            min-height: 100vh;
            color: #fce7f3;
            margin: 0;
            padding: 0;
        }
        .admin-glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .admin-tab-btn.active {
            background: linear-gradient(to right, #ec4899, #f43f5e);
            color: white;
            box-shadow: 0 4px 15px rgba(244, 63, 94, 0.4);
        }
        /* Custom scrollbar for admin forms */
        .admin-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .admin-scroll::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.02);
        }
        .admin-scroll::-webkit-scrollbar-thumb {
            background: rgba(236, 72, 153, 0.4);
            border-radius: 3px;
        }
        .admin-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(236, 72, 153, 0.6);
        }
    </style>
</head>
<body class="p-4 md:p-8">
    <div class="max-w-7xl mx-auto w-full flex flex-col min-h-[90vh]">
        <!-- --------------------------------------------------------------------------
             1. HEADER CONTROL STRIP
             -------------------------------------------------------------------------- -->
        <header class="admin-glass rounded-[28px] p-6 flex flex-col md:flex-row justify-between items-center gap-4 mb-8 shadow-lg select-none">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-pink-500 to-amber-400 flex items-center justify-center text-2xl shadow-md animate-pulse">
                    👑
                </div>
                <div>
                    <h1 class="font-romantic text-3xl text-white">Sealed with Love</h1>
                    <p class="font-cute text-[10px] text-pink-300/50 uppercase tracking-widest leading-none mt-1">Website Surprises Control Deck</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" target="_blank" class="px-5 py-2.5 rounded-full bg-white/5 border border-white/10 text-white font-cute text-xs hover:bg-white/10 transition-all flex items-center gap-1.5 shadow-sm">
                    <span>👁️</span> Lihat Website
                </a>
                <a href="{{ route('admin.logout') }}" class="px-5 py-2.5 rounded-full bg-red-500/10 border border-red-500/20 text-red-300 font-cute text-xs hover:bg-red-500/25 transition-all flex items-center gap-1.5 shadow-sm">
                    <span>👋</span> Logout
                </a>
            </div>
        </header>

        <!-- --------------------------------------------------------------------------
             ALERTS & NOTIFICATIONS
             -------------------------------------------------------------------------- -->
        @if (session('success'))
            <div class="mb-8 p-5 rounded-3xl bg-green-500/15 border border-green-500/35 text-green-200 font-cute text-sm flex gap-3 shadow-md">
                <span class="text-lg">✨🏆</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-8 p-5 rounded-3xl bg-red-500/15 border border-red-500/35 text-red-200 font-cute text-sm flex flex-col gap-2 shadow-md">
                <div class="flex gap-2">
                    <span class="text-lg">⚠️</span>
                    <strong class="font-semibold">Oops! Beberapa data kurang pas tuh:</strong>
                </div>
                <ul class="list-disc pl-7 space-y-1 text-xs text-red-300/80">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- --------------------------------------------------------------------------
             2. SIDEBAR TABS & DASHBOARD BODY ASSEMBLY
             -------------------------------------------------------------------------- -->
        <div class="flex-grow grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Navigation Sidebar -->
            <aside class="lg:col-span-1 flex flex-col gap-4">
                <button onclick="switchTab('tab-general')" id="btn-tab-general" class="admin-tab-btn w-full admin-glass text-left p-5 rounded-2xl text-pink-100 hover:bg-white/5 transition-all font-cute text-sm flex items-center gap-4 active select-none">
                    <span>⚙️</span> General Config
                </button>
                <button onclick="switchTab('tab-reasons')" id="btn-tab-reasons" class="admin-tab-btn w-full admin-glass text-left p-5 rounded-2xl text-pink-100 hover:bg-white/5 transition-all font-cute text-sm flex items-center gap-4 select-none">
                    <span>💖</span> Reasons cards
                </button>
                <button onclick="switchTab('tab-memories')" id="btn-tab-memories" class="admin-tab-btn w-full admin-glass text-left p-5 rounded-2xl text-pink-100 hover:bg-white/5 transition-all font-cute text-sm flex items-center gap-4 select-none">
                    <span>📸</span> Memories Scrapbook
                </button>
                <button onclick="switchTab('tab-milestones')" id="btn-tab-milestones" class="admin-tab-btn w-full admin-glass text-left p-5 rounded-2xl text-pink-100 hover:bg-white/5 transition-all font-cute text-sm flex items-center gap-4 select-none">
                    <span>🕰️</span> Love Journey Timeline
                </button>
                <button onclick="switchTab('tab-quizzes')" id="btn-tab-quizzes" class="admin-tab-btn w-full admin-glass text-left p-5 rounded-2xl text-pink-100 hover:bg-white/5 transition-all font-cute text-sm flex items-center gap-4 select-none">
                    <span>🧩</span> Couple Quiz Game
                </button>
                <button onclick="switchTab('tab-hero')" id="btn-tab-hero" class="admin-tab-btn w-full admin-glass text-left p-5 rounded-2xl text-pink-100 hover:bg-white/5 transition-all font-cute text-sm flex items-center gap-4 select-none">
                    <span>🦸</span> Hero Section
                </button>
            </aside>

            <!-- Dashboard Modules container -->
            <main class="lg:col-span-3 admin-glass rounded-[32px] p-6 md:p-8 shadow-xl flex flex-col">
                <!-- ==========================================================================
                     A. TAB: GENERAL CONFIG
                     ========================================================================== -->
                <div id="tab-general" class="tab-content flex flex-col gap-6">
                    <div class="border-b border-white/10 pb-4 mb-4 select-none">
                        <h2 class="font-romantic text-3xl text-white">General settings ⚙️</h2>
                        <p class="font-cute text-xs text-pink-300/40">Semua konfigurasi umum website. Scroll ke bawah, lalu klik <strong>Save All</strong> untuk menyimpan sekaligus.</p>
                    </div>

                    <form id="form-general-all" action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Section: Identitas -->
                        <div class="border-b border-white/10 pb-4 mb-2 select-none">
                            <h3 class="font-romantic text-xl text-white">💑 Identitas & Tanggal</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Nama Pacar Tersayang</label>
                                <input type="text" name="partner_name" value="{{ $settings['partner_name'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                            </div>
                            <div>
                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Tanggal Lahir (Ultah)</label>
                                <input type="date" name="birth_date" value="{{ $settings['birth_date'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                            </div>
                            <div>
                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Waktu Jadian (Countdown/up)</label>
                                <input type="text" name="anniversary_date" value="{{ $settings['anniversary_date'] ?? '' }}" required placeholder="YYYY-MM-DDTHH:MM:SS" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                <span class="text-[10px] text-pink-300/40 mt-1 block">Format: YYYY-MM-DDTHH:MM:SS (Contoh: 2023-10-17T01:58:00)</span>
                            </div>
                            <div>
                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Musik MP3 URL/Path</label>
                                <input type="text" name="music_url" value="{{ $settings['music_url'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                <span class="text-[10px] text-pink-300/40 mt-1 block">Upload file via FTP ke public/audio/ lalu isi path-nya</span>
                            </div>
                        </div>

                        <!-- Section: Hero Text -->
                        <div class="border-b border-white/10 pb-4 mb-2 select-none mt-6">
                            <h3 class="font-romantic text-xl text-white">🦸 Hero Section Teks</h3>
                        </div>
                        @php
                            $heroTitle = $heroSections->firstWhere('section_key', 'hero_title');
                            $heroSubtitle = $heroSections->firstWhere('section_key', 'hero_subtitle');
                        @endphp
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Judul Hero (H1)</label>
                                <input type="text" name="hero_title_content" value="{{ $heroTitle->content ?? 'Happy Birthday, My Princess!' }}" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                <input type="hidden" name="hero_title_id" value="{{ $heroTitle->id ?? '' }}">
                            </div>
                            <div>
                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Subtitle Hero</label>
                                <input type="text" name="hero_subtitle_content" value="{{ $heroSubtitle->content ?? 'My Dearest Love' }}" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                <input type="hidden" name="hero_subtitle_id" value="{{ $heroSubtitle->id ?? '' }}">
                            </div>
                        </div>

                        <!-- Section: Surat Cinta -->
                        <div class="border-b border-white/10 pb-4 mb-2 select-none mt-6">
                            <h3 class="font-romantic text-xl text-white">💌 Surat Cinta</h3>
                        </div>
                        <div>
                            <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Isi Surat Cinta Utama (Love Letter Scroll)</label>
                            <textarea name="letter_text" rows="6" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute admin-scroll">{{ $settings['letter_text'] ?? '' }}</textarea>
                        </div>
                        <div>
                            <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Isi Surat Rahasia (Crown Easter Egg 👑)</label>
                            <textarea name="easter_egg_letter" rows="4" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute admin-scroll">{{ $settings['easter_egg_letter'] ?? '' }}</textarea>
                        </div>

                        <!-- Section: Gift Voucher -->
                        <div class="border-b border-white/10 pb-4 mb-2 select-none mt-6">
                            <h3 class="font-romantic text-xl text-white">🎁 Gift Voucher</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Judul Voucher</label>
                                <input type="text" name="gift_title" value="{{ $settings['gift_title'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                            </div>
                            <div>
                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Subtitle Voucher</label>
                                <input type="text" name="gift_subtitle" value="{{ $settings['gift_subtitle'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                            </div>
                            <div>
                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Kode Kupon Voucher</label>
                                <input type="text" name="gift_coupon_code" value="{{ $settings['gift_coupon_code'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                            </div>
                        </div>
                        <div>
                            <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-wider mb-2">Deskripsi Lengkap Voucher</label>
                            <textarea name="gift_description" rows="3" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute admin-scroll">{{ $settings['gift_description'] ?? '' }}</textarea>
                        </div>

                        <!-- Save All Button -->
                        <div class="pt-6 flex flex-col gap-3">
                            <button type="submit" id="btn-save-all" class="w-full py-4 bg-gradient-to-r from-pink-500 via-rose-500 to-pink-500 hover:from-pink-600 hover:via-rose-600 hover:to-pink-600 text-white font-cute text-base font-bold rounded-2xl shadow-lg transition-all hover:scale-[1.02] active:scale-[0.98] cursor-pointer flex items-center justify-center gap-2">
                                <span>💾</span> Save All General Settings
                            </button>
                            <p id="save-status" class="text-center text-xs font-cute text-pink-300/50 h-4"></p>
                        </div>
                    </form>
                </div>

                <!-- ==========================================================================
                     B. TAB: REASONS CARDS (GRID)
                     ========================================================================== -->
                <div id="tab-reasons" class="tab-content hidden flex flex-col gap-6">
                    <div class="border-b border-white/10 pb-4 mb-4 select-none flex justify-between items-center">
                        <div>
                            <h2 class="font-romantic text-3xl text-white">Alasan Mencintaimu 💖</h2>
                            <p class="font-cute text-xs text-pink-300/40">Mengubah, menambah, atau menghapus kartu alasan kenapa kamu mencintainya.</p>
                        </div>
                    </div>

                    <!-- List of Reasons -->
                    <div class="space-y-6">
                        @foreach ($reasons as $reason)
                            <div class="admin-glass rounded-3xl p-6 border border-white/5 flex flex-col gap-6">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-4">
                                        <span class="text-3xl">{{ $reason->emoji }}</span>
                                        <div>
                                            <h4 class="font-cute text-base font-bold text-white">{{ $reason->title }}</h4>
                                            <p class="font-cute text-xs text-pink-300/50 mt-1">Warna Gradasi: <code class="bg-white/5 px-2 py-0.5 rounded text-pink-200">{{ $reason->color }}</code></p>
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <!-- Collapsable edit toggle -->
                                        <button onclick="toggleElement('edit-reason-{{ $reason->id }}')" class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-white font-cute text-xs hover:bg-white/10 transition-all cursor-pointer">Edit</button>
                                        
                                        <!-- Delete form -->
                                        <form action="{{ route('admin.reasons.destroy', $reason->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin mau menghapus alasan cinta ini? 🥺')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-500/10 border border-red-500/20 text-red-300 rounded-xl font-cute text-xs hover:bg-red-500/25 transition-all cursor-pointer">Hapus</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Collapsable edit form -->
                                <div id="edit-reason-{{ $reason->id }}" class="hidden border-t border-white/10 pt-6 mt-2">
                                    <form action="{{ route('admin.reasons.update', $reason->id) }}" method="POST" class="space-y-5 text-left">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Judul Alasan</label>
                                                <input type="text" name="title" value="{{ $reason->title }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                            </div>
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Emoji</label>
                                                <input type="text" name="emoji" value="{{ $reason->emoji }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                            </div>
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Gradasi Warna Tailwind</label>
                                                <input type="text" name="color" value="{{ $reason->color }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Deskripsi Singkat</label>
                                            <textarea name="description" rows="3" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute admin-scroll">{{ $reason->description }}</textarea>
                                        </div>
                                        <div class="flex justify-end gap-3 pt-2">
                                            <button type="button" onclick="toggleElement('edit-reason-{{ $reason->id }}')" class="px-5 py-2.5 border border-white/10 rounded-xl text-white font-cute text-xs hover:bg-white/5 transition-all cursor-pointer">Batal</button>
                                            <button type="submit" class="px-5 py-2.5 bg-pink-500 text-white rounded-xl font-cute text-xs hover:bg-pink-600 transition-all cursor-pointer">Simpan Perubahan 💾</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Create Form accordion -->
                    <div class="border-t border-white/10 pt-8 mt-6">
                        <details class="group bg-white/5 border border-white/10 rounded-[32px] p-8 pointer-events-auto">
                            <summary class="font-cute text-base font-bold text-white cursor-pointer select-none flex justify-between items-center">
                                <span>➕ Tambah Alasan Cinta Baru</span>
                                <span class="transition-transform group-open:rotate-180">▼</span>
                            </summary>
                            <form action="{{ route('admin.reasons.store') }}" method="POST" class="space-y-6 mt-8 text-left">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Judul Alasan</label>
                                        <input type="text" name="title" required placeholder="Contoh: Senyummu Manis" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                    </div>
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Emoji</label>
                                        <input type="text" name="emoji" required placeholder="Contoh: ✨" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                    </div>
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Gradasi Warna (from-[#...] to-[#...])</label>
                                        <input type="text" name="color" required placeholder="Contoh: from-[#FFE4E1] to-[#FFC0CB]" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                    </div>
                                </div>
                                <div>
                                    <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Deskripsi Alasan</label>
                                    <textarea name="description" rows="3" required placeholder="Tulis kenapa kamu mencintai hal itu..." class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute admin-scroll"></textarea>
                                </div>
                                <div class="flex justify-end pt-2">
                                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white font-cute text-sm font-bold rounded-xl shadow-lg transition-all hover:scale-105 active:scale-95 cursor-pointer">
                                        Tambah Alasan Baru 🚀
                                    </button>
                                </div>
                            </form>
                        </details>
                    </div>
                </div>

                <!-- ==========================================================================
                     C. TAB: MEMORIES GALLERY (POLAROID PHOTO UPLOADS)
                     ========================================================================== -->
                <div id="tab-memories" class="tab-content hidden flex flex-col gap-6">
                    <div class="border-b border-white/10 pb-4 mb-4 select-none">
                        <h2 class="font-romantic text-3xl text-white">Memori Polaroid Scrapbook 📸</h2>
                        <p class="font-cute text-xs text-pink-300/40">Kelola album polaroid simetris 3x2. Kamu bisa mengunggah foto baru, mengubah caption, dan memiringkan letaknya!</p>
                    </div>

                    <!-- Polaroid Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach ($memories as $memory)
                            <div class="admin-glass rounded-3xl p-6 border border-white/5 flex flex-col justify-between gap-6">
                                <div class="flex gap-5 items-start">
                                    <!-- Miniature image display -->
                                    <div class="w-24 h-24 bg-white rounded-xl p-2 shadow-md overflow-hidden flex-shrink-0 flex items-center justify-center relative">
                                        @if ($memory->image_path && File::exists(public_path($memory->image_path)))
                                            <img src="{{ asset($memory->image_path) }}" class="w-full h-full object-cover rounded-md">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-tr from-pink-200 to-romantic-gold rounded-md flex items-center justify-center text-2xl font-bold">🖼️</div>
                                        @endif
                                    </div>
                                    <div class="flex-grow">
                                        <p class="font-cute text-sm text-pink-200/90 leading-relaxed font-semibold">"{{ $memory->caption }}"</p>
                                        <p class="font-cute text-[10px] text-pink-300/40 uppercase tracking-widest mt-2">Kemiringan: <code class="bg-white/5 px-2 py-0.5 rounded text-pink-200">{{ $memory->rotation }}</code></p>
                                    </div>
                                </div>

                                <div class="flex justify-end gap-3 border-t border-white/5 pt-4">
                                    <button onclick="toggleElement('edit-memory-{{ $memory->id }}')" class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-white font-cute text-xs hover:bg-white/10 transition-all cursor-pointer">Edit Polaroid</button>
                                    
                                    <form action="{{ route('admin.memories.destroy', $memory->id) }}" method="POST" onsubmit="return confirm('Yakin mau menghapus Polaroid memori ini? 📸🥺')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500/10 border border-red-500/20 text-red-300 rounded-xl font-cute text-xs hover:bg-red-500/25 transition-all cursor-pointer">Hapus</button>
                                    </form>
                                </div>

                                <!-- Collapsable edit form with FILE UPLOAD -->
                                <div id="edit-memory-{{ $memory->id }}" class="hidden border-t border-white/10 pt-6 mt-2">
                                    <form action="{{ route('admin.memories.update', $memory->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5 text-left">
                                        @csrf
                                        <!-- Note: Laravel needs standard POST route for multipart file updates on SQLite without put-clash -->
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Kemiringan Polaroid (Rotation)</label>
                                                <input type="text" name="rotation" value="{{ $memory->rotation }}" required placeholder="Contoh: -4deg, 5deg" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                            </div>
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Ganti File Foto (Opsional)</label>
                                                <input type="file" name="photo" class="w-full text-xs text-pink-200 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-pink-500 file:text-white hover:file:bg-pink-600 file:cursor-pointer">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Caption Polaroid</label>
                                            <input type="text" name="caption" value="{{ $memory->caption }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                        </div>
                                        <div class="flex justify-end gap-3 pt-2">
                                            <button type="button" onclick="toggleElement('edit-memory-{{ $memory->id }}')" class="px-5 py-2.5 border border-white/10 rounded-xl text-white font-cute text-xs hover:bg-white/5 transition-all cursor-pointer">Batal</button>
                                            <button type="submit" class="px-5 py-2.5 bg-pink-500 text-white rounded-xl font-cute text-xs hover:bg-pink-600 transition-all cursor-pointer">Simpan Polaroid 📸💾</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Create Form accordion -->
                    <div class="border-t border-white/10 pt-8 mt-6">
                        <details class="group bg-white/5 border border-white/10 rounded-[32px] p-8 pointer-events-auto">
                            <summary class="font-cute text-base font-bold text-white cursor-pointer select-none flex justify-between items-center">
                                <span>📸 Unggah Foto Polaroid Baru</span>
                                <span class="transition-transform group-open:rotate-180">▼</span>
                            </summary>
                            <form action="{{ route('admin.memories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 mt-8 text-left">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">File Foto</label>
                                        <input type="file" name="photo" required class="w-full text-xs text-pink-200 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-pink-500 file:text-white hover:file:bg-pink-600 file:cursor-pointer">
                                    </div>
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Kemiringan Polaroid (Rotation)</label>
                                        <input type="text" name="rotation" required placeholder="Contoh: -5deg, 6deg" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                    </div>
                                </div>
                                <div>
                                    <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Caption Polaroid</label>
                                    <input type="text" name="caption" required placeholder="Tulis momen/cerita di balik foto ini..." class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                </div>
                                <div class="flex justify-end pt-2">
                                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white font-cute text-sm font-bold rounded-xl shadow-lg transition-all hover:scale-105 active:scale-95 cursor-pointer">
                                        Unggah & Buat Polaroid 🚀
                                    </button>
                                </div>
                            </form>
                        </details>
                    </div>
                </div>

                <!-- ==========================================================================
                     D. TAB: LOVE JOURNEY TIMELINE
                     ========================================================================== -->
                <div id="tab-milestones" class="tab-content hidden flex flex-col gap-6">
                    <div class="border-b border-white/10 pb-4 mb-4 select-none">
                        <h2 class="font-romantic text-3xl text-white">Love Journey Timeline 🕰️❤️</h2>
                        <p class="font-cute text-xs text-pink-300/40">Mengedit milestone perjalanan jadian, mulai dari kenal, first date, hingga hari jadi.</p>
                    </div>

                    <!-- Timeline List -->
                    <div class="space-y-6">
                        @foreach ($milestones as $milestone)
                            <div class="admin-glass rounded-3xl p-6 border border-white/5 flex flex-col gap-6">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-4">
                                        <span class="text-3xl">{{ $milestone->emoji }}</span>
                                        <div>
                                            <h4 class="font-cute text-base font-bold text-white">{{ $milestone->title }}</h4>
                                            <p class="font-cute text-xs text-pink-300/50 mt-1">Tanggal: <code class="bg-white/5 px-2 py-0.5 rounded text-pink-200">{{ $milestone->milestone_date }}</code></p>
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <button onclick="toggleElement('edit-milestone-{{ $milestone->id }}')" class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-white font-cute text-xs hover:bg-white/10 transition-all cursor-pointer">Edit</button>
                                        
                                        <form action="{{ route('admin.milestones.destroy', $milestone->id) }}" method="POST" onsubmit="return confirm('Yakin mau menghapus milestone ini? 🥺')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-500/10 border border-red-500/20 text-red-300 rounded-xl font-cute text-xs hover:bg-red-500/25 transition-all cursor-pointer">Hapus</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Collapsable edit form -->
                                <div id="edit-milestone-{{ $milestone->id }}" class="hidden border-t border-white/10 pt-6 mt-2">
                                    <form action="{{ route('admin.milestones.update', $milestone->id) }}" method="POST" class="space-y-5 text-left">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Judul Milestone</label>
                                                <input type="text" name="title" value="{{ $milestone->title }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                            </div>
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Tanggal Milestone</label>
                                                <input type="text" name="milestone_date" value="{{ $milestone->milestone_date }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                            </div>
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Emoji</label>
                                                <input type="text" name="emoji" value="{{ $milestone->emoji }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Kisah Cerita</label>
                                            <textarea name="description" rows="3" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute admin-scroll">{{ $milestone->description }}</textarea>
                                        </div>
                                        <div class="flex justify-end gap-3 pt-2">
                                            <button type="button" onclick="toggleElement('edit-milestone-{{ $milestone->id }}')" class="px-5 py-2.5 border border-white/10 rounded-xl text-white font-cute text-xs hover:bg-white/5 transition-all cursor-pointer">Batal</button>
                                            <button type="submit" class="px-5 py-2.5 bg-pink-500 text-white rounded-xl font-cute text-xs hover:bg-pink-600 transition-all cursor-pointer">Simpan Milestone 💾</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Create Form accordion -->
                    <div class="border-t border-white/10 pt-8 mt-6">
                        <details class="group bg-white/5 border border-white/10 rounded-[32px] p-8 pointer-events-auto">
                            <summary class="font-cute text-base font-bold text-white cursor-pointer select-none flex justify-between items-center">
                                <span>➕ Tambah Milestone Baru</span>
                                <span class="transition-transform group-open:rotate-180">▼</span>
                            </summary>
                            <form action="{{ route('admin.milestones.store') }}" method="POST" class="space-y-6 mt-8 text-left">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Judul Milestone</label>
                                        <input type="text" name="title" required placeholder="Contoh: First Date Kita" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                    </div>
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Tanggal Milestone</label>
                                        <input type="text" name="milestone_date" required placeholder="Contoh: Januari 15, 2024" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                    </div>
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Emoji</label>
                                        <input type="text" name="emoji" required placeholder="Contoh: ☕" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                    </div>
                                </div>
                                <div>
                                    <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Kisah Cerita</label>
                                    <textarea name="description" rows="3" required placeholder="Tulis cerita manis momen ini..." class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute admin-scroll"></textarea>
                                </div>
                                <div class="flex justify-end pt-2">
                                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white font-cute text-sm font-bold rounded-xl shadow-lg transition-all hover:scale-105 active:scale-95 cursor-pointer">
                                        Tambah Milestone Baru 🚀
                                    </button>
                                </div>
                            </form>
                        </details>
                    </div>
                </div>

                <!-- ==========================================================================
                     E. TAB: COUPLE CHEMISTRY QUIZ
                     ========================================================================== -->
                <div id="tab-quizzes" class="tab-content hidden flex flex-col gap-6">
                    <div class="border-b border-white/10 pb-4 mb-4 select-none">
                        <h2 class="font-romantic text-3xl text-white">Chemistry Quiz Questions 🧩</h2>
                        <p class="font-cute text-xs text-pink-300/40">Kelola soal kuis yang menguji seberapa kenal doi dengan kenangan kalian berdua.</p>
                    </div>

                    <!-- Quizzes List -->
                    <div class="space-y-8">
                        @foreach ($quizzes as $index => $quiz)
                            <div class="admin-glass rounded-3xl p-6 border border-white/5 flex flex-col gap-6 text-left">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <span class="bg-pink-500/20 text-pink-300 border border-pink-500/30 text-xs uppercase font-extrabold tracking-widest px-3 py-1 rounded-full">Soal #{{ $index + 1 }}</span>
                                        <h4 class="font-cute text-base font-bold text-white mt-3">{{ $quiz->question }}</h4>
                                    </div>
                                    <div class="flex gap-3">
                                        <button onclick="toggleElement('edit-quiz-{{ $quiz->id }}')" class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-white font-cute text-xs hover:bg-white/10 transition-all cursor-pointer">Edit</button>
                                        
                                        <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST" onsubmit="return confirm('Yakin mau menghapus soal kuis ini? 🥺')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-500/10 border border-red-500/20 text-red-300 rounded-xl font-cute text-xs hover:bg-red-500/25 transition-all cursor-pointer">Hapus</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Display Options Info -->
                                <div class="bg-white/5 border border-white/5 rounded-2xl p-5 text-sm space-y-3">
                                    <p class="font-cute text-pink-300/60 uppercase text-[10px] font-bold tracking-widest">Pilihan Jawaban:</p>
                                    <ol class="list-decimal pl-5 space-y-1.5 text-white/80 font-cute">
                                        @foreach ($quiz->choices as $optIndex => $opt)
                                            <li class="{{ $optIndex === $quiz->correct ? 'text-green-300 font-extrabold' : '' }}">
                                                {{ $opt }} {!! $optIndex === $quiz->correct ? '<span class="text-[10px] bg-green-500/20 text-green-200 border border-green-500/30 px-2 py-0.5 rounded-md ml-2 inline-block">Kunci Jawaban</span>' : '' !!}
                                            </li>
                                        @endforeach
                                    </ol>
                                    <p class="text-xs text-pink-300/50 pt-3 border-t border-white/5">Remark Salah: <em class="text-pink-200">"{{ $quiz->wrong_remark }}"</em></p>
                                </div>

                                <!-- Collapsable edit form -->
                                <div id="edit-quiz-{{ $quiz->id }}" class="hidden border-t border-white/10 pt-6 mt-2">
                                    <form action="{{ route('admin.quizzes.update', $quiz->id) }}" method="POST" class="space-y-5">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Pertanyaan Kuis</label>
                                            <input type="text" name="question" value="{{ $quiz->question }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Pilihan Jawaban (Satu Pilihan Per Baris)</label>
                                                <textarea name="choices_raw" rows="4" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute admin-scroll">{{ implode("\n", $quiz->choices) }}</textarea>
                                            </div>
                                            <div class="space-y-5">
                                                <div>
                                                    <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Nomor Index Jawaban Benar (0, 1, 2, dll)</label>
                                                    <input type="number" name="correct" value="{{ $quiz->correct }}" required min="0" max="3" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                                    <span class="text-[10px] text-pink-300/40 block mt-1">Pilihan pertama = 0, Pilihan kedua = 1, Pilihan ketiga = 2, dll.</span>
                                                </div>
                                                <div>
                                                    <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Remark Komen Salah (Lucu/Gemes)</label>
                                                    <input type="text" name="wrong_remark" value="{{ $quiz->wrong_remark }}" required class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end gap-3 pt-2">
                                            <button type="button" onclick="toggleElement('edit-quiz-{{ $quiz->id }}')" class="px-5 py-2.5 border border-white/10 rounded-xl text-white font-cute text-xs hover:bg-white/5 transition-all cursor-pointer">Batal</button>
                                            <button type="submit" class="px-5 py-2.5 bg-pink-500 text-white rounded-xl font-cute text-xs hover:bg-pink-600 transition-all cursor-pointer">Simpan Kuis 💾</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Create Form accordion -->
                    <div class="border-t border-white/10 pt-8 mt-6">
                        <details class="group bg-white/5 border border-white/10 rounded-[32px] p-8 pointer-events-auto">
                            <summary class="font-cute text-base font-bold text-white cursor-pointer select-none flex justify-between items-center">
                                <span>➕ Tambah Pertanyaan Kuis Baru</span>
                                <span class="transition-transform group-open:rotate-180">▼</span>
                            </summary>
                            <form action="{{ route('admin.quizzes.store') }}" method="POST" class="space-y-6 mt-8 text-left">
                                @csrf
                                <div>
                                    <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Pertanyaan Kuis</label>
                                    <input type="text" name="question" required placeholder="Contoh: Di mana kita pertama jadian?" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Pilihan Jawaban (Satu Pilihan Per Baris)</label>
                                        <textarea name="choices_raw" rows="4" required placeholder="Pilihan A&#10;Pilihan B&#10;Pilihan C&#10;Pilihan D" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute admin-scroll"></textarea>
                                    </div>
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Nomor Index Kunci Jawaban (0, 1, 2, atau 3)</label>
                                            <input type="number" name="correct" required min="0" max="3" placeholder="Contoh: 1" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                            <span class="text-[10px] text-pink-300/40 block mt-1">Pilihan pertama = 0, kedua = 1, ketiga = 2, dst.</span>
                                        </div>
                                        <div>
                                            <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Remark Salah (Warning Lucu)</label>
                                            <input type="text" name="wrong_remark" required placeholder="Contoh: Hayo ngaku! Nanti dicubit lho 😡❤️" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end pt-2">
                                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white font-cute text-sm font-bold rounded-xl shadow-lg transition-all hover:scale-105 active:scale-95 cursor-pointer">
                                        Tambah Pertanyaan Kuis 🚀
                                    </button>
                                </div>
                            </form>
                        </details>
                    </div>
                </div>

                <!-- ==========================================================================
                     F. TAB: HERO SECTION
                     ========================================================================== -->
                <div id="tab-hero" class="tab-content hidden flex flex-col gap-6">
                    <div class="border-b border-white/10 pb-4 mb-4 select-none">
                        <h2 class="font-romantic text-3xl text-white">Hero Section 🦸</h2>
                        <p class="font-cute text-xs text-pink-300/40">Kelola gambar polaroid hero di halaman atas. Judul & subtitle ada di tab <strong>General Config</strong> (Save All).</p>
                    </div>

                    <!-- Hero Polaroid Images -->
                    <div class="space-y-6">
                        @foreach ($heroSections->where('section_key', '!=', 'hero_title')->where('section_key', '!=', 'hero_subtitle') as $hero)
                            <div class="admin-glass rounded-3xl p-6 border border-white/5 flex flex-col gap-6">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-4">
                                        <span class="text-3xl">{{ $hero->emoji ?? '📸' }}</span>
                                        <div>
                                            <h4 class="font-cute text-base font-bold text-white">{{ $hero->title ?? ucfirst(str_replace(['hero_', '_'], ['', ' '], $hero->section_key)) }}</h4>
                                            <p class="font-cute text-xs text-pink-300/50 mt-1">Key: <code class="bg-white/5 px-2 py-0.5 rounded text-pink-200">{{ $hero->section_key }}</code></p>
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <button onclick="toggleElement('edit-hero-{{ $hero->id }}')" class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-white font-cute text-xs hover:bg-white/10 transition-all cursor-pointer">Edit</button>
                                        <form action="{{ route('admin.hero.destroy', $hero->id) }}" method="POST" onsubmit="return confirm('Yakin mau menghapus hero section ini? 🥺')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-500/10 border border-red-500/20 text-red-300 rounded-xl font-cute text-xs hover:bg-red-500/25 transition-all cursor-pointer">Hapus</button>
                                        </form>
                                    </div>
                                </div>

                                @if($hero->image_path)
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset($hero->image_path) }}" class="w-20 h-20 object-cover rounded-xl border border-white/10">
                                    <p class="font-cute text-xs text-pink-300/50">Gambar saat ini</p>
                                </div>
                                @endif

                                <!-- Collapsable edit form -->
                                <div id="edit-hero-{{ $hero->id }}" class="hidden border-t border-white/10 pt-6 mt-2">
                                    <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5 text-left">
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Caption / Teks</label>
                                                <input type="text" name="caption" value="{{ $hero->caption }}" placeholder="Contoh: Hugs For You 🫂" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                            </div>
                                            <div>
                                                <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Emoji (Fallback)</label>
                                                <input type="text" name="emoji" value="{{ $hero->emoji }}" placeholder="Contoh: 🧸" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Ganti Foto (Opsional)</label>
                                            <input type="file" name="photo" class="w-full text-xs text-pink-200 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-pink-500 file:text-white hover:file:bg-pink-600 file:cursor-pointer">
                                        </div>
                                        <div class="flex justify-end gap-3 pt-2">
                                            <button type="button" onclick="toggleElement('edit-hero-{{ $hero->id }}')" class="px-5 py-2.5 border border-white/10 rounded-xl text-white font-cute text-xs hover:bg-white/5 transition-all cursor-pointer">Batal</button>
                                            <button type="submit" class="px-5 py-2.5 bg-pink-500 text-white rounded-xl font-cute text-xs hover:bg-pink-600 transition-all cursor-pointer">Simpan 💾</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Add New Hero Section -->
                    <div class="border-t border-white/10 pt-8 mt-6">
                        <details class="group bg-white/5 border border-white/10 rounded-[32px] p-8 pointer-events-auto">
                            <summary class="font-cute text-base font-bold text-white cursor-pointer select-none flex justify-between items-center">
                                <span>➕ Tambah Hero Section Baru</span>
                                <span class="transition-transform group-open:rotate-180">▼</span>
                            </summary>
                            <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 mt-8 text-left">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Section Key (Unik)</label>
                                        <input type="text" name="section_key" required placeholder="Contoh: hero_custom_1" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                        <span class="text-[10px] text-pink-300/40 mt-1 block">Gunakan format: hero_nama_custom</span>
                                    </div>
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Judul / Label</label>
                                        <input type="text" name="title" placeholder="Contoh: Custom Polaroid" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Caption / Teks</label>
                                        <input type="text" name="caption" placeholder="Contoh: Momen spesial kita" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                    </div>
                                    <div>
                                        <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Emoji (Fallback)</label>
                                        <input type="text" name="emoji" placeholder="Contoh: 💖" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 font-cute">
                                    </div>
                                </div>
                                <div>
                                    <label class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-3">Foto</label>
                                    <input type="file" name="photo" class="w-full text-xs text-pink-200 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-pink-500 file:text-white hover:file:bg-pink-600 file:cursor-pointer">
                                </div>
                                <div class="flex justify-end pt-2">
                                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white font-cute text-sm font-bold rounded-xl shadow-lg transition-all hover:scale-105 active:scale-95 cursor-pointer">
                                        Tambah Hero Section 🚀
                                    </button>
                                </div>
                            </form>
                        </details>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Simple Dynamic JS Tabs Swapper -->
    <script>
        function switchTab(tabId) {
            // Hide all tabs
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.add('hidden'));

            // Remove active classes from all buttons
            const buttons = document.querySelectorAll('.admin-tab-btn');
            buttons.forEach(btn => btn.classList.remove('active'));

            // Show active tab and add class to button
            document.getElementById(tabId).classList.remove('hidden');
            document.getElementById('btn-' + tabId).classList.add('active');

            // Save active tab in local storage to keep state on redirect refreshes
            localStorage.setItem('admin_active_tab', tabId);
        }

        function toggleElement(elId) {
            const el = document.getElementById(elId);
            if (el.classList.contains('hidden')) {
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        }

        // Maintain active tab state on redirect
        document.addEventListener('DOMContentLoaded', () => {
            const activeTab = localStorage.getItem('admin_active_tab') || 'tab-general';
            switchTab(activeTab);

            // AJAX Save All — no page reload
            const form = document.getElementById('form-general-all');
            const saveBtn = document.getElementById('btn-save-all');
            const saveStatus = document.getElementById('save-status');

            if (form && saveBtn) {
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    const originalBtnText = saveBtn.innerHTML;
                    saveBtn.innerHTML = '<span>⏳</span> Menyimpan...';
                    saveBtn.disabled = true;
                    saveBtn.classList.add('opacity-75', 'cursor-not-allowed');
                    saveStatus.textContent = '';

                    try {
                        const formData = new FormData(form);
                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                        });

                        if (response.ok || response.redirected) {
                            saveBtn.innerHTML = '<span>✅</span> Tersimpan!';
                            saveStatus.textContent = 'Semua settings berhasil disimpan! 💖✨';
                            saveStatus.className = 'text-center text-xs font-cute text-green-300 h-4';
                        } else {
                            saveBtn.innerHTML = '<span>❌</span> Error';
                            saveStatus.textContent = 'Gagal menyimpan. Coba lagi.';
                            saveStatus.className = 'text-center text-xs font-cute text-red-300 h-4';
                        }
                    } catch (err) {
                        saveBtn.innerHTML = '<span>❌</span> Error';
                        saveStatus.textContent = 'Gagal menyimpan. Cek koneksi.';
                        saveStatus.className = 'text-center text-xs font-cute text-red-300 h-4';
                    }

                    setTimeout(() => {
                        saveBtn.innerHTML = originalBtnText;
                        saveBtn.disabled = false;
                        saveBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                        setTimeout(() => { saveStatus.textContent = ''; }, 3000);
                    }, 2000);
                });
            }
        });
    </script>
</body>
</html>
