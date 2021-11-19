<?php $v->layout("_view"); ?>

<form method="POST">
    <div class="form-group">
        <input type="text" name="ref" class="form-control"  placeholder="Referencia" required>
    </div>
    <div class="form-group">
        <select name="tipo" class="form-control" required>
            <option readonly>Tipo</option>
            <?php foreach($types as $type) : ?>
                <option value="<?= $type->id ?>"><?= ucfirst($type->descricao) ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="venda" class="form-control"  placeholder="Valor de venda" required>
    </div>
    <div class="form-group">
        <textarea name="descricao" class="form-control"  rows="3" placeholder="Descricao" required></textarea>
    </div>
    <div class="form-group">
        <input type="text" name="cep" class="form-control"  placeholder="CEP" required>
    </div>
    <div class="form-group">
        <select name="cidade" class="form-control" required>
            <option readonly>Cidade</option>
            <?php foreach($citys as $city) : ?>
                <option value="<?= $city->id ?>"><?= ucfirst($city->descricao) ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <select name="bairro" class="form-control" required>
            <option readonly>Bairro</option>
            <?php foreach($districts as $district) : ?>
                <option value="<?= $district->id ?>"><?= ucfirst($district->descricao) ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="rua" class="form-control"  placeholder="rua" required>
    </div>
    <div class="form-group">
        <input type="text" name="numero" class="form-control"  placeholder="numero" required>
    </div>

    <button type="submit" class="btn btn-primary">Publicar</button>
</form>