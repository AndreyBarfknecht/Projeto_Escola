<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Receber os dados do formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    // 2. Validar se os campos não estão vazios
    if (empty($nome) || empty($idade) || empty($email) || empty($curso)) {
        die("Erro: Todos os campos são obrigatórios.");
    }

    // 3. Preparar a consulta SQL com todos os campos
    $sql = "INSERT INTO alunos (nome, idade, email, curso) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        // 4. Vincular os 4 parâmetros
        // "siss" -> String, Integer, String, String
        mysqli_stmt_bind_param($stmt, "siss", $nome, $idade, $email, $curso);

        // 5. Executar
        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?status=sucesso");
            exit();
        } else {
            // Verifica se o erro é de email duplicado
            if (mysqli_errno($conexao) == 1062) {
                echo "Erro: O e-mail informado já está cadastrado.";
            } else {
                echo "Erro ao salvar o aluno: " . mysqli_stmt_error($stmt);
            }
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);

} else {
    echo "Acesso inválido.";
}
?>