<?php
include $_SERVER['DOCUMENT_ROOT']."/config.php";
class DB
{
    protected static $_instance = null;

    private $db; // Ресурс работы с БД


    public static function instance()
    {
        if (self::$_instance == null) {
            $opt = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => TRUE
            ];
            $connectString = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
            self::$_instance = new PDO($connectString, DB_USER, DB_PASS, $opt);
        }
        return self::$_instance;
    }

    /*
     * Запрещаем копировать объект
     */
    private function __construct() {}
    private function __sleep() {}
    private function __wakeup() {}
    private function __clone() {}


    private static function sql($sql, $args = []) {
        echo "<pre>".$sql."</pre>";
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    public static function Select($sql, $args = []) {
        return self::sql($sql, $args)->fetchAll();
    }

    public static function getRow($sql, $args = []) {
        return self::sql($sql, $args)->fetch();
    }

    public static function insert($sql, $args = []) {
        self::sql($sql, $args);
        return self::instance()->lastInsertId();
    }

    public static function update($sql, $args = []) {
        $stmt = self::sql($sql, $args);
        return $stmt->rowCount();
    }

    public static function delete($sql, $args = []) {
        $stmt = self::sql($sql, $args);
        return $stmt->rowCount();
    }

}
?>
