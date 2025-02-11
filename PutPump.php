<?php

    
	
	if($_SERVER["REQUEST_METHOD"] == "PUT")
	{
		include_once 'conexion.php';
	
		$input = json_decode(file_get_contents('php://input'));
		$conn = conectarDB();
		
		$id_Proceso = $input->cod_proceso;
		$id = $input->num_bomba;
		$Nestado = $input->estado;

		
		$sql = "UPDATE tbl_bomba SET estado = '$Nestado' WHERE cod_procesoFK = '$id_Proceso' AND num_bomba = '$id'";
		
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Estado cambiado correctamente.');</script>";
		} else {
			echo "Error al cambiar fila: " . mysqli_error($conn);
		}
		$conn->close();
	}
?>
