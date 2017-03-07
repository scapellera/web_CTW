<?php
function select_all_pais(){
    $conn = connect();
    $sql = "SELECT * 
    FROM PAIS
    ORDER BY PAIS asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_prefijo_pais($pais){
    $conn = connect();
    $sql = "SELECT prefijo FROM PAIS WHERE PAIS = '".$pais."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
	$prefijo = $row['prefijo'];
    close($conn);
    return $prefijo;
  }
function select_all_contacto(){
    $conn = connect();
    $sql = "SELECT *
    FROM CONTACTO";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

  function select_cantidad_stock($codigo_de_barras){
    $conn = connect();
    $sql = "SELECT cantidad_total FROM STOCK WHERE CODIGO_DE_BARRAS = '".$codigo_de_barras."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $cantidad = $row['cantidad_tota'];
    close($conn);
    return $cantidad;
  }

function select_all_cliente(){
    $conn = connect();
    $sql = "SELECT * 
    FROM CLIENTE
    ORDER BY activo desc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_all_sede_activo(){
    $conn = connect();
    $sql = "SELECT *,s.activo as s_activo, s.telefono as s_telefono
    FROM SEDE S, CLIENTE C
    WHERE S.NIF_cliente = C.NIF_EMPRESA";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
function select_all_rol(){
    $conn = connect();
    $sql = "SELECT * 
    FROM ROL";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_sede(){
    $conn = connect();
    $sql = "SELECT *
    FROM SEDE S, CLIENTE C
    WHERE S.NIF_cliente = C.NIF_EMPRESA";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_all_mayorista(){
    $conn = connect();
    $sql = "SELECT * 
    FROM MAYORISTA
    ORDER BY nombre_empresa asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_all_servicio(){
    $conn = connect();
    $sql = "SELECT * 
    FROM SERVICIO
    ORDER BY nombre asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_all_usuario(){
    $conn = connect();
    $sql = "SELECT * 
    FROM USUARIO
    ORDER BY nombre asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }
  
function select_all_stock(){
    $conn = connect();
    $sql = "SELECT * 
    FROM STOCK";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }
function select_all_articulo(){
    $conn = connect();
    $sql = "SELECT * 
    FROM ARTICULO";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
  function select_all_minutaje(){
    $conn = connect();
    $sql = "SELECT * 
    FROM MINUTAJE";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

  function select_sede_cliente($nif_cliente){
     $conn = connect();
    $sql = "SELECT * 
    FROM SEDE S
    WHERE S.NIF_cliente = '".$nif_cliente."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

  function select_id_sede($nombre){
    $conn = connect();
    $sql = "SELECT ID_SEDE FROM SEDE WHERE nombre = '".$nombre."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $prefijo = $row['ID_SEDE'];
    close($conn);
    return $prefijo;
  }

  function select_all_user($id_user){
    $conn = connect();
    $sql = "SELECT *
    FROM USUARIO
    WHERE ID_USUARIO = '".$id_user."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

    function select_password_user($id_user){
        $conn = connect();
        $sql = "SELECT *
        FROM USUARIO
        WHERE ID_USUARIO = '".$id_user."'";
        $data = $conn->query($sql);
        $row = $data->fetch_assoc();
        $password = $row['password'];
        close($conn);
        return $password;
    }

  function select_nombre_servicio($ID_servicio){
    $conn = connect();
    $sql = "SELECT nombre 
    FROM SERVICIO WHERE ID_SERVICIO = '".$ID_servicio."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_servicio = $row['nombre'];
    close($conn);
    return $nombre_servicio;
  }

   function select_nombre_usuario($ID_usuario){
    $conn = connect();
    $sql = "SELECT nombre 
    FROM USUARIO WHERE ID_USUARIO = '".$ID_usuario."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_usuario = $row['nombre'];
    close($conn);
    return $nombre_usuario;
  }

   function select_nombre_sede($ID_sede){
    $conn = connect();
    $sql = "SELECT nombre 
    FROM SEDE WHERE ID_SEDE = '".$ID_sede."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_sede = $row['nombre'];
    close($conn);
    return $nombre_sede;
  }

   function select_nombre_cliente($NIF_cliente){
    $conn = connect();
    $sql = "SELECT nombre_comercial
    FROM CLIENTE WHERE NIF_EMPRESA = '".$NIF_cliente."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_cliente = $row['nombre_comercial'];
    close($conn);
    return $nombre_cliente;
  }

   function select_nombre_mayorista($NIF_mayorista){
    $conn = connect();
    $sql = "SELECT nombre_empresa
    FROM MAYORISTA WHERE NIF_MAYORISTA = '".$NIF_mayorista."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_mayorista = $row['nombre_empresa'];
    close($conn);
    return $nombre_mayorista;
  }



	function getGCalendarUrl($event){  
	$titulo = urlencode($event['titulo']); 
	$descripcion = urlencode($event['descripcion']); 
	$localizacion = urlencode($event['localizacion']); 
	$start=new DateTime($event['fecha_inicio'].' '.$event['hora_inicio'].' '.date_default_timezone_get()); 
	$end=new DateTime($event['fecha_fin'].' '.$event['hora_fin'].' '.date_default_timezone_get()); $dates = urlencode($start->format("Ymd\THis")) . "/" . urlencode($end->format("Ymd\THis"));
	$name = urlencode($event['nombre']);
	$url = urlencode($event['url']);
	$gCalUrl = "http://www.google.com/calendar/event?action=TEMPLATE&amp;text=$titulo&amp;dates=$dates&amp;details=$descripcion&amp;location=$localizacion&amp;trp=false&amp;sprop=$url&amp;sprop=name:$name";
	return ($gCalUrl);
	}
	// array asociativo con los parametros mecesarios.
	$evento = array(
	  'titulo' => 'Mi evento de prueba',
	  'descripcion' => 'Descripcion del evento de prueba',
	  'localizacion' => 'Aqui ponemos la dirección donde se celebra el evento',
	  'fecha_inicio' => '2014-04-10', // Fecha de inicio de evento en formato AAAA-MM-DD
	'hora_inicio'=>'17:30', // Hora Inicio del evento
	'fecha_fin'=>'2014-04-12', // Fecha de fin de evento en formato AAAA-MM-DD
	'hora_fin'=>'19:00', // Hora final del evento
	'nombre'=>'ReviBlog', // Nombre del sitio
	'url'=>'www.reviblog.net' // Url de la página
	)

?>