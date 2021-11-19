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
                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete" onclick="idDel(<?= $user->id ?>)">
                        <span class="fa fa-trash"></span>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form id="del" method="POST">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="deleteTitle">Deletar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente exluir?
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<?php $v->push('scripts') ?>
    <script>
        function idDel($id){
            $t = $("#del input[name='id']").val($id);
        }
    </script>
<?php $v->end() ?>