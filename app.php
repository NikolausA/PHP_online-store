<?php
require_once $_SERVER['DOCUMENT_ROOT']."/PHP_online-store/autoload.php";

try{
    App::init();
}
catch (PDOException $e){
    echo "DB is not available";
    var_dump($e->getTrace());
}
catch (Exception $e){
    echo $e->getMessage();
}
