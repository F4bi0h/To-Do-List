<?php
session_start();
$_SESSION['autenticado'] = false;
$_SESSION['id'] = null;

header('Location: ../index.php');