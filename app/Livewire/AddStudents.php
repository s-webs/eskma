<?php

namespace App\Livewire;

use App\Models\PracticeStudent;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
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
        $students = Student::paginate(50);
        $practiceID = $this->practiceID;

        if (strlen($this->search) >= 3) {
            $students = Student::whereHas('user', function (Builder $query) {
                $query->where('surname', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhere('patronymic', 'like', '%' . $this->search . '%');
            })->paginate(50);
        }

        return view('livewire.add-students', compact('students', 'practiceID'));
    }

    public function addStudent($studentID)
    {
        $practiceStudent = new PracticeStudent();
        $practiceStudent->student_id = $studentID;
        $practiceStudent->practice_id = $this->practiceID;
        $practiceStudent->save();
    }

    public function deleteStudent($studentID)
    {
        $practiceStudent = PracticeStudent::where('practice_id', $this->practiceID && 'student_id', $studentID)->first();
        $practiceStudent->delete();
    }
}
