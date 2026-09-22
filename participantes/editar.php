<?php
require_once '../includes/cabecalho.php';
require_once '../config/conexao.php';

$id = $_GET['id'] ?? 0;
$stmt = $con->prepare("SELECT * FROM participantes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$participante = $stmt->get_result()->fetch_assoc();

if (!$participante) {
    echo "Participante não encontrado.";
    require_once '../includes/rodape.php';
    exit();
}
?>

<h2>Editar Participante</h2>

<form action="atualizar.php" method="POST">
    <input type="hidden" name="id" value="<?= $participante['id'] ?>">

    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($participante['nome']) ?>" required><br><br>

    <label for="turma">Turma:</label><br>
    <input type="text" id="turma" name="turma" value="<?= htmlspecialchars($participante['turma']) ?>" required><br><br>

    <label for="telefone">Telefone:</label><br>
    <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($participante['telefone']) ?>"><br><br>

    <label for="tipo_churrasco">Tipo de Churrasco:</label><br>
    <select id="tipo_churrasco" name="tipo_churrasco" required>
        <option value="Tradicional" <?= $participante['tipo_churrasco'] === 'Tradicional' ? 'selected' : '' ?>>Tradicional</option>
        <option value="Vegetariano" <?= $participante['tipo_churrasco'] === 'Vegetariano' ? 'selected' : '' ?>>Vegetariano</option>
    </select><br><br>

    <label for="acompanhamento">Acompanhamento:</label><br>
    <input type="text" id="acompanhamento" name="acompanhamento" value="<?= htmlspecialchars($participante['acompanhamento']) ?>"><br><br>

    <label>Presença Confirmada?</label><br>
    <input type="radio" id="conf_sim" name="confirmado" value="1" <?= $participante['confirmado'] ? 'checked' : '' ?>> <label for="conf_sim">Sim</label>
    <input type="radio" id="conf_nao" name="confirmado" value="0" <?= !$participante['confirmado'] ? 'checked' : '' ?>> <label for="conf_nao">Não</label><br><br>

    <label>Pagamento Realizado?</label><br>
    <input type="radio" id="pago_sim" name="pago" value="1" <?= $participante['pago'] ? 'checked' : '' ?>> <label for="pago_sim">Sim</label>
    <input type="radio" id="pago_nao" name="pago" value="0" <?= !$participante['pago'] ? 'checked' : '' ?>> <label for="pago_nao">Não</label><br><br>

    <button type="submit">Salvar Alterações</button>
</form>

<?php require_once '../includes/rodape.php'; ?>