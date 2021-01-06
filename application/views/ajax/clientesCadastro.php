<script type="text/javascript">

    $('#data_nascimento_cliente').mask('00/00/0000');
    
    if ($('#codigo_cliente').val() != 0) {
        var request = $.ajax({
            url: URL + "buscarChamadoModal",
            method: "POST",
            data: {codigo: $('#codigo_cliente').val()},
            dataType: "json",
        });

        request.done(function (res) {

            $('#contato_chamado').val(res[0]['solicitante']);
            
            $(".select2Empresa option:selected").val(res[0]['cod_empresa']);
        });

        request.fail(function (jqXHR, textStatus) {
            console.log(jqXHR, textStatus);
            alert("Request failed - buscarChamadoModal : " + textStatus);
        });
    }


    $('#salvarCliente').click(function () {

        // VALIDAÇÃO DE CADA CAMPO DO FORMULÁRIO.
        var validador = 0;

        if ($('#nome_cliente').val() == '') {
            validadarDados('#validadorNOME');
            $('#nome_cliente').focus();
            validador = 1;
        }

        if ($('#data_nascimento_cliente').val() == '') {
            validadarDados('#validadorDATANASCIMENTO');
            $('#data_nascimento_cliente').focus();
            validador = 1;
        }

        if ($('#sexo_cliente').val() == '0') {
            validadarDados('#validadorSEXO');
            $('#sexo_cliente').focus();
            validador = 1;
        }

        if (validador == 1) {
            return false;
        }

        var dados = {
            codigo_cliente: $('#codigo_cliente').val(),
            nome: $('#nome_cliente').val(),
            data_nascimento_cliente: $('#data_nascimento_cliente').val(),
            sexo_cliente: $('#sexo_cliente').val(),
            cep_cliente: $('#cep_cliente').val(),
            endereco_cliente: $('#endereco_cliente').val(),
            numero_cliente: $('#numero_cliente').val(),
            complemento_cliente: $('#complemento_cliente').val(),
            bairro_cliente: $('#bairro_cliente').val(),
            estado_cliente: $('#estado_cliente').val(),
            cidade_cliente: $('#cidade_cliente').val(),
        }

        var request = $.ajax({
            url: URL + "salvarCliente",
            method: "POST",
            data: {dados: dados},
            dataType: "json",
        });

        request.done(function (msg) {
           console.log(msg);
        });

        request.fail(function (jqXHR, textStatus) {
            console.log(jqXHR, textStatus);
            alert("Request failed - salvarCliente : " + textStatus);
        });

    });

    function validadarDados(validar) {
        document.querySelector(validar).textContent = 'Campo obrigatório*';
    }

</script>

</body>
</html>
