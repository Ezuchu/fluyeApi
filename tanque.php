<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    include_once 'conexion.php';
    $conn = conectarDB();
    $id_Proceso = $_GET['proceso'];
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_tanque WHERE cod_procesoFK = '$id_Proceso' AND num_tanque = '$id'";
    $result = $conn->query($query);
    if($conn->affected_rows > 0){
        echo json_encode($result->fetch_assoc());
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
    $id_Proceso = $input->cod_proceso;
    $nombre = $input->nombre;
    $capacidad = $input->capacidad;
    $ancho = $input->ancho;
    $altura = $input->altura;
    $sql = "INSERT INTO tbl_tanque (cod_procesoFK, nombre, estado, capacidad, proceso, ancho, altura) VALUES ('$id_Proceso', '$nombre', 'neutro','$capacidad', '100','$ancho', '$altura')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Estado cambiado correctamente.');</script>";
    } else {
        echo "Error al cambiar fila: " . mysqli_error($conn);
    }
    $conn->close();
}

if($_SERVER["REQUEST_METHOD"] == "PUT")
{
    include_once 'conexion.php';
    $input = json_decode(file_get_contents('php://input'));
    $conn = conectarDB();
    $id_Proceso = $input->cod_proceso;
    $id = $input->num_tanque;
    $proceso = $input->proceso;
    $sql = "UPDATE tbl_tanque SET proceso= $proceso WHERE cod_procesoFK = '$id_Proceso' AND num_tanque = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Estado cambiado correctamente.');</script>";
    } else {
        echo "Error al cambiar fila: " . mysqli_error($conn);
    }
    $conn->close();
}

?>