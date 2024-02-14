<?php
include('../View/v_plantilla.php');
include ("../config/config.php");

$sql = "SELECT * FROM producto";

$resultado = mysqli_query($conn,$sql);

//crear objeto
$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> Ln();
$pdf -> SetFont('Arial','I',8);
//$pdf -> Cell(45,10,'ID',1,0,'C');
$pdf -> Cell(45,10,'NOMBRE',1,0,'C');
//$pdf -> Cell(45,10,'precio',1,0,'C');
$pdf -> Cell(45,10,'stock',1,0,'C');
$pdf -> Ln();
while($mostrar=mysqli_fetch_array($resultado)){

   /// $pdf -> Cell(45,10,$mostrar['id'],1,0,'C');
    $pdf -> Cell(45,10,$mostrar['nombre_producto'],1,0,'C');
   // $pdf -> Cell(45,10,$mostrar['precio'],1,0,'C');
    $pdf -> Cell(45,10,$mostrar['stock'],1,0,'C');
    $pdf -> Ln();
}
$pdf -> Output('I','Holamundo.pdf');

?>