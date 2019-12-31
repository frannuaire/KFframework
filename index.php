<?php
// autoload norme PSR et chargement des bibliothèques externes avec composer
require_once 'vendor/autoload.php';



$request = new Kfframework\Request();
// ?page=nomPage&action=nomAction

// Construction des chemins des controllers et vues
$ctrl = 'Kfframework\\' . $request->getPage() . 'Controller';
$viewPath = 'views\\' . $request->getPage().'\\';
$view =  $request->getPage().'\\'.$request->getAction().'.html.twig';

/* Si la class, l'action ou la vue n'existe pas on lève une exception
Vous pourriez renvoyer vers une page 404 par exemple.
 *  */ 

if (class_exists($ctrl)) {
    // J'instancie mon controller
    $controller = new $ctrl($request);
    
    //Je test que l'action du controller Existe.
    if (method_exists($ctrl, $request->getAction())) {

        //J'appelle l'action du controller que je met dans un tableau pour rendre à la vue.        
        $data = $controller->{$request->getAction()}();
        
        // Si la vue existe je l'affiche
        if (file_exists($viewPath)) {
            $loader = new Twig_Loader_Filesystem('views/');
            $twig = new Twig_Environment($loader, array('debug' => true));
            $twig->addExtension(new Twig_Extension_Debug());
            echo $twig->render($view, $data);
        } else {
            throw new Exception('La vue '.$view.' n\'existe pas...');
        }
    } else {
        throw new Exception('L\'action '.$request->getAction().' n\'existe pas...');
    }
} else {
    throw new Exception('Le controller '.$ctrl.' n\'existe pas...');
}
