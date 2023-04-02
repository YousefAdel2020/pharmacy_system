<?php

namespace App\Console\Commands;

use App\Models\User;
use Hash;
use Illuminate\Console\Command;
use Illuminate\Console\Concerns\InteractsWithIO;
use Symfony\Component\Console\Input\InputOption;

class CreateAdminUser extends Command
{
    use InteractsWithIO;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin  {email} {password} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //

        $email = $this->argument('email');
        $password = $this->argument('password');

        $user = new User();

        $user->email = $email;
        $user->password = Hash::make($password);

        $user->name = 'Admin';
        $user->typeable_type = 'admin';
        $user->typeable_id = '0';
        $user->is_insured = '1';


        $user->assignRole('admin');

        $user->save();


        $this->info("Admin user created successfully.");
    }
    protected function getOptions()
    {
        return [
            ['email', 'e', InputOption::VALUE_REQUIRED, 'The email address of the admin user'],
            ['password', 'p', InputOption::VALUE_REQUIRED, 'The password for the admin user'],
        ];
    }
}
