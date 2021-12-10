<?php $v->layout("_view"); ?>

<div class='d-flex justify-content-between align-items-center mb-3'>
    <h1 class='h2 m-0'>Bairro</h1>
    <button class='btn btn-primary' data-toggle="modal" data-target="#new">
        <div class='d-flex justify-content-between align-items-center'>
            <i class='fas fa-plus-circle'></i>
            <span class='p ml-2'>Novo</span>
        </div>
    </button>
</div>

<?php if($districts) : ?>

<table class="table table-striped">
    <thead class="thead-dark ">
        <tr>
            <th class="text-center">Bairro</th>
            <th class="text-center">Cidade</th>
            <th class="text-center">Criado</th>
            <th class="text-center">Modificado</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($districts as $district) : ?>
            <tr>
                <th class="text-center"><?= $district->district ?></th>
                <th class="text-center"><?= $district->city ?></th>
                <th class="text-center"><?= $district->created_at ?></th>
                <th class="text-center"><?= $district->updated_at ?></th>
                <td class="text-center">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete" onclick="idDel(<?= $district->id ?>)">
                        <span class="fa fa-trash"></span>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else : ?>

<h2>Nenhum Bairro cadastrado!!!</h2>

<?php endif ?>

<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="newTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form method="POST">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="newTitle">Novo Tipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="bairro" class="form-control" placeholder="Bairro">
                </div>
                <div class="form-group">
                    <select name="cidade" class="form-control" required>
                        <option readonly>Cidade</option>
                        <?php foreach($citys as $city) : ?>
                            <option value="<?= $city->id ?>"><?= ucfirst($city->description) ?></option>
                        <?php endforeach ?>
                    </select>
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