<?php
require_once 'conexion.php';

class Aporte{

private $objPdo;

function __construct(){
$this->objPdo = new Conexion();
}

public function listarMontoAporteActivos() {
        $stmt = $this->objPdo->prepare("SELECT * FROM montoaporte 
                                        where estado_Map='A' order by anio_Map desc");
           $stmt->execute();
           $lmontoAporte = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $lmontoAporte;
}

public function listarSociosxAnio($anio) {
		   
           $stmt = $this->objPdo->prepare("SELECT *,month(fechaInicio_Soc) as mes, year(fechaInicio_Soc) as anio  from socio
                                           where estado_Soc='A' and year(fechaInicio_Soc) <= :anio");           
           $lsocio = $stmt->execute(array('anio'=>$anio));        
           $lsocio = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $lsocio; 
}

public function listarSociosxAnioxId($idSocio) {

       
           $stmt = $this->objPdo->prepare("SELECT id_Soc,month(fechaInicio_Soc) as mes, year(fechaInicio_Soc) as anio  from socio
                                           where estado_Soc='A' and id_Soc= :id" );           
           $lsocio = $stmt->execute(array('id'=>$idSocio));         
           $lsocio = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $lsocio;
}


public function listarSoloMeses($idSocio,$mesSocio,$anioSel) {
       
          $stmt = $this->objPdo->prepare("SELECT id_Apo,anio_Map, id_Mes, nombre_Mes, monto_Map, cuota_Apo, estado_Apo, fechaInicio_Soc, fecha_Apo FROM socio AS s
                                          INNER JOIN aporte AS a ON s.id_Soc=a.id_Soc
                                          INNER JOIN montoaporte AS ma ON ma.id_Map=a.id_Map
                                          INNER JOIN mes AS m ON m.id_Mes = a.mes_Apo
                                          WHERE id_Mes>= :mes and anio_Map= :anio and s.id_Soc= :id
                                          UNION
                                          SELECT IF(1<2,NULL,'') AS id_Apo,anio_Map, id_Mes, nombre_Mes, monto_Map,IF(1<2,NULL,'') AS cuota_Apo,
                                          IF(1<2,NULL,'') AS estado_Apo,
                                          fechaInicio_Soc, IF(1<2,NULL,'') AS fecha_Apo
                                          FROM mes AS m, montoaporte AS ma,socio AS s
                                          WHERE id_Mes>= :mes and anio_Map= :anio and s.id_Soc= :id AND id_Mes NOT 
                                          IN(SELECT mes_Apo FROM montoaporte ma
                                          INNER JOIN aporte AS a ON ma.id_Map=a.id_Map
                                          INNER JOIN socio AS s ON s.id_Soc=a.id_Soc
                                          WHERE id_Mes>= :mes and anio_Map= :anio and s.id_Soc= :id)
                                          ORDER BY id_Mes ASC");

           $lmes = $stmt->execute(array('mes' =>$mesSocio,
                                        'anio'=>$anioSel,
                                        'id'=>$idSocio));        
           $lmes = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $lmes;
}



public function listarTodoMeses($idSocio,$mesSocio,$anioSel) {       
           $stmt = $this->objPdo->prepare("SELECT id_Apo,anio_Map, id_Mes, nombre_Mes, monto_Map, cuota_Apo, estado_Apo, fechaInicio_Soc, fecha_Apo FROM socio AS s
                                          INNER JOIN aporte AS a ON s.id_Soc=a.id_Soc
                                          INNER JOIN montoaporte AS ma ON ma.id_Map=a.id_Map
                                          INNER JOIN mes AS m ON m.id_Mes = a.mes_Apo
                                          WHERE id_Mes>= :mes and anio_Map= :anio and s.id_Soc= :id
                                          UNION
                                          SELECT IF(1<2,NULL,'') AS id_Apo,anio_Map, id_Mes, nombre_Mes, monto_Map,IF(1<2,NULL,'') AS cuota_Apo,
                                          IF(1<2,NULL,'') AS estado_Apo,
                                          fechaInicio_Soc, IF(1<2,NULL,'') AS fecha_Apo
                                          FROM mes AS m, montoaporte AS ma,socio AS s
                                          WHERE id_Mes>= :mes and anio_Map= :anio and s.id_Soc= :id AND id_Mes NOT 
                                          IN(SELECT mes_Apo FROM montoaporte ma
                                          INNER JOIN aporte AS a ON ma.id_Map=a.id_Map
                                          INNER JOIN socio AS s ON s.id_Soc=a.id_Soc
                                          WHERE id_Mes>= :mes and anio_Map= :anio and s.id_Soc= :id)
                                          ORDER BY id_Mes ASC");           
           $lmes = $stmt->execute(array('mes' =>$mesSocio,
                                        'anio'=>$anioSel,
                                        'id'=>$idSocio));        
           $lmes = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $lmes;    
}

public function insertarAporte($idSoc, $idMap,$cuota,$mes,$tipo,$fecha,$estado){
           $sql = "INSERT INTO aporte(cuota_Apo,mes_Apo,tipo_Apo,fecha_Apo,estado_Apo,id_Soc,id_Map) VALUES(:cuota, :mes, :tipo, :fecha, :estado, :idSoc, :idMap)";   
           $stmt = $this->objPdo->prepare($sql);
           $stmt->execute(array('cuota' => $cuota, 
                                'mes'=> $mes,
                                'tipo'=> $tipo,
                                'fecha'=> $fecha,
                                'estado'=> $estado,
                                'idSoc'=> $idSoc,
                                'idMap'=> $idMap));         
}

public function eliminarAporte($id) {
    $stmt = $this->objPdo->prepare('DELETE FROM aporte WHERE id_Apo = :id');
    $rows = $stmt->execute(array('id' => $id));
    return $rows;
}

public function estadoAporte($id,$estado){
      $sql='UPDATE aporte SET estado_Apo = :estado WHERE id_Apo = :idApo';    
      $stmt=$this->objPdo->prepare($sql);
      $stmt->execute(array('estado'=> $estado, 
                           'idApo'=>$id));
} 

public function modificarAporte($idAporte, $fecha){
    $sql='UPDATE aporte SET fecha_Apo = :fecha WHERE id_Apo =:id';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('fecha'=> $fecha,
                         'id'=> $idAporte));
} 

public function imprimirAporte($idApo) {
        $stmt = $this->objPdo->prepare("SELECT id_Apo,cuota_Apo,mes_Apo,tipo_Apo,fecha_Apo,estado_Apo,s.id_Soc,nombres_Soc,apellidoPat_Soc,
                                           apellidoMat_Soc,dni_Soc,direccion_Soc,telefono_Soc,celular_Soc from aporte a 
                                           inner join socio s on s.id_Soc=a.id_Soc
                                           where id_Apo= :idapo");           
        $stmt->execute(array('idapo' => $idApo));
        $laporte= $stmt->fetchAll(PDO::FETCH_OBJ);
        return $laporte[0];
}



}

