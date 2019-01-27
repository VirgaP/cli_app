<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class deleteClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

        protected $signature = 'client:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete client form database';

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
        $model = config('addclient.model');

        $email = $this->ask('Enter client email');

        $client = $model::where('email', $email)->first();

        if ($this->confirm('Are you sure you want to remove "'.$client->firstname.' '.$client->lastname.'"?')) {
            $client->delete();
            $this->info('Client "'.$client->firstname.' '.$client->lastname.'" has been deleted.');
        }
    }
}
