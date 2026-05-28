<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Sealed with Love 🔐</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Playpen+Sans:wght@400;600;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #09050d 0%, #150a1d 50%, #210e2d 100%) !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 0;
            padding: 20px;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.04) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3), 0 0 40px rgba(255, 183, 197, 0.1) !important;
            border-radius: 32px;
            width: 100%;
            max-width: 440px;
            padding: 40px;
            text-align: center;
            position: relative;
            z-index: 10;
        }
    </style>
</head>
<body>
    <!-- Starry Backdrop Simulation -->
    <div class="absolute inset-0 w-full h-full pointer-events-none opacity-40">
        <div class="absolute w-[200px] h-[200px] bg-romantic-pink/20 rounded-full blur-[100px] top-10 left-10 animate-pulse-glow"></div>
        <div class="absolute w-[250px] h-[250px] bg-romantic-gold/15 rounded-full blur-[120px] bottom-10 right-10 animate-pulse-glow" style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Login Container -->
    <div class="login-card">
        <!-- Floating decor -->
        <span class="absolute -top-6 -left-6 text-4xl animate-bounce">👑</span>
        <span class="absolute -bottom-6 -right-6 text-4xl animate-bounce" style="animation-delay: 1s;">🔐</span>

        <!-- Header -->
        <div class="w-16 h-16 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-3xl mb-6 mx-auto animate-pulse">
            🔑
        </div>
        
        <h1 class="font-romantic text-4xl text-white filter drop-shadow-[0_0_8px_rgba(255,255,255,0.2)] mb-2 select-none">
            Admin Control Deck
        </h1>
        <p class="font-cute text-xs text-pink-300/60 mb-8 tracking-wider uppercase select-none">
            Sealed With Love Dashboard
        </p>

        <!-- Messages Feedback Alert -->
        @if (session('error'))
            <div class="mb-6 p-4 rounded-2xl bg-red-500/15 border border-red-500/30 text-red-200 text-xs md:text-sm font-cute text-left flex gap-2 animate-bounce">
                <span>⚠️</span>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-green-500/15 border border-green-500/30 text-green-200 text-xs md:text-sm font-cute text-left flex gap-2">
                <span>👑</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ url('/admin/login') }}" method="POST" class="space-y-6 text-left pointer-events-auto">
            @csrf
            
            <!-- Input Username -->
            <div>
                <label for="username" class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-2 select-none">Username</label>
                <div class="relative">
                    <input id="username" name="username" type="text" value="{{ old('username') }}" required placeholder="Ketik username admin..." class="w-full px-5 py-3.5 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-pink-200/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition-all font-cute">
                </div>
            </div>

            <!-- Input Password -->
            <div>
                <label for="password" class="block font-cute text-xs font-semibold text-pink-200 uppercase tracking-widest mb-2 select-none">Password</label>
                <div class="relative">
                    <input id="password" name="password" type="password" required placeholder="Ketik password admin..." class="w-full px-5 py-3.5 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-pink-200/20 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition-all font-cute">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-4 mt-4 bg-gradient-to-r from-pink-500 via-rose-500 to-amber-400 text-white font-cute text-base font-bold rounded-2xl shadow-[0_8px_30px_rgba(244,63,94,0.3)] hover:shadow-[0_15px_45px_rgba(244,63,94,0.5)] transition-all duration-300 hover:scale-[1.02] active:scale-95 cursor-pointer">
                Enter Control Deck 🚀
            </button>
        </form>

        <!-- Footer link back -->
        <div class="mt-8 text-center">
            <a href="{{ url('/') }}" class="font-cute text-xs text-pink-300/40 hover:text-pink-300/70 transition-colors flex items-center justify-center gap-1.5 cursor-pointer select-none">
                <span>⏪</span> Kembali ke Halaman Utama
            </a>
        </div>
    </div>
</body>
</html>
