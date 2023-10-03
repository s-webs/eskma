<?php

namespace App\Livewire;

use App\Jobs\GenerateReportJob;
use App\Models\PracticeStudent;
use Livewire\Component;

class GenerateReport extends Component
{

    public $generatingReport = false;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function generateReport()
    {
        $practice = PracticeStudent::where('id', $this->id)->first();
        $practice->report_status = 'process';
        $practice->save();
        GenerateReportJob::dispatch($this->id)->onQueue('reports');
        $this->generatingReport = true;
        $this->checkGenerateReportStatus();
    }

    public function checkGenerateReportStatus()
    {
        $practice = PracticeStudent::where('id', $this->id)->first();
        if ($practice->report_status === 'process') {
            while ($practice->report_status === 'process') {
                dump($practice->report_status);
                $practice = \App\Models\PracticeStudent::where('id', $this->id)->first();
                if ($practice->report_status === 'done') {
                    $this->generatingReport = false;
                    break;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.generate-report');
    }
}
