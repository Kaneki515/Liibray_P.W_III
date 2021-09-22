<?php
(.btnUpload).click = alert("Tests");
(.btnUpload).click(function(t){
function upload(t){
alert("teste");
if(isset($_POST['enviar-formulario'])):
    $formatosPermitidos = array("png", "jpeg", "jpg", "gif");
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatosPermitidos)):
        $pasta:src/trabalho/imagens;
        $temporario = $_FILES['arquivo']['tmp_name'];
        $novoNome = uniqid().$extensao;

        if(move_uploaded_file($temporario, $pasta.$novoNome)):
            $mensagem = "Upload feito com sucesso!";
        else:
            $mensagem = "Não foi possivel fazer o upload";
        endif;
        
    else:
        $mensagem = "Formato Inválido";
        
    endif;
    echo $mensagem;
else:
    $mensagem = "nada";
    var_dump($_FILES);
endif;

})
}