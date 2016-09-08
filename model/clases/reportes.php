<?php 

require_once 'conexion.php';

class Reporte {

private $objPdo;

    public function __construct() {
 
        $this->objPdo = new Conexion();
    }


/*
public function listarSocioFechxCcrActivo($fechaInicioSoc,$fechInicioSocfin,$tipoCah) {  
        $stmt = $this->objPdo->prepare("SELECT socio.id_Soc, nombres_Soc, apellidoPat_Soc, apellidoMat_Soc, dni_Soc, direccion_Soc, telefono_Soc, celular_Soc, email_Soc, estado_Soc, id_Uge, nro_Soc, resolucion_Apo,DATE_FORMAT(fechaInicio_Soc,'%d-%m-%Y') as fechaInicio_Soc,DATE_FORMAT(fechaFin_Soc,'%d-%m-%Y') as fechaFin_Soc ,id_Cah, nroAhorro_Cah,DATE_FORMAT(fechaFirma_Cah,'%d-%m-%Y') as fechaFirma_Cah, DATE_FORMAT(fechaInicio_Cah,'%d-%m-%Y') as fechaInicio_Cah  , DATE_FORMAT(fechaFin_Cah,'%d-%m-%Y') as fechaFin_Cah , montoDepositado_Cah, interesGanado_Cah, montoActual_Cah, trem_Cah, tem_Cah, tipo_Cah, id_Usu, estado_Cah FROM socio
                                        INNER JOIN contratoahorro ON socio.id_Soc=contratoahorro.id_Soc
									    WHERE contratoahorro.estado_Cah='A' and tipo_Cah=:tipoCah and fechaInicio_Soc between :fechaInicioSoc and :fechInicioSocfin");
        $lsocccr = $stmt->execute(array('fechaInicioSoc' => $fechaInicioSoc,
        	                            'fechInicioSocfin' => $fechInicioSocfin,
        	                            'tipoCah' => $tipoCah));
        $lsocccr = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lsocccr;
    }*/



 public function listarSocioxFecha($fechaInicioSoc,$fechInicioSocfin) {  
        $stmt = $this->objPdo->prepare('SELECT*FROM socio WHERE  fechaInicio_Soc between :fechaInicioSoc and :fechInicioSocfin');
        $lsocccr = $stmt->execute(array('fechaInicioSoc' => $fechaInicioSoc,
                                        'fechInicioSocfin' => $fechInicioSocfin
                                        ));
        $lsocccr = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lsocccr;
    }

     
     

