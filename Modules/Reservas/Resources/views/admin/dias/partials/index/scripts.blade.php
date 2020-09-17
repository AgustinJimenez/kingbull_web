<?php $locale = locale(); ?>
<script type="text/javascript">
    $(document).keypressAction( {actions: [{ key: 'c', route: "{!! route('admin.reservas.dia.create') !!}" }]} );
    $( document ).ready(function() 
    {
        
        $('.data-table').dataTable
        ({
            "paginate": true,
            "lengthChange": true,
            "filter": true,
            "sort": true,
            "info": true,
            "autoWidth": true,
            "order": [[ 0, "asc" ]],
            "columnDefs": [ {"targets": 2,"orderable": false} ],
            "language": {"url": '{{ Module::asset("core:js/vendor/datatables/{$locale}.json") }}'}
        });
    });
</script>
