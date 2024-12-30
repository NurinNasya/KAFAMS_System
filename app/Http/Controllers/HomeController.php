<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->type == 'admin') {
            // Fetch data for Admin dashboard
            $results = Result::all();

            // Prepare data for chart (e.g., total marks by subject)
            $subjects = $results->groupBy('assessment_subject');
            $subjectMarks = [];
            foreach ($subjects as $subject => $subjectResults) {
                $totalMarks = $subjectResults->sum('marks');
                $subjectMarks[$subject] = $totalMarks;
            }

            // Convert the data to a format Chart.js can use
            $labels = array_keys($subjectMarks);
            $data = array_values($subjectMarks);

            return view('homeAdmin', compact('labels', 'data'));
        } elseif ($user->type == 'student') {
            // Fetch the student's own results
            $studentResults = Result::where('student_name', auth()->user()->name)->get();

            // Prepare data for student's chart (example: marks per assessment)
            $assessments = $studentResults->groupBy('assessment_subject');
            $assessmentMarks = [];
            foreach ($assessments as $assessment => $assessmentResults) {
                $totalMarks = $assessmentResults->sum('marks');
                $assessmentMarks[$assessment] = $totalMarks;
            }

            // Convert the data to a format Chart.js can use
            $assessmentLabels = array_keys($assessmentMarks);
            $assessmentData = array_values($assessmentMarks);

            return view('homeStudent', compact('assessmentLabels', 'assessmentData'));
        } elseif ($user->type == 'parent') {
            return view('homeParent');
        }
    }
}
