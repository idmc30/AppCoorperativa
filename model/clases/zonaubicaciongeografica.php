<?php
require_once 'conexion.php';

/**
* 
*/
class ZonaUbicacionGeografica
{
	
private $objPdo;
	function __construct(){
		$this->objPdo = new Conexion();
	}

public function insertarZonaUbicacion($codigozon,$codigouge){
           $sql = "INSERT INTO zonaubicaciongeografica(id_Zon ,id_Uge, estado_Zug)
                   VALUES (:codigoZon, :codigoUge,'A');"; 	
		$stmt = $this->objPdo->prepare($sql);
		$stmt->execute(array('codigoZon' => $codigozon, 
			                 'codigoUge'=> $codigouge));
	}
      
public function listarZonaUbicacionGeografica() {
        $stmt = $this->objPdo->prepare("SELECT id_Zug,estado_Zug,z.id_Zon,nombre_Zon,                                      
                                        i.nombre_Uge AS distrito, 
                                        p.nombre_Uge AS provincia, d.nombre_Uge AS departamento
                                        FROM zonaubicaciongeografica zug
                                        INNER JOIN ubicaciongeografica i on zug.id_Uge  = i.id_Uge
                                        INNER JOIN ubicaciongeografica p ON i.idSub_Uge = p.id_Uge
                                        INNER JOIN ubicaciongeografica d ON p.idSub_Uge = d.id_Uge
                                        inner join zona z on z.id_Zon=zug.id_Zon");
        $stmt->execute();
        $zug = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $zug;
    }

                
public function listarZonaUbicacionGeograficaxidZon($codigozon) {
        $stmt = $this->objPdo->prepare("SELECT id_Zug,estado_Zug,z.id_Zon,nombre_Zon,                                      
                                        i.nombre_Uge AS distrito, 
                                        p.nombre_Uge AS provincia, d.nombre_Uge AS departamento,descripcion_Zon
                                        FROM zonaubicaciongeografica zug
                                        INNER JOIN ubicaciongeografica i on zug.id_Uge  = i.id_Uge
                                        INNER JOIN ubicaciongeografica p ON i.idSub_Uge = p.id_Uge
                                        INNER JOIN ubicaciongeografica d ON p.idSub_Uge = d.id_Uge
                                        inner join zona z on z.id_Zon=zug.id_Zon
                                        where z.id_Zon= :codigoZon");
        $stmt->execute(array('codigoZon' => $codigozon ));
        $zug = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $zug;
    }

public function listarDepartamento() {  
        $stmt = $this->objPdo->prepare('SELECT * FROM ubicaciongeografica 
                                        where tipo_Uge="D" and estado_Uge="A"');
        $stmt->execute();
        $ldepartamento = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $ldepartamento;
    }

public function listarProvincia($idDpto) {  
        $stmt = $this->objPdo->prepare('SELECT * FROM ubicaciongeografica 
                                        where tipo_Uge="P" and estado_Uge="A" and idSub_Uge= :idpto');
        $lprovincia = $stmt->execute(array('idpto' => $idDpto));
        //$stmt->execute();
        $lprovincia = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lprovincia;
    }

public function listarDistrito($idProvincia) {  
        $stmt = $this->objPdo->prepare('SELECT * FROM ubicaciongeografica 
                                        where tipo_Uge="I" and estado_Uge="A" and idSub_Uge= :idprovincia');
        $ldistrito = $stmt->execute(array('idprovincia' => $idProvincia));
        //$stmt->execute();
        $ldistrito = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $ldistrito;
    }

//esta funciones yo la agregue....para usarla en socio
public function listarDepartamentoxId($codProvincia) {  
        $stmt = $this->objPdo->prepare('SELECT * FROM ubicaciongeografica 
                                        where tipo_Uge="P" and estado_Uge="A" and id_Uge= :idprovincia');
        $lprovincia = $stmt->execute(array('idprovincia' => $codProvincia));
        //$stmt->execute();
        $lprovincia = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lprovincia;
    }

//Esto es obtener idDepartamento por provincia
public function obtenerIdDptoxIdProvincia($codProvincia) {  
        $stmt = $this->objPdo->prepare('SELECT idSub_Uge FROM ubicaciongeografica 
                                        where tipo_Uge="P" and estado_Uge="A" and id_Uge= :idprovincia');
        $lprovincia = $stmt->execute(array('idprovincia' => $codProvincia));
        //$stmt->execute();
        $lprovincia = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lprovincia[0];
    }

public function obtenerProvincia($id) {
        $stmt = $this->objPdo->prepare('SELECT * FROM ubicaciongeografica 
                                        where tipo_Uge="P" and estado_Uge="A" and id_Uge= :idprovincia');
        $stmt->execute(array('idprovincia' => $id));
        $getpronvincia = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $getpronvincia[0];
    }

//Obtemer Distrito para socio

public function obtenerDistritoSocio($id) {
        $stmt = $this->objPdo->prepare('SELECT * FROM ubicaciongeografica 
                                        where tipo_Uge="I" and estado_Uge="A" and id_Uge= :idprovincia');
        $stmt->execute(array('idprovincia' => $id));
        $getpronvincia = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $getpronvincia[0];
    }

//-----------------------------------------

public function obtenerZonaUbicacionGeografica($id) {
        $stmt = $this->objPdo->prepare('SELECT pc.id_Pca,pc.id_Per,pc.id_Cargo,p.nombres_Per,p.apellidoPat_Per,p.apellidoMat_Per,p.dni_Per,c.nombre_Car FROM personalcargo pc
                                        inner join personal p on  pc.id_Per=p.id_Per
                                        inner join cargo c on pc.id_Cargo=c.id_cargo where pc.id_Pca=:id');
        $stmt->execute(array('id' => $id));
        $getpersonal = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $getpersonal[0];
    }
     
public function eliminarZonaUbicacionGeografica($idZug) {
        $stmt = $this->objPdo->prepare('DELETE FROM zonaubicaciongeografica WHERE id_Zug = :idZug');
        $rows = $stmt->execute(array('idZug' => $idZug));
        return $rows;
    }
    
public function modificarZonaUbicacionGeografica($idZug, $idZon,$idUge) {
        $stmt = $this->objPdo->prepare('UPDATE zonaubicaciongeografica SET id_Zon =:codzon, id_Uge = :coduge WHERE id_Zug = :codzug');                                       
        $rows = $stmt->execute(array('codzon' => $idZug,
                                    'coduge' => $idZon,
                                    'codzug' => $id_Uge
                                    ));
    }

public function estadoZonaUbicacionGeografica($idZug,$estadoZug){
    $sql='UPDATE zonaubicaciongeografica SET estado_Zug = :estadozug WHERE id_Zug = :idzug';  
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('estadozug'=> $estadoZug, 
                         'idzug'=>$idZug));
  } 

}

?>