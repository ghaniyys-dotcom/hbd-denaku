@props(['config'])

<section id="gallery-section" class="relative py-24 px-6 bg-romantic-pink-light overflow-hidden">
    <!-- Curved divider top -->
    <div class="absolute top-0 left-0 w-full overflow-hidden leading-[0] transform rotate-180 z-10 pointer-events-none">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[50px] fill-romantic-cream-light">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"></path>
        </svg>
    </div>

    <!-- Floating details -->
    <div class="absolute top-[30%] right-[10%] text-3xl pointer-events-none opacity-20 animate-bounce">🎈</div>
    <div class="absolute bottom-[20%] left-[8%] text-3xl pointer-events-none opacity-20 animate-bounce" style="animation-delay: 1s;">✨</div>

    <div class="relative z-10 text-center mb-16 max-w-lg mx-auto select-none">
        <span class="font-sans text-xs font-bold tracking-[0.25em] text-pink-500/80 uppercase">Scrapbook Story</span>
        <h2 class="font-romantic text-4xl md:text-5xl text-pink-600 mt-2 filter drop-shadow-sm">
            Our Sweet Memories 📸
        </h2>
        <p class="mt-3 font-cute text-sm text-pink-700/50">
            A beautiful snapshot of our journeys together. Hover to tilt them, click to view fullscreen comments!
        </p>
    </div>

    <!-- Scrapbook Polaroid Grid -->
    <div class="relative z-10 max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 px-4">
        @foreach($config['gallery'] as $index => $item)
            <div class="polaroid-item flex justify-center pointer-events-auto" style="--rotation: {{ $item['rotation'] }}">
                <!-- Polaroid Frame -->
                <div class="polaroid-frame w-[280px] bg-white rounded-sm shadow-lg p-3.5 transform hover:scale-105 active:scale-95 transition-all duration-300 cursor-pointer border border-pink-100 flex flex-col items-center hover:shadow-[0_15px_35px_rgba(255,183,197,0.4)]"
                     style="transform: rotate({{ $item['rotation'] }});"
                     data-image-path="{{ asset($item['image']) }}"
                     data-caption="{{ $item['caption'] }}"
                     data-index="{{ $index }}">
                     
                    <!-- Photo Container -->
                    <div class="relative w-full aspect-[4/5] bg-romantic-pink-light/40 rounded-sm overflow-hidden border border-pink-50 flex items-center justify-center">
                        <img src="{{ asset($item['image']) }}" alt="Memory #{{ $index + 1 }}" class="w-full h-full object-cover hidden" loading="lazy" decoding="async" onerror="this.classList.add('hidden'); document.getElementById('gallery-fallback-{{ $index }}').classList.remove('hidden')">
                        
                        <!-- Beautiful graphic placeholder if image is missing -->
                        <div id="gallery-fallback-{{ $index }}" class="absolute inset-0 bg-gradient-to-tr from-romantic-pink/40 to-romantic-gold/25 flex flex-col items-center justify-center p-6 text-center select-none">
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
        @endforeach
    </div>

    <!-- Fullscreen Polaroid Modal / Lightbox -->
    <div id="gallery-modal" class="fixed inset-0 z-[10000] hidden items-center justify-center bg-black/75 backdrop-blur-md opacity-0 transition-opacity duration-300 p-4">
        <!-- Close overlay trigger -->
        <div id="gallery-modal-overlay" class="absolute inset-0 cursor-pointer pointer-events-auto"></div>

        <div class="relative z-10 max-w-md w-full glassmorphism p-5 rounded-2xl border border-white/30 shadow-2xl flex flex-col items-center animate-float-slow select-none pointer-events-auto">
            <!-- Modal Close button -->
            <button id="btn-close-gallery" class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-white text-pink-600 font-bold flex items-center justify-center shadow-md border border-pink-100 hover:bg-pink-50 transition-colors focus:outline-none z-20">
                ✕
            </button>

            <!-- Large Photo Frame inside modal -->
            <div class="w-full bg-white rounded-lg p-3 shadow-md flex flex-col items-center">
                <div class="w-full aspect-[4/5] bg-romantic-pink-light/40 rounded-md overflow-hidden flex items-center justify-center relative">
                    <img id="modal-img" src="" alt="Enlarged Memory" class="w-full h-full object-cover hidden" decoding="async">
                    
                    <!-- Fallback holder inside modal -->
                    <div id="modal-fallback" class="absolute inset-0 bg-gradient-to-tr from-romantic-pink/40 to-romantic-gold/25 flex flex-col items-center justify-center p-6 text-center">
                        <span id="modal-fallback-emoji" class="text-6xl animate-bounce">📸</span>
                        <h4 class="font-romantic text-3xl text-pink-600/90 mt-4">Happy Memory</h4>
                    </div>
                </div>
                
                <!-- Expanded Caption -->
                <p id="modal-caption" class="mt-4 font-romantic text-2xl text-pink-700 text-center px-2">
                    Memory caption goes here!
                </p>
            </div>

            <!-- Comment box simulating a real social layout -->
            <div class="w-full mt-4 bg-white/70 backdrop-blur-sm rounded-xl p-3 border border-white/40 flex items-start gap-3 shadow-inner">
                <div class="w-8 h-8 rounded-full bg-pink-300 text-sm flex items-center justify-center text-white font-bold select-none shadow-sm">
                    👦
                </div>
                <div class="flex-1">
                    <p class="font-sans text-xs font-bold text-pink-600">Your Favorite Boy</p>
                    <p class="font-sans text-[11px] text-pink-800/80 leading-relaxed mt-0.5">
                        "Aku inget banget momen ini! Kamu lucu banget waktu itu, pipimu merah pas aku godain. Selamanya bakal jadi salah satu memori terindahku... ❤️"
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
