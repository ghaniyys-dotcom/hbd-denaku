<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Romantic Birthday Surprise Configuration
    |--------------------------------------------------------------------------
    |
    | All configuration variables for customizing the romantic surprise
    | website are loaded here. You can modify these values to personalize
    | the website.
    |
    */

    'partner_name' => 'Denaku',
    
    // Anniversary and Birth Date (Tuesday, 17 October 2023 at 01:58 malam/dini hari)
    'anniversary_date' => '2023-10-17T01:58:00', // Date and time you started dating
    'birth_date' => '2005-06-01',       // YYYY-MM-DD - Partner's birthday
    
    // Background Music URL (A soft, dreamy romantic acoustic/piano track)
    'music_url' => '/audio/romantic.mp3', // Locally hosted to bypass browser CORS checks
    
    // The Love Letter text (will render with beautiful handwriting animation)
    'letter_text' => "Hai Cantik, Selamat Ulang Tahun... ✨\n\nSelamat bertambah usia untuk orang yang paling aku sayang, yang kehadirannya selalu bikin duniaku terasa jauh lebih indah dan penuh warna.\n\nAku bersyukur banget bisa kenal kamu, bisa nemenin kamu, dan bisa ada di setiap langkah perjalanan hidup kamu. Makasih ya sudah menjadi cewek yang luar biasa, sabar ngadepin aku, selalu support aku, dan selalu ngasih pelukan terhangat lewat ketawa manis kamu.\n\nDi hari spesialmu ini, aku cuma mau bilang kalau aku beruntung banget punya kamu. Aku berharap semua mimpi indahmu terwujud, senyum di wajah cantikmu nggak pernah pudar, dan bahagia selalu menyertai setiap harimu.\n\nAku sayang kamu hari ini, besok, lusa, dan selamanya. Happy Birthday, My Dearest! 💕\n\nSealed with infinite love, \nCowokmu yang paling beruntung 🎀",
    
    // Reasons why she is loved
    'reasons' => [
        [
            'title' => 'Ketawa Kamu Candu',
            'emoji' => '✨',
            'description' => 'Ketawa kamu itu melodi terindah. Tiap denger kamu ketawa lebar, semua capek dan stresku langsung ilang gitu aja!',
            'color' => 'from-[#FFE4E1] to-[#FFC0CB]', // Sweet pink
        ],
        [
            'title' => 'Kalau Ngambek Gemesin',
            'emoji' => '😡❤️',
            'description' => 'Bukannya serem, kalau kamu lagi ngambek atau cemberut malah pengen aku cubit pipinya karena lucu banget!',
            'color' => 'from-[#FFE5D9] to-[#FFCAD4]', // Soft peach/pink
        ],
        [
            'title' => 'Pendengar Terbaik',
            'emoji' => '🧸',
            'description' => 'Makasih ya selalu ada buat dengerin cerita random aku, keluh kesahku, dan selalu ngasih sudut pandang yang menenangkan.',
            'color' => 'from-[#F0E6FF] to-[#E6E6FA]', // Soft lavender
        ],
        [
            'title' => 'Senyummu Bikin Tenang',
            'emoji' => '🌸',
            'description' => 'Setiap duniaku lagi berisik, cukup liat foto senyuman kamu aja langsung bisa bikin hatiku adem dan damai kembali.',
            'color' => 'from-[#FFF0F5] to-[#FFD1DC]', // Lavender blush
        ],
        [
            'title' => 'Perhatian Kecil Kamu',
            'emoji' => '💌',
            'description' => 'Hal-hal kecil yang kamu lakuin buat aku, nanya kabar, ngingetin makan, itu berharga banget dan bikin aku ngerasa dicintai.',
            'color' => 'from-[#FFEEDD] to-[#FFD8BE]', // Apricot glow
        ],
        [
            'title' => 'Selalu Bikin Nyaman',
            'emoji' => '🏡',
            'description' => 'Di dekat kamu rasanya seperti pulang ke rumah yang paling hangat. Kamu tempat ternyamanku untuk berbagi segalanya.',
            'color' => 'from-[#E8F0FE] to-[#D2E3FC]', // Cozy blueish/creamy
        ],
    ],
    
    // Scrapbook Memory Gallery items
    'gallery' => [
        [
            'image' => 'images/gallery-1.jpg',
            'caption' => 'First date kita, kamu cantik banget pakai baju itu! 📸',
            'rotation' => '-5deg',
        ],
        [
            'image' => 'images/gallery-2.jpg',
            'caption' => 'Momen random kita yang bikin ketawa seharian 🤪',
            'rotation' => '3deg',
        ],
        [
            'image' => 'images/gallery-3.jpg',
            'caption' => 'Wajah ngantuk kamu tapi tetep gemesin maksimal 😴❤️',
            'rotation' => '-3deg',
        ],
        [
            'image' => 'images/gallery-4.jpg',
            'caption' => 'Waktu kita kulineran bareng sampai kenyang banget 🍕',
            'rotation' => '4deg',
        ],
        [
            'image' => 'images/gallery-5.jpg',
            'caption' => 'Senyum terindah yang selalu jadi favorit duniaku ✨',
            'rotation' => '-4deg',
        ],
        [
            'image' => 'images/gallery-6.jpg',
            'caption' => 'Menghabiskan senja bareng kamu adalah favoritku 🌅',
            'rotation' => '6deg',
        ],
    ],
    
    // Love Journey Timeline Milestones
    'timeline' => [
        [
            'date' => 'Desember 12, 2023',
            'title' => 'Pertama Kali Kenal ✨',
            'emoji' => '💬',
            'description' => 'Awal mula cerita kita! Momen chat random pertama kali lewat DM, awalnya kamu malu-malu kucing tapi ternyata asik dan nyambung banget.',
        ],
        [
            'date' => 'Januari 15, 2024',
            'title' => 'First Date Kita 🌸',
            'emoji' => '☕',
            'description' => 'Pertemuan pertama kita yang super mendebarkan! Aku beneran grogi banget sampai salah tingkah pas liat kamu aslinya ternyata jauh lebih cantik dari foto.',
        ],
        [
            'date' => 'April 18, 2024',
            'title' => 'Hari Jadian Kita! 💍❤️',
            'emoji' => '💖',
            'description' => 'Hari terindah di mana kamu resmi menerima aku jadi cowokmu. Duniaku resmi jadi lengkap dan penuh warna sejak detik itu.',
        ],
        [
            'date' => 'Maret 10, 2025',
            'title' => 'First Trip Bersama 🌅',
            'emoji' => '✈️',
            'description' => 'Petualangan seru pertama kita berdua. Capek di jalan langsung ilang karena diisi dengan ketawa, nyanyi bareng, dan es krim favoritmu.',
        ],
    ],

    // Romantic Quiz Questions
    'quiz' => [
        [
            'question' => 'Di mana tempat pertama kali kita nge-date bareng?',
            'choices' => [
                'Coffee Shop Estetik nan Tenang ☕',
                'Taman Kota yang Rindang 🌳',
                'Nonton Bioskop Rame-Rame 🎬',
                'Makan Bakso Pinggir Jalan 🍜'
            ],
            'correct' => 0,
            'wrong_remark' => 'Aduh sayang, masa lupa sih? Nanti kita nge-date ulang di sana biar kamu inget terus ya! 😜'
        ],
        [
            'question' => 'Siapa yang kalau lagi ngambek atau cemberut paling gemesin di seluruh galaksi?',
            'choices' => [
                'Aku sendiri lah (Cowokmu) 👦',
                'Kamu (Denaku) sang Tuan Putri! 👑💖',
                'Nggak ada yang gemesin, serem semua! 🙅'
            ],
            'correct' => 1,
            'wrong_remark' => 'Hayo ngaku! Pipimu itu lho kalau lagi cemberut pengen aku cubit gemes karena lucu banget! 😡❤️'
        ],
        [
            'question' => 'Apa hal yang paling aku sukai dan cintai dari diri kamu?',
            'choices' => [
                'Senyum manis kamu yang ademin hati 🌸',
                'Ketawa lebar kamu yang bikin stres ilang ✨',
                'Perhatian-perhatian kecil kamu yang tulus 💌',
                'Semua hal tentang kamu! (SEGALANYA) ❤️'
            ],
            'correct' => 3,
            'wrong_remark' => 'Semuanya dong cantik! Nggak ada satu pun celah di diri kamu yang nggak aku suka! 💕'
        ]
    ],

    // Gift Voucher details
    'gift' => [
        'title' => 'INFINITE HUGS & LOVE VOUCHER 🧸',
        'subtitle' => 'Redeemable anytime, valid forever, with unlimited claims!',
        'description' => "Selamat! Voucher ini resmi bisa kamu tukarkan dengan: Pelukan paling erat saat kamu lagi capek, pundak buat bersandar, telinga yang selalu siap dengerin cerita random kamu, dan cinta tanpa batas dari cowokmu tersayang! \n\nKado fisik aslinya sudah menunggumu secara nyata, tapi ini adalah kado hatiku yang akan selalu menemanimu kapan pun dan di mana pun kamu berada. I love you so much! ❤️",
        'coupon_code' => 'HBD-DENAKU-FOREVER-LOVE'
    ],

    // Deeply emotional Easter Egg Letter (Unlocked on clicking Crown 👑 3 times)
    'easter_egg_letter' => "Halo Sayangku, Kamu berhasil menemukan surat rahasia ini... 👑💌\n\nJika kamu membaca ini, artinya kamu benar-benar peka dengan setiap detail kecil yang aku buat khusus untuk duniaku. Dan hal itu persis seperti apa yang selalu bikin duniaku candu kepadamu: rasa ingin tahumu yang gemesin, senyum tulusmu, dan perhatian kecilmu.\n\nMakasih ya sudah bertahan dan berjalan bersamaku melewati semua tawa, tangis, cemberut manis, dan pelukan hangat sejak Selasa, 17 Oktober 2023. Aku nggak pernah menyesali satu detik pun waktu yang aku habiskan bersamamu. Setiap detik di sampingmu adalah berkah terindah yang semesta titipkan untuk hidupku.\n\nAku berjanji akan selalu ada buat kamu, menjaga senyum manis itu agar tidak pernah pudar, dan selalu menjadi rumah terhangat tempatmu pulang.\n\nAku sayang kamu hari ini, besok, lusa, dan selamanya, My Princess Denaku! 💖✨"
];
