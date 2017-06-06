<?php

require_once '../App/autoload.php';

use Lib\Router;

$router = Router::getInstance();

$router-> setPrefix('/mvc/web/') -> addRoute('home', 'utilisateurs', 'user', 'list')-> run();

