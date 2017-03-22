<!doctype html>

<?php
session_start();
include('../../php/db.php');
include('../../php/selects.php');
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>

    <!--INSERTS-->
    <link href="../../css/insert.css" rel="stylesheet" />
    <!--CARGAR BARRA INSERT-->
    <link href="../../css/cargarinsert.css" rel="stylesheet" />

</head>
<body onload="itv = setInterval(prog, 10)">

<div >

                            
                        <?php
                        #Declaramos las variables del formulario
                        $cont=0;
                        $suma_cantidad=0;
                        $nombre = $_POST['nombre'];
                        $descripcion = $_POST['descripcion'];
                        $codigo_de_barras = $_POST['codigo_de_barras'];
                        $codigo_de_barras_update = $codigo_de_barras;
                        $nif_mayorista = $_POST['select_box_nif_mayorista'];
                        $codigo_producto_mayorista = $_POST['codigo_producto_mayorista'];
                        $numero_de_serie = $_POST['numero_de_serie'];
                        $precio = $_POST['precio'];
                        $cantidad = $_POST['cantidad'];
                        $numero_factura = $_POST['numero_factura'];
                        $ubicacion = $_POST['ubicacion'];
                        $nif_empresa_articulo = $_POST['select_box_nif_empresa'];

                        //Añadimos comillas a los varchars
                        $nombre="\"$nombre\"";
                        $precio="\"$precio\"";
                        $descripcion="\"$descripcion\"";
                        $codigo_de_barras="\"$codigo_de_barras\"";
                        $nif_mayorista="\"$nif_mayorista\"";
                        $codigo_producto_mayorista="\"$codigo_producto_mayorista\"";
                        $numero_de_serie="\"$numero_de_serie\"";
                        $numero_factura="\"$numero_factura\"";
                        $ubicacion="\"$ubicacion\"";
                        $nif_empresa_articulo="\"$nif_empresa_articulo\"";

                        //Si hay algun campo opcional no rellenado lo transforma en null
                        if($descripcion == "\"\""){
                            $descripcion = 'null';
                        }if($nif_mayorista == "\"\""){
                            $nif_mayorista = 'null';
                        }if($codigo_producto_mayorista == "\"\""){
                            $codigo_producto_mayorista = 'null';
                        }if($ubicacion == "\"\""){
                            $ubicacion = 'null';
                        }if($numero_de_serie == "\"\""){
                            $numero_de_serie = 'null';
                        }if($nif_empresa_articulo == "\"\""){
                            $nif_empresa_articulo = 'null';
                        }


                        //Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
                        $conn = connect();

                        $sql = "INSERT INTO ARTICULO (nombre, descripcion, codigo_de_barras, NIF_mayorista, codigo_producto_mayorista, numero_de_serie, precio, cantidad, numero_factura, ubicacion, NIF_cliente_articulo)
                        VALUES ($nombre, $descripcion, $codigo_de_barras, $nif_mayorista, $codigo_producto_mayorista, $numero_de_serie, $precio, $cantidad, $numero_factura, $ubicacion, $nif_empresa_articulo)";



                        if ($conn->query($sql) === TRUE) {

                            $data = select_all_stock();

                                if ($data->num_rows > 0) {
                                    // output data of each row
                                    while($row = $data->fetch_assoc()) {
                                        
                                        if($row['CODIGO_DE_BARRAS']==$codigo_de_barras_update){
                                            
                                            $cont=$cont+1;
                                            $suma_cantidad= $row['cantidad_total'] + $cantidad;
                                        }
                              
                                    
                             
                                   }       
                                }

                                if($cont==0){

                                    $sql2 = "INSERT INTO STOCK (CODIGO_DE_BARRAS, cantidad_total)
                                    VALUES ($codigo_de_barras, $cantidad)";

                                }else{

                                    $sql2 = "UPDATE STOCK SET cantidad_total = $suma_cantidad  WHERE  CODIGO_DE_BARRAS = $codigo_de_barras";

                                }
                                    if ($conn->query($sql2) === TRUE) {
                                        echo "Stock modificado";

                                    }else{
                                    echo "Error en Stock: <br><br>" . $sql . "<br><br><br>" . $conn->error;

                                    }

                        ?>
                            
                            <div id="precargador">
                                  <p id="progressnum"></p> 
                                  <div id="progressbar">
                                     <div id="indicador"></div>
                                  </div>
                            </div>
                                
                                <script>
                                //document.body.style.background = "#ea7f33";
                                var maxprogress = 300;
                                    var actualprogress = 0;
                                    var itv = 0;
                                    function prog()
                                    {
                                      if(actualprogress >= maxprogress) 
                                      {
                                        clearInterval(itv);     
                                        return;
                                      } 
                                      var progressnum = document.getElementById("progressnum");
                                      var indicador = document.getElementById("indicador");
                                      actualprogress +=2;  
                                      indicador.style.width=actualprogress + "px";
                                      progressnum.innerHTML = "Añadiendo artículo...";
                                      if (actualprogress==300){
                                        window.location="../../../entrada_stock.php";
                                      }
                                    }
                                </script>

                        <?php
                        } else {
                            echo "Error en artículo: <br><br>" . $sql . "<br><br><br>" . $conn->error;
                        }

                        close($conn); 
                         
                        ?>

</div>
</body>
</html>

<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>