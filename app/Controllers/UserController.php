<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function actionList ()
    {
        echo "вывод всех пользователей<br>";
        $usersList = User::all();

        print_r($usersList);
        //return true;
    }

}
