<?php ob_start(); ?>
    <head>
    <style>

    </style>
    </head>
    <body>
    <div id="factura">
        <div id="cabecera_factura">
            <div id="logo">

            </div>
            <div id="datos_cliente">

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
$filename = "./factura_pdf/ejemplo".time().'.pdf';
file_put_contents($filename, $pdf);
/*$dompdf->stream($filename);*/
?>