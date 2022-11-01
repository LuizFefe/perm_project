$(document).ready(function () {
    $("#operador_telefone").mask(`99 99 9999-99999`, {
        reverse: true
    });
});
if (operadorform.operador_tipo_documento.value === "CNPJ") {
    $(document).ready(function () {
        $("#operador_telefone").mask(`99 99 9999-99999`, {
            reverse: true
        });
    });
};
/**
    * Função para mudar o contexto dos campos "tipo_documento" e "documento" quando "operador_pais" for igual a 'Brasil'
*/

const operadorPaisIntput = document.forms.operadorform.elements.operador_pais;

operadorPaisIntput.addEventListener("change", () => {
    if (operadorPaisIntput.value === "Brasil") {
        $(document).ready(function () {
            $("#operador_documento").mask("22.222.222/2222-22", {
                reverse: true
            });
        });
        operadorform.operador_tipo_documento.disabled = true;
        operadorform.operador_tipo_documento.value = 'CNPJ';
    } else {
        operadorform.operador_tipo_documento.disabled = false;
        operadorform.operador_tipo_documento.value = 'CNPJ'.disabled;
        operadorform.operador_tipo_documento.selectedIndex = 0 ;
    }
    
})


// const operador_email_input = document.forms.operadorform.elements.operador_email;
// operador_email_input.addEventListener("onchange", console.log('oi'))

function validaemaildb() {
    var operador_email = operadorform.operador_email.value;
    $.ajax({
        url: './src/operador_analisa.php',
        type: 'POST',
        data: {
            "operador_email": operador_email
        },
        success: function (data) {
            data = $.parseJSON(data);
            if (data.operador_email) {
                document.getElementById("operador_email_msg").innerHTML="Email já cadastrado <br> <i>¡Correo electrónico ya registrado! </b>"
                document.getElementById("operador_email").select();
                document.getElementById('operador_email').value = "";
                document.getElementById('operador_email_rep').value = "";
                operadorform.operador_email.focus();

            } else {
                $("#operador_email_msg").html('');
            }
        }
    })
}


