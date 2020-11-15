<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{

    public function list()
    {
        $array = ["firstname" => "yana", "lastname" => "something", "email" => "ssfsf", "password", "phone" => "3554454454654"];

        $errors = [];

//        if (!User::checkPhone($array['phone'])) $errors[] = "Введи норм номер бро";

        if (empty($errors)) User::create($array['$array'], $array['lastname'], $array['email'], 'sdfsdf');

        require VIEW_ROOT . "users/list.php";
    }


    public function create()
    {
        require VIEW_ROOT . "users/list.php";
    }
}
