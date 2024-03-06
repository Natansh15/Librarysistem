<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		// Obtener los datos del formulario
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$course = $_POST['course'];
		$matricula = $_POST['matricula'];
	
		// Consultar el student_id actual en la base de datos
		$sql_current_id = "SELECT student_id FROM students WHERE id = '$id'";
		$result_current_id = $conn->query($sql_current_id);
	
		if($result_current_id->num_rows > 0){
			$row = $result_current_id->fetch_assoc();
			$current_student_id = $row['student_id'];
	
			// Verificar si el nuevo student_id es diferente al actual
			if($matricula !== $current_student_id){
				// Verificar si el nuevo student_id ya existe en la base de datos
				$sql_check = "SELECT * FROM students WHERE student_id = '$matricula'";
				$result_check = $conn->query($sql_check);
	
				if($result_check->num_rows > 0){
					// Si el nuevo student_id ya existe, mostrar mensaje de error
					$_SESSION['error'] = 'La matricula ya existe';
				} else {
					// Si el nuevo student_id no existe, proceder con la actualización
					$sql_update = "UPDATE students SET firstname = '$firstname', lastname = '$lastname', course_id = '$course', student_id = '$matricula' WHERE id = '$id'";
					if($conn->query($sql_update)){
						$_SESSION['success'] = 'Estudiante actualizado exitosamente';
					} else {
						$_SESSION['error'] = $conn->error;
					}
				}
			} else {
				// Si el nuevo student_id es igual al actual, proceder con la actualización
				$sql_update = "UPDATE students SET firstname = '$firstname', lastname = '$lastname', course_id = '$course', student_id = '$matricula' WHERE id = '$id'";
				if($conn->query($sql_update)){
					$_SESSION['success'] = 'Estudiante actualizado exitosamente';
				} else {
					$_SESSION['error'] = $conn->error;
				}
			}
		} else {
			$_SESSION['error'] = 'No se pudo encontrar el estudiante en la base de datos';
		}
	} else {
		$_SESSION['error'] = 'Complete el formulario de edición primero';
	}

	header('location:student.php');

?>