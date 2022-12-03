<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Mail\MailSend;
use App\Mail\MailPassword;
use Illuminate\Support\Facades\Mail;
use App\Material;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function registers(Request $request){

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:2|max:100',
            'company' => 'required|string|min:2|max:100',
            'contact_company' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:users',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $token = Str::random(6);
        $user = User::create(
            [
                'nama' => $request->input('nama'),
                'company' => $request->input('company'),
                'company_contact' => $request->input('contact_company'),
                'email' => $request->input('email'),
                'img_profil' => "cocacola.jpg",
                'status' => false,
                'level' => "employee",
                'token' => $token,
                'password' => false
            ]);

            $details = [
                'token' => $token,
                'nama'  => $request->nama,
            ];

            Mail::to($request->email)->send(new MailSend($details));
            // Mail::send(['text'=>'emails.notif'],['name','Ripon Uddin Arman'],function($message){
            //     $message->to('stenly.samberi@outlook.co.id')->subject("Email Testing with Laravel");
            //     $message->from('stenly.samberi@outlook.co.id','Creative Losser Hopeless Genius');
            // });
            

        return response()->json([
            'status'  => 200,
            'message' => 'User successfully registered',
        ], 200);
    
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['message' => 'incorect E-mail & Password','status' => '401'], 200);
        }

        return $this->respondWithToken($token);
      

    }

    public function register_verify(){
        
        $users = User::where([['email','=', request('email')],['token','=',request('token')]])->get();

        if(count($users)>0){
            $password = Str::random(6);
            User::where('email',request()->email)->update([
                    'status'=> true,
                    'password' => Hash::make($password)
                    ]);

                    $details = [
                        'password' => $password,
                        'email'  => request('email'),
                    ];
        
                    Mail::to(request()->email)->send(new MailPassword($details));

           return response()->json([
            'status' => 200,
            'message'  => 'E-email is verify.'
        ]);
        }else{
            return response()->json([
                'status' => 400,
                'message'  => 'Token failed.'
            ]);
        }
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
            'status' => 200

            // 'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
