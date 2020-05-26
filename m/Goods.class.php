<?php
require_once ('../lib/db.class.php');

class Goods
{
    private $db;

    function __construct()
    {
        $this->db = DB::instance();
    }

    function getGoods() {
        $s = 'SELECT * FROM `goods`';
        return  $this->db->Select($s, []);

    }
}