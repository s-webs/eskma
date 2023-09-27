<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    public function practiceStudents()
    {
        return $this->hasMany(PracticeStudent::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function baseUser()
    {
        return $this->belongsTo(PracticeBaseUser::class, 'practice_base_users_id', 'id');
    }
}
