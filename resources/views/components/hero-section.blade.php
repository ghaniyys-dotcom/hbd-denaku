@props(['config'])

<section id="hero-section" class="relative min-h-screen flex flex-col items-center justify-center pt-28 pb-16 px-6 overflow-hidden bg-romantic-gradient">
    <!-- Ambient glowing lights -->
    <div class="absolute w-[400px] h-[400px] bg-romantic-pink/25 rounded-full blur-[140px] top-10 -left-20 pointer-events-none"></div>
    <div class="absolute w-[400px] h-[400px] bg-romantic-peach/30 rounded-full blur-[150px] bottom-10 -right-20 pointer-events-none"></div>
    <div class="absolute w-[350px] h-[350px] bg-romantic-lavender/25 rounded-full blur-[130px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

    <!-- --------------------------------------------------------------------------
         U-SHAPE CURTAIN FLOATING BACKGROUND POLAROIDS (No overlapping!)
         -------------------------------------------------------------------------- -->
    <!-- Card 1: Left-Most (Teddy/Hug) - High Up -->
    <div class="absolute top-[10%] left-[4%] rotate-[-15deg] z-10 hidden md:block hover:z-30 hover:-translate-y-4 hover:scale-[1.05] transition-all duration-300 cursor-pointer shadow-lg animate-float-slow">
        <!-- Hanging string and peg pin -->
        <div class="absolute top-[-150px] left-1/2 -translate-x-1/2 w-[1.5px] h-[150px] bg-gradient-to-b from-transparent via-pink-300/30 to-pink-500/50 pointer-events-none origin-bottom"></div>
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 w-4 h-4 bg-amber-600/80 rounded-sm shadow-sm flex items-center justify-center font-sans text-[8px] text-white font-extrabold rotate-[12deg] z-40 select-none">📌</div>

        <div class="polaroid-frame w-[160px] md:w-[185px] bg-white rounded-sm p-3 flex flex-col items-center">
            <div class="relative w-full aspect-square bg-romantic-pink-light rounded-sm overflow-hidden border border-romantic-pink/10 flex items-center justify-center group">
                <img id="hero-img-left" src="{{ asset('images/hero-left.jpg') }}" alt="Our hug" class="w-full h-full object-cover hidden" decoding="async" onerror="this.classList.add('hidden'); document.getElementById('hero-left-fallback').classList.remove('hidden')">
                <div id="hero-left-fallback" class="absolute inset-0 bg-gradient-to-tr from-pink-300/40 to-romantic-gold/30 flex flex-col items-center justify-center p-3 text-center">
                    <span class="text-2xl animate-pulse">🧸</span>
                    <span class="font-romantic text-base text-pink-600/80 mt-1">Cuddles</span>
                </div>
            </div>
            <p class="mt-2 font-romantic text-base text-pink-600/90 leading-none">Hugs For You 🫂</p>
        </div>
    </div>

    <!-- Card 2: Inner-Left (Laugh/Random) - Lower Down -->
    <div class="absolute top-[32%] left-[20%] rotate-[-6deg] z-10 hidden lg:block hover:z-30 hover:-translate-y-4 hover:scale-[1.05] transition-all duration-300 cursor-pointer shadow-lg animate-float-fast">
        <!-- Hanging string and peg pin -->
        <div class="absolute top-[-300px] left-1/2 -translate-x-1/2 w-[1.5px] h-[300px] bg-gradient-to-b from-transparent via-pink-300/25 to-pink-500/45 pointer-events-none origin-bottom"></div>
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 w-4 h-4 bg-amber-600/80 rounded-sm shadow-sm flex items-center justify-center font-sans text-[8px] text-white font-extrabold rotate-[-8deg] z-40 select-none">📌</div>

        <div class="polaroid-frame w-[150px] md:w-[175px] bg-white rounded-sm p-3 flex flex-col items-center">
            <div class="relative w-full aspect-square bg-romantic-pink-light rounded-sm overflow-hidden border border-romantic-pink/10 flex items-center justify-center group">
                <img id="hero-img-mid-left" src="{{ asset('images/hero-photo2.jpg') }}" alt="Laugh" class="w-full h-full object-cover hidden" decoding="async" onerror="this.classList.add('hidden'); document.getElementById('hero-mid-left-fallback').classList.remove('hidden')">
                <div id="hero-mid-left-fallback" class="absolute inset-0 bg-gradient-to-tr from-romantic-peach/40 to-romantic-pink/30 flex flex-col items-center justify-center p-3 text-center">
                    <span class="text-2xl animate-pulse">✨</span>
                    <span class="font-romantic text-base text-pink-600/80 mt-1">Laugh</span>
                </div>
            </div>
            <p class="mt-2 font-romantic text-base text-pink-600/90 leading-none">Ketawa candu 🤪</p>
        </div>
    </div>

    <!-- Card 4: Inner-Right (Dates/Vibe) - Lower Down -->
    <div class="absolute top-[32%] right-[20%] rotate-[6deg] z-10 hidden lg:block hover:z-30 hover:-translate-y-4 hover:scale-[1.05] transition-all duration-300 cursor-pointer shadow-lg animate-float-slow">
        <!-- Hanging string and peg pin -->
        <div class="absolute top-[-300px] left-1/2 -translate-x-1/2 w-[1.5px] h-[300px] bg-gradient-to-b from-transparent via-pink-300/25 to-pink-500/45 pointer-events-none origin-bottom"></div>
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 w-4 h-4 bg-amber-600/80 rounded-sm shadow-sm flex items-center justify-center font-sans text-[8px] text-white font-extrabold rotate-[6deg] z-40 select-none">📌</div>

        <div class="polaroid-frame w-[150px] md:w-[175px] bg-white rounded-sm p-3 flex flex-col items-center">
            <div class="relative w-full aspect-square bg-romantic-pink-light rounded-sm overflow-hidden border border-romantic-pink/10 flex items-center justify-center group">
                <div class="absolute inset-0 bg-gradient-to-tr from-romantic-peach/40 to-romantic-gold/30 flex flex-col items-center justify-center p-3 text-center">
                    <span class="text-3xl animate-bounce">🍕</span>
                    <span class="font-romantic text-base text-pink-600/80 mt-2">Tasty Dates</span>
                </div>
            </div>
            <p class="mt-2 font-romantic text-base text-pink-600/90 leading-none">Kulineran seru 🍿</p>
        </div>
    </div>

    <!-- Card 5: Right-Most (Sunset/Light) - High Up -->
    <div class="absolute top-[10%] right-[4%] rotate-[15deg] z-10 hidden md:block hover:z-30 hover:-translate-y-4 hover:scale-[1.05] transition-all duration-300 cursor-pointer shadow-lg animate-float-fast">
        <!-- Hanging string and peg pin -->
        <div class="absolute top-[-150px] left-1/2 -translate-x-1/2 w-[1.5px] h-[150px] bg-gradient-to-b from-transparent via-pink-300/30 to-pink-500/50 pointer-events-none origin-bottom"></div>
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 w-4 h-4 bg-amber-600/80 rounded-sm shadow-sm flex items-center justify-center font-sans text-[8px] text-white font-extrabold rotate-[-12deg] z-40 select-none">📌</div>

        <div class="polaroid-frame w-[160px] md:w-[185px] bg-white rounded-sm p-3 flex flex-col items-center">
            <div class="relative w-full aspect-square bg-romantic-pink-light rounded-sm overflow-hidden border border-romantic-pink/10 flex items-center justify-center group">
                <img id="hero-img-right" src="{{ asset('images/hero-right.jpg') }}" alt="BeautifulSunset" class="w-full h-full object-cover hidden" decoding="async" onerror="this.classList.add('hidden'); document.getElementById('hero-right-fallback').classList.remove('hidden')">
                <div id="hero-right-fallback" class="absolute inset-0 bg-gradient-to-tr from-lavender-200/40 to-romantic-pink/30 flex flex-col items-center justify-center p-3 text-center">
                    <span class="text-2xl animate-pulse">🌅</span>
                    <span class="font-romantic text-base text-pink-600/80 mt-1">My Sunset</span>
                </div>
            </div>
            <p class="mt-2 font-romantic text-base text-pink-600/90 leading-none">Senja terindah 🌸</p>
        </div>
    </div>

    <!-- --------------------------------------------------------------------------
         MAIN HERO CONTENTS (Contains Center-Main Polaroid as apex)
         -------------------------------------------------------------------------- -->
    <div class="relative z-20 flex flex-col items-center justify-center max-w-4xl text-center">
        <!-- Main Anchored Polaroid Above Title (Center apex of U-shape) -->
        <div id="hero-center-polaroid" class="mb-10 transform hover:scale-[1.04] transition-transform duration-500 cursor-pointer origin-top pointer-events-auto shadow-2xl relative animate-float-slow">
            <!-- simulated tape -->
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-16 h-6 bg-white/70 backdrop-blur-sm border border-dashed border-romantic-pink-dark/40 rotate-[-3deg] z-30 shadow-sm flex items-center justify-center font-sans text-[9px] uppercase tracking-widest text-romantic-pink-dark">My Queen</div>
            
            <div class="polaroid-frame w-[220px] sm:w-[250px] md:w-[275px] bg-white rounded-sm p-4 flex flex-col items-center">
                <div class="relative w-full aspect-square bg-romantic-pink-light rounded-sm overflow-hidden border border-romantic-pink/10 flex items-center justify-center group">
                    <img id="hero-img" src="{{ asset('images/hero-photo.jpg') }}" alt="Main Polaroid" class="w-full h-full object-cover hidden" decoding="async" onerror="this.classList.add('hidden'); document.getElementById('hero-img-fallback').classList.remove('hidden')">
                    
                    <div id="hero-img-fallback" class="absolute inset-0 bg-gradient-to-tr from-romantic-pink-dark/30 via-romantic-peach/20 to-romantic-lavender/30 flex flex-col items-center justify-center p-6 text-center">
                        <div id="hero-crown-trigger" class="w-16 h-16 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md animate-pulse cursor-pointer hover:scale-110 active:scale-95 transition-transform z-40">
                            <span class="text-3xl select-none">👑</span>
                        </div>
                        <h4 class="mt-3 font-romantic text-xl text-pink-600">The Birthday Girl</h4>
                    </div>
                </div>
                <p class="mt-4 font-romantic text-xl md:text-2xl text-pink-600/90 font-bold leading-none">{{ $config['partner_name'] }} 💖</p>
            </div>
        </div>

        <!-- Headline text -->
        <div class="min-h-[120px] md:min-h-[140px] flex flex-col items-center select-none pointer-events-none">
            <span class="font-sans text-xs md:text-sm font-bold tracking-[0.3em] uppercase text-pink-500/80 mb-2">My Dearest Love</span>
            
            <h2 id="hero-title" class="font-romantic text-5xl md:text-7xl bg-gradient-to-r from-pink-600 via-rose-500 to-amber-500 bg-clip-text text-transparent filter drop-shadow-sm leading-tight h-16 md:h-24">
                Happy Birthday, My Princess!
            </h2>
            
            <p id="hero-typewriter" class="mt-4 font-cute text-sm md:text-base text-pink-700/60 max-w-lg leading-relaxed h-12"></p>
        </div>

        <!-- Scroll down indicator -->
        <div id="hero-scroll-indicator" class="mt-12 md:mt-16 flex flex-col items-center opacity-0 transform translate-y-4">
            <span class="font-sans text-[10px] md:text-xs font-semibold tracking-[0.25em] text-pink-500/60 uppercase animate-pulse mb-3">Scroll to see my surprise</span>
            <div class="w-6 h-10 border-2 border-pink-400/40 rounded-full flex justify-center p-1.5 shadow-sm">
                <div class="w-1.5 h-2 bg-pink-500 rounded-full animate-bounce"></div>
            </div>
        </div>
    </div>

    <!-- Soft wave decorative divider bottom -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-20 pointer-events-none">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] fill-romantic-cream-light">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"></path>
        </svg>
    </div>
</section>
