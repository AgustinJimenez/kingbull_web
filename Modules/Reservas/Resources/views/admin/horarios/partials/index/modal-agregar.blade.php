<div class="modal fade modal-primary" id="modal-agregar" tabindex="-1" role="dialog" aria-labelledby="delete-confirmation-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>

                <h4 class="modal-title" id="delete-confirmation-title">
                </h4>

            </div>

            <div class="container-fluid center-block clearfix">

                <div class="row">
                    <div class="input-group bootstrap-timepicker timepicker form-group text-center col-md-4 col-md-offset-4">
                        <label for="desde">Desde</label>
                        <input class="form-control text-center" placeholder="Desde" name="desde" type="text" id="desde" size="5" maxlength="5" minlength="5" required="required">
                    </div>
                </div>

                <div class="row">
                    <div class="input-group bootstrap-timepicker timepicker form-group text-center col-md-4 col-md-offset-4">
                        <label for="hasta">Hasta</label>
                        <input class="form-control text-center" placeholder="Hasta" name="hasta" type="text" id="hasta" size="5" maxlength="5" minlength="5" required="required">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="cantidad_maxima">Cantidad Maxima de Usuarios</label>
                        <input type="number" class="form-control" name="cantidad_maxima_usuarios" id="cantidad_maxima_usuarios" value="{{ $config->cantidad_maxima_usuarios }}" min="1" max="100" tabIndex="-1" onfocus="this.blur()">
                    </div>
                </div>
                    <input type="hidden" name="dia_id" id="dia_id">
                


            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success pull-left" id="button-agregar">
                            Agregar
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
