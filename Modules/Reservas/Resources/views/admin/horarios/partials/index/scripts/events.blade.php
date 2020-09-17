<script type="text/javascript" charset="utf-8">
	$(".agregar").click(function()
	{
		agregar_was_clicked($(this));
	});
	BUTTON_AGREGAR.click(function()
	{
		agregar_button_was_clicked();
	});
	MODAL_AGREGAR.on('shown.bs.modal', function() 
	{
		get_cantidad_default_usuarios(INPUT_CANTIDAD_MAXIMA_USUARIOS_HORARIO);
    	INPUT_DESDE.focus();
	});
	MODAL_CANTIDAD_USUARIOS_DEFAULT.on('shown.bs.modal', function() 
	{
    	INPUT_CANTIDAD_USUARIOS_DEFAULT.focus();
	});
	$( document ).on('mouseenter', '.horario', function()
	{
		horario_hover_toggle( $(this) );
	});

	$( document ).on('mouseleave', '.horario', function()
	{
		horario_hover_toggle( $(this), false );
	});
	
	$( document ).on('mouseenter', '.icon-eliminar', function()
	{
		icon_eliminar_hover_toggle( $(this) );
	});

	$( document ).on('mouseleave', '.icon-eliminar', function()
	{
		icon_eliminar_hover_toggle( $(this), false );
	});
	BUTTON_ELIMINAR.click(function()
	{
		submit_form_eliminar();
	});
	$( document ).on('click', '.icon-eliminar', function()
	{
		icon_eliminar_was_clicked( $(this) );
	});
	BUTTON_MOSTRAR_MODAL_CANTIDAD_USUARIOS_DEFAULT.click(function()
    {
    	get_cantidad_default_usuarios();
        button_mostrar_modal_cantidad_usuarios_default_was_clicked();
    });
	BUTTON_ACTUALIZAR_CANTIDAD_DEFAULT.click(function()
    {
        button_actualizar_cantidad_default_was_clicked();
    });
</script>