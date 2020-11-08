<?php

namespace App\Components;

use Exception;


class Migration
{
    protected $con;

    public function __construct()
    {
        $this->con = (new Db)->getConnection();
    }


    public function tableExist($name): bool
    {
        $results = $this->con->query("SHOW TABLES LIKE '$name'");

        return $results->rowCount() > 0 ? true : false;
    }


    public function deleteTable($name)
    {
        try {
            $this->con->query("DROP TABLE $name");
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }


}
