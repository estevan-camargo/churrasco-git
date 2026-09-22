<?php
require_once '../includes/verificar_login.php';
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Participante</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <script>
        function validarFormulario(event) {
            let nome = document.getElementById('nome').value;
            let turma = document.getElementById('turma').value;
            let tipo = document.getElementById('tipo_churrasco').value;
            let telefone = document.getElementById('telefone').value;
            
            // Validações obrigatórias
            if (nome.trim() === '') {
                alert("O campo Nome é obrigatório.");
                event.preventDefault(); return false;
            }
            if (turma.trim() === '') {
                alert("O campo Turma é obrigatório.");
                event.preventDefault(); return false;
            }
            if (tipo.trim() === '') {
                alert("O Tipo de Churrasco é obrigatório.");
                event.preventDefault(); return false;
            }
            // Validação adicional escolhida
            if (telefone.trim() !== '' && telefone.length < 9) {
                alert("O telefone deve ter pelo menos 9 dígitos.");
                event.preventDefault(); return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Cadastrar Novo Participante</h2>

    <form action="salvar.php" method="post" onsubmit="validarFormulario(event)">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" required>
        <br>

        <label for="turma">Turma:</label><br>
        <input type="text" name="turma" id="turma" required>
        <br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" id="telefone">
        <br>

        <label for="tipo_churrasco">Tipo de Churrasco:</label><br>
        <select name="tipo_churrasco" id="tipo_churrasco" required>
            <option value="">-- Selecione --</option>
            <option value="Tradicional">Tradicional</option>
            <option value="Vegetariano">Vegetariano</option>
        </select>
        <br>
        
        <label for="acompanhamento">Acompanhamento:</label><br>
        <input type="text" name="acompanhamento" id="acompanhamento">
        <br>

        <label for="confirmado">Presença confirmada:</label><br>
        <select name="confirmado" id="confirmado" required>
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
        <br>

        <label for="pago">Pagamento realizado:</label><br>
        <select name="pago" id="pago" required>
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
        <br><br>

        <input type="submit" value="Salvar Inscrição">
        <br><br>
        <a href="../index.php">Voltar para a página inicial</a>
    </form>
</body>
</html>