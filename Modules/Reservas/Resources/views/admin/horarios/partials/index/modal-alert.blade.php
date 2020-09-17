<div class="modal fade modal-danger" id="modal-alert" tabindex="-1" role="dialog" aria-labelledby="delete-confirmation-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>

                <h4 class="modal-title text-center">
                    AVISO
                </h4>

            </div>

            <div class="modal-body text-center" id="modal-alert-body">

            </div>
            <div class="modal-footer text-center">
                <form action="{{ route('admin.reservas.horario.destroy', [0]) }}" method="POST" accept-charset="utf-8" id="form-eliminar">
                    <input name="_method" type="hidden" value="DELETE">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" id="button-eliminar"><span class="glyphicon glyphicon-trash"></span>ELIMINAR</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                </form>
                
            </div>

        </div>
    </div>
</div>