// FUNÇÕES GERAIS

function validarCamposLogin(event) {
    const email = document.getElementById('nome').value;
    const senha = document.getElementById('senha').value;

    if (email == "" || senha == ""){
        alert('Todos os campos devem ser preenchidos!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposCadastrarUsuario(event) {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const option = document.getElementById('id_tipo_usuario').value;

    if (nome == "" || email == "" || senha == "" || option == 0 || option === ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposAlterarEmail(event) {
    const email = document.getElementById('email').value;
    const confirmarEmail = document.getElementById('confirmarEmail').value;
    const senha = document.getElementById('senha').value;

    if (email == "" || confirmarEmail == "" ||senha == ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposAlterarNome(event) {
    const nome = document.getElementById('nome').value;
    const senha = document.getElementById('senha').value;

    if (nome == "" || senha == ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposAlterarSenha(event) {
    const senhaNova = document.getElementById('senhaNova').value;
    const confirmarSenha = document.getElementById('confirmarSenha').value;
    const senha = document.getElementById('senha').value;

    if (senhaNova == "" || confirmarSenha == "" || senha == ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposCadastrarMateria(event) {
    const materia = document.getElementById('materia').value;
    const option = document.getElementById('id_tipo_materia').value;
    const senhaAdmin = document.getElementById('senhaAdmin').value;

    if (materia == "" || option == "" || option == 0 || senhaAdmin == ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposCadastrarTipoMateria(event) {
    const tipoMateria = document.getElementById('nome').value;
    const senhaAdmin = document.getElementById('senhaAdmin').value;

    if (tipoMateria == "" || senhaAdmin == ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposEditarMateria(event) {
    const materia = document.getElementById('nome').value;
    const option = document.getElementById('IdTipoMateria').value;
    const senhaAdmin = document.getElementById('senhaAdmin').value;

    if (materia == "" || option == "" || option == 0  || senhaAdmin == ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposEditarNota(event) {
    const nota = document.getElementById('nota').value;
    const senhaAdmin = document.getElementById('senhaAdmin').value;

    if (nota == "" || nota > 10 || nota < 0 || senhaAdmin == ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposEditarSenhaUsuario(event) {
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmarSenha').value;
    const senhaAdmin = document.getElementById('senhaAdmin').value;

    if (senha == "" || confirmarSenha == "" || senhaAdmin == ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposEditarTipoMateria(event) {
    const tipoMateria = document.getElementById('nome').value;
    const senhaAdmin = document.getElementById('senhaAdmin').value;

    if (tipoMateria == "" || senhaAdmin == ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposEditarUsuario(event) {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const idTipoUsuario = document.getElementById('idTipoUsuario').value;
    const senhaAdmin = document.getElementById('senhaAdmin').value;

    if (nome == "" || email == "" || idTipoUsuario == "" || idTipoUsuario == 0 || senhaAdmin == ""){
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposExcluirUsuario(event) {
    const idUsuario = document.getElementById('idUsuario').value;

    if (idUsuario == 1 || idUsuario == "1"){
        alert('Este usuário não pode ser editado e/ou excluído!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function validarCamposExcluirTipoMateria(event) {
    const idTipoMateria = document.getElementById('id_tipo_materia').value;

    if (idTipoMateria == 1 || idTipoMateria == "1"){
        alert('Esta classificação não pode ser editada e/ou excluída!');

        event.preventDefault();

        return false;
    }
    

    return true;
}

function confirmarExcluir() {
    var confirmacao = confirm("Você confirma que deseja realmente excluir este campo permanentemente?");

    return confirmacao;
}


