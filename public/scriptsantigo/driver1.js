
function validar() {

    var data_atual = testform.data_atual.value;
    var data_chegada = testform.data_chegada.value;
    var data_saida = testform.data_saida.value;
    var cidade_origem = testform.cidade_origem.value;
    var cidade_estado_origem = testform.estado_origem.value;
    var pais_origem = testform.pais_origem.value;
    var demais_referencias = testform.demais_referencias.value;

    const date1_atual = new Date(data_atual);
    const date2_chegada = new Date(data_chegada + " 00:00:00");
    const date3_saida = new Date(data_saida + " 00:00:00");




    if (pais_origem == "") {
        document.getElementById("pais_origem_msg").innerHTML = "Informe o país<br><i>¡Mensagem em espanhol!</i>";
        // show('informacoes_viagem_show', 'button_Mudarestado_informacoes_viagem');
        testform.pais_origem.focus();
        return false;
    }

    document.getElementById("pais_origem_msg").innerHTML = "";

    if (cidade_estado_origem == "") {
        document.getElementById("estado_origem_msg").innerHTML = "msg<br><i>¡Mensagem em espanhol!</i>"
        // show('informacoes_viagem_show', 'button_Mudarestado_informacoes_viagem');
        testform.estado_origem.focus();
        return false;
    }


    document.getElementById("estado_origem_msg").innerHTML = "";


    if (cidade_origem == "") {
        document.getElementById("cidade_origem_msg").innerHTML = "msg<br><i>¡Mensagem em espanhol!</i>"
        // show('informacoes_viagem_show', 'button_Mudarestado_informacoes_viagem');
        testform.cidade_origem.focus();
        return false;
    }

    document.getElementById("cidade_origem_msg").innerHTML = "";

    if (data_chegada == "") {
        document.getElementById("data_chegada_msg").innerHTML = "Informar a data de chegada em Florianópolis<br><i>¡Mensagem em espanhol!</i>"
        testform.data_chegada.focus();
        return false;
    }

    document.getElementById("data_chegada_msg").innerHTML = "";


    if (date1_atual.getTime() > date2_chegada.getTime()) {
        document.getElementById("data_chegada_msg").innerHTML = "Data invalida. Não é possível data anterior a hoje!<br><i>¡Mensagem em espanhol!</i>"
        testform.data_chegada.focus();
        return false;
    }
    document.getElementById("data_chegada_msg").innerHTML = "";


    if (data_saida == "") {
        document.getElementById("data_saida_msg").innerHTML = "Informar a data de saída de Florianópolis<br><i>¡Mensagem em espanhol!</i>";
        //show('informacoes_viagem_show', 'button_Mudarestado_informacoes_viagem');
        testform.data_saida.focus();
        return false;
    }

    document.getElementById("data_saida_msg").innerHTML = "";


    if (date3_saida.getTime() < date2_chegada.getTime()) {
        document.getElementById("data_saida_msg").innerHTML = "Data invalida. A data de retorno não pode ser anterior a chegada!<br><i>¡Mensagem em espanhol!</i>";
        testform.data_saida.focus();
        return false;
    }

    document.getElementById("data_saida_msg").innerHTML = "";


   


    //  teste de veiculo

    var placa_veiculo = testform.placa_veiculo.value;
    var tipo_veiculo = testform.tipo_veiculo.value;

    if (tipo_veiculo == "") {
        document.getElementById("tipo_veiculo_msg").innerHTML = "msg<br><i>¡Mensagem em espanhol!</i>"
        //show('cadastro_veiculo_show', 'button_Mudarestado_cadastro_veiculo');
        testform.tipo_veiculo.focus();
        return false;
    }

    document.getElementById("tipo_veiculo_msg").innerHTML = "";


    if (placa_veiculo == "") {
        document.getElementById("placa_veiculo_msg").innerHTML = "msg<br><i>¡Mensagem em espanhol!</i>"
        //show('cadastro_veiculo_show', 'button_Mudarestado_cadastro_veiculo');
        testform.placa_veiculo.focus();
        return false;
    }
    document.getElementById("placa_veiculo_msg").innerHTML = "";

    //  teste motoristas

    var rv = true;
    semaforo = false;
    variaveljs = 1;
    $('.verificar_motoristas').each(function (index) {

        if (this.value == '') {
            Mudarestado('cadastro_motoristas_show','button_Mudarestado_cadastro_motoristas');
            // $(this).css('border', '2px solid red');
            document.getElementById("motoristas_msg_" + $(this).attr("id")).innerHTML = 'Campo Obrigatório!<br><i>¡Nonono! </b>';
            this.focus();
            semaforo = false;
            return rv = false;
        };

        if (this.value != '') {
            // $(this).css('border', '1px solid');
            document.getElementById("motoristas_msg_" + $(this).attr("id")).innerHTML = '';

            semaforo = true;
            return rv = true;
        };

    })

    //  teste rotas

    semaforo = true;

    if (semaforo === true) {

        var rv = true;
        semaforo = false;
        variaveljs = 1;
        $('.verificar_rotas').each(function (index) {

            if (this.value == '') {
                mudarestado('cadastro_rotas_show','button_Mudarestado_cadastro_rotas');
                //  $(this).css('border', '2px solid red');
                document.getElementById("rotas_msg_" + $(this).attr("id")).innerHTML = 'Campo Obrigatório!<br><i>¡Nonono! </b>';
                this.focus();
                semaforo = false;
                return rv = false;
            };

            if (this.value != '') {
                // $(this).css('border', '1px solid');
                document.getElementById("rotas_msg_" + $(this).attr("id")).innerHTML = '';
                semaforo = true;
                return rv = true;
            };

        })

    }


    //  teste passageiros

    if (semaforo === true) {
        var rv = true;
        semaforo = false;
        variaveljs = 1;
        $('.verificar_passageiros').each(function (index) {

            if (this.value == '') {
                Mudarestado('cadastro_passageiros_show','button_Mudarestado_cadastro_passageiros');
                //  $(this).css('border', '2px solid red');
                document.getElementById("passageiros_msg_" + $(this).attr("id")).innerHTML = 'Campo Obrigatório!<br><i>¡Nonono! </b>';
                this.focus();
                semaforo = false;
                return rv = false;
            };

            if (this.value != '') {
               // $(this).css('border', '1px solid');
                document.getElementById("passageiros_msg_" + $(this).attr("id")).innerHTML = '';
                semaforo = true;
                return rv = true;
            };

        })

    }


    if (semaforo === true) {
        $.post(
            "./src/serie.php",
            $("#testform").serializeArray(),
            function (data) {
                Swal.fire(
                    'Viagem Cadastrada!',
                    '',
                    'success'
                ).then
                $('#stage1').html(data);
            }
        );
    }
}
function changer(x, id) {

    if (x === "Brasileiro") {
        $(id).attr('disabled', false);
        $(id).html('<option disabled selected value>Selecione o documento</option><option value="RG">RG</option><option value="CPF">CPF</option><option value="CNPJ">CNPJ</option><option value="CNH">CNH</option>                                            <option value="Carteira de Identidade">Carteira de Identidade</option>');
    }

    $(id).attr('disabled', false);
    if (x === "Estrangeiro") {
        $(id).html('<option disabled selected value>Seleccionar el documento</option><option value="Cédula de Cidadania">Cédula de Cidadania</option><option value="Cédula de Estrangeiro">Cédula de Estrangeiro</option><option value="Cédula de Identidade">Cédula de Identidade</option><option value="Documento Nacional de Identidade">Documento Nacional de Identidade</option><option value="Passaporte">Passaporte</option>');
    }
}









