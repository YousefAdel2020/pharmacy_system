<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\DataTables\UsersDataTable;
use App\Models\Doctor;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Auth;

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

        return view('users.create', compact('roles'));
    }

    public function profile()
    {
        $user = Auth::user();
        $role = $user->roles()->first();
        $getUser = User::find($user->id);
        $userType = null;
        $myRoute = null;

        if ($getUser->typeable_type == 'App\Models\Doctor') {
            $userType = Doctor::where('email', $getUser->email)->first();
        } elseif ($getUser->typeable_type == 'App\Models\Pharmacy') {
            $userType = Pharmacy::where('email', $getUser->email)->first();
        }
        
        switch($role->name) {
            case "admin":
                $myRoute = route('users.update', $user->id);
                break;

            case "doctor":
                $myRoute = route('doctors.update', $userType->id);
                break;

            case "pharmacy":
                $myRoute = route('pharmacies.update', $userType->id);
                break;
        }

        return view('profile')->with([
            'user' => $getUser,
            'role'=> $role->name ,
            'userType'=>$userType,
            'myRoute'=> $myRoute
        ]);
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
    public function update(UpdateUserRequest $request, $id)
    {
        $input = $request->only(['name','password','email']);
        $user = User::find($id);

        $user->update([
            'name'=> $input['name'],
            'email'=> $input['email'],
        ]);
        return back();
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
