<?php

require_once '../config.php';

use Rakit\Validation\Validator;

$validator = new Validator;

$validation = $validator->validate($_POST, [
    'email'                 => 'required|email',
    'password'              => 'required|min:6'
]);

if ($validation->fails()) {
	// handling errors
	$errors = $validation->errors();
	$error = $errors->firstOfAll();
    if(isset($error['email'])){
        echo '<script>swal("", "'.$error['email'].'", "warning")</script>';
        exit;
    }
    if(isset($error['password'])){
        echo '<script>swal("", "'.$error['password'].'", "warning")</script>';
        exit;
    }
} else {
	// validation passes
    extract($_POST);
    $signin = new SignIn();
    $signin->logIn($email, $password);

}
