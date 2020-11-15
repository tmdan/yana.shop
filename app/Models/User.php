<?php

namespace App\Models;

use App\Components\Db;
use PDO;

/**
 * Class User
 * @package App\Models
 */
class User {

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

        $sql="INSERT INTO user (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
        $result=$connect->prepare($sql);
        $result->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $result->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute(); //выполнение запроса
    }


    //валидации
    public static function checkName($reg_name){
        return preg_match('/^[а-яА-ЯёЁa-zA-Z]{2,15}$/u', $reg_name);
    }

    public static function checkEmail($email){
        return preg_match('/^[a-z0-9-_]{2,10}@[a-z]{3,6}.[a-z]{2,3}$/u', $email);
    }

    public static function checkPassword($password){
        return preg_match('/[a-zA-Z0-9]{5,25}/u', $password);
    }

    public static function select($email, $password)
    {
        $connect = (new Db)->getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        $result=$connect->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        return $user['id'];
    }


    public static function update ($firstname, $lastname, $email, $password)
    {
        $connect = (new Db)->getConnection();

        $user = User::select($email, $password);

        $sql = 'UPDATE user SET firstname = :firstname, lastname = :lastname, email = :email, password = :password WHERE id = $user;';
        $result=$connect->prepare($sql);
        $result->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $result->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }




}
