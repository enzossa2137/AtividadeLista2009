<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
        <h2>Cadastro de Produtos</h2>
        <form method="post">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <div class="form-group">
                    <label for="nome<?php echo $i; ?>">Nome do Produto <?php echo $i + 1; ?>:</label>
                    <input type="text" id="nome<?php echo $i; ?>" name="nome<?php echo $i; ?>" required>
                </div>
                <div class="form-group">
                    <label for="preco<?php echo $i; ?>">Preço do Produto <?php echo $i + 1; ?>:</label>
                    <input type="number" step="0.01" id="preco<?php echo $i; ?>" name="preco<?php echo $i; ?>" required>
                </div>
            <?php endfor; ?>
            <input type="submit" value="Enviar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $produtos = receberProdutos();
            $qtdInferiores50 = contarProdutosInferiores($produtos, 50);
            echo "<p>Quantidade de produtos com preço inferior a R\$50,00: $qtdInferiores50</p>";
            $produtosEntre50e100 = listarProdutosEntre($produtos, 50, 100);
            echo "<p>Produtos com preço entre R\$50,00 e R\$100,00: " . implode(", ", $produtosEntre50e100) . "</p>";
            $mediaSuperiores100 = calcularMediaSuperiores($produtos, 100);
            echo "<p>Média dos preços dos produtos com preço superior a R\$100,00: " . number_format($mediaSuperiores100, 2) . "</p>";
        }

        function receberProdutos() {
            $produtos = [];
            for ($i = 0; $i < 5; $i++) {
                $nome = $_POST["nome$i"];
                $preco = (float) $_POST["preco$i"];
                $produtos[] = ['nome' => $nome, 'preco' => $preco];
            }
            return $produtos;
        }

        function contarProdutosInferiores($produtos, $limite) {
            $contagem = 0;
            foreach ($produtos as $produto) {
                if ($produto['preco'] < $limite) {
                    $contagem++;
                }
            }
            return $contagem;
        }

        function listarProdutosEntre($produtos, $minimo, $maximo) {
            $lista = [];
            foreach ($produtos as $produto) {
                if ($produto['preco'] >= $minimo && $produto['preco'] <= $maximo) {
                    $lista[] = $produto['nome'];
                }
            }
            return $lista;
        }

        function calcularMediaSuperiores($produtos, $limite) {
            $soma = 0;
            $contagem = 0;
            foreach ($produtos as $produto) {
                if ($produto['preco'] > $limite) {
                    $soma += $produto['preco'];
                    $contagem++;
                }
            }
            return $contagem > 0 ? $soma / $contagem : 0;
        }
        ?>
    </div>
</body>
</html>
