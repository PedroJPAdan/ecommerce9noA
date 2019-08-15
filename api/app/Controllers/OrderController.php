<?php
    namespace app\Controllers;

    class OrderController extends Controllers{
        public function insertOrder($request,$response){
            $order = $request->getParsedBody();
            //var_dump($order);die();
            $message = $this->OrderModel->insertOrder($order);

            return json_encode($message);
        }
    }
?>