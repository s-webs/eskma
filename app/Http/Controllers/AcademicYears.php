<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYears extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AcademicYear::all();
        return view('pages.academic-years.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.academic-years.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = AcademicYear::create([
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return redirect(route('academicYears.index'));
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
        $data = AcademicYear::where('id', $id)->first();
        return view('pages.academic-years.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $years = AcademicYear::where('id', $id)->first();
        $years->start = $request->start;
        $years->end = $request->end;
        $years->save();

        return redirect(route('academicYears.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $years = AcademicYear::where('id', $id)->first();
        $years->delete();

        return redirect(route('academicYears.index'));
    }
}
