<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use App\Models\AboutMe;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\WorkExperience;

class HomeController extends Controller
{
    //

    public function index()
    {
        // جلب البيانات من جدول about_me
        $aboutMe = AboutMe::first(); // Assuming only one record for about me section

        // جلب جميع الخدمات من جدول services
        $services = Service::all();
        $educationExperiences = WorkExperience::where('type', 'eduction')->get();
        $workExperiences = WorkExperience::where('type', 'work')->get();
        $employmentHistories = WorkExperience::where('type', 'employment')->get();

        // جلب جميع المهارات
        $skills = Skill::all();
        $projects = Project::with('project_images')
        ->with('project_techniques')
        ->get()
        ->all();

        

        // إرسال البيانات إلى الـVue component
        return Inertia::render('Welcome', [
            'aboutMe' => $aboutMe,
            'services' => $services,
            'educationExperiences' => $educationExperiences,
            'workExperiences' => $workExperiences,
            'employmentHistories' => $employmentHistories,
            'skills' => $skills,
            'projects' => $projects
        ]);
    }
}
