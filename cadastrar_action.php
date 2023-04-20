<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$cpf = filter_input(INPUT_POST, 'cpf');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$estado_civil = filter_input(INPUT_POST, 'estado_civil');

if (!$nome || !$data_nascimento || !$cpf || !$email || !$estado_civil) {
    header("Location: cadastrar.php?erro=Preencha todos os campos corretamente");
    exit;
}

if ($nome && $data_nascimento && $cpf && $email && $estado_civil) {

    $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE data_nascimento = :data_nascimento AND cpf = :cpf AND email = :email AND estado_civil = :estado_civil");
    $sql->bindValue(':data_nascimento', $data_nascimento);
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':estado_civil', $estado_civil);
    $sql->execute();

    if ($sql->rowCount() === 0) {

        $sql = $pdo->prepare("INSERT INTO funcionarios (nome, data_nascimento, cpf, email, estado_civil) VALUES (:nome, :data_nascimento, :cpf, :email, :estado_civil)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':data_nascimento', $data_nascimento);
        $sql->bindValue(':cpf', $cpf);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':estado_civil', $estado_civil);
        $sql->execute();

        header("Location: index.php");
        exit;
    } else {
        header("Location: cadastrar.php?erro=Já existe um registro com o mesmo nome ou email");
        exit;
    }
}
