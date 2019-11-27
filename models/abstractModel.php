<?php

namespace Kfframework;

abstract class abstractModel {

    protected $db;
    protected $table;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        try {
            $this->db = new \PDO('mysql:host=localhost;dbname=tache', 'root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getTable() {
        return $this->table;
    }

    public function selectAll() {
        if (isset($this->table)) {
            return $this->db->query('SELECT * from ' . $this->table);
        }
    }

}
