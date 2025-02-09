<?php

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    include_once 'conexion.php';
    $conn = conectarDB();
    $id = $_GET['id'];
    $query = "SELECT * FROM prueba WHERE ID = '".$id."'";
    $result = $conn->query($query);
    if($conn->affected_rows > 0){
        while($row=$result->fetch_assoc()){
            $array=$row['ESTADO'];
        }
        echo json_encode($array);
    }else{
        echo "No hay registros";
    }
    $result->close();
    $conn->close();
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include_once 'conexion.php';
    $input = json_decode(file_get_contents('php://input'));
    $conn = conectarDB();
    $id = $input->id;
    $estado = $input->N;
    $sql = "UPDATE prueba SET ESTADO='$estado' WHERE ID = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Estado cambiado correctamente.');</script>";
    } else {
        echo "Error al cambiar fila: " . mysqli_error($conn);
    }
    $conn->close();
}





?>