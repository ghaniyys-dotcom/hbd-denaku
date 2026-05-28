<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Reason;
use App\Models\Memory;
use App\Models\Milestone;
use App\Models\Quiz;

class BirthdayController extends Controller
{
    /**
     * Display the romantic birthday surprise page.
     */
    public function index()
    {
        // Check if database has been seeded/initialized
        $settingsCount = Setting::count();

        if ($settingsCount === 0) {
            // Safe Fallback: read directly from config file if database is not migrated/seeded
            $config = config('birthday');
        } else {
            // Build the config array dynamically from SQLite models
            $dbSettings = Setting::pluck('value', 'key')->all();

            // Fetch and map loved reasons
            $dbReasons = Reason::orderBy('sort_order')->get()->map(function ($item) {
                return [
                    'title' => $item->title,
                    'emoji' => $item->emoji,
                    'description' => $item->description,
                    'color' => $item->color,
                ];
            })->toArray();

            // Fetch and map memories gallery (mapping image_path to the 'image' key for template compatibility)
            $dbGallery = Memory::orderBy('sort_order')->get()->map(function ($item) {
                return [
                    'image' => $item->image_path,
                    'caption' => $item->caption,
                    'rotation' => $item->rotation,
                ];
            })->toArray();

            // Fetch and map milestones timeline (mapping milestone_date to the 'date' key for template compatibility)
            $dbTimeline = Milestone::orderBy('sort_order')->get()->map(function ($item) {
                return [
                    'date' => $item->milestone_date,
                    'title' => $item->title,
                    'emoji' => $item->emoji,
                    'description' => $item->description,
                ];
            })->toArray();

            // Fetch and map chemistry quizzes
            $dbQuiz = Quiz::orderBy('sort_order')->get()->map(function ($item) {
                return [
                    'question' => $item->question,
                    'choices' => $item->choices,
                    'correct' => $item->correct,
                    'wrong_remark' => $item->wrong_remark,
                ];
            })->toArray();

            $config = [
                'partner_name' => $dbSettings['partner_name'] ?? 'Denaku',
                'anniversary_date' => $dbSettings['anniversary_date'] ?? '2023-10-17T01:58:00',
                'birth_date' => $dbSettings['birth_date'] ?? '2005-06-01',
                'music_url' => $dbSettings['music_url'] ?? '/audio/romantic.mp3',
                'letter_text' => $dbSettings['letter_text'] ?? '',
                'reasons' => $dbReasons,
                'gallery' => $dbGallery,
                'timeline' => $dbTimeline,
                'quiz' => $dbQuiz,
                'gift' => [
                    'title' => $dbSettings['gift_title'] ?? 'INFINITE HUGS & LOVE VOUCHER 🧸',
                    'subtitle' => $dbSettings['gift_subtitle'] ?? 'Redeemable anytime, valid forever, with unlimited claims!',
                    'description' => $dbSettings['gift_description'] ?? '',
                    'coupon_code' => $dbSettings['gift_coupon_code'] ?? 'HBD-DENAKU-FOREVER-LOVE',
                ],
                'easter_egg_letter' => $dbSettings['easter_egg_letter'] ?? '',
            ];
        }

        // Calculate age dynamically if birthdate is set
        $birthDate = new \DateTime($config['birth_date']);
        $today = new \DateTime();
        $age = $today->diff($birthDate)->y;

        return view('birthday', compact('config', 'age'));
    }
}
