<?php

namespace App\Http\Controllers;

use App\Models\Faculties;
use Illuminate\Http\Request;

class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Faculties::all();
        return view('pages.faculties.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.faculties.create');
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

        $data = Faculties::create([
            'name_kz' => $request->name_kz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
        ]);

        return redirect(route('faculties.index'));
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
        $data = Faculties::where('id', $id)->first();
        return view('pages.faculties.edit', compact('data'));
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

        $faculty = Faculties::where('id', $id)->first();
        $faculty->name_kz = $request->name_kz;
        $faculty->name_ru = $request->name_ru;
        $faculty->name_en = $request->name_en;
        $faculty->save();

        return redirect(route('faculties.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculties::where('id', $id)->first();
        $faculty->delete();

        return redirect(route('faculties.index'));
    }
}