 public function listarContxSocio($idSoc){  
        $stmt = $this->objPdo->prepare("SELECT id_Cah, nroAhorro_Cah, fechaFirma_Cah,DATE_FORMAT(fechaInicio_Cah,'%d-%m-%Y') as fechaInicio_Cah , DATE_FORMAT(fechaFin_Cah,'%d-%m-%Y') as fechaFin_Cah , montoDepositado_Cah, interesGanado_Cah, montoActual_Cah,  tipo_Cah, id_Usu, estado_Cah FROM socio
                                            INNER JOIN contratoahorro ON socio.id_Soc=contratoahorro.id_Soc
                                            where socio.id_Soc=:idSoc and contratoahorro.estado_Cah='A' 
                                            UNION 
                                            SELECT id_Ccr, nrocredito_Ccr,NULL as fechaFirma_Cah ,DATE_FORMAT(fechaInicio_Ccr,'%d-%m-%Y') ,DATE_FORMAT(fechaFin_Ccr,'%d-%m-%Y'), montoCredito_Ccr, nroCuota_Ccr, segruo_Ccr,   montoCuota_Ccr,id_Usu, estado_Ccr FROM socio
                                            INNER JOIN contratocredito ON socio.id_Soc=contratocredito.id_Soc
                                            where socio.id_Soc=:idSoc and contratocredito.estado_Ccr='A' ");
        $lcontxSocio = $stmt->execute(array('idSoc' => $idSoc ));
        $lcontxSocio = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lcontxSocio;
    }



 public function listarPagosxFecha($fechaInicioP,$fechaFinP){  
        $stmt = $this->objPdo->prepare("SELECT * FROM pago
        INNER JOIN cuota on pago.id_Cuo=cuota.id_Cuo
        INNER JOIN contratocredito on cuota.id_Ccr=contratocredito.id_Ccr
        INNER JOIN socio on contratocredito.id_Soc=socio.id_Soc 
        WHERE  fecha_Pag between :fechaInicioP and :fechaFinP  AND estado_Pag = 'C'");
        $ldepretir = $stmt->execute(array('fechaInicioP' => $fechaInicioP,
                                            'fechaFinP' => $fechaFinP ));
        $lpago = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lpago;
    }



public function SumaTotalPagosxFecha($fechaInicioP,$fechaFinP){  
        $stmt = $this->objPdo->prepare("SELECT SUM(monto_Pag) as TotalPago FROM pago
                                    INNER JOIN cuota on pago.id_Cuo=cuota.id_Cuo
                                    INNER JOIN contratocredito on cuota.id_Ccr=contratocredito.id_Ccr
                                    INNER JOIN socio on contratocredito.id_Soc=socio.id_Soc 
                                    WHERE  fecha_Pag between :fechaInicioP and :fechaFinP  AND estado_Pag = 'C'");
        $stmt->execute(array('fechaInicioP' => $fechaInicioP,
                             'fechaFinP' => $fechaFinP ));
        $montoPago = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $montoPago[0];
    }





 public function listarContxFecha($fechaInicioC,$fechaFinC){  
        $stmt = $this->objPdo->prepare("SELECT id_Cah, nroAhorro_Cah, fechaFirma_Cah,DATE_FORMAT(fechaInicio_Cah,'%d-%m-%Y') as fechaInicio_Cah , DATE_FORMAT(fechaFin_Cah,'%d-%m-%Y') as fechaFin_Cah , montoDepositado_Cah, interesGanado_Cah, montoActual_Cah,  tipo_Cah, id_Usu, estado_Cah,apellidoPat_Soc,apellidoMat_Soc,nombres_Soc,dni_Soc,direccion_Soc,telefono_Soc,celular_Soc FROM socio 
                                            INNER JOIN contratoahorro ON socio.id_Soc=contratoahorro.id_Soc
                                            where  fechaInicio_Cah BETWEEN :fechaInicioC AND :fechaFinC
                                            UNION 
                                              SELECT id_Ccr, nrocredito_Ccr,NULL as fechaFirma_Cah ,DATE_FORMAT(fechaInicio_Ccr,'%d-%m-%Y') ,DATE_FORMAT(fechaFin_Ccr,'%d-%m-%Y'), montoCredito_Ccr, nroCuota_Ccr, montoCredito_Ccr, NULL AS montoCuota_Ccr,id_Usu, estado_Ccr,apellidoPat_Soc,apellidoMat_Soc,nombres_Soc,dni_Soc,direccion_Soc,telefono_Soc,celular_Soc FROM socio
                                            INNER JOIN contratocredito ON socio.id_Soc=contratocredito.id_Soc
                                            where fechaInicio_Ccr BETWEEN :fechaInicioC AND :fechaFinC");
        $lcontxFecha= $stmt->execute(array('fechaInicioC' => $fechaInicioC , 
                                            'fechaFinC' => $fechaFinC ));
        $lcontxFecha = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lcontxFecha;
    }



 public function listarSociosxZona($idZon,$tipoContrato){  

        $consulta="SELECT S.apellidoPat_Soc,S.apellidoMat_Soc,S.nombres_Soc,S.dni_Soc, U.nombre_Uge,
                                        S.direccion_Soc,CA.nroAhorro_Cah AS nroContrato_Con,CASE tipo_Cah WHEN 'F' THEN 'Plazo Fijo'
                                        WHEN 2 THEN 'L' ELSE 'Libre Disponibilidad' END AS tipo_Acc,CA.fechaInicio_Cah AS fecha_Con,
                                        'Contrato de Ahorro' AS 'tipo_Con'
                                        FROM zona Z
                                        INNER JOIN zonaubicaciongeografica ZU ON ZU.id_Zon=Z.id_Zon
                                        INNER JOIN ubicaciongeografica U ON ZU.id_Uge=U.id_Uge
                                        INNER JOIN socio S ON S.id_Uge=U.id_Uge
                                        INNER JOIN contratoahorro CA ON CA.id_Soc=S.id_Soc 
                                        WHERE Z.id_Zon=:idZon AND CA.estado_Cah='A'
                                        UNION
                                        SELECT S.apellidoPat_Soc,S.apellidoMat_Soc,S.nombres_Soc,S.dni_Soc, U.nombre_Uge,
                                        S.direccion_Soc,CC.nrocredito_Ccr  AS nroContrato_Con,'Crédito' AS tipo_Acc,CC.fechaInicio_Ccr AS fecha_Con,
                                        'Contrato de Crédito' AS 'tipo_Con'
                                        FROM zona Z
                                        INNER JOIN zonaubicaciongeografica ZU ON ZU.id_Zon=Z.id_Zon
                                        INNER JOIN ubicaciongeografica U ON ZU.id_Uge=U.id_Uge
                                        INNER JOIN socio S ON S.id_Uge=U.id_Uge
                                        INNER JOIN contratocredito CC ON CC.id_Soc=S.id_Soc                                        
                                        WHERE Z.id_Zon=:idZon AND CC.estado_Ccr='A' ";

        if ($tipoContrato=="A"){
        $consulta="SELECT * FROM ( " . $consulta.  " ) AS T1 WHERE T1.tipo_Con='Contrato de Ahorro' ";
        }
        if ($tipoContrato=="C"){
        $consulta="SELECT * FROM ( " . $consulta.  " ) AS T1 WHERE T1.tipo_Con='Contrato de Crédito' ";
        }

        $stmt = $this->objPdo->prepare($consulta);
        $lSocioxZona = $stmt->execute(array('idZon' => $idZon ));
        $lSocioxZona = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lSocioxZona;
    }


 public function listarAportes($fechaIni,$fechaFin){  

        $consulta="SELECT nombres_Soc,apellidoPat_Soc,apellidoMat_Soc,dni_Soc,cuota_Apo,DATE_FORMAT(fecha_Apo,'%d-%m-%Y') as fecha_Apo,
                    CASE mes_Apo
                    WHEN 1 THEN 'Enero'
                    WHEN 2 THEN 'Febrero' 
                    WHEN 3 THEN 'Marzo'
                    WHEN 4 THEN 'Abril' 
                    WHEN 5 THEN 'Mayo'
                    WHEN 6 THEN 'Junio' 
                    WHEN 7 THEN 'Julio'
                    WHEN 8 THEN 'Agosto' 
                    WHEN 9 THEN 'Septiembre'
                    WHEN 10 THEN 'Octubre' 
                    WHEN 11 THEN 'Noviembre'
                    WHEN 12 THEN 'Diciembre' 
                    END AS mes_Apo,
                    CASE estado_Apo
                    WHEN 'P' THEN 'Pagado'
                    WHEN 'D' THEN 'Debe' 
                    END AS estado_Apo
                    from montoaporte MA
                    inner join aporte A on MA.id_Map=A.id_Map
                    inner join socio S on S.id_Soc=A.id_Soc
                    where DATE(fecha_Apo) between DATE(:fechaIni) and DATE(:fechaFin) ";

        /*if ($tipoContrato=="A"){
        $consulta="SELECT * FROM ( " . $consulta.  " ) AS T1 WHERE T1.tipo_Con='Contrato de Ahorro' ";
        }
        if ($tipoContrato=="C"){
        $consulta="SELECT * FROM ( " . $consulta.  " ) AS T1 WHERE T1.tipo_Con='Contrato de Crédito' ";
        }
        */

        $stmt = $this->objPdo->prepare($consulta);
        $lAportes = $stmt->execute(array('fechaIni' => $fechaIni,
                                         'fechaFin' => $fechaFin
                                        ));
        $lAportes = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lAportes;
    }
    

 public function listarRetiroDesposito($fechaInicioM,$fechaFinM,$tipoMov){  
        $stmt = $this->objPdo->prepare("SELECT * FROM movimiento INNER JOIN usuario  on movimiento.id_Usu=usuario.id_Usu
                                        INNER JOIN personalcargo on usuario.id_Pca=personalcargo.id_Pca
                                        INNER JOIN personal on personalcargo.id_Per=personal.id_Per
            where tipo_Mov= :tipoMov and fecha_Mov between  :fechaInicioM and :fechaFinM and condicion_Mov='N'");
        $ldepretir = $stmt->execute(array('fechaInicioM' => $fechaInicioM,
                                            'fechaFinM' => $fechaFinM,
                                            'tipoMov' => $tipoMov ));
        $ldepretir = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $ldepretir;
    }

    
 
 public function montoTotalDepositoRetiro($fechaInicioM,$fechaFinM,$tipoMov) {
        $stmt = $this->objPdo->prepare('SELECT sum(monto_Mov) as montoTotal FROM movimiento 
                                        INNER JOIN usuario  on movimiento.id_Usu=usuario.id_Usu
                                        INNER JOIN personalcargo on usuario.id_Pca=personalcargo.id_Pca
                                        INNER JOIN personal on personalcargo.id_Per=personal.id_Per
                                        where tipo_Mov= :tipoMov and fecha_Mov between  :fechaInicioM and :fechaFinM and condicion_Mov="N"');
        $stmt->execute(array('fechaInicioM' => $fechaInicioM,
                             'fechaFinM' => $fechaFinM,
                             'tipoMov' => $tipoMov ));
        $montototal = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $montototal[0];
    }






 public function listarDeudasxFecha($fechaInicioD,$fechaFinD){  
        $stmt = $this->objPdo->prepare("SELECT * FROM cuota
                        INNER JOIN contratocredito on cuota.id_Ccr=contratocredito.id_Ccr
                        INNER JOIN socio on contratocredito.id_Soc=socio.id_Soc
                        WHERE  fecha_Cuo between :fechaInicioD and :fechaFinD  AND estado_Cuo = 'P'");
        $ldeudasxfecha = $stmt->execute(array('fechaInicioD' => $fechaInicioD,
                                            'fechaFinD' => $fechaFinD ));
        $ldeudas = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $ldeudas;
    }


 public function montoTotalDeuda($fechaInicioD,$fechaFinD) {
        $stmt = $this->objPdo->prepare('SELECT SUM(monto_Cuo) AS MontoTotal_Deuda FROM cuota
                                        INNER JOIN contratocredito on cuota.id_Ccr=contratocredito.id_Ccr
                                        INNER JOIN socio on contratocredito.id_Soc=socio.id_Soc
                                        WHERE  fecha_Cuo between :fechaInicioD and :fechaFinD  AND estado_Cuo = "P"');
        $stmt->execute(array('fechaInicioD' => $fechaInicioD,
                             'fechaFinD' => $fechaFinD));
        $montototal = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $montototal[0];
    }




}



?>
