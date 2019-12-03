<?php

namespace Kfframework;

class Request {

    protected $methode;
    protected $request;
    protected $url;
/**
 * Constructeur
 */
    public function __construct() {
       $this->setMethode();
       $this->setUrl();
    }

    /**
     * ajoute les variables post et get dans request
     */
    public function setMethode(){
        $this->methode = $_SERVER['REQUEST_METHOD'];
        switch ($this->methode) {
            case 'GET': $this->request = &$_GET;
                break;
            case 'POST': $this->request = &$_POST;
                break;

            default:
        }
        // var_dump($this->request);die;
    }
    
    /**
     * 
     * @return string
     */
    public function getMethode() {   
        return $this->methode;
    }
    
    /**
     * 
     * @return string
     */
    public function getPage(){
        if(!isset($this->request['page'])){
            return 'index';
        }
        return $this->request['page'];
    }
    
    /**
     * 
     * @return string
     */
    public function getAction(){
        if(!isset($this->request['action'])){
            return 'index';
        }
        return $this->request['action'];  
    }
    /**
     * recupere l'url
     */
    public function setUrl(){
       $this->url =  $_SERVER['REQUEST_URI'];
    }
    
    /**
     * @return String
     */
    public function getUrl(){
        return $this->url;
    }

}
