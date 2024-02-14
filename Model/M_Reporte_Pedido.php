<?php 
    include("./config/config.php");
    include("./View/V_Plantilla.php");

    $sql = "SELECT*FROM Pedido";
    $resultado = mysqli_query($conexion, $sql);

    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    // Establecer un tipo de fuente más atractivo y grande
    $pdf->SetFont('Arial','B',16);

    // Título del informe
    $pdf->Cell(0,10,'Informe de Pedidos',0,1,'C');
    $pdf->Ln(10); // Añadir espacio después del título

    // Encabezados de la tabla con fondo gris
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(30,10,'ID',1,0,'C', true);
    $pdf->Cell(50,10,'USUARIO ID',1,0,'C', true);
    $pdf->Cell(50,10,'FECHA PEDIDO',1,0,'C', true);
    $pdf->Cell(30,10,'SUBTOTAL',1,1,'C', true);
    $pdf->Cell(30,10,'IVA',1,1,'C', true);
    $pdf->Cell(30,10,'TOTAL',1,1,'C', true);

    // Restablecer tipo de fuente para los datos
    $pdf->SetFont('Arial','',12);
    $pdf->Ln(10); 
    while($mostrar = mysqli_fetch_array($resultado))
    {
        // Datos de la tabla
        $pdf->SetFillColor(200, 220, 255);
        $pdf->Cell(30,10,$mostrar['id'],1,0,'C', true);
        $pdf->Cell(50,10,$mostrar['usuario_id'],1,0,'C', true);
        $pdf->Cell(50,10,$mostrar['fecha_pedido'],1,0,'C', true);
        $pdf->Cell(30,10,$mostrar['subtotal'],1,1,'C', true);
        $pdf->Cell(30,10,$mostrar['iva'],1,1,'C', true);
        $pdf->Cell(30,10,$mostrar['total'],1,1,'C', true);
    }

    // Salida del PDF
    $pdf->Output('I');
?>