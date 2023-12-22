<?php
include("../connexion/Connection.php");

Class AddOffreCntrl extends Connection{

    function add_offre($description, $title, $company, $location,$filename){
        // if($_FILES['image']['error'] == 0){
        // $upload_dir = "../uploads/";
        // $image_path = $upload_dir .uniqid().basename($_FILES['image']['name']);
  
        // if (move_uploaded_file($image["tmp_name"], $image_path)) {
            $sql = "INSERT INTO offre (description, title, company, location, image) VALUES (?, ?, ?, ?, ?);";
            $stmt= $this->conn->prepare("INSERT INTO offre (description, title, company, location, image) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$description, $title, $company, $location,$filename]);
            //$result = $this->conn->query($sql);
            if($result){
                return 1; 
            } else {
                return 0;
            }
    }
}
?>
