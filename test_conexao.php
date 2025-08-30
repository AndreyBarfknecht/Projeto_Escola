<?php
echo "<h1>Teste de Conexão com o Banco de Dados</h1>";

// O arquivo conexao.php já tem um 'die()' que mata a execução e mostra um erro se a conexão falhar.
// Se o script passar por essa linha sem mostrar um erro, significa que conectou.
include 'conexao.php';

// Se chegamos até aqui, a conexão foi um sucesso!
echo "<p style='color: green; font-weight: bold;'>CONEXÃO BEM-SUCEDIDA!</p>";
echo "<p>Seu projeto PHP conseguiu se conectar ao banco de dados MySQL no Railway.</p>";

// Fecha a conexão que foi aberta no 'conexao.php'
mysqli_close($conexao);
?>