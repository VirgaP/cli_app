<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class showClients extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve list of all existing clients in the database';

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
        $clients = $model::all(['id', 'firstname', 'lastname', 'email', 'phoneNumber1', 'phoneNumber2', 'comment', 'created_at', 'updated_at'])->toArray();

        if (count($clients)) {
            $headers = ['ID', 'Firstname', 'Lastname', 'E-mail', 'Phone number 1st', 'Phone number 2nd', 'Comment', 'Created at', 'Updated at'];
            $this->info('There are total of '.count($clients).' clients:');
            $this->table($headers, $clients);
        } else {
            $this->error('No clients have been added yet');
        }
    }
}
