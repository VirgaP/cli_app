<?php

namespace App\Console\Commands;

use App\Client;
use Illuminate\Console\Command;
use Validator;

class addClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:add';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new client to the database';

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
        $firstname = $this->validate_ask('Enter client firstname', ['firstname' => config('addclient.validation_rules.firstname')]);
        $lastname = $this->validate_ask('Enter client lastname', ['lastname' => config('addclient.validation_rules.lastname')]);
        $email = $this->validate_ask('Enter client email', ['email' => config('addclient.validation_rules.email')]);
        $phoneNumber1 = $this->validate_ask('Enter client 1st phonumber', ['phoneNumber1' => config('addclient.validation_rules.phoneNumber1')]);
        $phoneNumber2 = $this->validate_ask('Enter client 2nd phonumber', ['phoneNumber2' => config('addclient.validation_rules.phoneNumber2')]);
        $comment = $this->validate_ask('Enter comment about client', ['comment' => config('addclient.validation_rules.comment')]);

        $model = config('addclient.model');
        $client = new $model();
        $client->firstname = $firstname;
        $client->lastname = $lastname;
        $client->email = $email;
        $client->phoneNumber1 = $phoneNumber1;
        $client->phoneNumber2 = $phoneNumber2;
        $client->comment = $comment;
        $client->save();
        $this->info('New client added!');

    }

    public function validate_ask($question, $rules)
    {
        $value = $this->ask($question);
        $validate = $this->validateInput($rules, $value);
        if ($validate !== true) {
            $this->error($validate);
            $value = $this->validate_ask($question, $rules);
        }
        return $value;
    }
    public function validateInput($rules, $value)
    {
        $validator = Validator::make([key($rules) => $value], $rules);
        if ($validator->fails()) {
            return $error = $validator->errors()->first(key($rules));
        }
        return true;
    }
}
