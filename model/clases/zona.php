<?php
require_once 'conexion.php';

class Zona{
      private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}

public function insertarZona($zona,$descripcion){		  
		  $sql="INSERT INTO zona(nombre_Zon, descripcion_Zon, estado_Zon) VALUES (:nombre, :descripcion, 'A')";
			$stmt = $this->objPdo->prepare($sql);
			$stmt->execute(array('nombre' =>$zona,
                           'descripcion' =>$descripcion));
      //$zona = $stmt->fetchAll(PDO::FETCH_OBJ);
      //return $zona;      
		} 

public function listarZona() {
       	$stmt = $this->objPdo->prepare('SELECT * FROM zona');
       	$stmt->execute();
        $zona = $stmt->fetchAll(PDO::FETCH_OBJ);
       	return $zona;
    }
    
public function listarZonaActiva() {
        $stmt = $this->objPdo->prepare('SELECT * FROM zona where estado_Zon="A"');
        $stmt->execute();
        $lzona = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lzona;
    }

public function eliminarZona($cod) {
        $stmt = $this->objPdo->prepare('DELETE FROM zona WHERE id_Zon = :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }

public function modificarZona($codigo,$nombre,$descripcion){
    $sql='UPDATE zona SET nombre_Zon = :nomZon, descripcion_Zon = :descripcion WHERE id_Zon =:codZon;';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('nomZon'=> $nombre,
                         'descripcion'=> $descripcion,
                         'codZon'=> $codigo
                         ));
  } 

public function estadoZona($codigo,$estado){

    $sql='UPDATE zona SET estado_Zon = :estado WHERE id_Zon = :codZon;';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('estado'=> $estado, 
                         'codZon'=>$codigo));
  } 


 public function obtenerZona($id) {
        $stmt = $this->objPdo->prepare('SELECT * FROM zona where id_Zon = :codigo');
        $stmt->execute(array('codigo' => $id));
        $zona = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $zona[0];
    }
}