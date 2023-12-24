<?php
namespace App\Controllers;
use App\Models\Database;

class HomeController
{
    public function index()
    {

        require(__DIR__ .'../../../view/home.php');
      

    }
    public function login(){
        session_start();
        session_destroy();
        require(__DIR__ .'../../../view/login.php');

    }

    public function Register(){
        require(__DIR__ .'../../../view/register.php');

    }
    public function SignUp(){
        require (__DIR__.'../../../view/register.php');
    }
    public function home_candidat(){
        session_start();
        if(isset($_SESSION['id_user'])){
            $id_user = $_SESSION['id_user'];
        }
        else{
            header('Location:?route=login');
        }

        $connexion = Database::getInstance();
        $conn = $connexion->getConnection();

        if(isset($_POST["submit"])){

            $title = $_POST["title"];

            $sql = "SELECT * FROM `offre` WHERE title LIKE '%$title%'";

        }
        else{
            $sql = "SELECT * FROM `offre`";
        }

        if(isset($_GET['id_offre'])){
            $id_offre = $_GET['id_offre'];
            $iduser = $_SESSION['id_user'];
            
            $check = "SELECT COUNT(*) count FROM status WHERE userid = '$iduser' AND id_offre = '$id_offre'; ";
            $checkresult =  $conn->query($check);
            $rowresult = $checkresult->fetch_assoc();
            $numberRow = $rowresult['count'];
            if($numberRow > 0){
                    echo "<script> alert('Vous Avez deja demander cette offre')</script> ";}
            else{        
            $sql1 = "INSERT INTO `status`(`userid`, `id_offre`) 
            VALUES ('$id_user','$id_offre')";
            $result1 = $conn->query($sql1);
        }
    }

        $result = mysqli_query( $conn, $sql );
        require (__DIR__.'../../../view/candidat/home.php');
    }

    public function Dashborad(){
        session_start();
        if(isset($_SESSION['id_user'])){
            $id_user = $_SESSION['id_user'];
        }
        else{
            header('Location:?route=login');
        }
        require(__DIR__.'../../../view/admin/dashboard.php');
    }
    public function All_Offre(){
        session_start();
        if(isset($_SESSION['id_user'])){
            $id_user = $_SESSION['id_user'];
        }
        else{
            header('Location:?route=login');
        }

        $connexion = Database::getInstance();
        $con = $connexion->getConnection();
        $sql = "SELECT * FROM `offre`";
        $result = mysqli_query($con, $sql);

        if(isset($_GET['action']) && $_GET['action'] == 'delete'){
            if (isset($_GET['id_offre'])){
               $id = $_GET['id_offre'];
                $delete = "DELETE FROM `offre` WHERE id_offre = $id";
                $result = mysqli_query($con , $delete);
                if($result){
                    header("Location:?route=All_Offre");
                }
            }
        }

        require(__DIR__.'../../../view/admin/offre.php');
    }

    
    public function Page_Edit_Ofrre(){
        session_start();
        if(isset($_SESSION['id_user'])){
            $id_user = $_SESSION['id_user'];
        }
        else{
            header('Location:?route=login');
        }

        if(isset($_GET['id_offre'])){
            $id_offre = $_GET['id_offre'];
            $connexion = Database::getInstance();
            $con = $connexion->getConnection();

            $sql = "SELECT * FROM offre WHERE id_offre = '$id_offre'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
         }
        require(__DIR__.'../../../view/admin/update_page.php');
    }

    public function Contact_User(){
        session_start();
        if(isset($_SESSION['id_user'])){
            $id_user = $_SESSION['id_user'];
        }
        else{
            header('Location:?route=login');
        }

        $connection =Database::getInstance();
        $conn = $connection->getConnection();

        $sql = "SELECT status.* ,user.name name , user.email email , offre.title title , user.id userid , offre.id_offre id_offre
        FROM `status`
        INNER JOIN offre ON status.id_offre  = offre.id_offre 
        INNER JOIN user ON status.userid = user.id ";

         $result = $conn->query($sql) ;

         if(isset($_GET["accepter"]) && isset($_GET['contact']) && isset($_GET['id_offer'])){
                $accepter = $_GET["accepter"];

                $sql1 = "UPDATE `status`

                 SET `approved`='1',`notification`='1'
                 WHERE id = '$accepter'";
                 $result1 = $conn->query($sql1) ;

                 header("Location:?route=Candidat_User");


         }
         else if(isset($_GET["refuser"]) && isset($_GET['contact']) && isset($_GET['id_offer'])){
            $refuser = $_GET["refuser"];

            $sql1 = "UPDATE `status`

             SET `approved`='-1',`notification`='1'
             WHERE id = '$refuser'";
             $result1 = $conn->query($sql1) ;
             header("Location:?route=Candidat_User");

     }

        require(__DIR__.'../../../view/admin/candidat.php');

    }

    public function Notification(){
        session_start();
        if(isset($_SESSION['id_user'])){
            $id_user = $_SESSION['id_user'];

        }
        else{
            header('Location:?route=login');
        }

        $connection = Database::getInstance();
        $conn = $connection->getConnection();
        $sql = "SELECT status.* , offre.title title , offre.description dscr FROM status 
        INNER JOIN offre ON offre.id_offre = status.id_offre
        INNER JOIN user ON user.id = status.userid
        WHERE userid = $id_user  ORDER BY id DESC ;" ;
        $result = $conn->query($sql) ;

        

        require (__DIR__.'../../../view/candidat/notification.php');

    }


    //------------------------------------------------------------------
}
?>
