<?php 
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');
require_once('config/config.php');
define('UPLOAD_DIR', 'public/img/');

//$Id2=$_GET['Id2'] ; // # Empresa
//$usuario=$_GET['usu'] ; // Lo paso por parametro porque no se pasan las variables de sessión porque usa el session_start();
// create new PDF document

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->SetHeaderData('Bienes Raices Multicasa', 50,'Tu mejor opción' , 'Entrada por Donativos/Compra');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'tcpdf/lang/spa.php')) {
	require_once(dirname(__FILE__).'tcpdf/lang/spa.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// Sin pie de pagina
$pdf->setPrintFooter(false);

$pdf->addPage();

$casa = $this->casa;

$img = $casa->imagen;
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR . uniqid() . '.jpg';
	$success = file_put_contents($file, $data);

$logo = '<img src="public/img/logotipo.png" width="80px" height="80px"/>';
$header = "<h1>Bienes Raices Multicasa</h1>
		   <p>Tu mejor opción en bienes raices</p>";

$col1 = 
"Nombre: ".'<b>'.$casa ->nombre.'</b>'."<br>".
"Dirección: ".'<b>'.$casa ->calle_num.'</b>'."<br>".
"Colonia: ".'<b>'.$casa->colonia.'</b>'."<br>".
"Ciudad: ".'<b>'.$casa->ciudad.'</b>'."<br>".
"Estado: ".'<b>'.$casa->estado.'</b>';
$col2 = 
"Codigo Postal: ".'<b>'.$casa->cp.'</b>'."<br>".
"Recamaras: ".'<b>'.$casa->recamaras.'</b>'."<br>".
"Baños: ".'<b>'.$casa->baños.'</b>'."<br>".

$col2 = '<img src="public/img/'.$file.'"/>';

$html_ = '<table style="width:100% border:1px;font-size:16px">
			<tr>
			<td width="20%">'.$logo.'</td>
			<td width="80%">'.$header.'</td>
			</tr>
		</table>
		<h1 style="text-align:center">'.$casa -> nombre.'</h1>
        <table style="width:100% border:1px;font-size:16px">
        <tr align="left" style="font-weight:bold padding: 2px;color:white" bgcolor="#4FA3C8">
            <th colspan="6">Información general</th>
        </tr>
        <br>
        <tr>
	    	<td width="50%">'.$col1.'</td>
	    	<td width="50%">'.$col2.'</td>
	  	</tr>
        </table>
        
        ';

  
$pdf->writeHTML($html_, true, false, true, false, '');

$pdf->lastPage();
// Genera pdf
//ob_clean(); // cleaning the buffer before Output()
ob_start();
ob_end_clean();
$pdf->Output('test.pdf', 'I');

?>



