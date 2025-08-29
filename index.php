<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro De Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro de Aluno</h2>
        <form action="salvar.php" method="POST">
            <label>Nome:</label><br>
            <input type="text" name="nome" required><br><br>
            <label>Idade:</label><br>
            <input type="number" name="idade" required><br><br>
            <label>E-mail:</label><br>
            <input type="email" name="email" required><br><br>
            <label>Curso:</label><br>
            <input type="text" name="curso" required><br><br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>