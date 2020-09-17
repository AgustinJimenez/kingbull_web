<script type="text/javascript" charset="utf-8">
	
	var config = 
	{
		datatable:
		{
			order: [[ 0, "desc" ]],
			ajax_source: '{!! route('admin.reservas.horario.index_ajax') !!}',
			send_request: function (d) 
            {
                //d.fecha_inicio = $("#fecha_inicio").val()
            },
            data_source: function ( json ) 
            {
                //$("label[for=saldo_acumulado]").text('Saldo Acumulado hasta el '+json.fecha_inicio);
                //$("input[name=saldo_acumulado]").val(json.saldo_acumulado);
                return json.data;
            },
            columns: 
            [
                @foreach ($dias as $key => $dia)
                    { data: {{ $key }}, name: '{{ $dia->id }}', orderable: false, searchable: false},
                @endforeach
            ],
            default_datas_count: 25




		}//end datatable
	}

</script>