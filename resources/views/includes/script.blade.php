<script src="{{ asset('assets/js/app.js') }}"></script>

{{-- Datatables --}}
<script src="{{ asset('assets/vendor/DataTable/js/jquery-3.7.0.js') }}"></script>
<script src="{{ asset('assets/vendor/DataTable/js/jquery.dataTable.min.js') }}"></script>
<script src="{{ asset('assets/vendor/DataTable/js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    new DataTable('#myTable');
</script>

{{-- Tooltip --}}
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
