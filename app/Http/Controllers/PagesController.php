<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\User;
use App\Achievement;
use App\Teacher;
use App\Post;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver;

class PagesController extends Controller
{

    /*----------------------------------------
     Front-end Pages=====================
    ======================================= */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        $achievements = Achievement::orderBy('id', 'desc')->paginate(6);
        return view('frontend.pages.home.index', compact('achievements', 'posts'));
    }

    public function about()
    {
        $achievements = Achievement::orderBy('id', 'desc')->paginate(6);
        return view('frontend.pages.about.index', compact('achievements'));
    }

     public function team()
    {
        $teachers = Teacher::orderBy('id', 'desc')->paginate(8);
        return view('frontend.pages.team.index', compact('teachers'));
    }

    public function gallery()
    {
        return view('frontend.pages.gallery.index');
    }

    public function blog()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return view('frontend.pages.blog.index', compact('posts'));
    }
    public function blogDetail($id)
    {
        $post = Post::findOrFail($id);
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('frontend.pages.blog.detail', compact('post', 'posts'));
    }

    public function contact()
    {
        return view('frontend.pages.contact.index');
    }

    public function apply()
    {
        return view('frontend.pages.apply.index');
    } 

    /*----------------------------------------
     Backend-end Pages=====================
    ======================================= */

    public function dashboard()
    {
        $unread = Message::where('seen', '0')->get();
        return view('backend.pages.dashboard.index', compact('unread'));
    }
  

    public function settings()
    {
        return view('backend.pages.settings.index');
    }

    public function updateProfile(Request $request, $id)
    {
    $password = '';
    $user = User::findOrFail($id);
    if ($request->password && $request->confirm_password) {
        if ($request->password == $request->confirm_password) {
            $password = bcrypt($request->password);
        } else {
            return redirect()->back()->with('error', 'Password does not matched');
        }
    }

    if ($request->has('profile_image')) {

        if (!empty($user->profile_image)) {
            unlink(public_path('/uploads/profiles/' . $user->profile_image ));
        }
        $user_id = Auth::user()->id;

        $file = $request->file('profile_image');
        $extention = $file->getClientOriginalExtension();
        $fileName = time() . rand(99, 99) . '.' . $extention;
        $file->move('uploads/profiles/', $fileName );


        $user->user_name = $request->user_name;
        $user->name = $request->name;
        if ($password != '') {
            $user->password = $password;
        }
        $user->profile_image = $fileName;
        $user->email = $request->email;  
        $user->update();

        if ($user->update()) {

            return redirect()->back()->with('success', 'User has been updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    } else {
        $user->user_name = $request->user_name;
        $user->name = $request->name;
        $user->profile_image = '';
        if ($password != '') {
            $user->password = $password;
        }
        $user->email = $request->email; 
        $user->update();
        if ($user->update()) {

            return redirect()->back()->with('success', 'User has been updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

}
}
