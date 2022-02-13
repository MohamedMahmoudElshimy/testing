<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Axpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire users every 5 minute automatically';

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
     * @return int
     */
    public function handle()
    {
        $users = User::where('expire', 0)->get();
        foreach ($users as $user) {
          // code...
          $user->update(['expire' => 1]);
        }
    }
}
