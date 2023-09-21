<?php

namespace App\Http\Controllers\PracticeStudent;

use App\Http\Controllers\Controller;
use App\Models\PracticePlan;
use Illuminate\Http\Request;

class PracticePlansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('pages.practices.student.create-plan', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $practicePlan = new PracticePlan();
        $practicePlan->practice_student_id = $request->practice_student_id;
        $practicePlan->content = $request->content;
        $practicePlan->note = $request->note;
        $practicePlan->start = $request->start;
        $practicePlan->end = $request->end;
        $practicePlan->save();

        return redirect(route('student.practices-details', $practicePlan->practiceStudent->id));
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
        $plan = PracticePlan::where('id', $id)->first();
        return view('pages.practices.student.edit-plan', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plan = PracticePlan::where('id', $id)->first();
        $plan->content = $request->content;
        $plan->note = $request->note;
        $plan->start = $request->start;
        $plan->end = $request->end;
        $plan->save();

        return redirect(route('student.practices-details', $plan->practiceStudent->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = PracticePlan::where('id', $id)->first();
        $redirectId = $plan->practiceStudent->id;
        $plan->delete();

        return redirect(route('student.practices-details', $redirectId));
    }
}
