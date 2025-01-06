<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class ActivityController extends Controller
{
     // Display all quizzes
     public function index()
     {
         // Fetch all quizzes from the database
         $quizzes = Activity::all();

         // Return the view with the quizzes data
         return view('activity.index', compact('quizzes'));
     }

     // Show quizzes based on the subject
     public function show($id)
     {
         // Fetch quizzes for the given subject
         $quiz = Activity::findOrFail($id);

         // Return the view with quizzes for the subject
         return view('activity.quiz', compact('quiz'));
     }

     // Submit quiz answers
     public function submitQuiz(Request $request)
     {
         // Logic to handle quiz submission and scoring
         // Example: Check if the selected answer matches the correct option
         $quiz = Activity::find($request->quiz_id);

         if ($quiz && $quiz->correct_option === $request->answer) {
             // Handle correct answer, store score or mark as correct
             return redirect()->route('activities.index')->with('success', 'Correct answer!');
         } else {
             // Handle incorrect answer
             return redirect()->route('activities.index')->with('error', 'Incorrect answer, please try again!');
         }
     }
}
