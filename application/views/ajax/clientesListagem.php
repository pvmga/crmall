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
    
    function excluirCliente(codigo) {
        if (window.confirm("Deseja realmente excluir ?")) {
            var request = $.ajax({
                url: URL + "excluirCliente",
                method: "POST",
                data: { codigo_cliente: codigo },
                dataType: "json",
            });

            request.done(function (res) {
                console.log(res);
            });

            request.fail(function (jqXHR, textStatus) {
                console.log(jqXHR, textStatus);
                alert("Request failed - excluirCliente : " + textStatus);
            });
        }
    }
</script>

</body>
</html>
