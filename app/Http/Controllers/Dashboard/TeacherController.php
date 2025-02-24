<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:teachers-read')->only('index');
        $this->middleware('permission:teachers-read')->only('show');
        $this->middleware('permission:teachers-create')->only('create');
        $this->middleware('permission:teachers-create')->only('store');
        $this->middleware('permission:teachers-update')->only('update');
        $this->middleware('permission:teachers-update')->only('edit');
        $this->middleware('permission:teachers-delete')->only('destroy');
    }


    public function index()
    {
        $teachers=User::with('circles')->filter(request('search'))->paginate(10);
        return view('admin.teacher.index',compact('teachers'));
    }


    public function create()
    {
        return view('admin.teacher.create');
    }


    public function store(TeacherRequest $request)
    {

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password) ,
        ]);

        session()->flash('success', __('site.CreateSucessfully'));
        return redirect()->route('teachers.index');
    }





    public function edit(string $id)
    {
        $teacher=User::find($id);
        return view('admin.teacher.edit',compact('teacher'));

    }


    public function update(TeacherRequest $request, User $user)
    {

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        session()->flash('success', __('site.UpdateSucessfully'));
        return redirect()->route('teachers.index');
    }


    public function destroy(string $id)
    {
        $teacher=User::find($id);
        if($teacher->circles()->count() == 0){

            $teacher->delete();

            session()->flash('success', __('site.DeleteSuccessfully'));
            return back();
        }else{
            session()->flash('error', __('site.can_not_delete_teacher'));
            return back();
        }
    }
}
