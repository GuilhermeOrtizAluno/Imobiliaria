<?php $v->layout("_view"); ?>

<form method="POST">
    <div class="form-group">
        <input type="text" name="name" class="form-control"  placeholder="Nome" required>
    </div>
    <div class="form-group">
        <input type="text" name="last" class="form-control"  placeholder="Sobrenome" required>
    </div>
    <div class="form-group">
        <input type="text" name="user" class="form-control"  placeholder="Usuario" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control"  placeholder="Email" required>
    </div>
    <div class="form-group">
        <input type="password" name="senha" class="form-control"  placeholder="Senha" required>
    </div>

    <button type="submit" class="btn btn-primary">Criar</button>
</form>