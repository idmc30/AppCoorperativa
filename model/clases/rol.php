<?php
require_once 'conexion.php';

class Rol{
           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}


public function insertarRol($rol){
			
		  $sql="INSERT INTO rol(nombre_Rol, estado_Rol) VALUES (:rol, 'A')";
			$stmt = $this->objPdo->prepare($sql);
			$stmt->execute(array('rol' =>$rol));
		} 

public function listarRol() {
       	$stmt = $this->objPdo->prepare('SELECT * FROM rol');
       	$stmt->execute();
        $servidor = $stmt->fetchAll(PDO::FETCH_OBJ);
       	return $servidor;
    }


public function listarRolActivo() {
        $stmt = $this->objPdo->prepare('SELECT * FROM rol where estado_Rol="A"');
        $stmt->execute();
        $rol = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rol;
    }
    //;

public function eliminarRol($cod) {
        $stmt = $this->objPdo->prepare('DELETE FROM rol WHERE id_Rol = :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }

public function modificarRol($codigo,$nombre){
    $sql='UPDATE rol SET nombre_Rol = :nomRol WHERE id_Rol =:codRol;';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('nomRol'=> $nombre,
                         'codRol'=> $codigo));
  } 

public function estadoRol($codigo,$estado){

    $sql='UPDATE rol SET estado_Rol = :estado WHERE id_Rol = :codRol;';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('estado'=> $estado, 
                         'codRol'=>$codigo));
  } 


 public function obtenerRol($id) {
        $stmt = $this->objPdo->prepare('SELECT * FROM rol where id_Rol = :codigo');
        $stmt->execute(array('codigo' => $id));
        $rol = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rol[0];
    }
}