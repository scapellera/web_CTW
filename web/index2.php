<?php ob_start(); ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style>
        .datos_cliente{
            font-size: 10px;
        }
        </style>
    </head>
    <body>
    <div id="factura">
        <div id="cabecera_factura">
            <div id="logo" style="margin-left: 10%;margin-top: 10%">
                <img src="assets/img/logo_factura.jpg" alt="CTW Logo" style="width: 80%">
            </div>
            <div id="datos_cliente" style="margin-left: 60%" >
                <a class="datos_cliente"<b>LIU·JO SUCURSAL EN ESPAÑA</b></a><br>
                <a class="datos_cliente">NIF - W0055163J</a><br>
                <a class="datos_cliente">NIF intra - ESW0055163J</a><br>
                <a class="datos_cliente">Domicilio Paseo de Gracià, num.51 Local 102</a><br>
                <a class="datos_cliente">Boulevard Rosa</a><br>
                <a class="datos_cliente">08007 - Barcelona</a><br>

            </div>

        </div>
        <div id="tronco_factura">

        </div>
        <div id="pie_factura">

        </div>
    </div>
    </body>
<?php
require_once("dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "./factura_pdf/ejemplo" . time() . '.pdf';
/*file_put_contents($filename, $pdf);*/
$dompdf->stream($filename);
?>