<?php

namespace Kfframework;


/**
 * @author: Kevin FERRANDON <kferrandon@gmail.com>
 * @description: Instancie le model pour le controller et notre objet pdo db
 */
abstract class abstractController {

    protected $modelName;
    protected $model;

    /**
     * Constructeur
     */
    public function __construct() {
        $this->setModel();
    }

    /**
     * Instancie le model
     */
    public function setModel() {
        $this->modelName = get_class($this);
        $tmp = explode("\\", $this->modelName);
        $tmp = str_replace("Controller", "", $tmp[1]);
     //   var_dump($tmp);
        $this->modelName = 'Kfframework\\' . $tmp . 'Model';

        $this->model = new $this->modelName();
    }

    /**
     * 
     * @return Model
     */
    public function getModel() {
        return $this->model;
    }
    /**
     * 
     * @return string
     */
    public function __ToString() {
        return $this->modelName;
    }

}
