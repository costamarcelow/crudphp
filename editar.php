<?php
require 'config.php';

$funcionarios = [];
$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE id = :id ");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $funcionarios = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
}

?>

<h1 style="font-family:Lucida Sans;">Editar Usuário</h1>

<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?= $funcionarios['id']; ?>" />

    <label>
        Nome: <input type="text" name="nome" value="<?= $funcionarios['nome']; ?>" />
    </label>

    <label>
        Data de Nascimento: <input type="date" name="data_nascimento" value="<?= $funcionarios['data_nascimento']; ?>" />
    </label>

    <label>
        CPF: <input type="number" name="cpf" maxlength="10" value="<?= $funcionarios['cpf']; ?>" />
    </label>

    <label>
        E-mail: <input type="text" name="email" value="<?= $funcionarios['email']; ?>" />
    </label>

    <label>
        Estado Civil:
        <select name="estado_civil">
            <option value="Solteiro(a)">Solteiro(a)</option>
            <option value="Casado(a)">Casado(a)</option>
            <option value="Divorciado(a)">Divorciado(a)</option>
            <option value="Viúvo(a)">Viúvo(a)</option>
        </select>
    </label>




    <input type="submit" value="atualizar" />
</form>