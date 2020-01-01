<?php

namespace Kfframework;

/**
 * Description of Categorie
 *
 * @author SIO
 */
class CategorieModel extends abstractModel{
    
    
    
    public function __construct() {
        parent::__construct();
          $this->entity = new CategorieEntity();
        //  var_dump($this->entity);die;
       /* $this->table = 'categories';
        $this->columns= new Columns();
        $this->columns->add("idCategories", Columns::ENTIER);
        $this->columns->add("nom", Columns::STRING);
        $this->columns->add("slug", Columns::STRING);*/
        
        
       
    }
    public function listAll(){  
       $res= $this->findById(2);
     //  $res= $this->selectAll();
        return $res;
    }
    
   

    
}
