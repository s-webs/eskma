<?php

namespace App\Livewire;

use App\Models\PracticeStudent;
use Livewire\Component;

class ListStudents extends Component
{
    public $practiceId;
    public $isLoading = false;
    public $itemId;

    public function delete()
    {
        $this->isLoading = true;
        PracticeStudent::where('id', $this->itemId)->delete();
        $this->isLoading = false;
        $this->render();
    }

    public function render()
    {
        $students = PracticeStudent::where('practice_id', $this->practiceId)->get();
        return view('livewire.list-students', compact('students'));
    }
}
