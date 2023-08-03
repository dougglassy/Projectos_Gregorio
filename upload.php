

<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Diretório onde os arquivos serão armazenados
    $uploadDir = "uploads/";

    // Verifica se o diretório de upload existe, caso contrário, cria-o
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $file = $_FILES["file"];

    // Verifica se houve algum erro no envio do arquivo
    if ($file["error"] === UPLOAD_ERR_OK) {
        $fileName = basename($file["name"]);
        $filePath = $uploadDir . $fileName;

        // Move o arquivo temporário para o diretório de upload
        if (move_uploaded_file($file["tmp_name"], $filePath)) {
            echo "Arquivo enviado com sucesso: <a href='$filePath' target='_blank'>$fileName</a>";
        } else {
            echo "Ocorreu um erro ao enviar o arquivo.";
        }
    } else {
        echo "Erro no envio do arquivo: " . $file["error"];
    }
}
?>
