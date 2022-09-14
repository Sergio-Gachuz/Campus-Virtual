<?php
    session_start();
	
	include('config.php');

    class staff{
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

        // * * Iniciar Sesión
		function log_in_staff($email, $contrasena){
            $this->conexion();
            $contrasena = md5($contrasena);
            $sql = 'SELECT us.email, s.id_staff, ars.id_area, us.id_usuario FROM usuario_staff us 
				INNER JOIN staff s on us.id_usuario = s.id_usuario INNER JOIN area_staff ars ON us.id_usuario = ars.id_usuario 
				where us.email = :email';
            $sentencia = $this->conn->prepare($sql);
            $sentencia->bindParam(':email', $email);
            $sentencia->execute();
            $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
            if (isset($fila['email'])) {
                $_SESSION = $fila;
                $_SESSION['validado'] = true;
                $_SESSION['areas'] = $this->area($fila['id_usuario']);
                header('Location: index.php');
            }else{
                $this->log_out();
                header('Location: log-in.php');
            }
        }

		// * * Lista de Areas
		function area($id_usuario){
			$this->conexion();
			$sql = 'SELECT area, id_area FROM area_staff INNER JOIN area USING(id_area) WHERE id_usuario = :id_usuario';
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_usuario', $id_usuario);
			$sentencia->execute();
			$i = 0;
			$areas = array();
			while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
				$areas[$i]['area'] = $fila['area'];
				$areas[$i]['id_area'] = $fila['id_area'];
				$i++;
			}
			return $areas;
		}

		// * * Validar Area
		function validar_area($roles_permitidos){
			$roles_usuario = $_SESSION['areas'];
			$rol_valido = false;
			foreach ($roles_usuario as $rol) {
				if (in_array($rol['area'], $roles_permitidos)) {
					$rol_valido = true;
					return $rol['area'];
				}
			}
			if ($rol_valido == false) {
				echo '<script> alert("No cuentas con los permisos"); </script>'; 
			}
		}

		// * * Actualizar contraseña
		function actualizar_contrasena($data){
			$this->conexion($data);
			$this->conn->beginTransaction();
			try {
				$sql = "UPDATE usuario_staff set contrasena = :contrasena WHERE id_usuario = :id_usuario";
				$sentencia = $this->conn->prepare($sql);
				$data['contrasena'] = md5($data['contrasena']);
				$sentencia->bindParam(':contrasena', $data['contrasena']);
				$sentencia->bindParam(':id_usuario', $_SESSION['id_usuario']);
				$sentencia->execute();
				$this->conn->commit();
				echo '<script> alert("Contraseña actualizada."); </script>';
			} catch (Exception $e) {
				$this->conn->rollBack();
				echo '<script> alert("No procedio la actualización. Intentelo de nuevo."); </script>';
			}
		}

		// * * Ver informacion del Staff
		function staff($id_usuario){
			$this->conexion();
			$sql = 'SELECT * FROM staff inner join usuario_staff on staff.id_usuario = usuario_staff.id_usuario 
				inner join area_staff on area_staff.id_usuario = usuario_staff.id_usuario inner join area on area.id_area = area_staff.id_area 
				WHERE staff.id_usuario = :id_usuario';
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_usuario', $id_usuario);
			$sentencia->execute();
			return $sentencia->fetch();
		}

		// * * Ver la Siguiente Cita del Paciente (Empleado)
		function siguiente_cita($id_persona){
			$this->conexion();
			$sql = "SET lc_time_names = 'es_ES'";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->execute();

			$sql = "SELECT Date_format(c.fecha, '%d de %M') AS fecha, c.hora_inicial AS horario, ca.id_cita AS id FROM citas c 
				INNER JOIN citas_agendadas ca ON c.id_cita = ca.id_cita INNER JOIN staff s ON s.id_staff = c.id_staff 
				INNER JOIN usuario_staff us ON us.id_usuario = s.id_usuario INNER JOIN area_staff ars ON 
				ars.id_usuario = us.id_usuario WHERE ca.id_persona = :id_persona AND ars.id_area = :id_area
				ORDER BY ca.id_cita DESC LIMIT 1";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
			$sentencia->bindParam(':id_area', $_SESSION['id_area']);
	        $sentencia->execute();
			return $sentencia->fetch();
		}

		// * * Crear Cita Nueva
		function crear_cita($data){
			$this->conexion($data);
			$this->conn->beginTransaction();
			$id_staff = $_SESSION['id_staff'];
			$hora = date('H:i', strtotime($data['hora_inicial']));
            try{
				$sql = "INSERT INTO citas (fecha, hora_inicial, id_staff) VALUES (:fecha, :hora_inicial, :id_staff)";
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindValue(':fecha', $data['fecha']);
				$sentencia->bindValue(':hora_inicial', $hora);
				$sentencia->bindValue(':id_staff', $id_staff);
				$sentencia->execute();
				$this->conn->commit();
                header('Location: administracion.php');
            }catch(Exception $e){
                $this->conn->rollBack();

                header('Location: index.php');
            }
		}

		// * * Eliminar Cita
		function borrar_cita($id_cita){
            $this->conexion();
            $sql = 'DELETE FROM citas WHERE id_cita = :id_cita';
            $sentencia = $this->conn->prepare($sql);
            $sentencia->bindParam(':id_cita', $id_cita);
            $sentencia->execute();
        }

		// * * Lista de Citas Creadas
		function citas($id_staff){
			$this->conexion();
			$sql = "SET lc_time_names = 'es_ES'";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->execute();

	        $sql = "SELECT id_cita, Date_format(fecha, '%d de %M') AS fecha, hora_inicial AS horario 
				FROM citas WHERE id_cita not in (select id_cita from citas_agendadas) and id_staff = :id_staff ORDER BY
				fecha, hora_inicial DESC";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_staff', $id_staff);
	        $sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_cita"]]["id_cita"]=$fila["id_cita"];
				$datos[$fila["id_cita"]]["fecha"]=$fila["fecha"];
				$datos[$fila["id_cita"]]["horario"]=$fila["horario"];
				$i++;
	        }
	        return $datos;
		}

		// * * Lista de Citas para el Día
		function citas_hoy($id_staff){
			$this->conexion();
			$sql = "SET lc_time_names = 'es_ES'";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->execute();

	        $sql = "SELECT ca.id_cita, Date_format(c.fecha, '%d de %M') AS fecha, c.hora_inicial AS horario, 
				p.nombre AS paciente, p.telefono as telefono, ca.id_persona AS id_paciente FROM citas_agendadas ca INNER JOIN citas c 
				ON ca.id_cita = c.id_cita INNER JOIN persona p ON ca.id_persona = p.id_persona WHERE c.id_staff = :id_staff and 
				fecha = CURDATE() ORDER BY fecha DESC, hora_inicial DESC";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_staff', $id_staff);
	        $sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_cita"]]["id_cita"]=$fila["id_cita"];
				$datos[$fila["id_cita"]]["fecha"]=$fila["fecha"];
				$datos[$fila["id_cita"]]["horario"]=$fila["horario"];
				$datos[$fila["id_cita"]]["paciente"]=$fila["paciente"];
				$datos[$fila["id_cita"]]["telefono"]=$fila["telefono"];
				$datos[$fila["id_cita"]]["id_paciente"]=$fila["id_paciente"];
				$i++;
	        }
	        return $datos;
		}

		// * * Ver Información del Paciente
		function paciente($id_persona){
			$this->conexion();
			$sql = 'SELECT * FROM persona WHERE id_persona = :id_persona';
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
			$sentencia->execute();
			return $sentencia->fetch();
		}

		// * * Ver Respuestas del Test de Hábitos Alimenticios del Paciente (Empleado)
		function ver_examen($id_persona){
			$this->conexion();
			$sql = 'SELECT * FROM examen_nutricion WHERE id_persona = :id_persona';
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
			$sentencia->execute();
			return $sentencia->fetch();
		}

		// * * Guardar Expediente
		function guardar_expediente($data){
			$this->conexion($data);
			$cita = $data['id_cita'];
			$persona = $data['id_persona'];
			$this->conn->beginTransaction();
			try{
				$sql = "INSERT INTO expediente (id_persona, edad, edo_civil, escolaridad, ocupacion, motivo, heredofamiliares,
					toxi, ejercicio,sueno,padecimiento,evolucion,tratamiento,pesoA,pesoI, pesoH,talla,imc,desayuno,colacion1,
					comida,colacion2,cena,no_comidas,entre,alimentos,alergia,alergia_des,sal,grasa,vasos,bebidas,horario,
					metodo,suplemento,television) 
					VALUES (:id_persona, :edad, :edo_civil, :escolaridad, :ocupacion, :motivo, :heredofamiliares, :toxi, 
					:ejercicio,:sueno,:padecimiento,:evolucion,:tratamiento,:pesoA,:pesoI,:pesoH,:talla,:imc,:desayuno,:colacion1,
					:comida,:colacion2,:cena,:no_comidas,:entre,:alimentos,:alergia,:alergia_des,:sal,:grasa,:vasos,:bebidas,
					:horario,:metodo,:suplemento,:television)";
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindValue(':id_persona', $data['id_persona']);
				$sentencia->bindValue(':edad', $data['edad']);
				$sentencia->bindValue(':edo_civil', $data['edo_civil']);
				$sentencia->bindValue(':escolaridad', $data['escolaridad']);
				$sentencia->bindValue(':ocupacion', $data['ocupacion']);
				$sentencia->bindValue(':motivo', $data['motivo']);
				$sentencia->bindValue(':heredofamiliares', $data['heredofamiliares']);
				$sentencia->bindValue(':toxi', $data['toxi']);
				$sentencia->bindValue(':ejercicio', $data['ejercicio']);
				$sentencia->bindValue(':sueno', $data['sueno']);
				$sentencia->bindValue(':padecimiento', $data['padecimiento']);
				$sentencia->bindValue(':evolucion', $data['evolucion']);
				$sentencia->bindValue(':tratamiento', $data['tratamiento']);
				$sentencia->bindValue(':pesoA', $data['pesoA']);
				$sentencia->bindValue(':pesoI', $data['pesoI']);
				$sentencia->bindValue(':pesoH', $data['pesoH']);
				$sentencia->bindValue(':talla', $data['talla']);
				$sentencia->bindValue(':imc', $data['imc']);
				$sentencia->bindValue(':desayuno', $data['desayuno']);
				$sentencia->bindValue(':colacion1', $data['colacion1']);
				$sentencia->bindValue(':comida', $data['comida']);
				$sentencia->bindValue(':colacion2', $data['colacion2']);
				$sentencia->bindValue(':cena', $data['cena']);
				$sentencia->bindValue(':no_comidas', $data['no_comidas']);
				$sentencia->bindValue(':entre', $data['entre']);
				$sentencia->bindValue(':alimentos', $data['alimentos']);
				$sentencia->bindValue(':alergia', $data['alergia']);
				$sentencia->bindValue(':alergia_des', $data['alergia_des']);
				$sentencia->bindValue(':sal', $data['sal']);
				$sentencia->bindValue(':grasa', $data['grasa']);
				$sentencia->bindValue(':vasos', $data['vasos']);
				$sentencia->bindValue(':bebidas', $data['bebidas']);
				$sentencia->bindValue(':horario', $data['horario']);
				$sentencia->bindValue(':metodo', $data['metodo']);
				$sentencia->bindValue(':suplemento', $data['suplemento']);
				$sentencia->bindValue(':television', $data['television']);
				$sentencia->execute();
				$this->conn->commit();
				echo "<script>alert('Expediente Guardado')</script>";
                header("Location: expedientes.php?id_cita=$cita&id_persona=$persona");
            }catch(Exception $e){
                $this->conn->rollBack();
				echo "<script>alert('No se guardo el expediente')</script>";
                header("Location: expedientes.php?id_cita=$cita&id_persona=$persona");
            }
		}

		// * * Ver Expedientes
		function expedientes($id_persona){
			$this->conexion();
			$sql = "SELECT * FROM expediente where id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
	        $sentencia->execute();
	        return $sentencia->fetch();
		}

		// * * Agendar Siguiente Cita durante una Cita
		function agendar_siguiente_cita($data){
			$this->conexion($data);
			$cita = $data['id_cita'];
			$persona = $data['id_persona'];
			$hora = date('H:i', strtotime($data['hora_inicial']));
			$this->conn->beginTransaction();
			try{
				$sql = "INSERT INTO citas (fecha, hora_inicial, id_staff) VALUES (:fecha, :hora_inicial, :id_staff)";
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindValue(':fecha', $data['fecha']);
				$sentencia->bindValue(':hora_inicial', $hora);
				$sentencia->bindValue(':id_staff', $_SESSION['id_staff']);
				$sentencia->execute();

				$sql = 'SELECT * FROM citas WHERE fecha = :fecha and hora_inicial = :hora_inicial';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':fecha', $data['fecha']);
				$sentencia->bindParam(':hora_inicial', $hora);
				$sentencia->execute();
				$fila = $sentencia->fetch();

				$sql = 'INSERT INTO citas_agendadas( id_cita, id_persona) VALUES (:id_cita, :id_persona)';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindValue(':id_cita', $fila['id_cita']);
				$sentencia->bindValue(':id_persona', $data['id_persona']);
				$sentencia->execute();

				$sql = 'SELECT * FROM staff inner join usuario_staff on staff.id_usuario = usuario_staff.id_usuario 
				inner join area_staff on area_staff.id_usuario = usuario_staff.id_usuario inner join area on area.id_area = area_staff.id_area 
				WHERE staff.id_usuario = :id_usuario';
				$sentencia = $this->conn->prepare($sql);
				$sentencia->bindParam(':id_usuario', $_SESSION['id_usuario']);
				$sentencia->execute();
				$fila = $sentencia->fetch();

				$this->conn->commit();
                header("Location: cita_paciente.php?id_cita=$cita&id_persona=$persona");
            }catch(Exception $e){
                $this->conn->rollBack();
                header("Location: cita_paciente.php?id_cita=$cita&id_persona=$persona");
            }
		}

		// * * Terminar Cita y Eliminarlas de la BD
		function terminar_cita($id_cita){
			$this->conexion();
            $sql = 'DELETE FROM citas_agendadas WHERE id_cita = :id_cita';
            $sentencia = $this->conn->prepare($sql);
            $sentencia->bindParam(':id_cita', $id_cita);
            $sentencia->execute();

			$sql = 'DELETE FROM citas WHERE id_cita = :id_cita';
            $sentencia = $this->conn->prepare($sql);
            $sentencia->bindParam(':id_cita', $id_cita);
            $sentencia->execute();
		}

		// * * Ver Respuestas de la Guia de Referencia I de la Norma035
		function ver_norma1_I($id_persona){
			$this->conexion();
			$sql = "SELECT * FROM norma_1 WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
			$sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_registro"]]["p1_1"]=$fila["p1_1"];
				$datos[$fila["id_registro"]]["p1_2"]=$fila["p1_2"];
				$datos[$fila["id_registro"]]["p1_3"]=$fila["p1_3"];
				$datos[$fila["id_registro"]]["p1_4"]=$fila["p1_4"];
				$datos[$fila["id_registro"]]["p1_5"]=$fila["p1_5"];
				$datos[$fila["id_registro"]]["p1_6"]=$fila["p1_6"];
				$datos[$fila["id_registro"]]["p1_7"]=$fila["p1_7"];
				$datos[$fila["id_registro"]]["p1_8"]=$fila["p1_8"];
				$datos[$fila["id_registro"]]["p1_9"]=$fila["p1_9"];
				$datos[$fila["id_registro"]]["p1_10"]=$fila["p1_10"];
				$datos[$fila["id_registro"]]["p1_11"]=$fila["p1_11"];
				$datos[$fila["id_registro"]]["p1_12"]=$fila["p1_12"];
				$datos[$fila["id_registro"]]["p1_13"]=$fila["p1_13"];
				$datos[$fila["id_registro"]]["p1_14"]=$fila["p1_14"];
				$datos[$fila["id_registro"]]["p1_15"]=$fila["p1_15"];
				$i++;
	        }
	        return $datos;
		}

		// * * Ver Respuestas de la Guia de Referencia II de la Norma035
		function ver_norma2_II($id_persona){
			$this->conexion();
			$sql = "SELECT * FROM norma_2_calif WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
			$sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_calificaciones"]]["calif_final"]=$fila["calif_final"];
				$datos[$fila["id_calificaciones"]]["categoria_ambiente"]=$fila["categoria_ambiente"];
				$datos[$fila["id_calificaciones"]]["categoria_factores"]=$fila["categoria_factores"];
				$datos[$fila["id_calificaciones"]]["categoria_tiempo"]=$fila["categoria_tiempo"];
				$datos[$fila["id_calificaciones"]]["categoria_liderazgo"]=$fila["categoria_liderazgo"];
				$datos[$fila["id_calificaciones"]]["dominio_ambiente"]=$fila["dominio_ambiente"];
				$datos[$fila["id_calificaciones"]]["dominio_trabajo"]=$fila["dominio_trabajo"];
				$datos[$fila["id_calificaciones"]]["dominio_falta"]=$fila["dominio_falta"];
				$datos[$fila["id_calificaciones"]]["dominio_jornada"]=$fila["dominio_jornada"];
				$datos[$fila["id_calificaciones"]]["dominio_interferencia"]=$fila["dominio_interferencia"];
				$datos[$fila["id_calificaciones"]]["dominio_liderazgo"]=$fila["dominio_liderazgo"];
				$datos[$fila["id_calificaciones"]]["dominio_relaciones"]=$fila["dominio_relaciones"];
				$datos[$fila["id_calificaciones"]]["dominio_violencia"]=$fila["dominio_violencia"];
				$i++;
	        }
	        return $datos;
		}

		// * * Ver Respuestas de la Guia de Referencia III de la Norma035
		function ver_norma3_III($id_persona){
			$this->conexion();
			$sql = "SELECT * FROM norma_3_calif WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
			$sentencia->execute();
			$i=0;
			$datos=array();
	        while ($fila = $sentencia->fetch()) {
				$datos[$fila["id_calificaciones"]]["calif_final"]=$fila["calif_final"];
				$datos[$fila["id_calificaciones"]]["categoria_ambiente"]=$fila["categoria_ambiente"];
				$datos[$fila["id_calificaciones"]]["categoria_factores"]=$fila["categoria_factores"];
				$datos[$fila["id_calificaciones"]]["categoria_tiempo"]=$fila["categoria_tiempo"];
				$datos[$fila["id_calificaciones"]]["categoria_liderazgo"]=$fila["categoria_liderazgo"];
				$datos[$fila["id_calificaciones"]]["categoria_organizacional"]=$fila["categoria_organizacional"];
				$datos[$fila["id_calificaciones"]]["dominio_ambiente"]=$fila["dominio_ambiente"];
				$datos[$fila["id_calificaciones"]]["dominio_trabajo"]=$fila["dominio_trabajo"];
				$datos[$fila["id_calificaciones"]]["dominio_falta"]=$fila["dominio_falta"];
				$datos[$fila["id_calificaciones"]]["dominio_jornada"]=$fila["dominio_jornada"];
				$datos[$fila["id_calificaciones"]]["dominio_interferencia"]=$fila["dominio_interferencia"];
				$datos[$fila["id_calificaciones"]]["dominio_liderazgo"]=$fila["dominio_liderazgo"];
				$datos[$fila["id_calificaciones"]]["dominio_relaciones"]=$fila["dominio_relaciones"];
				$datos[$fila["id_calificaciones"]]["dominio_violencia"]=$fila["dominio_violencia"];
				$datos[$fila["id_calificaciones"]]["dominio_desempeno"]=$fila["dominio_desempeno"];
				$datos[$fila["id_calificaciones"]]["dominio_pertenencia"]=$fila["dominio_pertenencia"];
				$i++;
	        }
	        return $datos;
		}

		// * * Resultado del Bloque 1 de la Bateria para Conductores
		function ver_bloque1($id_persona){
			$this->conexion();
			$sql = "SELECT * FROM bloque1_calif WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
			$sentencia->execute();
			return $sentencia->fetch();
		}

		// * * Resultado del Bloque 2 de la Bateria para Conductores
		function ver_bloque2($id_persona){
			$this->conexion();
			$sql = "SELECT * FROM bloque2_calif WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
			$sentencia->execute();
			return $sentencia->fetch();
		}

		// * * Resultado del Bloque 3 de la Bateria para Conductores
		function ver_bloque3($id_persona){
			$this->conexion();
			$sql = "SELECT * FROM bloque3_calif WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
			$sentencia->execute();
			return $sentencia->fetch();
		}

		// * * Resultado del Bloque 4 de la Bateria para Conductores
		function ver_bloque4($id_persona){
			$this->conexion();
			$sql = "SELECT * FROM bloque4_calif WHERE id_persona = :id_persona";
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_persona', $id_persona);
			$sentencia->execute();
			return $sentencia->fetch();
		}

		// * * Informacion del Paciente
		function paciente_info($id_usuario){
			$this->conexion();
			$sql = 'SELECT * FROM persona inner join usuario USING (id_usuario) inner JOIN direccion USING(id_direccion) WHERE id_usuario = :id_usuario';
			$sentencia = $this->conn->prepare($sql);
			$sentencia->bindParam(':id_usuario', $id_usuario);
			$sentencia->execute();
			return $sentencia->fetch();
		}

		// * * Documento PDF
		function documento($nombre){
			require('tfpdf/tfpdf.php');
			$paciente = $this->paciente_info($nombre);
			$calif1 = $this->ver_bloque1($nombre);
			$calif2 = $this->ver_bloque2($nombre);
			$calif3 = $this->ver_bloque3($nombre);
			if(empty($calif1)){
				$calificacion1 = "Nulo";
			}else{
				$calificacion1 = $calif1['calificacion'];
			}
			if(empty($calif2)){
				$calificacion2 = "Nulo";
			}else{
				$calificacion2 = $calif2['calificacion'];
			}
			if(empty($calif3)){
				$calificacion3 = "Nulo";
			}else{
				$calificacion3 = $calif3['calificacion'];
			}
			$pdf = new tFPDF();
			$pdf->AddPage();
			$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
			$pdf->SetFont('DejaVu','',14);	
			$pdf->Image("../img/formulario.png",null,null, 200, 40);
			$pdf->Ln(10);
			$pdf->SetTextColor(255, 102, 0);
			$pdf->Cell(40, 10, "Información del Paciente");
			$pdf->Ln(10);
			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(40, 10, "Nombre: ".$paciente['nombre']);
			$pdf->Ln(10);
			$pdf->Cell(40, 10, "Dirección: ".$paciente['descripcion']);
			$pdf->Ln(10);
			$pdf->SetTextColor(255, 102, 0);
			$pdf->Cell(40, 10, "Resultados de la Batería para Conductores");
			$pdf->SetTextColor(0,0,0);
			$pdf->Ln(10);
			$pdf->Cell(40, 10, "Calificación - Bloque 1: ".$calificacion1);
			$pdf->Ln(10);
			$pdf->Cell(40, 10, "Calificación - Bloque 2: ".$calificacion2);
			$pdf->Ln(10);
			$pdf->Cell(40, 10, "Calificación - Bloque 3: ".$calificacion3);
			$pdf->Ln(10);
			$pdf->Cell(40, 10, "Calificación - Bloque 4: ".$calificacion1);
			$pdf->Output();
		}
    }

    $residente = new staff;
?>