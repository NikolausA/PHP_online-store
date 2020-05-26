<?php
require_once ('../lib/db.class.php');

class Cart
{
    private $db;

    function __construct()
    {
        $this->db = DB::instance();
    }

    function showCart(){
        $s = 'SELECT `title`, `price`, `count` FROM `cart`';
        return  $this->db->Select($s, []);
    }

    function addToCart($id) {
        if($_POST['id']){
            $id = $_POST['id'];
            $s = 'SELECT * FROM `cart` WHERE id = :id';
            $itemInCart = $this->db->Select($s, ['id'=>$id]);
            if(isset($itemInCart)){
                $count = $itemInCart['count'] + 1;
                $s = 'UPDATE `cart` SET count = $count WHERE id_good = :id';
                return $this->db->update($s, ['id'=>$id]);
            } else {
                $s = 'SELECT * FROM `goods` WHERE id = :id';
                $item = $this->db->Select($s, ['id'=>$id]);
                $s = 'INSERT INTO `cart` (item_id, title, price, count) VALUES (:id, :title, :price, :count)';
                return $this->db->insert($s, ['id'=>$id, 'title'=>item['title'], 'price'=>item['price'], 'count'=>1]);
            }
        }


    }
}