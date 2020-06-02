<?php
include $_SERVER['DOCUMENT_ROOT']."/lib/db.class.php";

class Goods
{

    function getGoods() {
        return db::getInstance()->Select('SELECT * FROM goods');
    }
}