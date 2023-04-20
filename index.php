<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM funcionarios");
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1 style="font-family:Lucida Sans; ">Listagem de Usuário</h1>
<tbody>
    <table border="1" height="5%" width="55%" align-text="right">
        <tr style=" font-family:Lucida Sans; ">
            <th align-text="right">Id</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Estado Civil</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($lista as $funcionarios) : ?>
            <tr>
                <td><?= $funcionarios['id']; ?> </td>
                <td><?= $funcionarios['nome']; ?> </td>
                <td><?= $funcionarios['data_nascimento']; ?> </td>
                <td><?= $funcionarios['cpf']; ?> </td>
                <td><?= $funcionarios['email']; ?> </td>
                <td><?= $funcionarios['estado_civil']; ?> </td>
                <td>
                    <a href=" editar.php?id=<?= $funcionarios['id']; ?> "> <button style=" font-family:Lucida Sans; border-color:forestgreen;"> Editar </button> </a>

                    <a href="excluir.php?id=<?= $funcionarios['id']; ?> "> <button style="font-family:Lucida Sans; border-color:red;"> Excluir </button> </a>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</tbody>

<a href="cadastrar.php"><button style="width:5%; font-family:Lucida Sans; ">Cadastrar Usuário</button></a>