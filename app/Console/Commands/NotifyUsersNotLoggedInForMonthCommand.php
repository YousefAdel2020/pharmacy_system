<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use App\Mail\UserNotification;

class NotifyUsersNotLoggedInForMonthCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users-not-logged-in-for-month';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to users who didn’t login from the past month';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        // Get all users who didn't log in for the past month
        $users = User::where('last_login_at', '<', now()->subMonth())
            ->where('email', '<>', null)
            ->get();

        foreach ($users as $user) {
            // Send email notification
            Mail::send(
                'emails.miss-you',
                ['user' => $user],
                function ($message) use ($user) {
                    $message->to($user->email);
                    $message->subject('We Miss You!');
                }
            );
        }

        $this->info('Email notifications sent successfully  to ' . count($users) . ' users.');
    }
}
