<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kfframework;

/**
 * Description of CategorieEntity
 *
 * @author SIO
 */
class CategorieEntity extends Entity{
    
    public function __construct() {
        $this->table = 'categories';
        $this->columns= new Columns();
        $this->columns->add("idCategories", Columns::ENTIER, ['primary'=>'idCategories', 'libelle'=>'Id catégorie']);
        $this->columns->add("nom", Columns::STRING, ['libelle'=>'Categorie']);
        $this->columns->add("slug", Columns::STRING, ['libelle'=>'Slug']);
        $this->setPrimaryKey();
    }

}
