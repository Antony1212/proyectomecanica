<?php
// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mecanica";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los datos de la tabla 'usuario'
$sql = "SELECT id_usuario, nombre, apellido, roll FROM usuario";
$result = $conn->query($sql);

// Crear un arreglo para almacenar los datos obtenidos
$datos = array();

// Procesar los datos obtenidos y agregarlos al arreglo
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dato = array(
            "id_usuario" => $row["id_usuario"],
            "nombre" => $row["nombre"],
            "roll" => $row["roll"],
            "apellido" => $row["apellido"]
        );
        array_push($datos, $dato);
    }
}

// Devolver los datos en formato JSON
echo json_encode($datos);

// Cerrar la conexión a la base de datos
$conn->close();
?>  