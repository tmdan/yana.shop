<?php

namespace App\Models;

use App\Components\Db;
use PDO;

/**
 * Class User
 * @package App\Models
 */
class User
{

    /**
     * @return array
     */
    public static function all()
    {
        $connect = (new Db)->getConnection();
        $results = $connect->query("SELECT id, firstname, lastname, email FROM user");
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $password
     * @return bool
     */
    public static function create($firstname, $lastname, $email, $password)
    {
        $connect = (new Db)->getConnection();

        $sql = "INSERT INTO user (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
        $result = $connect->prepare($sql);
        $result->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $result->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute(); //выполнение запроса
    }


    //валидация имени пользвателя
    public static function checkFirstName($reg_name)
    {
        return preg_match('/^[а-яА-ЯёЁa-zA-Z]{2,15}$/u', $reg_name);
    }


    public static function checkPhone($phone)
    {
        return preg_match('/^375[25|44|29|33][0-9]{7}$/', $phone);
    }
}
