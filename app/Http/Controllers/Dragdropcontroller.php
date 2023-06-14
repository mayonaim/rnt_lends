<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dragdropcontroller
{
    //render html form upload
    public function home()
    {
        return view('Admin.home');
    }

    // upload file from client to server
    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().rand(1,100).'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        return response()->json(['success'=> $imageName]);
    }

}