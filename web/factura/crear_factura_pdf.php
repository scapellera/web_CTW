<?php
include('../assets/php/db.php');
include('../assets/php/selects.php');
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

ob_start();

$id_factura = "4";

?>
    <html>
    <head>
        <style>
            @font-face {
                font-family: "AgfaRotisSemiSerif";
                src: url('/assets/fonts/AgfaRotisSemiSerif.ttf');

            }

            @page {
                size: A4;
                margin-left: 15px;
                margin-right: 15px;
                margin-top: 15%;
                margin-bottom: 15%;

            }

            header {
                position: fixed;
                top: -13%;
                height: 15%;
                margin-left: 6%;
                margin-right: 6%;
            }

            footer {
                position: fixed;
                bottom: -15%;
                left: 0px;
                right: 0px;
                height: 15%;
                margin-left: 6%;
                margin-right: 6%;
            }

            #leftbar {
                position: fixed;
                width: 5%;
                opacity: .6;
            }

            #rightbar {
                position: fixed;
                width: 5%;
                float: right;
            }

            #logo {
                width: 30%;
                margin-left: 10%;
                margin-right: 60%;

            }

            #img_logo {
                display: block;
                width: 100%;
            }

            #text_logo {
                margin-top: 1%;
                font-family: AgfaRotisSemiSerif;
                font-size: 13px;
                text-align: center;
            }

            #datos_contacto_factura {
                font-size: 12px;
                padding-top: 10%;
                width: 50%;
                margin: auto;
                font-family: Tahoma, Geneva, sans-serif;
                text-align: center;
            }

            #datos_contacto_factura br {
                display: block;
                margin: 0px;
            }

            .negrita {
                font-weight: bold;
            }

            #reg_mercantil {
                height: 50%;
                margin-top: 33%;

            }

            #container {
                margin-left: 6%;
                margin-right: 6%;
                margin-bottom: 15%;
                /*background-color: red;*/
                height: 100%;

            }

            h1 {
                page-break-after: always;
            }

            h1:last-child {
                page-break-after: never;
            }

            #cabecera_facrura {
                width: 100%;
                /* background-color: blue;*/
            }

            #datos_cliente {
                margin-left: 70%;
                font-family: Tahoma, Geneva, sans-serif;
                font-size: 10px;
            }

            .datos_cliente br {
                margin: 0px;
            }

            #id_fecha {
                margin-top: 4%;
                margin-left: 5%;
                margin-right: 5%;
                width: 90%;
                border: 2px solid black;
                background-color: #CACACA;
                float: left;
                height: 2%;
                font-size: 10px;
            }

            #id_factura {
                float: left;
                width: 50%;
                margin-left: 3%;
            }

            #fecha_factura {
                float: right;
                width: 50%;
                text-align: right;
                margin-right: 3%;
            }

            #tabla_factura {
                width: 100%;
            }

            #div_tabla_factura {
                font-family: Tahoma, Geneva, sans-serif;
                font-size: 10px;
                width: 90%;
                margin-top: 8%;
                margin-left: 5%;
            }

            #tabla_factura {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;

            }

            #tabla_factura td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 4px;
            }

            #tabla_factura tr:nth-child(even) {
                background-color: #dddddd;
            }

            #pie_factura {
                width: 90%;
                margin-left: 5%;
            }

            #precio_final {
                font-family: Tahoma, Geneva, sans-serif;
                font-size: 10px;
                margin-left: 60%;
                width: 40%;
            }

            #textos_precio_final {
                margin-left: 20%;
                width: 50%;
                float: left;
            }

            #valores_precio_final {
                width: 30%;
                float: right;
            }

            .text_aling_right {
                text-align: right;
            }

            #tabla_entidades {
                width: 70%;
                font-size: 10px;
                margin-top: 15%;
            }


        </style>
    </head>
<body>
    <header>
        <div id="logo">
            <div id="img_logo"><img src="../assets/img/logo_factura.JPG" alt="CTW Logo" style="width: 100%;"></div>
            <div id="text_logo">Catalonian Technologie Werke, S.L</div>
        </div>
    </header>
    <footer>
        <div id="datos_contacto_factura">
            <a class="negrita">www.ctw.es</a><br>
            <a class="negrita">mcalvetj@ctw.es</a><br>
            <a>Carrer Bisbe Sivilla 38-40, Atico</a><br>
            <a>08022 Barcelona</a><br>
            <a>Tel (34) 93 4181172</a><br>
            <a>610 246 574</a><br>
        </div>
    </footer>
    <div id="leftbar">
        <div id="reg_mercantil">
            <img src="../assets/img/ctw_libro.JPG" alt="CTW Logo" style="width: 45%;display:block;margin:auto;">
        </div>
    </div>
    <div id="rightbar"></div>
