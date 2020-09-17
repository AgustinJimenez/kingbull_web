<div class="modal fade modal-danger" id="confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="delete-confirmation-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="delete-confirmation-title">Confirmación</h4>
            </div>

            <div class="modal-body" id="confirmation-modal-message">
                
            </div>

            <div class="modal-footer">
                    <button type="button" class="btn btn-outline btn-flat" data-dismiss="modal">Atras</button>
                    <form method="POST" action="" accept-charset="UTF-8" class="pull-left" id="confirmation-modal-form">
                        <input name="_method" type="hidden" value="delete" autocomplete="off">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline btn-flat" id="confirmation-modal-button-delete">
                            <i class="fa fa-trash"></i> Eliminar
                        </button>
                    </form>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    function destroy_event( element )
    {
        var count_users = parseInt( element.attr('count-users') );
        if( count_users )
            show_modal(element, false, 'No se puede eliminar el registro por que ya esta asociado a algunos usuarios.');
        else
            show_modal(element);
    }

    function show_modal( element, show_delete_button = true, message = "¿Está seguro de que desea eliminar este registro?" )
    {
        $("#confirmation-modal-form").attr('action', element.attr('delete-route'));

        show_delete_button?$("#confirmation-modal-button-delete").show():$("#confirmation-modal-button-delete").hide();

        $("#confirmation-modal-message").html( message );

        
        $("#confirmation-modal").modal("show");
    }
</script>