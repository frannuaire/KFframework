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
            return $this->db->query('SELECT * from ' . $this->entity->getTable().' where '.$this->entity->getPrimaryKey().' = '.$id);
        }
    }

}
