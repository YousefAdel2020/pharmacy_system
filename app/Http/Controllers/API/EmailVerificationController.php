<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Models\Client;
use Illuminate\Contracts\Filesystem\Cloud;

class EmailVerificationController extends Controller
{
    use VerifiesEmails;
    
    
    public function verify(Request $request)
	{
		$userID = $request['id'];
		$user = Client::findOrFail($userID);
		$date = date("Y-m-d g:i:s");
		$user->email_verified_at = $date; 
		$user->save();
		//$user->greetingUser();
		return response()->json('Email verified!');
	}
    public function resend(Request $request)
	{

		$user = Client::find($request->id);
		if ($user->email_verified_at) {
		return response()->json('User already have verified email!', 422);
	}
		$user->sendEmailVerificationNotification();
		return response()->json('The notification has been resubmitted');
	}
    public function sendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Verification email sent!'
        ]);
    }
    public function verifyLink(Request $request)
	{
		$userID = $request->id;
		$user = Client::find($userID);
        $user->sendApiEmailVerificationNotification();
        return response()->json([
        	'Verfication Email' => 'If you didn\'t receive any verification Email click '.route('verificationapi.resend', $user->id),
        	'Data' => $user,
            ], 403);
	}
}
