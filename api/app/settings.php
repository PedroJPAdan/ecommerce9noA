<?php
    //configuracion de la base de datos
    $db = require $contexto_app . '/app/database/config.php';
    
    //key de encriptacion
    $jwt = array('key' => 'EFzywKw#@?Ff$9X9', 'algorithms'=> array('HS256')); 

    //configuración de la app
    $settings = array(
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => true,
        'db' => $db,
        'jwt'=> $jwt
    );

    // se agrega el contexto de la app
    $settings['contexto'] = $contexto_app;
    //var_dump($settings);
    //die();
    return $settings;

?>