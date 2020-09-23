<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Message;
use Session;
use Validator;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->paginate(12);
        $unread = Message::where('seen', '0')->get();
        return view('backend.pages.messages.index', compact('messages', 'unread'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
          'name' => 'required',      
          'phone' => 'required',      
          'message' => 'required'     
        ]);

        if($validation->fails()){
           return redirect()->back()->with('error',$validation->Errors()->first())->withInput()->withErrors($validation);
        }

        $messages = new Message(); 
        $messages->name = $request->name;
        $messages->email = $request->email;
        $messages->phone = $request->phone;
        $messages->subject = $request->subject;
        $messages->message = $request->message;
        $messages->save();
        if ($messages->save()) {
            Session::flash('message', 'Message send Successfully....');
           return redirect()->back();
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
        $message = Message::findOrFail($id);
        $seen = $message->seen;
        if ($seen == 0) {
            $message->seen = 1;
            $message->save();
        }
        
        return view('backend.pages.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $message = Message::findOrFail($id); 

            if ($message->delete()) {
                Session::flash('message', 'Message deleted Successfully');
               return redirect()->back();
            }
    }
}
