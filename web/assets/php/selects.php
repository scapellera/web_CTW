<?php
function select_all_paises(){
    $conn = connect();
    $sql = "SELECT * FROM PAISES";
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
    $sql = "SELECT * FROM CLIENTES";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_all_sedes(){
    $conn = connect();
    $sql = "SELECT * FROM SEDES";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

?>