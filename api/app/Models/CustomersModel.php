<?php
    namespace app\Models;  
    class CustomersModel extends Models{
        public function selectCustomers(){
            
            $result = $this->db->select('customers',
            [
                'customerNumber',
                'customerName',
                'contactLastName',
                'contactFirstName',
                'phone',
                'addressLine1',
                'addressLine2',
                'city',
                'state',
                'postalCode',
                'country',
                'salesRepEmployeeNumber',
                'creditLimit'
                ]);
        
            if (!is_null($this->db->error()[1])) {
                    return array(
                        'error' => true,
                        'description' => $this->db->error()[2]
                    );
            }else if (empty($result)){
                    return array(
                    'notFound' => true,
                    'description' => 'The result is empty'
                );
            }

            return array(
                'sucess' => true,
                'description' => 'The customer were found',
                'customers' => $result
            );
        }
        public function insertCustomers($customer){
            $result = $this->db->insert('employees',
            ['customerNumber'=> $customer['customerNumber'],
             'customerName' =>$customer['customerName'],
             'contactLastName' =>$customer['contactLastName'],
             'contactFirstName' =>$customer['contactFirstName'],
             'phone' =>$customer['phone'],
             'addressLine1' =>$customer['addressLine1'],
             'addressLine2' =>$customer['addressLine2'],
             'city' =>$customer['city'],
             'state' =>$customer['state'],
             'postalCode' =>$customer['postalCode'],
             'country' =>$customer['country'],
             'salesRepEmployeeNumber' =>$customer['salesRepEmployeeNumber'],
             'creditLimit' =>$customer['creditLimit']
            ]);

            if (!is_null($this->db->error()[1])) {
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }
            return array(
                'success'=> true,
                'description'=>'the customer was inserted'
            );
        }

        public function updateCustomers($customer){
            $result= $this->db->update("customers", array(
               // "customerNumber" => $customer['customerNumber'],
                "customerName" => $customer['customerName'],
                "contactLastName" => $customer['contactLastName'],
                "contactFirstName" => $customer['contactFirstName'],
                "phone" => $customer['phone'],
                "addressLine1" => $customer['addressLine1'],
                "addressLine2" => $customer['addressLine2'],
                "city" => $customer['city'],
                "state" => $customer['state'],
                "postalCode" =>$customer['postalCode'],
                "country" =>$customer['country'],
                "salesRepEmployeeNumber" =>$customer['salesRepEmployeeNumber'],
                "creditLimit" =>$customer['creditLimit']
           ), array(
                'customerNumber' => $customer['customerNumber']
           ));
           if (!is_null($this->db->error()[1])) {
            return array(
                'success' => false,
                'description' => $this->db->error()[2]
            );
            }
            return array(
            'success'=> true,
            'description'=>'the customer was updated'
            );
        }
    }
?>