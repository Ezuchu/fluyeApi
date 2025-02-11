<?php

    require "conexion.php";
	$conn = conectarDB();
    
    $NumBomba = $_GET['num'];
    $CodProceso = $_GET['proceso'];

    
    $sql = "SELECT * FROM tbl_bomba where num_bomba = '$NumBomba' and cod_procesoFK = '$CodProceso'";
    
    $result = $conn->query($sql);
    if($conn->affected_rows > 0){
        echo json_encode($result->fetch_assoc());
    }else{
        echo "No hay registros";
    }
	
	$result->close();
    $conn->close();
?>