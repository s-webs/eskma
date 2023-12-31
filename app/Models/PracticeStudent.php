<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeStudent extends Model
{
    use HasFactory;

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function plan()
    {
        return $this->hasMany(PracticePlan::class);
    }

    public function content()
    {
        return $this->hasMany(PracticeContent::class);
    }
}
