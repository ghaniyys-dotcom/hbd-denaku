<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\Reason;
use App\Models\Memory;
use App\Models\Milestone;
use App\Models\Quiz;
use App\Models\HeroSection;

class BirthdaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $config = config('birthday');

        if (!$config) {
            return;
        }

        // 1. Seed Key-Value Settings
        $settings = [
            'partner_name' => $config['partner_name'] ?? 'Denaku',
            'anniversary_date' => $config['anniversary_date'] ?? '2023-10-17T01:58:00',
            'birth_date' => $config['birth_date'] ?? '2005-06-01',
            'music_url' => $config['music_url'] ?? '/audio/romantic.mp3',
            'letter_text' => $config['letter_text'] ?? '',
            'gift_title' => $config['gift']['title'] ?? 'INFINITE HUGS & LOVE VOUCHER 🧸',
            'gift_subtitle' => $config['gift']['subtitle'] ?? 'Redeemable anytime, valid forever, with unlimited claims!',
            'gift_description' => $config['gift']['description'] ?? '',
            'gift_coupon_code' => $config['gift']['coupon_code'] ?? 'HBD-DENAKU-FOREVER-LOVE',
            'easter_egg_letter' => $config['easter_egg_letter'] ?? '',
        ];

        foreach ($settings as $key => $value) {
            Setting::setValue($key, $value);
        }

        // 2. Seed Reasons
        if (isset($config['reasons']) && is_array($config['reasons'])) {
            foreach ($config['reasons'] as $index => $reason) {
                Reason::create([
                    'title' => $reason['title'],
                    'emoji' => $reason['emoji'],
                    'description' => $reason['description'],
                    'color' => $reason['color'],
                    'sort_order' => $index,
                ]);
            }
        }

        // 3. Seed Memories (Gallery)
        if (isset($config['gallery']) && is_array($config['gallery'])) {
            foreach ($config['gallery'] as $index => $item) {
                Memory::create([
                    'image_path' => $item['image'],
                    'caption' => $item['caption'],
                    'rotation' => $item['rotation'] ?? '0deg',
                    'sort_order' => $index,
                ]);
            }
        }

        // 4. Seed Milestones (Timeline)
        if (isset($config['timeline']) && is_array($config['timeline'])) {
            foreach ($config['timeline'] as $index => $item) {
                Milestone::create([
                    'milestone_date' => $item['date'],
                    'title' => $item['title'],
                    'emoji' => $item['emoji'],
                    'description' => $item['description'],
                    'sort_order' => $index,
                ]);
            }
        }

        // 5. Seed Quizzes (Couple Chemistry)
        if (isset($config['quiz']) && is_array($config['quiz'])) {
            foreach ($config['quiz'] as $index => $item) {
                Quiz::create([
                    'question' => $item['question'],
                    'choices' => $item['choices'],
                    'correct' => $item['correct'],
                    'wrong_remark' => $item['wrong_remark'],
                    'sort_order' => $index,
                ]);
            }
        }

        // 6. Seed Hero Sections
        $heroDefaults = [
            ['section_key' => 'hero_title', 'title' => 'Hero Title', 'content' => 'Happy Birthday, My Princess!', 'sort_order' => 0],
            ['section_key' => 'hero_subtitle', 'title' => 'Hero Subtitle', 'content' => 'My Dearest Love', 'sort_order' => 1],
            ['section_key' => 'hero_center', 'title' => 'Center Polaroid', 'caption' => 'The Birthday Girl', 'emoji' => '👑', 'sort_order' => 2],
            ['section_key' => 'hero_left', 'title' => 'Left Polaroid', 'caption' => 'Hugs For You 🫂', 'emoji' => '🧸', 'sort_order' => 3],
            ['section_key' => 'hero_mid_left', 'title' => 'Mid-Left Polaroid', 'caption' => 'Ketawa candu 🤪', 'emoji' => '✨', 'sort_order' => 4],
            ['section_key' => 'hero_mid_right', 'title' => 'Mid-Right Polaroid', 'caption' => 'Kulineran seru 🍿', 'emoji' => '🍕', 'sort_order' => 5],
            ['section_key' => 'hero_right', 'title' => 'Right Polaroid', 'caption' => 'Senja terindah 🌸', 'emoji' => '🌅', 'sort_order' => 6],
        ];
        foreach ($heroDefaults as $hero) {
            HeroSection::updateOrCreate(['section_key' => $hero['section_key']], $hero);
        }
    }
}
