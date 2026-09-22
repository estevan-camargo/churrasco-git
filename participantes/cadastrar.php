<?php require_once '../includes/cabecalho.php'; ?>

<h2>Nova Inscrição</h2>

<form id="formCadastro" action="salvar.php" method="POST" onsubmit="return validarFormulario()">
    <label for="nome">Nome *:</label><br>
    <input type="text" id="nome" name="nome"><br><br>

    <label for="turma">Turma *:</label><br>
    <input type="text" id="turma" name="turma"><br><br>

    <label for="telefone">Telefone:</label><br>
    <input type="text" id="telefone" name="telefone"><br><br>

    <label for="tipo_churrasco">Tipo de Churrasco *:</label><br>
    <select id="tipo_churrasco" name="tipo_churrasco">
        <option value="">Selecione...</option>
        <option value="Tradicional">Tradicional</option>
        <option value="Vegetariano">Vegetariano</option>
    </select><br><br>

    <label for="acompanhamento">Acompanhamento:</label><br>
    <input type="text" id="acompanhamento" name="acompanhamento"><br><br>

    <label>Presença Confirmada?</label><br>
    <input type="radio" id="conf_sim" name="confirmado" value="1"> <label for="conf_sim">Sim</label>
    <input type="radio" id="conf_nao" name="confirmado" value="0" checked> <label for="conf_nao">Não</label><br><br>

    <label>Pagamento Realizado?</label><br>
    <input type="radio" id="pago_sim" name="pago" value="1"> <label for="pago_sim">Sim</label>
    <input type="radio" id="pago_nao" name="pago" value="0" checked> <label for="pago_nao">Não</label><br><br>

    <button type="submit">Cadastrar</button>
</form>

<?php require_once '../includes/rodape.php'; ?>