<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function index(){

       $postsFromDB = Post::all();  // Post دا اسم ال model بتاعي
                                    // all() دي بتستعلم علي كل الداتا
        return view('posts.index' , ['myposts' => $postsFromDB]);
    }

//    =================  Show  ==================
//    public function show($id){
//        $singlePost = Post::findOrFail($id);   // Post دا اسم ال model بتاعي
//            return view('posts.show', ['myposts' => $singlePost]);
//    }
    // طريقه اخري يال Route Model Binding
    // ال Post دا هو ال modal بتاعي
    public function show(Post $showPost){  // لازم يكون نفس الاسم اللي موجود فال route وهو showPost
        return view('posts.show', ['myposts' => $showPost]);
    }

    //    =================  Create  ==================
    public function create(){
        $users = User::all();   // دا عشان احط فيه ال posted by
        return view('posts.create' , ['myusers' => $users]);  // دا اسم الملف اللي هروحله
    }

    //    =================  Store  ==================
//    public function store(){
////        $data = request()->all();
//
//        $title       = request()->Title;        // title دا ال name بتاع الحقل اللي ف ملق create.blade.php
//        $description = request()->Description;  // description دا ال name بتاع الحقل اللي ف ملق create.blade.php
//        $userId      = $request->userID;        // userID دا ال name بتاع الحقل اللي ف ملق create.blade.php
//
////        $post = Post::create([
////            'title'=>$title,                title => هنا دا اسم العمود اللي فالداتابيز
////            'description'=>$description     description => هنا دا اسم العمود اللي فالداتابيز
////        ]);
//        $post = new Post;
//        $post->title = $title;
//        $post->description = $description;
//        $post->save();
//        return redirect(route('posts.index'));
////        return redirect()->route('posts.index');    طريقه تانيه
//    }

//طريقه اخري
    public function store(Request $request){

        $title       = $request->Title;              // title دا ال name بتاع الحقل اللي ف ملق create.blade.php
        $description = $request->Description;        // description دا ال name بتاع الحقل اللي ف ملق create.blade.php
        $userId      = $request->userID;            // userID دا ال name بتاع الحقل اللي ف ملق create.blade.php

        $post = new Post;
        $post->title       = $title;          // title => هنا دا اسم العمود اللي فالداتابيز
        $post->description = $description;   // description => هنا دا اسم العمود اللي فالداتابيز
        $post->user_id     = $userId;        // user_id => هنا دا اسم العمود اللي فالداتابيز
        $post->save();
        return redirect(route('posts.index'));  // posts دي اللي موجوده فال route بتاع web.php
    }

//    =================  Edit  ==================
//    public function edit($myid){
//        $editPost = Post::findOrFail($myid);   // Post دا اسم ال model بتاعي
//        return view('posts.edit', ['myeditpost' => $editPost]);
//    }

    // طريقه اخري يال Route Model Binding
    // ال Post دا هو ال modal بتاعي
    public function edit(Post $showPost){  // لازم يكون نفس الاسم اللي موجود فال route وهو showPost
        $users = User::all();
        return view('posts.edit', ['myeditpost' => $showPost , 'users'=>$users]);
    }

//    =================  Update  ==================
    public function update($myid , Request $request){
        $updatePost = Post::findOrFail($myid);   // Post دا اسم ال model بتاعي
        $updatePost->update([
            // title => هنا دا اسم العمود اللي فالداتابيز
            'title'       => $request->Title,              // title دا ال name بتاع الحقل اللي ف ملق create.blade.php
            'description' => $request->Description,  // Description دا ال name بتاع الحقل اللي ف ملق create.blade.php
            'user_id'     => $request->userID,           // userID دا ال name بتاع الحقل اللي ف ملق create.blade.php
        ]);
        return redirect(route('posts.index'));  // posts دي اللي موجوده فال route بتاع web.php
    }

    //    =================  Destroy  ==================
    public function destroy($myid){
//        $destroyPost = Post::findOrFail($myid);
//        $destroyPost->delete();
//        طريفه تانيه
        Post::where('id' , $myid)->delete();
        return redirect(route('posts.index')); // posts دي اللي موجوده فال route بتاع web.php
    }
}
