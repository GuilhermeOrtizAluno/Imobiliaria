<?php $v->layout("_view"); ?>

<form method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <div class="form-group">
        <input type="text" name="name" class="form-control"  placeholder="Nome" value="<?= $user->name ?>" required>
    </div>
    <div class="form-group">
        <input type="text" name="last" class="form-control"  placeholder="Sobrenome" value="<?= $user->surname ?>" required>
    </div>
    <div class="form-group">
        <input type="text" name="user" class="form-control"  placeholder="Usuario" value="<?= $user->username ?>" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control"  placeholder="Email" value="<?= $user->email ?>" required>
    </div>
    <div class="form-group">
        <input type="password" name="senha" class="form-control"  placeholder="Senha" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>