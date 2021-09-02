<?php

require_once '../config.php';

use Rakit\Validation\Validator;

$validator = new Validator;

$validation = $validator->validate($_POST, [
    'product_name'      => 'required',
    'product_price'     => 'required'
]);

if ($validation->fails()) {
	// handling errors
	$errors = $validation->errors();
	$error = $errors->firstOfAll();
    if(isset($error['product_name'])){
        echo '<script>swal("", "'.$error['product_name'].'", "warning")</script>';
        exit;
    }
    if(isset($error['product_price'])){
        echo '<script>swal("", "'.$error['product_price'].'", "warning")</script>';
        exit;
    }
} else {
	// validation passes
    extract($_POST);
    $products = new Products();
    $products->productAdd($product_name, $product_price);
}
