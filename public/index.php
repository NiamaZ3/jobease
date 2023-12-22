<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\Dashboard;
use App\Controllers\HomeController; //le chemin
use App\Controllers\LoginController;

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

        case 'dashboard':
            $logincontroller = new HomeController();
             $logincontroller->Dashborad();
            break;
        case 'Addoffre':
                $logincontroller = new HomeController();
                 $logincontroller->Addoffre();
                break;
        case 'Condidat':
                $logincontroller = new Condidat();
                $logincontroller->Condidat();
            break;
    // Add more cases for other routes as needed
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action

?>
