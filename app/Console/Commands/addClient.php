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
//    protected $signature = 'add:client {firstname} {lastname} {email} {phoneNumber1} {phoneNumber2} {comment}';

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

//        $firstname = $this->argument('firstname');
//        $lastname = $this->argument('lastname');
//        $email= $this->argument('email');
//        $phoneNumber1 = $this->argument('phoneNumber1');
//        $phoneNumber2 = $this->argument('phoneNumber2');
//        $comment = $this->argument('comment');


//        Storage::put("clients.csv", $this->arguments());
//        Storage::append('clients', $this->argument('firstname'));


//        Client::create(compact('firstname', 'lastname', 'email', 'phoneNumber1', 'phoneNumber2' ,'comment'));

//        $file = public_path('client_info.csv');
//        $delimiter = ',';
//        if(!file_exists($file) || !is_readable($file))
//            return false;
//
//        $header = null;
//        $data = array();
//
//        if (($handle = fopen($file,'r')) !== false){
//            while (($row = fgetcsv($handle, 1000, $delimiter)) !==false){
//                if (!$header)
//                    $header = $row;
//                else
//                    $data[] = array_combine($header, $row);
//            }
//            fclose($handle);
//        }
//
//        $meta_descArr = $data;
//        for ($i = 0; $i < count($meta_descArr); $i ++){
//            Client::firstOrCreate($meta_descArr[$i]);
//        }
//        echo "Clients data added"."\n";
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
