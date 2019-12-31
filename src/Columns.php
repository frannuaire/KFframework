<?php


namespace Kfframework;

/**
 * Description of Column
 *
 * @author SIO
 */
class Columns {
    private $nbCol;
    const STRING = 'text';
    const ENTIER = 'number';
    const DATE='date';
    protected $elt;


    public function __construct() {
        
        
    }
    public function add($unNom, $unType='text', $options=null){
        $this->elt[] = array('nom'=>$unNom, 'type'=>$unType, 'options'=>$options);
    }
    public function getNbChamps(){
        return count($this->elt);
    }
    
    public function getColumns(){
        return $this->elt;
    }
}
