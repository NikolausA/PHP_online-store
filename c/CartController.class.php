<?php
require_once "../m/Goods.class.php";
class CartController extends Controller
{
    public $view = 'cart';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title = 'CART';
    }

//    function setMenu()
//    {
//        parent::setMenu(); // TODO: Change the autogenerated stub
//    }

	function showGoods($data){
        $obj = new Cart;
        return $obj->showCart();
	}


}

//site/index.php?path=index/test/5