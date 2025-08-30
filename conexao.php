<?php

// 1. Pegar as credenciais do banco de dados das variáveis de ambiente do Railway
$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$password = getenv('MYSQLPASSWORD');
$database = getenv('MYSQLDATABASE');
$port = getenv('MYSQLPORT');

// 2. Criar a conexão com o banco de dados usando MySQLi
$conexao = mysqli_connect($host, $user, $password, $database, $port);

// 3. Verificar se a conexão foi bem-sucedida
if (!$conexao) {
    // Em um projeto real, o ideal é gravar o erro em um log, não mostrar para o usuário.
    die("Erro: Falha ao conectar ao banco de dados. Detalhes: " . mysqli_connect_error());
}

// Opcional, mas recomendado: Definir o charset para UTF-8 para evitar problemas com acentos
mysqli_set_charset($conexao, "utf8");

// Se tudo deu certo, a variável $conexao está pronta para ser usada nos seus outros arquivos.

?>