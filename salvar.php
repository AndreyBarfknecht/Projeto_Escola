<?php
// 1. Incluir o arquivo de conexão
// Ele vai criar a variável $conexao
include 'conexao.php';

// 2. Verificar se os dados foram enviados via POST
// Isso evita que o script seja acessado diretamente pela URL
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 3. Receber e limpar os dados do formulário
    // ATENÇÃO: Use os mesmos 'name' que você definiu no seu formulário HTML
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    // Adicione aqui outras variáveis que seu formulário enviar (ex: $turma = $_POST['turma'];)

    // VALIDAÇÃO BÁSICA (exemplo)
    if (empty($nome) || empty($email)) {
        die("Erro: Nome e E-mail são campos obrigatórios.");
    }

    // 4. Preparar a consulta SQL (Query) de forma segura
    // O nome da tabela é 'alunos' e as colunas são 'nome' e 'email'. Altere se for diferente.
    $sql = "INSERT INTO alunos (nome, email) VALUES (?, ?)";

    // 5. Criar um "Prepared Statement"
    // Isso protege contra SQL Injection
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        // 6. Vincular os parâmetros (as variáveis do PHP com os '?' da query)
        // "ss" significa que estamos enviando duas strings (s = string).
        // Se fosse um número, seria 'i' (integer).
        mysqli_stmt_bind_param($stmt, "ss", $nome, $email);

        // 7. Executar o statement
        if (mysqli_stmt_execute($stmt)) {
            // Se a execução deu certo, redireciona para a página inicial com uma mensagem de sucesso
            // Isso evita que o formulário seja reenviado se o usuário atualizar a página.
            header("Location: index.php?status=sucesso");
            exit(); // Encerra o script após o redirecionamento
        } else {
            // Se deu erro na execução
            echo "Erro ao salvar o aluno: " . mysqli_stmt_error($stmt);
        }

        // 8. Fechar o statement
        mysqli_stmt_close($stmt);

    } else {
        // Se deu erro na preparação da query
        echo "Erro na preparação da consulta: " . mysqli_error($conexao);
    }

    // 9. Fechar a conexão com o banco de dados
    mysqli_close($conexao);

} else {
    // Se alguém tentar acessar o arquivo diretamente
    echo "Acesso inválido. Este arquivo deve ser chamado a partir de um formulário.";
}
?>