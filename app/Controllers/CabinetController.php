<?php

namespace App\Controllers;

use App\Models\User;

class CabinetController
{

    public function index()
    {
        User::isAuthorized();

        require VIEW_ROOT . "cabinet/index.php";
    }


}
