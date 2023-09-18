<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentHead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DepartmentHeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DepartmentHead::all();
        return view('pages.department-heads.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('pages.department-heads.create', compact('departments'));
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
        $user->password = Hash::make('SkmaHead123!@#');
        $user->save();

        $user->assignRole('head-of-department');

        $teacher = new DepartmentHead();
        $teacher->department_id = $request->department_id;
        $teacher->user_id = $user->id;
        $teacher->save();

        return redirect(route('department-heads.index'));
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
        $deparmentHead = DepartmentHead::where('id', $id)->first();
        $user = User::where('id', $deparmentHead->user_id)->first();
        $user->removeRole('head-of-department');
        $user->delete();

        return redirect(route('department-heads.index'));
    }
}
