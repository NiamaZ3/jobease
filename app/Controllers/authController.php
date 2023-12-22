<?php
namespace App\Controllers;
use App\Models\AuthModels;

class AuthController{
    public function SignIn(){
            
        if(isset($_POST["email"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
    
            $user = new AuthModels();
    
            $succes = $user->SignIn( $email, $password );
            if($succes == 0){
                 header("Location:?route=login&msgEmail=mot de pass incorect");
                // exit; 
                 echo "Pass Incorrect";
            }
            else if($succes === 'condidat'){
                header("Location:?route=home");
                // echo "PASS";
            }
            else if($succes === 'admin'){
                header("Location:?route=dashboard");
            }
        }
    
        else{
        header("Location:?route=login&msgEmail=");
        echo "Email non introuvable";
        }

    }
}

?>