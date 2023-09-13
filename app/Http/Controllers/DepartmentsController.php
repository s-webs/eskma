<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EducationalProgram;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Department::all();
        return view('pages.departments.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = EducationalProgram::all();
        return view('pages.departments.create', compact('programs'));
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

        $department = Department::create([
            'educational_program_id' => $request->educational_program_id,
            'name_kz' => $request->name_kz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
        ]);

        return redirect(route('departments.index'));
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
        $data = Department::where('id', $id)->first();
        $programs = EducationalProgram::all();
        return view('pages.departments.edit', compact('data', 'programs'));
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

        $department = Department::where('id', $id)->first();
        $department->educational_program_id = $request->educational_program_id;
        $department->name_kz = $request->name_kz;
        $department->name_ru = $request->name_ru;
        $department->name_en = $request->name_en;
        $department->save();

        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::where('id', $id)->first();
        $department->delete();

        return redirect(route('departments.index'));
    }
}
