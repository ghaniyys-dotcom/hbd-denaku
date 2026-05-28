@props(['config'])

<section id="reasons-section" class="relative py-24 px-6 bg-romantic-cream-light overflow-hidden">
    <!-- Parallax backgrounds -->
    <div class="absolute top-[15%] left-[8%] text-2xl opacity-20 pointer-events-none animate-float-slow">💖</div>
    <div class="absolute bottom-[20%] right-[10%] text-2xl opacity-20 pointer-events-none animate-float-fast">🌸</div>

    <div class="relative z-10 text-center mb-16 max-w-lg mx-auto select-none">
        <span class="font-sans text-xs font-bold tracking-[0.25em] text-pink-500/80 uppercase">Reasons Why</span>
        <h2 class="font-romantic text-4xl md:text-5xl text-pink-600 mt-2 filter drop-shadow-sm">
            Why I Love You ✨
        </h2>
        <p class="mt-3 font-cute text-sm text-pink-700/50">
            Berikut ini adalah beberapa alasan kecil (dari jutaan alasan lainnya) kenapa kamu begitu spesial di mataku!
        </p>
    </div>

    <!-- Reason Cards Grid -->
    <div class="relative z-10 max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4 pointer-events-auto">
        @foreach($config['reasons'] as $index => $reason)
            <div class="reason-card group relative p-7 rounded-2xl bg-gradient-to-tr {{ $reason['color'] }} border border-white/50 shadow-[0_8px_30px_rgb(255,183,197,0.1)] hover:shadow-[0_15px_40px_rgb(255,110,130,0.25)] transition-all duration-500 cursor-pointer overflow-hidden transform hover:-translate-y-2 flex flex-col justify-between min-h-[220px]"
                 data-index="{{ $index }}">
                
                <!-- Ambient circular glow in card -->
                <div class="absolute -top-12 -right-12 w-28 h-28 bg-white/20 rounded-full blur-xl group-hover:scale-125 transition-transform duration-500 pointer-events-none"></div>

                <div>
                    <!-- Header with circular floating emoji bubble -->
                    <div class="flex justify-between items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-white/80 backdrop-blur-sm shadow-sm flex items-center justify-center text-2xl group-hover:scale-110 transition-transform duration-300 select-none animate-float-slow" style="animation-delay: {{ $index * 0.3 }}s">
                            {{ $reason['emoji'] }}
                        </div>
                        <span class="font-sans text-[10px] font-bold text-pink-500/50 tracking-widest select-none">#REASON_{{ $index + 1 }}</span>
                    </div>

                    <!-- Title -->
                    <h3 class="font-cute text-lg md:text-xl font-bold text-pink-950/90 leading-tight">
                        {{ $reason['title'] }}
                    </h3>

                    <!-- Description text -->
                    <p class="mt-2.5 font-sans text-xs md:text-sm text-pink-900/70 leading-relaxed">
                        {{ $reason['description'] }}
                    </p>
                </div>

                <!-- Footer cute accent -->
                <div class="mt-5 flex items-center justify-between border-t border-pink-950/5 pt-3 select-none">
                    <span class="font-romantic text-xs text-pink-600 font-bold group-hover:translate-x-1.5 transition-transform">Always love you</span>
                    <span class="text-xs opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-pink-500">❤️</span>
                </div>
            </div>
        @endforeach
    </div>
</section>
