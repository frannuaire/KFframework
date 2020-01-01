<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kfframework;

/**
 * Description of Entity
 *
 * @author SIO
 */
class Entity implements \Iterator {

    protected $table;
    protected $columns;
    protected $primary;

    public function __construct() {
        $this->position = 0;
    }

    /**
     * Renvoie le nom de la table
     * @return string
     */
    public function getTable() {
        return $this->table;
    }

    /**
     * Retourne les colonnes de la base la table
     * @return Array
     */
    public function getColumns() {
        return $this->columns;
    }

    public function rewind() {
        //   var_dump(__METHOD__);
        $this->position = 0;
    }

    public function current() {
        //   var_dump(__METHOD__);
        return $this->columns[$this->position];
    }

    public function key() {
        //  var_dump(__METHOD__);
        return $this->position;
    }

    public function next() {
        //  var_dump(__METHOD__);
        ++$this->position;
    }

    public function valid() {
        //  var_dump(__METHOD__);
        return isset($this->columns[$this->position]);
    }
    
    /**
     * Cherche dans les colonnes la clef primaire et la Retourne.
     * @return string
     */
    public function setPrimaryKey(){
        $position=0;
        
        foreach ($this->columns->getColumns() as $col) {   
           
            if(count($col['options'])>0){
                if (array_key_exists('primary', $col['options'])) {   
                    $this->primary=  $col['options']['primary'];
                    return $this->primary;
                }
            }
            $position++;
        }
    }
    public function getPrimaryKey(){
        return $this->primary;
    }
    
        const STRING = 'text';
    const ENTIER = 'number';
    const DATE='date';
    protected $elt;

    public function add($unNom, $unType='text', $options=null){
        $this->columns[] = array('nom'=>$unNom, 'type'=>$unType, 'options'=>$options);
    }
    public function getNbChamps(){
        return count($this->columns);
    }
    


}
