function listAuthor() {

    $('.alert').click(function(e) {
        e.preventDefault()

        let id = $(this).attr('id')
        let nome = $(this).attr('name')

        $('#listar').append(`
        <div class="alert alert-primary">${nome}</div>
        <input type="hidden" name="USUARIO_IDUSUARIO[]" value="${id}">
    `)
        $('#' + id).hide()
    })

}

$(document).ready(function() {

    $('#AUTOR').keyup(function(e) {
        e.preventDefault()

        let NOME = `NOME=${$(this).val()}`

        if ($(this).val().length >= 3) {

            $('#autores').empty()

            $.ajax({
                dataType: 'json',
                type: 'POST',
                assync: true,
                data: NOME,
                url: 'src/usuario/model/find-usuario.php',
                success: function(dados) {
                    for (const dado of dados) {
                        // Pode-se usar tanto id="" & name="" como também data-id=""" & data-name=""
                        $('#autores').append(`<div id="${dado.IDUSUARIO}" name="${dado.NOME}" class="alert alert-secondary">${dado.NOME}</div>`)
                            // div não é editável e por isso colocar uma div
                    }
                    listAuthor()
                }
            })

        } else {
            $('#autores').empty()
        }
    })
})