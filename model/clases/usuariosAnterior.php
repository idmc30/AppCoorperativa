<?php
require_once 'conexion.php';

class Usuarios 
{
	private $objPdo;
	function __construct(){
		$this->objPdo = new Conexion();
	}

	  public function validar($usu, $pass) {
        $stmt = $this->objPdo->prepare('SELECT * FROM usuario  where usuario = :usu and clave_Usu = :pass and estado_Usu="A"');
				        $stmt->execute(array('usu' => $usu, 'pass'=> $pass));
				        $usuario = $stmt->fetchAll(PDO::FETCH_OBJ);
				       return $usuario[0];
				    }
  
public function validarSocio($usu, $pass){

        $sql = "SELECT * FROM usuario u  
				inner join socio s on s.id_Soc=u.id_Soc
				inner join rol r on u.id_Rol=r.id_rol
               where usuario =:usu and clave_Usu =:pass and estado_Usu='A'";
		$stmt = $this->objPdo->prepare($sql);
		$stmt->execute(array('usu' => $usu, 'pass'=> $pass));
		$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $usuarios;
	}

    public function validarPersonal($usu, $pass){
		
        $sql = "SELECT * FROM usuario u 
				inner join rol r on u.id_rol=r.id_rol
				inner join personalcargo  pcargo on u.id_Pca=pcargo.id_Pca
				inner join cargo c on c.id_Cargo=pcargo.id_Cargo
				inner join personal p on pcargo.id_Per=p.id_Per
				where usuario =:usu and clave_Usu =:pass and estado_Usu='A'";
		$stmt = $this->objPdo->prepare($sql);
		$stmt->execute(array('usu' => $usu, 'pass'=> $pass));
		$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $usuarios;
	}



//SELECT `id_Cah`, `nroAhorro_Cah`, `fechaFirma_Cah`, `fechaInicio_Cah`, `fechaFin_Cah`, `montoDepositado_Cah`, `interesGanado_Cah`, `montoActual_Cah`, `trem_Cah`, `tem_Cah`, `tipo_Cah`, `id_Soc`, `id_Usu`, `estado_Cah`h` FROM `contratoahorro` //



 public function listarUsuario() {
       	$stmt = $this->objPdo->prepare('SELECT  u.id_usu,u.id_Rol,usuario, clave_Usu, estado_Usu,    tipo_Usu,nombres_soc,apellidopat_soc,apellidomat_soc,nombre_rol,NULL as nombre_car
						FROM usuario AS u
						INNER JOIN socio AS s ON s.id_Soc = u.id_Soc
						INNER JOIN rol as r on u.id_rol=r.id_rol
						UNION
						SELECT u.id_usu,u.id_Rol,usuario, clave_Usu, estado_Usu, tipo_Usu,nombres_per,apellidopat_per,apellidomat_per,nombre_Rol,nombre_car
						FROM usuario AS u
						INNER JOIN personalcargo AS pc ON u.id_pca = pc.id_pca
						INNER JOIN cargo as c on  pc.id_cargo=c.id_cargo
						INNER JOIN personal as p on pc.id_per=p.id_per
						INNER JOIN rol as r on u.id_rol=r.id_rol');
       	$stmt->execute();
        $lusuario = $stmt->fetchAll(PDO::FETCH_OBJ);
       	return $lusuario;
    }


  public function insertarUsuario($usu,$claveUsu,$tipoUsu,$idRol,$idPca){
           $sql = "INSERT INTO usuario (usuario,clave_Usu,tipo_Usu,estado_Usu,id_Rol,id_Pca,id_Soc) 
                    VALUES (:usu, :claveUsu, :tipoUsu, 'A', :idRol, :idPca, NULL);";     
        $stmt = $this->objPdo->prepare($sql);
        $stmt->execute(array(  'usu' => $usu, 
                               'claveUsu'=> $claveUsu,
                               'tipoUsu'=> $tipoUsu,
                               'idRol'=> $idRol,
                               'idPca'=> $idPca
                              
                             ));
            
    }

  public function insertarUsuarioSocio($usu,$claveUsu,$tipoUsu,$idRol,$idSoc){
           $sql = "INSERT INTO usuario (usuario,clave_Usu,tipo_Usu,estado_Usu,id_Rol,id_Pca,id_Soc) 
                    VALUES (:usu, :claveUsu, :tipoUsu, 'A', :idRol, NULL, :idSoc);";     
        $stmt = $this->objPdo->prepare($sql);
        $stmt->execute(array(  'usu' => $usu, 
                               'claveUsu'=> $claveUsu,
                               'tipoUsu'=> $tipoUsu,
                               'idRol'=> $idRol,
                               'idSoc'=> $idSoc
                              
                             ));
            
    }


	
      

 public function obtenerUsuario($id) {
        $stmt = $this->objPdo->prepare('SELECT * FROM usuario where id_Usu =:codigo');
        $stmt->execute(array('codigo' => $id));
        $usuario = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $usuario[0];
    }


 public function eliminarUsuario($cod) {
        $stmt = $this->objPdo->prepare('DELETE FROM usuario WHERE id_Usu = :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }


public function estadoUsuario($codigo,$estado){

    $sql='UPDATE usuario SET estado_Usu = :estado WHERE id_Usu = :codUsu';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('estado'=> $estado, 
                         'codUsu'=>$codigo));
  } 





public function restablecerUsuario($codigo,$clave){

    $sql='UPDATE usuario SET clave_Usu =:clave WHERE id_Usu =:codUsu;  ';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('clave'=> $clave, 
                         'codUsu'=>$codigo));
  } 


public function actualizarPasswor($codigo,$clave){

    $sql='UPDATE usuario SET clave_Usu =:clave WHERE id_Usu =:codUsu;  ';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('clave'=> $clave, 
                         'codUsu'=>$codigo));
  } 


   

}
     
