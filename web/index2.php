<?php
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

ob_start();
?>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <style>
            #factura{
                font-family: Arial;
                font-size: 12px;
            }


            .datos_cliente br {
                display: block;
                margin: 0px;
            }

            #id_fecha{
                margin-top: 2%;
                margin-left:5%;
                margin-right:5%;
                width: 90%;
                border: 1px solid black;
                background-color: #CACACA;
                float:left;
                height: 2%;
            }

            #id_factura{
                float:left;
                width: 50%;
                margin-left: 3%;
            }
            #fecha_factura{
                float:right;
                width: 50%;
                text-align: right;
                margin-right: 3%;
            }
            .negrita{
                font-weight: bold;
            }
            #div_tabla_factura{
                width: 90%;
            }
            #tabla_factura{
                width: 100%;
            }
        </style>
    </head>
    <body>
    <div id="factura">
        <div id="cabecera_factura">
            <div id="logo" style="margin-left: 10%">
                <img src="assets/img/logo_factura.JPG" alt="CTW Logo" style="width: 25%">
            </div>
            <div id="datos_cliente" style="margin-left: 60%">
                <a class="datos_cliente negrita">LIU·JO SUCURSAL EN ESPAÑA</a><br>
                <a class="datos_cliente">NIF - W0055163J</a><br>
                <a class="datos_cliente">NIF intra - ESW0055163J</a><br>
                <a class="datos_cliente">Domicilio Paseo de Gracià, num.51 Local 102</a><br>
                <a class="datos_cliente">Boulevard Rosa</a><br>
                <a class="datos_cliente">08007 - Barcelona</a><br>

            </div>

        </div>
        <div id="tronco_factura">
            <div id="id_fecha">
                <div id="id_factura">
                    <a>Nº Fact.   123</a>
                </div>
                <div id="fecha_factura">
                    <a>Data:   25 de enero de 2017</a>
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
                    </tbody>

            </div>
        </div>
        <div id="pie_factura">

        </div>
    </div>
    </body>
    </html>
<?php
$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "./factura_pdf/ejemplo.pdf";
file_put_contents($filename, $pdf);

// Output the generated PDF to Browser
/*$dompdf->stream();*/