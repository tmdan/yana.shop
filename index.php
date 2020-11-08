<?php

require "vendor\autoload.php";
require_once 'config/const.php';

use App\Components\Router;
use App\Models\User;

$router = new Router();
$router->run();


User::all();



?>


<table border="2">
   <caption>Таблица пользователей</caption>
   <tr>
    <th>Порядковый номер</th>
    <th>Имя</th>
    <th>Фамилия</th>
    <th>Электронная почта</th>
   </tr>
    <?php  foreach ($usersList as $one_user)?>
   <tr><td><?php $one_user['id']?></td><td><?php $one_user['firstname']?></td><td><?php $one_user['lastname']?></td><td><?php $one_user['email']?></td></tr>


  </table>