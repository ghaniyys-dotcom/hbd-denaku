@props(['config'])

<section id="gift-section" class="relative py-24 px-6 bg-romantic-cream-light overflow-hidden flex flex-col items-center justify-center">
    <!-- Ambient glowing orbs -->
    <div class="absolute w-[400px] h-[400px] bg-romantic-gold/20 rounded-full blur-[140px] bottom-10 left-10 pointer-events-none"></div>

    <div class="relative z-10 text-center mb-16 max-w-lg mx-auto select-none">
        <span class="font-sans text-xs font-bold tracking-[0.25em] text-pink-500/80 uppercase">A Surprise For You</span>
        <h2 class="font-romantic text-4xl md:text-5xl text-pink-600 mt-2 filter drop-shadow-sm">
            Unwrap Your Gift 🎁✨
        </h2>
        <p class="mt-3 font-cute text-sm text-pink-700/50">
            Terakhir, aku punya kado spesial khusus buat kamu. Klik kado di bawah ini untuk membuka pitanya!
        </p>
    </div>

    <!-- The 3D Gift Box Interactive Widget -->
    <div class="relative z-10 w-full max-w-md h-[480px] flex items-center justify-center pointer-events-auto select-none">
        <!-- The Unfolded Voucher Card (Initially hidden deep inside, rises up dynamically) -->
        <div id="gift-voucher-card" class="absolute w-[320px] sm:w-[350px] bg-gradient-to-tr from-amber-50 via-white to-orange-50 border-[3px] border-amber-300 shadow-2xl p-6 rounded-3xl flex flex-col justify-between items-center text-center opacity-0 pointer-events-none transform scale-90 translate-y-12 transition-all duration-700 z-10 select-text">
            <!-- Sparkle top badge -->
            <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-lg shadow-sm border border-amber-200 animate-pulse select-none">
                👑
            </div>

            <div class="mt-3 select-none">
                <span class="font-sans text-[8px] font-extrabold uppercase text-amber-600 tracking-[0.3em]">Official Gift Pass</span>
                <h3 class="font-cute text-base md:text-lg font-black text-amber-950 mt-1 leading-tight uppercase tracking-wider">
                    {{ $config['gift']['title'] }}
                </h3>
                <p class="font-sans text-[9px] font-bold text-amber-700/70 tracking-wide mt-1 italic leading-none">
                    {{ $config['gift']['subtitle'] }}
                </p>
            </div>

            <!-- Divider dotted line -->
            <div class="w-full border-t-2 border-dashed border-amber-200 my-4 select-none"></div>

            <!-- Description -->
            <p class="font-sans text-xs md:text-sm text-amber-900/80 leading-relaxed text-left whitespace-pre-line px-1">
                {!! nl2br(e($config['gift']['description'])) !!}
            </p>

            <!-- Coupon Code box -->
            <div class="w-full mt-5 bg-amber-100/40 border border-amber-200/50 rounded-2xl p-3 flex flex-col items-center justify-center shadow-inner">
                <span class="font-sans text-[8px] font-bold uppercase text-amber-600 tracking-wider">Coupon Code</span>
                <span class="font-cute text-sm font-black text-amber-800 tracking-widest uppercase mt-0.5 select-all">{{ $config['gift']['coupon_code'] }}</span>
            </div>
            
            <p class="mt-3 font-romantic text-xs text-amber-600 font-bold select-none">Claim this to me anytime! ❤️</p>
        </div>

        <!-- The physical Gift Box Container wrapper (GSAP will scale/fold this) -->
        <div id="gift-box-wrapper" class="relative w-[180px] h-[180px] cursor-pointer transition-transform duration-300 z-20 hover:scale-[1.03] active:scale-95">
            <!-- Box Lid -->
            <div id="gift-box-lid" class="absolute -top-3 -inset-x-2.5 h-10 bg-gradient-to-r from-pink-500 to-rose-400 border border-pink-400/40 rounded-md shadow-md z-30 transition-transform duration-500 origin-bottom flex items-center justify-center">
                <!-- Ribbon crossing horizontally on lid -->
                <div class="absolute inset-y-0 w-8 bg-gradient-to-b from-[#ffd1dc] to-[#ffb7c5] shadow-sm z-10"></div>
            </div>

            <!-- Box Body wrapper -->
            <div id="gift-box-body" class="absolute inset-0 bg-gradient-to-r from-pink-400 to-rose-400 border border-pink-300/30 rounded-md shadow-xl z-20 flex overflow-hidden">
                <!-- Vertical Ribbon crossing on front of box -->
                <div class="absolute inset-y-0 left-1/2 -translate-x-1/2 w-8 bg-gradient-to-b from-[#ffd1dc] to-[#ffb7c5] shadow-inner z-10"></div>
                <!-- Horizontal Ribbon crossing on front of box -->
                <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 h-8 bg-gradient-to-r from-[#ffd1dc] to-[#ffb7c5] shadow-inner z-10"></div>
            </div>

            <!-- Big fluffy floating ribbon bow on top -->
            <div id="gift-box-bow" class="absolute -top-11 left-1/2 -translate-x-1/2 w-16 h-10 z-40 flex items-center justify-center animate-bounce">
                <!-- Left loop of bow -->
                <div class="absolute left-1 w-7 h-7 bg-gradient-to-br from-[#ffd1dc] to-[#ffb7c5] border border-pink-100 rounded-full rotate-[-30deg] shadow-sm"></div>
                <!-- Right loop of bow -->
                <div class="absolute right-1 w-7 h-7 bg-gradient-to-bl from-[#ffd1dc] to-[#ffb7c5] border border-pink-100 rounded-full rotate-[30deg] shadow-sm"></div>
                <!-- Center knot -->
                <div class="relative w-4 h-4 bg-gradient-to-tr from-pink-300 to-pink-400 border border-white/30 rounded-md z-10 shadow-sm"></div>
            </div>
        </div>
    </div>
</section>
