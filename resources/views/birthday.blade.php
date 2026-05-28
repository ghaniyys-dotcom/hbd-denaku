<x-layouts.app>
    <!-- 1. Cinematic Opening Loading Screen -->
    <x-cinematic-loader :config="$config" />

    <!-- Floating Romantic Background Elements (all pages) -->
    <div id="romantic-bg-elements" class="fixed inset-0 pointer-events-none z-[1] overflow-hidden">
        <!-- Soft gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-pink-50/[0.03] via-transparent to-rose-50/[0.02]"></div>
        
        <!-- Floating hearts - subtle, slow -->
        <div class="absolute top-[5%] left-[3%] text-pink-300/10 animate-float-slow" style="animation-duration: 12s; font-size: 24px;">💕</div>
        <div class="absolute top-[15%] right-[5%] text-rose-300/10 animate-float-fast" style="animation-duration: 10s; animation-delay: 2s; font-size: 20px;">💗</div>
        <div class="absolute top-[30%] left-[8%] text-pink-200/8 animate-float-slow" style="animation-duration: 14s; animation-delay: 4s; font-size: 18px;">✨</div>
        <div class="absolute top-[50%] right-[3%] text-rose-200/8 animate-float-fast" style="animation-duration: 11s; animation-delay: 1s; font-size: 22px;">🌸</div>
        <div class="absolute top-[70%] left-[5%] text-pink-300/10 animate-float-slow" style="animation-duration: 13s; animation-delay: 3s; font-size: 16px;">💖</div>
        <div class="absolute top-[85%] right-[8%] text-rose-300/8 animate-float-fast" style="animation-duration: 15s; animation-delay: 5s; font-size: 20px;">🌷</div>
        <div class="absolute top-[40%] left-[95%] text-pink-200/6 animate-float-slow" style="animation-duration: 16s; animation-delay: 7s; font-size: 14px;">⭐</div>
        <div class="absolute top-[60%] left-[2%] text-rose-200/6 animate-float-fast" style="animation-duration: 9s; animation-delay: 6s; font-size: 16px;">🩷</div>
        <div class="absolute top-[25%] left-[50%] text-pink-200/5 animate-float-slow" style="animation-duration: 18s; animation-delay: 8s; font-size: 20px;">💫</div>
        <div class="absolute top-[90%] left-[30%] text-rose-200/6 animate-float-fast" style="animation-duration: 12s; animation-delay: 2.5s; font-size: 18px;">🎀</div>
        <div class="absolute top-[10%] left-[70%] text-pink-300/8 animate-float-slow" style="animation-duration: 14s; animation-delay: 4.5s; font-size: 16px;">💕</div>
        
        <!-- Glowing orbs - very subtle -->
        <div class="absolute top-[20%] left-[15%] w-[400px] h-[400px] bg-pink-200/[0.04] rounded-full blur-[120px] animate-pulse" style="animation-duration: 8s;"></div>
        <div class="absolute top-[60%] right-[10%] w-[350px] h-[350px] bg-rose-200/[0.04] rounded-full blur-[100px] animate-pulse" style="animation-duration: 10s; animation-delay: 3s;"></div>
        <div class="absolute top-[80%] left-[40%] w-[300px] h-[300px] bg-fuchsia-200/[0.03] rounded-full blur-[80px] animate-pulse" style="animation-duration: 12s; animation-delay: 5s;"></div>
    </div>

    <!-- Main Surprise Content (Loaded initially hidden, revealed smoothly after loader entry) -->
    <div id="app-content" class="opacity-0 hidden w-full relative z-[2]">
        <!-- 2. Fullscreen Parallax Hero Banner -->
        <x-hero-section :config="$config" />

        <!-- 3. Interactive envelope Love Letter -->
        <x-love-letter :config="$config" />

        <!-- 3.5 Love Journey vertical scrapbook timeline -->
        <x-love-journey :config="$config" />

        <!-- 3.6 Floating Sweet Messages (Romantic background ticker) -->
        <div id="floating-messages" class="fixed bottom-0 left-0 w-full pointer-events-none z-[5] overflow-hidden" style="height: 200px;">
        </div>

        <!-- 3.7 Special Love Note Card (animated envelope) -->
        <section id="love-note-section" class="relative py-20 px-6 overflow-hidden" style="background: linear-gradient(180deg, #FFF8F0 0%, #FFE8EC 50%, #FFF8F0 100%);">
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <div class="absolute top-10 left-[10%] text-pink-200/20 text-6xl animate-float-slow select-none" style="animation-duration: 8s;">💌</div>
                <div class="absolute top-20 right-[15%] text-rose-200/20 text-5xl animate-float-fast select-none" style="animation-duration: 6s;">💝</div>
                <div class="absolute bottom-10 left-[30%] text-pink-200/15 text-4xl animate-float-slow select-none" style="animation-duration: 10s;">💕</div>
            </div>
            
            <div class="relative z-10 max-w-2xl mx-auto text-center">
                <span class="font-sans text-xs font-bold tracking-[0.25em] text-pink-500/80 uppercase">Special Message</span>
                <h2 class="font-romantic text-4xl md:text-5xl text-pink-700 mt-3 filter drop-shadow-sm">
                    Pesan Cinta Untukmu 💌
                </h2>
                
                <!-- Envelope card -->
                <div id="love-envelope" class="mt-12 relative cursor-pointer group mx-auto" style="max-width: 420px;">
                    <!-- Envelope back -->
                    <div class="absolute inset-0 bg-gradient-to-br from-pink-100 to-rose-100 rounded-2xl transform rotate-1 shadow-lg"></div>
                    
                    <!-- Envelope body -->
                    <div class="relative bg-gradient-to-br from-white to-pink-50/80 rounded-2xl border border-pink-100 p-8 shadow-xl transform group-hover:scale-[1.02] transition-all duration-500">
                        <!-- Stamp -->
                        <div class="absolute -top-4 -right-4 w-16 h-20 bg-gradient-to-br from-rose-400 to-pink-500 rounded-sm shadow-lg flex flex-col items-center justify-center transform rotate-6 group-hover:rotate-12 transition-transform duration-300 z-10">
                            <span class="text-2xl">👑</span>
                            <span class="font-sans text-[7px] font-bold text-white/90 tracking-wider mt-0.5">LOVE</span>
                            <span class="font-sans text-[6px] text-white/70">FOREVER</span>
                            <!-- Stamp perforations -->
                            <div class="absolute inset-[3px] border border-dashed border-white/20 rounded-sm pointer-events-none"></div>
                        </div>
                        
                        <!-- Envelope flap (triangle) -->
                        <div class="absolute -top-6 left-0 right-0 h-8 overflow-hidden">
                            <div class="absolute top-0 left-0 right-0 h-12 bg-gradient-to-b from-pink-200/60 to-transparent transform -skew-y-1"></div>
                        </div>
                        
                        <!-- Heart seal -->
                        <div class="w-14 h-14 mx-auto bg-gradient-to-br from-rose-400 to-pink-500 rounded-full flex items-center justify-center shadow-lg animate-pulse group-hover:animate-none group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl filter drop-shadow-sm">💝</span>
                        </div>
                        
                        <p class="mt-6 font-cute text-pink-700/60 text-sm">
                            Klik amplop ini untuk membuka pesan cintaku...
                        </p>
                        
                        <!-- Hidden message (revealed on click) -->
                        <div id="love-message-content" class="hidden mt-6">
                            <div class="bg-gradient-to-br from-pink-50 to-rose-50/50 rounded-xl p-6 border border-pink-100 shadow-inner">
                                <p class="font-romantic text-xl md:text-2xl text-pink-600 leading-relaxed">
                                    Kamu adalah jawaban dari setiap doa yang pernah aku panjatkan. Setiap detik bersamamu adalah anugrah yang tidak akan pernah aku tukar dengan apa pun di dunia ini. Terima kasih sudah menjadi bagian dari hidupku. I love you more than words can say, my princess! 👑💕
                                </p>
                                <div class="mt-4 flex items-center justify-center gap-2">
                                    <span class="text-pink-300">—</span>
                                    <span class="font-romantic text-lg text-pink-500">Your Favorite Boy</span>
                                    <span class="text-pink-300">—</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Pinterest Scrapbook Polaroid Gallery -->
        <x-memory-gallery :config="$config" />

        <!-- 5. Interactive reasons explaining why she is loved -->
        <x-reasons-cards :config="$config" />

        <!-- 6. Catch My Love falling-hearts mini game -->
        <x-mini-game />

        <!-- 6.5 Romantic Couple Chemistry Quiz Gatekeeper -->
        <x-couple-quiz :config="$config" />

        <!-- Gated Locked sections (Reveals dynamically after Quiz Victory!) -->
        <div id="gated-surprise-container" class="opacity-15 blur-md pointer-events-none select-none h-0 overflow-hidden transition-all duration-[1500ms] ease-out">
            <!-- 7. Dynamic Anniversary counting-up timer -->
            <x-countdown-timer :config="$config" />

            <!-- 7.5 Unfolding 3D Gift Box Reveal -->
            <x-gift-box :config="$config" />

            <!-- 8. Deep Starry Night Final climax emotional section -->
            <x-final-section :config="$config" />
        </div>
    </div>

    <!-- 9. Floating vintage Vinyl Music Player -->
    <x-music-player :config="$config" />

    <!-- 10. Hidden Easter Egg "Princess" Letter Modal -->
    <div id="easter-egg-modal" class="fixed inset-0 z-[10005] hidden items-center justify-center bg-black/85 backdrop-blur-xl opacity-0 transition-opacity duration-700 p-4">
        <!-- Close overlay trigger -->
        <div id="easter-egg-overlay" class="absolute inset-0 cursor-pointer"></div>
        
        <!-- Cursive glowing modal content -->
        <div class="relative z-10 w-full max-w-xl glassmorphism rounded-[32px] border border-white/20 p-8 md:p-10 text-center shadow-[0_0_50px_rgba(255,183,197,0.3)] bg-gradient-to-br from-pink-900/40 to-black/60 flex flex-col items-center">
            <!-- Sparkles/Floating decor inside modal -->
            <div class="absolute -top-12 -left-6 text-4xl animate-bounce">👑</div>
            <div class="absolute -bottom-10 -right-6 text-4xl animate-pulse">💖</div>
            
            <div class="w-14 h-14 rounded-full bg-pink-500/25 border border-pink-400/30 flex items-center justify-center text-2xl animate-spin-slow mb-6">
                ✨
            </div>
            
            <span class="font-sans text-[10px] font-extrabold uppercase text-pink-300 tracking-[0.25em] mb-4">You found the Secret Crown Scroll</span>
            
            <h2 class="font-romantic text-3xl md:text-4xl text-white filter drop-shadow-[0_0_12px_rgba(255,182,193,0.5)] mb-6 leading-tight">
                Surat Rahasia Tuan Putri 👑💌
            </h2>
            
            <div class="max-h-[50vh] overflow-y-auto w-full px-4 pr-6 select-text text-left font-cute text-sm md:text-base text-pink-100/90 leading-relaxed space-y-4 whitespace-pre-wrap select-none pointer-events-auto">
                {!! nl2br(e($config['easter_egg_letter'])) !!}
            </div>
            
            <button id="btn-close-easter-egg" class="mt-8 px-8 py-3 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white font-cute text-sm font-bold rounded-full shadow-lg transition-all active:scale-95 cursor-pointer pointer-events-auto">
                Tutup Surat Rahasia 🎀
            </button>
        </div>
    </div>

</x-layouts.app>
