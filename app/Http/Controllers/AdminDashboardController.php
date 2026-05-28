<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Reason;
use App\Models\Memory;
use App\Models\Milestone;
use App\Models\Quiz;
use App\Models\HeroSection;
use Illuminate\Support\Facades\File;

class AdminDashboardController extends Controller
{
    /**
     * Show the main admin panel dashboard with all settings and lists.
     */
    public function index()
    {
        // 1. Fetch Key-Value Settings
        $settings = Setting::pluck('value', 'key')->all();

        // 2. Fetch lists ordered by sort_order
        $reasons = Reason::orderBy('sort_order')->get();
        $memories = Memory::orderBy('sort_order')->get();
        $milestones = Milestone::orderBy('sort_order')->get();
        $quizzes = Quiz::orderBy('sort_order')->get();

        // 3. Fetch Hero Sections
        $heroSections = HeroSection::orderBy('sort_order')->get();

        return view('admin.dashboard', compact('settings', 'reasons', 'memories', 'milestones', 'quizzes', 'heroSections'));
    }

    /**
     * Update the key-value settings.
     */
    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'partner_name' => 'required|string|max:50',
            'anniversary_date' => 'required|string',
            'birth_date' => 'required|date',
            'music_url' => 'nullable|string',
            'music_file' => 'nullable|file|mimes:mp3,mpeg|max:15360',
            'letter_text' => 'required|string',
            'gift_title' => 'required|string|max:100',
            'gift_subtitle' => 'required|string|max:200',
            'gift_description' => 'required|string',
            'gift_coupon_code' => 'required|string|max:50',
            'easter_egg_letter' => 'required|string',
            'hero_title_content' => 'nullable|string|max:200',
            'hero_title_id' => 'nullable|integer',
            'hero_subtitle_content' => 'nullable|string|max:200',
            'hero_subtitle_id' => 'nullable|integer',
        ]);

        // Handle music file upload
        if ($request->hasFile('music_file')) {
            $file = $request->file('music_file');
            $filename = 'music_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('audio');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $data['music_url'] = '/audio/' . $filename;
        } else {
            $data['music_url'] = $request->input('music_url', '');
        }

        foreach ($data as $key => $value) {
            if (!in_array($key, ['hero_title_content', 'hero_title_id', 'hero_subtitle_content', 'hero_subtitle_id'])) {
                Setting::setValue($key, $value);
            }
        }

        // Update hero title
        if ($request->filled('hero_title_id') && $request->filled('hero_title_content')) {
            HeroSection::where('id', $request->input('hero_title_id'))->update(['content' => $request->input('hero_title_content')]);
        }
        // Update hero subtitle
        if ($request->filled('hero_subtitle_id') && $request->filled('hero_subtitle_content')) {
            HeroSection::where('id', $request->input('hero_subtitle_id'))->update(['content' => $request->input('hero_subtitle_content')]);
        }

        // AJAX response
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Semua settings berhasil disimpan! 💖✨']);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Semua settings berhasil disimpan! 💖✨');
    }

    /*
    |--------------------------------------------------------------------------
    | REASONS CRUD
    |--------------------------------------------------------------------------
    */
    public function storeReason(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'emoji' => 'required|string|max:10',
            'description' => 'required|string',
            'color' => 'required|string',
        ]);

        // Auto-assign sort_order
        $data['sort_order'] = Reason::max('sort_order') + 1;

        Reason::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Alasan cinta baru berhasil ditambahkan! 🌸');
    }

    public function updateReason(Request $request, Reason $reason)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'emoji' => 'required|string|max:10',
            'description' => 'required|string',
            'color' => 'required|string',
        ]);

        $reason->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Alasan cinta berhasil diubah! ✨');
    }

    public function destroyReason(Reason $reason)
    {
        $reason->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Alasan cinta berhasil dihapus! 🗑️');
    }

    /*
    |--------------------------------------------------------------------------
    | MEMORIES (Scrapbook Polaroid Gallery) CRUD
    |--------------------------------------------------------------------------
    */
    public function storeMemory(Request $request)
    {
        $data = $request->validate([
            'caption' => 'required|string',
            'rotation' => 'required|string|max:20',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // Max 10MB
        ]);

        // Upload photo file safely
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Ensure uploads directory exists
            $destinationPath = public_path('uploads');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $filename);
            $data['image_path'] = 'uploads/' . $filename;
        }

        $data['sort_order'] = Memory::max('sort_order') + 1;

        Memory::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Foto Polaroid memori berhasil diunggah! 📸💝');
    }

    public function updateMemory(Request $request, Memory $memory)
    {
        $data = $request->validate([
            'caption' => 'required|string',
            'rotation' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        // Handle new photo upload
        if ($request->hasFile('photo')) {
            // Delete old file if exists in uploads
            if ($memory->image_path && File::exists(public_path($memory->image_path))) {
                File::delete(public_path($memory->image_path));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $data['image_path'] = 'uploads/' . $filename;
        }

        $memory->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Memori Polaroid berhasil diperbarui! 📸✨');
    }

    public function destroyMemory(Memory $memory)
    {
        // Delete photo file from public uploads
        if ($memory->image_path && File::exists(public_path($memory->image_path))) {
            File::delete(public_path($memory->image_path));
        }

        $memory->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Memori Polaroid berhasil dihapus! 🗑️');
    }

    /*
    |--------------------------------------------------------------------------
    | MILESTONES (Love Journey Timeline) CRUD
    |--------------------------------------------------------------------------
    */
    public function storeMilestone(Request $request)
    {
        $data = $request->validate([
            'milestone_date' => 'required|string|max:100',
            'title' => 'required|string|max:150',
            'emoji' => 'required|string|max:10',
            'description' => 'required|string',
        ]);

        $data['sort_order'] = Milestone::max('sort_order') + 1;

        Milestone::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Milestone perjalanan jadian berhasil ditambahkan! 🕰️💖');
    }

    public function updateMilestone(Request $request, Milestone $milestone)
    {
        $data = $request->validate([
            'milestone_date' => 'required|string|max:100',
            'title' => 'required|string|max:150',
            'emoji' => 'required|string|max:10',
            'description' => 'required|string',
        ]);

        $milestone->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Milestone jadian berhasil diubah! ✨');
    }

    public function destroyMilestone(Milestone $milestone)
    {
        $milestone->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Milestone jadian berhasil dihapus! 🗑️');
    }

    /*
    |--------------------------------------------------------------------------
    | QUIZZES CRUD
    |--------------------------------------------------------------------------
    */
    public function storeQuiz(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'choices_raw' => 'required|string', // Choices separated by newlines
            'correct' => 'required|integer',
            'wrong_remark' => 'required|string',
        ]);

        // Convert choices separated by newlines to array
        $choices = array_filter(array_map('trim', explode("\n", $data['choices_raw'])));
        $data['choices'] = array_values($choices);

        $data['sort_order'] = Quiz::max('sort_order') + 1;

        Quiz::create([
            'question' => $data['question'],
            'choices' => $data['choices'],
            'correct' => $data['correct'],
            'wrong_remark' => $data['wrong_remark'],
            'sort_order' => $data['sort_order'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Pertanyaan kuis baru berhasil ditambahkan! 🧩💘');
    }

    public function updateQuiz(Request $request, Quiz $quiz)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'choices_raw' => 'required|string',
            'correct' => 'required|integer',
            'wrong_remark' => 'required|string',
        ]);

        $choices = array_filter(array_map('trim', explode("\n", $data['choices_raw'])));
        $data['choices'] = array_values($choices);

        $quiz->update([
            'question' => $data['question'],
            'choices' => $data['choices'],
            'correct' => $data['correct'],
            'wrong_remark' => $data['wrong_remark'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Pertanyaan kuis berhasil diperbarui! 🧩✨');
    }

    public function destroyQuiz(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Pertanyaan kuis berhasil dihapus! 🗑️');
    }

    /*
    |--------------------------------------------------------------------------
    | HERO SECTION CRUD
    |--------------------------------------------------------------------------
    */
    public function storeHero(Request $request)
    {
        $data = $request->validate([
            'section_key' => 'required|string|max:100',
            'title' => 'nullable|string|max:200',
            'content' => 'nullable|string',
            'caption' => 'nullable|string|max:200',
            'emoji' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'hero_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $data['image_path'] = 'uploads/' . $filename;
        }

        $exists = HeroSection::where('section_key', $data['section_key'])->first();
        if ($exists) {
            $exists->update($data);
            return redirect()->route('admin.dashboard')->with('success', 'Hero section "' . $data['section_key'] . '" berhasil diperbarui! 🦸✨');
        }

        $data['sort_order'] = HeroSection::max('sort_order') + 1;
        HeroSection::create($data);
        return redirect()->route('admin.dashboard')->with('success', 'Hero section baru berhasil ditambahkan! 🦸✨');
    }

    public function updateHero(Request $request, HeroSection $hero)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:200',
            'content' => 'nullable|string',
            'caption' => 'nullable|string|max:200',
            'emoji' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        if ($request->hasFile('photo')) {
            if ($hero->image_path && File::exists(public_path($hero->image_path))) {
                File::delete(public_path($hero->image_path));
            }
            $file = $request->file('photo');
            $filename = 'hero_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $data['image_path'] = 'uploads/' . $filename;
        }

        $hero->update($data);
        return redirect()->route('admin.dashboard')->with('success', 'Hero section "' . $hero->section_key . '" berhasil diperbarui! 🦸✨');
    }

    public function destroyHero(HeroSection $hero)
    {
        if ($hero->image_path && File::exists(public_path($hero->image_path))) {
            File::delete(public_path($hero->image_path));
        }
        $hero->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Hero section berhasil dihapus! 🗑️');
    }
}
