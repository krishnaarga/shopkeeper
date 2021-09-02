<?php

require_once '../config.php';

use Rakit\Validation\Validator;

$validator = new Validator;

$validation = $validator->validate($_POST, [
    'name'                 => 'required',
    'email'                 => 'required|email',
    'password'              => 'required|min:6',
    'confirm_password'      => 'required|same:password'
]);

if ($validation->fails()) {
	// handling errors
	$errors = $validation->errors();
	$error = $errors->firstOfAll();
    if(isset($error['name'])){
        echo '<script>swal("", "'.$error['name'].'", "warning")</script>';
        exit;
    }
    if(isset($error['email'])){
        echo '<script>swal("", "'.$error['email'].'", "warning")</script>';
        exit;
    }
    if(isset($error['password'])){
        echo '<script>swal("", "'.$error['password'].'", "warning")</script>';
        exit;
    }
    if(isset($error['confirm_password'])){
        echo '<script>swal("", "'.$error['confirm_password'].'", "warning")</script>';
        exit;
    }
} else {
	// validation passes
    echo '<script>swal("Good job!", "You clicked the button!", "success")</script>';

}
