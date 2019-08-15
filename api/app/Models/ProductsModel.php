<?php
    namespace app\Models;
class ProductsModel extends Models{
    public function selectProducts(){
    /*try{
        
    }catch(PDOExeption $e){
        echo json_encode(array(
            'error' => 'insert task pdo error:'.$e->getMessage(),
            'error trace' =>$e->getTraceAsString()
        ));
    }*/
        $query = $this->db->pdo->prepare(
            'SELECT * FROM products'
        );
        

        if(!$query->execute()){
            return array(
                'sucess' => false,
                'description' => $query->errorInfo()
            
            );
        }else{
            $result = $query -> fetchAll(\ PDO::FETCH_ASSOC);
            return array(
                'sucess' => true,
                'description' => 'The products were found',
                'products' => $result
            );
        }

        return array(
            'sucess' => true,
            'description' => 'The products were found',
            'products' => $result
        );
    }

    public function insertProducts($product){
        $result = $this->db->pdo->prepare(
            'INSERT INTO products (
                productCode, 
                productName, 
                productLine, 
                productScale, 
                productVendor, 
                productDescription,
                quantityInStock,
                buyPrice,
                MSRP) 
                VALUES (
                :productCode, 
                :productName, 
                :productLine, 
                :productScale, 
                :productVendor, 
                :productDescription,
                :quantityInStock,
                :buyPrice,
                :MSRP
                )'
        );
        $result->bindParam(':productCode', $product['productCode'], \PDO::PARAM_STR, 15);
        $result->bindParam(':productName', $product['productName'], \PDO::PARAM_STR, 70);
        $result->bindParam(':productLine', $product['productLine'], \PDO::PARAM_STR, 50);
        $result->bindParam(':productScale', $product['productScale'], \PDO::PARAM_STR, 10);
        $result->bindParam(':productVendor', $product['productVendor'], \PDO::PARAM_STR, 50);
        $result->bindParam(':productDescription', $product['productDescription'], \PDO::PARAM_STR);
        $result->bindParam(':quantityInStock', $product['quantityInStock'], \PDO::PARAM_INT);
        $result->bindParam(':buyPrice', $product['buyPrice'], \PDO::PARAM_STR);
        $result->bindParam(':MSRP', $product['MSRP'], \PDO::PARAM_STR);
                
        if(!$result->execute()){
            return array(
                'sucess' => false,
                'description' => $result->errorInfo()
            
            );
        }else{
            return array(
                'sucess' => true,
                'description' => 'The product was inserted'
            
            );
        }
        
    }

    public function updateProducts($product){
        
        $products=[
            'productCode'=> $product['productCode'],
            'productName' => $product['productName'],
            'productLine' => $product['productLine'],
            'productScale' => $product['productScale'],
            'productVendor' => $product['productVendor'],
            'productDescription' => $product['productDescription'],
            'quantityInStock' => $product['quantityInStock'],
            'buyPrice' => $product['buyPrice'],
            'MSRP' => $product['MSRP']
        ];
        $result= $this->db->pdo->prepare(
            'UPDATE products SET 
            productName=:productName,
            productLine =:productLine,
            productScale=:productScale,
            productVendor=:productVendor,
            productDescription=:productDescription,
            quantityInStock=:quantityInStock,
            buyPrice=:buyPrice,
            MSRP=:MSRP
            WHERE
            productCode = :productCode'
        );

        

        if(!$result->execute($products)){
            return array(
                'sucess' => false,
                'description' => $result->errorInfo()
            
            );
        }else{
            return array(
                'success'=> true,
                'description'=>'the product was updated'
                );
        }
        
    }
    
    }
    /*public function selectProducts(){
        $result = $this->db->select('products',
        [
            'productCode',
            'productName',
            'productLine',
            'productScale',
            'productVendor',
            'productDescription',
            'quantityInStock',
            'buyPrice',
            'MSRP'
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
            'description' => 'The products were found',
            'products' => $result
        );
    }*/
    
/*
    public function insertProducts($product){
        $result = $this->db->insert('products',
        ['productCode'=> $product['productCode'],
         'productName' =>$product['productName'],
         'productLine' =>$product['productLine'],
         'productScale' =>$product['productScale'],
         'productVendor' =>$product['productVendor'],
         'productDescription' =>$product['productDescription'],
         'quantityInStock' =>$product['quantityInStock'],
         'buyPrice' =>$product['buyPrice'],
         'MSRP' =>$product['MSRP']
        ]);

        if (!is_null($this->db->error()[1])) {
            return array(
                'success' => false,
                'description' => $this->db->error()[2]
            );
        }
        return array(
            'success'=> true,
            'description'=>'the product was inserted'
        );
    }
*/
/*
    public function updateProducts($product){
        $result= $this->db->update("products", array(
           // "productCode" => $product['productCode'],
            "productName" => $product['productName'],
            "productLine" => $product['productLine'],
            "productScale" => $product['productScale'],
            "productVendor" => $product['productVendor'],
            "productDescription" => $product['productDescription'],
            "quantityInStock" => $product['quantityInStock'],
            "buyPrice" => $product['buyPrice'],
            "MSRP" => $product['MSRP'],
       ), array(
            'productCode' => $product['productCode']
       ));
       if (!is_null($this->db->error()[1])) {
        return array(
            'success' => false,
            'description' => $this->db->error()[2]
        );
        }
        return array(
        'success'=> true,
        'description'=>'the product was updated'
        );
    }
    
}*/
?>