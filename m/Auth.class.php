<?php
include $_SERVER['DOCUMENT_ROOT']."/lib/db.class.php";

class Auth
{

    function checkUser($login, $pass) {
        $user = db::getInstance()->Select('SELECT * FROM `users` WHERE login = :login and password = :pass', ['login'=>$login, 'pass'=>$pass]);
            if($user){
                return true;
            }
    }

    function checkLogin($login){
        $user = db::getInstance()->Select('SELECT * FROM `users` WHERE login = :login', ['login'=>$login]);
        if($user){
            return true;
        }
    }

    function addUser($login, $pass){
        return db::getInstance()->insert('INSERT INTO `user` (login, password) VALUES ($login, $pass)');
    }

}