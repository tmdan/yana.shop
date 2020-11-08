<?php

namespace App\Seeds;

use App\Components\Migration;


class AddUsers extends Migration
{

    public static function AddUsers($firstname, $lastname, $email, $password)
    {
        $instance = new self();

        // sql to add information in table
        $sql="INSERT INTO user (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
        $result=$instance->con->prepare($sql);
        $result->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $result->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute(); //выполнение запроса


    }
}