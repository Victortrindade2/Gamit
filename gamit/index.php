<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamit</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <main>
        <?php
            require_once 'config.php';
            $stmt = $pdo->prepare("SELECT
                JSON_OBJECTAGG(categoria, jogo) AS carrosseis
                FROM
                (
                    SELECT
                    c.nome AS categoria,
                    JSON_ARRAYAGG(
                        JSON_OBJECT(
                        'id',
                        j.id_jogo,
                        'nome',
                        j.nome,
                        'genero',
                        j.genero,
                        'age_limit',
                        j.age_limit,
                        'price_cent',
                        j.price_cent,
                        'img_ascci',
                        j.img_ascci
                        )
                    ) AS jogo
                    FROM
                    carrosseis c
                    JOIN carrosseis_jogos cj ON cj.id_carrossel = c.id_carrossel
                    JOIN jogo j ON j.id_jogo = cj.id_jogo
                    GROUP BY
                    c.id_carrossel,
                    c.nome
                ) t;");

            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $carrosseis = json_decode($resultado['carrosseis'], true);

            foreach($carrosseis as $nomeCategoria => $listaJogos){
                echo "<div class='carrosselConteiner'>";
                echo "<h2>" . htmlspecialchars($nomeCategoria) . "</h2>";
                
                foreach ($listaJogos as $jogo) {
                    $nome = htmlspecialchars($jogo['nome']);
                    $preco_num = (int)$jogo['price_cent'] / 100;
                    $preco = "R$ " . number_format($preco_num, 2, ',', '.');
                    $imagem_base64 = htmlspecialchars($jogo["img_ascci"]);
                    $age_limit = htmlspecialchars($jogo["age_limit"]);
                    $genero = htmlspecialchars($jogo["genero"]);

                    echo "<ul>";
                    echo "<li>" . 
                            "<div class='jogoConteiner'>" .
                                "<img src='data:image/jpeg;base64," . $imagem_base64 . "' alt='" . $nome . "'>" .
                                //"<h3>" . $nome . "</h3>" .
                                "<div class='infoConteiner'>" .
                                    "<h6>" . $age_limit . "</h6>" . 
                                    "<div class='priceConteiner'>" .
                                        "<h4>" . $preco . "</h4>" .
                                    "</div>" . 
                                "</div>".
                            "</div>" . 
                         "</li>";
                }
                
                echo "</ul>"; // Fechamento da UL corrigido
                echo "</div>"; // Fechamento da DIV do carrossel corrigido
            }
        ?>
    </main>
</body>
</html>