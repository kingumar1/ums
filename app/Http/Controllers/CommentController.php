<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, Post $post){
        $rules = ['name'=>'required|max:255', 'content'=>'required'];
        $error = Validator::make($request->all(),$rules);
//        $data = $request->validate(['name'=>'required|max:255', 'content'=>'required']);
        if ($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }

        $post->comments()->create($request->all());

        return response()->json(['data'=>$request->all()]);


    }
}
