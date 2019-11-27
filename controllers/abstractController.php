<?php

namespace Kfframework;

//use Task\TaskModel;

abstract class abstractController {

    protected $modelName;
    protected $model;

    public function __construct() {
        $this->setModel();
    }

    public function setModel() {
        $this->modelName = get_class($this);
        $tmp = explode("\\", $this->modelName);
        $tmp = str_replace("Controller", "", $tmp[1]);
     //   var_dump($tmp);
        $this->modelName = 'Kfframework\\' . $tmp . 'Model';

        $this->model = new $this->modelName();
    }

    public function getModel() {
        return $this->model;
    }

    public function __ToString() {
        return $this->modelName;
    }

}
