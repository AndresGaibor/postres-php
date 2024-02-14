<?php

session_start();
$_SESSION['sesion_iniciada'] = "cerrado";
$_SESSION['esAdmin'] = false;

header("Location: ../index.php?pagina=0");