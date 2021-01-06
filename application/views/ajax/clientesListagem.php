<script type="text/javascript">
    $(function () {

        var table = $('#listagemClientes').DataTable({
            "ajax": {
                "url": URL + "listagemClientes",
                "type": "POST",
                "data": function (data) {
                    data.filtro = 0
                },
            },
            "cache": true,
            "processing": true,
            "language": {
                "sEmptyTable": "Clique em filtrar e aguarde alguns segundos...",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ Resultados por página",
                "sLoadingRecords": "Carregando ...",
                "sProcessing": "Aguarde, estamos preparando os dados...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisa rápida",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            "columns": [
                {"data": "codigo"},
                {"data": "nome"},
                {"data": "data_nascimento"},
                {"data": "sexo"},
                {"data": "alterar"},
                {"data": "excluir"}
            ]
        });
    });
    
    /*function visualizarChamado(codigo) {
        document.querySelector('.codigo_tarefa_modal').textContent = '';
        document.querySelector('.status_tarefa_modal').textContent = '';
        document.querySelector('.nome_fantasia_tarefa_modal').textContent = '';
        document.querySelector('.data_abertura_tarefa_modal').textContent = '';
        document.querySelector('.solicitante_tarefa_modal').textContent = '';
        document.querySelector('.telefone_fixo_tarefa_modal').textContent = '';
        document.querySelector('.telefone_celular_tarefa_modal').textContent = '';
        document.querySelector('.email_tarefa_modal').textContent = '';
        document.querySelector('.produto_tarefa_modal').textContent = '';
        document.querySelector('.componente_tarefa_modal').textContent = '';
        document.querySelector('.assunto_tarefa_modal').textContent = '';
        $('#comentarios_tarefas').html("");

        var request = $.ajax({
            url: URL + "buscarChamadoModal",
            method: "POST",
            data: {codigo: codigo},
            dataType: "json",
            cache: false,
        });

        request.done(function (res) {
            document.querySelector('.codigo_tarefa_modal').textContent = res[0]['codigo'];
            document.querySelector('.status_tarefa_modal').textContent = res[0]['nome_status'];
            document.querySelector('.nome_fantasia_tarefa_modal').textContent = res[0]['nome_fantasia'];
            document.querySelector('.data_abertura_tarefa_modal').textContent = res[0]['data_abertura'];
            document.querySelector('.solicitante_tarefa_modal').textContent = res[0]['solicitante'];
            document.querySelector('.telefone_fixo_tarefa_modal').textContent = res[0]['telefone_fixo'];
            document.querySelector('.telefone_celular_tarefa_modal').textContent = res[0]['telefone_celular'];
            document.querySelector('.email_tarefa_modal').textContent = res[0]['email'];

            document.querySelector('.produto_tarefa_modal').textContent = res[0]['nome_produto'];
            document.querySelector('.componente_tarefa_modal').textContent = res[0]['nome_componente'];

            document.querySelector('.assunto_tarefa_modal').textContent = res[0]['assunto'];

            $.each(res, function (key, value) {
                $('#comentarios_tarefas').append("\
                    <tr>\
                        <td><b class='text-primary'>" + value['tecnico_alt'] + ": " + value['data_registro'] + " - " + value['status'] + "</b><br />\
                            <p><b class='text-danger'>Arquivos: <a href='"+URL+'files/'+value['arquivo']+"' target='_blank'>"+value['arquivo_original']+"</a> | <a href='"+URL+'files/'+value['arquivo2']+"' target='_blank'>"+value['arquivo_original2']+"</a> | <a href='"+URL+'files/'+value['arquivo3']+"' target='_blank'>"+value['arquivo_original3']+"</a> | <a href='"+URL+'files/'+value['arquivo4']+"' target='_blank'>"+value['arquivo_original4']+"</a> | <a href='"+URL+'files/'+value['arquivo5']+"' target='_blank'>"+value['arquivo_original5']+"</a> | <a href='"+URL+'files/'+value['arquivo6']+"' target='_blank'>"+value['arquivo_original6']+"</a> | <a href='"+URL+'files/'+value['arquivo7']+"' target='_blank'>"+value['arquivo_original7']+"</a> | <a href='"+URL+'files/'+value['arquivo8']+"' target='_blank'>"+value['arquivo_original8']+"</a> | <a href='"+URL+'files/'+value['arquivo9']+"' target='_blank'>"+value['arquivo_original9']+"</a> | <a href='"+URL+'files/'+value['arquivo10']+"' target='_blank'>"+value['arquivo_original10']+"</a></b><br >\
                            <span>" + value['mensagem'] + "</span>\
                        </td>\
                    </tr>");
            });
            $('#visualizarChamado').modal('show');

        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed - visualizarChamado: " + textStatus, jqXHR);
        });
    }*/
</script>

</body>
</html>
