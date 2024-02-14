<?php
include "../config/config.php";
include "../View/V_Plantilla.php";

$idcategoria=$_POST['idcategoria'];

$sql = "SELECT p.nombre_producto, c.nombre_categoria FROM producto p, categoria c, productocategoria pc WHERE pc.producto_id = p.id AND pc.categoria_id = c.id AND c.id = $idcategoria";

$resultado = mysqli_query($conexion, $sql);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Establecer un tipo de fuente más atractivo y grande
$pdf->SetFont('Arial', 'B', 16);

// Título del informe
$pdf->Cell(0, 10, 'Informe por categoria', 0, 1, 'C');
$pdf->Ln(10); // Añadir espacio después del título


// Encabezados de la tabla con fondo gris
$pdf->SetFillColor(200, 220, 255);

// Calcular la posición central de la tabla
$anchoPagina = $pdf->GetPageWidth();
$anchoTabla = 100; // Suma de los anchos de las celdas de la tabla
$posicionCentral = ($anchoPagina - $anchoTabla) / 2;

// Establecer la posición X para centrar la tabla
$pdf->SetX($posicionCentral); 

$pdf->Cell(50, 10, 'PRODUCTO', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'CATEGORIA', 1, 0, 'C', true);

// Restablecer tipo de fuente para los datos
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10);


while ($mostrar = mysqli_fetch_array($resultado)) {
    // Datos de la tabla
    $pdf->SetX($posicionCentral);
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(50, 10, $mostrar['nombre_producto'], 1, 0, 'C');
    $pdf->Cell(50, 10, $mostrar['nombre_categoria'], 1, 1, 'C');
}

// Salida del PDF
$pdf->Output('I', 'Reporte.pdf');
