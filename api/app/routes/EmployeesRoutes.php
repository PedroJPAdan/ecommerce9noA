<?php
    $app->get('/employees', 'EmployeesController:selectEmployees');
    $app->post('/employees', 'EmployeesController:insertEmployees');
    $app->put('/employees', 'EmployeesController:updateEmployees');
    $app->get('/employees/{employeeNumber}', 'EmployeesController:getEmployeebyId');
    $app->post('/employees/login', 'EmployeesController:login');
?>