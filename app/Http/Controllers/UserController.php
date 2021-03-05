<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    /*
    * If fmt is set ie fmt = 1, then data will be in comma separated format
    * If fmt is not set ie fmt = 0, then data will be in json format.
    */

    public function task1(Request $request){

        $request->validate([
            'id' => 'required',
        ]); 

        $user = User::find($request->id);
        if(!$user){
            return response()->json(["message" => "User not found"], 200);
        }

        //fmt is set
        if($request->fmt == 1){
            $col = collect($user);
            $result = $col->implode(',');
            return response()->json($result,200);              
        }        
        
        //fmt is not set
        return response()->json($user,200);
    }
}