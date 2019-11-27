<?php

namespace Kfframework;

class Request {

    protected $methode;
    protected $request;
    protected $url;

    public function __construct() {
       $this->setMethode();
       $this->setUrl();
    }

    public function setMethode(){
        $this->methode = $_SERVER['REQUEST_METHOD'];
        switch ($this->methode) {
            case 'GET': $this->request = &$_GET;
                break;
            case 'POST': $this->request = &$_POST;
                break;

            default:
        }
    }
    public function getMethode() {
        return $this->methode;
    }
    public function getPage(){
        if(!isset($this->request['page'])){
            return 'index';
        }
        return $this->request['page'];
    }
    public function getAction(){
        if(!isset($this->request['action'])){
            return 'index';
        }
        return $this->request['action'];  
    }
    public function setUrl(){
       $this->url =  $_SERVER['REQUEST_URI'];
    }
    
    public function getUrl(){
        return $this->url;
    }

}
