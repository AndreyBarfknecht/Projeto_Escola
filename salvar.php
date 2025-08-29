<?php
include "conexao.php";

$nome = $_POST["nome"];
$idade = $_POST["idade"];
$email = $_POST["email"];
$curso = $_POST["curso"];

$sql = "INSERT INTO alunos (nome, idade, email, curso) VALUES ($1, $2, $3, $4)";
$stmt = pg_prepare($conn, "insert_aluno", $sql);
$result = pg_execute($conn, "insert_aluno", array($nome, $idade, $email, $curso));

if ($result) {
    echo "<h1>Aluno cadastrado com sucesso!</h1>";
    echo "<a href='index.php'>Voltar para o cadastro</a>";
} else {
    echo "<h1>Erro ao cadastrar.</h1> <p>Detalhe: " . pg_last_error($conn) . "</p>";
    echo "<a href='index.php'>Tentar novamente</a>";
}

pg_close($conn);
?>