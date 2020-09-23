<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;
use Session;
use Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('id', 'desc')->paginate(10);
        return view('backend.pages.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.teachers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        $validation =  Validator::make($request->all(),[
          'teacher_name' => 'required',      
          'teacher_position' => 'required',      
          'teacher_education' => 'required', 
          'teacher_profile' => 'required'     
        ]);

        if($validation->fails()){
           return redirect()->back()->with('error',$validation->Errors()->first())->withInput()->withErrors($validation);
        }

        $teacher = new Teacher(); 
        if ($request->has('teacher_profile'))
        {
            $file = $request->file('teacher_profile');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(99, 99) . '.' . $extention;
            $file->move('uploads/teachers/', $fileName);
        }

        $teacher->teacher_name = $request->teacher_name;
        $teacher->teacher_email = $request->teacher_email;
        $teacher->teacher_position = $request->teacher_position;
        $teacher->teacher_education = $request->teacher_education;
        $teacher->teacher_profile = $request->teacher_profile;
        $teacher->teacher_profile = $fileName;
        $teacher->teacher_description = $request->teacher_description;
        $teacher->facebook_handler = $request->facebook_handler;
        $teacher->twitter_handler = $request->twitter_handler;
        $teacher->instagram_handler = $request->instagram_handler;
        $teacher->save();
        if ($teacher->save()) {
            Session::flash('message', 'teacher Add Successfully');
           return redirect()->route('teachers');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('backend.pages.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validation =  Validator::make($request->all(),[
          'teacher_name' => 'required',      
          'teacher_position' => 'required',      
          'teacher_education' => 'required', 
          'teacher_profile' => 'required'     
        ]);

        if($validation->fails()){
           return redirect()->back()->with('error',$validation->Errors()->first())->withInput()->withErrors($validation);
        }

        $teacher = Teacher::findOrFail($id);
        if (!empty($teacher->teacher_profile)) {
                    unlink(public_path('uploads/teachers/' . $teacher->teacher_profile));
                } 
        if ($request->has('teacher_profile'))
        {
            $file = $request->file('teacher_profile');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(99, 99) . '.' . $extention;
            $file->move('uploads/teachers/', $fileName);
        }

        $teacher->teacher_name = $request->teacher_name;
        $teacher->teacher_email = $request->teacher_email;
        $teacher->teacher_position = $request->teacher_position;
        $teacher->teacher_education = $request->teacher_education;
        $teacher->teacher_profile = $request->teacher_profile;
        $teacher->teacher_profile = $fileName;
        $teacher->teacher_description = $request->teacher_description;
        $teacher->facebook_handler = $request->facebook_handler;
        $teacher->twitter_handler = $request->twitter_handler;
        $teacher->instagram_handler = $request->instagram_handler;
        $teacher->save();
        if ($teacher->save()) {
            Session::flash('message', 'teacher Update Successfully');
           return redirect()->route('teachers');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
       if (!empty($teacher->teacher_profile)) {
                    unlink(public_path('uploads/teachers/' . $teacher->teacher_profile));
                }  
       if ($teacher->delete()) {
                    Session::flash('message', 'Teacher deleted Successfully');
                   return redirect()->back();
        }
    }
}