<main>
    <div id="container">
    <div id="cabecera_facrura">
    <div id="datos_cliente">
<?php

$data = get_cabecera_factura($id_factura);
if ($data->num_rows > 0) {
    // output data of each row
    while ($row = $data->fetch_assoc()){
        $nif_cliente =$row['NIF_cliente'];
        $nombre_empresa=get_nombre_empresa($row['NIF_cliente']);
        $nif_intra=get_nif_intra($row['NIF_cliente']);


        ?>
        <a class="datos_cliente negrita"><?php echo $nombre_empresa?></a><br>
        <a class="datos_cliente">NIF - <?php echo $row['NIF_cliente']?></a><br>
        <a class="datos_cliente">NIF intra - <?php echo $nif_intra?></a><br>
        <a class="datos_cliente">Domicilio <?php echo $row['calle_facturacion']." , ".$row['numero_facturacion']?></a><br>
        <a class="datos_cliente"><?php echo $row['codigo_postal_facturacion']." - ".$row['ciudad_facturacion']?></a><br>
        <?php
   }
}
        ?>
        </div>
        </div>

        <div id="tronco_factura">
            <div id="id_fecha">
                <div id="id_factura">
                    <a>Nº Fact.<?php echo $id_factura?></a>
                </div>
                <div id="fecha_factura">
                    <?php
                    $timestamp=get_fecha_factura($nif_cliente);
                    $datetime = explode(" ",$timestamp);
                    $fecha_factura = $datetime[0];
                    ?>
                    <a>Data: <?php echo $fecha_factura?></a>
                </div>
            </div>

            <div id="div_tabla_factura">
                <table id="tabla_factura">
                    <thead>
                    <tr>
                        <th>Quantitat</th>
                        <th>Concepte</th>
                        <th>Preu unitari</th>
                        <th>Preu</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2</td>
                        <td>Keyboard cherry 7100x</td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Keyboard cherry 7100x</td>
                        <td>100000</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>

                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div>Keyboard cherry 7100xxxxxxxxxxxxxxxxx xxxxadaffdad saaaaaaaaaaa aaaaaaaaa
                                aaaaaa aaaaaaaaaa aaabbbbbbbbbb bbbbbbb bbbbbbbbbbbbb bccc cccccc ccccccc cccc
                                cccc cccccccccdddddddddddddddd dddddddd
                            </div>
                        </td>
                        <td>10</td>
                        <td>20</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Keyboard cherry 7100x</td>
                        <td>10</td>
                        <td>2230,454</td>

                    </tr>
                    </tbody>
                </table>

            </div>


        </div>
        <div id="pie_factura">

            <div id="precio_final">
                <div id="textos_precio_final">
                    <p class="text_aling_right">Base imponible:</p>
                    <p class="text_aling_right">21% IVA:</p>
                    <p class="negrita">TOTAL:</p>
                </div>
                <div id="valores_precio_final">
                    <p class="text_aling_right">2.300,00 E</p>
                    <p class="text_aling_right">483,00 E</p>
                    <p class="text_aling_right negrita">2.783,00 E</p>
                </div>
            </div>

            <table id="tabla_entidades">
                <tr>
                    <td>La Caixa:</td>
                    <td>ES56 2100 3031 8222 0075 5280</td>
                    <td>BIC:</td>
                    <td>CAIX ESBB</td>
                </tr>
                <tr>
                    <td>Banco Sabadell:</td>
                    <td>ES93 0081 7011 1000 0150 5558</td>
                    <td>BIC:</td>
                    <td>BSAB ESBB</td>
                </tr>
                <tr>
                    <td>Santander:</td>
                    <td>ES54 0049 4768 3622 1605 2393</td>
                    <td>BIC:</td>
                    <td>BSCH ESMM</td>
                </tr>
                <tr>
                    <td class="negrita">Firma:</td>
                </tr>
            </table>


        </div>

        </div>


        </main>
        </body>
        </html>
        <?php
        $dompdf = new Dompdf();
        $dompdf->load_html(ob_get_clean());
        $dompdf->render();
        $pdf = $dompdf->output();
        $filename = "../factura_pdf/ejemplo.pdf";
        file_put_contents($filename, $pdf);

// Output the generated PDF to Browser
/*$dompdf->stream();*/