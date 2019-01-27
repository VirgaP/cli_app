<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Validator;

class updateClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'client:update
//                            {client : The Id of the client}';
    protected $signature = 'client:update';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update existing client information';

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
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle(Request $request)
    {
        $model = config('addclient.model');

        $email = $this->ask('Enter client email');

        $client = $model::where('email', $email)->first();

        $toUpdate = $this->choice(
            'Which client details woudl you like to update?',
            ['firstname', 'lastname', 'email', '1st phone number', '2nd phone number', 'comment']
        );

        switch ($toUpdate){
            case 'firstname':
                $client->firstname = $request->get('firstname');
                $firstname = $this->validate_ask('Enter new client\'s firstname', ['firstname' => config('addclient.validation_rules.firstname')]);
                $client->firstname = $firstname;
                $this->info('Client "'.$client->firstname.' '.$client->lastname.'" has been updated.');
                break;
            case 'lastname' :
                $client->lastname = $request->get('lastname');
                $lastname = $this->validate_ask('Enter new client\'s lastname', ['lastname' => config('addclient.validation_rules.lastname')]);
                $client->lastname = $lastname;
                $this->info('Client "'.$client->lastname.'" has been updated.');
                break;
            case 'email' :
                $client->email = $request->get('email');
                $email = $this->validate_ask('Enter new client\'s email', ['email' => config('addclient.validation_rules.email')]);
                $client->email = $email;
                $this->info('Client\'s e-mail"'.$client->email.'" has been updated.');
                break;
            case '1st phone number'  :
                $client->phoneNumber1 = $request->get('phoneNumber1');
                $phoneNumber1 = $this->validate_ask('Enter new client\'s 1st phone number', ['phoneNumber1' => config('addclient.validation_rules.phoneNumber1')]);
                $client->phoneNumber1 = $phoneNumber1;
                $this->info('Client\'s 1st phone number"'.$client->phoneNumber1.'" has been updated.');
                break;
            case '2nd phone number'  :
                $client->phoneNumber2 = $request->get('phoneNumber2');
                $phoneNumber2 = $this->validate_ask('Enter new client\'s 2nd phone number', ['phoneNumber2' => config('addclient.validation_rules.phoneNumber2')]);
                $client->phoneNumber2 = $phoneNumber2;
                $this->info('Client\'s 2nd phone number"'.$client->phoneNumber2.'" has been updated.');
                break;
            case 'comment' :
                $client->comment = $request->get('comment');
                $comment = $this->validate_ask('Enter new comment', ['comment' => config('addclient.validation_rules.comment')]);
                $client->comment = $comment;
                $this->info('Comment"'.$client->comment.'" has been updated.');
                break;

            default:
                $this->info('Nothing to update');
                break;

        }
        $client->save();
        $this->info('Client updated!');

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
