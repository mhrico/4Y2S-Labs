<?php

require 'vendor/autoload.php';
use Dompdf\Dompdf; 

$dompdf = new DOMPDF();
$dompdf->loadHtmlFile('index.php');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("booklist.pdf");