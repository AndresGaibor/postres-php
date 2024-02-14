<?php
include "../config/config.php";
include "../View/V_Plantilla.php";

$idcategoria = $_POST['idproducto'];

$sql = "SELECT * FROM Producto";

$resultado = mysqli_query($conexion, $sql);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Establecer un tipo de fuente más atractivo y grande
$pdf->SetFont('Arial', 'B', 16);

// Título del informe
$pdf->Cell(0, 10, 'Listado de productos', 0, 1, 'C');
$pdf->Ln(10); // Añadir espacio después del título


// Encabezados de la tabla con fondo gris
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(50, 10, 'Id', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Producto', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Precio', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Stock', 1, 0, 'C', true);




// Restablecer tipo de fuente para los datos
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10);


while ($mostrar = mysqli_fetch_array($resultado)) {
    // Datos de la tabla

    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(50, 10, $mostrar['id'], 1, 0, 'C');
    $pdf->Cell(50, 10, $mostrar['nombre_producto'], 1, 0, 'C');
    $pdf->Cell(50, 10, $mostrar['precio'], 1, 0, 'C');
    $pdf->Cell(30, 10, $mostrar['stock'], 1, 1, 'C');
}

// Salida del PDF
$pdf->Output('I', 'Reporte.pdf');
