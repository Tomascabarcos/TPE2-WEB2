<?php
    require_once 'libs/Router.php';
    require_once 'app/controller/jugadorApiController.php';

  

  
    $router = new Router();
     
    $router->addRoute('/jugadores', 'GET' , 'JugadorApiController', 'obtenerjugadores');
    $router->addRoute('/jugadores/:ID' , 'GET' , 'JugadorApiController' , 'obtenerJugador' );
    $router->addRoute('/jugadores/:ID' , 'DELETE' , 'JugadorApiController' , 'borrarjugador' );
    $router->addRoute('/jugadores' , 'POST' , 'JugadorApiController' ,  'agregarjugador' );
    $router->addRoute('/jugadores/:ID' , 'PUT' , 'JugadorApiController' ,  'actualizarjugador' );

    $router->route($_GET["resource"], $_SERVER["REQUEST_METHOD"]);
