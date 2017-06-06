<?php

namespace Model;

class User{

    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $adress;


    public function __construct(
    $firstname = null;
    $lastname = null;
    $email = null;
    $adress = null;
    $id = null;){
        $this-> id = $id;
        $this-> firstname = $firstname;
        $this-> lastname = $lastname;
        $this-> email = $email;
        $this-> adress = $adress;
    }

    public function setId($id){
        $this->id = $id;
        return $this;

    }public function setFirstName($firstName){
        $this->firstName = $firstName;
        return $this;

    }public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function setAdress($adress){
        $this->adress = $adress;
        return $this;
    }

    // retourne tous els utilisateurs enregistrés en bdd

    public static function findAll(){
        $pdo = Cnx::getInstance();
        $query = 'SELECT * FROM user ORDER BY id';
        $stmt = $pdo -> query($query);
        $dbUsers = $stmt->fetchAll();
        $users =[];

        foreach ($dbUsers as $dbUsers){
            $user = new self(
                $dbUser['firstname'];
                $dbUser['lastname'];
                $dbUser['email'];
                $dbUser['adress'];
                $dbUser['id'];
            )
        }
    }
}