<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Http\Requests\Api\SanctumTokenRequest;
use App\Http\Resources\UserResource;
use App\Jobs\SendVerifyEmailJob;
use App\Models\User;
use App\Models\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;

class AuthController extends Controller
{
     public function getToken(SanctumTokenRequest $request)
    {

        $user = User::where('email', $request->email)
        ->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // $user->update([
        //     "last_login" => now()
        // ]);


        return $user->createToken($request->device_name)->plainTextToken;

    }
    public function register(RegisterUserRequest $request)
    {

        $data = $request->validate();
        User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password' => Hash::make($data['password']),

        ]);
        if ($request->hasFile("profile_image")) {
            $path = $request->file("profile_image")
                ->store('', ["disk" => "imgs"]);

            $data["profile_image"] = $path;
        }
         $client = Client::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'gender'=> $data['gender'],
            'password'=> $data['password'],
            'date_of_birth'=> $data['date_of_birth'],
            'phone' => $data['phone'],
            'national_id'=> $data['national_id'],
        ]);

        SendVerifyEmailJob::dispatch($client);
        
        return new UserResource($client);
    }
    

}
