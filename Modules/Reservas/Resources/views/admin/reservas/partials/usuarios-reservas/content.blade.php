<?php
	$columns = ["USUARIO", /*"FECHA", "HORARIO",*/ "ESTADO"];	
?>
<div class="table-responsive">
	<table class="data-table table table-bordered table-striped table-hover">
		<thead>
			<tr class="bg-primary">
				@foreach ($columns as $column_name)
					<th class="text-center">{{ $column_name }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot class="bg-primary">
			@foreach ($columns as $column_name)
				<th  class="text-center">{{ $column_name }}</th>
			@endforeach
		</tfoot>
	</table>
</div>