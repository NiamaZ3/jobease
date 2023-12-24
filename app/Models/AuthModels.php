<?php
namespace App\Models;
use App\Models\Database;



class AuthModels{
    public function SignIn($email , $pass){

            $connexion = Database::getInstance();
            $conn = $connexion->getConnection();
    
            $sqlCheck = "SELECT * FROM `user` WHERE `email` = '$email'";
            $result = $conn->query($sqlCheck);
    
    
            if ($result && $result->num_rows > 0) {
                
                $row = $result->fetch_assoc();
    
                $HachPass = $row['password'];
                $role = $row['role_id'];
                // echo '=============>'.$role;
                // echo '=============>'.$HachPass;
                if(password_verify($pass, $HachPass)) {
                
                    if($role == 1)
                    {
                        session_start();                  
                        $_SESSION['id_user'] = $row['id'];
                        
                        return 'admin';
                 
    
                    }
                    else if($role == 2)
                    {
                        session_start();
                        $_SESSION['id_user'] = $row['id']; 
                        
                        return 'condidat';
                        
                    }
                    
    
                }
                 else {
                     return 0;
                 }
             } else {
                     return 2;
                } 
            }


            public function SignUp($name, $email, $pass) {
                $connexion = Database::getInstance();
                $conn = $connexion->getConnection();
        
                $sqlCheck = "SELECT * FROM `user` WHERE `email` = '$email'";
                $result = $conn->query($sqlCheck);
        
                if ($result && $result->num_rows > 0) {
                    return 0; 
                } else {
                    $sql = "INSERT INTO user (name, email, password , role_id) VALUES ('$name', '$email', '$pass' ,2 )";
                    if ($conn->query($sql) === TRUE) {
                        return 1; 
                    } 
                    else{
                        return -1;
                    }
                }
            }
    }



?>