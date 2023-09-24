<?php

namespace App\Livewire;

use App\Models\Practice;
use App\Models\PracticeStudent;
use Livewire\Component;

class SignatureComponent extends Component
{

    public $practiceId;
    public $role;

    public function mount($practiceId, $role)
    {
        $this->practiceId = $practiceId;
        $this->role = $role;
    }

    public function sign()
    {
        $practice = PracticeStudent::where('id', $this->practiceId)->first();
        if ($this->role === 'head_of_department') {
            $practice->head_of_department_signature = 1;
        } elseif ($this->role === 'teacher') {
            $practice->teacher_signature = 1;
        } elseif ($this->role === 'base_user') {
            $practice->base_user_signature = 1;
        } elseif ($this->role === 'student') {
            $practice->student_signature = 1;
        }

        $practice->save();
        //        $this->reset(['practice', 'role']);
        $this->render();
    }

    public function render()
    {
        $practice = PracticeStudent::where('id', $this->practiceId)->first();
        return view('livewire.signature-component', compact('practice'));
    }
}
