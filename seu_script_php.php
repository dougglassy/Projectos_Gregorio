
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["preco"])) {
    // Recebe o valor enviado pela solicitação AJAX
    $valorDouble = (float) $_POST["preco"];

    // Faça o tratamento necessário com o valor double, por exemplo, salvar no banco de dados ou realizar cálculos.
    // ...

    // Responda à solicitação AJAX (opcional, caso deseje enviar alguma resposta ao cliente)
    echo "Valor double recebido com sucesso: " . $valorDouble;
}
?>
