<?php 

require __DIR__.'/../vendor/autoload.php';

// Create an object $router using AltoRouter
$router = new AltoRouter();
// The BASE_URI key is set via the .htaccess file
$router->setBasePath($_SERVER['BASE_URI']);

// Routes
$router->map('GET','/', 'MainController#list', 'home');
$router->map('GET','/detail/[i:number]', 'MainController#detail', 'detail');

// Match the current request 
$match = $router->match();

if($match !== false) {
    // Separating the two parts in "target" ('MainController#home')
    $controllerAndMethod = explode('#', $match['target']);
    //dump($controllerAndMethod); // debug
    // Storing the names in variables by concatenating the namespace with the controller's name 
    // (to avoid rewriting it in each route)
    $controllerName = 'Pokedex\\Controllers\\' . $controllerAndMethod[0];
    //echo '<br>$controllerName='.$controllerName.'<br>';
    $methodName = $controllerAndMethod[1];
    // Instantiating the controller
    // PHP will replace the variable $controllerName with its value
    // and then instantiate the appropriate class : "new MainController()"
    $controller = new $controllerName();
    // Calling the method corresponding to the route
    // PHP will replace the variable $methodName with its value
    // and then call the appropriate method : "->home()"
    // Passing the array of dynamic parameters from the matched route as an argument
    $controller->$methodName($match['params']);
} else {
    // If no match was found by AltoRouter, sends the 404 page
    $controller = new Pokedex\Controllers\MainController();
    $controller->notFound();
}