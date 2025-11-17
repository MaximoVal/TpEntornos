<?php



function consultaSQL($consulta_sql){
    $conexion = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conexion, "paseofortuna");

    $resultado = mysqli_query($conexion, $consulta_sql);
    mysqli_close($conexion);
    return $resultado;
}

function consultaLocales($consulta_sql){
    $conexion = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conexion, "paseofortuna");

    $resultado = mysqli_query($conexion, $consulta_sql);
    mysqli_close($conexion);
    return $resultado;
}

function insertarRegistroNuevo($email, $password){
    $sql = "INSERT INTO usuarios (email, contraseña) VALUES ('$email', '$password')";
    return consultaSQL($sql);
}