<?php 
    include("../config/config.php");
    include("../View/V_Plantilla.php");

    $sql = "SELECT*FROM usuario";
    $resultado = mysqli_query($conexion, $sql);

    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    // Establecer un tipo de fuente más atractivo y grande
    $pdf->SetFont('Arial','B',10);

    // Título del informe
    $pdf->Cell(0,10,'Informe de Usuarios',0,1,'C');
    $pdf->Ln(10); // Añadir espacio después del título

    // Encabezados de la tabla con fondo gris
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(30,10,'ID',1,0,'C', true);
    $pdf->Cell(50,10,'NOMBRE',1,0,'C', true);
    $pdf->Cell(50,10,'APELLIDO',1,0,'C', true);
    $pdf->Cell(30,10,'TELEFONO',1,1,'C', true);

    // Restablecer tipo de fuente para los datos
    $pdf->SetFont('Arial','',12);
    $pdf->Ln(10); 
    while($mostrar = mysqli_fetch_array($resultado))
    {
        // Datos de la tabla
        $pdf->SetFillColor(200, 220, 255);
        $pdf->Cell(30,10,$mostrar['id'],1,0,'C', true);
        $pdf->Cell(50,10,$mostrar['nombre'],1,0,'C', true);
        $pdf->Cell(50,10,$mostrar['apellido'],1,0,'C', true);
        $pdf->Cell(30,10,$mostrar['telefono'],1,1,'C', true);
    }

    // Salida del PDF
    $pdf->Output('I');
?>