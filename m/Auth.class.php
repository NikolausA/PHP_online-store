<?php
require_once ('../lib/db.class.php');

class Auth
{
    private $db;

    function __construct()
    {
        $this->db = DB::instance();
    }

    function checkUser($login, $pass) {
        $s = 'SELECT * FROM `users` WHERE login = :login and password = :pass';
        $user = $this->db->Select($s, ['login'=>$login, 'pass'=>$pass]);
            if($user){
                return true;
            }
    }

    function checkLogin($login){
        $s = 'SELECT * FROM `users` WHERE login = :login';
        $user = $this->db->Select($s, ['login'=>$login]);
        if($user){
            return true;
        }
    }

    function addUser($login, $pass){
        $s = 'INSERT INTO `user` (login, password) VALUES ($login, $pass)';
        return $this->db->insert($s, []);
    }

}