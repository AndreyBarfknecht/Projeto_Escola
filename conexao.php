<?php

// conexao.php (Versão Inteligente - Funciona Local e no Railway)

// Verifica se está rodando no ambiente do Railway (procurando por uma variável de ambiente que só existe lá)
if (getenv('RAILWAY_ENVIRONMENT')) {
    // ############ ESTAMOS NO RAILWAY (Nuvem) ############
    // Pega as credenciais das variáveis de ambiente do Railway
    $host = getenv('MYSQLHOST');
    $user = getenv('MYSQLUSER');
    $password = getenv('MYSQLPASSWORD');
    $database = getenv('MYSQLDATABASE');
    $port = getenv('MYSQLPORT');

} else {
    // ############ ESTAMOS NO LOCALHOST ############
    // Define as credenciais para o banco de dados local (XAMPP)
    $host = 'localhost';       // ou '127.0.0.1'
    $user = 'root';            // Usuário padrão do XAMPP
    $password = 'Andrey11!';            // Senha padrão do XAMPP é vazia
    $database = 'projeto_escola'; // O nome do banco de dados que você criou localmente
    $port = 3306;              // Porta padrão do MySQL
}

// O resto do código é o mesmo para os dois ambientes
// =========================================================

// Criar a conexão com o banco de dados
$conexao = mysqli_connect($host, $user, $password, $database, $port);

// Verificar se a conexão foi bem-sucedida e parar a execução se falhar
if (!$conexao) {
    die("Erro: Falha ao conectar ao banco de dados. Detalhes: " . mysqli_connect_error());
}

// Opcional, mas recomendado: Definir o charset para UTF-8 para evitar problemas com acentos
mysqli_set_charset($conexao, "utf8");

?>