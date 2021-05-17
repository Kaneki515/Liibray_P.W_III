$(document).ready(function() {

    $('#table-tipo').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "src/tipo-usuario/model/list-tipo.php",
            "type": "POST"
        },
        "columns": [{
                "data": 'IDTIPO_USUARIO',
                "className": "text-center"
            },
            {
                "data": 'DESCRICAO',
                "className": "text-center"
            },
            {
                "data": 'IDTIPO_USUARIO',
                "orderable": false,
                "searchable": false,
                "className": "text-center",
                "render": function(data, type, row, meta) {
                    return `
                    <button id="${data}" class="btn btn-info btn-sm btn-view">VER</button>
                    <button id="${data}" class="btn btn-primary btn-sm btn-edit">EDITAR</button>
                    <button id="${data}" class="btn btn-danger btn-sm btn-delete">EXCLUIR</button>
                    `
                }
            }
        ]
    })
})