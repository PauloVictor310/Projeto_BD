<?php
session_start();
require_once 'controle.php';
$control = new Controle();
$control->logout();
?>