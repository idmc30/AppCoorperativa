<?php
require_once 'conexion.php';

/**
* 
*/
class Socio{
	
	private $objPdo;
	function __construct(){
		$this->objPdo = new Conexion();
	}

	public function insertarSocio($nomSoc, $apePatSoc,$apeMatSoc,$dniSoc,$direSoc,$telefSoc,$celuSoc,$emailSoc,$idUge,$nSoc,$resolApo,$fechIniSoc){
           $sql = "INSERT INTO socio (nombres_Soc, apellidoPat_Soc,apellidoMat_Soc, dni_Soc, direccion_Soc, telefono_Soc, celular_Soc, email_Soc, estado_Soc, id_Uge, nro_Soc, resolucion_Apo, fechaInicio_Soc, fechaFin_Soc) VALUES (:nomSoc,:apePatSoc, :apeMatSoc,:dniSoc,:dirSoc, :telefonoSoc, :celularSoc, :emailSoc, 'A', :idUge, :nroSoc, :resolucionApo, :fechaInicioSoc, NULL);"; 	
		$stmt = $this->objPdo->prepare($sql);
		$stmt->execute(array('nomSoc' => $nomSoc, 
			                   'apePatSoc'=> $apePatSoc,
			                   'apeMatSoc'=> $apeMatSoc,
                               'dniSoc'=> $dniSoc,
                               'dirSoc'=> $direSoc,
                               'telefonoSoc'=> $telefSoc,
                               'celularSoc'=> $celuSoc,
                               'emailSoc'=> $emailSoc,
                               'idUge'=> $idUge,
                               'nroSoc'=> $nSoc,
                               'resolucionApo'=>$resolApo,
                               'fechaInicioSoc'=>$fechIniSoc

                         ));
			
	}


  public function modificarSocio($nomSoc, $apePatSoc,$apeMatSoc,$dniSoc,$direSoc,$telefSoc,$celuSoc,$emailSoc,$idUge,$resolApo,$idSoc) {
        $stmt = $this->objPdo->prepare('UPDATE socio SET nombres_Soc =:nomSoc,
                                         apellidoPat_Soc = :apellidoPatSoc,
                                         apellidoMat_Soc = :apellidoMatSoc,
                                         dni_Soc = :dniSoc,
                                         direccion_Soc = :direccionSoc,
                                         telefono_Soc = :telefonoSoc,
                                         celular_Soc = :celularSoc,
                                         email_Soc = :emailSoc,
                                         id_Uge = :idUge,
                                         resolucion_Apo =:resolApo WHERE id_Soc =:idSoc;');                                        
        $rows = $stmt->execute(array('nomSoc' => $nomSoc,
                                    'apellidoPatSoc' => $apePatSoc,
                                    'apellidoMatSoc' => $apeMatSoc, 
                                    'dniSoc' => $dniSoc, 
                                    'direccionSoc' => $direSoc, 
                                    'telefonoSoc' => $telefSoc,
                                    'celularSoc' => $celuSoc,
                                    'emailSoc' => $emailSoc,
                                    'idUge' => $idUge,
                                    'resolApo' => $resolApo,
                                    'idSoc' => $idSoc));
    }


  public function modificarSociosinDni($nomSoc, $apePatSoc,$apeMatSoc,$direSoc,$telefSoc,$celuSoc,$emailSoc,$idUge,$resolApo,$idSoc) {
        $stmt = $this->objPdo->prepare('UPDATE socio SET nombres_Soc =:nomSoc,
                                         apellidoPat_Soc = :apellidoPatSoc,
                                         apellidoMat_Soc = :apellidoMatSoc,
                                         direccion_Soc = :direccionSoc,
                                         telefono_Soc = :telefonoSoc,
                                         celular_Soc = :celularSoc,
                                         email_Soc = :emailSoc,
                                         id_Uge = :idUge,
                                         resolucion_Apo =:resolApo WHERE id_Soc =:idSoc;');                                        
        $rows = $stmt->execute(array('nomSoc' => $nomSoc,
                                    'apellidoPatSoc' => $apePatSoc,
                                    'apellidoMatSoc' => $apeMatSoc, 
                                    'direccionSoc' => $direSoc, 
                                    'telefonoSoc' => $telefSoc,
                                    'celularSoc' => $celuSoc,
                                    'emailSoc' => $emailSoc,
                                    'idUge' => $idUge,
                                    'resolApo' => $resolApo,
                                    'idSoc' => $idSoc));
    }

    
   public function listarSocio() {
        $stmt = $this->objPdo->prepare('SELECT * FROM socio s
                                        inner join ubicaciongeografica ubg on s. id_Uge=ubg.id_Uge
                                        order by apellidoPat_soc ');
        $stmt->execute();
        $socio = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $socio;
    }

   public function listarSocioActivo() {
        $stmt = $this->objPdo->prepare("SELECT * FROM socio s
                                        inner join ubicaciongeografica ubg on s. id_Uge=ubg.id_Uge where estado_Soc='A'
                                        order by apellidoPat_Soc ");
        $stmt->execute();
        $socio = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $socio;
    }

     
   public function listarSociodos() {
        $stmt = $this->objPdo->prepare('SELECT * FROM socio s
                                        order by apellidoPat_soc ');
        $stmt->execute();
        $socio = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $socio;
    }


//esta funcion la estoy usando en usuarios
  public function getSocioxDni($dni) {
        $stmt = $this->objPdo->prepare('SELECT * FROM socio where dni_Soc=:dni');
        $stmt->execute(array('dni' => $dni));
        $getsocio = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $getsocio[0];
    }

  public function getSocio($id) {
        $stmt = $this->objPdo->prepare('SELECT s.*, ub.idSub_Uge as idProvincia,ub1.idSub_Uge as idDpto FROM socio s
                                        inner join ubicaciongeografica ub on s.id_Uge=ub.id_Uge
                                        inner join ubicaciongeografica ub1 on ub.idSub_Uge=ub1.id_Uge where id_Soc=:id');
        $stmt->execute(array('id' => $id));
        $getsocio = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $getsocio[0];
    }

  public function eliminarSocio($cod) {
        $stmt = $this->objPdo->prepare('DELETE FROM socio WHERE id_Soc = :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }

public function estadoSocio($codigo,$estado){

    $sql='UPDATE socio SET estado_Soc = :estado WHERE id_Soc = :codsocio';
    
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('estado'=> $estado, 
                         'codsocio'=>$codigo));
  } 

public function fechaFinSocio($fechaFinSoc,$idSoc){
    $sql='UPDATE  socio SET  fechaFin_Soc = :fechaFinSoc WHERE  id_Soc  = :idSoc';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('fechaFinSoc'=> $fechaFinSoc, 
                         'idSoc'=>$idSoc));
  } 


  public function getnumSocion() {
        $stmt = $this->objPdo->prepare('SELECT MAX(id_Soc) AS id_Soc, MAX(nro_Soc) AS nro_Soc FROM socio');
        $stmt->execute();
        $ncta = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $ncta[0];
    }

}



?>