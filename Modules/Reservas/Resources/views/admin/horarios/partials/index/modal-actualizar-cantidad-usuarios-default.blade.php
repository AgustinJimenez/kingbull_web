<div class="modal fade modal-primary" id="modal-actualizar-cantidad-usuarios-default" tabindex="-1" role="dialog" aria-labelledby="delete-confirmation-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>

                <h4 class="modal-title text-center">
                    Actualizar Default Cantidad Maxima de Usuarios
                </h4>

            </div>

            <div class="container-fluid center-block clearfix">

                <div class="row">
                    <div class="form-group col-md-6 col-md-offset-3">
                        <label for="cantidad_maxima">Default Cantidad Maxima de Usuarios</label>
                        <input type="number" class="form-control" name="cantidad_maxima_usuarios" id="input_cantidad_maxima_usuarios" value="{{ $config->cantidad_maxima_usuarios?$config->cantidad_maxima_usuarios:0 }}" min="1" max="100" onfocus="this.blur()">
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success pull-left" id="actualizar-cantidad-default">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
