$("#data").DataTable({
    language: {
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "No se encontraron registros",
        info: "",
        infoEmpty: "",
        infoFiltered: "(filtrado de _MAX_ registros totales)",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior",
        },
    },
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "Todos"],
    ],
    pageLength: 50,
    order:[[0, 'desc']],
    responsive: true,

});
