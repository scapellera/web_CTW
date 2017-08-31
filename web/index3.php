<?php
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

ob_start();
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
                margin: 15px 15px 15px 15px;

            }

            header {
                position: fixed;
                top: 0px;
                left: 0px;
                right: 0px;
                height: 15%;
                margin-left: 6%;
                margin-right: 6%;
            }

            footer {
                position: fixed;
                bottom: 0px;
                left: 0px;
                right: 0px;
                height: 15%;
                margin-left: 6%;
                margin-right: 6%;
            }

            #leftbar {
                position: fixed;
                width: 5%;
            }

            #rightbar {
                position: fixed;
                width: 5%;
                float: right;
            }

            p {
                page-break-after: always;
            }

            p:last-child {
                page-break-after: never;
            }

            #logo {
                width: 30%;
                margin-left: 10%;
                margin-right: 60%;
                margin-top: 2%;
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
            #datos_contacto_factura{
                font-size: 13px;
                padding-top: 10%;
                width: 50%;
                margin:auto;
                font-family: Tahoma, Geneva, sans-serif;
                text-align: center;
            }
            #datos_contacto_factura br {
                display: block;
                margin: 0px;
            }
            .negrita{
                font-weight: bold;
            }
            #reg_mercantil{
                height: 50%;
                margin-top: 33%;

            }

        </style>
    </head>
    <body>
    <header>
        <div id="logo">
            <div id="img_logo"><img src="assets/img/logo_factura.JPG" alt="CTW Logo" style="width: 100%;"></div>
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
            <img src="assets/img/ctw_libro.JPG" alt="CTW Logo" style="width: 45%;display:block;margin:auto;">
        </div>
    </div>
    <div id="rightbar"></div>
    <main>

        <div id="container">
            <p>page1</p>
            <p>page2</p>
        </div>

    </main>
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