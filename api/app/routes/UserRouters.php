<?php
    $app->get('/greetings', 'UserController:helloUser');

    $app->get('/hellouser/{name}', 'UserController:helloName');
?>