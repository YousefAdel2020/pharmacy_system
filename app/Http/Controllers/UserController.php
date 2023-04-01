<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{
    
    public function index(UsersDataTable $dataTable)
    {
        $users = User::orderBy('id', 'DESC')->paginate(5);
        return $dataTable->render('users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        dd($roles);

        return view('users.create', compact('roles'));
    }
    public function store(StoreUserRequest $request)
    {
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $role = $request['role'];

        $request['is_insured'] == 'on' ? $is_insured = 1 : $is_insured = 0;


        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => $role,
            'is_insured' => $is_insured,
        ]);
        // $user->assignRole($request->input('role'));
        return redirect()->route("users.index");
    }
    public function update(User $user, UpdateUserRequest $request)
    {
        $data = $request->validate();
        $user->update($data);
        return redirect()->route("users.index");
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();

        return view("users.edit", ["user" => $user, 'roles' => $roles]);
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}