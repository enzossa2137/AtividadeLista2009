<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Alunos</h2>
        <form method="post">
            <?php for ($i = 0; $i < 10; $i++): ?>
                <div class="form-group">
                    <label for="nome<?php echo $i; ?>">Nome do Aluno <?php echo $i + 1; ?>:</label>
                    <input type="text" id="nome<?php echo $i; ?>" name="nome<?php echo $i; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nota<?php echo $i; ?>">Nota do Aluno <?php echo $i + 1; ?>:</label>
                    <input type="number" step="0.01" id="nota<?php echo $i; ?>" name="nota<?php echo $i; ?>" required>
                </div>
            <?php endfor; ?>
            <input type="submit" value="Enviar">
        

          