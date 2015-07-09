<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$name = $this->ask('What is your name?');
    	$email = $this->ask('What is your email?');
    	$password = $this->ask('What is your password?');
    	
    	$id = \App\Model\User::create([
    			'name' => $name,
    			'email' => $email,
    			'password' => bcrypt($password),
    	]);
    	
    	if($id)
    		$this->info('user id '.$id.' create is sucessful');
    	else
    		$this->error('Something went wrong!');
    }
}
