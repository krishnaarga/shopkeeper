<?php

class Products extends DBConnect{
    public function productAdd(String $product_name, String $product_price){
        $query = $this->connect()->prepare("INSERT INTO `products`(`user_id`, `product_name`, `product_price`) VALUES (:user_id, :product_name, :product_price)");
        $query->execute([
            'user_id'           => $_SESSION['id'],
            'product_name'      => $product_name,
            'product_price'     => $product_price
        ]);
        // echo '<div class="alert alert-success">Page Created Successfully...</div><script>setTimeout(()=>{$(".alert").alert("close"),window.location.assign("post-new")},1000);</script>';
    }

    public function productList(){
        $query = $this->connect()->query("SELECT * FROM products ORDER BY id DESC");
        if($query->rowCount() > 0){
            $rows = $query->fetchAll(PDO::FETCH_OBJ);
            return json_encode($rows);
        }
    }
}
