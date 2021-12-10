<?php if( isset($error) && count($error) > 0) : ?>
    <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="errorTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="errorTitle">ERRO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if(in_array("23000", $error)) : ?>
                        <span>Nao pode ser excluido pois esta vinculado!!!</span>
                    <?php endif ?>
                    <?php if(in_array("unique", $error)) : ?>
                        <span>Nao pode ser duplicado!!!</span>
                    <?php endif ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <?php $v->push('scripts') ?>
        <script>$('#error').modal('show')</script>
    <?php $v->end() ?>
<?php endif ?>