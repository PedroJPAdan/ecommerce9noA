<?php
    namespace app\Controllers;

    class CustomersController extends Controllers {
        function selectCustomers($request, $response){
            
            $message = $this->CustomersModel->selectCustomers();
            return json_encode($message);
        }

        function insertCustomers($request, $response){
            $customer = $request->getParsedBody();
            $message = $this->CustomersModel->insertCustomers($customer);
            return json_encode($message);
        }

        function updateCustomers($request, $response){
            $customer = $request->getParsedBody();
            $message = $this->CustomersModel->updateCustomers($customer);
            return json_encode($message);
        }
    }
?>