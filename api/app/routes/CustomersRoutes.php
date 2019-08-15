<?php
    $app->get('/customers', 'CustomersController:selectCustomers');
    $app->post('/customers', 'CustomersController:insertCustomers');
    $app->put('/customers', 'CustomersController:updateCustomers');
?>