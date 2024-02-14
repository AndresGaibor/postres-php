<?php 
    include("../config/config.php");
    include("../View/V_Plantilla.php");

    $sql = "SELECT p.nombre_producto, c.nombre_categoria FROM producto p, categoria c, productocategoria pc WHERE pc.producto_id = p.id AND pc.categoria_id = c.id";

    $resultado = mysqli_query($conexion, $sql);

    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    // Establecer un tipo de fuente más atractivo y grande
    $pdf->SetFont('Arial','B',16);

    // Título del informe
    $pdf->Cell(0,10,'Informe de productos por categoria',0,1,'C');
    $pdf->Ln(10); // Añadir espacio después del título

    // Encabezados de la tabla con fondo gris
    $pdf->SetFillColor(200, 220, 255);

    $pdf->Cell(50,10,'PRODUCTO',1,0,'C');
    $pdf->Cell(50,10,'CATEGORIA',1,0,'C');

    // Restablecer tipo de fuente para los datos
    $pdf->SetFont('Arial','',12);
    $pdf->Ln(10);

    // Variables para alternar colores de fondo
    $color1 = array(200, 220, 255);
    $color2 = array(255, 255, 255);
    $fill = true;

    while($mostrar = mysqli_fetch_array($resultado))
    {
        // Alternar colores de fondo
        $pdf->SetFillColor($fill ? $color1[0] : $color2[0], $fill ? $color1[1] : $color2[1], $fill ? $color1[2] : $color2[2]);

        // Datos de la tabla
        $pdf->Cell(50,10,$mostrar['nombre_producto'],1,0,'C');
        $pdf->Cell(50,10,$mostrar['nombre_categoria'],1,0,'C');
        $pdf->Ln();

        // Alternar el valor de $fill para cambiar el color de fondo
        $fill = !$fill;
    }

    // Salida del PDF
    $pdf->Output('I','Reporte.pdf');
?>
