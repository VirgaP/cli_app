<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;

class findClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:find';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find and retrieve client form the database';

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

        if ($client) {
            $this->line('Client record found: "'.$client->firstname.' '.$client->lastname.' '.$client->email.' '.$client->phoneNumber1.' '.$client->phoneNumber2.' '.$client->comment.'" ');

        } else {
            $this->error('No client record matching request found');
        }

    }
}
