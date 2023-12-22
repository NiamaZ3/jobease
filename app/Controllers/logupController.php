<?php
namespace App\Controllers;
use App\Models\loguModels;



class logupController{
     public function SignUp(){

if(isset($_POST["submit"])){
    $NameUtilisateur = $_POST["NameUtilisateur"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $c_pass = $_POST["c_password"];

    if($pass === $c_pass){
    $User =  new sign_up();
    $hached_pass = password_hash($pass, PASSWORD_DEFAULT);

    $register = $User->createUser($NameUtilisateur , $email , $hached_pass);    

    if ($register == 0) {
        header("Location:register.php?msgEmail=Email est deja existe");
        exit; 
    }

    else if($register == 1) {
        header ("Location:login.php");
    }

}
    else{
    header("Location:register.php?msgPass=La comfirmation de code est pas marche");
    exit;
    }

}
}
}
?>