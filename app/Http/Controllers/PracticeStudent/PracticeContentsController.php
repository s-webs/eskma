<?php

namespace App\Http\Controllers\PracticeStudent;

use App\Http\Controllers\Controller;
use App\Models\PracticeContent;
use Illuminate\Http\Request;

class PracticeContentsController extends Controller
{

    public function create($id)
    {
        return view('pages.practices.student.create-content', compact('id'));
    }

    public function store(Request $request)
    {
        $content = new PracticeContent();
        $content->practice_student_id = $request->practice_student_id;
        $content->content = $request->content;
        $content->start = $request->start;
        $content->end = $request->end;
        $content->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $content = PracticeContent::where('id', $id)->first();
        return view('pages.practices.student.edit-content', compact('content'));
    }

    public function update(Request $request, string $id)
    {
        $content = PracticeContent::where('id', $id)->first();
        $content->content = $request->content;
        $content->start = $request->start;
        $content->end = $request->end;
        $content->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $content = PracticeContent::where('id', $id)->first();
        $content->delete();

        return redirect()->back();
    }

}
