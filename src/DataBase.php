<?php


namespace Kfframework;

/**
 * Description of DataBase
 *
 * @author SIO
 */
class DataBase {

    public static $con;

    public static function get() {
        if (!isset(self::$con)) {
            self::$con = new Database;
        }

        return self::$con;
    }

    private $pdo;

    private function __construct() {
        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=bloggy', 'root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getPDO() {
        return $this->pdo;
    }

    public function kill() {
        if (isset($this->pdo)) {
            $this->pdo->close();
        }
    }

}
