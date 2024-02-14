<?php

session_start();
$_SESSION['sesion_iniciada'] = "cerrado";
$_SESSION['esAdmin'] = false;
$_SESSION['id_usuario'] = null;

header("Location: ../index.php?pagina=0");