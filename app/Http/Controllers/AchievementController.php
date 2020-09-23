<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Achievement;
use Session;
use Validator;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = Achievement::orderBy('id', 'desc')->paginate(10);
        return view('backend.pages.achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.achievements.create');
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
          'student_name' => 'required',      
          'student_field' => 'required',      
          'student_description' => 'required', 
          'student_picture' => 'required'     
        ]);

        if($validation->fails()){
           return redirect()->back()->with('error',$validation->Errors()->first())->withInput()->withErrors($validation);
        }

        $achievement = new Achievement(); 
        if ($request->has('student_picture'))
        {
            $file = $request->file('student_picture');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(99, 99) . '.' . $extention;
            $file->move('uploads/achievements/', $fileName);
        }

        $achievement->student_name = $request->student_name; 
        $achievement->student_field = $request->student_field; 
        $achievement->student_picture = $request->student_picture;
        $achievement->student_picture = $fileName;
        $achievement->student_description = $request->student_description; 
        $achievement->save();
        if ($achievement->save()) {
            Session::flash('message', 'Achievement Add Successfully');
           return redirect()->route('achievements');
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
        $achievement = Achievement::findOrFail($id);
        return view('backend.pages.achievements.edit' , compact('achievement'));
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
          'student_name' => 'required',      
          'student_field' => 'required',      
          'student_description' => 'required', 
          'student_picture' => 'required'     
        ]);

        if($validation->fails()){
           return redirect()->back()->with('error',$validation->Errors()->first())->withInput()->withErrors($validation);
        }
 
        $achievement = Achievement::findOrFail($id); 

         if (!empty($achievement->student_picture)) {
                    unlink(public_path('uploads/achievements/' . $achievement->student_picture));
                } 

        if ($request->has('student_picture'))
        {
            $file = $request->file('student_picture');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(99, 99) . '.' . $extention;
            $file->move('uploads/achievements/', $fileName);
        }

        $achievement->student_name = $request->student_name; 
        $achievement->student_field = $request->student_field; 
        $achievement->student_picture = $request->student_picture;
        $achievement->student_picture = $fileName;
        $achievement->student_description = $request->student_description; 
        $achievement->update();
        if ($achievement->update()) {
            Session::flash('message', 'Achievement Update Successfully');
           return redirect()->route('achievements');
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
        $achievement = Achievement::findOrFail($id);
       if (!empty($achievement->student_picture)) {
            unlink(public_path('uploads/achievements/' . $achievement->student_picture));
         }  
       if ($achievement->delete()) {
            Session::flash('message', 'Achievement deleted Successfully');
            return redirect()->back();
        }
    }
}
