// 1. Validação de Formulário
function validarFormulario() {
    const nome = document.getElementById('nome').value.trim();
    const turma = document.getElementById('turma').value.trim();
    const tipo = document.getElementById('tipo_churrasco').value;
    const telefone = document.getElementById('telefone').value.trim();

    if (nome === "") {
        alert("O campo Nome é obrigatório.");
        return false;
    }
    if (turma === "") {
        alert("O campo Turma é obrigatório.");
        return false;
    }
    if (tipo === "") {
        alert("Selecione um tipo de churrasco.");
        return false;
    }
    // Verificação adicional escolhida: Telefone obrigatório
    if (telefone === "") {
        alert("Por favor, preencha o campo Telefone para contacto.");
        return false;
    }
    return true;
}

// 2. Confirmação antes de excluir
function confirmarExclusao(nome) {
    return confirm("Deseja realmente excluir esta inscrição de " + nome + "?");
}