

    function loadmasks(){
    $("input.cpf").mask("999.999.999-99", {
        reverse: true
    });

    $("input.telefone").mask("(99) 99999-9999", {
        reverse: true
    });


    $("input.insc_imob").mask("00.00.000.0000", {
        reverse: true
    });

     $("input.rg").mask("999999999000", {
        reverse: true
    });

    $("input.cnpj").mask("99.999.999/9999-99", {
        reverse: true
    });
    $("input.cep").mask("99999-999", {
        reverse: true
    });

    $("input.telefoneddi").mask("+99", {
        reverse: true
    });
    
    $("input.telefoneddd").mask("999", {
        reverse: true
    });


}
