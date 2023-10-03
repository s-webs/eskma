<?php

namespace App\Http\Controllers\PracticeStudent;

use App\Http\Controllers\Controller;
use App\Jobs\GenerateReportJob;
use App\Models\PracticeStudent;
use App\Models\Student;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PracticesController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', auth()->user()->id)->with('practices')->first();
        $practices = $student->practices;
        return view('pages.practices.student.index', compact('student', 'practices'));
    }

    public function details($id)
    {
        $practice = PracticeStudent::where('id', $id)->first();
        $practiceId = $practice->id;
        $practiceContent = $practice->content->lazy();
        return view('pages.practices.student.details', compact('practice', 'practiceId', 'practiceContent'));
    }

    public function publicDetails($id)
    {
        $practice = PracticeStudent::where('id', $id)->first();
        $practiceId = $practice->id;
        return view('pages.practices.student.public-details', compact('practice', 'practiceId'));
    }

    public function generateReport($id)
    {
        GenerateReportJob::dispatch($id)->onQueue('reports');

        return redirect(route('student.practices-details', $id));
    }
}
