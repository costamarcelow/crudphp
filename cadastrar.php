<h1 style="font-family:Lucida Sans;">Cadastrar Usuário</h1>

<form method="POST" action="cadastrar_action.php">
    <label style="font-family:Lucida Sans; ">
        Nome: <input type="text" name="nome" />
    </label>
    <br>
    <br>
    <label style="font-family:Lucida Sans; ">
        Data de Nascimento: <input type="date" name="data_nascimento" />
    </label>
    <br>
    <br>
    <label style="font-family:Lucida Sans; ">
        CPF: <input type="number" maxlength="11" placeholder="Somente Números" name="cpf" />
    </label>
    <br>
    <br>
    <label style="font-family:Lucida Sans; ">
        E-mail: <input type="email" name="email" placeholder="exemplo@email.com" />
    </label>
    <br>
    <br>
    <label style="font-family:Lucida Sans; ">
        Estado Civil:
        <select name="estado_civil">
            <option value="Solteiro(a)">Solteiro(a)</option>
            <option value="Casado(a)">Casado(a)</option>
            <option value="Divorciado(a)">Divorciado(a)</option>
            <option value="Viúvo(a)">Viúvo(a)</option>
        </select>
    </label>

    <input type="submit" value="Salvar" />

</form>
<?php if (isset($_GET['erro'])) : ?>
    <p style="color: red;"><?php echo $_GET['erro']; ?></p>
<?php endif; ?>