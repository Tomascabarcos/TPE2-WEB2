<?php

    require_once "./app/model/jugadorApiModel.php";
    require_once "./app/views/jugadorApiViews.php";

    class JugadorApiController{

        private $model;
        private $view;
        private $data;

        public function __construct(){
            $this->model = new JugadorApiModel();    
            $this->view = new jugadorApiViews();
            $this->data = file_get_contents("php://input");
        }

        function getData() {
           
            return json_decode($this->data);
        }

        function obtenerjugadores($params = null){

            if(isset($_GET['prioridad']) &&  isset($_GET['orden'])){
              
                $prioridad = $_GET['prioridad'];
                $orden = $_GET['orden'];

                
                if(($orden == 'asc' || $orden == 'desc' || $orden == 'DESC' || $orden == 'ASC')
                && ($prioridad == 'ID' || $prioridad == 'nombre'|| $prioridad == 'posicion'
                || $prioridad == 'nacionalidad'|| $prioridad == 'id_equipo' )){

                    $jugadores = $this->model->obtenerjugadoresordenadosbd($prioridad, $orden);
                    $this->view->response($jugadores,200);

                }else{
                    $this->view->response("ingresar correctamente los valores de prioridad o orden", 400);
                }
            //si no tiene prioridad y orden , muestra todos los jugadores
            }else{
                $jugadores =  $this->model->obtenerjugadoresbd();
                $this->view->response($jugadores, 200);

            }

        }

        function obtenerJugador($params = null){
            $id = $params[':ID'];
            
            $jugador = $this->model->obtenerjugadorbd($id);

            if($jugador){
                $this->view->response($jugador, 200);            
            }
            else{
                $this->view->response("el jugador con  {$id} no existe " , 404);
            }
        }

        function borrarjugador($params = null){
            $id = $params[':ID'];
            
            $jugador = $this->model->obtenerjugadorbd($id);

            if($jugador){
                $this->model->borrarjugadorbd($id);
                $this->view->response( "el jugador con {$id} fue eliminado" ,200);   
            }
            else{
                $this->view->response("el jugador con {$id} no  fue eliminado" ,404);
            }
        }

        function agregarjugador($params = null){
            $jugador= $this->getData();
            
            if(empty($jugador->nombre) ||  empty($jugador->posicion)|| empty($jugador->nacionalidad) || empty($jugador->id_equipo) || !is_numeric($jugador->id_equipo)){
                $this->view->response("complete los datos" , 400);
            }
            else{
                $id = $this->model->agregarjugadorbd($jugador->nombre , $jugador->posicion, $jugador->nacionalidad, $jugador->id_equipo);
                $jugador = $this->model->obtenerjugadorbd($id);
                $this->view->response($jugador,201);
            }
        }
 
         function actualizarjugador($params = null){
         
            $id = $params[':ID'];
            $body = $this->getData();   

            $jugador = $this->model->obtenerjugadorbd($id);
            $nombre = $body->nombre;
            $posicion= $body->posicion;
            $nacionalidad = $body->nacionalidad;
            $equipo = $body->id_equipo;

            if(empty($nombre) || empty($posicion) || empty($nacionalidad) || empty($equipo) || !is_numeric($equipo)){
                $this->view->response("la tarea con {$id} no fue actualizada" , 400);
            }
            else if($jugador){
            
                $this->model->actualizarjugadorbd($nombre,$posicion,$nacionalidad,$equipo,$id);
               
                $jugador = $this->model->obtenerjugadorbd($id);
                $this->view->response($jugador , 200);
            }
        }
        


          
           
        
      
        

        

    }
