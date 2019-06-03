<?php

// Inicializa a sessão
session_start();

// Apagar todas as variáveis da sessão
session_destroy();

// Volta para o login
header("Location: index.php");

?>