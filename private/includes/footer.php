<script src="/Ficha%2009/private/assets/bootstrap/bootstrap.bundle.min.js"></script>

<script src="/Ficha%2009/private/assets/jQuery/jquery-3.6.0.min.js"></script>

<script src="/Ficha%2009/private/assets/datatables/DataTables-1.13.1/js/jquery.dataTables.min.js"></script>

<script src="/Ficha%2009/private/assets/datatables/DataTables-1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="/Ficha%2009/private/assets/flatpickr/flatpickr.js"></script>

<script>
$(document).ready(function() {
    if ($('#tabela-clientes').length) {
        $('#tabela-clientes').DataTable({
            pageLength: 5,
            pagingType: "full_numbers",
            language: {
                decimal: "",
                emptyTable: "Sem dados disponíveis na tabela.",
                info: "Mostrando _START_ até _END_ de _TOTAL_ registos",
                infoEmpty: "Mostrando 0 até 0 de 0 registos",
                infoFiltered: "(Filtrando _MAX_ total de registos)",
                lengthMenu: "Mostrando _MENU_ registos por página.",
                loadingRecords: "Carregando...",
                processing: "Processando...",
                search: "Filtrar:",
                zeroRecords: "Nenhum registro encontrado.",
                paginate: {
                    first: "Primeira",
                    last: "Última",
                    next: "Seguinte",
                    previous: "Anterior"
                }
            }
        });
    }

    if ($('#texto_dnasc').length) {
        flatpickr("#texto_dnasc", {
            dateFormat: "Y-m-d",
            allowInput: true
        });
    }
});
</script>

</body>
</html>