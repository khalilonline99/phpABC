<?php

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

// dd($uri);
// dd(parse_url($uri));

// if ($uri === '/') {
// require 'controllers/index.php';
// }
// else if ($uri === '/about') {
// require 'controllers/about.php';
// }
// else if ($uri === '/contact') {
// require 'controllers/contact.php';
// }


$routes = [

'/' => 'controllers/index.php',
'/about' => 'controllers/about.php',
'/contact' => 'controllers/contact.php',
];

// echo $routes['/'];


function routeToController($uri, $routes)
{
if (array_key_exists($uri, $routes)) {
require $routes[$uri];
} else {
abort(404);
}
};

function abort($code = 404)
{
http_response_code($code);
// echo 'SOrry, the page dnt exist!';
require "views/{$code}.php";
die();
}

routeToController($uri, $routes);