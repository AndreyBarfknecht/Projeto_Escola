<?php
// --- Credenciais para o banco de dados Neon ---
$host = "ep-dark-mountain-a57sedx0-pooler.sa-east-1.aws.neon.tech";
$port = "5432";
$db   = "neondb";
$user = "neondb_owner";
$pass = "npg_gX8AcGkKeP3l";

$conn_str = "host={$host} port={$port} dbname={$db} user={$user} password={$pass}";
$conn = pg_connect($conn_str);

if (!$conn) {
    die("A conexão com o banco de dados falhou. Erro: " . pg_last_error());
}
?>