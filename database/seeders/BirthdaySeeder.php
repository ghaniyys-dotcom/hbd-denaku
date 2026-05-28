<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\Reason;
use App\Models\Memory;
use App\Models\Milestone;
use App\Models\Quiz;

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
    }
}
