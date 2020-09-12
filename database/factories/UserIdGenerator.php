<?php

use Illuminate\Foundation\Auth\User;

class UserIdGenerator{
    static public function generateUserID(){
        $user = User::all()->pluck('id')->toArray();
        return $user;
    }
}
