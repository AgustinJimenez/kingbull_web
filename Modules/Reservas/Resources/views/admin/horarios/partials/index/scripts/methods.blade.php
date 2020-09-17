<style type="text/css">
	.font-size-15
	{
		font-size: 15pt;
	}
</style>
<script type="text/javascript">
	function log( data )
	{
		return console.log( " " + data + " \n");
	}
	function icon_eliminar_hover_toggle( element, hover = true )
	{
		if(hover)
			element.addClass('font-size-15', 300 );
		else
			element.removeClass('font-size-15', 300 );
	}

	function horario_hover_toggle( element, hover = true )
	{
		if(hover)
			element.children(".icon-eliminar").show(170);
		else
			element.children(".icon-eliminar").hide(170);
	};
	function set_modal_agregar_datas( dia_id, dia_nombre )
	{
		MODAL_AGREGAR_TITLE.html( "Agregar nuevo horario a " + dia_nombre );
		INPUT_DIA_ID.val(dia_id);
	}
	function agregar_was_clicked( element )
	{
		var dia_id = element.attr('dia-id');
		var dia_nombre = element.attr("dia-nombre");
		//log("dia_id= "+dia_id+" dia_nombre= "+dia_nombre);
		set_modal_agregar_datas( dia_id, dia_nombre );
 		MODAL_AGREGAR.modal("show");
	}
	function agregar_button_was_clicked()
	{
		var desde = INPUT_DESDE.val();
		var hasta = INPUT_HASTA.val();
		var dia_id = INPUT_DIA_ID.val();
		var cantidad_maxima_usuarios = INPUT_CANTIDAD_MAXIMA_USUARIOS_HORARIO.val();
		//log("desde = "+desde+" hasta= "+hasta+" dia_id="+dia_id);
		verify(desde, hasta, dia_id, cantidad_maxima_usuarios);
	}
	
	function verify(desde, hasta, dia_id, cantidad_maxima_usuarios)
	{
		if( desde_and_hasta_are_same() )
			mostrar_modal_alert("Desde y Hasta no deben ser iguales.");
		else if(INPUT_CANTIDAD_MAXIMA_USUARIOS_HORARIO.val() == '' || INPUT_CANTIDAD_MAXIMA_USUARIOS_HORARIO.val() == '0')
			mostrar_modal_alert("Cantidad de usuarios invalida.");
		else
			send_data(desde, hasta, dia_id, cantidad_maxima_usuarios);
	}
	function send_data(desde, hasta, dia_id, cantidad_maxima_usuarios)
	{
		$.post(
		"{{ route('admin.reservas.horario.store') }}",
	    {
	        desde: desde,
	        hasta: hasta,
	        dia_id: dia_id,
	        cantidad_maxima_usuarios: cantidad_maxima_usuarios,
	        _token: '{{ csrf_token() }}'
	    },
	    function( response )
	    {
	    	if( response.status == "OK" )
	    		data_was_saved( response.message, response.dia_id, response.desde, response.hasta, response.horario_id, response.cantidad_maxima_usuarios );
	    	else
	    		data_was_not_saved( response.message );
	    });
	}

	function data_was_not_saved( message )
	{
		//log("data was not saved");
		mostrar_modal_alert( message );
	}

	function data_was_saved( message, dia_id, desde, hasta, horario_id, cantidad_maxima_usuarios )
	{
		MODAL_AGREGAR.modal('hide');
		agregar_horario_a_dia(dia_id, desde, hasta, horario_id, cantidad_maxima_usuarios);
	}

	function desde_and_hasta_are_same()
	{
		return (INPUT_DESDE.val() == INPUT_HASTA.val());
	}

	function agregar_horario_a_dia(dia_id, desde, hasta, horario_id, cantidad_maxima_usuarios)
	{
		//log("agregando item a lista de horarios del dia "+dia_id+" desde="+desde+" hasta="+hasta+" horario_id="+horario_id+" cantidad_maxima_usuarios="+cantidad_maxima_usuarios);
		var listas_dia = $(".dia-"+dia_id);

		var new_element = '<span href="#" class="list-group-item text-center horario"><span class="badge pull-left" style="background-color: #337ab7;">'+cantidad_maxima_usuarios+'</span>'+desde+" - "+hasta+'<span class="glyphicon glyphicon-remove-circle pull-right icon-eliminar" aria-hidden="true" style="color:red; display:none;" horario-id="'+horario_id+'"></span></span>';
		listas_dia.html( listas_dia.html()+new_element );
	}
	function mostrar_modal_alert(message = "default message here", show_eliminar_button = false)
	{
		if(show_eliminar_button)
			BUTTON_ELIMINAR.show();
		else
			BUTTON_ELIMINAR.hide();

		MODAL_ALERT_BODY.html( message );
		MODAL_AGREGAR.modal('hide');
		MODAL_CANTIDAD_USUARIOS_DEFAULT.modal("hide");
		MODAL_ALERT.modal('show');
	}
	function icon_eliminar_was_clicked( element )
	{
		var horario_id = element.attr('horario-id');
		var default_delete_route = "{{ route('admin.reservas.horario.destroy', [0]) }}";
		default_delete_route = default_delete_route.slice(0, -1);
		var new_delete_route = default_delete_route+horario_id;
		FORM_ELIMINAR.attr("action", new_delete_route);
		mostrar_modal_alert(message = "Esta seguro de que desea eliminar este registro?.", true);
	}
	function submit_form_eliminar()
	{
		FORM_ELIMINAR.submit();
	}

    function button_actualizar_cantidad_default_was_clicked()
    {
    	var cantidad_ingresada = parseInt( INPUT_CANTIDAD_USUARIOS_DEFAULT.val() );
    	var errors = verificar_cantidad_default_ingresada( cantidad_ingresada );
    	if(errors)
        	mostrar_modal_alert(errors);
        else
        	actualizar_cantidad_default_usuarios( cantidad_ingresada );
    }

    function verificar_cantidad_default_ingresada( cantidad_ingresada )
    {
    	return ( !cantidad_ingresada && cantidad_ingresada < 1 && cantidad_ingresada > 100);
    }

    function button_mostrar_modal_cantidad_usuarios_default_was_clicked()
    {
    	mostrar_modal_actualizar_cantidad_usuarios();
    }

    function mostrar_modal_actualizar_cantidad_usuarios()	
	{
		MODAL_CANTIDAD_USUARIOS_DEFAULT.modal("show");
	}


    function actualizar_cantidad_default_usuarios( cantidad_maxima_usuarios )
    {
        $.post
        (
            "{{ route('admin.reservas.horario.update_cantidad_maxima_usuarios_horario') }}",
            {
                default_horario_cantidad_limite: cantidad_maxima_usuarios,
                _token: '{{ csrf_token() }}'
            },
            function( response )
            {
                MODAL_CANTIDAD_USUARIOS_DEFAULT.modal("hide");
            }
        );
    }

    function get_cantidad_default_usuarios( target = INPUT_CANTIDAD_USUARIOS_DEFAULT )
    {
    	$.get
    	(
    		"{{ route('admin.reservas.horario.get_cantidad_usuarios_default') }}",
    		function(data, status)
    		{
    			if( data.cantidad )
					target.val( data.cantidad );
    		}
    	);
    }
</script>