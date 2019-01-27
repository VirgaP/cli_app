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
        'firstname'     => 'required|string|min:1|max:255',
        'lastname'     => 'required|string|min:1|max:255',
        'email'=> 'required|email|max:255|unique:clients',
        'phoneNumber1' => ['required', new PhoneNumber],
        'phoneNumber2' => [new PhoneNumber],
        'comment' => 'string|required'
    ],
];