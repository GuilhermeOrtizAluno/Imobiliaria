<?php $v->layout("_view"); ?>

<div class='d-flex justify-content-between align-items-center mb-3'>
    <h1 class='h2 m-0'>Imoveis</h1>
    <a href="<?= url("imovel/criar") ?>" class='btn btn-primary'>
        <div class='d-flex justify-content-between align-items-center'>
            <i class='fas fa-plus-circle'></i>
            <span class='p ml-2'>Novo</span>
        </div>
    </a>
</div>

<?php if($immovables) : ?>

<table class="table table-striped">
    <thead class="thead-dark ">
        <tr>
            <th class="text-center">Referencia</th>
            <th class="text-center">Tipo</th>
            <th class="text-center">Valor</th>
            <th class="text-center">Cidade</th>
            <th class="text-center">Bairro</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($immovables as $immovable) : ?>
            <tr>
                <th class="text-center"><?= $immovable->referencia ?></th>
                <th class="text-center"><?= $immovable->tipo ?></th>
                <th class="text-center"><?= $immovable->venda ?></th>
                <th class="text-center"><?= $immovable->cidade ?></th>
                <th class="text-center"><?= $immovable->bairro ?></th>
                <td class="text-center">
                    <a class="btn btn-info"  href="<?= url("imovel/") . $immovable->id ?>">
                        <span class="fa fa-search"></span>
                    </a>
                    <a class="btn btn-warning" href="<?= url("imovel/editar?id=") . $immovable->id ?>">
                        <span class="fa fa-pencil-alt"></span>
                    </a>
                    <form action="" method="POST" style="display: inline-block">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $immovable->id ?>">
                        <button type="submit" class="btn btn-danger">
                            <span class="fa fa-trash"></span>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else : ?>

<h2>Nenhum Imovel cadastrado!!!</h2>

<?php endif ?>