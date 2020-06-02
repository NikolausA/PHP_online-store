<?php
include $_SERVER['DOCUMENT_ROOT']."/lib/db.class.php";

class Cart
{

    function showCart(){
        return  db::getInstance()->Select('SELECT `title`, `price`, `count` FROM cart');
    }

    function addToCart($id) {
        if($_POST['id']){
            $id = $_POST['id'];
            $itemInCart = db::getInstance()->Select('SELECT * FROM cart WHERE id = :id', ['id'=>$id]);
            if(isset($itemInCart)){
                $count = $itemInCart['count'] + 1;
                return db::getInstance()->update('UPDATE cart SET count = $count WHERE id_good = :id', ['id'=>$id]);
            } else {
                $item = db::getInstance()->Select('SELECT * FROM goods WHERE id = :id', ['id'=>$id]);
                return db::getInstance()->insert('INSERT INTO `cart` (item_id, title, price, count) VALUES (:id, :title, :price, :count)', ['id'=>$id, 'title'=>item['title'], 'price'=>item['price'], 'count'=>1]);
            }
        }


    }
}