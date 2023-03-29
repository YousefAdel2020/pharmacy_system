<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $Users = [
            [
                'id' => 1,
                'name' => 'Mahmoud',
                'email' => 'Mahmoud@gmail.com',
                'is_insured' => 'true'
            ],
            [
                'id' => 2,
                'name' => 'Omar',
                'email' => 'Omar@gmail.com',
                'is_insured' => 'false'
            ],
            [
                'id' => 3,
                'name' => 'Shehab',
                'email' => 'Shehab@gmail.com',
                'is_insured' => 'false'
            ],
        ];
        return view('user.index', ['Users' => $Users]);
    }
    public function create()
    {
        return view('users.create');
    }
}
