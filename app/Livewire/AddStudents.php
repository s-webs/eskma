<?php

namespace App\Livewire;

use App\Models\Practice;
use App\Models\PracticeStudent;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddStudents extends Component
{
    public $search = "";

    public $practiceID;

    public function mount($practiceID = null)
    {
        $this->practiceID = $practiceID;
    }

    public function render()
    {
        $practiceID = $this->practiceID;
        $practice = Practice::where('id', $practiceID)->first();
        $students = Student::whereDoesntHave('practices', function (Builder $query) {
            $query->where('practice_id', $this->practiceID);
        })->with(['user', 'practices'])->paginate(50);


        if (strlen($this->search) >= 3) {
            $students = Student::whereDoesntHave('practices', function (Builder $query) {
                $query->where('practice_id', $this->practiceID);
            })
                ->whereHas('user', function (Builder $query) {
                    $query->where('surname', 'like', '%' . $this->search . '%')
                        ->orWhere('name', 'like', '%' . $this->search . '%')
                        ->orWhere('patronymic', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                })
                ->with(['user', 'practices'])->paginate(50);
        }

        return view('livewire.add-students', compact('students', 'practiceID', 'practice'));
    }

    public function addStudent($studentID)
    {
        $practiceStudent = new PracticeStudent();
        $practiceStudent->student_id = $studentID;
        $practiceStudent->practice_id = $this->practiceID;
        $practiceStudent->save();
    }
}
