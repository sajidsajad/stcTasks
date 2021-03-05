<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function task1(Request $request, $fmt, $id){

        if($fmt == 1){
            return "sajid";
        }
        $user = User::find($id);
        if(!$user){
            return response()->json(["message" => "User not found"], 200);
        }
        return response()->json(["user" => $user],200);
    }

    
}
