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
                header("Location:?route=home_candidat");
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

    public function SignUp(){

        if(isset($_POST["submit"])){
            $NameUtilisateur = $_POST["NameUtilisateur"];
            $email = $_POST["email"];
            $pass = $_POST["password"];
            $c_pass = $_POST["c_password"];
        
            if($pass === $c_pass){
            $User =  new AuthModels();
            $hached_pass = password_hash($pass, PASSWORD_DEFAULT);
        
            $register = $User->SignUp($NameUtilisateur , $email , $hached_pass);    
        
            if ($register == 0) {
                header("Location:?route=register&msgEmail=Email est deja existe");
                exit; 
            }

            else if($register == 1) {
                header ("Location:?route=login");
            }
        
        }
            else{
            header("Location:?route=register&msgPass=La comfirmation de code est pas marche");
            exit;
            }
        
        }

    }
}

?>