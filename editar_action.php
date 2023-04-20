<?php

require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$cpf = filter_input(INPUT_POST, 'cpf');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$estado_civil = filter_input(INPUT_POST, 'estado_civil');

if ($id && $nome && $data_nascimento && $cpf && $email && $estado_civil) {
    $sql = $pdo->prepare("UPDATE funcionarios SET nome = :nome, data_nascimento = :data_nascimento, cpf = :cpf, email = :email, estado_civil = :estado_civil WHERE id= :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':data_nascimento', $data_nascimento);
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':estado_civil', $estado_civil);

    $sql->execute();

    header("Location: index.php");
    exit;
} else {
    //   header("Location: index.php");
    //   exit;
    echo "aqui";
}
