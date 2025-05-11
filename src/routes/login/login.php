<?php
    require './app/modules/login/controller/loginController.php';
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

     switch ($uri) {
         case '/':
         case '/login':
             $loginController = new LoginController();
             $loginController->login();
         default:
             http_response_code(404);
             echo "Ruta no encontrada";
    }
?>