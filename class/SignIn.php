<?php

class SignIn extends DBConnect{
    public function logIn(String $email, String $password){
    	$query = $this->connect()->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    	$query->execute([
            'email' => $email,
            'password' => $password
        ]);
        if($query->rowCount() == 1){
            $row = $query->fetch(PDO::FETCH_OBJ);
            $_SESSION = [
                'session_id' => session_id(),
                'id' => $row->id,
                'name' => $row->name,
                'email' => $email
            ];
            echo '<script>window.location.assign("/shopkeeper");</script>';
        }else{
            echo '<script>swal("Error", "Wrong Email & Password...", "error")</script>';
        }
    }
}