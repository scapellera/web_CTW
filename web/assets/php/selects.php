<?php
function select_all_pais()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM PAIS
    ORDER BY PAIS asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_prefijo_pais($pais)
{
    $conn = connect();
    $sql = "SELECT prefijo FROM PAIS WHERE PAIS = '" . $pais . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $prefijo = $row['prefijo'];
    close($conn);
    return $prefijo;
}

function codigo_de_barras_articulo($id_articulo)
{
    $conn = connect();
    $sql = "SELECT codigo_de_barras FROM ARTICULO WHERE ID_ARTICULO= '" . $id_articulo . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $codigo_de_barras = $row['codigo_de_barras'];
    close($conn);
    return $codigo_de_barras;
}

function cantidad_articulo($id_articulo)
{
    $conn = connect();
    $sql = "SELECT cantidad FROM ARTICULO WHERE ID_ARTICULO= '" . $id_articulo . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $cantidad = $row['cantidad'];
    close($conn);
    return $cantidad;
}

function select_all_contacto()
{
    $conn = connect();
    $sql = "SELECT *
    FROM CONTACTO";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_cantidad_stock($codigo_de_barras)
{
    $conn = connect();
    $sql = "SELECT cantidad_total FROM STOCK WHERE CODIGO_DE_BARRAS = '" . $codigo_de_barras . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $cantidad = $row['cantidad_total'];
    close($conn);
    return $cantidad;
}

function select_all_cliente()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM CLIENTE
    ORDER BY activo desc, nombre_completo asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}function borrar_articulo($id_articulo)
{
    $conn = connect();
    $sql = "DELETE FROM 'ARTICULO' WHERE ID_ARTICULO = " . $id_articulo;
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
function borrar_stock($codigo_de_barras)
{
    $conn = connect();
    $sql = "DELETE FROM 'STOCK' WHERE CODIGO_DE_BARRAS = '" . $codigo_de_barras."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
function update_stock($codigo_de_barras, $cantidad_total)
{
    $conn = connect();
    $sql = "UPDATE STOCK SET cantidad_total = $cantidad_total  WHERE  CODIGO_DE_BARRAS = '" . $codigo_de_barras."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_sede_activo()
{
    $conn = connect();
    $sql = "SELECT *,s.activo as s_activo, s.telefono as s_telefono
    FROM SEDE S, CLIENTE C
    WHERE S.NIF_cliente = C.NIF_EMPRESA";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_rol()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM ROL";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_sede()
{
    $conn = connect();
    $sql = "SELECT *
    FROM SEDE S, CLIENTE C
    WHERE S.NIF_cliente = C.NIF_EMPRESA";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_mayorista()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM MAYORISTA
    ORDER BY nombre_empresa asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_sepa()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM SEPA";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_servicio()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM SERVICIO
    ORDER BY nombre asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_usuario()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM USUARIO
    ORDER BY nombre asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_stock()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM STOCK";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_articulo()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM ARTICULO";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_minutaje()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM MINUTAJE";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_sede_cliente($nif_cliente)
{
    $conn = connect();
    $sql = "SELECT * 
    FROM SEDE S
    WHERE S.NIF_cliente = '" . $nif_cliente . "'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_pre_factura_cliente($nif_cliente)
{
    $conn = connect();
    $sql = "SELECT * 
    FROM PRE_FACTURA PF
    WHERE PF.NIF_empresa = '" . $nif_cliente . "'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_id_sede($nombre)
{
    $conn = connect();
    $sql = "SELECT ID_SEDE FROM SEDE WHERE nombre = '" . $nombre . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $prefijo = $row['ID_SEDE'];
    close($conn);
    return $prefijo;
}

function select_all_user($id_user)
{
    $conn = connect();
    $sql = "SELECT *
    FROM USUARIO
    WHERE ID_USUARIO = '" . $id_user . "'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_password_user($id_user)
{
    $conn = connect();
    $sql = "SELECT *
        FROM USUARIO
        WHERE ID_USUARIO = '" . $id_user . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $password = $row['password'];
    close($conn);
    return $password;
}

function select_nombre_servicio($ID_servicio)
{
    $conn = connect();
    $sql = "SELECT nombre 
    FROM SERVICIO WHERE ID_SERVICIO = '" . $ID_servicio . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_servicio = $row['nombre'];
    close($conn);
    return $nombre_servicio;
}

function select_nombre_usuario($ID_usuario)
{
    $conn = connect();
    $sql = "SELECT nombre 
    FROM USUARIO WHERE ID_USUARIO = '" . $ID_usuario . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_usuario = $row['nombre'];
    close($conn);
    return $nombre_usuario;
}

function select_nombre_sede($ID_sede)
{
    $conn = connect();
    $sql = "SELECT nombre 
    FROM SEDE WHERE ID_SEDE = '" . $ID_sede . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_sede = $row['nombre'];
    close($conn);
    return $nombre_sede;
}

function select_nombre_cliente($NIF_cliente)
{
    $conn = connect();
    $sql = "SELECT nombre_comercial
    FROM CLIENTE WHERE NIF_EMPRESA = '" . $NIF_cliente . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_cliente = $row['nombre_comercial'];
    close($conn);
    return $nombre_cliente;
}

function select_nombre_mayorista($NIF_mayorista)
{
    $conn = connect();
    $sql = "SELECT nombre_empresa
    FROM MAYORISTA WHERE NIF_MAYORISTA = '" . $NIF_mayorista . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_mayorista = $row['nombre_empresa'];
    close($conn);
    return $nombre_mayorista;
}

//PRE_FACTURAS//////////////////////

function get_id_pre_factura($cliente, $nombre_pre_factura)
{
    $conn = connect();
    $sql = "SELECT *
    FROM PRE_FACTURA 
    WHERE NIF_empresa = '" . $cliente . "'
    AND nombre='".$nombre_pre_factura."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $ID_PRE_FACTURA = $row['ID_PRE_FACTURA'];
    close($conn);
    return $ID_PRE_FACTURA;
}


//PRE_FACTURA_ARTICULO//////////////////////
function id_crear_cabecera_pre_factura($nombre_pre_factura, $nif_cliente)
{
    $conn = connect();
    $sql = "SELECT ID_PRE_FACTURA
    FROM PRE_FACTURA 
    WHERE nombre = '" . $nombre_pre_factura . "'
    and NIF_empresa = '".$nif_cliente."'
    ORDER BY ID_PRE_FACTURA desc";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $id_pre_factura = $row['ID_PRE_FACTURA'];
    close($conn);
    return $id_pre_factura;
}
function ciudad_facturacion_crear_cabecera_pre_factura($nif_empresa)
{
    $conn = connect();
    $sql = "SELECT ciudad_facturacion
    FROM CLIENTE WHERE NIF_EMPRESA = '" . $nif_empresa . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $ciudad_facturacion = $row['ciudad_facturacion'];
    close($conn);
    return $ciudad_facturacion;
}
function codigo_postal_facturacion_crear_cabecera_pre_factura($nif_empresa)
{
    $conn = connect();
    $sql = "SELECT codigo_postal_facturacion
    FROM CLIENTE WHERE NIF_EMPRESA = '" . $nif_empresa . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $odigo_postal_facturacion = $row['codigo_postal_facturacion'];
    close($conn);
    return $odigo_postal_facturacion;
}
function calle_facturacion_crear_cabecera_pre_factura($nif_empresa)
{
    $conn = connect();
    $sql = "SELECT calle_facturacion
    FROM CLIENTE WHERE NIF_EMPRESA = '" . $nif_empresa . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $calle_facturacion = $row['calle_facturacion'];
    close($conn);
    return $calle_facturacion;
}

function numero_facturacion_crear_cabecera_pre_factura($nif_empresa)
{
    $conn = connect();
    $sql = "SELECT numero_facturacion
    FROM CLIENTE WHERE NIF_EMPRESA = '" . $nif_empresa . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $numero_facturacion = $row['numero_facturacion'];
    close($conn);
    return $numero_facturacion;
}

function get_articulo_pre_factura($ID_ARTICULO)
{
    $conn = connect();
    $sql = "SELECT *
    FROM ARTICULO WHERE ID_ARTICULO = '" . $ID_ARTICULO . "'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
function get_sede_id_sede($id_sede)
{
    $conn = connect();
    $sql = "SELECT nombre FROM SEDE WHERE ID_SEDE = '" . $id_sede . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $sede = $row['nombre'];
    close($conn);
    return $sede;
}
function get_servicio_id_servicio($id_servicio)
{
    $conn = connect();
    $sql = "SELECT nombre FROM SERVICIO WHERE ID_SERVICIO = '" . $id_servicio . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $servicio = $row['nombre'];
    close($conn);
    return $servicio;
}

//PRE_FACTURA_MINUTAJE//////////////////////
function get_minutaje_pre_factura($ID_MINUTAJE)
{
    $conn = connect();
    $sql = "SELECT *
    FROM MINUTAJE WHERE ID_MINUTAJE = '" . $ID_MINUTAJE . "'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
function get_precio_servicio($ID_servicio)
{
    $conn = connect();
    $sql = "SELECT *
    FROM SERVICIO WHERE ID_SERVICIO = '" . $ID_servicio . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $precio = $row['precio'];
    close($conn);
    return $precio;
}
//PRE_FACTURA_SERVICIO//////////////////////
function get_servicio_pre_factura($ID_SERVICIO)
{
    $conn = connect();
    $sql = "SELECT *
    FROM SERVICIO WHERE ID_SERVICIO = " . $ID_SERVICIO ;
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
function get_datos_cliente($nif_empresa)
{
    $conn = connect();
    $sql = "SELECT *
    FROM CLIENTE WHERE NIF_EMPRESA = '" . $nif_empresa . "'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

//VER PRE_FACTURA//////////////////////
//////////////////////////////////////////////////////////////////
function get_ver_pre_factura_articulos($id_pre_factura)
{
    $conn = connect();
    $sql = "SELECT *
    FROM TRONCO_PRE_FACTURA_ARTICULO WHERE ID_pre_factura = " . $id_pre_factura;
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
function get_ver_pre_factura_servicios($id_pre_factura)
{
    $conn = connect();
    $sql = "SELECT *
    FROM TRONCO_PRE_FACTURA_SERVICIO WHERE ID_pre_factura = " . $id_pre_factura;
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
function get_ver_pre_factura_minutajes($id_pre_factura)
{
    $conn = connect();
    $sql = "SELECT *
    FROM TRONCO_PRE_FACTURA_MINUTAJE WHERE ID_pre_factura = " . $id_pre_factura;
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
function get_nombre_articulo($ID_articulo)
{
    $conn = connect();
    $sql = "SELECT *
    FROM ARTICULO_FACTURADO WHERE ID_ARTICULO = '" . $ID_articulo . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre = $row['nombre'];
    close($conn);
    return $nombre;
}
function get_nombre_servicio($ID_servicio)
{
    $conn = connect();
    $sql = "SELECT *
    FROM SERVICIO WHERE ID_SERVICIO = '" . $ID_servicio . "'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre = $row['nombre'];
    close($conn);
    return $nombre;
}



//////////////////////////////////////////////////////////////////