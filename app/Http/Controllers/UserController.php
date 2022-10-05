<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Material;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users_all(){

        $total = Material::select('qyt')->get();

        $user = User::all()->all();
        return response()->json([
            [
                'data' => $user,
                'total' => $total
            ]
        ]);
    }

    public function create( Request $request){
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    
    }

    public function login(){

    }
}
