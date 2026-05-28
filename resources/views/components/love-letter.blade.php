@props(['config'])

<section id="love-letter-section" class="relative py-24 px-6 scrapbook-bg overflow-hidden flex flex-col items-center">
    <!-- Background sparkles -->
    <div class="absolute top-[10%] left-[5%] text-xl pointer-events-none opacity-40 animate-float-slow">🎀</div>
    <div class="absolute bottom-[15%] right-[8%] text-2xl pointer-events-none opacity-40 animate-float-fast">🕊️</div>

    <div class="relative z-10 text-center mb-16 max-w-lg select-none">
        <span class="font-sans text-xs font-bold tracking-[0.25em] text-pink-500/80 uppercase">A Digital Love Letter</span>
        <h2 class="font-romantic text-4xl md:text-5xl text-pink-600 mt-2 filter drop-shadow-sm">
            Sealed With Love 💌
        </h2>
        <p class="mt-3 font-cute text-sm text-pink-700/50">
            Tap the golden red wax seal to open a special message I wrote just for you.
        </p>
    </div>

    <!-- Interactive Envelope Container -->
    <div class="relative z-10 w-full flex justify-center py-20 min-h-[500px]">
        <div id="romantic-envelope-wrapper" class="envelope-wrapper select-none cursor-pointer group pointer-events-auto">
            <!-- Flap -->
            <div class="envelope-flap"></div>
            
            <!-- Back of Envelope -->
            <div class="envelope-back"></div>
            
            <!-- Red Wax Seal Sparkle Button -->
            <button id="envelope-seal" class="wax-seal border-none text-white focus:outline-none" aria-label="Open Love Letter">
                <span>💖</span>
            </button>
            
            <!-- The physical Letter (Initially hidden inside, slides out dynamically) -->
            <div id="envelope-letter" class="envelope-letter flex flex-col pointer-events-auto cursor-auto">
                <!-- Letter background lines decor -->
                <div class="absolute inset-0 bg-[radial-gradient(#ffd1dc_0.5px,transparent_0.5px)] [background-size:16px_16px] opacity-15 pointer-events-none"></div>
                
                <div class="relative z-10 w-full h-full flex flex-col justify-between font-romantic">
                    <!-- Heart corner logo -->
                    <div class="flex justify-between items-center border-b border-pink-100 pb-2 mb-4 select-none">
                        <span class="text-xs tracking-wider text-pink-400 font-sans uppercase">To: My Princess 👑</span>
                        <span class="text-lg text-pink-500 animate-pulse">❤️</span>
                    </div>

                    <!-- Inner Letter Content (Formatted handwritten text) -->
                    <div class="flex-grow overflow-y-auto pr-1 text-pink-800 text-lg md:text-xl leading-relaxed whitespace-pre-line font-medium custom-scrollbar text-left tracking-wide">
                        {!! nl2br(e($config['letter_text'])) !!}
                    </div>

                    <!-- Signature seal base -->
                    <div class="mt-6 border-t border-pink-100 pt-3 flex justify-between items-center select-none font-sans text-[10px] text-pink-400 uppercase tracking-widest">
                        <span>Forever Yours</span>
                        <span>{{ date('F d, Y') }} 🌸</span>
                    </div>
                </div>
            </div>
            
            <!-- Front folds cover -->
            <div class="envelope-front"></div>
        </div>
    </div>
</section>
