@props(['config'])

<section id="hero-section" class="relative min-h-screen flex flex-col items-center justify-center pt-28 pb-16 px-6 overflow-hidden bg-romantic-gradient">
    <!-- Ambient glowing lights -->
    <div class="absolute w-[400px] h-[400px] bg-romantic-pink/25 rounded-full blur-[140px] top-10 -left-20 pointer-events-none"></div>
    <div class="absolute w-[400px] h-[400px] bg-romantic-peach/30 rounded-full blur-[150px] bottom-10 -right-20 pointer-events-none"></div>
    <div class="absolute w-[350px] h-[350px] bg-romantic-lavender/25 rounded-full blur-[130px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

    <?php
    $hero = $config['hero'] ?? [];
    $heroTitle = ($hero['hero_title']->content ?? null) ?: 'Happy Birthday, My Princess!';
    $heroSubtitle = ($hero['hero_subtitle']->content ?? null) ?: 'My Dearest Love';
    $centerHero = $hero['hero_center'] ?? null;
    $leftHero = $hero['hero_left'] ?? null;
    $midLeftHero = $hero['hero_mid_left'] ?? null;
    $midRightHero = $hero['hero_mid_right'] ?? null;
    $rightHero = $hero['hero_right'] ?? null;
    ?>

    <!-- -------------------------------------------------------------------------- -->
    <!-- U-SHAPE CURTAIN FLOATING BACKGROUND POLAROIDS -->
    <!-- -------------------------------------------------------------------------- -->
    <!-- Card 1: Left-Most -->
    <div class="absolute top-[10%] left-[2%] sm:left-[4%] rotate-[-12deg] sm:rotate-[-15deg] z-10 hover:z-30 hover:-translate-y-4 hover:scale-[1.05] transition-all duration-300 cursor-pointer shadow-lg animate-float-slow">
        <!-- String (hidden on very small screens) -->
        <div class="absolute top-[-80px] sm:top-[-150px] left-1/2 -translate-x-1/2 w-[1.5px] h-[80px] sm:h-[150px] bg-gradient-to-b from-transparent via-pink-300/30 to-pink-500/50 pointer-events-none origin-bottom hidden sm:block"></div>
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 w-3 h-3 sm:w-4 sm:h-4 bg-amber-600/80 rounded-sm shadow-sm flex items-center justify-center font-sans text-[6px] sm:text-[8px] text-white font-extrabold rotate-[12deg] z-40 select-none">📌</div>
        <div class="polaroid-frame w-[90px] sm:w-[130px] md:w-[185px] bg-white rounded-sm p-2 sm:p-3 flex flex-col items-center">
            <div class="relative w-full aspect-square bg-romantic-pink-light rounded-sm overflow-hidden border border-romantic-pink/10 flex items-center justify-center group">
                @if($leftHero && $leftHero->image_path && file_exists(public_path($leftHero->image_path)))
                    <img src="{{ asset($leftHero->image_path) }}" alt="Our hug" class="w-full h-full object-cover">
                @else
                    <div class="absolute inset-0 bg-gradient-to-tr from-pink-300/40 to-romantic-gold/30 flex flex-col items-center justify-center p-2 sm:p-3 text-center">
                        <span class="text-lg sm:text-2xl animate-pulse">{{ $leftHero->emoji ?? '🧸' }}</span>
                        <span class="font-romantic text-[10px] sm:text-base text-pink-600/80 mt-1 hidden sm:block">{{ $leftHero->caption ?? 'Cuddles' }}</span>
                    </div>
                @endif
            </div>
            <p class="mt-1.5 sm:mt-2 font-romantic text-[10px] sm:text-base text-pink-600/90 leading-none">{{ $leftHero->caption ?? 'Hugs For You 🫂' }}</p>
        </div>
    </div>

    <!-- Card 2: Inner-Left -->
    <div class="absolute top-[32%] left-[20%] rotate-[-6deg] z-10 hidden lg:block hover:z-30 hover:-translate-y-4 hover:scale-[1.05] transition-all duration-300 cursor-pointer shadow-lg animate-float-fast">
        <div class="absolute top-[-300px] left-1/2 -translate-x-1/2 w-[1.5px] h-[300px] bg-gradient-to-b from-transparent via-pink-300/25 to-pink-500/45 pointer-events-none origin-bottom"></div>
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 w-4 h-4 bg-amber-600/80 rounded-sm shadow-sm flex items-center justify-center font-sans text-[8px] text-white font-extrabold rotate-[-8deg] z-40 select-none">📌</div>
        <div class="polaroid-frame w-[150px] md:w-[175px] bg-white rounded-sm p-3 flex flex-col items-center">
            <div class="relative w-full aspect-square bg-romantic-pink-light rounded-sm overflow-hidden border border-romantic-pink/10 flex items-center justify-center group">
                @if($midLeftHero && $midLeftHero->image_path && file_exists(public_path($midLeftHero->image_path)))
                    <img src="{{ asset($midLeftHero->image_path) }}" alt="Laugh" class="w-full h-full object-cover">
                @else
                    <div class="absolute inset-0 bg-gradient-to-tr from-romantic-peach/40 to-romantic-pink/30 flex flex-col items-center justify-center p-3 text-center">
                        <span class="text-2xl animate-pulse">{{ $midLeftHero->emoji ?? '✨' }}</span>
                        <span class="font-romantic text-base text-pink-600/80 mt-1">{{ $midLeftHero->caption ?? 'Laugh' }}</span>
                    </div>
                @endif
            </div>
            <p class="mt-2 font-romantic text-base text-pink-600/90 leading-none">{{ $midLeftHero->caption ?? 'Ketawa candu 🤪' }}</p>
        </div>
    </div>

    <!-- Card 4: Inner-Right -->
    <div class="absolute top-[32%] right-[20%] rotate-[6deg] z-10 hidden lg:block hover:z-30 hover:-translate-y-4 hover:scale-[1.05] transition-all duration-300 cursor-pointer shadow-lg animate-float-slow">
        <div class="absolute top-[-300px] left-1/2 -translate-x-1/2 w-[1.5px] h-[300px] bg-gradient-to-b from-transparent via-pink-300/25 to-pink-500/45 pointer-events-none origin-bottom"></div>
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 w-4 h-4 bg-amber-600/80 rounded-sm shadow-sm flex items-center justify-center font-sans text-[8px] text-white font-extrabold rotate-[6deg] z-40 select-none">📌</div>
        <div class="polaroid-frame w-[150px] md:w-[175px] bg-white rounded-sm p-3 flex flex-col items-center">
            <div class="relative w-full aspect-square bg-romantic-pink-light rounded-sm overflow-hidden border border-romantic-pink/10 flex items-center justify-center group">
                @if($midRightHero && $midRightHero->image_path && file_exists(public_path($midRightHero->image_path)))
                    <img src="{{ asset($midRightHero->image_path) }}" alt="Dates" class="w-full h-full object-cover">
                @else
                    <div class="absolute inset-0 bg-gradient-to-tr from-romantic-peach/40 to-romantic-gold/30 flex flex-col items-center justify-center p-3 text-center">
                        <span class="text-3xl animate-bounce">{{ $midRightHero->emoji ?? '🍕' }}</span>
                        <span class="font-romantic text-base text-pink-600/80 mt-2">{{ $midRightHero->caption ?? 'Tasty Dates' }}</span>
                    </div>
                @endif
            </div>
            <p class="mt-2 font-romantic text-base text-pink-600/90 leading-none">{{ $midRightHero->caption ?? 'Kulineran seru 🍿' }}</p>
        </div>
    </div>

    <!-- Card 5: Right-Most -->
    <div class="absolute top-[10%] right-[2%] sm:right-[4%] rotate-[12deg] sm:rotate-[15deg] z-10 hover:z-30 hover:-translate-y-4 hover:scale-[1.05] transition-all duration-300 cursor-pointer shadow-lg animate-float-fast">
        <!-- String -->
        <div class="absolute top-[-80px] sm:top-[-150px] left-1/2 -translate-x-1/2 w-[1.5px] h-[80px] sm:h-[150px] bg-gradient-to-b from-transparent via-pink-300/30 to-pink-500/50 pointer-events-none origin-bottom hidden sm:block"></div>
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 w-3 h-3 sm:w-4 sm:h-4 bg-amber-600/80 rounded-sm shadow-sm flex items-center justify-center font-sans text-[6px] sm:text-[8px] text-white font-extrabold rotate-[-12deg] z-40 select-none">📌</div>
        <div class="polaroid-frame w-[90px] sm:w-[130px] md:w-[185px] bg-white rounded-sm p-2 sm:p-3 flex flex-col items-center">
            <div class="relative w-full aspect-square bg-romantic-pink-light rounded-sm overflow-hidden border border-romantic-pink/10 flex items-center justify-center group">
                @if($rightHero && $rightHero->image_path && file_exists(public_path($rightHero->image_path)))
                    <img src="{{ asset($rightHero->image_path) }}" alt="BeautifulSunset" class="w-full h-full object-cover">
                @else
                    <div class="absolute inset-0 bg-gradient-to-tr from-lavender-200/40 to-romantic-pink/30 flex flex-col items-center justify-center p-2 sm:p-3 text-center">
                        <span class="text-lg sm:text-2xl animate-pulse">{{ $rightHero->emoji ?? '🌅' }}</span>
                        <span class="font-romantic text-[10px] sm:text-base text-pink-600/80 mt-1 hidden sm:block">{{ $rightHero->caption ?? 'My Sunset' }}</span>
                    </div>
                @endif
            </div>
            <p class="mt-1.5 sm:mt-2 font-romantic text-[10px] sm:text-base text-pink-600/90 leading-none">{{ $rightHero->caption ?? 'Senja terindah 🌸' }}</p>
        </div>
    </div>

    <!-- -------------------------------------------------------------------------- -->
    <!-- MAIN HERO CONTENTS -->
    <!-- -------------------------------------------------------------------------- -->
    <div class="relative z-20 flex flex-col items-center justify-center max-w-4xl text-center">
        <!-- Main Anchored Polaroid Above Title -->
        <div id="hero-center-polaroid" class="mb-10 transform hover:scale-[1.04] transition-transform duration-500 cursor-pointer origin-top pointer-events-auto shadow-2xl relative animate-float-slow">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-16 h-6 bg-white/70 backdrop-blur-sm border border-dashed border-romantic-pink-dark/40 rotate-[-3deg] z-30 shadow-sm flex items-center justify-center font-sans text-[9px] uppercase tracking-widest text-romantic-pink-dark">My Queen</div>
            <div class="polaroid-frame w-[220px] sm:w-[250px] md:w-[275px] bg-white rounded-sm p-4 flex flex-col items-center relative">
                <!-- Crown easter egg trigger - positioned on the white frame top-right -->
                <div id="hero-crown-trigger" class="absolute -top-3 -right-3 z-40 cursor-pointer hover:scale-125 active:scale-90 transition-transform duration-200" title="Tap for secret!">
                    <span class="text-3xl select-none drop-shadow-md" style="text-shadow: 0 0 10px rgba(255,215,0,0.7);">👑</span>
                </div>
                <div class="relative w-full aspect-square bg-romantic-pink-light rounded-sm overflow-hidden border border-romantic-pink/10 flex items-center justify-center group">
                    @if($centerHero && $centerHero->image_path && file_exists(public_path($centerHero->image_path)))
                        <img src="{{ asset($centerHero->image_path) }}" alt="Main Polaroid" class="w-full h-full object-cover">
                    @else
                        <div class="absolute inset-0 bg-gradient-to-tr from-romantic-pink-dark/30 via-romantic-peach/20 to-romantic-lavender/30 flex flex-col items-center justify-center p-6 text-center">
                            <span class="text-5xl select-none">{{ $centerHero->emoji ?? '👑' }}</span>
                            <h4 class="mt-3 font-romantic text-xl text-pink-600">{{ $centerHero->caption ?? 'The Birthday Girl' }}</h4>
                        </div>
                    @endif
                </div>
                <p class="mt-4 font-romantic text-xl md:text-2xl text-pink-600/90 font-bold leading-none">{{ $config['partner_name'] }} 💖</p>
            </div>
        </div>

        <!-- Headline text -->
        <div class="min-h-[120px] md:min-h-[140px] flex flex-col items-center select-none pointer-events-none">
            <span class="font-sans text-xs md:text-sm font-bold tracking-[0.3em] uppercase text-pink-500/80 mb-2">{{ $heroSubtitle }}</span>
            <h2 id="hero-title" class="font-romantic text-5xl md:text-7xl bg-gradient-to-r from-pink-600 via-rose-500 to-amber-500 bg-clip-text text-transparent filter drop-shadow-sm leading-tight h-16 md:h-24">
                {{ $heroTitle }}
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
