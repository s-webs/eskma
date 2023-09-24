<?php

namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use App\Models\Practice;
use App\Models\PracticeStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class PracticeStudentsController extends Controller
{

    public function listStudents($practiceID)
    {
        $practice = Practice::where('id', $practiceID)->first();
        $students = PracticeStudent::where('practice_id', $practiceID)->get();
        return view('pages.practices.students.list', compact('students', 'practiceID', 'practice'));
    }

    public function addStudents($practiceID)
    {
        $students = Student::all();
        return view('pages.practices.students.add', compact('students', 'practiceID'));
    }

    public function addGrade($id)
    {
        $practiceId = $id;
        return view('pages.practices.add-grade', compact('practiceId'));
    }

    public function storeGrade(Request $request, $id)
    {
        $practice = PracticeStudent::where('id', $id)->first();
        if (auth()->user()->hasRole('teacher')) {
            $practice->teacher_grade = $request->grade;
        } elseif (auth()->user()->hasRole('base_user')) {
            $practice->base_user_grade = $request->grade;
        }
        $practice->save();

        return redirect(route('student.practices-details', $id));
    }

    public function addTotalGrade($id)
    {
        $practiceId = $id;
        return view('pages.practices.add-total-grade', compact('practiceId'));
    }

    public function storeTotalGrade(Request $request, $id)
    {
        $practice = PracticeStudent::where('id', $id)->first();
        $practice->total_grade = $request->grade;
        $practice->save();

        return redirect(route('student.practices-details', $id));
    }

    public function addReview($id)
    {
        $practiceId = $id;
        return view('pages.practices.add-review', compact('practiceId'));
    }

    public function storeReview(Request $request, $id)
    {
        $practice = PracticeStudent::where('id', $id)->first();
        if (auth()->user()->hasRole('teacher')) {
            $practice->teacher_review = $request->review;
        } elseif (auth()->user()->hasRole('base_user')) {
            $practice->base_user_review = $request->review;
        } elseif (auth()->user()->hasRole('student')) {
            $practice->student_review = $request->review;
        }
        $practice->save();

        return redirect(route('student.practices-details', $id));
    }

    public function generatePdf($id)
    {
        $practice = PracticeStudent::where('id', $id)->first();

        return view('pdf.report', compact('practice'));
    }
}
