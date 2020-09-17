<script type="text/javascript">
    <?php $locale = locale(); ?>
    $( document ).ready(function()
    {
        $(document).keypressAction({actions: [{ key: 'c', route: "{{ route('admin.profile.profile.create') }}" }]});
        $('.data-table').dataTable
        ({
            "paginate": true,
            "lengthChange": true,
            "filter": true,
            "sort": true,
            "info": true,
            "autoWidth": true,
            "order": [[ 0, "desc" ]],
            "language": {"url": '{{ Module::asset("core:js/vendor/datatables/{$locale}.json") }}'}
        });
    });
</script>