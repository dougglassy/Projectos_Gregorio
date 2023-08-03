<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copiar Dados do Excel para MySQL</title>
</head>
<body>
    <input type="file" id="excelFile">
    <button onclick="importarDados()">Importar Dados</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script>
        function importarDados() {
            const input = document.getElementById("excelFile");

            const reader = new FileReader();
            reader.onload = function (e) {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, { type: "array" });

                const worksheet = workbook.Sheets[workbook.SheetNames[0]];
                const jsonData = XLSX.utils.sheet_to_json(worksheet);

                enviarDadosParaServidor(jsonData);
            };

            reader.readAsArrayBuffer(input.files[0]);
        }

        function enviarDadosParaServidor(dados) {
            // Aqui você precisa fazer uma requisição HTTP para o servidor
            // utilizando a API fetch ou algum framework de JavaScript (por exemplo, axios)
            // para enviar os dados para o PHP no servidor.
            // O PHP irá receber esses dados e realizar a inserção no banco de dados MySQL.
            // Exemplo: (utilizando fetch)
            fetch('url_do_script_php.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dados)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Aqui você pode realizar alguma ação com a resposta do servidor,
                // como exibir uma mensagem de sucesso, por exemplo.
            })
            .catch(error => console.error('Erro:', error));
        }
    </script>
</body>
</html>
