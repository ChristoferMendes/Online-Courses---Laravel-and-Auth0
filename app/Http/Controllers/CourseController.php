<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Course;
use App\Models\User;
use App\Models\Module;
use App\Models\Content;

class CourseController extends Controller
{
    public function index(){
        $user = Auth::user();
        $search = request("search");
        $module = Module::all();
        
        if(Auth::check()){
            $userAuth = Auth::user();
            $users = User::where("email", $userAuth->email)->first();

            if(!$users){
                $user = new User;
                $user->name = Auth::user()->name;
                $user->email = Auth::user()->email;
                $user->save();
            }
        }
        
        if($search){
            $courses = Course::where([
                ["title", "like", "%" .$search. "%"]
            ])->get();
        }else{
            $courses = Course::all();
        }

        return view('welcome', [    
        "courses" => $courses,
        "search" => $search,
        "user" => $user,
        "module" => $module
    ]);
  }

  public function courses(){
    $courses = Course::all();
    return view("courses.view", [
      "courses"=>$courses
     ]);
 }

 public function create(){
     return view("courses.create");
 }

 public function login(){
     return view("user.login");
 }

 public function register(){
     return view("user.register");
 }

 public function products(){
     $search = request("search"); // -> localhost/products?search=shirt

     return view("products", ["search" => $search]); // -> localhost/products?search=shirt
 }

 public function store(Request $request){

    $course = new Course;
    $userAuth = Auth::user();
    $myUser = User::where("email", $userAuth->email)->first();
    
   
   
    $course->title = $request->title;
    $course->descriptions = $request->descriptions;

    if($request->hasAny("")){
        $course->items = $request->items;
    }else{
        $course->items = ["Basic"];
    }
    

    //Image Upload
    if($request->hasfile("image") && $request->file("image")->isValid()){

        $requestImage = $request->image;

        $extension = $requestImage->extension();
        
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        
        $requestImage->move(public_path("img/courses"), $imageName);

        $course->image = $imageName;
    }else{
        $course->image = "event_placeholder.jpg";
    }
   
    $course->user_id = $myUser->id;
    
    $course->save();
    $goodMsg = "Course created with succes";

    return redirect("/dashboard")->with("msg", $goodMsg);
}

 public function show($id){
    $course = Course::findOrFail($id);
    $courseOwner = User::where("id", $course->user_id)->first()->toArray();
    $modules = Module::where("course_id", $id)->get();
    $contents = Content::all();

    $hasUserJoined = false;
    if(Auth::check()){
        $userAuth = Auth::user();
        $myUser = User::where("email", $userAuth->email)->first();
        $userCourses = $myUser->coursesAsParticipant;

       
        foreach($userCourses as $userCourse){
            if($userCourse['id'] == $id){
                $hasUserJoined = true;
            }
        }
    }   
    

    return view("courses.show", ["course" => $course, 
    "courseOwner" => $courseOwner, 
    "hasUserJoined" => $hasUserJoined, 
    "modules" => $modules,
    "contents" => $contents]);
    
 }

 public function dashboard(){
    $userAuth = Auth::user();
    $myUser = User::where("email", $userAuth->email)->first();

    $courses = $myUser->courses;
    $coursesAsParticipant = $myUser->coursesAsParticipant;

    return view("courses.dashboard", ["courses" => $courses, "coursesasparticipant" => $coursesAsParticipant]);

 }

 public function destroy($id){

    Course::findOrFail($id)->delete();

    return redirect("/dashboard")->with("msg", "Course deleted with success");
 }

 public function edit($id){
    $course = Course::findOrFail($id);

    $userAuth = Auth::user();
    $myUser = User::where("email", $userAuth->email)->first();

    if($myUser->id != $course->user_id){
        return redirect("/dashboard");
    }
    return view("courses.edit", compact("course"));
 }

 public function update(Request $request){

    $data = $request->all();

    if($request->hasfile("image") && $request->file("image")->isValid()){

        $requestImage = $request->image;

        $extension = $requestImage->extension();
        
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        
        $requestImage->move(public_path("img/courses"), $imageName);

        $data['image'] = $imageName;
    }else{
        $data['image'] = "event_placeholder.jpg";
    }

   Course::findOrFail($request->id)->update($data);

    return redirect("/dashboard")->with("msg", "Course " . $request->title . " edited with success");

    
 }

 public function joinCourse($id){

    $userAuth = Auth::user();
    $myUser = User::where("email", $userAuth->email)->first();

    $course = Course::findOrFail($id);

    $myUser->coursesAsParticipant()->attach($id);
    return redirect('/dashboard')->with('msg', 'Your presence is confirmed in: ' . $course->title);
 }


    public function leaveCourse($id){

        $userAuth = Auth::user();
        $myUser = User::where("email", $userAuth->email)->first();

        $course = Course::findOrFail($id);

        $myUser->coursesAsParticipant()->detach($id);
        return redirect('/dashboard')->with('msg', 'You leave with succes the: ' . $course->title);
    }

}