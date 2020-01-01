<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kfframework;

/**
 * Description of Form
 *
 * @author SIO
 */
class Form {
    private $nom;
    private $html;
    private $action;
    private $columns;
    private $methode;
    private $entity;

    public function __construct($entity){
        $this->entity=new $entity();
    }
/**
 * Permet de créer le formulaire
 * @param string $unNom
 * @param string $uneAction
 * @param string $uneMethode
 * @param Array $desColumns
 */
    public function setForm($unNom, $uneAction, $uneMethode){
        $this->nom = $unNom;
        $this->action = $uneAction;
        $this->methode = $uneMethode;
        $this->columns = $this->entity->getColumns();
       
        $this->html = '<form name="'.$this->nom.'" action="'.$this->action.'" method="'.$this->methode.'">';
        foreach($this->columns->getColumns() as $col) {
           
            
            $this->html .= ' <div class="form-group">
    <label for="exampleInputEmail1">'.$col['nom'].'</label><input type="'.$col['type'].'" name="'.$col['nom'].'" /></div>';
        }
        
        $this->html.='<input type="submit" value="enregistrer"></form>';
    }
    
    /**
     * Retourne le formulaire en HTML
     * @return string
     */
    public function affiche(){
        return $this->html;
    }
}
