<script type="text/javascript">

    $('#data_nascimento_cliente').mask('00/00/0000');
    $('#cep_cliente').mask('00000-000');
    
    if ($('#codigo_cliente').val() != 0) {
        var request = $.ajax({
            url: URL + "buscarCliente",
            method: "POST",
            data: {codigo_cliente: $('#codigo_cliente').val()},
            dataType: "json",
        });

        request.done(function (res) {
            //console.log(res);
            $('#nome_cliente').val(res['dadosCliente']['data'][0]['nome']);
            $('#data_nascimento_cliente').val(res['dadosCliente']['data'][0]['data_nascimento']);
            $('#sexo_cliente').val(res['dadosCliente']['data'][0]['sexo']);
            $('#cep_cliente').val(res['dadosCliente']['data'][0]['cep']);
            $('#endereco_cliente').val(res['dadosCliente']['data'][0]['endereco']);
            $('#numero_cliente').val(res['dadosCliente']['data'][0]['numero']);
            $('#complemento_cliente').val(res['dadosCliente']['data'][0]['complemento']);
            $('#bairro_cliente').val(res['dadosCliente']['data'][0]['bairro']);
            $('#estado_cliente').val(res['dadosCliente']['data'][0]['estado']);
            $('#cidade_cliente').val(res['dadosCliente']['data'][0]['cidade']);
        });

        request.fail(function (jqXHR, textStatus) {
            console.log(jqXHR, textStatus);
            alert("Request failed - buscarCliente : " + textStatus);
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
            //alert('Salvo com sucesso!');
            //location.href = URL + 'cliente';
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

    function buscarCep() {
        var cep = $('#cep_cliente').val();
        var request = $.ajax({
            url: "http://viacep.com.br/ws/" + cep + "/json/",
            method: "GET",
            dataType: "json"
        });

        request.done(function (res) {
//            console.log(res.cep);
            if (typeof res.cep !== 'undefined') {
                $('#endereco_cliente').val(res.logradouro);
                $('#bairro_cliente').val(res.bairro);
                $('#cidade_cliente').val(res.localidade);
                $('#estado_cliente').val(res.uf);

                $('#numero_cliente').focus();
            } else {
                alert('CEP não existe.');
            }

        });

        request.fail(function (jqXHR, textStatus) {
            console.log(jqXHR, textStatus);
            alert("CEP DIGITADO PROVAVELMENTE NÃO É DO BRASIL. (cepCliente): " + textStatus);
        });
    }

</script>

</body>
</html>
