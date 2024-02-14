<?php

session_start();
$_SESSION['sesion_iniciada'] = "cerrado";

header("Location: ../index.php?pagina=0");