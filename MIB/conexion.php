<?php
	class Cconexion{
		public static function ConexionBD(){
			$host='localhost';
			$dbname='CENTROMEDICO';
			$username='SA';
			$pass='Ngt12345';
			$puerto=1433;
			$ConInfo = array("Database"=>"CENTROMEDICO","UID"=>"SA", "PWD"=>"Ngt12345", "CharacterSet"=>"UTF-8");
		$con = sqlsrv_connect($host, $ConInfo);
		
		if($con){
			echo "Conexion Exitosa";
			return $con;
		}
		else echo "Fallo algo";
		}
	}

?>