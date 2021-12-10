<?php $v->layout("_view"); ?>

<div class='d-flex justify-content-between align-items-center mb-3'>
    <h1 class='h2 m-0'>Usuarios</h1>
    <a href="<?= url("usuario/criar") ?>" class='btn btn-primary'>
        <div class='d-flex justify-content-between align-items-center'>
            <i class='fas fa-plus-circle'></i>
            <span class='p ml-2'>Novo</span>
        </div>
    </a>
</div>

<table class="table table-striped">
    <thead class="thead-dark ">
        <tr>
            <th class="text-center">Nome</th>
            <th class="text-center">Usuario</th>
            <th class="text-center">Email</th>
            <th class="text-center">Criado</th>
            <th class="text-center">Modificado</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user) : ?>
            <tr>
                <th class="text-center"><?= $user->nome . " " . $user->sobrenome ?></th>
                <th class="text-center"><?= $user->usuario ?></th>
                <th class="text-center"><?= $user->email ?></th>
                <th class="text-center"><?= $user->created_at ?></th>
                <th class="text-center"><?= $user->updated_at ?></th>
                <td class="text-center">
                    <a class="btn btn-info" asp-action="Details" asp-route-id="@item.Id">
                        <span class="fa fa-search"></span>
                    </a>
                    <a class="btn btn-warning" href="<?= url("usuario/editar?id=") . $user->id ?>">
                        <span class="fa fa-pencil-alt"></span>
                    </a>
                    <form action="" method="POST" style="display: inline-block">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $user->id ?>">
                        <button type="submit" class="btn btn-danger">
                            <span class="fa fa-trash"></span>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>