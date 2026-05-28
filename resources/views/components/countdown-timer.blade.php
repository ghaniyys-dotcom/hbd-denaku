@props(['config'])

<section id="countdown-section" class="relative py-24 px-6 scrapbook-bg overflow-hidden flex flex-col items-center">
    <!-- Parallax shapes -->
    <div class="absolute top-[10%] left-[12%] text-2xl opacity-15 pointer-events-none animate-float-slow">⏳</div>
    <div class="absolute bottom-[10%] right-[12%] text-3xl opacity-20 pointer-events-none animate-float-fast">💖</div>

    <div class="relative z-10 text-center mb-16 max-w-lg mx-auto select-none">
        <span class="font-sans text-xs font-bold tracking-[0.25em] text-pink-500/80 uppercase">Days of Love</span>
        <h2 class="font-romantic text-4xl md:text-5xl text-pink-600 mt-2 filter drop-shadow-sm">
            Our Love Story Timer ⏳
        </h2>
        <p class="mt-3 font-cute text-sm text-pink-700/50">
            Setiap detik bersamamu adalah momen paling berharga dalam hidupku. Kita telah berbagi kebahagiaan selama:
        </p>
    </div>

    <!-- Timer Cards Grid -->
    <div class="relative z-10 w-full max-w-3xl grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 px-4 pointer-events-auto select-none">
        <!-- Card: Days -->
        <div class="glassmorphism p-5 md:p-7 rounded-3xl border border-white/50 shadow-lg flex flex-col items-center justify-center transform hover:scale-105 active:scale-95 transition-all duration-300 group hover:shadow-[0_12px_30px_rgba(255,183,197,0.3)]">
            <span id="timer-days" class="font-cute text-4xl md:text-6xl font-extrabold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300 filter drop-shadow-sm">00</span>
            <span class="mt-3 font-sans text-xs md:text-sm font-bold text-pink-700/60 uppercase tracking-widest">Days</span>
        </div>

        <!-- Card: Hours -->
        <div class="glassmorphism p-5 md:p-7 rounded-3xl border border-white/50 shadow-lg flex flex-col items-center justify-center transform hover:scale-105 active:scale-95 transition-all duration-300 group hover:shadow-[0_12px_30px_rgba(255,183,197,0.3)]">
            <span id="timer-hours" class="font-cute text-4xl md:text-6xl font-extrabold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300 filter drop-shadow-sm">00</span>
            <span class="mt-3 font-sans text-xs md:text-sm font-bold text-pink-700/60 uppercase tracking-widest">Hours</span>
        </div>

        <!-- Card: Minutes -->
        <div class="glassmorphism p-5 md:p-7 rounded-3xl border border-white/50 shadow-lg flex flex-col items-center justify-center transform hover:scale-105 active:scale-95 transition-all duration-300 group hover:shadow-[0_12px_30px_rgba(255,183,197,0.3)]">
            <span id="timer-minutes" class="font-cute text-4xl md:text-6xl font-extrabold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300 filter drop-shadow-sm">00</span>
            <span class="mt-3 font-sans text-xs md:text-sm font-bold text-pink-700/60 uppercase tracking-widest">Minutes</span>
        </div>

        <!-- Card: Seconds -->
        <div class="glassmorphism p-5 md:p-7 rounded-3xl border border-white/50 shadow-lg flex flex-col items-center justify-center transform hover:scale-105 active:scale-95 transition-all duration-300 group hover:shadow-[0_12px_30px_rgba(255,183,197,0.3)]">
            <span id="timer-seconds" class="font-cute text-4xl md:text-6xl font-extrabold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300 filter drop-shadow-sm animate-pulse">00</span>
            <span class="mt-3 font-sans text-xs md:text-sm font-bold text-pink-700/60 uppercase tracking-widest animate-pulse">Seconds</span>
        </div>
    </div>

    <!-- Heartbeat foot text -->
    <div class="relative z-10 mt-12 text-center select-none">
        <p class="font-sans text-[11px] font-semibold text-pink-500/60 uppercase tracking-[0.25em] flex items-center justify-center gap-1.5 animate-pulse">
            <span>❤️</span> Counting every second we spend together <span>❤️</span>
        </p>
    </div>

    <!-- Hidden anniversary data-attribute for JS pickup -->
    <div id="anniversary-date-picker" class="hidden" data-date="{{ $config['anniversary_date'] }}"></div>
</section>
