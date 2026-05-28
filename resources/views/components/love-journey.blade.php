@props(['config'])

<section id="timeline-section" class="relative py-24 px-6 bg-romantic-cream-light overflow-hidden">
    <!-- Ambient glowing backgrounds -->
    <div class="absolute w-[350px] h-[350px] bg-romantic-pink/15 rounded-full blur-[120px] top-1/3 left-10 pointer-events-none"></div>
    <div class="absolute w-[350px] h-[350px] bg-romantic-gold/15 rounded-full blur-[120px] bottom-1/3 right-10 pointer-events-none"></div>

    <div class="relative z-10 text-center mb-16 max-w-lg mx-auto select-none">
        <span class="font-sans text-xs font-bold tracking-[0.25em] text-pink-500/80 uppercase">Our Story Timeline</span>
        <h2 class="font-romantic text-4xl md:text-5xl text-pink-600 mt-2 filter drop-shadow-sm">
            Love Journey 🗺️🕰️
        </h2>
        <p class="mt-3 font-cute text-sm text-pink-700/50">
            Catatan kecil tentang langkah-langkah indah yang sudah kita lalui bersama dari pertama kali kenal hingga hari ini!
        </p>
    </div>

    <!-- Vertical Timeline container -->
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Central vertical line indicator -->
        <div class="absolute left-6 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-romantic-pink-dark via-pink-300 to-romantic-gold-dark/40 -translate-x-1/2 pointer-events-none"></div>

        <!-- Timeline Events -->
        <div class="space-y-16">
            @foreach($config['timeline'] as $index => $event)
                <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between {{ $index % 2 == 0 ? 'md:flex-row-reverse' : '' }} group pointer-events-auto">
                    <!-- Central glowing timeline node dot -->
                    <div class="absolute left-6 md:left-1/2 w-8 h-8 rounded-full bg-white border-4 border-pink-400 shadow-md -translate-x-1/2 flex items-center justify-center text-sm z-20 group-hover:scale-125 group-hover:border-pink-500 transition-all duration-300 select-none animate-float-slow" style="animation-delay: {{ $index * 0.4 }}s">
                        {{ $event['emoji'] }}
                    </div>

                    <!-- Layout spacing filler (for desktop fanning layout) -->
                    <div class="hidden md:block w-[45%]"></div>

                    <!-- Interactive Event Content Card -->
                    <div class="w-[90%] md:w-[45%] ml-12 md:ml-0 glassmorphism p-6 rounded-3xl border border-white/50 shadow-md hover:shadow-[0_15px_35px_rgba(255,183,197,0.3)] hover:-translate-y-1.5 transition-all duration-300 transform select-none">
                        <!-- Date tag header -->
                        <span class="inline-block px-3 py-1 rounded-full bg-pink-100 text-[10px] md:text-xs font-bold text-pink-600 uppercase tracking-widest mb-3">
                            {{ $event['date'] }}
                        </span>

                        <!-- Event Title -->
                        <h3 class="font-cute text-lg font-extrabold text-pink-950/90 leading-tight">
                            {{ $event['title'] }}
                        </h3>

                        <!-- Event Description -->
                        <p class="mt-2.5 font-sans text-xs md:text-sm text-pink-900/70 leading-relaxed">
                            {{ $event['description'] }}
                        </p>
                        
                        <!-- Handwritten love remark -->
                        <div class="mt-4 border-t border-pink-100 pt-3 flex justify-between items-center text-[10px] text-pink-400 font-bold uppercase tracking-widest font-romantic">
                            <span class="font-romantic text-sm text-pink-500 tracking-wider">Memory Logged ✍️</span>
                            <span>🔒 Unlocked</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
