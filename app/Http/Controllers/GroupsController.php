<?php

namespace App\Http\Controllers;

use App\Models\EducationalProgram;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Group::all();
        return view('pages.groups.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = EducationalProgram::all();
        return view('pages.groups.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255']
        ]);

        $group = Group::create([
            'educational_program_id' => $request->educational_program_id,
            'title' => $request->title
        ]);

        return redirect(route('groups.index'));
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
        $data = Group::where('id', $id)->first();
        $programs = EducationalProgram::all();
        return view('pages.groups.edit', compact('data', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255']
        ]);

        $group = Group::where('id', $id)->first();
        $group->educational_program_id = $request->educational_program_id;
        $group->title = $request->title;
        $group->save();

        return redirect(route('groups.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = Group::where('id', $id)->first();
        $group->delete();

        return redirect(route('groups.index'));
    }
}
