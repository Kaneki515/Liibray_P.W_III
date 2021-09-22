<?php

    // Obter nossa conexão com banco de dados
    include('../../conexao/conn.php');

    // Obter os dados enviados do formulário via REQUEST
    $requestData = $_REQUEST;

    // Verificação dos campos obrigatórios do formulário
    if(empty($requestData['NOME'])){
        // Caso a variável venha vazia gerar um retorno com erro
        $dados = array(
            "tipo" => "error",
            "mensagem" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)"
        );
    } else {
        // Caso a variável exista e tenha conteúdo, vamos gerar uma requisição
        $ID = isset($requestData['IDTRABALHO']) ? $requestData['IDTRABALHO'] : '';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

        // Verificação se é para cadastrar um novo registro
        if($operacao == 'insert'){
            try {
                $stmt = $pdo->prepare('INSERT INTO TRABALHO (TITULO, ANO, NROPAGINAS, RESUMO, ORIENTADOR, COORDENADOR, ARQUIVO) VALUES (:a, :b, :c, :d, :e, :f, :g)');
                $stmt->execute(array(
                    ':a' => utf8_decode($requestData['TITULO']),
                    ':b' => $requestData['ANO'],
                    ':c' => $requestData['NROPAGINAS'],
                    ':d' => $requestData['RESUMO'],
                    ':e' => $requestData['ORIENTADOR'],
                    ':f' => $requestData['COORDENADOR'],
                    ':g' => $requestData['ARQUIVO']
                ));
                $dados = array(
                    "tipo" => "success",
                    "mensagem" => "Trabalho cadastrado com sucesso."
                );
            } catch (PDOException $e) {
                $dados = array(
                    "tipo" => "error",
                    "mensagem" => "Não foi possível efetuar o cadastro do trabalho."
                );
            }
        } else {
            // Se minha variável operação estiver vazia então executa o update do registro
            try {
                $stmt = $pdo->prepare('UPDATE TRABALHO SET TITULO = :a, ANO = :b, NROPAGINAS = :c, RESUMO = :d, ORIENTADOR = :e, COORDENADOR =:f, ARQUIVO = :g WHERE IDTRABALHO = :id');
                $stmt->execute(array(
                    ':id' => $ID,
                    ':a' => utf8_decode($requestData['TITULO'])
                    ':b' => $requestData['ANO'],
                    ':c' => $requestData['NROPAGINAS'],
                    ':d' => $requestData['RESUMO'],
                    ':e' => $requestData['ORIENTADOR'],
                    ':f' => $requestData['COORDENADOR'],
                    ':g' => $requestData['ARQUIVO']
                ));
                $dados = array(
                    "tipo" => "success",
                    "mensagem" => "Trabalho alterado com sucesso."
                );
            } catch (PDOException $e) {
                $dados = array(
                    "tipo" => "error",
                    "mensagem" => "Não foi possível efetuar a alteração do trabalho."
                );
            }
        }
    }

    // Converter um array de dados para a representação JSON
    echo json_encode($dados);