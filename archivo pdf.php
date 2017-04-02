
<?php
session_start();
 
include ('conexion.php');



if(isset($_SESSION['session_username'])) {
$usuario_doumento = $_SESSION['session_username'];

include ('fpdf/fpdf.php');

class PDF extends FPDF
{
   //Cabecera de página
  
       function Header()
    {
		
        $this->SetFont('Arial','B',16);
        $this->Cell(200,60,'',0,0,'C',
		$this->Image('imagenes/MFA.png', 50,9, 120));
		 $this->Ln(32);
		$this->SetTitle('Comprobante de Cita');
		$this->Cell(190,24,utf8_decode('CITA MÉDICA'),0,0,'C');
       
		
    }
   
   function Footer()
{

$this->SetY(-10);

$this->SetFont('Arial','I',8);

$this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
   }
   
   function Margin(){
	   
	   $this->SetMargins(10,10,10);
 	   $this->SetAutoPageBreak(true,10);
	   }
function ImprimirTexto($file){
        //Se lee el archivo
        $txt = file_get_contents($file);
        $this->SetFont('Arial','B',9);
        //Se imprime
        $this->MultiCell(180,5,$txt,0,'C');
    }
	  

	}
$doc = new PDF;
$doc->AddPage();
$doc->SetFont('Arial','B',12);
$sqli = "SELECT * FROM citas WHERE paciente = '$usuario_doumento'";
$registro=mysql_query($sqli,$con);
$datos = mysql_fetch_array($registro);
$doc->Ln(15);
$doc->Line(26,68,180,68);
$doc->Cell(98,18,'FECHA:                                                     ' .$datos['fecha_cita'] ,0,2,'C');
$doc->Line(25,81.2,94,81.2);
$doc->Cell(53,9,'  HORA:                      '.$datos['hora'],0,0,'C');

$doc->Line(130,81.2,180,81.2);
$doc->Cell(85,9,'CONSULTORIO:             '.$datos['consultorio'] ,0,1,'R');

$doc->Line(29,95,95,95);
$doc->Cell(82,18, utf8_decode('MÉDICO: '.$datos['medico']) ,0,0,'C');

$doc->Line(130,95,180,95);
$doc->Cell(78,18,'ESPECIALIDAD:     '.$datos['tipo_cita'], 0,1,'R');

$doc->Cell(185,5,utf8_decode('HORA LIMITE DE FACTURACIÓN: 2:45 PM'),0,2,'C');
$doc->ImprimirTexto('fpdf/texto fijo.txt'); //Texto fijo 

$doc->Output("Comprobante de cita.pdf","D");


}

else{
	header("Location:login.php");
	}
?>