<?php

namespace App\Http\Controllers;

use App\Models\PracticeBase;
use Illuminate\Http\Request;

class PracticeBasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PracticeBase::paginate(30);
        return view('pages.practice-bases.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.practice-bases.create');
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

        $data = PracticeBase::create([
            'name_kz' => $request->name_kz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
        ]);

        return redirect(route('practice-bases.index'));
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
        $data = PracticeBase::where('id', $id)->first();
        return view('pages.practice-bases.edit', compact('data'));
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

        $base = PracticeBase::where('id', $id)->first();
        $base->name_kz = $request->name_kz;
        $base->name_ru = $request->name_ru;
        $base->name_en = $request->name_en;
        $base->save();

        return redirect(route('practice-bases.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $base = PracticeBase::where('id', $id)->first();
        $base->delete();

        return redirect(route('practice-bases.index'));
    }
}
