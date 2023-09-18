<?php

namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Practice;
use App\Models\PracticeBaseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PracticesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Practice::all();
        return view('pages.practices.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $years = AcademicYear::all();
        $baseUsers = PracticeBaseUser::all();
        return view('pages.practices.create', compact('years', 'baseUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'duration' => ['required'],
            'language' => ['required', 'string', 'max:255'],
            'start' => ['required'],
            'end' => ['required'],
        ]);

        $practice = new Practice();
        $practice->teacher_id = $request->teacher_id;
        $practice->practice_base_users_id = $request->practice_base_users_id;
        $practice->title = $request->title;
        $practice->duration = $request->duration;
        $practice->academic_year_id = $request->academic_year_id;
        $practice->language = $request->language;
        $practice->start = $request->start;
        $practice->end = $request->end;
        $practice->uuid = Str::uuid();
        $practice->save();

        return redirect(route('practices.index'));
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
