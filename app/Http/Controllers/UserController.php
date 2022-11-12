<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Material;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    // public function __construct(){
    //     $this->middleware('auth:api', ['except' => ['users.login']]);
    // }

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

    public function register( Request $request){
       
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:2|max:100',
            'company' => 'required|string|min:2|max:100',
            'contact_company' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'level' => 'required|string|max:100|unique:users',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $token = 123456;

        $user = User::create([
                'nama' => $request->nama,
                'company' => $request->company,
                'company_contact' => $request->company_contact,
                'email' => $request->email,
                'level' => $request->level,
                'token' => Hash::make($token),
            ]);

        return response()->json([
            'status'  => 200,
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['message' => 'ivalid E-mail or password','status' => '401'], 401);
        }

        return $this->respondWithToken($token);
      

    }

    public function logout(){
        auth()->logout();
        return response()->json(
            ['message' => 'User successfully logged out.','status'=>'200']
        );
    }

    public function refresh(){
        return $this->respondWithToken(auth());
    }

    public function profile(){
        return response()->json(auth()->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
