<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Circle;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:students-read')->only('index');
        $this->middleware('permission:students-create')->only('create');
        $this->middleware('permission:students-create')->only('store');
        $this->middleware('permission:students-update')->only('update');
        $this->middleware('permission:students-update')->only('edit');
        $this->middleware('permission:students-delete')->only('destroy');
    }

    public function index()
    {
        $students = Student::with('circle')->filter(request('search'))->paginate(10);
        return view('admin.student.index', compact('students'));
    }


    public function create()
    {
        $circles = Circle::get();
        return view('admin.student.create', compact('circles'));
    }


    public function store(StudentRequest $request)
    {
        Student::create([
            'name' => $request->name,
            'circle_id' => $request->circle_id,
        ]);
        return redirect()->route('students.index')->with('success', __('site.CreateSucessfully'));
    }





    public function edit(string $id)
    {
        $student = Student::find($id);
        $circles = Circle::get();
        return view('admin.student.edit', compact('student', 'circles'));
    }



    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->update([
            'name' => $request->name,
            'circle_id' => $request->circle_id,
        ]);
        return redirect()->route('students.index')->with('success', __('site.UpdateSucessfully'));
    }


    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', __('site.DeleteSuccessfully'));
    }
}
