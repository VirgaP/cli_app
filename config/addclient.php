<?php

use App\Rules\PhoneNumber;

return [
    /*
    * The class name of the client model to be used.
    */
    'model' => 'App\Client',
    /*
    * The validation rules to check for user model input.
    */
    'validation_rules' => [
        'firstname'     => 'string|min:1|max:255',
        'lastname'     => 'string|min:1|max:255',
        'email'    => 'string|email',
        'phoneNumber1' => ['required', new PhoneNumber],
        'phoneNumber2' => [new PhoneNumber],
        'comment' => 'string|required'
    ],
];