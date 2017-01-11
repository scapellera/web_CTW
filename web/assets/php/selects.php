<?php
function select_all_paises(){
    $conn = connect();
    $sql = "SELECT * 
    FROM PAISES
    ORDER BY PAIS asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_prefijo_paises($pais){
    $conn = connect();
    $sql = "SELECT prefijo FROM PAISES WHERE PAIS = '".$pais."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
	$prefijo = $row['prefijo'];
    close($conn);
    return $prefijo;
  }

function select_all_clientes(){
    $conn = connect();
    $sql = "SELECT * 
    FROM CLIENTES
    ORDER BY nombre_completo asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_all_sedes(){
    $conn = connect();
    $sql = "SELECT * 
    FROM SEDES S, CLIENTES C
    WHERE S.NIF_cliente = C.NIF_EMPRESA
    ORDER BY C.nombre_comercial, S.nombre asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

?>