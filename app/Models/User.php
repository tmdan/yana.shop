<?php

namespace App\Models;

use App\Components\Db;

class User {

    public static function all()
    {
        $connect = (new Db)->getConnection();
        $results = $connect->query("SELECT id, firstname, lastname, email FROM user");
        //$results->setFetchMode(PDO::FETCH_ASSOC);

        $usersList = array();

        $i = 0;
        while ($row = $results->fetch())
        {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['firstname'] = $row['firstname'];
            $usersList[$i]['lastname'] = $row['lastname'];
            $usersList[$i]['email'] = $row['email'];
            $i++;
        }
        return $usersList;
    }


    public static function create ($firstname, $lastname, $email, $password)
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
