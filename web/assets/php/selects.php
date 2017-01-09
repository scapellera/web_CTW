<?php
function select_pais(){
    $conn = connect();
    $sql = "SELECT * FROM PAISES";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

  function select_prefijo_pais($pais){
    $conn = connect();
    $sql = "SELECT prefijo FROM PAISES WHERE PAIS = '".$pais."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
	$prefijo = $row['prefijo'];
    close($conn);
    return $prefijo;
  }

?>