function validaroperador() {

    //   somente aceita se tiver id unico mesmo que esteja algum invisivel .none

    const operador_pais = operadorform.operador_pais.value;
    const operador_nome = operadorform.operador_nome.value;

    const operador_tipo_documento = operadorform.operador_tipo_documento.value;
    const operador_documento = operadorform.operador_documento.value;

    const operador_cep = operadorform.operador_cep.value;
    const operador_logradouro = operadorform.operador_logradouro.value;
    const operador_numero_endereco = operadorform.operador_numero_endereco.value;
    const operador_complemento_endereco = operadorform.operador_complemento_endereco.value;
    const operador_bairro = operadorform.operador_bairro.value;
    const operador_cidade = operadorform.operador_cidade.value;
    const operador_estado = operadorform.operador_estado.value;

    const operador_email = operadorform.operador_email.value;
    const operador_email_rep = operadorform.operador_email_rep.value;

    const operador_telefone = operadorform.operador_telefone.value;

    const operador_senha = operadorform.operador_senha.value;
    const operador_rep_senha = operadorform.operador_rep_senha.value;

    if (operador_pais === "") {
        document.getElementById("operador_pais_msg").innerHTML = "É obrigatório indicar o pais do operador! <br> <i>¡Es obligatorio indicar el país del operador! </b>";
        operadorform.operador_pais.focus();
        return false;
    }
    document.getElementById("operador_pais_msg").innerHTML = "";

    /** Opção de erro para troca de idioma
     * Duas "divs" com diferenças nas classes css para alteração do idioma
     * Status: Não está funcionando, pois ao adicionar na página, as "divs" sobrepoem a regra de tradução
     * 
        if (operador_nome === "") {
        document.getElementById("operador_nome_msg").innerHTML = `
            <div class="portugues"><b>É obrigatório preencher o nome do operador turístico! </b> </div>
            <div class="espanhol"><b>¡Es obligatorio completar el nombre del operador turístico!</b></div>`;
        operadorform.operador_nome.focus();
        return false;
     }
     */
    

    if (operador_nome === "") {
        document.getElementById("operador_nome_msg").innerHTML = "<b>É obrigatório preencher o nome do operador turístico!  <br> <i>¡Es obligatorio completar el nombre del operador turístico!</i>  </b>";
        operadorform.operador_nome.focus();
        return false;
    }
    document.getElementById("operador_nome_msg").innerHTML = "";

    if (operador_tipo_documento === "") {
        document.getElementById("operador_tipo_documento_msg").innerHTML = "* É obrigatório escolher o tipo de documento!<br><i>¡Mensagem em espanhol!</i>";
        operadorform.operador_tipo_documento.focus();
        return false;
    }
    document.getElementById("operador_tipo_documento_msg").innerHTML = "";

    if (operador_documento === "") {
        document.getElementById("operador_documento_msg").innerHTML = "* Preencha o número do documento! <br><i>¡Mensagem em espanhol!</i>";
        operadorform.operador_documento.focus();
        return false;
    }
    document.getElementById("operador_documento_msg").innerHTML = "";

    if (operador_documento.length <= 17 && operador_pais === "Brasil" ) {
        document.getElementById("operador_documento_msg").innerHTML = "* CNPJ incompleto <br><i>¡Mensagem em espanhol!</i>";
        operadorform.operador_documento.focus();
        return false;
    }
    document.getElementById("operador_documento_msg").innerHTML = "";


    if (operador_cep === "") {
        document.getElementById("operador_cep_msg").innerHTML = "* É obrigatório preencher código postal! <br><i>¡Mensagem em espanhol!</i>";
        operadorform.operador_cep.focus();
        return false;
    }
    document.getElementById("operador_cep_msg").innerHTML = "";


    if (operador_logradouro === "") {
        document.getElementById("operador_logradouro_msg").innerHTML = "* Preencha o nome do logradouro<br><i>¡Mensagem em espanhol!</i>";
        operadorform.operador_logradouro.focus();
        return false;
    }
    document.getElementById("operador_logradouro_msg").innerHTML = "";

    if (operador_numero_endereco === "") {
        document.getElementById("operador_numero_endereco_msg").innerHTML = "* Preencha o número! <br><i>¡Mensagem em espanhol!</i>";
        operadorform.operador_numero_endereco.focus();
        return false;
    }
    document.getElementById("operador_numero_endereco_msg").innerHTML = "";

    if (operador_complemento_endereco === "") {
        document.getElementById("operador_complemento_endereco_msg").innerHTML="* Preencha um complemento para seu endereço! <br><i>¡Mensagem em espanhol!</i>";
        operadorform.operador_complemento_endereco.focus();
        return false;
    }
    document.getElementById("operador_complemento_endereco_msg").innerHTML="";

    if (operador_bairro === "") {
        document.getElementById("operador_bairro_msg").innerHTML="Preencha o Bairro <br><i>¡Mensagem em espanhol!</i>";
        operadorform.operador_bairro.focus();
        return false;
    }
    document.getElementById("operador_bairro_msg").innerHTML="";

    if (operador_cidade === "") {
        document.getElementById("operador_cidade_msg").innerHTML="Preencha nome da Cidade<br><i>¡Mensagem em espanhol!</i>";
        operadorform.operador_cidade.focus();
        return false;
    }
    document.getElementById("operador_cidade_msg").innerHTML="";

    if (operador_estado === "") {
        document.getElementById("operador_estado_msg").innerHTML="Preencher nome do Estado<br><i>¡Mensagem em espanhol!</i>"
        operadorform.operador_estado.focus();
        return false;
    }
    document.getElementById("operador_estado_msg").innerHTML="";


    if (operador_email === "" || operador_email.indexOf('@') === -1 || operador_email.indexOf('.') === -1) {
        document.getElementById("operador_email_msg").innerHTML="Preencher E-mail no formato correto";
        operadorform.operador_email.focus();
        return false;
    }
    document.getElementById("operador_email_msg").innerHTML="";

    if (operador_email_rep === "" || operador_email_rep.indexOf('@') === -1 || operador_email_rep.indexOf('.') === -1) {
        document.getElementById("operador_email_rep_msg").innerHTML="Confirmar o E-mail";
        operadorform.operador_email_rep.focus();
        return false;
    }
    document.getElementById("operador_email_rep_msg").innerHTML="";

    if (operador_email != operador_email_rep) {
        document.getElementById("operador_email_rep_msg").innerHTML="Os E-mails devem ser iguais";
        operadorform.operador_email.focus();
        return false;
    }    
    document.getElementById("operador_email_rep_msg").innerHTML="";

    if (operador_telefone === "") {
        document.getElementById("operador_telefone_msg").innerHTML="Preencha o telefone";
        operadorform.operador_telefone.focus();
        return false;
    }  
    document.getElementById("operador_telefone_msg").innerHTML="";

    if (operador_telefone.length <= 14) {
        document.getElementById("operador_telefone_msg").innerHTML="Preencha o telefone com DDD DDI";
        operadorform.operador_telefone.focus();
        return false;
    }  
    document.getElementById("operador_telefone_msg").innerHTML="";

    if (operador_senha === "" || operador_senha.length <= 5) {
        document.getElementById("operador_senha_msg").innerHTML="A senha deve conter no mínimio 6 caracteres!";
        operadorform.operador_senha.focus();
        return false;
    }
    document.getElementById("operador_senha_msg").innerHTML="";

    if (operador_rep_senha === "" || operador_rep_senha.length <= 5) {
        document.getElementById("operador_rep_senha_msg").innerHTML="A senha deve conter no mínimio 6 caracteres 2!";
        operadorform.operador_rep_senha.focus();
        return false;
    }
    document.getElementById("operador_rep_senha_msg").innerHTML="";

    if (operador_senha != operador_rep_senha) {
        document.getElementById("operador_rep_senha_msg").innerHTML="As senhas devem ser iguais!</div>";
        operadorform.operador_rep_senha.focus();
        return false;
    }
    document.getElementById("operador_rep_senha_msg").innerHTML="";

};

