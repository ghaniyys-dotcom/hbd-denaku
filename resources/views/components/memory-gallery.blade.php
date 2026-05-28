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
