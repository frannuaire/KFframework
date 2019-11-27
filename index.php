<?php

require_once 'vendor/autoload.php';



$request = new Kfframework\Request();
// ?page=task&action=getTask
$ctrl = 'Kfframework\\' . $request->getPage() . 'Controller';
$viewPath = 'views\\' . $request->getPage().'.html.twig';
$view =  $request->getPage().'.html.twig';


if (class_exists($ctrl)) {
    $controller = new $ctrl();
    if (method_exists($ctrl, $request->getAction())) {

        $data = $controller->{$request->getAction()}();
        if (file_exists($viewPath)) {
           // $view = new $viewName();
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
