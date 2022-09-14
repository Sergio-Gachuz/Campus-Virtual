<?php
    session_start();
	include('config.php');

    class empleado{
        var $conn= null;
        
        function __construct(){}

	// ! Conexión a la BD
		function conexion(){
			include 'config.php';
			$this->conn = new PDO($sgbd.':host='.$bdhost.';dbname='.$bdbase, $bdusuario);
		}

	// ! Codigo
    	// * * Cerrar Sesion
		function log_out(){
			session_destroy();
			unset($_SESSION);
			$_SESSION['validado'] = false;
		}

		// * * Lista de Departamentos
		function departamentos(){
			$this->conexion();
	        $sql = "SELECT * FROM departamento";
	        $sentencia = $this->conn->prepare($sql);
	        $sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_departamento"]]["id_departamento"]=$fila["id_departamento"];
				$datos[$fila["id_departamento"]]["descripcion"]=$fila["descripcion"];
				$i++;
	        }
	        return $datos;
		}

		// * * Lista de Direcciones
		function direccion(){
			$this->conexion();
	        $sql = "SELECT * FROM direccion";
	        $sentencia = $this->conn->prepare($sql);
	        $sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_direccion"]]["id_direccion"]=$fila["id_direccion"];
				$datos[$fila["id_direccion"]]["descripcion"]=$fila["descripcion"];
				$i++;
	        }
	        return $datos;
		}

		// * * Lista de Roles
		function roles(){
			$this->conexion();
	        $sql = "SELECT * FROM rol";
	        $sentencia = $this->conn->prepare($sql);
	        $sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_rol"]]["id_rol"]=$fila["id_rol"];
				$datos[$fila["id_rol"]]["rol"]=$fila["rol"];
				$i++;
	        }
	        return $datos;
		}

        // * * Ver Información
		function persona($id_usuario){
			$this->conexion();
			$sql = 'SELECT * FROM persona inner join usuario USING (id_usuario) inner JOIN direccion USING(id_direccion) WHERE id_usuario = :id_usuario';
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_usuario', $id_usuario);
			$sentencia->execute();
			return $sentencia->fetch();
		}

		// * * Inicio de Sesión
		function log_in_empleado($num_nomina, $id_nomina, $contrasena){
			$this->conexion();
			$contrasena = md5($contrasena);
			$sql = 'SELECT usuario.num_nomina, usuario.id_nomina, contrasena, id_persona, usuario.id_usuario, id_direccion FROM usuario
				INNER JOIN persona ON persona.id_usuario = usuario.id_usuario where usuario.num_nomina = :num_nomina 
				AND usuario.id_nomina = :id_nomina AND contrasena = :contrasena';
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':num_nomina', $num_nomina);
			$sentencia->bindParam(':id_nomina', $id_nomina);
			$sentencia->bindParam(':contrasena', $contrasena);
			$sentencia->execute();
			$fila = $sentencia->fetch(PDO::FETCH_ASSOC);
			if (isset($fila['num_nomina']) && isset($fila['id_nomina'])) {
				$_SESSION = $fila;
				$_SESSION['validado'] = true;
				$_SESSION['roles'] = $this->rol($fila['id_usuario']);
				header('Location: index.php');
			}else{
				$this->log_out();
				echo "<script> alert('Datos incorrectos. Inténtelo de nuevo.'); </script>";
			}
		}

		// * * Roles del Empleado
		function rol($id_usuario){
			$this->conexion();
			$sql = 'SELECT rol, id_rol FROM usuario_rol INNER JOIN rol using(id_rol) where id_usuario = :id_usuario';
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_usuario', $id_usuario);
			$sentencia->execute();
			$i = 0;
			$roles = array();
			while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
				$roles[$i]['rol'] = $fila['rol'];
				$roles[$i]['id_rol'] = $fila['id_rol'];
				$i++;
			}
			return $roles;
		}

		// * * Registro
		function registrar($data){
			$this->conexion($data);
			$consulta = $this->conn->prepare("SELECT * FROM persona p INNER JOIN usuario u ON p.id_usuario = u.id_usuario 
				WHERE u.num_nomina = :num_nomina AND u.id_nomina = :id_nomina");
			$consulta->bindParam(':num_nomina', $data['num_nomina']);
			$consulta->bindParam(':id_nomina', $data['id_nomina']);
  			$consulta->execute();
  			$num_rows = $consulta->fetchColumn();
			if ($num_rows == 1){ 
    			echo '<script> alert("El usuario ya existe"); </script>'; 
  			}else{
    			$this->conn->beginTransaction();
				try{
					$sql = 'INSERT INTO usuario(num_nomina, id_nomina, contrasena) VALUES (:num_nomina, :id_nomina, :contrasena)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindParam(':num_nomina', $data['num_nomina']);
					$sentencia->bindParam(':id_nomina', $data['id_nomina']);

					$data['contrasena'] = md5($data['contrasena']);
					$sentencia->bindParam(':contrasena', $data['contrasena']);
					$sentencia->execute();

					$sql = 'SELECT * FROM usuario WHERE num_nomina = :num_nomina and id_nomina = :id_nomina';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindParam(':num_nomina', $data['num_nomina']);
					$sentencia->bindParam(':id_nomina', $data['id_nomina']);
					$sentencia->execute();
					$fila = $sentencia->fetch();
					
					$sql = 'INSERT INTO persona( nombre, telefono, id_usuario, id_nomina, id_departamento, id_direccion) 
						VALUES (:nombre, :telefono, :id_usuario, :id_nomina, :id_departamento, :id_direccion)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':nombre', $data['nombre']);
					$sentencia->bindValue(':telefono', $data['telefono']);
					$sentencia->bindValue(':id_usuario', $fila['id_usuario']);
					$sentencia->bindValue(':id_nomina', $data['id_nomina']);
					$sentencia->bindValue(':id_departamento', $data['id_departamento']);
					$sentencia->bindValue(':id_direccion', $data['id_direccion']);
					$sentencia->execute();

					$rol = $data['id_rol'];
					$sql = 'INSERT INTO usuario_rol(id_rol, id_usuario) VALUES (:id_rol, :id_usuario)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_rol', $rol);
					$sentencia->bindValue(':id_usuario', $fila['id_usuario']);
					$sentencia->execute();

					$this->conn->commit();
					header('Location: log-in.php');
				}catch(Exception $e){
					$this->conn->rollBack();
					echo '<script> alert("No procedio el registro. Intentelo de nuevo."); </script>'; 
				}
			}
		}

		// * * Validar Roles
		function validar_rol($roles_permitidos){
			$roles_usuario = $_SESSION['roles'];
			$rol_valido = false;
			foreach ($roles_usuario as $rol) {
				if (in_array($rol['rol'], $roles_permitidos)) {
					$rol_valido = true;
					return $rol['rol'];
				}
			}
			if ($rol_valido == false) {
				echo '<script> alert("No procedio el registro. Intentelo de nuevo."); </script>'; 
			}
		}

		// * * Historico de Tests
		function historico($id_persona){
			$this->conexion();
			$sql = "SET lc_time_names = 'es_ES'";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->execute();

	        $sql = "SELECT id_persona, examen.id_examen, examen, DATE_FORMAT(fecha, '%e de %M del %Y') as fecha FROM persona_examen
				inner join examen on persona_examen.id_examen = examen.id_examen 
				WHERE id_persona = :id_persona ORDER BY YEAR(persona_examen.fecha), MONTH(persona_examen.fecha), DAY(persona_examen.fecha)";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
	        $sentencia->execute();
			$i = 0;
			$datos = array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_examen"]]["examen"] = $fila["examen"];
				$datos[$fila["id_examen"]]["fecha"] = $fila["fecha"];
				$i++;
			}
	        return $datos;
		}

		// * * Registro de Test de Hábitos Alimenticios
		function habitos_alimenticios($data){
			$this->conexion();
			$consulta = $this->conn->prepare("SELECT * FROM persona_examen WHERE id_persona = :id_persona AND id_examen = 2");
			$consulta->bindParam(':id_persona', $data['id_persona']);
			$consulta->execute();
  			$num_rows = $consulta->fetchColumn();
			if ($num_rows == 1){ 
    			echo '<script> alert("Usted ya ha realizado este examen"); </script>';
				header("Location: index.php"); 
  			}else{
				$this->conn->beginTransaction();
				try{
					$sql = 'INSERT INTO persona_examen(id_persona, id_examen, fecha) VALUES (:id_persona, 2, NOW())';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindParam(':id_persona', $data['id_persona']);
					$sentencia->execute();

					$sql = 'INSERT INTO examen_nutricion(id_persona, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15) 
						VALUES (:id_persona, :p1, :p2, :p3, :p4, :p5, :p6, :p7, :p8, :p9, :p10, :p11, :p12, :p13, :p14, :p15)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindParam(':id_persona', $data['id_persona']);
					$sentencia->bindParam(':p1', $data['p1']);
					$sentencia->bindParam(':p2', $data['p2']);
					$sentencia->bindParam(':p3', $data['p3']);
					$sentencia->bindParam(':p4', $data['p4']);
					$sentencia->bindParam(':p5', $data['p5']);
					$sentencia->bindParam(':p6', $data['p6']);
					$sentencia->bindParam(':p7', $data['p7']);
					$sentencia->bindParam(':p8', $data['p8']);
					$sentencia->bindParam(':p9', $data['p9']);
					$sentencia->bindParam(':p10', $data['p10']);
					$sentencia->bindParam(':p11', $data['p11']);
					$sentencia->bindParam(':p12', $data['p12']);
					$sentencia->bindParam(':p13', $data['p13']);
					$sentencia->bindParam(':p14', $data['p14']);
					$sentencia->bindParam(':p15', $data['p15']);
					$sentencia->execute();
					
					$this->conn->commit();
					header('Location: guardar_habitos.html');
				}catch(Exception $e){
					$this->conn->rollBack();
					echo '<script> alert("No se guardaron correctamente sus respuestas. Realizar de Nuevo."); </script>';
				}
			}
		}

		// * * Registro de Bloque 1 de la Bateria para Conductores
		function bateria_bloq1($data){
			$this->conexion($data);
			$this->conn->beginTransaction();
				try{
					$sql = 'INSERT INTO bateria_bloq1(id_persona, p1_1, p1_2, p1_3, p1_4, p1_5, p1_6, p1_7, p1_8, p1_9, p1_10, p1_11, p1_12, p1_13, p1_14, p1_15,
						p1_16, p1_17, p1_18, p1_19, p1_20, p1_21, p1_22, p1_23, p1_24, p1_25, p1_26, p1_27, p1_28, p1_29, p1_30,fecha) 
						VALUES (:id_persona, :p1_1, :p1_2, :p1_3, :p1_4, :p1_5, :p1_6, :p1_7, :p1_8, :p1_9, :p1_10, :p1_11, :p1_12, :p1_13, :p1_14, :p1_15,
						:p1_16, :p1_17, :p1_18, :p1_19, :p1_20, :p1_21, :p1_22, :p1_23, :p1_24, :p1_25, :p1_26, :p1_27, :p1_28, :p1_29, :p1_30, CURDATE())';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->bindValue(':p1_1', $data['p1_1']);
					$sentencia->bindValue(':p1_2', $data['p1_2']);
					$sentencia->bindValue(':p1_3', $data['p1_3']);
					$sentencia->bindValue(':p1_4', $data['p1_4']);
					$sentencia->bindValue(':p1_5', $data['p1_5']);
					$sentencia->bindValue(':p1_6', $data['p1_6']);
					$sentencia->bindValue(':p1_7', $data['p1_7']);
					$sentencia->bindValue(':p1_8', $data['p1_8']);
					$sentencia->bindValue(':p1_9', $data['p1_9']);
					$sentencia->bindValue(':p1_10', $data['p1_10']);
					$sentencia->bindValue(':p1_11', $data['p1_11']);
					$sentencia->bindValue(':p1_12', $data['p1_12']);
					$sentencia->bindValue(':p1_13', $data['p1_13']);
					$sentencia->bindValue(':p1_14', $data['p1_14']);
					$sentencia->bindValue(':p1_15', $data['p1_15']);
					$sentencia->bindValue(':p1_16', $data['p1_16']);
					$sentencia->bindValue(':p1_17', $data['p1_17']);
					$sentencia->bindValue(':p1_18', $data['p1_18']);
					$sentencia->bindValue(':p1_19', $data['p1_19']);
					$sentencia->bindValue(':p1_20', $data['p1_20']);
					$sentencia->bindValue(':p1_21', $data['p1_21']);
					$sentencia->bindValue(':p1_22', $data['p1_22']);
					$sentencia->bindValue(':p1_23', $data['p1_23']);
					$sentencia->bindValue(':p1_24', $data['p1_24']);
					$sentencia->bindValue(':p1_25', $data['p1_25']);
					$sentencia->bindValue(':p1_26', $data['p1_26']);
					$sentencia->bindValue(':p1_27', $data['p1_27']);
					$sentencia->bindValue(':p1_28', $data['p1_28']);
					$sentencia->bindValue(':p1_29', $data['p1_29']);
					$sentencia->bindValue(':p1_30', $data['p1_30']);
					$sentencia->execute();
					$this->conn->commit();
					$this->calificar_bloque_1();
				}catch(Exception $e){
					$this->conn->rollBack();
					echo "<alert>No se guardo el examen. Realizar el examen de nuevo.</alert>";
				}
				
			
		}

		// * * Registro de Bloque 2 de la Bateria para Conductores
		function bateria_bloq2($data){
			$this->conexion($data);
			$this->conn->beginTransaction();
				try{
					$sql = 'INSERT INTO bateria_bloq2(id_persona, p2_1, p2_2, p2_3, p2_4, p2_5, p2_6, p2_7, p2_8, p2_9, p2_10, p2_11, p2_12, p2_13, p2_14, p2_15,
						p2_16, p2_17, p2_18, p2_19, p2_20, p2_21, p2_22, p2_23, p2_24, p2_25, p2_26, p2_27, p2_28, p2_29, p2_30,
						p2_31, p2_32, p2_33, p2_34, p2_35, p2_36, fecha) 
						VALUES (:id_persona, :p2_1, :p2_2, :p2_3, :p2_4, :p2_5, :p2_6, :p2_7, :p2_8, :p2_9, :p2_10, :p2_11, :p2_12, :p2_13, :p2_14, :p2_15,
						:p2_16, :p2_17, :p2_18, :p2_19, :p2_20, :p2_21, :p2_22, :p2_23, :p2_24, :p2_25, :p2_26, :p2_27, :p2_28, :p2_29, :p2_30,
						:p2_31, :p2_32, :p2_33, :p2_34, :p2_35, :p2_36, CURDATE())';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->bindValue(':p2_1', $data['p2_1']);
					$sentencia->bindValue(':p2_2', $data['p2_2']);
					$sentencia->bindValue(':p2_3', $data['p2_3']);
					$sentencia->bindValue(':p2_4', $data['p2_4']);
					$sentencia->bindValue(':p2_5', $data['p2_5']);
					$sentencia->bindValue(':p2_6', $data['p2_6']);
					$sentencia->bindValue(':p2_7', $data['p2_7']);
					$sentencia->bindValue(':p2_8', $data['p2_8']);
					$sentencia->bindValue(':p2_9', $data['p2_9']);
					$sentencia->bindValue(':p2_10', $data['p2_10']);
					$sentencia->bindValue(':p2_11', $data['p2_11']);
					$sentencia->bindValue(':p2_12', $data['p2_12']);
					$sentencia->bindValue(':p2_13', $data['p2_13']);
					$sentencia->bindValue(':p2_14', $data['p2_14']);
					$sentencia->bindValue(':p2_15', $data['p2_15']);
					$sentencia->bindValue(':p2_16', $data['p2_16']);
					$sentencia->bindValue(':p2_17', $data['p2_17']);
					$sentencia->bindValue(':p2_18', $data['p2_18']);
					$sentencia->bindValue(':p2_19', $data['p2_19']);
					$sentencia->bindValue(':p2_20', $data['p2_20']);
					$sentencia->bindValue(':p2_21', $data['p2_21']);
					$sentencia->bindValue(':p2_22', $data['p2_22']);
					$sentencia->bindValue(':p2_23', $data['p2_23']);
					$sentencia->bindValue(':p2_24', $data['p2_24']);
					$sentencia->bindValue(':p2_25', $data['p2_25']);
					$sentencia->bindValue(':p2_26', $data['p2_26']);
					$sentencia->bindValue(':p2_27', $data['p2_27']);
					$sentencia->bindValue(':p2_28', $data['p2_28']);
					$sentencia->bindValue(':p2_29', $data['p2_29']);
					$sentencia->bindValue(':p2_30', $data['p2_30']);
					$sentencia->bindValue(':p2_31', $data['p2_31']);
					$sentencia->bindValue(':p2_32', $data['p2_32']);
					$sentencia->bindValue(':p2_33', $data['p2_33']);
					$sentencia->bindValue(':p2_34', $data['p2_34']);
					$sentencia->bindValue(':p2_35', $data['p2_35']);
					$sentencia->bindValue(':p2_36', $data['p2_36']);
					$sentencia->execute();
					
					$this->conn->commit();
					$this->calificar_bloque_2();
				}catch(Exception $e){
					$this->conn->rollBack();
					echo "<alert>No se guardo el examen. Realizar el examen de nuevo.</alert>";
				}
		}

		// * * Registro de Bloque 3 de la Bateria para Conductores
		function bateria_bloq3($data){
			$this->conexion($data);
			$this->conn->beginTransaction();
				try{
					$sql = 'INSERT INTO bateria_bloq3(id_persona, p3_1, p3_2, p3_3, p3_4, p3_5, p3_6, p3_7, p3_8, p3_9, p3_10, p3_11, p3_12, p3_13, p3_14, p3_15,
						p3_16, p3_17, p3_18, p3_19, p3_20, p3_21, p3_22, p3_23, p3_24, fecha) VALUES (:id_persona, :p3_1, :p3_2, :p3_3, :p3_4, :p3_5, :p3_6, 
						:p3_7, :p3_8, :p3_9, :p3_10, :p3_11, :p3_12, :p3_13, :p3_14, :p3_15, :p3_16, :p3_17, :p3_18, :p3_19, :p3_20, :p3_21, :p3_22, :p3_23, :p3_24, CURDATE())';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->bindValue(':p3_1', $data['p3_1']);
					$sentencia->bindValue(':p3_2', $data['p3_2']);
					$sentencia->bindValue(':p3_3', $data['p3_3']);
					$sentencia->bindValue(':p3_4', $data['p3_4']);
					$sentencia->bindValue(':p3_5', $data['p3_5']);
					$sentencia->bindValue(':p3_6', $data['p3_6']);
					$sentencia->bindValue(':p3_7', $data['p3_7']);
					$sentencia->bindValue(':p3_8', $data['p3_8']);
					$sentencia->bindValue(':p3_9', $data['p3_9']);
					$sentencia->bindValue(':p3_10', $data['p3_10']);
					$sentencia->bindValue(':p3_11', $data['p3_11']);
					$sentencia->bindValue(':p3_12', $data['p3_12']);
					$sentencia->bindValue(':p3_13', $data['p3_13']);
					$sentencia->bindValue(':p3_14', $data['p3_14']);
					$sentencia->bindValue(':p3_15', $data['p3_15']);
					$sentencia->bindValue(':p3_16', $data['p3_16']);
					$sentencia->bindValue(':p3_17', $data['p3_17']);
					$sentencia->bindValue(':p3_18', $data['p3_18']);
					$sentencia->bindValue(':p3_19', $data['p3_19']);
					$sentencia->bindValue(':p3_20', $data['p3_20']);
					$sentencia->bindValue(':p3_21', $data['p3_21']);
					$sentencia->bindValue(':p3_22', $data['p3_22']);
					$sentencia->bindValue(':p3_23', $data['p3_23']);
					$sentencia->bindValue(':p3_24', $data['p3_24']);
					$sentencia->execute();
					
					$this->conn->commit();
					$this->calificar_bloque_3();
				}catch(Exception $e){
					$this->conn->rollBack();
				}	
		}

		// * * Registro de Bloque 4 de la Bateria para Conductores
		function bateria_bloq4($data){
			$this->conexion($data);
			$this->conn->beginTransaction();
				try{
					$sql = 'INSERT INTO bateria_bloq4(id_persona, p4_1, p4_2, p4_3, p4_4, p4_5, p4_6, p4_7, p4_8, p4_9, p4_10, 
						p4_11, p4_12, p4_13, p4_14, p4_15, p4_16, p4_17, p4_18, p4_19, p4_20,
						p4_21, p4_22, p4_23, p4_24, p4_25, p4_26, p4_27, p4_28, p4_29, p4_30,
						p4_31, p4_32, p4_33, p4_34, p4_35, p4_36, p4_37, p4_38, p4_39, p4_40,
						p4_41, p4_42, p4_43, p4_44, p4_45, p4_46, p4_47, p4_48, p4_49, p4_50,
						p4_51, p4_52, p4_53, p4_54, p4_55, p4_56, p4_57, fecha) 
						VALUES (:id_persona, :p4_1, :p4_2, :p4_3, :p4_4, :p4_5, :p4_6, :p4_7, :p4_8, :p4_9, :p4_10, 
						:p4_11, :p4_12, :p4_13, :p4_14, :p4_15, :p4_16, :p4_17, :p4_18, :p4_19, :p4_20,
						:p4_21, :p4_22, :p4_23, :p4_24, :p4_25, :p4_26, :p4_27, :p4_28, :p4_29, :p4_30,
						:p4_31, :p4_32, :p4_33, :p4_34, :p4_35, :p4_36, :p4_37, :p4_38, :p4_39, :p4_40,
						:p4_41, :p4_42, :p4_43, :p4_44, :p4_45, :p4_46, :p4_47, :p4_48, :p4_49, :p4_50,
						:p4_51, :p4_52, :p4_53, :p4_54, :p4_55, :p4_56, :p4_57, CURDATE())';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->bindValue(':p4_1', $data['p4_1']);
					$sentencia->bindValue(':p4_2', $data['p4_2']);
					$sentencia->bindValue(':p4_3', $data['p4_3']);
					$sentencia->bindValue(':p4_4', $data['p4_4']);
					$sentencia->bindValue(':p4_5', $data['p4_5']);
					$sentencia->bindValue(':p4_6', $data['p4_6']);
					$sentencia->bindValue(':p4_7', $data['p4_7']);
					$sentencia->bindValue(':p4_8', $data['p4_8']);
					$sentencia->bindValue(':p4_9', $data['p4_9']);
					$sentencia->bindValue(':p4_10', $data['p4_10']);
					$sentencia->bindValue(':p4_11', $data['p4_11']);
					$sentencia->bindValue(':p4_12', $data['p4_12']);
					$sentencia->bindValue(':p4_13', $data['p4_13']);
					$sentencia->bindValue(':p4_14', $data['p4_14']);
					$sentencia->bindValue(':p4_15', $data['p4_15']);
					$sentencia->bindValue(':p4_16', $data['p4_16']);
					$sentencia->bindValue(':p4_17', $data['p4_17']);
					$sentencia->bindValue(':p4_18', $data['p4_18']);
					$sentencia->bindValue(':p4_19', $data['p4_19']);
					$sentencia->bindValue(':p4_20', $data['p4_20']);
					$sentencia->bindValue(':p4_21', $data['p4_21']);
					$sentencia->bindValue(':p4_22', $data['p4_22']);
					$sentencia->bindValue(':p4_23', $data['p4_23']);
					$sentencia->bindValue(':p4_24', $data['p4_24']);
					$sentencia->bindValue(':p4_25', $data['p4_25']);
					$sentencia->bindValue(':p4_26', $data['p4_26']);
					$sentencia->bindValue(':p4_27', $data['p4_27']);
					$sentencia->bindValue(':p4_28', $data['p4_28']);
					$sentencia->bindValue(':p4_29', $data['p4_29']);
					$sentencia->bindValue(':p4_30', $data['p4_30']);
					$sentencia->bindValue(':p4_31', $data['p4_31']);
					$sentencia->bindValue(':p4_32', $data['p4_32']);
					$sentencia->bindValue(':p4_33', $data['p4_33']);
					$sentencia->bindValue(':p4_34', $data['p4_34']);
					$sentencia->bindValue(':p4_35', $data['p4_35']);
					$sentencia->bindValue(':p4_36', $data['p4_36']);
					$sentencia->bindValue(':p4_37', $data['p4_37']);
					$sentencia->bindValue(':p4_38', $data['p4_38']);
					$sentencia->bindValue(':p4_39', $data['p4_39']);
					$sentencia->bindValue(':p4_40', $data['p4_40']);
					$sentencia->bindValue(':p4_41', $data['p4_41']);
					$sentencia->bindValue(':p4_42', $data['p4_42']);
					$sentencia->bindValue(':p4_43', $data['p4_43']);
					$sentencia->bindValue(':p4_44', $data['p4_44']);
					$sentencia->bindValue(':p4_45', $data['p4_45']);
					$sentencia->bindValue(':p4_46', $data['p4_46']);
					$sentencia->bindValue(':p4_47', $data['p4_47']);
					$sentencia->bindValue(':p4_48', $data['p4_48']);
					$sentencia->bindValue(':p4_49', $data['p4_49']);
					$sentencia->bindValue(':p4_50', $data['p4_50']);
					$sentencia->bindValue(':p4_51', $data['p4_51']);
					$sentencia->bindValue(':p4_52', $data['p4_52']);
					$sentencia->bindValue(':p4_53', $data['p4_53']);
					$sentencia->bindValue(':p4_54', $data['p4_54']);
					$sentencia->bindValue(':p4_55', $data['p4_55']);
					$sentencia->bindValue(':p4_56', $data['p4_56']);
					$sentencia->bindValue(':p4_57', $data['p4_57']);
					$sentencia->execute();

					$sql = "INSERT INTO persona_examen(id_persona, id_examen, fecha) VALUES (:id_persona, 1, CURDATE())";
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->execute();
					
					$this->conn->commit();
					$this->calificar_bloque_4();
					header('Location: guardar_test.html');
				}catch(Exception $e){
					$this->conn->rollBack();
					echo "<script> alert('No se guardo el examen. Realizar el examen de nuevo.')</script>";
				}
		}

		// * * Calificar Bloque 1 de la Bateria para Conductores
		function calificar_bloque_1(){
			$this->conexion();
			$sql = "SELECT * FROM bateria_bloq1 WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
			$sentencia->execute();
			$respuestas_bloque_1 = $sentencia->fetch();
			$PD = 0;
			$resultado = '';

			if($respuestas_bloque_1['p1_1'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_2'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_3'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_4'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_5'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_6'] == 'a'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_7'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_8'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_9'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_10'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_11'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_12'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_13'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_14'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_15'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_16'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_17'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_18'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_19'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_20'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_21'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_22'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_23'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_24'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_25'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_26'] == 'a'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_27'] == 'a'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_28'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_29'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_1['p1_30'] == 'a'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}

			$PC = $this->percentil_bloque_1($PD);

			if($PC <= 30){
				$resultado = 'N';
			}

			if(30 < $PC && $PC <= 80){
				$resultado = 'I';
			}

			if(80 < $PC && $PC <= 99){
				$resultado = 'S';
			}

			$sql = "INSERT INTO bloque1_calif (id_registro, id_persona, calificacion, fecha) VALUES (:id_registro, :id_persona, :calificacion, CURDATE())";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindValue(':id_registro', $respuestas_bloque_1['id_registro']);
			$sentencia->bindValue(':id_persona', $respuestas_bloque_1['id_persona']);
			$sentencia->bindValue(':calificacion', $resultado);
			$sentencia->execute();
		}

		// * * Calificar Bloque 2 de la Bateria para Conductores
		function calificar_bloque_2(){
			$this->conexion();
			$sql = "SELECT * FROM bateria_bloq2 WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
			$sentencia->execute();
			$respuestas_bloque_2 = $sentencia->fetch();
			$PD = 0;
			$resultado = '';
			if($respuestas_bloque_2['p2_1'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_2'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_3'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_4'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_5'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_6'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_7'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_8'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_9'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_10'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_11'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_12'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_13'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_14'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_15'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_16'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_17'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_18'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_19'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_20'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_21'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_22'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_23'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_24'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_25'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_26'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_27'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_28'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_29'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_30'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_31'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_32'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_33'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_34'] == 'Si'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_35'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_2['p2_36'] == 'No'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}

			$PC = $this->percentil_bloque_2($PD);

			if($PC <= 30){
				$resultado = 'N';
			}

			if(30 < $PC && $PC <= 80){
				$resultado = 'I';
			}

			if(80 < $PC && $PC <= 99){
				$resultado = 'S';
			}

			$sql = "INSERT INTO bloque2_calif (id_registro, id_persona, calificacion, fecha) VALUES (:id_registro, :id_persona, :calificacion, CURDATE())";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindValue(':id_registro', $respuestas_bloque_2['id_registro']);
			$sentencia->bindValue(':id_persona', $respuestas_bloque_2['id_persona']);
			$sentencia->bindValue(':calificacion', $resultado);
			$sentencia->execute();
		}

		// * * Calificar Bloque 3 de la Bateria para Conductores
		function calificar_bloque_3(){
			$this->conexion();
			$sql = "SELECT * FROM bateria_bloq3 WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
			$sentencia->execute();
			$respuestas_bloque_3 = $sentencia->fetch();
			$PD = 0;
			$resultado = '';
			if($respuestas_bloque_3['p3_1'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_2'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_3'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_4'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_5'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_6'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_7'] == 'a'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_8'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_9'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_10'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_11'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_12'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_13'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_14'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_15'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_16'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_17'] == 'a'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_18'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_19'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_20'] == 'a'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_21'] == 'c'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_22'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_23'] == 'b'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}
			if($respuestas_bloque_3['p3_24'] == 'd'){
				$PD++;
			}else{
				$PD = $PD + 0;
			}

			$PC = $this->percentil_bloque_3($PD);

			if($PC <= 30){
				$resultado = 'N';
			}

			if(30 < $PC && $PC <= 80){
				$resultado = 'I';
			}

			if(80 < $PC && $PC <= 99){
				$resultado = 'S';
			}

			$sql = "INSERT INTO bloque3_calif (id_registro, id_persona, calificacion, fecha) VALUES (:id_registro, :id_persona, :calificacion, CURDATE())";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindValue(':id_registro', $respuestas_bloque_3['id_registro']);
			$sentencia->bindValue(':id_persona', $respuestas_bloque_3['id_persona']);
			$sentencia->bindValue(':calificacion', $resultado);
			$sentencia->execute();
		}

		// * * Calificar Bloque 4 de la Bateria para Conductores
		function calificar_bloque_4(){
			$this->conexion();
			$sql = "SELECT * FROM bateria_bloq4 WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
			$sentencia->execute();
			$respuestas_bloque_4 = $sentencia->fetch();

			$cp1 = 0;
			$rp1 = 0;

			//PARTE 1
			switch ($respuestas_bloque_4['p4_1']) {
				case 'a':
					$cp1 = $cp1 + 1;
					break;
				case 'b':
					$cp1 = $cp1 + 2;
					break;
				case 'c':
					$cp1 = $cp1 + 3;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_2']) {
				case 'a':
					$cp1 = $cp1 + 2;
					break;
				case 'b':
					break;
				case 'c':
					$cp1 = $cp1 + 1;
					break;
				case 'd':
					$cp1 = $cp1 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_3']) {
				case 'a':
					$rp1 = $rp1 + 2;
					break;
				case 'b':
					break;
				case 'c':
					$rp1 = $rp1 + 1;
					break;
				case 'd':
					$rp1 = $rp1 + 3;
					break;
			}
			switch ($respuestas_bloque_4['p4_4']) {
				case 'a':
					break;
				case 'b':
					$rp1 = $rp1 + 1;
					break;
				case 'c':
					$cp1 = $cp1 + 1;
					break;
				case 'd':
					$rp1 = $rp1 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_5']) {
				case 'a':
					$rp1 = $rp1 + 3;
					break;
				case 'b':
					break;
				case 'c':
					$rp1 = $rp1 + 2;
					break;
				case 'd':
					$rp1 = $rp1 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_6']) {
				case 'a':
					$rp1 = $rp1 + 3;
					break;
				case 'b':
					$rp1 = $rp1 + 1;
					break;
				case 'c':
					$rp1 = $rp1 + 1;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_7']) {
				case 'a':
					break;
				case 'b':
					$cp1 = $cp1 + 2;
					break;
				case 'c':
					$cp1 = $cp1 + 3;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_8']) {
				case 'a':
					$rp1 = $rp1 + 1;
					break;
				case 'b':
					$rp1 = $rp1 + 2;
					break;
				case 'c':
					break;
				case 'd':
					$rp1 = $rp1 + 3;
					break;
			}
			switch ($respuestas_bloque_4['p4_9']) {
				case 'a':
					$rp1 = $rp1 + 1;
					break;
				case 'b':
					break;
				case 'c':
					$rp1 = $rp1 + 2;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_10']) {
				case 'a':
					$rp1 = $rp1 + 2;
					break;
				case 'b':
					$rp1 = $rp1 + 3;
					break;
				case 'c':
					$rp1 = $rp1 + 1;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_11']) {
				case 'a':
					break;
				case 'b':
					$rp1 = $rp1 + 1;
					break;
				case 'c':
					$rp1 = $rp1 + 1;
					break;
				case 'd':
					$rp1 = $rp1 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_12']) {
				case 'a':
					break;
				case 'b':
					$rp1 = $rp1 + 1;
					break;
				case 'c':
					$rp1 = $rp1 + 1;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_13']) {
				case 'a':
					$rp1 = $rp1 + 2;
					break;
				case 'b':
					$rp1 = $rp1 + 1;
					break;
				case 'c':
					break;
				case 'd':
					$cp1 = $cp1 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_14']) {
				case 'a':
					$cp1 = $cp1 + 1;
					break;
				case 'b':
					break;
				case 'c':
					$cp1 = $cp1 + 3;
					break;
				case 'd':
					$cp1 = $cp1 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_15']) {
				case 'a':
					$rp1 = $rp1 + 1;
					break;
				case 'b':
					$rp1 = $rp1 + 1;
					break;
				case 'c':
					$rp1 = $rp1 + 2;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_16']) {
				case 'a':
					$rp1 = $rp1 + 2;
					break;
				case 'b':
					$rp1 = $rp1 + 0;
					break;
				case 'c':
					$rp1 = $rp1 + 1;
					break;
				case 'd':
					$rp1 = $rp1 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_17']) {
				case 'a':
					$rp1 = $rp1 + 3;
					break;
				case 'b':
					$rp1 = $rp1 + 2;
					break;
				case 'c':
					$rp1 = $rp1 + 1;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_18']) {
				case 'a':
					break;
				case 'b':
					$cp1 = $cp1 + 1;
					break;
				case 'c':
					$cp1 = $cp1 + 2;
					break;
				case 'd':
					$cp1 = $cp1 + 3;
					break;
			}
			switch ($respuestas_bloque_4['p4_19']) {
				case 'a':
					$rp1 = $rp1 + 1;
					break;
				case 'b':
					$rp1 = $rp1 + 2;
					break;
				case 'c':
					$rp1 = $rp1 + 3;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_20']) {
				case 'a':
					$rp1 = $rp1 + 1;
					break;
				case 'b':
					$rp1 = $rp1 + 3;
					break;
				case 'c':
					break;
				case 'd':
					$cp1 = $cp1 + 1;
					break;
			}

			$res1 = $cp1 - $rp1;

			$cp2 = 0;
			$rp2 = 0;
			
			//Parte 2
			switch ($respuestas_bloque_4['p4_21']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$cp2 = $cp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_22']) {
				case 'a':
					break;
				case 'b':
					$rp2 = $rp2 + 2;
					break;
				case 'c':
					$cp2 = $cp2 + 1;
					break;
				case 'd':
					$rp2 = $rp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_23']) {
				case 'a':
					break;
				case 'b':
					$rp2 = $rp2 + 2;
					break;
				case 'c':
					$rp2 = $rp2 + 1;
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_24']) {
				case 'a':
					$rp2 = $rp2 + 2;
					break;
				case 'b':
					$cp2 = $cp2 + 1;
					break;
				case 'c':
					break;
				case 'd':
					$rp2 = $rp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_25']) {
				case 'a':
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					$rp2 = $rp2 + 3;
					break;
			}
			switch ($respuestas_bloque_4['p4_26']) {
				case 'a':
					$rp2 = $rp2 + 3;
					break;
				case 'b':
					$cp2 = $cp2 + 2;
					break;
				case 'c':
					$rp2 = $rp2 + 1;
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_27']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$cp2 = $cp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_28']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					break;
				case 'c':
					$cp2 = $cp2 + 1;
					break;
				case 'd':
					$rp2 = $rp2 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_29']) {
				case 'a':
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					$cp2 = $cp2 + 2;
					break;
				case 'd':
					$rp2 = $rp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_30']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$cp2 = $cp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_31']) {
				case 'a':
					$rp2 = $rp2 + 2;
					break;
				case 'b':
					break;
				case 'c':
					$cp2 = $cp2 + 1;
					break;
				case 'd':
					$rp2 = $rp2 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_32']) {
				case 'a':
					$rp2 = $rp2 + 2;
					break;
				case 'b':
					$cp2 = $cp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 1;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_33']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$cp2 = $cp2 + 1;
					break;
				case 'c':
					$cp2 = $cp2 + 2;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_34']) {
				case 'a':
					break;
				case 'b':
					$cp2 = $cp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					$rp2 = $rp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_35']) {
				case 'a':
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_36']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$rp2 = $rp2 + 2;
					break;
				case 'c':
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_37']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$cp2 = $cp2 + 1;
					break;
				case 'c':
					break;
				case 'd':
					$rp2 = $rp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_38']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$cp2 = $cp2 + 1;
					break;
				case 'c':
					break;
				case 'd':
					$rp2 = $rp2 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_39']) {
				case 'a':
					$cp2 = $cp2 + 1;
					break;
				case 'b':
					break;
				case 'c':
					$rp2 = $rp2 + 1;
					break;
				case 'd':
					$rp2 = $rp2 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_40']) {
				case 'a':
					$cp2 = $cp2 + 1;
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					break;
				case 'd':
					$rp2 = $rp2 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_41']) {
				case 'a':
					$rp2 = $rp2 + 2;
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					$cp2 = $cp2 + 1;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_42']) {
				case 'a':
					$rp2 = $rp2 + 2;
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_43']) {
				case 'a':
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_44']) {
				case 'a':
					$cp2 = $cp2 + 1;
					break;
				case 'b':
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_45']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					break;
				case 'c':
					$cp2 = $cp2 + 1;
					break;
				case 'd':
					$cp2 = $cp2 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_46']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					break;
				case 'c':
					$rp2 = $rp2 + 1;
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_47']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':				
					break;
				case 'c':
					$cp2 = $cp2 + 1;
					break;
				case 'd':
					$rp2 = $rp2 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_48']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$rp2 = $rp2 + 2;
					break;
				case 'c':
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_49']) {
				case 'a':
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_50']) {
				case 'a':
					$rp2 = $rp2 + 2;
					break;
				case 'b':
					break;
				case 'c':
					$cp2 = $cp2 + 1;
					break;
				case 'd':
					$rp2 = $rp2 + 3;
					break;
			}
			switch ($respuestas_bloque_4['p4_51']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$rp2 = $rp2 + 2;
					break;
				case 'c':
					break;
				case 'd':
					$cp2 = $cp2 + 1;
					break;
			}
			switch ($respuestas_bloque_4['p4_52']) {
				case 'a':
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					$cp2 = $cp2 + 1;
					break;
				case 'd':
					$rp2 = $rp2 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_53']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$cp2 = $cp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_54']) {
				case 'a':
					$rp2 = $rp2 + 1;
					break;
				case 'b':
					$cp2 = $cp2 + 2;
					break;
				case 'c':
					break;
				case 'd':
					$rp2 = $rp2 + 3;
					break;
			}
			switch ($respuestas_bloque_4['p4_55']) {
				case 'a':
					$cp2 = $cp2 + 1;
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					$rp2 = $rp2 + 2;
					break;
				case 'd':
					break;
			}
			switch ($respuestas_bloque_4['p4_56']) {
				case 'a':
					break;
				case 'b':
					$rp2 = $rp2 + 1;
					break;
				case 'c':
					$cp2 = $cp2 + 1;
					break;
				case 'd':
					$rp2 = $rp2 + 2;
					break;
			}
			switch ($respuestas_bloque_4['p4_57']) {
				case 'a':
					$rp2 = $rp2 + 2;
					break;
				case 'b':	
					$cp2 = $cp2 + 1;			
					break;
				case 'c':
					$cp2 = $cp2 + 3;
					break;
				case 'd':
					break;
			}

			$res2 = $cp2 - $rp2;
			
			$PD = $res1 + $res2;

			$PC = $this->percentil_bloque_4($PD);

			if($PC <= 40){
				$resultado = 'N';
			}

			if(40 < $PC && $PC <= 67){
				$resultado = 'I';
			}

			if(67 < $PC && $PC <= 97){
				$resultado = 'S';
			}

			$sql = "INSERT INTO bloque4_calif (id_registro, id_persona, calificacion, fecha) VALUES (:id_registro, :id_persona, :calificacion, CURDATE())";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindValue(':id_registro', $respuestas_bloque_4['id_registro']);
			$sentencia->bindValue(':id_persona', $respuestas_bloque_4['id_persona']);
			$sentencia->bindValue(':calificacion', $resultado);
			$sentencia->execute();
		}

		// * * Percentiles del Bloque 1 de la Bateria para Conductores
		function percentil_bloque_1($sumatoria){
			$percentil = 0;
			if(0 <= $sumatoria && $sumatoria <= 3){
				$percentil = 1;
			}
			if(4 <= $sumatoria && $sumatoria <= 8){
				$percentil = 2;
			}
			if($sumatoria == 9){
				$percentil = 4;
			}
			if($sumatoria == 10){
				$percentil = 5;
			}
			if(11 == $sumatoria || $sumatoria == 12){
				$percentil = 10;
			}
			if(13 == $sumatoria || $sumatoria == 14){
				$percentil = 15;
			}
			if($sumatoria == 15){
				$percentil = 25;
			}
			if($sumatoria == 16){
				$percentil = 30;
			}
			if($sumatoria == 17){
				$percentil = 35;
			}
			if($sumatoria == 18){
				$percentil = 40;
			}
			if($sumatoria == 19){
				$percentil = 50;
			}
			if($sumatoria == 20){
				$percentil = 55;
			}
			if($sumatoria == 21){
				$percentil = 60;
			}
			if($sumatoria == 22){
				$percentil = 65;
			}
			if($sumatoria == 23){
				$percentil = 75;
			}
			if($sumatoria == 24){
				$percentil = 80;
			}
			if($sumatoria == 25){
				$percentil = 85;
			}
			if(26 == $sumatoria || $sumatoria == 27){
				$percentil = 90;
			}
			if($sumatoria == 28){
				$percentil = 95;
			}
			if($sumatoria == 29){
				$percentil = 97;
			}
			if($sumatoria == 30){
				$percentil = 99;
			}
			return $percentil;
		}

		// * * Percentiles del Bloque 2 de la Bateria para Conductores
		function percentil_bloque_2($sumatoria){
			$percentil = 0;
			if(0 <= $sumatoria && $sumatoria <= 3){
				$percentil = 1;
			}
			if(4 <= $sumatoria && $sumatoria <= 6){
				$percentil = 2;
			}
			if($sumatoria == 7){
				$percentil = 3;
			}
			if($sumatoria == 8){
				$percentil = 4;
			}
			if(9 == $sumatoria || $sumatoria == 10){
				$percentil = 5;
			}
			if(11 == $sumatoria || $sumatoria == 12){
				$percentil = 10;
			}
			if(13 <= $sumatoria && $sumatoria <= 15){
				$percentil = 15;
			}
			if($sumatoria == 16){
				$percentil = 20;
			}
			if($sumatoria == 17){
				$percentil = 25;
			}
			if($sumatoria == 18){
				$percentil = 30;
			}
			if($sumatoria == 19){
				$percentil = 35;
			}
			if($sumatoria == 20){
				$percentil = 40;
			}
			if($sumatoria == 21){
				$percentil = 45;
			}
			if(22 == $sumatoria || $sumatoria == 23){
				$percentil = 50;
			}
			if($sumatoria == 24){
				$percentil = 55;
			}
			if($sumatoria == 25){
				$percentil = 60;
			}
			if($sumatoria == 26){
				$percentil = 65;
			}
			if(27 == $sumatoria || $sumatoria == 28){
				$percentil = 70;
			}
			if($sumatoria == 29){
				$percentil = 75;
			}
			if(30 == $sumatoria || $sumatoria == 31){
				$percentil = 80;
			}
			if(32 == $sumatoria || $sumatoria == 33){
				$percentil = 85;
			}
			if(34 == $sumatoria || $sumatoria == 35){
				$percentil = 90;
			}
			if($sumatoria == 36){
				$percentil = 95;
			}
			return $percentil;
		}

		// * * Percentiles del Bloque 3 de la Bateria para Conductores
		function percentil_bloque_3($sumatoria){
			$percentil = 0;
			if(0 == $sumatoria || $sumatoria == 1){
				$percentil = 1;
			}
			if($sumatoria == 2){
				$percentil = 2;
			}
			if($sumatoria == 3){
				$percentil = 3;
			}
			if($sumatoria == 4){
				$percentil = 4;
			}
			if($sumatoria == 5){
				$percentil = 5;
			}
			if(6 == $sumatoria || $sumatoria == 7){
				$percentil = 10;
			}
			if($sumatoria == 8){
				$percentil = 15;
			}
			if(9 == $sumatoria || $sumatoria == 10){
				$percentil = 20;
			}
			if($sumatoria == 11){
				$percentil = 25;
			}
			if($sumatoria == 12){
				$percentil = 30;
			}
			if($sumatoria == 13){
				$percentil = 35;
			}
			if($sumatoria == 14){
				$percentil = 45;
			}
			if($sumatoria == 15){
				$percentil = 50;
			}
			if($sumatoria == 16){
				$percentil = 55;
			}
			if($sumatoria == 17){
				$percentil = 60;
			}
			if($sumatoria == 18){
				$percentil = 65;
			}
			if($sumatoria == 19){
				$percentil = 70;
			}
			if(20 == $sumatoria || $sumatoria == 21){
				$percentil = 75;
			}
			if($sumatoria == 22){
				$percentil = 80;
			}
			if($sumatoria == 23){
				$percentil = 85;
			}
			if($sumatoria == 24){
				$percentil = 90;
			}
			return $percentil;
		}

		function percentil_bloque_4($sumatoria){
			$percentil = 0;
			if(-114 <= $sumatoria && $sumatoria < -9){
				$percentil = 3;
			}
			if(-8 <= $sumatoria && $sumatoria < -5){
				$percentil = 9;
			}
			if(-4 <= $sumatoria && $sumatoria <= -2){
				$percentil = 12;
			}
			if(-1 == $sumatoria || $sumatoria == 0){
				$percentil = 15;
			}
			if($sumatoria == 1){
				$percentil = 17;
			}
			if(2 <= $sumatoria && $sumatoria <= 6){
				$percentil = 24;
			}
			if(7 <= $sumatoria && $sumatoria <= 9){
				$percentil = 29;
			}
			if(10 == $sumatoria || $sumatoria == 11){
				$percentil = 33;
			}
			if(12 == $sumatoria || $sumatoria == 13){
				$percentil = 37;
			}
			if(14 == $sumatoria || $sumatoria == 15){
				$percentil = 40;
			}
			if(16 == $sumatoria || $sumatoria == 17){
				$percentil = 42;
			}
			if($sumatoria == 18){
				$percentil = 45;
			}
			if($sumatoria == 19){
				$percentil = 47;
			}
			if(20 == $sumatoria || $sumatoria == 21){
				$percentil = 50;
			}
			if($sumatoria == 22){
				$percentil = 53;
			}
			if(23 == $sumatoria || $sumatoria == 24){
				$percentil = 55;
			}
			if($sumatoria == 25){
				$percentil = 58;
			}
			if($sumatoria == 26){
				$percentil = 60;
			}
			if(27 == $sumatoria || $sumatoria == 28){
				$percentil = 63;
			}
			if($sumatoria == 29){
				$percentil = 67;
			}
			if(30 <= $sumatoria && $sumatoria <= 32){
				$percentil = 71;
			}
			if(33 <= $sumatoria && $sumatoria <= 36){
				$percentil = 76;
			}
			if($sumatoria == 37){
				$percentil = 83;
			}
			if(38 == $sumatoria || $sumatoria == 39){
				$percentil = 85;
			}
			if(40 <= $sumatoria && $sumatoria <= 42){
				$percentil = 88;
			}
			if(43 == $sumatoria || $sumatoria == 44){
				$percentil = 91;
			}
			if(45 <= $sumatoria && $sumatoria <= 59){
				$percentil = 97;
			}
			return $percentil;
		}

		// * * Registro de la Guia de Referencia I de la Norma035
		function norma035_I($data){
			$this->conexion($data);
			$consulta = $this->conn->prepare("SELECT * FROM persona_examen WHERE id_persona = :id_persona AND id_examen = 5");
			$consulta->bindParam(':id_persona', $data['id_persona']);
			$consulta->execute();
  			$num_rows = $consulta->fetchColumn();
			if ($num_rows == 1){ 
    			echo '<script> alert("Usted ya ha realizado este examen"); </script>';
				header("Location: index.php"); 
  			}else{
				$this->conn->beginTransaction();
				try{
					$sql = "INSERT INTO persona_examen(id_persona, id_examen, fecha) VALUES (:id_persona, 5, CURDATE())";
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->execute();

					$sql = 'INSERT INTO norma_1(id_persona, p1_1, p1_2, p1_3, p1_4, p1_5, p1_6, p1_7, p1_8, p1_9, p1_10, p1_11, p1_12, p1_13, p1_14, p1_15) 
						VALUES (:id_persona, :p1_1, :p1_2, :p1_3, :p1_4, :p1_5, :p1_6, :p1_7, :p1_8, :p1_9, :p1_10, :p1_11, :p1_12, :p1_13, :p1_14, :p1_15)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->bindValue(':p1_1', $data['p1_1']);
					$sentencia->bindValue(':p1_2', $data['p1_2']);
					$sentencia->bindValue(':p1_3', $data['p1_3']);
					$sentencia->bindValue(':p1_4', $data['p1_4']);
					$sentencia->bindValue(':p1_5', $data['p1_5']);
					$sentencia->bindValue(':p1_6', $data['p1_6']);
					$sentencia->bindValue(':p1_7', $data['p1_7']);
					$sentencia->bindValue(':p1_8', $data['p1_8']);
					$sentencia->bindValue(':p1_9', $data['p1_9']);
					$sentencia->bindValue(':p1_10', $data['p1_10']);
					$sentencia->bindValue(':p1_11', $data['p1_11']);
					$sentencia->bindValue(':p1_12', $data['p1_12']);
					$sentencia->bindValue(':p1_13', $data['p1_13']);
					$sentencia->bindValue(':p1_14', $data['p1_14']);
					$sentencia->bindValue(':p1_15', $data['p1_15']);
					$sentencia->execute();
					
					$this->conn->commit();
					header('Location: guardar_test.html');
				}catch(Exception $e){
					$this->conn->rollBack();
					echo "<alert>No se guardo el examen. Realizar el examen de nuevo.</alert>";
				}
			}
		}

		// * * Registro de la Guia de Referencia II de la Norma035
		function norma035_II($data){
			$this->conexion($data);
			$consulta = $this->conn->prepare("SELECT * FROM persona_examen WHERE id_persona = :id_persona AND id_examen = 6");
			$consulta->bindParam(':id_persona', $data['id_persona']);
			$consulta->execute();
  			$num_rows = $consulta->fetchColumn();
			if ($num_rows == 1){ 
    			echo '<script> alert("Usted ya ha realizado este examen"); </script>';
				header("Location: index.php"); 
  			}else{
				$this->conn->beginTransaction();
				try{
					$sql = "INSERT INTO persona_examen(id_persona, id_examen, fecha) VALUES (:id_persona, 6, CURDATE())";
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->execute();

					$sql = 'INSERT INTO norma_2(id_persona, p2_1, p2_2, p2_3, p2_4, p2_5, p2_6, p2_7, p2_8, p2_9, p2_10, 
						p2_11, p2_12, p2_13, p2_14, p2_15, p2_16, p2_17, p2_18, p2_19, p2_20, 
						p2_21, p2_22, p2_23, p2_24, p2_25, p2_26, p2_27, p2_28, p2_29, p2_30, 
						p2_31, p2_32, p2_33, p2_34, p2_35, p2_36, p2_37, p2_38, p2_39, p2_40,
						p2_41, p2_42, p2_43, p2_44, p2_45, p2_46) 
						VALUES (:id_persona, :p2_1, :p2_2, :p2_3, :p2_4, :p2_5, :p2_6, :p2_7, :p2_8, :p2_9, :p2_10, 
						:p2_11, :p2_12, :p2_13, :p2_14, :p2_15, :p2_16, :p2_17, :p2_18, :p2_19, :p2_20,
						:p2_21, :p2_22, :p2_23, :p2_24, :p2_25, :p2_26, :p2_27, :p2_28, :p2_29, :p2_30,
						:p2_31, :p2_32, :p2_33, :p2_34, :p2_35, :p2_36, :p2_37, :p2_38, :p2_39, :p2_40,
						:p2_41, :p2_42, :p2_43, :p2_44, :p2_45, :p2_46)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->bindValue(':p2_1', $data['p2_1']);
					$sentencia->bindValue(':p2_2', $data['p2_2']);
					$sentencia->bindValue(':p2_3', $data['p2_3']);
					$sentencia->bindValue(':p2_4', $data['p2_4']);
					$sentencia->bindValue(':p2_5', $data['p2_5']);
					$sentencia->bindValue(':p2_6', $data['p2_6']);
					$sentencia->bindValue(':p2_7', $data['p2_7']);
					$sentencia->bindValue(':p2_8', $data['p2_8']);
					$sentencia->bindValue(':p2_9', $data['p2_9']);
					$sentencia->bindValue(':p2_10', $data['p2_10']);
					$sentencia->bindValue(':p2_11', $data['p2_11']);
					$sentencia->bindValue(':p2_12', $data['p2_12']);
					$sentencia->bindValue(':p2_13', $data['p2_13']);
					$sentencia->bindValue(':p2_14', $data['p2_14']);
					$sentencia->bindValue(':p2_15', $data['p2_15']);
					$sentencia->bindValue(':p2_16', $data['p2_16']);
					$sentencia->bindValue(':p2_17', $data['p2_17']);
					$sentencia->bindValue(':p2_18', $data['p2_18']);
					$sentencia->bindValue(':p2_19', $data['p2_19']);
					$sentencia->bindValue(':p2_20', $data['p2_20']);
					$sentencia->bindValue(':p2_21', $data['p2_21']);
					$sentencia->bindValue(':p2_22', $data['p2_22']);
					$sentencia->bindValue(':p2_23', $data['p2_23']);
					$sentencia->bindValue(':p2_24', $data['p2_24']);
					$sentencia->bindValue(':p2_25', $data['p2_25']);
					$sentencia->bindValue(':p2_26', $data['p2_26']);
					$sentencia->bindValue(':p2_27', $data['p2_27']);
					$sentencia->bindValue(':p2_28', $data['p2_28']);
					$sentencia->bindValue(':p2_29', $data['p2_29']);
					$sentencia->bindValue(':p2_30', $data['p2_30']);
					$sentencia->bindValue(':p2_31', $data['p2_31']);
					$sentencia->bindValue(':p2_32', $data['p2_32']);
					$sentencia->bindValue(':p2_33', $data['p2_33']);
					$sentencia->bindValue(':p2_34', $data['p2_34']);
					$sentencia->bindValue(':p2_35', $data['p2_35']);
					$sentencia->bindValue(':p2_36', $data['p2_36']);
					$sentencia->bindValue(':p2_37', $data['p2_37']);
					$sentencia->bindValue(':p2_38', $data['p2_38']);
					$sentencia->bindValue(':p2_39', $data['p2_39']);
					$sentencia->bindValue(':p2_40', $data['p2_40']);
					$sentencia->bindValue(':p2_41', $data['p2_41']);
					$sentencia->bindValue(':p2_42', $data['p2_42']);
					$sentencia->bindValue(':p2_43', $data['p2_43']);
					$sentencia->bindValue(':p2_44', $data['p2_44']);
					$sentencia->bindValue(':p2_45', $data['p2_45']);
					$sentencia->bindValue(':p2_46', $data['p2_46']);
					$sentencia->execute();

					$this->conn->commit();
					header('Location: guardar_test.html');
				}catch(Exception $e){
					$this->conn->rollBack();
					echo "<alert>No se guardo el examen. Realizar de nuevo el examen.</alert>";
				}
			}
		}

		// * * Calificar Guia de Referencia II de la Norma035
		function calificar_norma035_II(){
			$this->conexion();
			$consulta = $this->conn->prepare("SELECT * FROM norma_3_calif WHERE id_persona = :id_persona");
			$consulta->bindParam(':id_persona', $_SESSION['id_persona']);
			$consulta->execute();
  			$num_rows = $consulta->fetchColumn();
			if ($num_rows == 1){ 
    			echo '<script> alert("Usted ya ha realizado este examen"); </script>';
				header("Location: index.php"); 
  			}else{
				$sql = "SELECT * FROM norma_2 WHERE id_persona = :id_persona";
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
				$sentencia->execute();
				$fila = $sentencia->fetch();

				$calif_final = 0;
				$c_ambiente = 0;
				$c_factores = 0;
				$c_liderazgo = 0;
				$c_tiempo = 0;
				$d_ambiente = 0;
				$d_trabajo = 0;
				$d_control = 0;
				$d_jornada = 0;
				$d_interferencia = 0;
				$d_liderazgo = 0;
				$d_relaciones = 0;
				$d_violencia = 0;
							
				$calif_final = $fila['p2_1'] + $fila['p2_2'] + $fila['p2_3'] + $fila['p2_4'] + $fila['p2_5'] + $fila['p2_6'] + $fila['p2_7'] + $fila['p2_8'] + $fila['p2_9'] + $fila['p2_10'] + 
					$fila['p2_11'] + $fila['p2_12'] + $fila['p2_13'] + $fila['p2_14'] + $fila['p2_15'] + $fila['p2_16'] + $fila['p2_17'] + $fila['p2_18'] + $fila['p2_19'] + $fila['p2_20'] + 
					$fila['p2_21'] + $fila['p2_22'] + $fila['p2_23'] + $fila['p2_24'] + $fila['p2_25'] + $fila['p2_26'] + $fila['p2_27'] + $fila['p2_28'] + $fila['p2_29'] + $fila['p2_30'] + 
					$fila['p2_31'] + $fila['p2_32'] + $fila['p2_33'] + $fila['p2_34'] + $fila['p2_35'] + $fila['p2_36'] + $fila['p2_37'] + $fila['p2_38'] + $fila['p2_39'] + $fila['p2_40'] + 
					$fila['p2_41'] + $fila['p2_42'] + $fila['p2_43'] + $fila['p2_44'] + $fila['p2_45'] + $fila['p2_46'];

					if($calif_final < 20){
						$calif_final_resultado = "Nulo";
					}
					if(20 <= $calif_final && $calif_final < 45){
						$calif_final_resultado = "Bajo";
					}
					if(45 <= $calif_final && $calif_final < 70){
						$calif_final_resultado = "Medio";
					}
					if(70 <= $calif_final && $calif_final < 90){
						$calif_final_resultado = "Alto";
					}
					if($calif_final >= 90){
						$calif_final_resultado = "Muy Alto";
					}

					$c_ambiente = $fila['p2_1'] + $fila['p2_2'] + $fila['p2_3'];
					if($c_ambiente < 3){
						$c_ambiente_resultado = "Nulo";
					}
					if(3 <= $c_ambiente && $c_ambiente < 5){
						$c_ambiente_resultado = "Bajo";
					}
					if(5 <= $c_ambiente && $c_ambiente < 7){
						$c_ambiente_resultado = "Medio";
					}
					if(7 <= $c_ambiente && $c_ambiente < 9){
						$c_ambiente_resultado = "Alto";
					}
					if($c_ambiente >= 9){
						$c_ambiente = "Muy Alto";
					}

					$c_factores = $fila['p2_4'] + $fila['p2_9'] + $fila['p2_5'] + $fila['p2_6'] + $fila['p2_7'] + 
					$fila['p2_8'] + $fila['p2_41'] + $fila['p2_42'] + $fila['p2_43'] + $fila['p2_10'] + 
					$fila['p2_11'] + $fila['p2_12'] + $fila['p2_13'] + $fila['p2_20'] + $fila['p2_21'] + 
					$fila['p2_22'] + $fila['p2_18'] + $fila['p2_19'] + $fila['p2_26'] + $fila['p2_27'];
					if($c_factores < 10){
						$c_factores_resultado = "Nulo";
					}
					if(10 <= $c_factores && $c_factores < 20){
						$c_factores_resultado = "Bajo";
					}
					if(20 <= $c_factores && $c_factores < 30){
						$c_factores_resultado = "Medio";
					}
					if(30 <= $c_factores && $c_factores < 40){
						$c_factores_resultado = "Alto";
					}
					if($c_factores >= 40){
						$c_factores_resultado = "Muy Alto";
					}

					$c_tiempo = $fila['p2_14'] + $fila['p2_15'] + $fila['p2_16'] + $fila['p2_17'];
					if($c_tiempo < 4){
						$c_tiempo_resultado = "Nulo";
					}
					if(4 <= $c_tiempo && $c_tiempo < 6){
						$c_tiempo_resultado = "Bajo";
					}
					if(6 <= $c_tiempo && $c_tiempo < 9){
						$c_tiempo_resultado = "Medio";
					}
					if(9 <= $c_tiempo && $c_tiempo < 12){
						$c_tiempo_resultado = "Alto";
					}
					if($c_tiempo >= 12){
						$c_tiempo_resultado = "Muy Alto";
					}
					
					$c_liderazgo = $fila['p2_23'] + $fila['p2_24'] + $fila['p2_25'] + $fila['p2_28'] + $fila['p2_29'] + 
					$fila['p2_30'] + $fila['p2_31'] + $fila['p2_32'] + $fila['p2_44'] + $fila['p2_45'] + 
					$fila['p2_46'] + $fila['p2_33'] + $fila['p2_34'] + $fila['p2_35'] + $fila['p2_36'] + 
					$fila['p2_37'] + $fila['p2_38'] + $fila['p2_39'] + $fila['p2_40'];
					if($c_liderazgo < 10){
						$c_liderazgo_resultado = "Nulo";
					}
					if(10 <= $c_liderazgo && $c_liderazgo < 18){
						$c_liderazgo_resultado = "Bajo";
					}
					if(18 <= $c_liderazgo && $c_liderazgo < 28){
						$c_liderazgo_resultado = "Medio";
					}
					if(28 <= $c_liderazgo && $c_liderazgo < 38){
						$c_liderazgo_resultado = "Alto";
					}
					if($c_liderazgo >= 38){
						$c_liderazgo_resultado = "Muy Alto";
					}

					$d_ambiente = $fila['p2_1'] + $fila['p2_2'] + $fila['p2_3'];
					if($d_ambiente < 3){
						$d_ambiente_resultado = "Nulo";
					}
					if(3 <= $d_ambiente && $d_ambiente < 5){
						$d_ambiente_resultado = "Bajo";
					}
					if(5 <= $d_ambiente && $d_ambiente < 7){
						$d_ambiente_resultado = "Medio";
					}
					if(7 <= $d_ambiente && $d_ambiente < 9){
						$d_ambiente_resultado = "Alto";
					}
					if($d_ambiente >= 9){
						$d_ambiente_resultado = "Muy Alto";
					}

					$d_trabajo = $fila['p2_4'] + $fila['p2_9'] + $fila['p2_5'] + $fila['p2_6'] + $fila['p2_7'] + 
					$fila['p2_8'] + $fila['p2_41'] + $fila['p2_42'] + $fila['p2_43'] + $fila['p2_10'] + 
					$fila['p2_11'] + $fila['p2_12'] + $fila['p2_13'];
					if($d_trabajo < 12){
						$d_trabajo_resultado = "Nulo";
					}
					if(12 <= $d_trabajo && $d_trabajo < 16){
						$d_trabajo_resultado = "Bajo";
					}
					if(16 <= $d_trabajo && $d_trabajo < 20){
						$d_trabajo_resultado = "Medio";
					}
					if(20 <= $d_trabajo && $d_trabajo < 24){
						$d_trabajo_resultado = "Alto";
					}
					if($d_trabajo >= 24){
						$d_trabajo_resultado = "Muy Alto";
					}


					$d_control = $fila['p2_20'] + $fila['p2_21'] + $fila['p2_22'] + $fila['p2_18'] + $fila['p2_19'] + 
					$fila['p2_26'] + $fila['p2_27'];
					if($d_control < 5){
						$d_control_resultado = "Nulo";
					}
					if(5 <= $d_control && $d_control < 8){
						$d_control_resultado = "Bajo";
					}
					if(8 <= $d_control && $d_control < 11){
						$d_control_resultado = "Medio";
					}
					if(11 <= $d_control && $d_control < 14){
						$d_control_resultado = "Alto";
					}
					if($d_control >= 14){
						$d_control_resultado = "Muy Alto";
					}

					$d_jornada = $fila['p2_14'] + $fila['p2_15'];
					if($d_jornada < 1){
						$d_jornada_resultado = "Nulo";
					}
					if(1 <= $d_jornada && $d_jornada < 2){
						$d_jornada_resultado = "Bajo";
					}
					if(2 <= $d_jornada && $d_jornada < 4){
						$d_jornada_resultado = "Medio";
					}
					if(4 <= $d_jornada && $d_jornada < 6){
						$d_jornada_resultado = "Alto";
					}
					if($d_jornada >= 6){
						$d_jornada_resultado = "Muy Alto";
					}

					$d_interferencia = $fila['p2_16'] + $fila['p2_17'];
					if($d_interferencia < 1){
						$d_interferencia_resultado = "Nulo";
					}
					if(1 <= $d_interferencia && $d_interferencia < 2){
						$d_interferencia_resultado = "Bajo";
					}
					if(2 <= $d_interferencia && $d_interferencia < 4){
						$d_interferencia_resultado = "Medio";
					}
					if(4 <= $d_interferencia && $d_interferencia < 6){
						$d_interferencia_resultado = "Alto";
					}
					if($d_interferencia >= 6){
						$d_interferencia_resultado = "Muy Alto";
					}

					$d_liderazgo = $fila['p2_23'] + $fila['p2_24'] + $fila['p2_25'] + $fila['p2_28'] + $fila['p2_29'];
					if($d_liderazgo < 3){
						$d_liderazgo_resultado = "Nulo";
					}
					if(3 <= $d_liderazgo && $d_liderazgo < 5){
						$d_liderazgo_resultado = "Bajo";
					}
					if(5 <= $d_liderazgo && $d_liderazgo < 8){
						$d_liderazgo_resultado = "Medio";
					}
					if(8 <= $d_liderazgo && $d_liderazgo < 11){
						$d_liderazgo_resultado = "Alto";
					}
					if($d_liderazgo >= 11){
						$d_liderazgo_resultado = "Muy Alto";
					}

					$d_relaciones = $fila['p2_30'] + $fila['p2_31'] + $fila['p2_32'] + $fila['p2_44'] + $fila['p2_45'] + $fila['p2_46'];
					if($d_relaciones < 5){
						$d_relaciones_resultado = "Nulo";
					}
					if(5 <= $d_relaciones && $d_relaciones < 8){
						$d_relaciones_resultado = "Bajo";
					}
					if(8 <= $d_relaciones && $d_relaciones < 11){
						$d_relaciones_resultado = "Medio";
					}
					if(11 <= $d_relaciones && $d_relaciones < 14){
						$d_relaciones_resultado = "Alto";
					}
					if($d_relaciones >= 14){
						$d_relaciones_resultado = "Muy Alto";
					}

					$d_violencia = $fila['p2_33'] + $fila['p2_34'] + $fila['p2_35'] + $fila['p2_36'] + $fila['p2_47'] + $fila['p2_38'] + $fila['p2_39'] + $fila['p2_40'];
					if($d_violencia < 7){
						$d_violencia_resultado = "Nulo";
					}
					if(7 <= $d_violencia && $d_violencia < 10){
						$d_violencia_resultado = "Bajo";
					}
					if(10 <= $d_violencia && $d_violencia < 13){
						$d_violencia_resultado = "Medio";
					}
					if(13 <= $d_violencia && $d_violencia < 16){
						$d_violencia_resultado = "Alto";
					}
					if($d_violencia >= 16){
						$d_violencia_resultado = "Muy Alto";
					}

					$sql = "INSERT INTO norma_2_calif (id_registro, id_persona, calif_final, categoria_ambiente, categoria_factores, 
						categoria_tiempo, categoria_liderazgo, dominio_ambiente, dominio_trabajo, dominio_falta, dominio_jornada, 
						dominio_interferencia, dominio_liderazgo, dominio_relaciones, dominio_violencia) VALUES (:id_registro, 
						:id_persona, :calif_final, :categoria_ambiente, :categoria_factores, :categoria_tiempo, :categoria_liderazgo, 
						:dominio_ambiente, :dominio_trabajo, :dominio_falta, :dominio_jornada, :dominio_interferencia, :dominio_liderazgo, 
						:dominio_relaciones, :dominio_violencia)";
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_registro', $fila['id_registro']);
					$sentencia->bindValue(':id_persona', $_SESSION['id_persona']);
					$sentencia->bindValue(':calif_final', $calif_final_resultado);
					$sentencia->bindValue(':categoria_ambiente', $c_ambiente_resultado);
					$sentencia->bindValue(':categoria_factores', $c_factores_resultado);
					$sentencia->bindValue(':categoria_tiempo', $c_tiempo_resultado);
					$sentencia->bindValue(':categoria_liderazgo', $c_liderazgo_resultado);
					$sentencia->bindValue(':dominio_ambiente', $d_ambiente_resultado);
					$sentencia->bindValue(':dominio_trabajo', $d_trabajo_resultado);
					$sentencia->bindValue(':dominio_falta', $d_control_resultado);
					$sentencia->bindValue(':dominio_jornada', $d_jornada_resultado);
					$sentencia->bindValue(':dominio_interferencia', $d_interferencia_resultado);
					$sentencia->bindValue(':dominio_liderazgo', $d_liderazgo_resultado);
					$sentencia->bindValue(':dominio_relaciones', $d_relaciones_resultado);
					$sentencia->bindValue(':dominio_violencia', $d_violencia_resultado);
					$sentencia->execute();
			}
		}

		// * * Registro de la Guia de Referencia III de la Norma035
		function norma035_III($data){
			$this->conexion($data);
			$consulta = $this->conn->prepare("SELECT * FROM persona_examen WHERE id_persona = :id_persona AND id_examen = 7");
			$consulta->bindParam(':id_persona', $data['id_persona']);
			$consulta->execute();
  			$num_rows = $consulta->fetchColumn();
			if ($num_rows == 1){ 
    			echo '<script> alert("Usted ya ha realizado este examen"); </script>';
				header("Location: index.php"); 
  			}else{
				$this->conn->beginTransaction();
				try{
					$sql = "INSERT INTO persona_examen(id_persona, id_examen, fecha) VALUES (:id_persona, 7, CURDATE())";
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->execute();

					$sql = 'INSERT INTO norma_3(id_persona, p3_1, p3_2, p3_3, p3_4, p3_5, p3_6, p3_7, p3_8, p3_9, p3_10, 
						p3_11, p3_12, p3_13, p3_14, p3_15, p3_16, p3_17, p3_18, p3_19, p3_20, 
						p3_21, p3_22, p3_23, p3_24, p3_25, p3_26, p3_27, p3_28, p3_29, p3_30, 
						p3_31, p3_32, p3_33, p3_34, p3_35, p3_36, p3_37, p3_38, p3_39, p3_40,
						p3_41, p3_42, p3_43, p3_44, p3_45, p3_46, p3_47, p3_48, p3_49, p3_50,
						p3_51, p3_52, p3_53, p3_54, p3_55, p3_56, p3_57, p3_58, p3_59, p3_60,
						p3_61, p3_62, p3_63, p3_64, p3_65, p3_66, p3_67, p3_68, p3_69, p3_70,
						p3_71, p3_72) 
						VALUES (:id_persona, :p3_1, :p3_2, :p3_3, :p3_4, :p3_5, :p3_6, :p3_7, :p3_8, :p3_9, :p3_10, 
						:p3_11, :p3_12, :p3_13, :p3_14, :p3_15, :p3_16, :p3_17, :p3_18, :p3_19, :p3_20,
						:p3_21, :p3_22, :p3_23, :p3_24, :p3_25, :p3_26, :p3_27, :p3_28, :p3_29, :p3_30,
						:p3_31, :p3_32, :p3_33, :p3_34, :p3_35, :p3_36, :p3_37, :p3_38, :p3_39, :p3_40,
						:p3_41, :p3_42, :p3_43, :p3_44, :p3_45, :p3_46, :p3_47, :p3_48, :p3_49, :p3_50,
						:p3_51, :p3_52, :p3_53, :p3_54, :p3_55, :p3_56, :p3_57, :p3_58, :p3_59, :p3_60,
						:p3_61, :p3_62, :p3_63, :p3_64, :p3_65, :p3_66, :p3_67, :p3_68, :p3_69, :p3_70,
						:p3_71, :p3_72)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_persona', $data['id_persona']);
					$sentencia->bindValue(':p3_1', $data['p3_1']);
					$sentencia->bindValue(':p3_2', $data['p3_2']);
					$sentencia->bindValue(':p3_3', $data['p3_3']);
					$sentencia->bindValue(':p3_4', $data['p3_4']);
					$sentencia->bindValue(':p3_5', $data['p3_5']);
					$sentencia->bindValue(':p3_6', $data['p3_6']);
					$sentencia->bindValue(':p3_7', $data['p3_7']);
					$sentencia->bindValue(':p3_8', $data['p3_8']);
					$sentencia->bindValue(':p3_9', $data['p3_9']);
					$sentencia->bindValue(':p3_10', $data['p3_10']);
					$sentencia->bindValue(':p3_11', $data['p3_11']);
					$sentencia->bindValue(':p3_12', $data['p3_12']);
					$sentencia->bindValue(':p3_13', $data['p3_13']);
					$sentencia->bindValue(':p3_14', $data['p3_14']);
					$sentencia->bindValue(':p3_15', $data['p3_15']);
					$sentencia->bindValue(':p3_16', $data['p3_16']);
					$sentencia->bindValue(':p3_17', $data['p3_17']);
					$sentencia->bindValue(':p3_18', $data['p3_18']);
					$sentencia->bindValue(':p3_19', $data['p3_19']);
					$sentencia->bindValue(':p3_20', $data['p3_20']);
					$sentencia->bindValue(':p3_21', $data['p3_21']);
					$sentencia->bindValue(':p3_22', $data['p3_22']);
					$sentencia->bindValue(':p3_23', $data['p3_23']);
					$sentencia->bindValue(':p3_24', $data['p3_24']);
					$sentencia->bindValue(':p3_25', $data['p3_25']);
					$sentencia->bindValue(':p3_26', $data['p3_26']);
					$sentencia->bindValue(':p3_27', $data['p3_27']);
					$sentencia->bindValue(':p3_28', $data['p3_28']);
					$sentencia->bindValue(':p3_29', $data['p3_29']);
					$sentencia->bindValue(':p3_30', $data['p3_30']);
					$sentencia->bindValue(':p3_31', $data['p3_31']);
					$sentencia->bindValue(':p3_32', $data['p3_32']);
					$sentencia->bindValue(':p3_33', $data['p3_33']);
					$sentencia->bindValue(':p3_34', $data['p3_34']);
					$sentencia->bindValue(':p3_35', $data['p3_35']);
					$sentencia->bindValue(':p3_36', $data['p3_36']);
					$sentencia->bindValue(':p3_37', $data['p3_37']);
					$sentencia->bindValue(':p3_38', $data['p3_38']);
					$sentencia->bindValue(':p3_39', $data['p3_39']);
					$sentencia->bindValue(':p3_40', $data['p3_40']);
					$sentencia->bindValue(':p3_41', $data['p3_41']);
					$sentencia->bindValue(':p3_42', $data['p3_42']);
					$sentencia->bindValue(':p3_43', $data['p3_43']);
					$sentencia->bindValue(':p3_44', $data['p3_44']);
					$sentencia->bindValue(':p3_45', $data['p3_45']);
					$sentencia->bindValue(':p3_46', $data['p3_46']);
					$sentencia->bindValue(':p3_47', $data['p3_47']);
					$sentencia->bindValue(':p3_48', $data['p3_48']);
					$sentencia->bindValue(':p3_49', $data['p3_49']);
					$sentencia->bindValue(':p3_50', $data['p3_50']);
					$sentencia->bindValue(':p3_51', $data['p3_51']);
					$sentencia->bindValue(':p3_52', $data['p3_52']);
					$sentencia->bindValue(':p3_53', $data['p3_53']);
					$sentencia->bindValue(':p3_54', $data['p3_54']);
					$sentencia->bindValue(':p3_55', $data['p3_55']);
					$sentencia->bindValue(':p3_56', $data['p3_56']);
					$sentencia->bindValue(':p3_57', $data['p3_57']);
					$sentencia->bindValue(':p3_58', $data['p3_58']);
					$sentencia->bindValue(':p3_59', $data['p3_59']);
					$sentencia->bindValue(':p3_60', $data['p3_60']);
					$sentencia->bindValue(':p3_61', $data['p3_61']);
					$sentencia->bindValue(':p3_62', $data['p3_62']);
					$sentencia->bindValue(':p3_63', $data['p3_63']);
					$sentencia->bindValue(':p3_64', $data['p3_64']);
					$sentencia->bindValue(':p3_65', $data['p3_65']);
					$sentencia->bindValue(':p3_66', $data['p3_66']);
					$sentencia->bindValue(':p3_67', $data['p3_67']);
					$sentencia->bindValue(':p3_68', $data['p3_68']);
					$sentencia->bindValue(':p3_69', $data['p3_69']);
					$sentencia->bindValue(':p3_70', $data['p3_70']);
					$sentencia->bindValue(':p3_71', $data['p3_71']);
					$sentencia->bindValue(':p3_72', $data['p3_72']);
					$sentencia->execute();
					
					$this->conn->commit();
					header('Location: guardar_test.html');
				}catch(Exception $e){
					$this->conn->rollBack();
					echo "<alert>No se guardo el examen. Realizar de nuevo el examen.</alert>";
				}
			}
		}

		// * * Calificar Guia de Referencia III de la Norma035
		function calificar_norma035_III(){
			$this->conexion();
			$consulta = $this->conn->prepare("SELECT * FROM norma_3_calif WHERE id_persona = :id_persona");
			$consulta->bindParam(':id_persona', $_SESSION['id_persona']);
			$consulta->execute();
  			$num_rows = $consulta->fetchColumn();
			if ($num_rows == 1){ 
    			echo '<script> alert("Usted ya ha realizado este examen"); </script>';
				header("Location: index.php"); 
  			}else{
				$sql = "SELECT * FROM norma_3 WHERE id_persona = :id_persona";
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
				$sentencia->execute();
				$fila = $sentencia->fetch();

				$calif_final = 0;
				$c_ambiente = 0;
				$c_entorno = 0;
				$c_factores = 0;
				$c_liderazgo = 0;
				$c_tiempo = 0;
				$d_ambiente = 0;
				$d_trabajo = 0;
				$d_control = 0;
				$d_jornada = 0;
				$d_interferencia = 0;
				$d_liderazgo = 0;
				$d_relaciones = 0;
				$d_violencia = 0;
				$d_desempeno = 0;
				$d_pertenencia = 0;
				
				$calif_final = $fila['p3_1'] + $fila['p3_2'] + $fila['p3_3'] + $fila['p3_4'] + $fila['p3_5'] + $fila['p3_6'] + $fila['p3_7'] + $fila['p3_8'] + $fila['p3_9'] + $fila['p3_10'] + 
					$fila['p3_11'] + $fila['p3_12'] + $fila['p3_13'] + $fila['p3_14'] + $fila['p3_15'] + $fila['p3_16'] + $fila['p3_17'] + $fila['p3_18'] + $fila['p3_19'] + $fila['p3_20'] + 
					$fila['p3_21'] + $fila['p3_22'] + $fila['p3_23'] + $fila['p3_24'] + $fila['p3_25'] + $fila['p3_26'] + $fila['p3_27'] + $fila['p3_28'] + $fila['p3_29'] + $fila['p3_30'] + 
					$fila['p3_31'] + $fila['p3_32'] + $fila['p3_33'] + $fila['p3_34'] + $fila['p3_35'] + $fila['p3_36'] + $fila['p3_37'] + $fila['p3_38'] + $fila['p3_39'] + $fila['p3_40'] + 
					$fila['p3_41'] + $fila['p3_42'] + $fila['p3_43'] + $fila['p3_44'] + $fila['p3_45'] + $fila['p3_46'] + $fila['p3_47'] + $fila['p3_48'] + $fila['p3_49'] + $fila['p3_50'] + 
					$fila['p3_51'] + $fila['p3_52'] + $fila['p3_53'] + $fila['p3_54'] + $fila['p3_55'] + $fila['p3_56'] + $fila['p3_57'] + $fila['p3_58'] + $fila['p3_59'] + $fila['p3_60'] + 
					$fila['p3_61'] + $fila['p3_62'] + $fila['p3_63'] + $fila['p3_64'] + $fila['p3_65'] + $fila['p3_66'] + $fila['p3_67'] + $fila['p3_68'] + $fila['p3_69'] + $fila['p3_70'] + 
					$fila['p3_71'] + $fila['p3_72'];

					if($calif_final < 50){
						$calif_final_resultado = "Nulo";
					}
					if(50 <= $calif_final && $calif_final < 75){
						$calif_final_resultado = "Bajo";
					}
					if(75 <= $calif_final && $calif_final < 99){
						$calif_final_resultado = "Medio";
					}
					if(99 <= $calif_final && $calif_final < 140){
						$calif_final_resultado = "Alto";
					}
					if($calif_final >= 140){
						$calif_final_resultado = "Muy Alto";
					}

					$c_ambiente = $fila['p3_1'] + $fila['p3_2'] + $fila['p3_3'] + $fila['p3_4'] + $fila['p3_5'];
					if($c_ambiente < 5){
						$c_ambiente_resultado = "Nulo";
					}
					if(5 <= $c_ambiente && $c_ambiente < 9){
						$c_ambiente_resultado = "Bajo";
					}
					if(9 <= $c_ambiente && $c_ambiente < 11){
						$c_ambiente_resultado = "Medio";
					}
					if(11 <= $c_ambiente && $c_ambiente < 14){
						$c_ambiente_resultado = "Alto";
					}
					if($c_ambiente >= 14){
						$c_ambiente = "Muy Alto";
					}

					$c_factores = $fila['p3_6'] + $fila['p3_12'] + $fila['p3_7'] + $fila['p3_8'] + $fila['p3_9'] + 
					$fila['p3_10'] + $fila['p3_11'] + $fila['p3_65'] + $fila['p3_66'] + $fila['p3_67'] + 
					$fila['p3_68'] + $fila['p3_13'] + $fila['p3_14'] + $fila['p3_15'] + $fila['p3_16'] + 
					$fila['p3_25'] + $fila['p3_26'] + $fila['p3_27'] + $fila['p3_28'] + $fila['p3_23'] + 
					$fila['p3_29'] + $fila['p3_30'] + $fila['p3_35'] + $fila['p3_36'] + $fila['p3_24'];
					if($c_factores < 15){
						$c_factores_resultado = "Nulo";
					}
					if(15 <= $c_factores && $c_factores < 30){
						$c_factores_resultado = "Bajo";
					}
					if(30 <= $c_factores && $c_factores < 45){
						$c_factores_resultado = "Medio";
					}
					if(45 <= $c_factores && $c_factores < 60){
						$c_factores_resultado = "Alto";
					}
					if($c_factores >= 60){
						$c_factores_resultado = "Muy Alto";
					}

					$c_tiempo = $fila['p3_17'] + $fila['p3_18'] + $fila['p3_19'] + $fila['p3_20'] + $fila['p3_21'] + $fila['p3_22'];
					if($c_tiempo < 5){
						$c_tiempo_resultado = "Nulo";
					}
					if(5 <= $c_tiempo && $c_tiempo < 7){
						$c_tiempo_resultado = "Bajo";
					}
					if(7 <= $c_tiempo && $c_tiempo < 10){
						$c_tiempo_resultado = "Medio";
					}
					if(10 <= $c_tiempo && $c_tiempo < 13){
						$c_tiempo_resultado = "Alto";
					}
					if($c_tiempo >= 13){
						$c_tiempo_resultado = "Muy Alto";
					}
					
					$c_liderazgo = $fila['p3_31'] + $fila['p3_32'] + $fila['p3_33'] + $fila['p3_34'] + $fila['p3_37'] + 
					$fila['p3_38'] + $fila['p3_39'] + $fila['p3_40'] + $fila['p3_41'] + $fila['p3_42'] + 
					$fila['p3_43'] + $fila['p3_44'] + $fila['p3_45'] + $fila['p3_46'] + $fila['p3_69'] + 
					$fila['p3_70'] + $fila['p3_71'] + $fila['p3_72'] + $fila['p3_57'] + $fila['p3_58'] + 
					$fila['p3_59'] + $fila['p3_60'] + $fila['p3_61'] + $fila['p3_62'] + $fila['p3_63'] + $fila['p3_64'];
					if($c_liderazgo < 14){
						$c_liderazgo_resultado = "Nulo";
					}
					if(14 <= $c_liderazgo && $c_liderazgo < 29){
						$c_liderazgo_resultado = "Bajo";
					}
					if(29 <= $c_liderazgo && $c_liderazgo < 42){
						$c_liderazgo_resultado = "Medio";
					}
					if(42 <= $c_liderazgo && $c_liderazgo < 58){
						$c_liderazgo_resultado = "Alto";
					}
					if($c_liderazgo >= 58){
						$c_liderazgo_resultado = "Muy Alto";
					}

					$c_entorno = $fila['p3_47'] + $fila['p3_48'] + $fila['p3_49'] + $fila['p3_50'] + $fila['p3_51'] + 
					$fila['p3_52'] + $fila['p3_55'] + $fila['p3_56'] + $fila['p3_53'] + $fila['p3_54'];
					if($c_entorno < 10){
						$c_entorno_resultado = "Nulo";
					}
					if(10 <= $c_entorno && $c_entorno < 14){
						$c_entorno_resultado = "Bajo";
					}
					if(14 <= $c_entorno && $c_entorno < 18){
						$c_entorno_resultado = "Medio";
					}
					if(18 <= $c_entorno && $c_entorno < 23){
						$c_entorno_resultado = "Alto";
					}
					if($c_entorno >= 23){
						$c_entorno_resultado = "Muy Alto";
					}

					$d_ambiente = $fila['p3_1'] + $fila['p3_2'] + $fila['p3_3'] + $fila['p3_4'] + $fila['p3_5'];
					if($d_ambiente < 5){
						$d_ambiente_resultado = "Nulo";
					}
					if(5 <= $d_ambiente && $d_ambiente < 9){
						$d_ambiente_resultado = "Bajo";
					}
					if(9 <= $d_ambiente && $d_ambiente < 11){
						$d_ambiente_resultado = "Medio";
					}
					if(11 <= $d_ambiente && $d_ambiente < 14){
						$d_ambiente_resultado = "Alto";
					}
					if($d_ambiente >= 14){
						$d_ambiente_resultado = "Muy Alto";
					}

					$d_trabajo = $fila['p3_6'] + $fila['p3_12'] + $fila['p3_7'] + $fila['p3_8'] + $fila['p3_9'] + 
					$fila['p3_10'] + $fila['p3_11'] + $fila['p3_65'] + $fila['p3_66'] + $fila['p3_67'] + 
					$fila['p3_68'] + $fila['p3_13'] + $fila['p3_14'] + $fila['p3_15'] + $fila['p3_16'];
					if($d_trabajo < 15){
						$d_trabajo_resultado = "Nulo";
					}
					if(15 <= $d_trabajo && $d_trabajo < 21){
						$d_trabajo_resultado = "Bajo";
					}
					if(21 <= $d_trabajo && $d_trabajo < 27){
						$d_trabajo_resultado = "Medio";
					}
					if(27 <= $d_trabajo && $d_trabajo < 37){
						$d_trabajo_resultado = "Alto";
					}
					if($d_trabajo >= 37){
						$d_trabajo_resultado = "Muy Alto";
					}


					$d_control = $fila['p3_25'] + $fila['p3_26'] + $fila['p3_27'] + $fila['p3_28'] + $fila['p3_23'] + 
					$fila['p3_29'] + $fila['p3_30'] + $fila['p3_35'] + $fila['p3_36'] + $fila['p3_24'];
					if($d_control < 11){
						$d_control_resultado = "Nulo";
					}
					if(11 <= $d_control && $d_control < 16){
						$d_control_resultado = "Bajo";
					}
					if(16 <= $d_control && $d_control < 21){
						$d_control_resultado = "Medio";
					}
					if(21 <= $d_control && $d_control < 25){
						$d_control_resultado = "Alto";
					}
					if($d_control >= 25){
						$d_control_resultado = "Muy Alto";
					}

					$d_jornada = $fila['p3_17'] + $fila['p3_18'];
					if($d_jornada < 1){
						$d_jornada_resultado = "Nulo";
					}
					if(1 <= $d_jornada && $d_jornada < 2){
						$d_jornada_resultado = "Bajo";
					}
					if(2 <= $d_jornada && $d_jornada < 4){
						$d_jornada_resultado = "Medio";
					}
					if(4 <= $d_jornada && $d_jornada < 6){
						$d_jornada_resultado = "Alto";
					}
					if($d_jornada >= 6){
						$d_jornada_resultado = "Muy Alto";
					}

					$d_interferencia = $fila['p3_19'] + $fila['p3_20'] + $fila['p3_21'] + $fila['p3_22'];
					if($d_interferencia < 4){
						$d_interferencia_resultado = "Nulo";
					}
					if(4 <= $d_interferencia && $d_interferencia < 6){
						$d_interferencia_resultado = "Bajo";
					}
					if(6 <= $d_interferencia && $d_interferencia < 8){
						$d_interferencia_resultado = "Medio";
					}
					if(8 <= $d_interferencia && $d_interferencia < 10){
						$d_interferencia_resultado = "Alto";
					}
					if($d_interferencia >= 10){
						$d_interferencia_resultado = "Muy Alto";
					}

					$d_liderazgo = $fila['p3_31'] + $fila['p3_32'] + $fila['p3_33'] + $fila['p3_34'] + $fila['p3_37'] + 
					$fila['p3_38'] + $fila['p3_39'] + $fila['p3_40'] + $fila['p3_41'];
					if($d_liderazgo < 9){
						$d_liderazgo_resultado = "Nulo";
					}
					if(9 <= $d_liderazgo && $d_liderazgo < 12){
						$d_liderazgo_resultado = "Bajo";
					}
					if(12 <= $d_liderazgo && $d_liderazgo < 16){
						$d_liderazgo_resultado = "Medio";
					}
					if(16 <= $d_liderazgo && $d_liderazgo < 20){
						$d_liderazgo_resultado = "Alto";
					}
					if($d_liderazgo >= 20){
						$d_liderazgo_resultado = "Muy Alto";
					}

					$d_relaciones = $fila['p3_42'] + $fila['p3_43'] + $fila['p3_44'] + $fila['p3_45'] + $fila['p3_46'] + $fila['p3_69'] + 
					$fila['p3_70'] + $fila['p3_71'] + $fila['p3_72'];
					if($d_relaciones < 10){
						$d_relaciones_resultado = "Nulo";
					}
					if(10 <= $d_relaciones && $d_relaciones < 13){
						$d_relaciones_resultado = "Bajo";
					}
					if(13 <= $d_relaciones && $d_relaciones < 17){
						$d_relaciones_resultado = "Medio";
					}
					if(17 <= $d_relaciones && $d_relaciones < 21){
						$d_relaciones_resultado = "Alto";
					}
					if($d_relaciones >= 21){
						$d_relaciones_resultado = "Muy Alto";
					}

					$d_violencia = $fila['p3_57'] + $fila['p3_58'] + $fila['p3_59'] + $fila['p3_60'] + $fila['p3_61'] + $fila['p3_62'] + $fila['p3_63'] + $fila['p3_64'];
					if($d_violencia < 7){
						$d_violencia_resultado = "Nulo";
					}
					if(7 <= $d_violencia && $d_violencia < 10){
						$d_violencia_resultado = "Bajo";
					}
					if(10 <= $d_violencia && $d_violencia < 13){
						$d_violencia_resultado = "Medio";
					}
					if(13 <= $d_violencia && $d_violencia < 16){
						$d_violencia_resultado = "Alto";
					}
					if($d_violencia >= 16){
						$d_violencia_resultado = "Muy Alto";
					}

					$d_desempeno = $fila['p3_47'] + $fila['p3_48'] + $fila['p3_49'] + $fila['p3_50'] + $fila['p3_51'] + $fila['p3_52'];
					if($d_desempeno < 6){
						$d_desempeno_resultado = "Nulo";
					}
					if(6 <= $d_desempeno && $d_desempeno < 10){
						$d_desempeno_resultado = "Bajo";
					}
					if(10 <= $d_desempeno && $d_desempeno < 14){
						$d_desempeno_resultado = "Medio";
					}
					if(14 <= $d_desempeno && $d_desempeno < 18){
						$d_desempeno_resultado = "Alto";
					}
					if($d_desempeno >= 18){
						$d_desempeno_resultado = "Muy Alto";
					}

					$d_pertenencia = $fila['p3_55'] + $fila['p3_56'] + $fila['p3_53'] + $fila['p3_54'];
					if($d_pertenencia < 4){
						$d_pertenencia_resultado = "Nulo";
					}
					if(4 <= $d_pertenencia && $d_pertenencia < 6){
						$d_pertenencia_resultado = "Bajo";
					}
					if(6 <= $d_pertenencia && $d_pertenencia < 8){
						$d_pertenencia_resultado = "Medio";
					}
					if(8 <= $d_pertenencia && $d_pertenencia < 10){
						$d_pertenencia_resultado = "Alto";
					}
					if($d_pertenencia >= 10){
						$d_pertenencia_resultado = "Muy Alto";
					}

					$sql = "INSERT INTO norma_3_calif (id_registro, id_persona, calif_final, categoria_ambiente, categoria_factores, 
						categoria_tiempo, categoria_liderazgo, categoria_organizacional, dominio_ambiente, dominio_trabajo, 
						dominio_falta, dominio_jornada, dominio_interferencia, dominio_liderazgo, dominio_relaciones, dominio_violencia, 
						dominio_desempeno, dominio_pertenencia) VALUES (:id_registro, :id_persona, :calif_final, :categoria_ambiente, 
						:categoria_factores, :categoria_tiempo, :categoria_liderazgo, :categoria_organizacional, :dominio_ambiente, 
						:dominio_trabajo, :dominio_falta, :dominio_jornada, :dominio_interferencia, :dominio_liderazgo, 
						:dominio_relaciones, :dominio_violencia, :dominio_desempeno, :dominio_pertenencia)";
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_registro', $fila['id_registro']);
					$sentencia->bindValue(':id_persona', $_SESSION['id_persona']);
					$sentencia->bindValue(':calif_final', $calif_final_resultado);
					$sentencia->bindValue(':categoria_ambiente', $c_ambiente_resultado);
					$sentencia->bindValue(':categoria_factores', $c_factores_resultado);
					$sentencia->bindValue(':categoria_tiempo', $c_tiempo_resultado);
					$sentencia->bindValue(':categoria_liderazgo', $c_liderazgo_resultado);
					$sentencia->bindValue(':categoria_organizacional', $c_entorno_resultado);
					$sentencia->bindValue(':dominio_ambiente', $d_ambiente_resultado);
					$sentencia->bindValue(':dominio_trabajo', $d_trabajo_resultado);
					$sentencia->bindValue(':dominio_falta', $d_control_resultado);
					$sentencia->bindValue(':dominio_jornada', $d_jornada_resultado);
					$sentencia->bindValue(':dominio_interferencia', $d_interferencia_resultado);
					$sentencia->bindValue(':dominio_liderazgo', $d_liderazgo_resultado);
					$sentencia->bindValue(':dominio_relaciones', $d_relaciones_resultado);
					$sentencia->bindValue(':dominio_violencia', $d_violencia_resultado);
					$sentencia->bindValue(':dominio_desempeno', $d_desempeno_resultado);
					$sentencia->bindValue(':dominio_pertenencia', $d_pertenencia_resultado);
					$sentencia->execute();
				}			
		}

		// * * Registro directo de Norma034
		function norma_realizada($data){
			$this->conexion();

			//Guia 1
			$consulta = $this->conn->prepare("SELECT * FROM persona_examen WHERE id_persona = :id_persona AND id_examen = 5");
			$consulta->bindParam(':id_persona', $_SESSION['id_persona']);
			$consulta->execute();
  			$guia1 = $consulta->fetchColumn();
			
			//Guia 2
			$consulta = $this->conn->prepare("SELECT * FROM persona_examen WHERE id_persona = :id_persona AND id_examen = 6");
			$consulta->bindParam(':id_persona', $_SESSION['id_persona']);
			$consulta->execute();
			$guia2 = $consulta->fetchColumn();

			//Guia 3
			$consulta = $this->conn->prepare("SELECT * FROM persona_examen WHERE id_persona = :id_persona AND id_examen = 7");
			$consulta->bindParam(':id_persona', $_SESSION['id_persona']);
			$consulta->execute();
			$guia3 = $consulta->fetchColumn();

			if ($guia1 == 1 || $guia2 == 1 || $guia3 == 1){
				echo '<script> alert("Usted ha iniciado la Norma035 o ya esta registrada en su totalidad"); </script>';
				echo '<script> window.location.href = "index.php" </script>;';
  			}else{
				$this->conn->beginTransaction();
				try{
					$sql = 'INSERT INTO persona_examen(id_persona, id_examen, fecha) VALUES (:id_persona, 5, :fecha)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
					$sentencia->bindParam(':fecha', $data['fecha']);
					$sentencia->execute();

					$sql = 'INSERT INTO persona_examen(id_persona, id_examen, fecha) VALUES (:id_persona, 6, :fecha)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
					$sentencia->bindParam(':fecha', $data['fecha']);
					$sentencia->execute();

					$sql = 'INSERT INTO persona_examen(id_persona, id_examen, fecha) VALUES (:id_persona, 7, :fecha)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
					$sentencia->bindParam(':fecha', $data['fecha']);
					$sentencia->execute();

					$this->conn->commit();
					echo '<script> alert("Se realizó con exito el registro"); </script>';
					header('Location: index.php');
				}catch(Exception $e){
					$this->conn->rollBack();
					echo '<script> alert("Vuelva a intentarlo más tarde."); </script>';
					header("Location: index.php"); 
				}
			}
		}

		// * * Progreso del Campus Virtual
		function progreso(){
			$this->conexion();
	        $sql = 'SELECT ROUND((100 * (SELECT COUNT(id_persona) from persona_examen WHERE id_persona = :id_persona)) / 
				(SELECT COUNT(id_examen) FROM examen) ,2) as avance';
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
			$sentencia->execute();
			return $sentencia->fetch();
		}
		    
		// * * Lista de Personas sin realizar la Bateria para Conductores
        function personas_sin_realizar_bateria($id_direccion){
            $this->conexion();
	        $sql = "SELECT * FROM persona WHERE id_persona NOT IN (SELECT id_persona FROM persona_examen where id_examen = 1) 
				and id_direccion = :id_direccion";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_direccion', $id_direccion);
	        $sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_persona"]]["nombre"]=$fila["nombre"];
				$datos[$fila["id_persona"]]["telefono"]=$fila["telefono"];
				$i++;
	        }
	        return $datos;
        }

		// * * Lista de Personas sin realizar el test de Hábitos Alimenticios
		function personas_sin_realizar_habitos($id_direccion){
            $this->conexion();
	        $sql = "SELECT * FROM persona WHERE id_persona NOT IN (SELECT id_persona FROM persona_examen where id_examen = 2) 
				and id_direccion = :id_direccion";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_direccion', $id_direccion);
	        $sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_persona"]]["nombre"]=$fila["nombre"];
				$datos[$fila["id_persona"]]["telefono"]=$fila["telefono"];
				$i++;
	        }
	        return $datos;
		}

		// * * Lista de Personas sin realizar la Guia de Referencia I de la Norma035
		function personas_sin_realizar_normaI($id_direccion){
            $this->conexion();
	        $sql = "SELECT * FROM persona WHERE id_persona NOT IN (SELECT id_persona FROM persona_examen where id_examen = 5) 
				and id_direccion = :id_direccion";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_direccion', $id_direccion);
	        $sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_persona"]]["nombre"]=$fila["nombre"];
				$datos[$fila["id_persona"]]["telefono"]=$fila["telefono"];
				$i++;
	        }
	        return $datos;
		}

		// * * Lista de Personas sin realizar la Guia de Referencia II de la Norma035
		function personas_sin_realizar_normaII($id_direccion){
            $this->conexion();
	        $sql = "SELECT * FROM persona WHERE id_persona NOT IN (SELECT id_persona FROM persona_examen where id_examen = 6) 
				and id_direccion = :id_direccion";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_direccion', $id_direccion);
	        $sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_persona"]]["nombre"]=$fila["nombre"];
				$datos[$fila["id_persona"]]["telefono"]=$fila["telefono"];
				$i++;
	        }
	        return $datos;
		}

		// * * Lista de Personas sin realizar la Guia de Referencia III de la Norma035
		function personas_sin_realizar_normaIII($id_direccion){
            $this->conexion();
	        $sql = "SELECT * FROM persona WHERE id_persona NOT IN (SELECT id_persona FROM persona_examen where id_examen = 7) 
				and id_direccion = :id_direccion";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_direccion', $id_direccion);
	        $sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_persona"]]["nombre"]=$fila["nombre"];
				$datos[$fila["id_persona"]]["telefono"]=$fila["telefono"];
				$i++;
	        }
	        return $datos;
		}

		// * * Registro de Accidentes al Mes
		function registro_accidentes($data){
			$this->conexion($data);
			$fecha = $data['fecha']."-01";
			$consulta = $this->conn->prepare("SELECT * FROM accidente WHERE id_direccion = :id_direccion AND fecha = :fecha");
			$consulta->bindParam(':id_direccion', $_SESSION['id_direccion']);
			$consulta->bindParam(':fecha', $fecha);
			$consulta->execute();
  			$num_rows = $consulta->fetchColumn();
			if ($num_rows == 1){ 
    			echo '<script> alert("El registro ya existe"); </script>'; 
			}else{
				$this->conn->beginTransaction();
				try{
					$sql = 'INSERT INTO accidente(id_direccion, fecha, cantidad) VALUES (:id_direccion, :fecha, :cantidad)';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindValue(':id_direccion', $_SESSION['id_direccion']);
					$sentencia->bindValue(':fecha', $fecha);
					$sentencia->bindValue(':cantidad', $data['cantidad']);
					$sentencia->execute();
					$this->conn->commit();
					header("Location: estadisticas_accidentes.php");
				}catch(Exception $e){
					$this->conn->rollBack();
					echo '<script> alert("Intentar de nuevo"); </script>';
				}
			}
				
		}

		// * * Agendar Citas de Cualquier Area
		function agendar_cita($id_cita, $id_persona){
			$this->conexion();
			$sql = "INSERT INTO citas_agendadas (id_cita, id_persona) VALUES (:id_cita, :id_persona)";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindValue(':id_cita', $id_cita);
			$sentencia->bindValue(':id_persona', $id_persona);
			$sentencia->execute();

			$sql = 'SELECT usuario_staff.email as email, citas.fecha as fecha, citas.hora_inicial as horario FROM staff inner join usuario_staff on staff.id_usuario = usuario_staff.id_usuario 
				inner join area_staff on area_staff.id_usuario = usuario_staff.id_usuario inner join area on area.id_area = area_staff.id_area 
				INNER JOIN citas on citas.id_staff = staff.id_staff INNER JOIN citas_agendadas ca on ca.id_cita = citas.id_cita
				INNER JOIN persona on persona.id_persona = ca.id_persona
				WHERE ca.id_persona = :id_persona AND ca.id_cita = :id_cita';
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindValue(':id_cita', $id_cita);
			$sentencia->bindValue(':id_persona', $id_persona);
			$sentencia->execute();
			$fila = $sentencia->fetch();
		}

		// * * Lista de Citas Disponibles
		function citasDisponibles($area){
			$this->conexion();
			$sql = "SET lc_time_names = 'es_ES'";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->execute();

			$sql = "SELECT id_cita, Date_format(fecha, '%d de %M') AS fecha, hora_inicial AS horario, 
				concat(staff.nombre, ' ', staff.apellido) AS personal FROM citas INNER JOIN staff on 
				citas.id_staff = staff.id_staff INNER JOIN usuario_staff on usuario_staff.id_usuario =  staff.id_usuario 
				INNER JOIN area_staff on area_staff.id_usuario = usuario_staff.id_usuario INNER JOIN area on area_staff.id_area = 
				area.id_area WHERE id_cita NOT IN (SELECT id_cita FROM citas_agendadas) AND area.id_area = :area AND fecha >= CURDATE()
				ORDER BY Date_format(fecha, '%d de %M')";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':area', $area);
			$sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_cita"]]["fecha"]=$fila["fecha"];
				$datos[$fila["id_cita"]]["horario"]=$fila["horario"];
				$datos[$fila["id_cita"]]["personal"]=$fila["personal"];
				$i++;
	        }
	        return $datos;
		}

		// * * Lista de Empleados y su Respectivo Progreso
		function listado_empleados($id_direccion){
			$this->conexion();

			$sql = "SELECT id_persona FROM persona WHERE id_persona != :id_persona AND id_direccion = :id_direccion";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_direccion', $id_direccion);
			$sentencia->bindParam(':id_persona', $_SESSION['id_persona']);
			$sentencia->execute();
			$i = 0;
			$persona=array();
	        while ($fila = $sentencia->fetch()) {
				$persona[$i] = $fila["id_persona"];
				$i++;
			}

			$datos=array();

			for($j = 0; $j < sizeof($persona); $j++){
				$sql = "SELECT 
				p.id_persona as id_persona,
				p.nombre as nombre, 
				u.num_nomina as num_nomina,
				(Select e.fecha from persona p inner join persona_examen e on p.id_persona = e.id_persona WHERE e.id_examen = 1 and e.id_persona = :id_persona) AS bateria, 
				(Select e.fecha from persona p inner join persona_examen e on p.id_persona = e.id_persona WHERE e.id_examen = 2 and e.id_persona = :id_persona) AS habitos, 
				(Select e.fecha from persona p inner join persona_examen e on p.id_persona = e.id_persona WHERE e.id_examen = 5 and e.id_persona = :id_persona) AS guia1, 
				(Select e.fecha from persona p inner join persona_examen e on p.id_persona = e.id_persona WHERE e.id_examen = 6 and e.id_persona = :id_persona) AS guia2, 
				(Select e.fecha from persona p inner join persona_examen e on p.id_persona = e.id_persona WHERE e.id_examen = 7 and e.id_persona = :id_persona) AS guia3 
				from persona p INNER JOIN usuario u ON p.id_usuario = u.id_usuario WHERE id_persona = :id_persona AND p.id_direccion = :id_direccion group by p.id_persona;";

				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_direccion', $id_direccion);
				$sentencia->bindParam(':id_persona', $persona[$j]);
				$sentencia->execute();

				while ($fila = $sentencia->fetch()) {
					$datos[$persona[$j]]["id_persona"]=$fila["id_persona"];
					$datos[$persona[$j]]["num_nomina"]=$fila["num_nomina"];
					$datos[$persona[$j]]["nombre"]=$fila["nombre"];
					$datos[$persona[$j]]["bateria"]=$fila["bateria"];
					$datos[$persona[$j]]["habitos"]=$fila["habitos"];
					$datos[$persona[$j]]["guia1"]=$fila["guia1"];
					$datos[$persona[$j]]["guia2"]=$fila["guia2"];
					$datos[$persona[$j]]["guia3"]=$fila["guia3"];
				}
			}
	        return $datos;
		}

		// * * Lista de Staff
		function listado_staff(){
			$this->conexion();
			$sql = "SELECT * FROM staff INNER JOIN usuario_staff ON staff.id_usuario = usuario_staff.id_usuario 
				INNER JOIN area_staff ON usuario_staff.id_usuario = area_staff.id_usuario INNER JOIN area ON area.id_area =
				area_staff.id_area ORDER BY apellido"; 
			$sentencia = $this->conn->prepare($sql);
			$sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_staff"]]["apellido"]=$fila["apellido"];
				$datos[$fila["id_staff"]]["nombre"]=$fila["nombre"];
				$datos[$fila["id_staff"]]["area"]=$fila["area"];
				$datos[$fila["id_staff"]]["programa"]=$fila["programa"];
				$i++;
				$i++;
	        }
	        return $datos;
		}

		// * * Eliminar Empleado
		function borrar_empleado($id_persona){
            $this->conexion();
			$this->conn->beginTransaction();
			try{
				$sql = 'DELETE FROM citas_agendadas WHERE id_persona = :id_persona';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_persona', $id_persona);
				$sentencia->execute();

				$sql = 'DELETE FROM examen_nutricion WHERE id_persona = :id_persona';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_persona', $id_persona);
				$sentencia->execute();

				$sql = 'DELETE FROM expediente WHERE id_persona = :id_persona';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_persona', $id_persona);
				$sentencia->execute();

				$sql = 'DELETE FROM persona_examen WHERE id_persona = :id_persona';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_persona', $id_persona);
				$sentencia->execute();

				$sql = 'SELECT * FROM persona WHERE id_persona = :id_persona';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_persona', $id_persona);
				$sentencia->execute();
				$fila = $sentencia->fetch();
				$id = $fila['id_usuario'];

				$sql = 'DELETE FROM usuario_rol WHERE id_usuario = :id_usuario';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_usuario', $fila['id_usuario']);
				$sentencia->execute();

				$sql = 'DELETE FROM persona WHERE id_persona = :id_persona';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_persona', $id_persona);
				$sentencia->execute();

				$sql = 'DELETE FROM usuario WHERE id_usuario = :id_usuario';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_usuario', $id);
				$sentencia->execute();

				$this->conn->commit();
                echo "<alert>Empleado Eliminado</alert>";
				header("Location: listado.php");
            }catch(Exception $e){
                $this->conn->rollBack();
                echo "<alert>Error al eliminar empleado</alert>";
				header("Location: listado.php");
            }
        }

		// * * Eliminar Staff
		function borrar_staff($id_staff){
            $this->conexion();
			$this->conn->beginTransaction();
			try{
				$sql = 'SELECT * FROM citas WHERE id_staff = :id_staff';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_staff', $id_staff);
				$sentencia->execute();
				$i=0;
				$datos=array();
				while ($fila = $sentencia->fetch()) {
					$datos[$fila["id_cita"]]=$fila["id_cita"];
					$i++;
				}

				for($j = 0; $j < sizeof($datos); $j++){
					$sql = 'DELETE FROM citas_agendadas WHERE id_cita = :id_cita';
					$sentencia = $this->conn->prepare($sql);
					$sentencia->bindParam(':id_cita', $datos[$j]);
					$sentencia->execute();
				}

				$sql = 'DELETE FROM citas WHERE id_staff = :id_staff';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_staff', $id_staff);
				$sentencia->execute();

				$sql = 'SELECT * FROM staff WHERE id_staff = :id_staff';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_staff', $id_staff);
				$sentencia->execute();
				$fila = $sentencia->fetch();
				$id = $fila['id_usuario'];

				$sql = 'DELETE FROM staff WHERE id_staff = :id_staff';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_staff', $id_staff);
				$sentencia->execute();

				$sql = 'DELETE FROM area_staff WHERE id_usuario = :id_usuario';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_usuario', $id);
				$sentencia->execute();

				$sql = 'DELETE FROM usuario_staff WHERE id_usuario = :id_usuario';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_usuario', $id);
				$sentencia->execute();

				$this->conn->commit();
                echo "<alert>Staff Eliminado</alert>";
				header("Location: listado.php");
            }catch(Exception $e){
                $this->conn->rollBack();
                echo "<alert>Error al eliminar staff</alert>";
				header("Location: listado.php");
            }
        }

		// * * Lista de Areas
        function areas(){
            $this->conexion();
            $sql = "SELECT * FROM area";
            $sentencia = $this->conn->prepare($sql);
            $sentencia->execute();
            $i=0;
            $datos=array();
            while ($fila = $sentencia->fetch()) {
                $datos[$fila["id_area"]]["area"]=$fila["area"];
                $datos[$fila["id_area"]]["id_area"]=$fila["id_area"];
                $i++;
            }
            return $datos;
        }

		// * * Registrar STAFF con Verificación de Correo Existente y que sean de Gmail
		function registro_staff($data){
			$this->conexion($data);
			$correo = $data['email'];
		
			//KEY de Abstract API
			$api_key = "2a6ac840c82549f69e83eb88c3af08de";
			$ch = curl_init();
			curl_setopt_array($ch, [ 
				CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1/?api_key=$api_key&email=$correo",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true
			]);

			$response = curl_exec($ch);
			curl_close($ch);
			$datos = json_decode($response, true);
			if($datos['deliverability'] === "UNDELIVERABLE"){
				echo "<script>alert('El correo ingresado no existe.')</script>";
			}
			if ($datos["is_free_email"]["value"] === true) {
				$consulta = $this->conn->prepare("SELECT * FROM usuario_staff WHERE email = :email");
				$consulta->bindParam(':email', $data['email']);
				$consulta->execute();
				$num_rows = $consulta->fetchColumn();
				if ($num_rows == 1) {
					echo '<script>alert("Ya existe una cuenta registrada con este correo");</script>';
				} else {
					$this->conn->beginTransaction();
					try {
						$sql = "INSERT INTO usuario_staff(email, contrasena) VALUES (:email, :contrasena)";
						$sentencia = $this->conn->prepare($sql);
						$sentencia->bindParam(':email', $data['email']);

						$data['contrasena'] = md5($data['contrasena']);
						$sentencia->bindParam(':contrasena', $data['contrasena']);
						$sentencia->execute();

						$sql = 'SELECT * FROM usuario_staff WHERE email = :email';
						$sentencia = $this->conn->prepare($sql);
						$sentencia->bindParam(':email', $data['email']);
						$sentencia->execute();
						$fila = $sentencia->fetch();

						$sql = 'INSERT INTO staff( nombre, apellido, programa, id_usuario) 
									VALUES (:nombre, :apellido, :programa, :id_usuario)';
						$sentencia = $this->conn->prepare($sql);
						$sentencia->bindValue(':nombre', $data['nombre']);
						$sentencia->bindValue(':apellido', $data['apellido']);
						$sentencia->bindValue(':programa', $data['programa']);
						$sentencia->bindValue(':id_usuario', $fila['id_usuario']);
						$sentencia->execute();

						$area = $data['id_area'];
						$sql = 'INSERT INTO area_staff(id_area, id_usuario) VALUES (:id_area, :id_usuario)';
						$sentencia = $this->conn->prepare($sql);
						$sentencia->bindValue(':id_area', $area);
						$sentencia->bindValue(':id_usuario', $fila['id_usuario']);
						$sentencia->execute();

						$this->conn->commit();
						header('Location: listado.php');
					} catch (Exception $e) {
						$this->conn->rollBack();
						echo '<script> alert("No procedio el registro. Intentelo de nuevo."); </script>';
					}				
				}
			}
		}
	}
    $trabajador = new empleado;
?>