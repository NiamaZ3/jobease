<?php
namespace App\Controllers;
use App\Models\AddOffre;
class Add_Offre_Cntrl{
    public function Adding_Offre(){

            if(isset($_POST["submit"])){
                    $description = $_POST["description"];
                    $title = $_POST["title"];
                    $company = $_POST["company"];
                    $location =  $_POST['Location'];
                    $folder = "uploads/";
            
                if (!empty($_FILES['file']['name'])) {
                    $image = basename($_FILES['file']['name']);
                    $filename = uniqid() . $image;
                    $filePath = $folder . $filename;
                    $fileType = pathinfo($image , PATHINFO_EXTENSION);
                    $formats = array('jpg','png','jpeg','gif');
                    if (in_array($fileType,$formats)) {
                        if (move_uploaded_file($_FILES['file']['tmp_name'],$filePath)) {
                            $Offre = new AddOffre();
                            $result = $Offre->add_offre($description, $title ,$company, $location , $filename);
                    if ($result == true) {
                            header('Location:?route=dashboard&rep=success');
                        } else {
                            header('Location:?route=dashboard&rep=error1');
                        }
                    } else {
                        header('Location:?route=dashboard&rep=error2');
                    }
                    echo "test 4";
                } else {
                    echo"test 2";
                }
            }
            else{
                echo"EROOR";
            }
                }
}


    public  function Edit_Ofrre_Cntrl(){
        if(isset($_POST["submit"])){
            $idOffre = $_POST["idOffre"];
            $description = $_POST["description"];
            $title = $_POST["title"];
            $company = $_POST["company"];
            $location =  $_POST['Location'];
            $folder = "uploads/";

        if (!empty($_FILES['file']['name'])) {
            $image = basename($_FILES['file']['name']);
            $filename = uniqid() . $image;
            $filePath = $folder . $filename;
            $fileType = pathinfo($image , PATHINFO_EXTENSION);
            $formats = array('jpg','png','jpeg','gif');
            if (in_array($fileType,$formats)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'],$filePath)) {
                    $Offre = new AddOffre();
                    $result = $Offre->edit_offre($description, $title ,$company, $location , $filename , $idOffre);
            if ($result == true) {
                    header('Location:?route=All_Offre&rep=success');
                } else {
                    header('Location:?route=All_Offre&rep=error1');
                }
            } else {
                header('Location:?route=All_Offre&rep=error2');
            }
            echo "test 4";
        } else {
            echo"test 2";
        }
    }
    else{
        echo"EROOR";
    }
        }
    }
}
?>