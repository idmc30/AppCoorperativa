<?php
require_once 'conexion.php';

class Cargo{
           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}


	 public function insertarCargo($cargo){
			
			   $sql="INSERT INTO cargo(nombre_Car, estado_Car) VALUES (:cargo, 'A')";
				$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('cargo' =>$cargo));
		} 

 public function listarCargo() {
           $stmt = $this->objPdo->prepare('SELECT * FROM cargo');
       		 $stmt->execute();
        	 $lcargo = $stmt->fetchAll(PDO::FETCH_OBJ);
       		 return $lcargo;
    }

    //;

    public function eliminarCargo($cod) {
        $stmt = $this->objPdo->prepare('DELETE FROM cargo WHERE id_Cargo = :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }

   


public function modificarCargo($codigo,$descripcion){
    $sql='UPDATE cargo SET nombre_Car = :nomcargo WHERE id_Cargo =:codcargo;';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('nomcargo'=> $descripcion,
                         'codcargo'=> $codigo));
  } 



public function estadoCargo($codigo,$estado){

    $sql='UPDATE cargo SET estado_Car = :estado WHERE id_Cargo = :codcargo';
    
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('estado'=> $estado, 
                         'codcargo'=>$codigo));
  } 


 public function getCargo($id) {
        $stmt = $this->objPdo->prepare('SELECT * FROM cargo where id_Cargo = :codigo');
        $stmt->execute(array('codigo' => $id));
        $cargo = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $cargo[0];
    }


 public function listarCargoActivos() {
        $stmt = $this->objPdo->prepare('SELECT * FROM cargo where estado_Car="A" order by nombre_car');
           $stmt->execute();
           $lcargo = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $lcargo;
    }


}