<?php

namespace App\Http\Controllers\PracticeStudent;

use App\Http\Controllers\Controller;
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
        return view('pages.practices.student.details', compact('practice', 'practiceId'));
    }

    public function publicDetails($id)
    {
        $practice = PracticeStudent::where('id', $id)->first();
        $practiceId = $practice->id;
        return view('pages.practices.student.public-details', compact('practice', 'practiceId'));
    }

    public function generateReport($id)
    {
        $practice = \App\Models\PracticeStudent::where('id', $id)->first();
        $filename = 'report_student_' . $practice->student->uuid . '.pdf';
        $qrFilename = 'report_student_' . $practice->student->uuid . '.png';
        $url = route('publicDetails', $id);

        QrCode::format('png')
            ->generate($url, public_path('uploads/qr/' . $qrFilename));

        $qrAsset = 'uploads/qr/' . $qrFilename;

        $pdf = Pdf::loadView('pdf.report', compact('practice', 'qrAsset'));
        $pdf->setPaper('a4');
        $pdf->setAutoBottomMargin = 'stretch';
        $pdf->save(public_path('uploads/pdf/') . $filename);


        $practice->pdf_link = 'uploads/pdf/' . $filename;
        $practice->save();

        return redirect(route('student.practices-details', $id));
    }
}
