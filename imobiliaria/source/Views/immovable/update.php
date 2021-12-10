<?php $v->layout("_view"); ?>

<form method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <div class="form-group">
        <input type="text" name="ref" class="form-control"  placeholder="Referencia" value="<?= $immovable->reference ?>" required>
    </div>
    <div class="form-group">
        <select name="tipo" class="form-control" required>
            <option readonly>Tipo</option>
            <?php foreach($types as $type) : ?>
                <option value="<?= $type->id ?>" <?php if($type->description == $immovable->type) echo "selected" ?> >
                    <?= ucfirst($type->description) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="venda" class="form-control"  placeholder="Valor de venda" value="<?= $immovable->value ?>" required>
    </div>
    <div class="form-group">
        <textarea name="descricao" class="form-control"  rows="3" placeholder="Descricao" required><?= $immovable->description ?></textarea>
    </div>
    <div class="form-group">
        <input type="text" name="cep" class="form-control"  placeholder="CEP" value=<?= $immovable->cep ?> required>
    </div>
    <div class="form-group">
        <select name="cidade" class="form-control" required>
            <option readonly>Cidade</option>
            <?php foreach($citys as $city) : ?>
                <option value="<?= $city->id ?>" <?php if($city->description == $immovable->city) echo "selected" ?>>
                    <?= ucfirst($city->description) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <select name="bairro" class="form-control" required>
            <option readonly>Bairro</option>
            <?php foreach($districts as $district) : ?>
                <option value="<?= $district->id ?>" <?php if($district->district == $immovable->district) echo "selected" ?>>
                    <?= ucfirst($district->district) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="rua" class="form-control"  placeholder="rua" value=<?= $immovable->street ?> required>
    </div>
    <div class="form-group">
        <input type="text" name="numero" class="form-control"  placeholder="numero" value=<?= $immovable->number ?> required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>