<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::paginate(30);
        return view('pages.students.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        return view('pages.students.create', compact('groups'));
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
        $user->password = Hash::make('SkmaStudent123!@#');
        $user->save();

        $user->assignRole('student');

        $teacher = new Student();
        $teacher->group_id = $request->group_id;
        $teacher->user_id = $user->id;
        $teacher->uuid = Str::uuid();
        $teacher->save();

        return redirect(route('students.index'));
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
        $student = Student::where('id', $id)->first();
        $user = $student->user;
        $user->removeRole('student');
        $user->delete();
        return redirect(route('students.index'));
    }
}
