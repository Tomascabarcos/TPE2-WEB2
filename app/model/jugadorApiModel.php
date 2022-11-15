<?php

    class JugadorApiModel{
        
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=deportes;charset=utf8', 'root','');
        }

        function obtenerjugadoresbd() {      
            $query = $this->db->prepare("SELECT * FROM jugadores_futbol");
            $query->execute();
            $jugadores = $query->fetchAll(PDO::FETCH_OBJ); 
            return $jugadores;
        }

        function obtenerjugadoresordenbd($prioridad,$orden){
         
            $query = $this->db->prepare("SELECT * FROM jugadores_futbol  ORDER BY $prioridad $orden");
            $query->execute();
           
            $jugadores = $query->fetchAll(PDO::FETCH_OBJ); 
            return $jugadores;
        }
     

        function obtenerjugadorbd($id){
            $query = $this->db->prepare("SELECT * FROM jugadores_futbol   WHERE ID = ?");
            $query->execute([$id]);
            $jugador = $query->fetch(PDO::FETCH_OBJ);
            return $jugador;
        }

        function borrarjugadorbd($id){
           $query = $this->db->prepare("DELETE FROM jugadores_futbol WHERE ID = ?");
           $query->execute([$id]);
        }

        function agregarjugadorbd($nombre,$posicion,$nacionalidad,$equipo){
            $query = $this->db->prepare("INSERT INTO jugadores_futbol (nombre,posicion,nacionalidad,id_equipo) VALUES (?,?,?,?)");
            $query->execute([$nombre,$posicion,$nacionalidad,$equipo]);
            return $this->db->lastInsertId();
        }

        function actualizarjugadorbd($nombre,$posicion,$nacionalidad,$equipo,$id){
            $query = $this->db->prepare("UPDATE jugadores_futbol SET nombre=?, posicion=?, nacionalidad=?,
            id_equipo=? WHERE ID=?");
            $query->execute([$nombre,$posicion,$nacionalidad,$equipo,$id]);
            return $this->db->lastInsertId();
        }   


    }