<?php 
    include("../config/config.php");
    include("../View/V_Plantilla.php");

    $sql = "SELECT 
                d.calle_principal, 
                d.calle_secundaria, 
                c.nombre_ciudad, 
                p.nombre_provincia
            FROM Direccion d
            INNER JOIN Ciudad c ON d.ciudad_id = c.id
            INNER JOIN Provincia p ON c.provincia_id = p.id;";
    $resultado = mysqli_query($conexion, $sql);

    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    // Establecer un tipo de fuente más atractivo y grande
    $pdf->SetFont('Arial','B',10);

    // Título del informe
    $pdf->Cell(0,10,'Informe de Direcciones',0,1,'C');
    $pdf->Ln(10); // Añadir espacio después del título

    // Encabezados de la tabla con fondo gris
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(30,10,'CLL PRINCIPAL',1,0,'C', true);
    $pdf->Cell(40,10,'CLL SECUNDARIA',1,0,'C', true);
    $pdf->Cell(40,10,'N CIUDAD',1,0,'C', true);
    $pdf->Cell(30,10,'N PROVINCIA',1,0,'C', true);
    

    // Restablecer tipo de fuente para los datos
    $pdf->SetFont('Arial','',12);
    $pdf->Ln(10); 
    while($mostrar = mysqli_fetch_array($resultado))
    {
        // Datos de la tabla
        $pdf->SetFillColor(200, 220, 255);
        $pdf->Cell(30,10,$mostrar['calle_principal'],1,0,'C', true);
        $pdf->Cell(40,10,$mostrar['calle_secundaria'],1,0,'C', true);
        $pdf->Cell(40,10,$mostrar['nombre_ciudad'],1,0,'C', true);
        $pdf->Cell(30,10,$mostrar['nombre_provincia'],1,0,'C', true);
        

        $pdf->Ln(10); 
    }

    // Salida del PDF
    $pdf->Output('I');
?>