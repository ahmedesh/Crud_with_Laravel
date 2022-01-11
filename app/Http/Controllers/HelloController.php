<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //  اقدر هنا اعمل اكتر من function واستدعيها فال web.php بدل م هناك متخضطر اعمل function ةحده بس
    public function Hi(){
        return view('hello' , ['name' => 'ali' , 'age'=>20 , 'books'=>['html,','css,','jquery'] , 'graduated'=>'2021']);
    }
}
