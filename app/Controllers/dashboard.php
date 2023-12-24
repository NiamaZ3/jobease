<?php
namespace App\Controllers;

class Dashboard{
        function Dashborad(){
                if(isset($_POST["submit"])){
                    $description = $_POST["description"];
                    $title = $_POST["title"];
                    $company = $_POST["company"];
                    $location =  $_POST['Location'];
                    $folder = "../uploads/";

                if (!empty($_FILES['file']['name'])) {
                    $image = basename($_FILES['file']['name']);
                    $filename = uniqid() . $image;
                    $filePath = $folder . $filename;
                    $fileType = pathinfo($image , PATHINFO_EXTENSION);
                    $formats = array('jpg','png','jpeg','gif');
                    if (in_array($fileType,$formats)) {
                        if (move_uploaded_file($_FILES['file']['tmp_name'],$filePath)) {
                            $Offre = new AddOffreCntrl();
                            $result = $Offre->add_offre($description, $title ,$company, $location , $filename);
                            header('Location: dashboard.php?rep=success');
                        } else {
                            header('Location: dashboard.php?rep=error1');
                        }
                    } else {
                        header('Location: dashboard.php?rep=error2');
                    }
                    echo "test 4";
                } else {
                    echo"test 2";
                }
                // if($result == 0){

                    //     header("Location:add_page.php?msg=error");
                    // }
                    // else if($result == 1){

                    //     header("Location:add_page.php?msg=L'offre e éte ajouter avec succes"); 
                    // }
                    // else {
                    //     echo"kknnn";
                    // }
}
            else{
                echo"EROOR";
            }
     }
}
?>