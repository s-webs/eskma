<?php

namespace App\Jobs;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;

    /**
     * Create a new job instance.
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $practice = \App\Models\PracticeStudent::where('id', $this->id)->first();
        $filename = 'report_student_' . $practice->student->uuid . '.pdf';
        $qrFilename = 'report_student_' . $practice->student->uuid . '.png';
        $url = route('publicDetails', $this->id);

        QrCode::format('png')
            ->generate($url, public_path('uploads/qr/' . $qrFilename));

        $qrAsset = 'uploads/qr/' . $qrFilename;

        $pdf = Pdf::loadView('pdf.report', compact('practice', 'qrAsset'));
        $pdf->setPaper('a4');
        $pdf->setAutoBottomMargin = 'stretch';
        $pdf->save(public_path('uploads/pdf/') . $filename);

        $practice->report_status = 'done';
        $practice->pdf_link = 'uploads/pdf/' . $filename;
        $practice->save();
    }
}
