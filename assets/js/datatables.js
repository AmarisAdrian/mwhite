$(document).ready(function () {
    /* DATATABLE Y BOTONES DE EXPORTAR CLIENTES */
    var Tabla_cliente_admin = $('#Tabla_cliente_admin').DataTable({      
        extend: 'collection',
        buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
        ],
      /*  "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },*/
    });
    Tabla_cliente_admin.buttons(0, null).containers().appendTo('#Menu_herramienta_cliente_admin');
});