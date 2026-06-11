<script src="/Ficha%2009/private/assets/bootstrap/bootstrap.bundle.min.js"></script>

<script src="/Ficha%2009/private/assets/jQuery/jquery-3.6.0.min.js"></script>

<script src="/Ficha%2009/private/assets/datatables/DataTables-1.13.1/js/jquery.dataTables.min.js"></script>

<script src="/Ficha%2009/private/assets/datatables/DataTables-1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    if ($('#tabela-clientes').length) {
        $('#tabela-clientes').DataTable({
            pageLength: 5,
            language: {
                search: "Pesquisar:",
                lengthMenu: "Mostrar _MENU_ registos por página",
                info: "A mostrar _START_ a _END_ de _TOTAL_ registos",
                infoEmpty: "A mostrar 0 a 0 de 0 registos",
                infoFiltered: "(filtrado de _MAX_ registos no total)",
                zeroRecords: "Nenhum registo encontrado",
                paginate: {
                    first: "Primeiro",
                    last: "Último",
                    next: "Seguinte",
                    previous: "Anterior"
                }
            }
        });
    }
});
</script>

</body>
</html>