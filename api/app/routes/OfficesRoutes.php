<?php
    $app->get('/offices', 'OfficesController:selectOffices');
    $app->post('/offices', 'OfficesController:insertOffices');
    $app->put('/offices', 'OfficesController:updateOffices');
?>