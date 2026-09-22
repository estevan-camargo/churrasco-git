<?php
require_once '../includes/cabecalho.php';
require_once '../config/conexao.php';

// Captura de parâmetros de busca e filtros
$busca = $_GET['busca'] ?? '';
$filtro_pago = $_GET['pago'] ?? 'todos';
$filtro_presenca = $_GET['presenca'] ?? 'todos';

// Construção da consulta dinâmica
$sql = "SELECT * FROM participantes WHERE 1=1";

if (!empty($busca)) {
    $sql .= " AND nome LIKE '%" . $con->real_escape_string($busca) . "%'";
}
if ($filtro_pago === '1') {
    $sql .= " AND pago = 1";
} elseif ($filtro_pago === '0') {
    $sql .= " AND pago = 0";
}
if ($filtro_presenca === '1') {
    $sql .= " AND confirmado = 1";
} elseif ($filtro_presenca === '0') {
    $sql .= " AND confirmado = 0";
}

$resultado = $con->query($sql);
?>

<h2>Listagem de Participantes</h2>

<!-- Formulário de Busca e Filtros -->
<form method="GET" action="listar.php" style="margin-bottom: 20px;">
    <input type="text" name="busca" placeholder="Pesquisar por nome..." value="<?= htmlspecialchars($busca) ?>">
    
    <select name="pago">
        <option value="todos" <?= $filtro_pago === 'todos' ? 'selected' : '' ?>>Todos os Pagamentos</option>
        <option value="1" <?= $filtro_pago === '1' ? 'selected' : '' ?>>Pagos</option>
        <option value="0" <?= $filtro_pago === '0' ? 'selected' : '' ?>>Pendentes</option>
    </select>

    <select name="presenca">
        <option value="todos" <?= $filtro_presenca === 'todos' ? 'selected' : '' ?>>Todas as Presenças</option>
        <option value="1" <?= $filtro_presenca === '1' ? 'selected' : '' ?>>Confirmados</option>
        <option value="0" <?= $filtro_presenca === '0' ? 'selected' : '' ?>>Não Confirmados</option>
    </select>

    <button type="submit">Filtrar</button>
    <a href="listar.php">Limpar</a>
</form>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Turma</th>
            <th>Tipo</th>
            <th>Presença</th>
            <th>Pagamento</th>
            <th>Situação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($p = $resultado->fetch_assoc()): ?>
            <?php
            // Lógica do estado da inscrição
            if ($p['confirmado'] && $p['pago']) {
                $situacao = "<strong style='color:green;'>INSCRIÇÃO REGULARIZADA</strong>";
            } elseif ($p['confirmado'] && !$p['pago']) {
                $situacao = "<strong style='color:orange;'>PAGAMENTO PENDENTE</strong>";
            } else {
                $situacao = "<strong style='color:red;'>AGUARDANDO CONFIRMAÇÃO</strong>";
            }
            ?>
            <tr>
                <td><?= htmlspecialchars($p['nome']) ?></td>
                <td><?= htmlspecialchars($p['turma']) ?></td>
                <td><?= htmlspecialchars($p['tipo_churrasco']) ?></td>
                <td><?= $p['confirmado'] ? 'Confirmado' : 'Não confirmado' ?></td>
                <td><?= $p['pago'] ? 'Pago' : 'Pendente' ?></td>
                <td><?= $situacao ?></td>
                <td>
                    <a href="editar.php?id=<?= $p['id'] ?>">Editar</a> | 
                    <a href="excluir.php?id=<?= $p['id'] ?>" onclick="return confirmarExclusao('<?= htmlspecialchars($p['nome'], ENT_QUOTES) ?>')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require_once '../includes/rodape.php'; ?>