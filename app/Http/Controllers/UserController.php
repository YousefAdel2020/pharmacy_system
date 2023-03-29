<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

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
    public function store(StoreUserRequest $request)
    {
        $data = $request->validate();
        return view('user.index', ['Users' => $data]);
    }
    public function update(User $user, UpdateUserRequest $request)
    {
        $data = $request->validate();
        $user->update($data);
        return redirect()->route("posts.index");
    }
}
