<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    public function index(){
        $user = Auth::user();
        $search = request("search");

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
        "user" => $user
    ]);
  }

  public function courses(){

       


    $courses = Course::all();

     //$courses = Course::orderBy("title", "desc")->get();
     //$modules = Course::where("id", 1)->get();
     //$courses = Course::latest()->get();
     return view("courses.view", [
      "courses"=>$courses
     ]);
 }

 public function create(){
    
    $userAuth = Auth::user();
    $users = User::where("email", $userAuth->email)->first();
   
   
    if(!$users){
        $user = new User;
        $user->name = Auth::user()->nickname;
        $user->email = Auth::user()->email;
        $user->save();
    }else{
        
        
    }
    
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
    
    return view("courses.show", ["course" => $course, "courseOwner" => $courseOwner]);
    
 }

 public function dashboard(){
    $userAuth = Auth::user();
    $myUser = User::where("email", $userAuth->email)->first();

    $courses = $myUser->courses;

    return view("courses.dashboard", ["courses" => $courses]);

 }

 public function destroy($id){

    Course::findOrFail($id)->delete();

    return redirect("/dashboard")->with("msg", "Course deleted with success");
 }

 public function edit($id){
    $course = Course::findOrFail($id);

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
}