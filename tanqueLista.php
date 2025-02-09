<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    include_once 'conexion.php';
    $conn = conectarDB();
    $id_Proceso = $_GET['proceso'];
    $query = "SELECT * FROM tbl_tanque WHERE cod_procesoFK = '$id_Proceso'";
    $result = $conn->query($query);
    if($conn->affected_rows > 0){
        $rows = array();

        // Recorrer los resultados y agregarlos al array
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        // Devolver los resultados en formato JSON
        echo json_encode($rows);
    }else{
        echo "No hay registros";
    }
    $result->close();
    $conn->close();
}



?>