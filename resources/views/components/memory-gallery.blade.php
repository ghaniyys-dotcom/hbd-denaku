@props(['config'])

<section id="gallery-section" class="relative py-24 px-6 overflow-hidden" style="background: linear-gradient(180deg, #FFF8F0 0%, #FFE8EC 25%, #FFF0F5 50%, #FDEEF4 75%, #FFF8F0 100%);">
    <!-- Curved divider top -->
    <div class="absolute top-0 left-0 w-full overflow-hidden leading-[0] transform rotate-180 z-10 pointer-events-none">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[50px] fill-romantic-cream-light">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"></path>
        </svg>
    </div>

    <!-- Romantic background decorations -->
    <!-- Soft glowing orbs -->
    <div class="absolute top-20 left-10 w-[300px] h-[300px] bg-pink-300/20 rounded-full blur-[100px] pointer-events-none animate-pulse" style="animation-duration: 4s;"></div>
    <div class="absolute top-1/3 right-5 w-[250px] h-[250px] bg-rose-200/25 rounded-full blur-[80px] pointer-events-none animate-pulse" style="animation-duration: 6s; animation-delay: 1s;"></div>
    <div class="absolute bottom-20 left-1/4 w-[200px] h-[200px] bg-pink-200/20 rounded-full blur-[90px] pointer-events-none animate-pulse" style="animation-duration: 5s; animation-delay: 2s;"></div>
    <div class="absolute bottom-1/3 right-1/4 w-[280px] h-[280px] bg-fuchsia-200/15 rounded-full blur-[70px] pointer-events-none animate-pulse" style="animation-duration: 7s; animation-delay: 0.5s;"></div>

    <!-- Floating sparkle decorations -->
    <div class="absolute top-[15%] left-[8%] text-3xl pointer-events-none animate-float-slow select-none" style="animation-duration: 6s;">💫</div>
    <div class="absolute top-[25%] right-[12%] text-2xl pointer-events-none animate-float-fast select-none" style="animation-duration: 4s; animation-delay: 1.5s;">🌸</div>
    <div class="absolute top-[60%] left-[5%] text-3xl pointer-events-none animate-float-fast select-none" style="animation-duration: 5s; animation-delay: 0.8s;">✨</div>
    <div class="absolute top-[45%] right-[6%] text-2xl pointer-events-none animate-float-slow select-none" style="animation-duration: 7s; animation-delay: 2s;">💕</div>
    <div class="absolute bottom-[25%] left-[15%] text-2xl pointer-events-none animate-float-slow select-none" style="animation-duration: 5.5s; animation-delay: 1s;">🌷</div>
    <div class="absolute bottom-[35%] right-[10%] text-3xl pointer-events-none animate-float-fast select-none" style="animation-duration: 6.5s; animation-delay: 0.3s;">💖</div>
    <div class="absolute top-[80%] left-[50%] text-xl pointer-events-none animate-float-slow select-none" style="animation-duration: 8s; animation-delay: 1.8s;">🩷</div>
    <div class="absolute top-[10%] left-[40%] text-xl pointer-events-none animate-float-fast select-none opacity-40" style="animation-duration: 6s; animation-delay: 0.5s;">⭐</div>
    <div class="absolute bottom-[15%] right-[35%] text-lg pointer-events-none animate-float-slow select-none opacity-50" style="animation-duration: 9s; animation-delay: 3s;">🎀</div>

    <!-- Subtle heart pattern overlay -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none select-none" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 18c-3-6-12-8-15-1s0 11 3 14l12 15 12-15c3-3 6-10 3-14s-12-1-15 1z' fill='%23ec4899'/%3E%3C/svg%3E&quot;); background-size: 60px 60px;"></div>

    <!-- Diagonal light streaks -->
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden opacity-30">
        <div class="absolute top-[-10%] left-[20%] w-[1px] h-[120%] bg-gradient-to-b from-transparent via-pink-300/40 to-transparent rotate-[15deg]"></div>
        <div class="absolute top-[-10%] left-[60%] w-[1px] h-[120%] bg-gradient-to-b from-transparent via-rose-200/30 to-transparent rotate-[-10deg]"></div>
        <div class="absolute top-[-10%] left-[80%] w-[1px] h-[120%] bg-gradient-to-b from-transparent via-pink-200/25 to-transparent rotate-[20deg]"></div>
    </div>

    <div class="relative z-10 text-center mb-16 max-w-lg mx-auto select-none">
        <span class="font-sans text-xs font-bold tracking-[0.25em] text-pink-500/80 uppercase">Scrapbook Story</span>
        <h2 class="font-romantic text-4xl md:text-5xl text-pink-700 mt-2 filter drop-shadow-sm">
            Our Sweet Memories 📸
        </h2>
        <p class="mt-3 font-cute text-sm text-pink-700/60">
            A beautiful snapshot of our journeys together. Hover to tilt them, click to view fullscreen comments!
        </p>
    </div>

    <!-- Scrapbook Polaroid Grid -->
    <div class="relative z-10 max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 px-4">
        @forelse($config['gallery'] as $index => $item)
            <div class="polaroid-item flex justify-center pointer-events-auto" style="--rotation: {{ $item['rotation'] }}">
                <!-- Polaroid Frame -->
                <div class="polaroid-frame w-[280px] bg-white rounded-sm shadow-lg p-3.5 transform hover:scale-105 active:scale-95 transition-all duration-300 cursor-pointer border border-pink-100 flex flex-col items-center hover:shadow-[0_15px_35px_rgba(255,183,197,0.4)]"
                     style="transform: rotate({{ $item['rotation'] }});"
                     data-image-path="{{ $item['image'] ? asset($item['image']) : '' }}"
                     data-caption="{{ $item['caption'] }}"
                     data-index="{{ $index }}">
                    
                    <!-- Photo Container -->
                    <div class="relative w-full aspect-[4/5] bg-romantic-pink-light/40 rounded-sm overflow-hidden border border-pink-50 flex items-center justify-center">
                        @php
                            $imgExists = !empty($item['image']) && file_exists(public_path($item['image']));
                        @endphp

                        @if($imgExists)
                            <img src="{{ asset($item['image']) }}" alt="Memory #{{ $index + 1 }}" class="w-full h-full object-cover" loading="lazy" decoding="async">
                        @endif
                        
                        <!-- Beautiful graphic placeholder (shown when image missing) -->
                        <div class="polaroid-fallback absolute inset-0 bg-gradient-to-tr from-romantic-pink/40 to-romantic-gold/25 flex flex-col items-center justify-center p-6 text-center select-none {{ $imgExists ? 'hidden' : '' }}">
                            <span class="text-3xl animate-bounce">
                                @switch($index % 6)
                                    @case(0) 🧸 @break
                                    @case(1) 🍕 @break
                                    @case(2) 🍿 @break
                                    @case(3) ✈️ @break
                                    @case(4) 🍦 @break
                                    @case(5) 🌅 @break
                                @endswitch
                            </span>
                            <span class="font-romantic text-xl text-pink-600/80 mt-3">Memory #{{ $index + 1 }}</span>
                            <span class="font-sans text-[8px] text-pink-600/50 uppercase tracking-widest mt-1">Tap to enlarge</span>
                        </div>

                        <!-- Hover overlay details -->
                        <div class="absolute inset-0 bg-gradient-to-t from-pink-500/30 via-transparent to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-3 select-none">
                            <span class="text-white text-xs font-semibold drop-shadow-sm flex items-center gap-1">
                                🔍 Click to view comment
                            </span>
                        </div>
                    </div>

                    <!-- Caption styling -->
                    <p class="mt-4 font-romantic text-xl text-pink-700/85 text-center px-1 line-clamp-1 select-none">
                        {{ $item['caption'] }}
                    </p>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16">
                <span class="text-6xl">📸</span>
                <p class="font-cute text-lg text-pink-400 mt-4">Belum ada memori foto. Tambahkan dari admin panel!</p>
                <p class="font-cute text-sm text-pink-300/50 mt-2">Gambar yang diunggah akan muncul di sini secara otomatis.</p>
            </div>
        @endforelse
    </div>

    <!-- Fullscreen Polaroid Modal / Lightbox -->
    <div id="gallery-modal" class="fixed inset-0 z-[10000] hidden items-center justify-center bg-black/80 backdrop-blur-lg opacity-0 transition-opacity duration-300 p-4">
        <!-- Close overlay trigger -->
        <div id="gallery-modal-overlay" class="absolute inset-0 cursor-pointer pointer-events-auto"></div>

        <div class="relative z-10 max-w-lg w-full bg-white rounded-3xl shadow-2xl flex flex-col items-center overflow-hidden select-none pointer-events-auto">
            <!-- Modal Close button -->
            <button id="btn-close-gallery" class="absolute top-3 right-3 z-30 w-9 h-9 rounded-full bg-white/90 text-pink-600 font-bold flex items-center justify-center shadow-lg border border-pink-100 hover:bg-pink-50 hover:scale-110 transition-all focus:outline-none cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <!-- Large Photo Frame -->
            <div class="w-full bg-white flex flex-col items-center">
                <div class="w-full aspect-[4/5] bg-pink-50 overflow-hidden flex items-center justify-center relative">
                    <img id="modal-img" src="" alt="Enlarged Memory" class="w-full h-full object-cover hidden" decoding="async">
                    
                    <!-- Fallback holder -->
                    <div id="modal-fallback" class="absolute inset-0 bg-gradient-to-tr from-romantic-pink/40 to-romantic-gold/25 flex flex-col items-center justify-center p-6 text-center">
                        <span id="modal-fallback-emoji" class="text-6xl animate-bounce">📸</span>
                        <h4 class="font-romantic text-3xl text-pink-600/90 mt-4">Happy Memory</h4>
                    </div>
                </div>
            </div>

            <!-- Caption / Description Section -->
            <div class="w-full bg-gradient-to-b from-white to-pink-50/50 px-6 py-5">
                <p id="modal-caption" class="font-cute text-base md:text-lg text-pink-800 text-center leading-relaxed"></p>
            </div>

            <!-- Love comment box -->
            <div class="w-full px-6 pb-5">
                <div class="w-full bg-pink-50/80 rounded-2xl p-4 border border-pink-100/50 flex items-start gap-3">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-pink-400 to-rose-400 text-sm flex items-center justify-center text-white font-bold select-none shadow-sm flex-shrink-0">
                        👦
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-sans text-xs font-bold text-pink-600">Your Favorite Boy 💕</p>
                        <p id="modal-love-comment" class="font-cute text-[13px] text-pink-700/80 leading-relaxed mt-1"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
