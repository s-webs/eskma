<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Teacher::paginate(30);
        return view('pages.teachers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('pages.teachers.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->surname = 'null';
        $user->name = 'null';
        $user->patronymic = 'null';
        $user->email = $request->email;
        $user->password = Hash::make('SkmaTeacher123!@#');
        $user->save();

        $user->assignRole('teacher');

        $teacher = new Teacher();
        $teacher->department_id = $request->department_id;
        $teacher->user_id = $user->id;
        $teacher->uuid = Str::uuid();
        $teacher->save();

        return redirect(route('teachers.index'));
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
        $teacher = Teacher::where('id', $id)->first();
        $user = $teacher->user;
        $user->removeRole('teacher');
        $user->delete();

        return redirect(route('teachers.index'));
    }
}
