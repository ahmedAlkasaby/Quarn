<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CircleRequest;
use App\Models\Circle;
use App\Models\User;
use Illuminate\Http\Request;

class CircleController extends Controller
{

    public function index()
    {
        $circles = Circle::with('teacher')->filter(request('search'))->paginate(10);
        return view('admin.circle.index', compact('circles'));
    }


    public function create()
    {
        $teachers = User::get();
        return view('admin.circle.create',compact('teachers'));
    }


    public function store(CircleRequest $request)
    {
        Circle::create([
            'name'=>[
                'ar'=>$request->name_ar,
                'en'=>$request->name_en,
            ],
            'date'=>$request->date,
            'teacher_id'=>$request->teacher_id,
        ]);
        return redirect()->route('circles.index')->with('success', __('site.CreateSucessfully'));
    }




    public function edit(string $id)
    {
        $circle = Circle::find($id);
        $teachers = User::get();
        return view('admin.circle.edit', compact('circle','teachers'));
    }


    public function update(CircleRequest $request, string $id)
    {
        Circle::where('id', $id)->update([
            'name'=>[
                'ar'=>$request->name_ar,
                'en'=>$request->name_en,
            ],
            'date'=>$request->date,
            'teacher_id'=>$request->teacher_id,
        ]);
        return redirect()->route('circles.index')->with('success', __('site.UpdateSucessfully'));
    }


    public function destroy(string $id)
    {
       $circle = Circle::find($id);
         $circle->delete();
        return redirect()->back()->with('success', __('site.DeleteSuccessfully'));

    }
}
