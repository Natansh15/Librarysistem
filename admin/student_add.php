<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		// Obtener los datos del formulario
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$course = $_POST['course'];
		$matricula = $_POST['matricula'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);    
		}
		// Crear el student_id
		$student_id = $matricula;
	
		// Verificar si el student_id ya existe en la base de datos
		$sql_check = "SELECT * FROM students WHERE student_id = '$student_id'";
		$result_check = $conn->query($sql_check);
	
		if($result_check->num_rows > 0){
			// Si el student_id ya existe, mostrar mensaje de error
			$_SESSION['error'] = 'La matricula ya existe';
		} else {
			// Si el student_id no existe, proceder con la inserción del registro
			$sql_insert = "INSERT INTO students (student_id, firstname, lastname, course_id, photo, created_on) VALUES ('$student_id', '$firstname', '$lastname', '$course', '$filename', NOW())";
			if($conn->query($sql_insert)){
				$_SESSION['success'] = 'Estudiante añadido con exito';
			} else {
				$_SESSION['error'] = $conn->error;
			}
		}
	} else {
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: student.php');
?>