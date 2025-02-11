<?php

    require "conexion.php";
	$conn = conectarDB();
    
    $id = $_GET['num'];
    $proceso = $_GET['proceso'];

    
    $sql = "SELECT tbl_bomba.estado, tbl_tanque.proceso, tbl_tanque.capacidad FROM tbl_bomba INNER JOIN tbl_tanque ON tbl_bomba.num_tanqueFK = tbl_tanque.num_tanque WHERE tbl_bomba.num_bomba = '$id' AND tbl_bomba.cod_procesoFK = '$proceso'";
    
    $result = $conn->query($sql);
    if($conn->affected_rows > 0){
        echo json_encode($result->fetch_assoc());
    }else{
        echo "No hay registros";
    }
	
	$result->close();
    $conn->close();
?>