<?php

    // Iremos nos conectar ao banco de dados
    include('../../conexao/conn.php');

    $IDTIPO_USUARIO = $_REQUEST['IDTIPO_USUARIO'];

        $sql = "DELETE FROM TIPO_USUARIO WHERE IDTIPO_USUARIO = $IDTIPO_USUARIO";

        $resultado = $pdo->query($sql);

        if($resultado){
            $dados = array(
                'tipo' => 'sucess',
                'mensagem' => 'Registro exluido com sucesso!'
            );

        }else {
            $dados = array(
                'tipo' => 'error',
                'mensagem' => 'Não foi possível excluir o registro'
            );
            }

    echo json_encode($dados);