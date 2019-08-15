<?php
    namespace app\Controllers;

    class EmployeesController extends Controllers {
        function selectEmployees($request, $response){
            
            $message = $this->EmployeesModel->selectEmployees();
            return json_encode($message);
        }

        function insertEmployees($request, $response){
            $employee = $request->getParsedBody();
            //var_dump($employee);die();
            $message = $this->EmployeesModel->insertEmployees($employee);
            return json_encode($message);
        }

        function updateEmployees($request, $response){
            $employee = $request->getParsedBody();
            $message = $this->EmployeesModel->updateEmployees($employee);
            return json_encode($message);
        }

        function getEmployeebyId($request, $response){
            $employeeNumber = $request->getAttribute('employeeNumber');
            $message = $this->EmployeesModel->getByIdEmployees($employeeNumber);
            return json_encode($message);
        }

        function login($request, $response){
            $login = $request->getParsedBody();
            $message = $this->EmployeesModel->login($login);
            return json_encode($message);
        }
    }
?>