<script type="text/javascript" charset="utf-8">
	var MODAL_AGREGAR = $("#modal-agregar");
	var MODAL_AGREGAR_TITLE = $("#delete-confirmation-title");
	var BUTTON_AGREGAR = $("#button-agregar");
	var INPUT_DESDE = $("#desde");
	var INPUT_HASTA = $("#hasta");
    var INPUT_DIA_ID = $("#dia_id");
    var MODAL_ALERT_BODY = $("#modal-alert-body");
    var MODAL_ALERT = $("#modal-alert");
    var TABLE = $("#horario-table");
    var BUTTON_ELIMINAR = $("#button-eliminar");
    var FORM_ELIMINAR = $("#form-eliminar");
    var BUTTON_ACTUALIZAR_CANTIDAD_DEFAULT = $("#actualizar-cantidad-default");
    var BUTTON_MOSTRAR_MODAL_CANTIDAD_USUARIOS_DEFAULT = $(".cantidad-maxima-usuarios");
    var MODAL_CANTIDAD_USUARIOS_DEFAULT = $("#modal-actualizar-cantidad-usuarios-default");
    var INPUT_CANTIDAD_USUARIOS_DEFAULT = $("#input_cantidad_maxima_usuarios");
    var INPUT_CANTIDAD_MAXIMA_USUARIOS_HORARIO = $("#cantidad_maxima_usuarios");
	$('#desde, #hasta').timepicker
	({
        minuteStep: 5,
        //template: 'modal',
        //appendWidgetTo: 'body',
        showSeconds: false,
        showMeridian: false,
        defaultTime: 'current',
        maxHours: 24,
        showInputs: true,
        disableFocus: true,
        disableMousewheel: false
    })
    .on('show.timepicker', function(e) 
	{
	    //console.log('The time is ' + e.time.value);
	    //console.log('The hour is ' + e.time.hours);
	    //console.log('The minute is ' + e.time.minutes);
	    //console.log('The meridian is ' + e.time.meridian);
  });;
</script>