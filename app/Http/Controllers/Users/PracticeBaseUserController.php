<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\PracticeBase;
use App\Models\PracticeBaseUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PracticeBaseUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PracticeBaseUser::paginate(30);
        return view('pages.practice-base-users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bases = PracticeBase::all();
        return view('pages.practice-base-users.create', compact('bases'));
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
        $user->password = Hash::make('SkmaBaseTeacher123!@#');
        $user->save();

        $user->assignRole('teacher-for-base');

        $baseUser = new PracticeBaseUser();
        $baseUser->practice_base_id = $request->practice_base_id;
        $baseUser->user_id = $user->id;
        $baseUser->save();

        return redirect(route('practice-base-users.index'));
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
        $baseUser = PracticeBaseUser::where('id', $id)->first();
        $user = User::where('id', $baseUser->user_id)->first();
        $user->delete();

        return redirect(route('practice-base-users.index'));
    }
}
