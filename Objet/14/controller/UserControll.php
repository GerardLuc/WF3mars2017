<?php

namespace UserCobntroller;

class UserController{
    public function listAction(){
        $user = User::findAll();
        include '../view/index.view.php';
    }

    public function editAction(){
        echo 'user:edit';
    }
}