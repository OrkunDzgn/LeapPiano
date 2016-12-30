<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function checkUserLogin($user_email, $password) {
        $users=\App\User::all()->where('email', $user_email);


        foreach ($users as $user){
            if(!empty($users)){
                if(\Hash::check($password, $user->password)){
                    return ['status' => 'Login successful',
                            'statusBool' => true,
                            'userid' => $user->id,
                            'name' => $user->name
                    ];
                }
                else {
                    return ['status' => 'Credentials does not match',
                            'statusBool' => false
                    ];
                }
            }
        }
        return ['status' => 'This email does not exist',
                            'statusBool' => false
                    ];
    }
}
        