<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class NewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'maked command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::find()->restore();
    }
}
