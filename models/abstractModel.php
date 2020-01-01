<?php

namespace Kfframework;

abstract class abstractModel {

    protected $db;
    protected $entity;

    public function __construct() {
        $this->db = DataBase::get()->getPDO();
    }

    public function getTable() {
        return $this->table;
    }

    public function getEntity() {
        return $this->entity;
    }

    /**
     * Recupère toutes les catégories
     * @return Array
     */
    public function selectAll() {

        if (!empty($this->entity->getTable())) {
            return $this->db->query('SELECT * from ' . $this->entity->getTable());
        }
        throw new Exception("Attention la table du modèle n'a pas été trouvé. N'oubliez pas de la créer dans le modèle (entity).");
    }

    public function findById($id) {
        //    var_dump('SELECT * from ' . $this->entity->getTable().' where '.$this->entity->getPrimaryKey().' = '.$id);
        if (!empty($this->entity->getTable())) {
            return $this->db->query('SELECT * from ' . $this->entity->getTable() . ' where ' . $this->entity->getPrimaryKey() . ' = ' . $id);
        }
    }

    /**
     * Insert des données en BDD
     * @param Array $data
     * @return int
     */
    public function insert($data) {
        $col = [];
        $val = array();
        $req = "insert into " . $this->entity->getTable() . " (";
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                array_push($col, $key);
                array_push($val, "'$value'");
            }
        }
        $req .= implode(',', $col) . ') ';
        $req .= " values(". implode(",", $val) . ")";
      //   var_dump($req);die;
         return $this->db->exec($req);
       /*  var_dump($req);
        die;*/
    }

}
