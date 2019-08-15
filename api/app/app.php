<?php
require $contexto_app . '/vendor/autoload.php';
//agregar la configuracion de la aplicacion
$settings = require $contexto_app . '/app/settings.php';

if ($env == 'production'){
    $settings['displayErrorDetails']=false;
}
$app = new \Slim\App(
    array ('settings' => $settings)
);//Creación de la instancia de Slim

//Container de slim
$container = $app->getContainer();

//Providers
$providers = $contexto_app . '/app/providers/*.php';

foreach (glob($providers) as $filename) require $filename; //var_dump($filename); 
//die();

//routers
$routes = $contexto_app . '/app/routes/*.php';

foreach (glob($routes) as $filename) require $filename;
$app->run();
?>