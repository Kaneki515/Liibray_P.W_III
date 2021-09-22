<html>
<body>

<?php
if(isset($_POST['enviar-formulario'])):
    $formatosPermitidos = array("png", "jpeg", "jpg", "gif");
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatosPermitidos)):
        $pasta="arquivos/";
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

    var_dump($_FILES);
endif;
?>

    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST" 
        enctype="multipart/form-data">

        <input type="file" name="arquivo">
        <input type="submit" name="enviar-formulario">
        <div id="mensagem"></div>
    </form>
</body>
</html>