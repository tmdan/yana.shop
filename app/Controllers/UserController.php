<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function actionList()
    {
        $array = ["firstname" => "yana", "lastname" => "something", "email" => "ssfsf", "password", "phone" => "3554454454654"];

        $errors = [];

        if (!User::checkPhone($array['phone'])) $errors[] = "Введи норм номер бро";

        if(empty($errors)) User::create($array['$array'], $array['lastname'], $array['email'],'sdfsdf');


        require "./app/View/users/list.php";
    }

}
