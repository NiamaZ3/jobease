<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\Add_Offre_Cntrl;
use App\Controllers\AuthController;
use App\Controllers\HomeController; //le chemin

$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route
switch ($route) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'login':
        $logincontroller = new HomeController();
        $logincontroller->login();
        break;
    case 'SignIn':
        $logincontroller = new AuthController();
        $logincontroller->SignIn();
        break;
    case 'register':
        $logincontroller = new HomeController();
        $logincontroller->Register();
        break;
        
        case 'SignUp':
            $logincontroller = new AuthController();
            $logincontroller->SignUp();
            break;
        case 'home_candidat':
            $logincontroller = new HomeController();
            $logincontroller->home_candidat();
            break;
          
            //---------------------------------------------------------------------------------------

        case 'dashboard':
            $logincontroller = new HomeController();
             $logincontroller->Dashborad();
            break;

        case 'Addoffre':
                $logincontroller = new Add_Offre_Cntrl();
                 $logincontroller->Adding_Offre();
                break;
        case 'All_Offre':
                $logincontroller = new HomeController();
                 $logincontroller->All_Offre();
                break;
        case 'Page_Edit_Offre':
                $logincontroller = new HomeController();
                 $logincontroller->Page_Edit_Ofrre();
                break;
        case 'Edit_Offre':
                $logincontroller = new Add_Offre_Cntrl();
                 $logincontroller->Edit_Ofrre_Cntrl();
                break;
        case 'Candidat_User':
            $logincontroller = new HomeController();
                $logincontroller->Contact_User();
            break;
        case 'notification':
            $logincontroller = new HomeController();
                $logincontroller->Notification();
            break;
    // Add more cases for other routes as needed
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action

?>
