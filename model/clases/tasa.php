<?php
require_once 'conexion.php';

class Tasa{
           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}


	 public function insertarTasa($aniotas,$valortas,$tipotas){
			
			  $sql="INSERT INTO tasa (anio_tas,valor_tas,tipo_tas, estado_tas) VALUES (:aniotas , :valortas, :tipotas, 'I')";
				$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('aniotas' =>$aniotas,
                             'valortas' =>$valortas,
                             'tipotas' =>$tipotas    
                                ));
		} 


     public function listarTea() {
        $stmt = $this->objPdo->prepare('SELECT id_tas,year(anio_tas)as anio_tas,valor_tas,tipo_tas,estado_tas FROM tasa where tipo_tas="T"and year(now())');
        $stmt->execute();
        $tea = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $tea;
    } 

     public function listarTeaLibreDisponibilidad() {
        $stmt = $this->objPdo->prepare('SELECT id_tas,year(anio_tas)as anio_tas,valor_tas,tipo_tas,estado_tas FROM tasa where tipo_tas="L"and year(now())');
        $stmt->execute();
        $teald = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $teald;
    } 
     
      public function listarTemPlazoFijo() {
        $stmt = $this->objPdo->prepare('SELECT id_tas,year(anio_tas) as anio_tas,valor_tas,tipo_tas,estado_tas FROM tasa where tipo_tas="F"and year(now())');
        $stmt->execute();
        $teapfijo = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $teapfijo;
    } 
    
  /* public function listarItf() {
        $stmt = $this->objPdo->prepare('SELECT * FROM tasa where tipo_tas="I"');
        $stmt->execute();
        $menu = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $menu;
    }*/

  public function modificarTasa($idtas,$valortas){
    $sql='UPDATE tasa SET valor_tas = :valortas WHERE id_tas =:idtas;';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('valortas'=> $valortas,
                         'idtas'=> $idtas));
  } 

public function estadoTasa($codigo,$estado){

    $sql='UPDATE tasa SET estado_tas = :estadotas WHERE id_tas = :idtas';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('estadotas'=> $estado, 
                         'idtas'=>$codigo));
  } 

 public function getTasa($id) {
        $stmt = $this->objPdo->prepare('SELECT * FROM tasa  where id_tas = :codigo ');
        $stmt->execute(array('codigo' => $id));
        $tasa = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $tasa[0];
    }

 

 public function getTasaxTipo($tipotas) {
        $stmt = $this->objPdo->prepare('SELECT * FROM tasa  where tipo_tas = :tipotas and estado_tas="A" ');
        $stmt->execute(array('tipotas' => $tipotas));
        $tasa = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $tasa[0];
    }

 public function listarTeaActivo() {
        $stmt = $this->objPdo->prepare('SELECT id_tas,year(anio_tas)as anio_tas,valor_tas,tipo_tas,estado_tas FROM tasa where estado_tas="A" and tipo_tas="T" and year(now())');
           $stmt->execute();
           $lcargo = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $lcargo;
    }

    public function listarItfActivo() {
        $stmt = $this->objPdo->prepare('SELECT id_tas,year(anio_tas)as anio_tas,valor_tas,tipo_tas,estado_tas FROM tasa where estado_tas="A" and tipo_tas="I" and year(now())');
           $stmt->execute();
           $lcargo = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $lcargo;
    }

     public function listarItf() {
        $stmt = $this->objPdo->prepare('SELECT id_tas,year(anio_tas)as anio_tas,valor_tas,tipo_tas,estado_tas FROM tasa where tipo_tas="I" and year(now())');
        $stmt->execute();
        $tea = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $tea;
    } 


      public function tasaActivaPlazoFijo() {
              $stmt = $this->objPdo->prepare('SELECT valor_tas FROM tasa where tipo_tas="F" and estado_tas="A"');
              $stmt->execute();
              $tasaF = $stmt->fetchAll(PDO::FETCH_OBJ);
              return $tasaF[0];
          }

    public function tasaActivaLibreDispobibilidad() {
              $stmt = $this->objPdo->prepare('SELECT valor_tas FROM tasa where tipo_tas="L" and estado_tas="A"');
              $stmt->execute();
              $tasaL = $stmt->fetchAll(PDO::FETCH_OBJ);
              return $tasaL[0];
          }


    //SELECT count(*) FROM tasa where estado_tas="A" and year(now()) and tipo_tas="T"
    /* public function validar($tipotas) {
        $stmt = $this->objPdo->prepare('SELECT*FROM tasa where estado_tas="A" and year(now()) and tipo_tas= :tipotas');
        $stmt->execute(array('tipotas' => $tipotas));
        $total = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $total[0];
    }*/
}
