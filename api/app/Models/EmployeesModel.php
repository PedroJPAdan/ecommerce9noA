<?php
    namespace app\Models;  
    class EmployeesModel extends Models{
        public function selectEmployees(){
            
            $result = $this->db->select('employees',
            ['[><]offices'=>['officeCode'=>'officeCode']],
            [
                'employeeNumber',
                'lastName',
                'firstName',
                'extension',
                'email',
                'Offices.city',
                'reportsTo',
                'jobTitle'
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
                'description' => 'The employees were found',
                'employees' => $result
            );
        }
        public function insertEmployees($employee){
            $result = $this->db->insert('employees',
            ['employeeNumber'=> $employee['employeeNumber'],
             'lastName' =>$employee['lastName'],
             'firstName' =>$employee['firstName'],
             'extension' =>$employee['extension'],
             'email' =>$employee['email'],
             'officeCode' =>$employee['officeCode'],
             'reportsTo' =>$employee['reportsTo'],
             'jobTitle' =>$employee['jobTitle']
            ]);

            if (!is_null($this->db->error()[1])) {
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }
            return array(
                'success'=> true,
                'description'=>'the employee was inserted'
            );
        }

        public function updateEmployees($employee){
            $result= $this->db->update("employees", array(
               // "employeeNumber" => $employee['employeeNumber'],
                "lastName" => $employee['lastName'],
                "firstName" => $employee['firstName'],
                "extension" => $employee['extension'],
                "email" => $employee['email'],
                "officeCode" => $employee['officeCode'],
                "reportsTo" => $employee['reportsTo'],
                "jobTitle" => $employee['jobTitle']
           ), array(
                'employeeNumber' => $employee['employeeNumber']
           ));
           if (!is_null($this->db->error()[1])) {
            return array(
                'success' => false,
                'description' => $this->db->error()[2]
            );
            }
            return array(
            'success'=> true,
            'description'=>'the employee was updated'
            );
        }

        public function getByIdEmployees($employeeNumber){
            $result = $this->db->select('employees',[
                'employeeNumber',
                'lastName',
                'firstName',
                'extension',
                'email',
                'officeCode',
                'reportsTo',
                'jobTitle'
            ],[
                "employeeNumber" => $employeeNumber
            ]
        );

        if(!is_null($this->db->error()[1])){
            return array(
                'error' => true,
                'description' => $this->db->error()[2]
            );
        } else if (empty($result)){
            return array(
                'notFound' => true,
                'description' => 'The result is empty'
            );
        }
        return array(
            'success' => true,
            'description' => 'The employee were found',
            'employees' => $result
        );
        }

        public function login($login){
            $email = $login['email'];
            $pass = md5($login['password']);
            $sqlE = $this->db->pdo->prepare('SELECT * FROM employees WHERE email = :email');
            $sqlE->bindParam(':email', $email, \PDO::PARAM_STR);
            $sqlE->execute();
            $result = $sqlE->fetchAll(\PDO::FETCH_ASSOC);
            if(empty($result)){
                return array(
                    'error' => true,
                    'description' => 'Email incorrect'
                );
            }
            $sqlP = $this->db->pdo->prepare('SELECT * FROM employees WHERE password = :password');
            $sqlP->bindParam(':password', $pass, \PDO::PARAM_STR);
            $sqlP->execute();
            $result = $sqlP->fetchAll(\PDO::FETCH_ASSOC);
            if(empty($result)){
                return array(
                    'error' => true,
                    'description' => 'Password incorrect'
                );
            }
            $token = $this->JWTService->encode($email);
            return array(
                'success' => true,
                'description' => 'Correct access, Welcome',
                'token' => $token
            );
        }
    }
?>