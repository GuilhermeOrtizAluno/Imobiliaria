<?php $v->layout("_view"); ?>

<div class='d-flex justify-content-between align-items-center mb-3'>
    <h1 class='h2 m-0'>Cidade</h1>
    <button class='btn btn-primary' data-toggle="modal" data-target="#new">
        <div class='d-flex justify-content-between align-items-center'>
            <i class='fas fa-plus-circle'></i>
            <span class='p ml-2'>Novo</span>
        </div>
    </button>
</div>

<?php if($citys) : ?>

<table class="table table-striped">
    <thead class="thead-dark ">
        <tr>
            <th class="text-center">Cidade</th>
            <th class="text-center">Criado</th>
            <th class="text-center">Modificado</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($citys as $city) : ?>
            <tr>
                <th class="text-center"><?= $city->descricao ?></th>
                <th class="text-center"><?= $city->created_at ?></th>
                <th class="text-center"><?= $city->updated_at ?></th>
                <td class="text-center">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete" onclick="idDel(<?= $city->id ?>)">
                        <span class="fa fa-trash"></span>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else : ?>

<h2>Nenhuma Cidade cadastrado!!!</h2>

<?php endif ?>

<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="newTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form method="POST">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="newTitle">Novo Cidade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="descricao" class="form-control" placeholder="Descrição" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Criar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form id="del" method="POST">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="deleteTitle">Deletar Tipo</h5>
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