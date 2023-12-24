<?php

namespace App\Models    ;

class AddOffre{

    public function add_offre($description, $title ,$company, $location , $filename){
          $connexion = Database::getInstance();
          $conn = $connexion->getConnection();

          $sql = "INSERT INTO `offre`( `description`, `title`, `company`, `location`, `image`)
           VALUES ('$description','$title','$company','$location','$filename')";
         $result = $conn->query($sql);
         if($result){
            return true;
         }
         else{
            return false;
         }    
    }


    public function edit_offre($description, $title ,$company, $location , $filename , $idoffre){
        $connexion = Database::getInstance();
        $conn = $connexion->getConnection();

        $sql = "UPDATE `offre` SET 
                    `description` = '$description',
                    `title` = '$title',
                    `company` = '$company',
                    `location` = '$location',
                    `image` = '$filename'
                WHERE 
                    `id_offre` = '$idoffre' ";

       $result = $conn->query($sql);

       if($result){
          return true;
       }
       else{
          return false;
       }    

    }

}


?>