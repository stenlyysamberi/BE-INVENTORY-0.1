<?php

namespace App\Http\Controllers;

use App\Material;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users_all(){

        $total = Material::select('qyt')->get()->sum();

        $user = User::all()->all();
        return response()->json([
            [
                'data' => $user,
                'total' => $total
            ]
        ]);
    }
}
