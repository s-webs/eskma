<?php

namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use App\Models\Practice;
use App\Models\PracticeStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class PracticeStudentsController extends Controller
{

    public function listStudents($practiceID)
    {
        $students = PracticeStudent::where('practice_id', $practiceID)->get();
        return view('pages.practices.students.list', compact('students', 'practiceID'));
    }

    public function addStudents($practiceID)
    {
        $students = Student::all();
        return view('pages.practices.students.add', compact('students', 'practiceID'));
    }

    public function storeStudents($practiceID)
    {
        $practiceStudents = new PracticeStudent();
        $practiceStudents->practice_id = $practiceID;
        dd($practiceID);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
