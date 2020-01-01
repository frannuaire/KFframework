<?php

namespace Kfframework;

/**
 * Description of Categorie
 *
 * @author SIO
 */
class CategorieController extends abstractController{
    
    public function index(){
        return [];
    }
    
    public function listing(){          
        $categories =$this->model->selectAll();
    //    $categories =$this->model->findById(2);
       
        return Array('categories'=>$categories,
            'title'=>'Catégorie'
            );
    }
    /**
     * Formulaire d'ajout pour la catégorie.
     * @return Array
     */
    public function ajout(){
       
        $form = new Form(CategorieEntity::class);
        $form->setForm('categorie', './index.php?page=categorie&action=valide', "post");
        return Array('form'=>$form->affiche());
    }
    
    public function valide(){
       // var_dump($this->request->getRequest()['POST']);die;
        $categorie = $this->request->getRequest()['POST'];
        if(empty($categorie['idCategories'])){
            //todo: Insert
            $this->model->insert($categorie);
            header('Location: ./index.php?page=categorie&action=listing');
        }else{
            //todo: Update
        }
      //  var_dump($this->request);die;
    }
    
}
