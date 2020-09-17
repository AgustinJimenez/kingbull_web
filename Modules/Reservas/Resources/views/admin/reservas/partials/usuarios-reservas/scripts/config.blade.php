<script type="text/javascript" charset="utf-8">
	
	var config = 
	{
		datatable:
		{
            show_error: 'none',//'throw' or 'none'
            serverSide: true,
            sort: false,
			order: [[ 0, "desc" ]],
            default_datas_count: 25,
			ajax_source: '{!! route('admin.reservas.reserva.usuarios_reservas_ajax') !!}',
			send_request: function (params_to_send) 
            {
                params_to_send.usuario = INPUT_USUARIO.val();
                params_to_send.fecha_desde = INPUT_FECHA_DESDE.val();
                params_to_send.fecha_hasta = INPUT_FECHA_HASTA.val();
                params_to_send.horario_id = SELECT_HORARIO_ID.val();
                params_to_send.estado = SELECT_ESTADO.val();
            },
            data_source: function ( json ) 
            {
                //$("label[for=saldo_acumulado]").text('Saldo Acumulado hasta el '+json.fecha_inicio);
                //$("input[name=saldo_acumulado]").val(json.saldo_acumulado);
                return json.data;
            },
            columns: 
            [
                { data: "usuario", name: 'usuario', orderable: true, searchable: true},
                //{ data: "fecha", name: 'fecha', orderable: true, searchable: true},
                //{ data: "horario", name: 'horario', orderable: true, searchable: true},
                { data: "estado", name: 'estado', orderable: true, searchable: true}
            ]
		}//end datatable
	}

</script>