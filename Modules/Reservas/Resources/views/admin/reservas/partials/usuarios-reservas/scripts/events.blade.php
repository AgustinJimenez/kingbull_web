<script type="text/javascript" charset="utf-8">
	INPUT_FECHA_DESDE.on("dp.change", function (e) 
    {
        table.draw();
    });
    INPUT_FECHA_HASTA.on("dp.change", function (e) 
    {
        table.draw();
    });
    INPUT_USUARIO.keyup(function()
    {
    	table.draw();
    });
    SELECT_HORARIO_ID.change(function()
    {
    	table.draw();
    });
    SELECT_ESTADO.change(function()
    {
    	table.draw();
    });

</script>