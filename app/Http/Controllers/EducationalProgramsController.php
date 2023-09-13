<?php

namespace App\Http\Controllers;

use App\Models\EducationalProgram;
use App\Models\Faculties;
use Illuminate\Http\Request;

class EducationalProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = EducationalProgram::all();
        return view('pages.educational-programs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculties::all();
        return view('pages.educational-programs.create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_kz' => ['required', 'string', 'max:255'],
            'name_ru' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
        ]);

        $educationalProgram = EducationalProgram::create([
            'faculty_id' => $request->faculty_id,
            'name_kz' => $request->name_kz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
        ]);

        return redirect(route('educationalPrograms.index'));
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
        $faculties = Faculties::all();
        $data = EducationalProgram::where('id', $id)->first();
        return view('pages.educational-programs.edit', compact('faculties', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_kz' => ['required', 'string', 'max:255'],
            'name_ru' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
        ]);

        $educationalProgram = EducationalProgram::where('id', $id)->first();
        $educationalProgram->faculty_id = $request->faculty_id;
        $educationalProgram->name_kz = $request->name_kz;
        $educationalProgram->name_ru = $request->name_ru;
        $educationalProgram->name_en = $request->name_en;
        $educationalProgram->save();

        return redirect(route('educationalPrograms.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = EducationalProgram::where('id', $id)->first();
        $item->delete();

        return redirect(route('educationalPrograms.index'));
    }
}
