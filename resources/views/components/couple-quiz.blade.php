@props(['config'])

<section id="quiz-section" class="relative py-24 px-6 bg-romantic-pink-light overflow-hidden flex flex-col items-center justify-center">
    <!-- Glowing background blur -->
    <div class="absolute w-[350px] h-[350px] bg-pink-300/20 rounded-full blur-[130px] top-1/4 right-1/4 pointer-events-none"></div>

    <div class="relative z-10 text-center mb-12 max-w-lg mx-auto select-none">
        <span class="font-sans text-xs font-bold tracking-[0.25em] text-pink-500/80 uppercase">Couple Chemistry Game</span>
        <h2 class="font-romantic text-4xl md:text-5xl text-pink-600 mt-2 filter drop-shadow-sm">
            How Well Do You Know Us? 🧸💞
        </h2>
        <p class="mt-3 font-cute text-sm text-pink-700/50">
            Jawab 3 pertanyaan cinta di bawah ini dengan benar untuk membuka kunci kejutan jadian & hadiah utamamu!
        </p>
    </div>

    <!-- The Quiz Card Container -->
    <div id="quiz-card-wrapper" class="relative z-10 max-w-md w-full min-h-[420px] glassmorphism rounded-3xl border border-white/50 shadow-2xl p-6 md:p-8 flex flex-col justify-between overflow-hidden pointer-events-auto select-none">
        <!-- HUD Header -->
        <div class="flex justify-between items-center border-b border-pink-100 pb-3 mb-4 font-cute">
            <span class="text-xs font-bold text-pink-600 uppercase tracking-wider">Princess Game</span>
            <span class="text-xs font-bold text-pink-700">Question <span id="quiz-current-num">1</span> of 3</span>
        </div>

        <!-- Question Viewport -->
        <div class="relative flex-grow flex items-center justify-center min-h-[220px]">
            @foreach($config['quiz'] as $qIndex => $quiz)
                <div class="quiz-question-card absolute inset-0 flex flex-col justify-between transition-all duration-500 transform {{ $qIndex == 0 ? 'translate-x-0 opacity-100' : 'translate-x-full opacity-0 pointer-events-none' }}" 
                     data-index="{{ $qIndex }}"
                     data-correct="{{ $quiz['correct'] }}">
                     
                    <!-- Question Title -->
                    <h3 class="font-cute text-base md:text-lg font-extrabold text-pink-950/90 text-center leading-relaxed">
                        {{ $quiz['question'] }}
                    </h3>

                    <!-- Multiple Choices Grid -->
                    <div class="space-y-3 mt-6">
                        @foreach($quiz['choices'] as $cIndex => $choice)
                            <button class="quiz-choice-btn w-full px-5 py-3 text-left font-sans text-xs md:text-sm bg-white/60 hover:bg-white border border-pink-100 hover:border-pink-300 rounded-2xl shadow-sm hover:shadow transition-all duration-200 focus:outline-none flex items-center gap-3 cursor-pointer text-pink-950/80 active:scale-[0.98]"
                                    data-choice-index="{{ $cIndex }}">
                                <div class="w-6 h-6 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-[10px] uppercase select-none shadow-inner shrink-0">
                                    {{ chr(65 + $cIndex) }}
                                </div>
                                <span class="leading-snug">{{ $choice }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
            
            <!-- Quiz Victory Screen overlay inside viewport -->
            <div id="quiz-victory-screen" class="absolute inset-0 flex flex-col items-center justify-center text-center opacity-0 pointer-events-none transform translate-y-20 transition-all duration-700">
                <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center text-4xl shadow-md animate-bounce mb-4">
                    🎉
                </div>
                <h4 class="font-romantic text-3xl text-rose-600 leading-none">Perfect Chemistry!</h4>
                <p class="mt-3 font-cute text-sm text-pink-700/80 max-w-xs leading-relaxed">
                    Kamu hebat banget sayang! Semua jawaban bener 100%! Sekarang kunci kejutan utamamu resmi terbuka! ❤️
                </p>
                <div class="mt-6 flex flex-col items-center gap-1">
                    <span class="font-sans text-[10px] text-pink-500 font-bold uppercase tracking-[0.2em] animate-pulse">Scroll down to see the timer!</span>
                    <div class="w-5 h-8 border border-pink-400 rounded-full flex justify-center p-1 shadow-sm mt-1">
                        <div class="w-1 h-1.5 bg-pink-500 rounded-full animate-bounce"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Funny remark Alert bubble overlay (reveals on incorrect answer) -->
        <div id="quiz-remark-bubble" class="absolute inset-x-6 bottom-6 z-30 transform translate-y-[150%] opacity-0 bg-rose-50 border border-rose-200 p-3.5 rounded-2xl shadow-lg flex items-start gap-2.5 transition-all duration-300 pointer-events-none">
            <span class="text-xl select-none shrink-0">😅</span>
            <div>
                <p class="font-sans text-[10px] font-bold text-rose-600 uppercase tracking-widest leading-none">Wrong Answer!</p>
                <p id="quiz-remark-text" class="font-cute text-xs text-rose-950 mt-1 leading-normal"></p>
            </div>
        </div>
    </div>
</section>
