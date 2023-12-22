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
    }



?>