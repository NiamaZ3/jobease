<?php
namespace App\Controllers;


class HomeController
{
    public function index()
    {

        require(__DIR__ .'../../../view/home.php');
      

    }
    public function login(){
        require(__DIR__ .'../../../view/login.php');

    }

    public function Register(){
        require(__DIR__ .'../../../view/register.php');

    }
    public function SignUp(){
        require (__DIR__.'../../../view/register.php');
    }
    public function Dashborad(){
        require(__DIR__.'../../../view/admin/dashboard.php');
    }
    public function Addoffre(){
        require(__DIR__.'../../../View/admin/addoffre.php');
    }
}
?>
