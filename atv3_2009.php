<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contagem de Números</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contagem de Números</h2>
        <form method="post">
            <?php for ($i = 0; $i < 10; $i++): ?>
                <div class="form-group">
                    <label for="numero<?php echo $i; ?>">Número <?php echo $i + 1; ?>:</label>
                    <input type="number" id="numero<?php echo $i; ?>" name="numero<?php echo $i; ?>" required>
                </div>
            <?php endfor; ?>
            <input type="submit" value="Enviar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numeros = [];
            for ($i = 0; $i < 10; $i++) {
                $numeros[] = (int) $_POST["numero$i"];
            }

            $negativos = 0;
            $positivos = 0;
            $pares = 0;
            $impares = 0;

            foreach ($numeros as $numero) {
                if ($numero < 0) {
                    $negativos++;
                } elseif ($numero > 0) {
                    $positivos++;
                }

                if ($numero % 2 == 0) {
                    $pares++;
                } else {
                    $impares++;
                }
            }

            echo "<p>Quantidade de números negativos: $negativos</p>";
            echo "<p>Quantidade de números positivos: $positivos</p>";
            echo "<p>Quantidade de números pares: $pares</p>";
            echo "<p>Quantidade de números ímpares: $impares</p>";
        }
        ?>
    </div>
</body>
</html>
